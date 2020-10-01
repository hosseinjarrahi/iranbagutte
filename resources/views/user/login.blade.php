@extends('user.master')

@section('title')
ورود | ایران باگت
@endsection

@section('menu')
<div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <div class="loginBox col-11 col-md-7 rounded p-3 text-center">

            <img src="{{ asset('img/logoiran_b.jpg') }}" style="width: 45%; border-radius: 10px" alt="iranbuget" class=" mb-3 img-fluid">
            @if(session('error'))
                <p class="alert-danger  alert">اطلاعات وارد شده اشتباه است.</p>
            @endif
            <form action="{{ url('login') }}" method="post">
                @csrf
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="username" required><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">نام کاربری</span>
                    </div>
                    @error('username')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror
                </div>

                <div class="input-group mb-2">
                    <input type="password" class="form-control" name="password" required><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">رمز عبور</span>
                    </div>
                    @error('password')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror
                </div>
                <input type="submit" class="btn btn-primary mb-2" value="ورود">

            </form>

        </div>
    <a class="mt-2 col-11 col-md-7 btn btn-block btn-info" href="{{ url('/') }}">بازگشت به صفحه اصلی</a>
</div>

@endsection
