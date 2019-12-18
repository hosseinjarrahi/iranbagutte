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
                                            @foreach(json_decode($itemPay->products) as $product)
                                                -{{$product->title}}-
                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $price=0;
                                            @endphp
                                            @foreach(json_decode($itemPay->products) as $product)
                                                @php($price+=$product->price*($product->count ?? 1))
                                            @endforeach
                                            {{$price}}
                                        </td>
                                        <th><a href="{{ url('manager/detail-pay/'.$itemPay->id) }}"> جزئیات بیشتر</a></th>

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