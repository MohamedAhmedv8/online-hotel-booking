@extends('Admin.layout.app')
@section('title-content','Home Page')
@section('body')
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Completed Orders</h4>
                </div>
                <div class="card-body">
                    {{ $total_completed_order }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fa fa-cart-plus"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pending Orders</h4>
                </div>
                <div class="card-body">
                    {{ $total_pending_order }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fa fa-user-plus"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Active Customers</h4>
                </div>
                <div class="card-body">
                    {{ $total_completed_customers }}
                </div>
            </div>
        </div>
    </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fa fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Pending Customers</h4>
                </div>
                <div class="card-body">
                    {{ $total_pending_customers }}
                </div>
            </div>
        </div>
    </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fa fa-home"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Rooms</h4>
                </div>
                <div class="card-body">
                    {{ $total_rooms }}
                </div>
            </div>
        </div>
    </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="fa fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Subscribers</h4>
                </div>
                <div class="card-body">
                    {{ $total_subscribers }}
                </div>
            </div>
        </div>
    </div>
</div>




<div class="row">
    <div class="col-md-12">
        <section class="section">
            <div class="section-header">
                <h1>Recent Orders</h1>
            </div>
        </section>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Order No</th>
                                            <th>Payment Method</th>
                                            <th>Booking Date</th>
                                            <th>Paid Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->order_no }}</td>
                                            <td>{{ $order->payment_method }}</td>
                                            <td>{{ $order->booking_date }}</td>
                                            <td>{{ $order->paid_amount }}</td>
                                            <td class="pt_10 pb_10">
                                                <a href="{{ route('admin_invoice',$order->id) }}" class="btn btn-primary">Detail</a>
                                                <a href="{{ route('admin_order_delete',$order->id) }}" class="btn btn-danger" onClick="return confirm('Are you sure?');">Delete</a>
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
    </div>
</div>

@endsection