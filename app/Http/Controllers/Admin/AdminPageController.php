<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    public function about()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_about', compact('page_data'));
    }

    public function about_update(Request $request)
    {
        $request->validate([
            'about_heading' => 'required',
            'about_content' => 'required',
        ]);
        $page_about = Page::where('id', 1)->first();
        $page_about['about_heading'] = $request->about_heading;
        $page_about['about_content'] = $request->about_content;
        $page_about['about_status'] = $request->about_status;
        $page_about->update();
        return redirect()->back()->with('success', 'Page updated');
    }


    // terms
    public function terms()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_terms', compact('page_data'));
    }

    public function terms_update(Request $request)
    {
        $request->validate([
            'terms_heading' => 'required',
            'terms_content' => 'required',
        ]);
        $page_terms = Page::where('id', 1)->first();
        $page_terms['terms_heading'] = $request->terms_heading;
        $page_terms['terms_content'] = $request->terms_content;
        $page_terms['terms_status'] = $request->terms_status;
        $page_terms->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // privacy
    public function privacy()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_privacy', compact('page_data'));
    }

    public function privacy_update(Request $request)
    {
        $request->validate([
            'privacy_heading' => 'required',
            'privacy_content' => 'required',
        ]);
        $page_privacy = Page::where('id', 1)->first();
        $page_privacy['privacy_heading'] = $request->privacy_heading;
        $page_privacy['privacy_content'] = $request->privacy_content;
        $page_privacy['privacy_status'] = $request->privacy_status;
        $page_privacy->update();
        return redirect()->back()->with('success', 'Page updated');
    }

    // contact
    public function contact()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_contact', compact('page_data'));
    }

    public function contact_update(Request $request)
    {
        $request->validate([
            'contact_heading' => 'required',
        ]);
        $page_contact = Page::where('id', 1)->first();
        $page_contact['contact_heading'] = $request->contact_heading;
        $page_contact['contact_map'] = $request->contact_map;
        $page_contact['contact_status'] = $request->contact_status;
        $page_contact->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // Photo Gallery
    public function photo_gallery()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_photo_gallery', compact('page_data'));
    }

    public function photo_gallery_update(Request $request)
    {
        $request->validate([
            'photo_gallery_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['photo_gallery_heading'] = $request->photo_gallery_heading;
        $page_data['photo_gallery_status'] = $request->photo_gallery_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // video Gallery
    public function video_gallery()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_video_gallery', compact('page_data'));
    }

    public function video_gallery_update(Request $request)
    {
        $request->validate([
            'video_gallery_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['video_gallery_heading'] = $request->video_gallery_heading;
        $page_data['video_gallery_status'] = $request->video_gallery_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // FAQ
    public function faq()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_faq', compact('page_data'));
    }

    public function faq_update(Request $request)
    {
        $request->validate([
            'faq_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['faq_heading'] = $request->faq_heading;
        $page_data['faq_status'] = $request->faq_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // Blog
    public function blog()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_blog', compact('page_data'));
    }
    public function blog_update(Request $request)
    {
        $request->validate([
            'blog_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['blog_heading'] = $request->blog_heading;
        $page_data['blog_status'] = $request->blog_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }


    // Room
    public function room()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_room', compact('page_data'));
    }
    public function room_update(Request $request)
    {
        $request->validate([
            'room_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['room_heading'] = $request->room_heading;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }


    // Cart
    public function cart()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_cart', compact('page_data'));
    }
    public function cart_update(Request $request)
    {
        $request->validate([
            'cart_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['cart_heading'] = $request->cart_heading;
        $page_data['cart_status'] = $request->cart_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // Checkout
    public function checkout()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_checkout', compact('page_data'));
    }
    public function checkout_update(Request $request)
    {
        $request->validate([
            'checkout_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['checkout_heading'] = $request->checkout_heading;
        $page_data['checkout_status'] = $request->checkout_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }
    // Payment
    public function payment()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_payment', compact('page_data'));
    }
    public function payment_update(Request $request)
    {
        $request->validate([
            'payment_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['payment_heading'] = $request->payment_heading;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }

    // Signup
    public function signup()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_signup', compact('page_data'));
    }
    public function signup_update(Request $request)
    {
        $request->validate([
            'signup_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['signup_heading'] = $request->signup_heading;
        $page_data['signup_status'] = $request->signup_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }

    // Login
    public function login()
    {
        $page_data = Page::where('id', 1)->first();
        return view('admin.page_login', compact('page_data'));
    }
    public function login_update(Request $request)
    {
        $request->validate([
            'login_heading' => 'required',
        ]);
        $page_data = Page::where('id', 1)->first();
        $page_data['login_heading'] = $request->login_heading;
        $page_data['login_status'] = $request->login_status;
        $page_data->update();
        return redirect()->back()->with('success', 'Page updated');
    }
}