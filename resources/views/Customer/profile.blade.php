@extends('Customer.layout.app')
@section('title-content','Edit Profile')
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('customer_profile_submit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                @if(Auth::guard('customer')->user()->photo)
                                                <img src="{{ asset('storage/'.Auth::guard('customer')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                                @else
                                                  <img src="{{ asset('uploads/default.png') }}" alt="" class="profile-photo w_100_p">
                                                @endif
                                                <input type="file" class="form-control mt_10" name="photo">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Name *</label>
                                                            <input type="text" class="form-control" name="name" value="{{ Auth::guard('customer')->user()->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Email *</label>
                                                            <input type="text" class="form-control" name="email" value="{{ Auth::guard('customer')->user()->email }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">phone</label>
                                                            <input type="text" class="form-control" name="phone" value="{{ Auth::guard('customer')->user()->phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">zip</label>
                                                            <input type="text" class="form-control" name="zip"value="{{ Auth::guard('customer')->user()->zip }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">country</label>
                                                            <input type="text" class="form-control" name="country"value="{{ Auth::guard('customer')->user()->country }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">city</label>
                                                            <input type="text" class="form-control" name="city"value="{{ Auth::guard('customer')->user()->city }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">address</label>
                                                            <input type="text" class="form-control" name="address"value="{{ Auth::guard('customer')->user()->address }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">state</label>
                                                            <input type="text" class="form-control" name="state"value="{{ Auth::guard('customer')->user()->state }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-4">
                                                            <label class="form-label">Confirm Password</label>
                                                            <input type="password" class="form-control" name="confirm_password">
                                                        </div>
                                                    </div>
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


