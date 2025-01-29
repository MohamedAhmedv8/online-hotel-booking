<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminSubscriberController extends Controller
{
    public function subscribers_list()
    {
        $subscribers = Subscriber::where('status', 1)->get();
        return view('admin.subscriber_view', compact('subscribers'));
    }
    public function send_email()
    {
        return view('admin.subscriber_send_email');
    }
    public function send_email_submit(Request $request)
    {
        $new_email = $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);
        // Send Email
        $subject = $request->subject;
        $message = $request->message;
        $subscribers_list = Subscriber::where('status', 1)->get();
        foreach ($subscribers_list as $subscriber) {
            Mail::to($subscriber->email)->send(new WebsiteMail($subject, $message));
        }
        return redirect()->back()->with('success', 'Email sent successfully to all subscribers.');
    }
}