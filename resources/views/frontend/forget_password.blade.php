@extends('frontend.layout.app')
@section('body')
    <div class="page-top">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Forget Password</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div class="login-form">
                        <form action="{{ route("customer_forget_password_submit") }}" method="post">
                            @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary bg-website">Submit</button>
                        </div>
                        <a href="{{ route('customer_login') }}" class="primary-color">Back to Login Page</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection