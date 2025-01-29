<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Page;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->faq_status == 1) {
            $faqs = Faq::all();
            return view('frontend.faq', compact('faqs'));
        } else {
            return redirect()->back();
        }
    }
}
