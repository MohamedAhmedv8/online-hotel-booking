<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    public function send_email(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
        ]);
        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error_message' => $validator->errors()->toArray()]);
        } else {
            $token = hash('sha256', time());
            $obj = new Subscriber();
            $obj->email = $request->email;
            $obj->token = $token;
            $obj->status = 0;
            $obj->save();
            $verification_link = url('subscriber/verify/' . $request->email . '/' . $token);
            // Send email
            $subject = 'Subscriber Verification';
            $message = 'Please click on the link below to confirm subscription:<br>';
            $message .= '<a href="' . $verification_link . '">';
            $message .= $verification_link;
            $message .= '</a>';
            Mail::to($request->email)->send(new WebsiteMail($subject, $message));
            return response()->json(['code' => 1, 'success_message' => 'Please chick your email for verification.']);
        }
    }
    public function verify(Request $request)
    {
        $subscriber_data = Subscriber::where('email', $request->email)->where('token', $request->token)->first();
        if ($subscriber_data) {
            $subscriber_data->token = '';
            $subscriber_data->status = 1;
            $subscriber_data->update();
            return redirect()->route('home')->with('success', 'Your subscription is verified successfully!');
        } else {
            return redirect()->route('home');
        }
    }
}