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
                            <table class="table table-hover">
                                <tr>

                                    <th>شماره خرید</th>
                                    <th>نام خانوادگی</th>
                                    <th>محصولات</th>
                                    <th>قیمت کل</th>
                                    <th>جزئیات</th>
                                    <th>حذف</th>
                                </tr>
                                @foreach($allPay as $itemPay)
                                    <tr>
                                        <td>{{ $itemPay->id }}</td>
                                        <td>{{ $itemPay->user->name }}</td>
                                        <td>
                                            @if(is_int($itemPay->products))
                                                {{ \App\Game::find($itemPay->products)->name }}
                                            @else
                                                @if(@unserialize($itemPay->products))
                                                    @foreach(unserialize($itemPay->products) as $product)
                                                        -{{$product['name']}}-
                                                    @endforeach
                                                @else
                                                    پرداخت تبلیغات
                                                @endif
                                            @endif

                                        </td>
                                        <td>
                                            @php
                                                $price=0;
                                            @endphp
                                            @if(is_int($itemPay->products))
                                                @php($price+=\App\Game::find($itemPay->products)->price)
                                            @else
                                                @if(@unserialize($itemPay->products))
                                                    @foreach(unserialize($itemPay->products) as $product)
                                                        @php($price+=$product['price']*($product['count'] ?? 1))
                                                    @endforeach
                                                    {{$price}}
                                                @else
                                                    ***
                                                @endif
                                            @endif

                                        </td>
                                        <th>
                                            @if(!is_int($itemPay->products) && @unserialize($itemPay->products))
                                                <a href="{{ url('manager/detail-pay/'.$itemPay->id) }}"> جزئیات
                                                    بیشتر</a>
                                            @endif
                                        </th>

                                        <td><a href="{{ url('manager/remove-pay/'.$itemPay->id) }}">حذف</a></td>
                                    </tr>
                                @endforeach
                                {{ $allPay->links() }}
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
