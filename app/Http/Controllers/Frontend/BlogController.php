<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $page_data = Page::where('id', 1)->first();
        if ($page_data->blog_status == 1) {
            $posts = Post::orderBy('id', 'desc')->paginate(9);
            return view('frontend.blog', compact('posts'));
        } else {
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $view = $post->total_view + 1;
        $post->update(['total_view' => $view]);
        return view('frontend.post', compact('post'));
    }
}
