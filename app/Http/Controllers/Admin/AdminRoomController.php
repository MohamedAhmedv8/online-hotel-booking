<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Room;
use App\Models\RoomPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
        public function index()
    {
        $rooms = Room::get();
        return view('admin.rooms_view', compact('rooms'));
    }
    public function create()
    {
        $all_amenities = Amenity::get();
        return view('Admin.room_create',compact('all_amenities'));
    }
    public function store(Request $request)
    {
        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }            
                $i++;
            }
        }
        $new_room = $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required'
        ]);
        $photo = Storage::putFile("Room Featured Photo", $request->featured_photo);
        $new_room['featured_photo'] = $photo;
        $new_room['name'] = $request->name;
        $new_room['description'] = $request->description;
        $new_room['price'] = $request->price;
        $new_room['total_rooms'] = $request->total_rooms;
        $new_room['amenities'] = $amenities;
        $new_room['size'] = $request->size;
        $new_room['total_beds'] = $request->total_beds;
        $new_room['total_bathrooms'] = $request->total_bathrooms;
        $new_room['total_balconies'] = $request->total_balconies;
        $new_room['total_guests'] = $request->total_guests;
        $new_room['video_id'] = $request->video_id;
        Room::create($new_room);
        return redirect()->route('admin_room_view')->with('success', 'Room save');
    }
    public function edit($id)
    {
        $all_amenities = Amenity::get();
        $room = Room::where('id',$id)->first();

        $existing_amenities = array();
        if($room->amenities != '') {
            $existing_amenities = explode(',',$room->amenities);
        }
        return view('admin.room_edit', compact('room','all_amenities','existing_amenities'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'featured_photo' => 'image|mimes:jpg,jpeg,png',
        ]);
        $amenities = '';
        $i=0;
        if(isset($request->arr_amenities)) {
            foreach($request->arr_amenities as $item) {
                if($i==0) {
                    $amenities .= $item;
                } else {
                    $amenities .= ','.$item;
                }            
                $i++;
            }
        }
        $room = Room::findOrFail($id);
        if ($request->hasFile('featured_photo')) {
            Storage::delete($room->featured_photo);
        $photo = Storage::putFile("Room Featured Photo", $request->featured_photo);
            $room['featured_photo'] = $photo;
        }
       $room['name'] = $request->name;
        $room['description'] = $request->description;
        $room['price'] = $request->price;
        $room['total_rooms'] = $request->total_rooms;
        $room['amenities'] = $amenities;
        $room['size'] = $request->size;
        $room['total_beds'] = $request->total_beds;
        $room['total_bathrooms'] = $request->total_bathrooms;
        $room['total_balconies'] = $request->total_balconies;
        $room['total_guests'] = $request->total_guests;
        $room['video_id'] = $request->video_id;
        $room->update();
        return redirect()->route('admin_room_view')->with('success', 'Room updated');
    }
    public function delete($id)
    {
        $room = Room::findOrFail($id);
        // لما نعدل العلاقات 
        if($room_photos = RoomPhoto::where('room_id',$id)->get()){
        foreach($room_photos as $room_photo){
            Storage::delete($room_photo->photo);
        }
        }
        // 
        Storage::delete($room->featured_photo);
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted');
    }
    public function gallery($id)
    {
        $room = Room::where('id',$id)->first();
        $room_photos = RoomPhoto::where('room_id',$id)->get();

        return view('Admin.room_gallery',compact('room','room_photos'));
    }
    public function gallery_store(Request $request,$id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png',
        ]);
        if ($request->hasFile('photo')) {
        $photo = Storage::putFile("Room Gallery Photo", $request->photo);
            $room['photo'] = $photo;
            $room['room_id']=$id;
            RoomPhoto::create($room);
        return redirect()->back()->with('success', 'Photo Room Save');

        }
    }
    public function gallery_delete($id)
    {     
        $room_photo = RoomPhoto::findOrFail($id);
        Storage::delete($room_photo->photo);
        $room_photo->delete();
        return redirect()->back()->with('success', 'Photo deleted');}
}
