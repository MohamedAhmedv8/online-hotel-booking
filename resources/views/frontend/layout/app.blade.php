@include('frontend.layout.head')
    <body>
        <div class="top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 left-side">
                        <ul>
                            @if($global_setting_data->top_bar_phone)
                            <li class="phone-text">{{ $global_setting_data->top_bar_phone }}</li>
                            @endif
                            @if($global_setting_data->top_bar_email)
                            <li class="email-text">{{ $global_setting_data->top_bar_email }}</li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6 right-side">
                        <ul class="right">
                            @if($global_page_data->cart_status==1)
                            <li class="menu"><a href="{{ route('cart') }}">{{ $global_page_data->cart_heading }}@if(session()->has('cart_room_id'))<sup>{{ count(session()->get('cart_room_id')) }}</sup> @endif </a></li>
                            @endif
                            @if($global_page_data->checkout_status==1)
                            <li class="menu"><a href="{{ route('checkout') }}">{{ $global_page_data->checkout_heading }}</a></li>
                            @endif
                            @if(!Auth::guard('customer')->check())
                                @if($global_page_data->signup_status==1)
                                <li class="menu"><a href="{{ route('customer_signup') }}">{{ $global_page_data->signup_heading }}</a></li>
                                @endif
                                @if($global_page_data->login_status==1)
                                <li class="menu"><a href="{{ route('customer_login') }}">{{ $global_page_data->login_heading }}</a></li>
                                @endif
                            @else
                                <li class="menu"><a href="{{ route('customer_home') }}">Dashboard</a></li>
                                <li class="menu"><a href="{{ route('customer_logout') }}">Logout</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
@include('frontend.layout.nav')
@yield('body')
@include('frontend.layout.footer')