<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('Admin.post_view', compact('posts'));
    }


    public function create()
    {
        return view('Admin.post_create');
    }

    public function store(Request $request)
    {
        $new_post = $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
        ]);
        $photo = Storage::putFile("Posts", $request->photo);
        $new_post['photo'] = $photo;
        $new_post['heading'] = $request->heading;
        $new_post['short_content'] = $request->short_content;
        $new_post['content'] = $request->content;
        $new_post['total_view'] = 1;
        Post::create($new_post);
        return redirect()->route('admin_post_view')->with('success', 'Post save');
    }



    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('Admin.post_edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'photo' => 'image|mimes:jpg,jpeg,png',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required',
        ]);
        $post = Post::findOrFail($id);
        if ($request->hasFile('photo')) {
            Storage::delete($post->photo);
            $photo = Storage::putFile("Posts", $request->photo);
            $post['photo'] = $photo;
        }
        $post['heading'] = $request->heading;
        $post['short_content'] = $request->short_content;
        $post['content'] = $request->content;
        $post->update();
        return redirect()->route('admin_post_view')->with('success', 'Post updated');
    }
    public function delete($id)
    {
        $post = Post::findOrFail($id);
        Storage::delete($post->photo);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted');
    }
}