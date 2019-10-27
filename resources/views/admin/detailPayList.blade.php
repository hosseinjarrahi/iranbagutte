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
                                    <th>نام</th>
                                    <th>نام خانوادگی</th>
                                    <th>تلفن</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>آدرس</th>
                                    <th>قیمت کل</th>
                                    <th>حذف</th>
                                </tr>
                                @php
                                    $itemPay=$product;
                                    $userId=$itemPay->userid;
                                    $user=$User::findById($userId)[0];
                                    $products=unserialize($itemPay->products);
                                @endphp
                                <tr>
                                        <td>{{ $itemPay->id }}</td>
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>
                                            @php
                                            $price=0;
                                            @endphp
                                            @foreach($products as $product)
                                                @php($price+=$product['price']*$product['count'])
                                            @endforeach
                                            {{$price}}
                                        </td>
                                        <td><a href="{{ url('admin/remove-pay/'.$itemPay->id) }}">حذف</a></td>
                                    </tr>
                            </table>

                            <h4>لیست محصولات</h4>
                            <table class="table table-hover table-responsive">
                                <tr>
                                    <th>نام محصول</th>
                                    <th>رستوران</th>
                                    <th>قیمت</th>
                                </tr>
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                            {{$product['name']}}
                                    </td>
                                    <td>
                                        @php
                                            $resId=0+$product['res'];
                                            $res=$Res::findById($resId)[0];
                                            echo $res->name;
                                        @endphp
                                    </td>
                                    <td>
                                        {{$product['price']}}
                                    </td>
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