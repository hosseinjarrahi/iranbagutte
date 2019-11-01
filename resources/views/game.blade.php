@extends('master')

@section('title')
    ایران باگت
@endsection

@section('content')
    <style>
        .example2 {
            height: 50px;
            overflow: hidden;
            position: relative;
        }
        .example2 h3 {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 50px;
            text-align: center;
            /* Starting position */
            -moz-transform:translateX(-100%);
            -webkit-transform:translateX(-100%);
            transform:translateX(-100%);
            /* Apply animation to this element */
            -moz-animation: example2 15s linear infinite;
            -webkit-animation: example2 15s linear infinite;
            animation: example2 15s linear infinite;
        }
        /* Move it (define the animation) */
        @-moz-keyframes example2 {
            0%   { -moz-transform: translateX(-100%); }
            100% { -moz-transform: translateX(100%); }
        }
        @-webkit-keyframes example2 {
            0%   { -webkit-transform: translateX(-100%); }
            100% { -webkit-transform: translateX(100%); }
        }
        @keyframes example2 {
            0%   {
                -moz-transform: translateX(-100%); /* Firefox bug fix */
                -webkit-transform: translateX(-100%); /* Firefox bug fix */
                transform: translateX(-100%);
            }
            100% {
                -moz-transform: translateX(100%); /* Firefox bug fix */
                -webkit-transform: translateX(100%); /* Firefox bug fix */
                transform: translateX(100%);
            }
        }
    </style>

    <div id="gameBox"
         style="visibility: hidden;height: 100%;width: 100%;position: fixed; background-color: hsla(0, 0%, 0%, 0.90);z-index: 10000;">
        <span style="cursor: pointer;" class="p-3 pt-5 text-white display-4" onclick="closeGame()">&times;</span>
        <div id="iframe" class="m-auto w-100 mt-2 text-white"></div>
    </div>

    <div style="visibility:hidden;color:white !important;position: fixed;bottom:0;display: block;width: 100%;background-color: black;padding: 20px;z-index: 100000"
         id="zir">

    </div>

    <div class="w-100 p-0 m-0">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @php($active = 'active')
                    @foreach($ads as $index => $ad)
                        @if($ad->state == 1)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <a href="{{ url('advertise/'.$ad->id) }}">
                                    <img src="{{ asset('upload/'.$ad->img) }}" class="d-block w-100">
                                </a>
                            </div>
                            @php($active = '')
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="mt-5 w-100 py-3 bg-dark" style="
    border-top: 15px dashed whitesmoke;
    border-bottom: 15px dashed whitesmoke;
    outline: #343a40 10px solid;
    overflow: hidden;
    ">

        <div class="bg-light w-100 pt-3"
             style="box-shadow:inset 0px 0px 20px black;background: linear-gradient(to right, #f2994a, #f2c94c);">

            <div class="row" style="direction: ltr !important">
                <div class="slider" id="slider">
                    <div class="slide mx-3" id="slide" style="color:#fff;">
                        @for($i=0;$i < count($urls);$i++,$p = $i)
                            <a style="color: white" onclick="openTheGame({{ $i }})">
                                <div class="ads-parent position-relative m-2"
                                     style="border-radius: 30px;width: 420px !important;">
                                    <img src="{{ asset('img/play.png') }}" class="bg-light img-fluid"
                                         style="position: absolute;top: 44%;left: 44%;z-index: 100;border-radius: 100%;">
                                    <div style="position: relative;">
                                        <div style="
                                        position: absolute;
                                        top: 0;left:0;
                                        width:100%;height: 100%;
                                        background-color: black;
                                        opacity: 0.7;">
                                        </div>
                                        <img class="item img-fluid w-100" style="max-height: 300px;"
                                             src="{{ asset('upload/'.$game->poster) }}">
                                    </div>
                                </div>
                            </a>
                        @endfor
                        @if($game->part != $p)
                        <div class="ads-parent position-relative m-2 d-flex flex-column justify-content-center align-items-center"
                             style="border-radius: 30px;width: 500px; !important;background: #0c5460">
                            <span class="pb-3">جهت ادامه بازی کد خرید ساندویچ خودرا وارد نمایید</span>
                            @if(!\App\Core\Auth::check())<span class="pb-3">ابتدا باید وارد حساب خود شوید</span>@endif
                            <form action="{{ url('pcode/'.$id) }}" method="post">
                                <div class="form-row">
                                    <div class="col-8">
                                        <input name="buy_code" class="form-control">
                                        <input name="p" value="{{ $p + 1 }}" type="hidden" class="form-control">
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-default">ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                    <button class="ctrl-btn pro-prev text-white" style="margin-left: 20px;">< قبلی</button>
                    <button class="ctrl-btn pro-next text-white" style="margin-right: 20px;">بعدی ></button>
                </div>
            </div>

        </div>

    </div>

    <div class="justify-content-center d-flex align-items-center w-100 bg-dark"
         style="height: 200px;background: url({{ asset('img/mario.png') }});background-repeat: no-repeat;background-blend-mode: multiply;background-size: cover;">
        @if($sell)
            <a href="{{ asset('upload/'.$game->full) }}" style="color: #969896;font-size: 2rem;">دانلود نسخه کامل</a>
        @else
            <a href="#" style="color: #969896;font-size: 2rem;">خرید و دانلود نسخه کامل بازی</a>
        @endif
    </div>

    <div class="w-100 p-0 m-0">
        <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    @php($active = 'active')
                    @foreach($ads as $index => $ad)
                        @if($ad->state == 0)
                            <div class="carousel-item {{ $active }}">
                                <a href="{{ url('advertise/'.$ad->id) }}">
                                    <img src="{{ asset('upload/'.$ad->img) }}" class="d-block w-100">
                                </a>
                            </div>
                            @php($active = '')
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <script>
        let ztime = 99999999999;
        @if(!empty($zirnevis))
        let url = '{{ url('advertise/'.$zirnevis->id) }}';
        let zirnevis = `
                <div class="example2">
                    <h3><a href="${url}">{{ $zirnevis->text }}</a></h3>
                </div>
            `;
        ztime = {{ $zirnevis->time }};
        @endif
        let vars = [];
        let objs = [];
        let iframes = [];
        let bar;
        let counter = 0;
        let max = -1;
        let part = 1;
        let z = null;
        @foreach($urls as $url)
        iframes.push(`<iframe width="100%" height="800px" src="{{ $url }}"></iframe>`);
                @endforeach
                @foreach($dynamic as $d)
        let x = {time: '{{ $d->time }}', img: '{{ $d->img }}', url: '{{ $d->url }}', id: '{{ $d->id }}'};
        vars.push(x);
        @endforeach

            for (v of vars) {
            max++;
            let img = `
            <div class="container">
                <a target="_blank" href="{{ url('advertise/') }}${v.id}"><img style="max-height:500px;" id="Ad" src="{{ asset('upload/') }}${v.img}" class="d-block mx-auto img-fluid rounded"></a>
                <div id="progressBar" style="height:5px;background-color:white;"></div>
            </div>
            `;
            let time = v.time * 1000;
            objs.push({img, time});
        }
        let closeAdver = `
            <span class="col-10 mt-2 col-md-3 mx-auto btn btn-block btn-outline-warning" onclick="closeAd()">بستن تبلیغات</span>
        `;

        function openTheGame(i) {
            part = i;
            gameBox.style.visibility = '';
            iframe.innerHTML = objs[counter].img;
            let width = 100;
            let ratio = width / (objs[counter].time / 10);
            bar = setInterval(function () {
                width -= ratio;
                progressBar.style.width = width + '%';
                if (width <= 0) {
                    clearInterval(bar);
                    progressBar.remove();
                    iframe.innerHTML += closeAdver;
                }
            }, 10);
        }

        function closeGame() {
            gameBox.style.visibility = 'hidden';
            zir.style.visibility = 'hidden';
            zir.innerHTML = '';
            iframe.innerHTML = '';
            clearInterval(bar);
            clearTimeout(z);
        }

        function closeAd() {
            counter++;
            if (counter > max)
                counter = 0;
            iframe.innerHTML = iframes[part];

            z = setTimeout(function () {
                zir.style.visibility = '';
                zir.innerHTML = zirnevis;
            },ztime*1000);
        }

    </script>

@endsection