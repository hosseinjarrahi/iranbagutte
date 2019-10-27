@extends('admin.master')

@section('title')
    مشاهده محصولات
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
                                    <th>#</th>
                                    <th class="col-12">نام محصول</th>
                                    <th>ویرایش</th>
                                    <th>حذف</th>
                                </tr>

                                @forelse($products as $product)
                                    <tr>
                                        @php $i++; @endphp
                                        <td>{{ $start + $i }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td><a href="{{ url('admin/edit-product/'.$product->id) }}">ویرایش</a></td>
                                        <td><a href="{{ url('admin/remove-product/'.$product->id) }}">حذف</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">هیچ محصولی یافت نشد</td>
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