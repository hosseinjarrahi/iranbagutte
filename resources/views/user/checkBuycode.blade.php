@extends('dashboard.master')

@section('title')
    بررسی کد | ایران باگت
@endsection

@section('content')

    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <div class="col-12">

            @isset($first)
                <form action="{{ url('/check-code') }}" method="post">
                    @csrf
                    <input placeholder="کد" class="form-control" type="text" name="code">
                    <button class="btn btn-primary mx-auto d-block mt-2">بررسی</button>
                </form>
            @endisset

            @isset($message)
                <div class="alert alert-info">
                    {{ $message }}
                </div>
            @endisset

            @isset($code)
                @if($code->game)
                    <div class="alert alert-info">
                        <span>شما توسط این کد در بازی </span>
                        <a href="{{ route('front.game',['game' => $code->game->id]) }}">"{{ $code->game->name }}"</a>
                        <span> عضو شده اید </span>
                    </div>
                @else
                    <div class="alert alert-info">
                        <span>شما توسط این کد میتوانید محصول </span>
                        <a>"{{ $code->product->title }}"</a>
                        <span> را با تخفیف </span>
                        <span> {{ $code->percent }}٪</span>
                        <span> خریداری نمایید </span>
                    </div>
                @endif
            @endisset

        </div>
    </div>

@endsection
