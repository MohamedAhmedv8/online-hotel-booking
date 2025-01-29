@extends('Admin.layout.app')
@section('title-content','Create Amenity')
@section('right_top_button')
<a href="{{ route('admin_amenity_view') }}" class="btn btn-primary"><i class="fa fa-eye"></i> All Amenities</a>
@endsection
@section('body')
    <div class="section-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin_amenity_store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-4">
                                        <label class="form-label">Name *</label>
                                        <input type="text" class="form-control" name="name">
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