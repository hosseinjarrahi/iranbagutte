@extends('master')

@section('title')
	ایران باگت
@endsection

@section('slider')
@inject("Category","App\Models")

<div class="IB-Slide">
    <div class="IB-container">
        <div class="IB-SlideBox">
            <div id="IB-one" class="IB-accordion IB-dark IB-rounded" style="width: 1200px;">
                <ol class="text-center">

                    @foreach($slides as $key => $slide)
                        @php
                            $cat = $Category::findById($slide->category)[0];
                        @endphp
                        <li>
                            <h2 style="padding: 0px; margin: 0px; height: 40px; width: 350px; left: 0px;" class="IB-selected each">
                                <span class="IB-akordin0">{{ $cat->name }}</span>
                            </h2>
                            <div style="width: 1040px; left: 0px; padding-left: 40px;">
                                <a target="_blank" href="{{ url('order#'.($key + 1)) }}">
                                    <img src="{{ asset('upload/'.$slide->img) }}" class="img-fluid">
                                </a>
                                {{ $cat->name }}
                            </div>
                        </li>
                    @endforeach

                </ol>
            </div>
        </div>
    </div>
</div>


<div class="IB-divAcB">
    <div class="IB-container">
        <div class="IB-divAcB">

            @foreach($slides as $key => $slide)
                @php
                    $cat = $Category::findById($slide->category)[0];
                @endphp
                    <div class="accordion-wrapper">
                        <div class="ac-pane">
                            <a href="#" class="ac-title IB-akordin0">
                                <span>{{ $cat->name }}</span>
                            </a>

                            <div class="ac-content" style="display: none;">
                                <a target="_blank" href="{{ url('order#'.($key + 1)) }}">
                                    <img src="{{ asset('upload/'.$slide->img) }}">
                                </a>
                            </div>
                        </div>
                    </div>
            @endforeach

        </div>
    </div>
</div>

@endsection

@section('content')
    <div class="container-fluid mt-2">
        <div class="row p-2 py-5 d-flex justify-content-around">

            <div class="shadow special-text d-block d-md-inline-block col-lg-5 col-12 p-3" style="font-size: 1.2rem;background-color: hsla(360, 52%, 56%, 0.2);">
                <h3 class="d-block p-1 text-center" style="border-bottom: gold 2px solid;">درباره ما</h3>
                <p class="sad col-10" style="text-align: justify !important;">
                    {!! $op->main  !!}
                </p>
            </div>

            <div class="col-lg-4 col-12 d-block d-md-inline-block text-center mt-3 mt-lg-0">
                <div class="row text-center justify-content-center">

                    <div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">
                        <div id="card-1" class="w-100 h-100 d-flex align-items-center">
                            <div class="front bg-danger text-center" style="background: url({{ asset('img/back.jpg') }});">
                                <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <p>هم بازی کن</p><p>هم فلافل مجانی ببر</p>
                                </p>
                            </div>
                            <div class="back" style="background: url({{ asset('img/halo_4_2013-wallpaper-1440x960.jpg') }});background-size: cover;background-position: center;"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">
                        <div id="card-2" class="w-100 h-100 d-flex align-items-center">
                            <div class="front bg-danger text-center" style="background: url({{ asset('img/back.jpg') }});">
                                <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <p>هم بازی کن</p><p>هم فلافل مجانی ببر</p>
                                </p>
                            </div>
                            <div class="back" style="background: url({{ asset('img/halo_4_2013-wallpaper-1440x960.jpg') }});background-size: cover;background-position: center;"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">
                        <div id="card-3" class="w-100 h-100 d-flex align-items-center">
                            <div class="front bg-danger text-center" style="background: url({{ asset('img/back.jpg') }});">
                                <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <p>هم بازی کن</p><p>هم فلافل مجانی ببر</p>
                                </p>
                            </div>
                            <div class="back" style="background: url({{ asset('img/halo_4_2013-wallpaper-1440x960.jpg') }});background-size: cover;background-position: center;"></div>
                        </div>
                    </div>

                    <div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">
                        <div id="card-4" class="w-100 h-100 d-flex align-items-center">
                            <div class="front bg-danger text-center" style="background: url({{ asset('img/back.jpg') }});">
                                <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <p>هم بازی کن</p><p>هم فلافل مجانی ببر</p>
                                </p>
                            </div>
                            <div class="back" style="background: url({{ asset('img/halo_4_2013-wallpaper-1440x960.jpg') }});background-size: cover;background-position: center;"></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <br>

        <div class="row mb-3" style="direction: ltr !important">
            <div class="slider" id="slider">
                <div class="slide" id="slide" style="color:#fff;">

                    @for($i=0;$i<3;$i++)
                        <a href="{{url('restaurants/1')}}" style="color: white">
                            <div class="ads-parent position-relative m-2">
                                <img class="item img-fluid w-100 h-100" src="{{ asset('img/0219_Elmwood_0016.jpg') }}">
                                <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                                   آدرس:هفت چنار میدان بریانک روبه روی مسجد المهدی
                                </span>
                            </div>
                        </a>
                    @endfor
                    <a href="{{url('restaurant/restaurantsPage')}}" style="color: white">
                        <div class="ads-parent position-relative m-2">
                            <img class="item img-fluid w-100 h-100" src="{{ asset('img/0219_Elmwood_0016.jpg') }}">
                            <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                           سایر رستوران ها
                        </span>
                        </div>
                    </a>


                </div>
                    <button class="ctrl-btn pro-prev text-white">< قبلی</button>
                    <button class="ctrl-btn pro-next text-white">بعدی ></button>
            </div>
        </div>

    </div>

@endsection