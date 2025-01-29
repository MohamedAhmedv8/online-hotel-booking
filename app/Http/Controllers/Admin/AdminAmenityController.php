<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AdminAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();
        return view('admin.amenity_view', compact('amenities'));
        }
    public function create()
    {
        return view('Admin.amenity_create');
    }
    public function store(Request $request)
    {
        $new_amenity = $request->validate([
            'name' => 'required',
        ]);
        $new_amenity['name'] = $request->name;
        Amenity::create($new_amenity);
        return redirect()->route('admin_amenity_view')->with('success', 'Amenity Save');
    }
    public function edit($id)
    {
        $amenity = Amenity::findOrFail($id);
        return view('Admin.amenity_edit', compact('amenity'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $amenity = Amenity::findOrFail($id);
        $amenity['name'] = $request->name;
        $amenity->update();
        return redirect()->route('admin_amenity_view')->with('success', 'Amenity Updated');
    }
    public function delete($id)
    {
        $amenity = Amenity::findOrFail($id);
        $amenity->delete();
        return redirect()->back()->with('success', 'Amenity Deleted');
    }
}