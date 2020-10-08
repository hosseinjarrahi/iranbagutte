@extends('master')

@section('title')
    ایران باگت
@endsection

@section('slider')

    <div class="IB-Slide">
        <div class="IB-container">
            <div class="IB-SlideBox">
                <div id="IB-one" class="IB-accordion IB-dark IB-rounded" style="width: 1200px;">
                    <ol class="text-center">

                        @foreach($slides as $key => $slide)
                            <li>
                                <h2 style="padding: 0px; margin: 0px; height: 40px; width: 350px; left: 0px;"
                                    class="IB-selected each">
                                    <span class="IB-akordin0">{{ $slide->category->name }}</span>
                                </h2>
                                <div style="width: 1040px; left: 0px; padding-left: 40px;">
                                    <a target="_blank"
                                       href="{{ url('order?id='.$slide->category->id.'#'.($key + 1)) }}">
                                        <img src="{{ asset('upload/'.$slide->img) }}" class="img-fluid">
                                    </a>
                                    {{ $slide->category->name }}
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

                    <div class="accordion-wrapper">
                        <div class="ac-pane">
                            <a href="#" class="ac-title IB-akordin0">
                                <span>{{ $slide->category->name }}</span>
                            </a>

                            <div class="ac-content" style="display: none;">
                                <a target="_blank" href="{{ url('order?id='.$slide->category->id.'#'.($key + 1)) }}">
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

            <div class="shadow special-text d-block d-md-inline-block col-lg-5 col-12 p-3"
                 style="font-size: 1.2rem;background-color: hsla(360, 52%, 56%, 0.2);">
                <h3 class="d-block p-1 text-center" style="border-bottom: gold 2px solid;">درباره ما</h3>
                <p class="sad col-10" style="text-align: justify !important;">
                    {!! $op->main ?? ''  !!}
                </p>
            </div>
            <div class="col-lg-4 col-12 d-block d-md-inline-block text-center mt-3 mt-lg-0">
                <div class="row text-center justify-content-center">
                    @foreach($games as $key => $game)
                        <a class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;"
                           href="{{ url('game/'.$game->id) }}">
                            {{--<div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">--}}
                            <div id="card-{{ $key+1 }}" class="w-100 h-100 d-flex align-items-center">
                                <div class="front bg-danger text-center"
                                     style="background: url({{ asset('img/back.jpg') }});">
                                    {{--<a href="{{ url('game/'.$game->id) }}">--}}
                                    <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                    <p>{{$game->name}}</p>
                                    </p>
                                    {{--</a>--}}
                                </div>
                                <div class="back"
                                     style="background: url({{ asset('upload/'.$game->poster) }});
                                         background-size: cover;
                                         background-position: center;
                                         ">
                                </div>
                            </div>
                            {{--</div>--}}
                        </a>
                    @endforeach
                    <a class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;"
                       href="{{ url('games-page') }}">
                        {{--<div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">--}}
                        <div id="card-3" class="w-100 h-100 d-flex align-items-center">

                            <div class="front bg-danger text-center"
                                 style="background: url({{ asset('img/back.jpg') }});">
                                {{--<a href="{{ url('game/'.$game->id) }}">--}}
                                <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <h2>سایر بازی ها</h2>

                                <p>هم بازی کن</p>
                                <p>هم فلافل مجانی ببر</p>
                                </p>
                                {{--</a>--}}
                            </div>

                            <div class="back"
                                 style="background: url({{ asset('img/back.jpg') }});
                                     background-size: cover;
                                     background-position: center;
                                     ">
                                بزن بریم
                            </div>

                        </div>
                        {{--</div>--}}
                    </a>
                    <a class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;"
                       href="@if(!isset($game_event)) # @else {{route("event")}} @endif">
                        {{--<div class="col-md-6 col-5 shadow" style="height:200px;padding: 5px;">--}}
                        <div
                            @if(!isset($game_event)) onclick="event.preventDefault();alert('در حال حاضر رویدادی نداریم.')"
                            @endif
                            id="card-4" class="w-100 h-100 d-flex align-items-center">

                            <div class="front bg-danger text-center"
                                 style="background: url({{ asset('img/back.jpg') }});">
                                {{--<a href="{{ url('game/'.$game->id) }}">--}}
                                <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <h2>@if(!isset($game_event))رویداد ویژه@else {{$event->title}} @endif</h2>

                                <p>@if(!isset($game_event)) الان رویداد نداریم@else {{$event->text}} @endif</p>
                                </p>
                                {{--</a>--}}
                            </div>

                            <div class="back"
                                 style="background: url(@if(!isset($game_event)){{ asset('img/back.jpg') }}@else {{asset('upload/'.$game_event->poster)}}@endif {{""}} );
                                     background-size: cover;
                                     background-position: center;
                                     ">@if(!isset($event))
                                    الان رویدادی نداریم
                                @endif
                            </div>

                        </div>
                        {{--</div>--}}
                    </a>
                </div>
            </div>
        </div>
        <br>

        <div class="row mb-3" style="direction: ltr !important">
            <div class="slider" id="slider">
                <div class="slide" id="slide" style="color:#fff;">
                    <a href="{{url('restaurants')}}" style="color: white">
                        <div class="ads-parent position-relative m-2">
                            <img class="item img-fluid w-100 h-100" src="{{ asset('img/0219_Elmwood_0016.jpg') }}">
                            <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
همه رستوران ها
                        </span>
                        </div>
                    </a>
                    @foreach($restaurants as $restaurant)
                        <a href="{{url('restaurant/'.$restaurant['id'])}}" style="color: white; height: 100%;">
                            <div class="ads-parent position-relative m-2">
                                {{--                                <img class="item img-fluid w-100 h-100" src="upload/{{ $restaurant['pics'][0] }}">--}}
                                <img class="item img-fluid w-100 h-100" src="upload/res1.jpg">
                                <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                                {{$restaurant['name']}}
                                </span>
                            </div>
                        </a>
                    @endforeach

                </div>
                <button class="ctrl-btn pro-prev text-white">< قبلی</button>
                <button class="ctrl-btn pro-next text-white">بعدی ></button>
            </div>
        </div>

    </div>

@endsection
