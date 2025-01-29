<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(12);
        return view('frontend.rooms', compact('rooms'));
    }
    
    public function room_details($id)
    {
        $room_details= Room::findOrFail($id);
        $room_photos=RoomPhoto::where('room_id',$id);
        return view('frontend.room_details',compact('room_details','room_photos'));
        }
}
