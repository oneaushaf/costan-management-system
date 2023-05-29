<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserController extends Controller
{
    public function landing(){
        if (auth()->guard('web')->check()) 
            return view('user.user',[
                'contracts' => auth()->user()->contracts,
                'date'=> Carbon::create(auth()->user()->room?auth()->user()->room->until:NULL)
            ]);
        return view('user.login');
    }

    public function authenticate(Request $request){
        $credentials =$request->validate([
            'username'=> 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/user');
        }
        return back()->withErrors([
            'mismatch'=>'Username atau Password salah'
        ]);
        
    }

    public function logout(){
        Auth::logout();
        //request()->sesion()->invalidate();
        //request()->sesion()->regenerateToken();

        return redirect('/login');
    }
    
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.user',[
        ]);
        }
        return redirect('/admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name'=>'required',
            'username'=>'required',
            'phone'=>'required',
        ]);
        $user = new User();
        $user->name = $validatedData['name'];
        $user->username = $validatedData['username'];
        $user->phone = $validatedData['phone'];
        $user->password = bcrypt('12345');
        $user->save();
        return redirect('/admin/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
    public function room($id)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.tach.attach',[
                'user' => User::findOrFail($id),
                'rooms' => Room::all()->where('user_id',NULL),
        ]);
        }
        return redirect('/admin');
    }
    public function attach($id)
    {
        $validatedData = request()->validate([
            'room'=>'required',
            'months'=>'required',
        ]);
        $user = User::findOrFail($id);
        $room = Room::findOrFail($validatedData['room']);
        $contract = new Contract();
        $contract->user()->associate($user);
        $contract->room()->associate($room);
        $contract->months = $validatedData['months'];   
        $contract->phone = $user->phone;   
        $contract->name = $user->name;   
        $contract->accepted = TRUE;   
        $contract->payment = $room->roomtype->price*$validatedData['months'];   
        $contract->username = $user->username;   
        $contract->until = Carbon::now();
        $contract->save();   
        
        $room->until = Carbon::now()->addMonth($validatedData['months']);
        $room->user()->associate($user);
        $user->room()->associate($room);
        $room->save();
        $user->save();
        return redirect('/admin/users');
    }
    public function detach($id)
    {
        $user = User::findOrFail($id);
        $room = $user->room;
        $user->room()->dissociate();
        $room->user()->dissociate();
        $user->save();
        $room->save();
        return redirect('/admin/users');
    }

    public function bill(){
        if (auth()->guard('web')->check()) 
            return view('user.bill',[
                'contracts' => auth()->user()->contracts,
                'date'=> Carbon::create(auth()->user()->room->until)
            ]);
        return redirect('/user');
    }

    public function extend(){
        $validatedData = request()->validate([
            'months'=>'required',
        ]);
        $contract = new Contract;
        $contract->user()->associate(auth()->user());
        $contract->room()->associate(auth()->user()->room);
        $contract->months = $validatedData['months'];   
        $contract->phone = auth()->user()->phone;   
        $contract->name = auth()->user()->name;   
        $contract->accepted = NULL;   
        $contract->payment = auth()->user()->room->roomtype->price*$validatedData['months'];   
        $contract->username = auth()->user()->username;   
        $contract->until = Carbon::create(auth()->user()->room->until)->addMonth($validatedData['months']);
        $contract->save();

        return redirect('/user/bill');
    }

    public function status(){
        if (auth()->guard('web')->check()) 
            return view('user.status',[
                'date'=> Carbon::create(auth()->user()->room->until)
            ]);
        return redirect('/user');
    }
    public function changePw(){
        if (auth()->guard('web')->check()) 
            return view('user.changepw',[
            ]);
        return redirect('/user');
    }
    public function savePw(){
        $user = Auth::user();
        $validatedData = request()->validate([
            'old'=>'required',
            'new'=>'required',
            'confirm'=>'required',
        ]);
        if (Hash::check($validatedData['old'], $user->password)) {
            if($validatedData['new']==$validatedData['confirm']){
                $user->password = bcrypt($validatedData['new']);
                $user->save();
                return redirect('/user/change-pw')->with('success', 'Password changed successfully.');
            }
            else {
                return back()->withErrors(['confirm' => 'The confirmed password does not match.']);
            }
        }
        return back()->withErrors(['old' => 'The current password is incorrect.']);
    }
}

