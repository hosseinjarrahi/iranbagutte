@extends('master')

@section('title')
سفارشات
@endsection

@section('content')

    <div class="d-block mx-auto">

        <div class="container">
            <div style="background-color: #f39c12;" class="rounded text-center font-weight-bold shadow text-white py-4 m-auto">
                <div>.</div>
                سفارشات
            </div>
            <table class="table table-hover table-striped">

                @forelse($pays as $pay)
                    <tr>
                        <th class="col-12" colspan="3">
                            <span>شماره تراکنش : </span><span>{{ $pay->trans_id }}</span>-----
{{--                            <span> وضعیت : </span><span>{{ $pay->status }}در دست بررسی</span>--}}
                        </th>
                    </tr>

                    @php
                        $products = json_decode($pay->products);
                    @endphp

                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }} تومان </td>
                        <td>تعداد:{{ $product->count ?? 1 }}</td>
                    </tr>
                    @endforeach

                @empty
                    <tr><td colspan="5">شما تاکنون هیچ محصولی خریداری نکرده اید.</td></tr>
                @endforelse

            </table>

        </div>

    </div>

@endsection