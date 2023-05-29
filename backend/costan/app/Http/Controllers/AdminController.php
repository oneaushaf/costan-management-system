<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Room;
use App\Models\Roomtype;
use App\Models\User;
use App\Models\Facility;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username'=> 'required',
            'password' => 'required'
        ]);
        
        if (Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/admin/index');
        }
        return back()->withErrors([
            'mismatch'=>'Username atau Password salah'
        ]);
    }
    public function dable(){
        if (Auth::guard('admin')->check()) {
            return redirect('admin/index')->with([
                'active'=>'none',
        ]);
        }
        return redirect('admin/index');
    }
    public function index(){
        if (Auth::guard('admin')->check()) {
            return view('admin.index',[
        ]);
        }
        return view('admin.login');
    }

    public function rooms(){
        if (Auth::guard('admin')->check()) {
            $rooms = Room::with(['user','roomtype'])->get();
            return view('admin.rooms',[
                'rooms'=> $rooms,
        ]);
        }
        return redirect('/admin');
    }
    public function users(){
        if (Auth::guard('admin')->check()) {
            $users = User::with(['room'])->get();
            foreach ($users as $user) {
                if(isset($user->room->until))$user->until = Carbon::create($user->room->until);
                else $user->until = NULL;
            }
            return view('admin.users',[
                'users'=> $users,
        ]);
        }
        return redirect('/admin');
    }
    public function roomtypes(){
        if (Auth::guard('admin')->check()) {
            $roomtypes = Roomtype::with(['facilities','rooms'])->get();
            return view('admin.roomtypes',[
                'roomtypes'=> $roomtypes,
                'active'=>'roomtypes',
        ]);
        }
        return redirect('/admin');
    }
    public function facilities(){
        if (Auth::guard('admin')->check()) {
            $facilities = Facility::all();
            return view('admin.facilities',[
                'facilities'=> $facilities,
                'active'=>'facilities',
        ]);
        }
        return redirect('/admin');
    }

    public function logout(){
        auth()->guard('admin')->logout();
        //request()->sesion()->invalidate();
        //request()->sesion()->regenerateToken();
        return redirect('/admin');
    }
}