@extends('res.master')

@section('title')
    میز های رزرو شده
@endsection

@section('content')
@inject('ResReserve','App\Models')
@inject('jdf','App\Core')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-hover table-responsive">
                                <tr>
                                    <th>#</th>
                                    <th>میز (نفره)</th>
                                    <th>نام و نام خانوادگی</th>
                                    <th>شماره تلفن</th>
                                    <th>زمان شروع</th>
                                    <th>زمان پایان</th>
                                    <th>جزئیات</th>
                                </tr>

                                @forelse($reserve as $key => $r)
                                    @php
                                        $miz = [];
                                        $exp = explode('-',$r->res_reserve_ids);
                                        $exp = ($exp === "") ? $r->res_reserve_ids : $exp;
                                        foreach ($exp as $e)
                                        {
                                            $s = $ResReserve::findById($e);
                                            if(empty($s))
                                                continue;
                                            $miz[] = ($s[0])->capacity;
                                        }
                                    $miz = implode(' | ',$miz);
                                    if(empty($miz)) $miz = null;
                                    @endphp
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{!! $miz ?? '<span class="text-danger">شما میز را حذف کردید</span>' !!}</td>
                                        <td>{{ $r->name }}</td>
                                        <td>{{ $r->phone }}</td>
                                        <td>{{ $jdf::jdate('y-m-d G:i',$r->time_s) }}</td>
                                        <td>{{ $jdf::jdate('y-m-d G:i',$r->time_e) }}</td>
                                        <td>{{ $r->detail }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">میزی رزرو نشده است.</td>
                                    </tr>
                                @endforelse
                            </table>

                            <ul class="pagination mt-5">
                                <li><a class="page-link" href="{{ url('admin/manage-products/'.$pages['next']) }}">صفحه بعد</a></li>
                                <li><a class="page-link" href="{{ url('admin/manage-products/'.$pages['pre']) }}">صفحه قبل</a></li>
                            </ul>

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