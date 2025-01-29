<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::get();
        return view('admin.feature_view', compact('features'));
    }
    public function create()
    {
        return view('Admin.feature_create');
    } 
    public function store(Request $request)
    {
        $new_feature = $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ]);
        $new_feature['icon'] = $request->icon;
        $new_feature['heading'] = $request->heading;
        $new_feature['text'] = $request->text;
        Feature::create($new_feature);
        return redirect()->route('admin_feature_view')->with('success', 'feature save');
    }

    
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('Admin.feature_edit', compact('feature'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ]);
        $feature = Feature::findOrFail($id);
        $feature['icon'] = $request->icon;
        $feature['heading'] = $request->heading;
        $feature['text'] = $request->text;
        $feature->update();
        return redirect()->route('admin_feature_view')->with('success', 'Feature updated');
    }
    public function delete($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();
        return redirect()->back()->with('success', 'Feature deleted');
    }
}