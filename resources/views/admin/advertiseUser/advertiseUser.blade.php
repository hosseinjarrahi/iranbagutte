@extends('admin.master')

@section('title')
    حذف تبلیغات بازی
@endsection

@section('content')
    <div class="main-panel">
        <div class="row">@include('admin.messages')</div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <h4>شما میتوانید با پرداخت مبلغ <span style="color: green">24 هزار تومان</span> برای همیشه تبلیغات هنگام و قبل از بازی را حذف کنید.</h4>
                <p>کافیست روی دکمه زیر کلیک کنید.</p>
                <form action="https://zarinp.al/@iranbaguette" method="get">
                {{--<form action="{{route('home')}}" method="get">--}}
                    <button type="submit" class="btn btn-success">حذف تبلیغات برای همیشه</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection