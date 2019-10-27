@extends('master')

@section('title')
    ایران باگت
@endsection

@section('content')
    <div class="container-fluid mt-2">
        <div class="row p-2"></div>
        <div class="row mb-3 justify-content-center" style="overflow-x: hidden;overflow-y:scroll;height: 25rem; direction: ltr !important">
        @for($i=0;$i<30;$i++)
                <a href="{{url('restaurants/1')}}" style="color: white">
                    <div class="res-ads ads-parent position-relative m-3 mt-2">
                        <a href="#" style="color: #fff">
                            <img class="img-fluid w-100 h-100" src="{{ asset('img/0219_Elmwood_0016.jpg') }}">
                            <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                               آدرس:هفت چنار میدان بریانک روبه روی مسجد المهدی
                            </span>
                        </a>
                    </div>
                </a>
        @endfor
        </div>


    </div>

@endsection