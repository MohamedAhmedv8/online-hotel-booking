@extends('Admin.layout.app')
@section('title-content','Edit Photo Gallery Page')
@section('body')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_page_photo_gallery_update') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Heading *</label>
                                        <input type="text" class="form-control" name="photo_gallery_heading" value="{{ $page_data->photo_gallery_heading }}">
                                    </div>
                                        <div class="mb-4">
                                        <label class="form-label">Status *</label>
                                    <select class="form-control" name="photo_gallery_status" id="">
                                        <option value="1"s @if ($page_data->photo_gallery_status ==1) selected @endif>Show</option>
                                        <option value="0" @if ($page_data->photo_gallery_status ==0) selected @endif>Hide</option>
                                    </select>
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