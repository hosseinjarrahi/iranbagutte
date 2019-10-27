@extends('admin.master')

@section('title')
    لیست خریدها
@endsection

@section('content')
    @inject('User','App\Models')
    @inject('Res','App\Models')

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
                                    @php
                                    $userId=$itemPay->userid;
                                    $user=$User::findById($userId)[0];
                                    @endphp
                                    <tr>
                                        <td>{{ $itemPay->id }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>
                                            @foreach(unserialize($itemPay->products) as $product)
                                                -{{$product['name']}}-

                                            @endforeach
                                        </td>
                                        <td>
                                            @php
                                            $price=0;
                                            @endphp
                                            @foreach(unserialize($itemPay->products) as $product)
                                                @php($price+=$product['price']*$product['count'])
                                            @endforeach
                                            {{$price}}
                                        </td>
                                        <th><a href="{{ url('admin/detail-pay/'.$itemPay->id) }}"> جزئیات بیشتر</a></th>

                                        <td><a href="{{ url('admin/remove-pay/'.$itemPay->id) }}">حذف</a></td>
                                    </tr>
                                @endforeach
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