<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::get();
        return view('Admin.testimonial_view', compact('testimonials'));
    }
    public function create()
    {
        return view('Admin.testimonial_create');
    }

    public function store(Request $request)
    {
        $new_testimonial = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);
        $photo = Storage::putFile("Testimonials", $request->photo);
        $new_testimonial['photo'] = $photo;
        $new_testimonial['name'] = $request->name;
        $new_testimonial['designation'] = $request->designation;
        $new_testimonial['comment'] = $request->comment;
        Testimonial::create($new_testimonial);
        return redirect()->route('admin_testimonial_view')->with('success', 'Testimonial save');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('Admin.testimonial_edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);
        $testimonial = Testimonial::findOrFail($id);
        if ($request->hasFile('photo')) {
            Storage::delete($testimonial->photo);
            $photo = Storage::putFile("Testimonials", $request->photo);
            $testimonial['photo'] = $photo;
        }
        $testimonial['name'] = $request->name;
        $testimonial['designation'] = $request->designation;
        $testimonial['comment'] = $request->comment;
        $testimonial->update();
        return redirect()->route('admin_testimonial_view')->with('success', 'testimonial updated');
    }
    public function delete($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        Storage::delete($testimonial->photo);
        $testimonial->delete();
        return redirect()->back()->with('success', 'Testimonial deleted');
    }
}