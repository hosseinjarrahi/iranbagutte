@extends('admin.master')

@section('title')
    مدیریت کاربران
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

                                        <th>نام</th>
                                        <th>تلفن</th>
                                        <th>نام کاربری</th>
                                        <th>ایمیل</th>
                                        <th>آدرس</th>
                                        <th>نام رستوران</th>
                                        <th>نام کاربری</th>
                                        <th>ویرایش</th>
                                        <th>حذف</th>

                                </tr>

                                @foreach($users as $user)
                                <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>

                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>

                                        <td><a href="{{ url('manager/show-user/'.$user->id) }}">ویرایش دسترسی</a></td>

                                        <td><a href="{{ url('manager/remove-user/'.$user->id) }}">حذف</a></td>
                                </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                {{ $users->links() }}
                <!-- /.col-md-6 -->
            </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection