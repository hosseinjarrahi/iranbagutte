@extends('admin.master')

@section('title')
    لیست خریدها
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover table-responsive">
                                <tr>

                                    <th>شماره خرید</th>
                                    <th>نام</th>
                                    <th>تلفن</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>آدرس</th>
                                    <th>قیمت کل</th>
                                    <th>حذف</th>
                                </tr>

                                <tr>
                                    <td>{{ $pay->id }}</td>
                                    <td>{{ $pay->user->name }}</td>
                                    <td>{{ $pay->user->phone }}</td>
                                    <td>{{ $pay->user->username }}</td>
                                    <td>{{ $pay->user->email }}</td>
                                    <td>{{ $pay->user->address }}</td>
                                    <td>

                                        @php
                                            $price=0;
                                        @endphp

                                        @if(is_int($products))
                                            @php($price += \App\Game::find($products)->price))
                                        @else
                                            @foreach(unserialize($products) as $product)
                                                @php($price += $product['price']*($product['count'] ?? 1))
                                            @endforeach
                                        @endif

                                        {{ $price }}

                                    </td>

                                    <td><a href="{{ url('manager/remove-pay/'.$pay->id) }}">حذف</a></td>
                                </tr>
                            </table>

                            <h4 class="mt-5">لیست محصولات</h4>
                            <table class="table table-hover table-responsive">
                                <tr>
                                    <th>نام محصول</th>
                                    <th>رستوران</th>
                                    <th>قیمت</th>
                                </tr>
                                @if(is_int($products))
                                    <tr>
                                        <td>
                                            {{ \App\Game::find($itemPay->products)->name }}
                                        </td>
                                        <td>
                                            -
                                        </td>
                                        <td>
                                            {{ \App\Game::find($itemPay->products)->price }}
                                        </td>
                                    </tr>
                                @else
                                    @foreach(unserialize($products) as $product)
                                        <tr>
                                            <td>
                                                {{ $product['name'] }}
                                            </td>
                                            <td>
                                                {{ \App\Restaurant::find($pay['restaurant_id'])->name }}
                                            </td>
                                            <td>
                                                {{ $product['price'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection
