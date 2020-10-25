@extends('master')

@section('title')
    ایران باگت | جستجو
@endsection

@section('content')
    <div class="container-fluid mt-2">
        <div class="row p-2"></div>
        <div class="row mb-3 justify-content-center" style="direction: ltr !important">
            @forelse($restaurants as $restaurant)
                <a href="{{url('restaurant/'.$restaurant->id)}}" style="color: white">
                    <div class="res-ads ads-parent position-relative m-3 mt-2">
                        {{--                        <a href="#" style="color: #fff">--}}
                        <img class="img-fluid w-100 h-100" src="{{ asset('upload/'.$restaurant->pics[0]) }}">
                        <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                               {{ $restaurant->options->address ?? 'آدرسی ندارد' }}
                            </span>
                        {{--                        </a>--}}
                    </div>
                </a>

            @empty
        </div>
        <div class="alert alert-info text-center">هیچ رستوراني یافت نشد</div>
        <div class="row mb-3 justify-content-center" style="direction: ltr !important">

            @endforelse

        </div>
        <div class="row mb-3 justify-content-center" style="direction: ltr !important">
            @forelse($foods as $key => $food)
                {{--                    <div class="col-lg-4 col-11 my-2 animate" style="opacity: 0;">--}}
                <div class="col-lg-3 col-11 my-2 animate" style="direction: rtl">
                    <div class="card bg-light p-hover">
                        <div class="card-header text-bold text-dark  text-center">{{ $food->title }}</div>
                        <div class="card-img-top"
                             style="width:100%;height: 200px;background-position: center;background-image: url({{ asset('upload/'.$food->img) }});background-repeat:no-repeat;background-size: cover;"></div>
                        <div class="card-body">
                            <p class="text-justify text-dark">

                                <span style="color: #1f4;">توضیحات:</span>
                                {{ $food->small_detail }}
                                <br>
                                <span style="color: #f14;">قیمت:</span>
                                {{ $food->price }}
                                <span>تومان</span>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('food/'.$food->id) }}" class="btn btn-outline-danger btn-block">خرید
                                محصول</a>
                        </div>
                    </div>
                </div>
            @empty
        </div>
        <div class="alert alert-info text-center">هیچ غذايي یافت نشد</div>
        <div class="row mb-3 justify-content-center" style="direction: ltr !important">


            @endforelse

        </div>
        <div class="row mb-3 justify-content-center" style="direction: ltr !important">
            @forelse($games as $game)
                <a style="color: white">
                    <div class="res-ads ads-parent position-relative m-3 mt-2">
                        <a href="{{ url('game/'.$game->id) }}" style="color: #fff">
                            <img class="img-fluid w-100 h-100" src="{{ asset('upload/'.$game->poster) }}">
                            <span class="IB-ads text-center w-100 p-2 position-absolute h-50">
                              {{ $game->name }}
                            </span>
                        </a>
                    </div>
                </a>
            @empty
        </div>
        <div class="alert alert-info text-center">هیچ بازی یافت نشد</div>
        @endforelse

    </div>
    {{--        <div class="d-flex justify-content-center">{{ $games->links() }}</div>--}}

    </div>

@endsection
