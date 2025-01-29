<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CustomerProfileController extends Controller
{
    public function index()
    {
        return view('Customer.profile');
    }
    public function profile_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'image|mimes:png,jpg,jpeg',
        ]);
        $data = Customer::where('email', Auth::guard('customer')->user()->email)->first();
        if ($request->password != '') {
            $request->validate([
                'password' => 'required',
                'confirm_password' => 'required|same:password'
            ]);
            $data->password = Hash::make($request->password);
        }
        if ($request->hasFile('photo')) {
            if ($data['photo']) {
                Storage::delete($data['photo']);
            }
            $photo = Storage::putFile("Customers", $request->photo);
            $data['photo'] = $photo;
        }
        if($request->country){
            $data->country = $request->country;
        }
        if($request->address){
            $data->address = $request->address;
        }
        if($request->city){
            $data->city = $request->city;
        }
        if($request->zip){
            $data->zip = $request->zip;
        }
        if($request->phone){
            $data->phone = $request->phone;
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->update();
        return redirect()->back()->with('success', 'Data Updated');
    }

}
