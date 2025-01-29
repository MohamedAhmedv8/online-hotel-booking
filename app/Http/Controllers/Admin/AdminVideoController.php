<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('Admin.video_view', compact('videos'));
    }
    public function create()
    {
        return view('Admin.video_create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'video_id' => 'required',
        ]);
        $new_video['video_id'] = $request->video_id;
        $new_video['caption'] = $request->caption;
        Video::create($new_video);
        return redirect()->route('admin_video_view')->with('success', 'Video save');
    }
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('Admin.video_edit', compact('video'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'video_id' => 'required',
        ]);
        $video = Video::findOrFail($id);
        $video['video_id'] = $request->video_id;
        $video['caption'] = $request->caption;
        $video->update();
        return redirect()->route('admin_video_view')->with('success', 'Video updated');
    }
    public function delete($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect()->back()->with('success', 'Video deleted');
    }
}