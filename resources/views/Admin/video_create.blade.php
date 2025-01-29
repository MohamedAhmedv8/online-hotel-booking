@extends('Admin.layout.app')
@section('title-content','Create Video')
@section('right_top_button')
<a href="{{ route('admin_video_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Videos</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_video_store') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Video ID *</label>
                                                    <input type="text" class="form-control" name="video_id">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Caption *</label>
                                                    <input type="text" class="form-control" name="caption" value="{{ old('caption') }}">
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