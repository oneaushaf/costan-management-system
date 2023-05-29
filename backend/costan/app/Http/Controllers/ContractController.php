<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;
use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function newBlank(){
        return view('order',[
            'rooms'=>Room::all()->where('user_id',NULL)->where('maintenance',FALSE),
        ]);
        
    }
    public function newFilled(Request $request){
        return view('order',[
            'rooms'=>Room::all()->where('user_id',NULL)->where('maintenance',FALSE),
            'chosed'=>$request->chosed,
        ]);
    }
    public function send(){
        $validatedData = request()->validate([
            'name'=>'required',
            'phone'=>'required',
            'room'=>'required',
            'months'=>'required',
            'username'=>'nullable'
        ]);
        $roomtype = Room::findOrFail($validatedData['room'])->roomtype;
        $contract = new Contract();
        $contract->name = $validatedData['name'];
        if($validatedData['username']!=NULL) $contract->username=$validatedData['username'];
        $contract->phone = $validatedData['phone'];
        $contract->room_id = $validatedData['room'];
        $contract->months = $validatedData['months'];
        $contract->payment = $roomtype->price*$validatedData['months'];
        $contract->save();
        return redirect('/room/'.Room::findOrFail($validatedData['room'])->name);
        
    }

    public function index(){
        if (Auth::guard('admin')->check()) {
            return view('admin.contracts',[
                'new'=>Contract::whereNull('user_id')->get(),
                'extend'=>Contract::whereNotNull('user_id')->whereNull('accepted')->get(),
                'passed'=>Contract::whereNotNull('accepted')->get()
        ]);
        }
        return redirect('/admin');
    }
    
    public function extend($id){
        if (Auth::guard('admin')->check()) {
            $contract = Contract::findOrFail($id);
            $room = $contract->room;
            $room->until = Carbon::create($room->until)->addMonth($contract->months);
            $room->save();
            $contract->accepted=TRUE;
            $contract->until=Carbon::now();
            $contract->save();
            return redirect('/admin/users');
        }
        return redirect('/admin');
    }
    public function acceptNew($id){
        if (Auth::guard('admin')->check()) {
            $contract = Contract::findOrFail($id);
            $room = $contract->room;
            $user = new User();
            $user->name = $contract->name;
            $user->username = $contract->username;
            $user->phone = $contract->phone;
            $user->password = bcrypt('12345');
            $user->save();
            $user->room()->associate($room);
            $room->user()->associate($user);
            $room->until = Carbon::now()->addMonth($contract->months);
            $user->save();
            $room->save();
            $contract->accepted=TRUE;
            $contract->until=Carbon::now();
            $contract->user()->associate($user);
            $contract->save();
            return redirect('/admin/users');
        }
        return redirect('/admin');
    }
    public function decline($id){
        if (Auth::guard('admin')->check()) {
            $contract = Contract::findOrFail($id);
            $contract->delete();
            return redirect('/admin/requests');
        }
        return redirect('/admin');
    }
}

