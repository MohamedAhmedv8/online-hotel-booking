@extends('Admin.layout.app')
@section('title-content','Edit Testimonial')
@section('right_top_button')
<a href="{{ route('admin_testimonial_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Sides</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_testimonial_update',$testimonial->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <img src="{{ asset('storage/'.$testimonial->photo) }}" alt="" class="w_300">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Change Photo</label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{ $testimonial->name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Designation</label>
                                                    <input type="text" class="form-control" name="designation" value="{{ $testimonial->designation }}">
                                                </div>
                                                <div class="mb-4">
                                                   <label class="form-label">Comment</label>
                                                    <textarea name="comment" class="form-control h_100" cols="30" rows="10" >{{ $testimonial->comment }}</textarea>
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