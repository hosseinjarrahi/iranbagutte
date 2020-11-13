@extends('dashboard.master')
@section('title')
    مدیریت
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(auth()->user()->paidAdvertise())
                                <div class="alert alert-info">
                                    شما هزینه تبلیغات را پرداخت کرده اید.
                                </div>
                            @else
                                <div class="alert alert-danger">
                                    <p>
                                        برای حذف تبلیغات میتوانید بر روی دکمه حذف تبلیغات کلیک نمایید.
                                    </p>
                                    <a class="btn btn-primary" href="{{ route('user.dashboard.payAds') }}">
                                        <span>حذف تبلیغات</span>
                                        <span>{{ $option->main ?? '' }}</span>
                                        <span>تومان</span>
                                    </a>
                                </div>

                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
