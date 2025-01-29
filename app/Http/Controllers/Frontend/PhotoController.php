<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->photo_gallery_status == 1) {
            $photos = Photo::paginate(12);
            return view('frontend.photo_gallery', compact('photos'));
        } else {
            return redirect()->back();
        }
    }
}