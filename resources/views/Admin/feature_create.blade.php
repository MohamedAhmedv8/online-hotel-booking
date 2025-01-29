@extends('Admin.layout.app')
@section('title-content','Create Feature')
@section('right_top_button')
<a href="{{ route('admin_feature_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Features</a>
@endsection
@section('body')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_feature_store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Icon *</label>
                                        <input type="text" class="form-control" name="icon">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Heading *</label>
                                        <input type="text" class="form-control" name="heading" value="{{ old('heading') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Text</label>
                                        <textarea name="text" class="form-control h_100" cols="30" rows="10" >{{ old('text') }}</textarea>
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