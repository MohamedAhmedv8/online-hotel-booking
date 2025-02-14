@extends('Admin.layout.app')
@section('title-content','Create Post')
@section('right_top_button')
<a href="{{ route('admin_post_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Posts</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_post_store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Photo *</label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Short Content *</label>
                                                    <textarea name="short_content" class="form-control h_100" cols="30" rows="10" >{{ old('short_content') }}</textarea>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Content *</label>
                                                    <textarea name="content" class="form-control snote" cols="30" rows="10" >{{ old('content') }}</textarea>
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