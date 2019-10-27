@extends('master')

@section('title')
    ایران باگت | صفحه بازی ها
@endsection

@section('content')
    <div class="container-fluid mt-2">
        <div class="row p-2"></div>
        <div class="row mb-3 justify-content-center" style="direction: ltr !important">

        @forelse($games as $game)
                <a style="color: white">
                    <div class="res-ads ads-parent position-relative m-3 mt-2">
                        <a href="{{ url('games/'.$game->id) }}" style="color: #fff">
                            <img class="img-fluid w-100 h-100" src="{{ asset('upload/'.$game->poster) }}">
                            <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                              {{ $game->name }}
                            </span>
                        </a>
                    </div>
                </a>
        @empty
            <div class="alert alert-info">هیچ بازی یافت نشد</div>
        @endforelse

        </div>


    </div>

@endsection