@extends('master')
@section('title')
    ایران باگت
@endsection
@section('content')

    <div class="w-100" style="margin-top: 1em;">
        <div>.</div>
        <div class="w-100 mx-auto d-block mb-3">
            <table class="text-center table table-bordered table-hover">
                <tr>
                    <th colspan="4" class="bg-dark text-white">سبد خرید</th>
                </tr>
                <tr>
                    <th>غذا</th>
                    <th>تعداد</th>
                    <th>قیمت</th>
                    <th>حذف</th>
                </tr>
                @php
                    $p=0;
                @endphp

                @forelse($basket as $id => $val)
                    @php
                        $p += $val['price']*$val['count'];
                    @endphp
                    <tr>
                        <th>{{ $val['name'] }}</th>
                        <th>{{ $val['count'] }}</th>
                        <th>{{ $val['price'] }}</th>
                        <th><a href="{{ url('remove-from-basket/'.$id) }}">حذف</a></th>
                    </tr>
                @empty
                    <div class="alert alert-danger col-12 text-center">سبد خرید شما خالی است.</div>
                @endforelse

            </table>
            <div class="container rounded p-2 text-white">
                <span class="bg-dark p-3 rounded"><span>قیمت کل: </span><span>{{ $p }}</span> <span>تومان</span></span>
                <a href="{{ url('checkout') }}" class="btn btn-primary p-3 rounded">اتمام خرید</a>
            </div>
        </div>

    </div>

@endsection
