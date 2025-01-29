@extends('Admin.layout.app')
@section('title-content','Edit Terms and Conditions Page')
{{-- @section('right_top_button')
<a href="{{ route('admin_video_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Video</a>
@endsection --}}
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_page_terms_update') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                    <input type="text" class="form-control" name="terms_heading" value="{{ $page_data->terms_heading }}">
                                                </div>
                                               <div class="mb-4">
                                                   <label class="form-label">Content *</label>
                                                    <textarea name="terms_content" class="form-control snote" cols="30" rows="10" >{{ $page_data->terms_content }}</textarea>
                                                </div>
                                                    <div class="mb-4">
                                                    <label class="form-label">Heading *</label>
                                                <select class="form-control" name="terms_status" id="">
                                                    <option value="1" @if ($page_data->terms_status ==1) selected @endif>Show</option>
                                                    <option value="0" @if ($page_data->terms_status ==0) selected @endif>Hide</option>
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