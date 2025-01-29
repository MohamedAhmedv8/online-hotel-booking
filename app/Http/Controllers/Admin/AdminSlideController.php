<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminSlideController extends Controller
{
    public function index()
    {
        $slides = Slide::get();
        return view('Admin.slide_view', compact('slides'));
    }

    public function create()
    {
        return view('Admin.slide_create');
    }
    public function store(Request $request)
    {
        $new_slide = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
        ]);
        $photo = Storage::putFile("slides", $request->photo);
        $new_slide['photo'] = $photo;
        $new_slide['heading'] = $request->heading;
        $new_slide['text'] = $request->text;
        $new_slide['button_text'] = $request->button_text;
        $new_slide['button_url'] = $request->button_url;
        Slide::create($new_slide);
        return redirect()->route('admin_slide_view')->with('success', 'slide save');
    }
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('Admin.slide_edit', compact('slide'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png',
        ]);
        $slide = Slide::findOrFail($id);
        if ($request->hasFile('photo')) {
            Storage::delete($slide->photo);
            $photo = Storage::putFile("slides", $request->photo);
            $slide['photo'] = $photo;
        }
        $slide['heading'] = $request->heading;
        $slide['text'] = $request->text;
        $slide['button_text'] = $request->button_text;
        $slide['button_url'] = $request->button_url;
        $slide->update();
        return redirect()->route('admin_slide_view')->with('success', 'slide updated');
    }
    public function delete($id)
    {
        $slide = Slide::findOrFail($id);
        Storage::delete($slide->photo);
        $slide->delete();
        return redirect()->back()->with('success', 'slide deleted');
    }
}