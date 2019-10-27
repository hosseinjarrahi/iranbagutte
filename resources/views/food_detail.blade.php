@extends('master')
@section('title')
    ایران باگت
@endsection
@section('content')
<div class="container-fluid pl-5 row d-flex flex-column flex-lg-row justify-content-center" style="margin-top: 1em;">
    <h3 class="bg-danger food-text mb-3">{{ $product->title }}</h3>
    <div class="col-lg-5 col-12 mb-3">
        <img class="img-thumbnail" src="{{ asset('upload/'.$product->img) }}">
    </div>
    <div class="col-lg-7 col-12 jumbotron mb-3">
        <b style="color: red">
            توضیحات:
        </b>
        <p class="text-justify">
            {{ $product->main_detail }}
        </p>
        <b style="color: green">
            قیمت:
        </b>
        <p>
            <span>{{ $product->price }}</span>
            <span> تومان </span>
        </p>
        <form action="{{ url('add-to-basket/'.$product->id) }}" method="get">
            <div class="form-group">
                <label for="sel1">تعداد (انتخاب کنید):</label>
                <input type="number" min="1" max="100" class="form-control" name="count" value="1">
                <br>
                <input  class="btn btn-primary" style="display: block; margin: auto;"type="submit" value="افزودن به سبد خرید">
            </div>
        </form>
    </div>

    </div>
</div>
    @if(isset($alert))
        <script>
            alert('محصول مورد نظر به سبد خرید افزوده شد.');
        </script>
    @endif
@endsection
