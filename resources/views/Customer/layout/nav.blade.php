<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fa fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fa fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right btn-block justify-content-end">
        <li class="nav-link">
            <a href="{{ route('home') }}" class="btn btn-warning">Web</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::guard('customer')->user()->photo =='')
                    <img alt="image" src="{{ asset('uploads/default.png') }}" class="rounded-circle mr-1">
                @else
                    <img alt="image" src="{{ asset('storage/'.Auth::guard('customer')->user()->photo) }}" class="rounded-circle mr-1">
                @endif
                <div class="d-sm-none d-lg-inline-block">{{ Auth::guard('customer')->user()->name }}</div>
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('customer-profile') }}"><i class="fa fa-user"></i> Edit Profile</a></li>
                <li><a class="dropdown-item" href="{{ route('customer_logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>