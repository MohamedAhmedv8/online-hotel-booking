<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('Admin.profile');
    }
    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'image|mimes:png,jpg,jpeg',
        ]);
        $data = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);
            $data->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            $photo = Storage::putFile("admins", $request->photo);
            $data['photo'] = $photo;
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->update();
        return redirect()->back()->with('success', 'Data Updated');
    }
}
