@extends('Admin.layout.app')
@section('title-content','View Testimonials')
@section('right_top_button')
<a href="{{ route('admin_testimonial_create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
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
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Designation</th>
                                                <th>Comment</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($testimonials as $testimonial)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><img src="{{ asset('storage/'.$testimonial->photo) }}" alt="" class="w_100"></td>
                                                <td>{{ $testimonial->name }}</td>
                                                <td>{{ $testimonial->designation }}</td>
                                                <td>{{ $testimonial->comment }}</td>
                                                <td class="pt_10 pb_10">
                                                    <a href="{{ route('admin_testimonial_edit',$testimonial->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin_testimonial_delete',$testimonial->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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