@extends('master')

@section('title')
    ایران باگت
@endsection

@section('content')
    <div class="container-fluid mt-2">
        <div class="row p-2"></div>
        <div class="row mb-3 justify-content-center" style="overflow-x: hidden; direction: ltr !important">
        @foreach($restaurants as $restaurant)
                <a href="{{url('restaurant/'.$restaurant->id)}}" style="color: white">
                    <div class="res-ads ads-parent position-relative m-3 mt-2">
{{--                        <a href="#" style="color: #fff">--}}
                            <img class="img-fluid w-100 h-100" src="{{ asset('upload/'.$restaurant->pics[0]) }}">
                            <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                               {{ $restaurant->options->address ?? 'آدرسی ندارد' }}
                            </span>
{{--                        </a>--}}
                    </div>
                </a>
        @endforeach
        </div>


    </div>

@endsection
