@extends('Admin.layout.app')
@section('title-content','Edit Video')
@section('right_top_button')
<a href="{{ route('admin_video_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Video</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_video_update',$video->id) }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Video Preview</label>
                                                    <div class="iframe-container1">
                                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                    </div>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Video</label>
                                                    <input type="text" class="form-control" name="video_id">
                                                </div>
                                               <div class="mb-4">
                                                   <label class="form-label">Caption</label>
                                                    <textarea name="caption" class="form-control h_100" cols="30" rows="10" >{{ $video->caption }}</textarea>
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