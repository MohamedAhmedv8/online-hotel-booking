<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Post;
use App\Models\Room;
use App\Models\Setting;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $features = Feature::all();
        $testimonials = Testimonial::all();
        $rooms= Room::all();
        $posts = Post::orderBy('id', 'desc')->limit(3)->get();


        return view('frontend.home', compact('slides', 'features', 'testimonials', 'posts','rooms'));
    }
}