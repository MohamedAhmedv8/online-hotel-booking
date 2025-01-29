<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->privacy_status == 1) {
            return view('frontend.privacy', compact('page_data'));
        } else {
            return redirect()->back();
        }
    }
}
