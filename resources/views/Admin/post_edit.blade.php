@extends('Admin.layout.app')
@section('title-content','Edit Post')
@section('right_top_button')
<a href="{{ route('admin_post_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Posts</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_post_update',$post->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <img src="{{ asset('storage/'.$post->photo) }}" alt="" class="w_300">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Photo</label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">heading</label>
                                                    <input type="text" class="form-control" name="heading" value="{{ $post->heading }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Short Content</label>
                                                    <input type="text" class="form-control" name="short_content" value="{{ $post->short_content }}">
                                                </div>
                                                <div class="mb-4">
                                                   <label class="form-label">content</label>
                                                    <textarea name="content" class="form-control snote" cols="30" rows="10" >{{ $post->content }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label"></label>
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection