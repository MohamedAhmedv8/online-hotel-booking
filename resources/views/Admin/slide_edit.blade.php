@extends('Admin.layout.app')
@section('title-content','Edit Slide')
@section('right_top_button')
<a href="{{ route('admin_slide_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Sides</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_slide_update',$slide->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <img src="{{ asset('storage/'.$slide->photo) }}" alt="" class="w_300">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Photo</label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Heading</label>
                                                    <input type="text" class="form-control" name="heading" value="{{ $slide->heading }}">
                                                </div>
                                               <div class="mb-4">
                                                   <label class="form-label">Text</label>
                                                    <textarea name="text" class="form-control h_100" cols="30" rows="10" >{{ $slide->text }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Button Text</label>
                                                    <input type="text" class="form-control" name="button_text" value="{{ $slide->button_text }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Button URL</label>
                                                    <input type="text" class="form-control" name="button_url" value="{{ $slide->button_url }}">
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