@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/location/css/location.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    {{-- <style>
        .bg-gray{
            background: #ccc;
        }
        .city_alphabets{
            text-align: center;
        }
        .city_alphabets li{
list-style: none;
display: inline-block;

        }
    </style> --}}
@endsection
@section('content')
    <div class="bravo_detail_location">
        {{-- @include('Location::frontend.layouts.details.location-banner') --}}
        <div class="bravo_content">
            <div class="container">
                {{-- <div class="row bg-gray">
                    <div class="col-md-12">
                        <ul class="city_alphabets">
                            <li><a href="#">A</a></li>
                            <li><a href="#">A</a></li>
                            <li><a href="#">A</a></li>
                            <li><a href="#">A</a></li>
                            <li><a href="#">A</a></li>
                        </ul>
                    </div>
                </div> --}}
                <div class="row py-5">

                    <div class="col-md-12 mb-3"><h3>All Cities</h3></div>
                    @foreach ($row as $item)
                  
                        <div class="col-md-3 mb-3"><a href="{{$item->slug}}" class="city-anchor">{{$item->name}}</a></div>
                   
                    @endforeach


                </div>



            </div>

        </div>
    </div>
@endsection

@section('footer')



    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
@endsection
