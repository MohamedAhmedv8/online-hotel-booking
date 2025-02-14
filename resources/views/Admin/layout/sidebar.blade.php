<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_home') }}">Home</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_home') }}"></a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('admin/home')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_home') }}" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Home"><i class="fa fa-home"></i> <span>Home</span></a></li>
            
            <li class="nav-item dropdown  {{ Request::is('admin/amenity/view')||Request::is('admin/room/view')? 'active' :'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-superpowers"></i><span>Room Section</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/amenity/view')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_amenity_view') }}"><i class="fa fa-angle-right"></i>Amenities</a></li>
                    <li class="{{ Request::is('admin/room/view')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_room_view') }}"><i class="fa fa-angle-right"></i>Rooms</a></li>
                </ul>
            </li>   

            <li class="nav-item dropdown {{ Request::is('admin/page/about')||Request::is('admin/page/terms')||Request::is('admin/page/privacy')||Request::is('admin/page/contact')||Request::is('admin/page/photo-gallery')||Request::is('admin/page/video-gallery')||Request::is('admin/page/faq')||Request::is('admin/page/blog')||Request::is('admin/page/room')||Request::is('admin/page/cart')||Request::is('admin/page/checkout')||Request::is('admin/page/payment')||Request::is('admin/page/signup')||Request::is('admin/page/login')? 'active' :'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-file-text-o"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/page/about')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_about') }}"><i class="fa fa-angle-right"></i>About</a></li>
                    <li class="{{ Request::is('admin/page/terms')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_terms') }}"><i class="fa fa-angle-right"></i>Terms and Conditions</a></li>
                    <li class="{{ Request::is('admin/page/privacy')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_privacy') }}"><i class="fa fa-angle-right"></i>privacy Policy</a></li>
                    <li class="{{ Request::is('admin/page/contact')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_contact') }}"><i class="fa fa-angle-right"></i>Contact</a></li>
                    <li class="{{ Request::is('admin/page/photo-gallery')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_photo_gallery') }}"><i class="fa fa-angle-right"></i>Photo Gallery</a></li>
                    <li class="{{ Request::is('admin/page/video-gallery')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_video_gallery') }}"><i class="fa fa-angle-right"></i>Video Gallery</a></li>
                    <li class="{{ Request::is('admin/page/faq')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_faq') }}"><i class="fa fa-angle-right"></i>FAQ</a></li>
                    <li class="{{ Request::is('admin/page/blog')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_blog') }}"><i class="fa fa-angle-right"></i>Blog</a></li>
                    <li class="{{ Request::is('admin/page/room')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_room') }}"><i class="fa fa-angle-right"></i>Room</a></li>
                    <li class="{{ Request::is('admin/page/cart')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_cart') }}"><i class="fa fa-angle-right"></i>Cart</a></li>
                    <li class="{{ Request::is('admin/page/checkout')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_checkout') }}"><i class="fa fa-angle-right"></i>Checkout</a></li>
                    <li class="{{ Request::is('admin/page/payment')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_payment') }}"><i class="fa fa-angle-right"></i>Payment</a></li>
                     <li class="{{ Request::is('admin/page/signup')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_signup') }}"><i class="fa fa-angle-right"></i>Sign Up</a></li>
                    <li class="{{ Request::is('admin/page/login')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_page_login') }}"><i class="fa fa-angle-right"></i>Login</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown  {{ Request::is('admin/subscribers')||Request::is('admin/subscribers/send-email')? 'active' :'' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fa fa-handshake-o"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscribers')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_subscribers_list') }}"><i class="fa fa-angle-right"></i>Subscribers List</a></li>
                    <li class="{{ Request::is('admin/subscribers/send-email')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_subscribers_send_email') }}"><i class="fa fa-angle-right"></i>Send Email</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/available-rooms')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_available_rooms') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Available Rooms"><i class="fa fa-check-circle"></i> <span>Available Rooms</span></a></li>
            <li class="{{ Request::is('admin/settings')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_settings') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Settings"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
            <li class="{{ Request::is('admin/customer-list')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_customer_list_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Customer List"><i class="fa fa-address-card"></i> <span>Customer List</span></a></li>
            <li class="{{ Request::is('admin/order/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_orders') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Orders"><i class="fa fa-database"></i> <span>Orders</span></a></li>
            <li class="{{ Request::is('admin/slide/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_slide_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Slides"><i class="fa fa-sliders "></i> <span>Slides</span></a></li>
            <li class="{{ Request::is('admin/feature/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_feature_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Features"><i class="fa fa-cubes"></i> <span>Features</span></a></li>
            <li class="{{ Request::is('admin/testimonial/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_testimonial_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Testimonials"><i class="fa fa-pencil-square-o"></i> <span>Testimonials</span></a></li>
            <li class="{{ Request::is('admin/post/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_post_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Posts"><i class="fa fa-folder-open-o"></i> <span>Posts</span></a></li>
            <li class="{{ Request::is('admin/photo/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_photo_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Photo Gallery"><i class="fa fa-camera"></i> <span>Photo Gallery</span></a></li>
            <li class="{{ Request::is('admin/video/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_video_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Video Gallery"><i class="fa fa-video-camera"></i> <span>Video Gallery</span></a></li>
            <li class="{{ Request::is('admin/faq/*')? 'active' :'' }}"><a class="nav-link" href="{{ route('admin_faq_view') }}"data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Faq"><i class="fa fa-eercast"></i> <span>Faq</span></a></li>
        </ul>
    </aside>
</div>