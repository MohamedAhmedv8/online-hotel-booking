@extends('Admin.layout.app')
@section('title-content','View Features')
@section('right_top_button')
<a href="{{ route('admin_feature_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
@endsection
@section('body')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example1">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Icon</th>
                                    <th>Heading</th>
                                    <th>Text</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($features as $feature)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="{{ $feature->icon }} fz_30"></i></td>
                                    <td>{{ $feature->heading }}</td>
                                    <td>{{ $feature->text }}</td>
                                    <td class="pt_10 pb_10">
                                        <a href="{{ route('admin_feature_edit',$feature->id) }}" class="btn btn-primary">Edit</a>
                                        <a href="{{ route('admin_feature_delete',$feature->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection