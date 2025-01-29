@extends('Admin.layout.app')
@section('title-content','Create Testimonial')
@section('right_top_button')
<a href="{{ route('admin_testimonial_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Sides</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_testimonial_store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Photo * 300*300</label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Designation *</label>
                                                    <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                                                </div>
                                                      <div class="mb-4">
                                                    <label class="form-label">comment *</label>
                                                    <textarea name="comment" class="form-control h_100" cols="30" rows="10" >{{ old('comment') }}</textarea>
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