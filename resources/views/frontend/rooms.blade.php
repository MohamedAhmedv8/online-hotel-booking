@extends('frontend.layout.app')
@section('body')
    <div class="page-top">
        <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $global_page_data->room_heading }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="home-rooms">
                            <div class="container">
                                <div class="row">
                                @foreach ($rooms as $room)
                                    <div class="col-md-3">
                                        <div class="inner">
                                            <div class="photo">
                                                <img src="{{ asset('storage/'.$room->featured_photo) }}" alt="">
                                            </div>
                                            <div class="text">
                                                <h2><a href="{{ route('room_details',$room->id) }}">{{ $room->name }}</a></h2>
                                                <div class="price">
                                                    {{ $room->price .'\Night'}}
                                                </div>
                                                <div class="button">
                                                    <a href="{{ route('room_details',$room->id) }}" class="btn btn-primary">See Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    {{ $rooms->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection