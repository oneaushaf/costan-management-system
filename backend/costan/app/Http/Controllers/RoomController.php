<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Picture;
use App\Models\Roomtype;
use App\Models\Facility;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        return view('room.index',[
            "rooms" => Room::with(['roomtype','user'])->get(),
            "roomtypes" => Roomtype::with('facilities')->get()
        ]);
    }
    public function byfloor(){
        return 
        view('index',[
            "facilities" => Facility::all(),
            "roomtypes" => Roomtype::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.create.room',[
                'roomtypes'=>Roomtype::all(),
                'floors'=>Room::pluck('floor')->unique(),
        ]);
        }
        return redirect('/admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validatedData = request()->validate([
            'name'=>'required',
            'desc'=>'required',
            'floor'=>'required',
            'roomtype_id'=>'required',
        ]);
        Room::create($validatedData);
        return redirect('/admin/rooms');
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {    
        $room = Room::where('name',$name)->first();
        return view('room.show',[
            "room" => $room,
            "user" => $room->user,
            "roomtype" => $room->roomtype,
            "facilities" => $room->roomtype->facilities,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.edit.room',[
                'roomtypes'=>Roomtype::all(),
                'room'=>Room::with('roomtype')->findOrFail($id),
                'floors'=>Room::pluck('floor')->unique()
        ]);
        }
        return redirect('/admin');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $validatedData = request()->validate([
            'name'=>'required',
            'desc'=>'required',
            'floor'=>'required',
            'roomtype'=>'required',
        ]);
        $room = Room::findOrFail($id);
        $room->name = $validatedData['name'];
        $room->desc = $validatedData['desc'];
        $room->floor = $validatedData['floor'];
        $room->roomtype_id = $validatedData['roomtype'];
        $room->save();
        return redirect('/admin/rooms');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }
    public function maintain($id)
    {
        if (Auth::guard('admin')->check()) {
            $room = Room::findOrFail($id);
            $room->maintenance = TRUE;
            $room->save();
            return redirect('/admin/rooms');
        }
        return redirect('/admin');
    }
    public function finish($id)
    {
        if (Auth::guard('admin')->check()) {
            $room = Room::findOrFail($id);
            $room->maintenance = FALSE;
            $room->save();
            return redirect('/admin/rooms');
        }
        return redirect('/admin');
    }

    public function images($id)
    {
        $room = Room::findOrFail($id);
        if (Auth::guard('admin')->check()) {
            return view('admin.image.room',[
                'images'=>$room->pictures,
                'room'=>$room
        ]);
        }
        return redirect('/admin');
    }
    public function addImage($id)
    {
        $room = Room::find($id);
        $image = new Picture;
        $validatedData = request()->validate([
            'image' => 'image|required'
        ]);
        $temp = request()->file('image')->store('room-image');
        $image->room_id = $room->id;
        $image->image = $temp;
        $image->alter = $room->name.$image->id;
        $image->save();
        return redirect("/admin/rooms/image/$id");
    }
    public function deleteImage($id)
    {
        $picture = Picture::find($id);
        Storage::delete($picture->image);
        $id=$picture->room->id;
        $picture->delete();
        return redirect("/admin/rooms/image/$id");
    }
}
