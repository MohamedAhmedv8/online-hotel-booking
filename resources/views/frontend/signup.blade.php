@extends('frontend.layout.app')
@section('body')
        <div class="page-top">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $global_page_data->signup_heading }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-4">
                        <div class="login-form">
                            <form action="{{ route('customer_signup_submit') }}" method="post">
                                @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control">
                                @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address</label>
                                <input type="text" name="email" class="form-control">
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control">
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control">
                                @if($errors->has('confirm_password'))
                                    <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">Submit</button>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('customer_login') }}" class="primary-color">Existing User? Login Now</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection