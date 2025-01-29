<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->video_gallery_status == 1) {
            $videos = Video::paginate(12);
            return view('frontend.video_gallery', compact('videos'));
        } else {
            return redirect()->back();
        }
    }
}