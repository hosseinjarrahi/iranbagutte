@extends('admin.master')

@section('title')
    میز های رزرو شده
@endsection

@section('content')
@inject('table','App\Table')
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
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{!!$r->tables->implode(' - ') ?? '<span class="text-danger">میزی رزرو نشده است</span>' !!}</td>
                                        <td>{{ $r->name }}</td>
                                        <td>{{ $r->phone }}</td>
                                        <td>{{ $r->start_time }}</td>
                                        <td>{{ $r->end_time }}</td>
                                        <td>{{ $r->detail }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">میزی رزرو نشده است.</td>
                                    </tr>
                                @endforelse
                            </table>

                            {{ $reserve->links() }}

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