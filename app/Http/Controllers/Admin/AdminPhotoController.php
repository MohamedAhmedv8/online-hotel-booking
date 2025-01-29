<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPhotoController extends Controller
{
    public function index()
    {
        $photos = Photo::get();
        return view('Admin.photo_view', compact('photos'));
    }
    public function create()
    {
        return view('Admin.photo_create');
    }

    public function store(Request $request)
    {
        $new_photo = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $photo = Storage::putFile("Photos", $request->photo);
        $new_photo['photo'] = $photo;
        $new_photo['caption'] = $request->caption;
        Photo::create($new_photo);
        return redirect()->route('admin_photo_view')->with('success', 'Photo save');
    }

    public function edit($id)
    {
        $photo = Photo::findOrFail($id);
        return view('Admin.photo_edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png',
        ]);
        $photo = Photo::findOrFail($id);
        if ($request->hasFile('photo')) {
            Storage::delete($photo->photo);
            $new_photo = Storage::putFile("Photos", $request->photo);
            $photo['photo'] = $new_photo;
        }
        $photo['caption'] = $request->caption;
        $photo->update();
        return redirect()->route('admin_photo_view')->with('success', 'Photo updated');
    }
    public function delete($id)
    {
        $photo = Photo::findOrFail($id);
        Storage::delete($photo->photo);
        $photo->delete();
        return redirect()->back()->with('success', 'Photo Deleted');
    }
}