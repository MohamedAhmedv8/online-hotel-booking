@extends('Admin.layout.app')
@section('title-content','Edit Profile')
@section('body')
       <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form action="{{ route('admin_profile_submit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="{{ asset('storage/'.Auth::guard('admin')->user()->photo) }}" alt="" class="profile-photo w_100_p">
                                                <input type="file" class="form-control mt_10" name="photo">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="mb-4">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Email *</label>
                                                    <input type="text" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Password</label>
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                                <div class="mb-4">
                                                    <label class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" name="confirm_password">
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


