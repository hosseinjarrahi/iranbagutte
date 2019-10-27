@extends('master')
@section('title')
    ایران باگت
@endsection
@section('content')

    <div class="container-fluid pl-5 row d-flex flex-column flex-lg-row justify-content-center" style="margin-top: 1em;">

        <div class="col-12 mb-3">
            <div class="container rounded p-2 text-white">
                <p class="alert alert-light">
                    {{ $message }}
                </p>
                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            </div>
        </div>

    </div>

@endsection
