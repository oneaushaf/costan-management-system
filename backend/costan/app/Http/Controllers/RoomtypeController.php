<?php

namespace App\Http\Controllers;

use App\Models\roomtype;
use App\Models\facility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreroomtypeRequest;
use App\Http\Requests\UpdateroomtypeRequest;
use Illuminate\Http\Request;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.roomtype',[
                'active'=>'roomtypes',
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
            'price'=>'required',
        ]);
        Roomtype::create($validatedData);
        return redirect('/admin/roomtypes');
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $roomtype = Roomtype::where('name',$name)->first();
        $rooms = $roomtype->rooms;
        return view('room.type',[
            "roomtype" => $roomtype,
            "rooms" => $rooms
        ]);
    }

    public function edit($id)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.edit.roomtype',[
                'active'=>'facilities',
                'roomtype'=>Roomtype::with('facilities')->findOrFail($id),
                'facilities'=>Facility::all(),
        ]);
        }
        return redirect('/admin');
    }
    
    public function update($id)
    {
        $roomtype = Roomtype::find($id);
        $validatedData = request()->validate([
            'name'=>'required',
            'price'=>'required',
            'facilities'=>'required'
        ]);
        $roomtype->name = $validatedData['name'];
        $roomtype->price = $validatedData['price'];
        $roomtype->facilities()->detach();
        $roomtype->facilities()->attach($validatedData['facilities']);
        $roomtype->save();
        return redirect('/admin/roomtypes');
    }

    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(roomtype $roomtype)
    {
        //
    }
    public function image($id)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.image.roomtype',[
                'roomtype'=>Roomtype::findOrFail($id)
        ]);
        }
        return redirect('/admin');
    }
    public function upload($id)
    {
        $roomtype = Roomtype::find($id);
        $validatedData = request()->validate([
            'image' => 'image'
        ]);
        if ($roomtype->image){
            Storage::delete($roomtype->image);
        }
        $temp = request()->file('image')->store('roomtype-image');
        $roomtype->image = $temp;
        $roomtype->save();
        return redirect("/admin/roomtypes/image/$id");
    }
}
