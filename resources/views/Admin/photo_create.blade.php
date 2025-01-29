@extends('Admin.layout.app')
@section('title-content','Create Photo')
@section('right_top_button')
<a href="{{ route('admin_photo_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Sides</a>
@endsection
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_photo_store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Photo *</label>
                                                    <input type="file" class="form-control" name="photo">
                                                </div>
                                               <div class="mb-4">
                                                    <label class="form-label">Caption *</label>
                                                    <textarea name="caption" class="form-control h_100" cols="30" rows="10" >{{ old('caption') }}</textarea>
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