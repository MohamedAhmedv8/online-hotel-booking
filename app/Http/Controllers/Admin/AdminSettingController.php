<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function index()
    {
        $setting_data = Setting::where('id',1)->first();
        return view('Admin.settings',compact('setting_data'));
    }
    public function update(Request $request)
    {
        $setting_data = Setting::where('id',1)->first();
        if ($request->hasFile('logo')) {
            $request->validate([
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            Storage::delete($setting_data->logo);
            $new_logo = Storage::putFile("Settings", $request->logo);
            $setting_data['logo'] = $new_logo;
        }
        if ($request->hasFile('favicon')) {
            $request->validate([
                'favicon' => 'required|image|mimes:jpeg,png,jpg,gif',
            ]);
            Storage::delete($setting_data->favicon);
            $new_favicon = Storage::putFile("Settings", $request->favicon);
            $setting_data['favicon'] = $new_favicon;
        }
        if ($request->has('top_bar_phone')) {
            $request->validate([
                'top_bar_phone' => 'required',
            ]);
            $setting_data->top_bar_phone = $request->top_bar_phone;
        }
        if ($request->has('top_bar_email')) {
            $request->validate([
                'top_bar_email' => 'required|email',
                ]);
            $setting_data->top_bar_email = $request->top_bar_email;
        }
        if ($request->has('home_room_total')) {
            $request->validate([
                'home_room_total' => 'required',
                ]);
            $setting_data->home_room_total = $request->home_room_total;
        }
        if ($request->has('home_room_status')) {
            $request->validate([
                'home_room_status' => 'required',
                ]);
            $setting_data->home_room_status = $request->home_room_status;
        }
        if ($request->has('home_feature_status')) {
            $request->validate([
                'home_feature_status' => 'required',
                ]);
            $setting_data->home_feature_status = $request->home_feature_status;

        }
        if ($request->has('home_testimonial_status')) {
            $request->validate([
                'home_testimonial_status' => 'required',
                ]);
            $setting_data->home_testimonial_status = $request->home_testimonial_status;
        }
        if ($request->has('home_latest_post_total')) {
            $request->validate([
                'home_latest_post_total' => 'required',
                ]);
            $setting_data->home_latest_post_total = $request->home_latest_post_total;
        }
        if ($request->has('home_latest_post_status')) {
            $request->validate([
                'home_latest_post_status' => 'required',
                ]);
            $setting_data->home_latest_post_status = $request->home_latest_post_status;
        }
        if ($request->has('footer_phone')) {
            $request->validate([
                'footer_phone' => 'required',
                ]);
            $setting_data->footer_phone = $request->footer_phone;
        }
        if ($request->has('footer_email')) {
            $request->validate([
                'footer_email' => 'required',
                ]);
            $setting_data->footer_email = $request->footer_email;
        }
        if ($request->has('footer_address')) {
            $request->validate([
                'footer_address' => 'required',
                ]);
            $setting_data->footer_address = $request->footer_address;
        }
        if ($request->has('copyright')) {
            $request->validate([
                'copyright' => 'required',
                ]);
            $setting_data->copyright = $request->copyright;
        }
        if ($request->has('facebook')) {
            $setting_data->facebook = $request->facebook;
        }
        if ($request->has('twitter')) {
            $setting_data->twitter = $request->twitter;
        }
        if ($request->has('linkedin')) {
            $setting_data->linkedin = $request->linkedin;
        }
        if ($request->has('pinterest')) {
            $setting_data->pinterest = $request->pinterest;
        }
        if ($request->has('analytic_id')) {
            $request->validate([
                'analytic_id' => 'required',
                ]);
            $setting_data->analytic_id = $request->analytic_id;
        }
        if ($request->has('theme_color_1')) {
            $request->validate([
                'theme_color_1' => 'required',
                ]);
            $setting_data->theme_color_1 = $request->theme_color_1;
        }
        if ($request->has('theme_color_2')) {
            $request->validate([
                'theme_color_2' => 'required',
                ]);
            $setting_data->theme_color_2 = $request->theme_color_2;
        }
        $setting_data->update();
        return redirect()->back()->with('success','Setting Updated Successfully');
    }
}
