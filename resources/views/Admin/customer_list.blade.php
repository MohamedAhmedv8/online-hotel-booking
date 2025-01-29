@extends('Admin.layout.app')
@section('title-content','Customer List')
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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>Address</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Zip</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/'.$customer->photo) }}" alt="" class="w_200"></td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->country }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->state }}</td>
                                    <td>{{ $customer->city }}</td>
                                    <td>{{ $customer->zip }}</td>
                                    <td class="pt_10 pb_10">
                                        @if($customer->status == 1)
                                            <a href="{{ route('admin_customer_change_status',$customer->id) }}" class="btn btn-success">Active</a>
                                            @else
                                            <a href="{{ route('admin_customer_change_status',$customer->id) }}" class="btn btn-danger">Pending</a>
                                        @endif
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