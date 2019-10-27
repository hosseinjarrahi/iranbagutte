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

                    @foreach($slides as $slide)
                        @php
                            $cat = $Category::findById($slide->category)[0];
                        @endphp
                    <li>
                        <h2 style="padding: 0px; margin: 0px; height: 40px; width: 350px; left: 0px;" class="IB-selected each">
                            <span class="d-none">{{ $cat->id }}</span>
                            <span class="IB-akordin0">{{ $cat->name }}</span>
                        </h2>
                        <div style="width: 1040px; left: 0px; padding-left: 40px;">
                                <img src="{{ asset('upload/'.$slide->img) }}" class="img-fluid">
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
            <div class="accordion-wrapper">
                <div class="ac-pane">
                    @foreach($slides as $slide)
                        @php
                            $cat = $Category::findById($slide->category)[0];
                        @endphp
                    <a href="#" class="ac-title IB-akordin0 each">
                        <span class="d-none">{{ $cat->id }}</span>
                        <span>{{ $cat->name }}</span>
                    </a>
                    <div class="ac-content" style="display: none;">
                        <a href="#">
                            <img src="{{ asset('upload/'.$slide->img) }}" class="img-fluid">
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('content')
    <div class="container-fluid mt-0 ">

        <div class="row px-2 py-0 d-flex align-items-start">

            <div class="shadow special-text mt-3 d-block d-md-inline-block col-lg-3 col-12 px-0 p-4 "
                 style="font-size: 1.2rem;background-color: hsla(360, 52%, 56%, 0.2);border-radius: 0px 50px 0px 50px;
                ">

                <ul style="text-align: justify;line-height: 3rem" class="pr-3">
                    <li>
                        <span>جای پارک : </span>
                        <span>
                            @if($res->park)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>اینترنت : </span>
                        <span>
                            @if($res->wifi)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>زمین بازی : </span>
                        <span>
                            @if($res->game)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>میز کودک : </span>
                        <span>
                            @if($res->child_bench)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>موسیقی زنده : </span>
                        <span>
                            @if($res->music)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>تحویل رایگان : </span>
                        <span>
                            @if($res->delivery)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                    <li>
                        <span>کارت خوان سیار : </span>
                        <span>
                            @if($res->kart)
                                دارد
                            @else
                                ندارد
                            @endif
                        </span>
                    </li>
                </ul>
            </div>

            <div class="pb-5 col-lg-9 col-12 pt-3 p-0 d-flex flex-row flex-wrap justify-content-center" id="ajax">

                @foreach($products as $key => $product)
                <div class="col-lg-4 col-11 my-2 animate" style="opacity: 0;">
                    <div class="card bg-light p-hover">
                        <div class="card-header text-bold text-dark">{{ $product->name }}</div>
                        <div class="card-img-top" style="width:100%;height: 200px;background-image: url({{ asset('upload/'.$product->img) }});background-repeat:no-repeat;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <p class="text-justify text-dark">

                                <span style="color: #1f4;">توضیحات:</span>
                                {{ $product->small_detail }}
                                <br>
                                <span style="color: #f14;">قیمت:</span>
                                {{ $product->price }}
                                <span>تومان</span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('food/'.$product->id) }}" class="btn btn-outline-danger btn-block">خرید محصول</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>
    @if(!empty($special) && !empty($imgs))
    <span class="col-12 px-3 m-auto d-block rounded col-lg-5 text-center text-bold" style="font-size: 2.5rem;background-color: #ffc107;box-shadow: 0px 0px 5px black;">
                    رویداد ویژه
    </span>
    <div class="row col-12 m-0 p-0" style="border-top: 5px solid #ffc107;border-bottom: 5px solid #ffc107;box-shadow: inset 0px 0px 10px black">

        <div class="col-12 col-lg-3 p-0 m-0">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @forelse($imgs as $key => $img)
                    <div class="carousel-item {{ ($key == 0) ? 'active' : ' ' }}">
                        <img src="{{ asset('upload/'.$img->img) }}" class="d-block w-100">
                    </div>
                    @empty

                    @endforelse
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-lg-8 col-12 p-lg-5 p-3">

            <div class="row col-12">
                <span class="col-12 col-lg-5 text-center text-bold ">
                    {{ $special->main }}
                </span>
            </div>
        </div>

    </div>
    @endif
    <div class="container-fluid p-lg-3 p-1 col-12 m-0 p-0 d-flex flex-lg-row flex-column justify-content-around" style="color: white">

            <div class="shadow col-12 col-lg-2" style="height:200px;padding: 5px;">
                <a href="{{url('reserve')}}" style="color: white">
                <div id="card-1" class="w-100 h-100 d-flex align-items-center">
                    <div class="front text-center" style=" background: url({{ asset('img/reserve1.jpg') }});background-size:contain;background-repeat: no-repeat;background-position: center;">
                        <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                                <p>رزرو میز</p>
                        </p>
                    </div>
                    <div class="back" style="background: url({{ asset('img/reserve2.jpg') }});background-size: cover;background-position: center;"></div>
                </div>
                </a>

            </div>

        <div class="shadow col-12 col-lg-2" style="height:200px;padding: 5px;">
            <div id="card-2" class="w-100 h-100 d-flex align-items-center">
                <div class="front text-center" style="background: url({{ asset('img/send1.png') }});background-size:contain;background-repeat: no-repeat;background-position: center;">
                    <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                    <p>نحوه ارسال</p>
                    </p>
                </div>
                <div class="back" style="background: url({{ asset('img/send2.png') }});background-size:contain;background-repeat: no-repeat;background-position: center;"></div>
            </div>
        </div>

        <div class="shadow col-12 col-lg-2" style="height:200px;padding: 5px;">
            <div id="card-3" class="w-100 h-100 d-flex align-items-center">
                <div class="front text-center" style=";background-size:contain;background-repeat: no-repeat;background-position: center;background: url({{ asset('img/call.png') }});background-size:contain;background-repeat: no-repeat;background-position: center;">
                    <p style=" font-weight: bold;color: darkblue;padding: 14px;">
                    <p>تماس با فروشگاه</p>
                    </p>
                </div>
                <div class="back" style="background: url({{ asset('img/call.jpg') }});background-size:contain;background-repeat: no-repeat;background-position: center;"></div>
            </div>
        </div>

    </div>

    <script>
        function animation()
        {
            let animate = document.getElementsByClassName('animate');
            for (let s =0;s < animate.length;s++) {
                window.setTimeout(()=>{
                    animate[s].classList.add('animation');
                    animate[s].style.opacity = 1;
                },s*1000);
            }
        }
        animation();
        let acc = document.getElementsByClassName('each');
        for (let i = 0; i < acc.length; i++)
        {
            acc[i].onclick = ()=>{
                ajax.innerHTML =
                    `
                            <div class="spinner">
                              <div class="dot1"></div>
                              <div class="dot2"></div>
                            </div>
                        `;
                var request = new XMLHttpRequest();
                let id = acc[i].firstElementChild.innerHTML;
                let url = "{{ url() }}/order/down/" + id;
                request.open('POST',url);
                request.onreadystatechange = function () {
                    if ((request.status === 200) && (request.readyState === 4)) {
                        var jsontext = request.responseText;
                        jsontext = JSON.parse(jsontext);
                        Object.size = function(jsontext) {

                            var size = 0, key;
                            for (key in jsontext) {
                                if (jsontext.hasOwnProperty(key)) size++;
                            }
                            return size;
                        };
                        var size = Object.size(jsontext);
                        let text = "";

                        for (let j = 0; j < size; j++) {
                            text += `
                                <div class="col-lg-4 col-11 my-2 animate" style="opacity: 0;">
                                    <div class="card p-hover bg-light">
                                    <div class="card-header text-bold text-dark">`+jsontext[j].name+`</div>
                                    <div class="card-img-top" style="background-position: center;width:100%;height: 200px;background-image: url(`+jsontext[j].img+`);background-repeat:no-repeat;background-size: cover;"></div>
                                <div class="card-body">
                                    <p class="text-justify text-dark">`+jsontext[j].desc+`</p>
                                </div>
                                <div class="card-footer">
                                    <a href="" class="btn btn-outline-danger btn-block">خرید محصول</a>
                                </div>
                                </div>
                                </div>
                            `;
                        }
                        ajax.innerHTML = text;
                        animation();
                    }
                };
                request.send();
            }
        }

    </script>
@endsection