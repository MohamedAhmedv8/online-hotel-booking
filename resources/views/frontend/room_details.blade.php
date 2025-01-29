@extends('frontend.layout.app')
@section('body')
        <div class="page-top">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $room_details->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content room-detail">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-12 left">
                        <div class="room-detail-carousel owl-carousel">
                    {{-- <div class="item" style="background-image:url({{ asset('storage/'.$room_details->featured_photo) }})">
                        <div class="bg"></div>
                    </div> --}}
                        <div class="item">
                            <img src="{{ asset('storage/'.$room_details->featured_photo) }}" alt="">
                            <div class="bg"></div>
                        </div>
                        @foreach($room_details->RoomPhotos as $roomPhoto) 
                            <div class="item">
                                <img src="{{ asset('storage/'.$roomPhoto->photo) }}" alt="">
                                <div class="bg"></div>
                            </div>
                        @endforeach
                        </div>
                        <div class="description">
                            {!! $room_details->description !!}
                        </div>
                        <div class="amenity">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Amenities</h2>
                                </div>
                            </div>
                            <div class="row">
                                @php
                                $arr = explode(',',$room_details->amenities);
                                for($j=0;$j<count($arr);$j++) {
                                    $temp_row = \App\Models\Amenity::where('id',$arr[$j])->first();
                                    echo '<div class="col-lg-6 col-md-12">';
                                    echo '<div class="item"><i class="fa fa-check-circle"></i> '.$temp_row->name.'</div>';
                                    echo '</div>';
                                }
                                @endphp
                            </div>
                        </div>
                        <div class="feature">
                            <div class="row">
                                <div class="col-md-12">
                                    <h2>Features</h2>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Room Size</th>
                                        <td>{{$room_details->size }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Beds</th>
                                        <td>{{$room_details->total_beds }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Bathrooms</th>
                                        <td>{{$room_details->total_bathrooms }}</td>
                                    </tr>
                                    <tr>
                                        <th>Number of Balconies</th>
                                        <td>{{$room_details->total_balconies }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @if ($room_details->video_id)
                        <div class="video">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$room_details->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 right">
                        <div class="sidebar-container" id="sticky_sidebar">
                                <div class="widget">
                                        <h2>Room Price per Night</h2>
                                    <div class="price">
                                        {{$room_details->price }}
                                    </div>
                                </div>
                            <div class="widget">
                                <h2>Reserve This Room</h2>
                                <form action="{{ route('cart_submit') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{ $room_details->id }}">
                                    <div class="form-group mb_20">
                                        <label for="">Check in & Check out</label>
                                        <input type="text" name="checkin_checkout" class="form-control daterange1" placeholder="Checkin & Checkout">
                                    </div>
                                    <div class="form-group mb_20">
                                        <label for="">Adult</label>
                                        <input type="number" name="adult" class="form-control" min="1" max="30" placeholder="Adults">
                                    </div>
                                    <div class="form-group mb_20">
                                        <label for="">Children</label>
                                        <input type="number" name="children" class="form-control" min="0" max="30" placeholder="Children">
                                    </div>
                                    <button type="submit" class="book-now">Add to Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection