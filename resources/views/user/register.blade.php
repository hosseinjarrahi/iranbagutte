@extends('user.master')

@section('title')
    ثبت نام | ایران باگت
@endsection

@section('menu')

    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <div class="loginBox col-11 col-md-7 rounded p-3 text-center">

            <img src="{{ asset('img/logoiran_b.jpg') }}" alt="iranbuget" style="width: 45%; border-radius: 10px;" class=" mb-3 img-fluid">
            @if(isset($errors))
                @foreach($errors as $error)
                    <p class="alert-danger alert">{{ $error }}</p>
                @endforeach
            @endif
            <form action="{{ url('register') }}" method="post">
                @method('put')
                @csrf
                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="name" required value="{{ $user->name ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">نام و نام خانوادگی</span>
                    </div>
                    {{-- @error('name')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror --}}
                </div>

                <div class="input-group mb-2">
                    <input type="text" class="form-control" name="username" required
                           value="{{ $user->username ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">نام کاربری</span>
                    </div>
                    {{-- @error('username')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror --}}
                </div>
                <div class="input-group mb-2">
                    <input type="password" class="form-control" name="password" required
                           value="{{ $user->password ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">رمز عبور</span>
                    </div>
                    {{-- @error('password')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror --}}
                </div>
                <div class="input-group mb-2">
                    <input type="email" class="form-control" name="email" value="{{ $user->email ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">ایمیل</span>
                    </div>
                    {{-- @error('email')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror --}}
                </div>
                <div class="input-group mb-2">
                    <input type="tel" class="form-control" name="phone" required value="{{ $user->phone ?? '' }}"><br>
                    <div class="input-group-append">
                        <span class="input-group-text text-dark">شماره همراه</span>
                    </div>
                    {{-- @error('phone')
                    <div class="alert alert-danger"> {{$message}}</div>
                    @enderror --}}
                </div>


{{--                {!! htmlFormSnippet() !!}--}}

                <input type="submit" class="btn btn-primary mb-2" value="ثبت نام">
            </form>

        </div>
        <a class="mt-2 mb-5 col-11 col-md-7 btn btn-block btn-info" href="{{ url('') }}">بازگشت به صفحه اصلی</a>
    </div>

@endsection
