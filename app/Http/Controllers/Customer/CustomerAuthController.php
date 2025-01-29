<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CustomerAuthController extends Controller
{
    public function signup()
    {
        return view('Frontend.signup');
    }
    public function login()
    {
        return view('Frontend.login');
    }
    public function signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $token = hash('sha256', time());
        $password=Hash::make($request->password);
        $obj = new Customer();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->password = $password;
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verification_link=url('signup/verify/'.$request->email.'/'.$token);
        $subject = 'Sign Up Verification';
        $message = 'Please click on the link below to confirm Sign Up:<br>';
        $message .= '<a href="' . $verification_link . '">';
        $message .= $verification_link;
        $message .= '</a>';
        Mail::to($request->email)->send(new WebsiteMail($subject, $message));
        return redirect()->back()->with('success','data save go ckeck');
    }
    public function verify($email,$token)
    {
        $customer_data = Customer::where('email', $email)->where('token', $token)->first();
        if ($customer_data) {
            $customer_data->token = '';
            $customer_data->status = 1;
            $customer_data->update();
            return redirect()->route('customer_login')->with('success', 'Your Account is verified successfully!');
        } else {
            return redirect()->route('home');
        }
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        return redirect()->route('home');
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
            'status' => 1
        ];
        if (Auth::guard('customer')->attempt($credential)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('customer_login')->with('error', 'Invalid Email or Password');
        }
    }
    public function forget_password()
    {
        return view('Frontend.forget_password');
    }
    public function forget_password_submit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
        $data = Customer::where('email', $request->email)->first();
        if (!$data) {
            return redirect()->back()->with('error', 'Email Not Found');
        }
        $token = hash('sha256', time());
        $data->token = $token;
        $data->update();

        $reset_link = url('reset-password/' . $request->email. '/'. $token );
        $subject = 'Reset Password';
        $message = 'Please click on the following link to reset the password: <br>';
        $message .= '<a href="' . $reset_link . '">Click Here</a>';
        Mail::to($request->email)->send(new WebsiteMail($subject, $message));
        return redirect()->route('customer_login')->with('success', 'Reset Link Sent to Your Email');
    }
    public function reset_password($email,$token)
    {
       $data = Customer::where('email', $email)->where('token', $token)->first();
        if ($data) {
            return view('frontend.reset_password', compact('token', 'email'));
        }
        return redirect()->route('customer_login');
    }
    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
        $data = Customer::where('email', $request->email)->where('token', $request->token)->first();
        $data->password = Hash::make($request->password);
        $data->token = '';
        $data->update();
        return redirect()->route('customer_login')->with('success', 'Password Changed Successfully');
    }
}
