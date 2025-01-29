@extends('frontend.layout.app')
@section('body') 


        <div class="page-top">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $global_page_data->photo_gallery_heading }}</h2>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="page-content">
            <div class="container">
                <div class="photo-gallery">
                    <div class="row">

                        @foreach ($photos as $photo)
                            
 
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="photo-thumb">
                                <img src="{{ asset('storage/'.$photo->photo) }}" alt="">
                                <div class="bg"></div>
                                <div class="icon">
                                    <a href="{{ asset('storage/'.$photo->photo) }}" class="magnific"><i class="fa fa-plus"></i></a>
                                </div>
                            </div>
                            <div class="photo-caption">
                                {{ $photo->caption }}
                            </div>
                        </div>
                       @endforeach
        
                        <div class="col-md-12">
                            {{ $photos->links() }}
                        </div>
        
                    </div>
                </div>
            </div>
        </div>

@endsection