@extends('dashboard.master')

@section('title')
    ویرایش اطلاعات | ایران باگت
@endsection

@section('content')

    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <div class="loginBox col-11 col-md-7 rounded p-3 text-center">

            <img src="{{ asset('img/logoiran.png') }}" alt="iranbuget" class=" mb-3 img-fluid">
            @if($errors->any())
                    <p class="alert-danger alert">اطلاعات وارد شده اشتباه است.</p>
            @endif
            <form action="{{ url('edit') }}" method="post">
                @method('put')
                @csrf
                <div class="alert alert-warning">لطفا اطلاعاتتان را کامل کنید</div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="name" required value="{{ $user->name ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">نام و نام خانوادگی </span>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">ایمیل</span>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="tel" class="form-control" name="phone" required value="{{ $user->phone ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">شماره همراه</span>
                    </div>
                </div>
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="address" required value="{{ $user->address ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">آدرس</span>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary mb-2" value="ویرایش">
            </form>

        </div>
        <a class="mt-2 mb-5 col-11 col-md-7 btn btn-block btn-info" href="{{ url('') }}">بازگشت به صفحه اصلی</a>

    </div>

@endsection
