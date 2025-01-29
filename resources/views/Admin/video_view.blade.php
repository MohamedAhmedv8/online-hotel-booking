@extends('Admin.layout.app')
@section('title-content','View Videos')
@section('right_top_button')
<a href="{{ route('admin_video_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection
@section('body')
    <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="example1">
                                            <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Video Preview</th>
                                                <th>Caption</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($videos as $video)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                <div class="iframe-container1">
                                                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $video->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                                </div>
                                                </td>
                                                <td>{{ $video->caption }}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_video_edit',$video->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin_video_delete',$video->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection