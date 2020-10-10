@extends('master')

@section('title')
    خرید و معرفی بازی {{$game->name}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row"></div>
        <div class="row"></div>


        <div class="bg-white">

            <h1 class="alert alert-dark ">خرید و معرفی بازی {{$game->name}}</h1>
            <div class="row">
                <div class="col-5 ">
                    <img class="item img-fluid w-100 img-thumbnail" src="{{ asset('upload/'.$game->poster) }}">
                </div>
                <div class="col-7 ">
                    <div class="m-3">
                        <p><span style="font-weight: bold;padding-left: 5px;">نام بازی:</span>{{$game->name}}</p>
                        <p><span style="font-weight: bold;padding-left: 5px;">درباره بازی:</span>{{$game->description}}
                        </p>
                        <p><span style="font-weight: bold;padding-left: 5px;">قیمت:</span><span style="color: #3c0;">{{$game->price}}
                                تومان</span></p>
                    </div>
                    {{--<form action="{{route('front.game',$game->id)}}" method="get">--}}
                    <form action="{{ route('pay.game',['game' => $game->id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success" style="padding: 8px 14px;">خرید بازی</button>
                    </form>
                </div>
            </div>
            <div class="row" style="margin-bottom: 8px;"></div>
        </div>
    </div>
@endsection
