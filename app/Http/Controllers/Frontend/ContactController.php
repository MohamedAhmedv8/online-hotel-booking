<?php

namespace App\Http\Controllers\Frontend;

use Validator;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Admin;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->contact_status == 1) {
            return view('frontend.contact', compact('page_data'));
        } else {
            return redirect()->back();
        }
    }
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {

            // Send email
            $subject = 'Contact form email';
            $message = 'Visitor email information: <br>';
            $message .= '<br>Name: ' . $request->name;
            $message .= '<br>Email: ' . $request->email;
            $message .= '<br>Message: ' . $request->message;
            $admin_data = Admin::where('id', 1)->first();
            $admin_email = $admin_data->email;
            Mail::to($admin_email)->send(new WebsiteMail($subject, $message));
            return response()->json(['code' => 1, 'success_message' => 'Email is sent successfully']);
        }
    }
}