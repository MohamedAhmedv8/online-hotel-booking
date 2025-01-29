<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->about_status == 1) {
            return view('frontend.about', compact('page_data'));
        } else {
            return redirect()->back();
        }
    }
}