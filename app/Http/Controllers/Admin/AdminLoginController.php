<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminLoginController extends Controller
{
    public function index()
    {
        return view('Admin.login');
    }
    public function forget_password()
    {
        return view('Admin.forget_password');
    }

    public function login_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::guard('admin')->attempt($credential)) {
            return redirect()->route('admin_home');
        } else {
            return redirect()->route('admin_login')->with('error', 'Invalid Email or Password');
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin_login');
    }

    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = Admin::where('email', $request->email)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'Email Not Found');
        }
        $token = hash('sha256', time());
        $data->token = $token;
        $data->update();
        $reset_link = url('admin/reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br>';
        $message .= '<a href="' . $reset_link . '">Click Here</a>';
        Mail::to($request->email)->send(new WebsiteMail($subject, $message));
        return redirect()->route('admin_login')->with('success', 'Reset Link Sent to Your Email');
    }

    public function reset_password($token, $email)
    {
        $data = Admin::where('token', $token)->where('email', $email)->first();
        if (!$data) {
            return redirect()->route('admin_login');
        }
        return view('admin.reset_password', compact('token', 'email'));
    }


    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);
        $data = Admin::where('token', $request->token)->where('email', $request->email)->first();
        $data->password = Hash::make($request->password);
        $data->token = '';
        $data->update();
        return redirect()->route('admin_login')->with('success', 'Password Changed Successfully');
    }
}
