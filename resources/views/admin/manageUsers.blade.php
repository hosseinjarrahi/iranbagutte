@extends('admin.master')

@section('title')
    مدیریت کاربران
@endsection

@section('content')
    @inject('Developer','App\Models')
    @inject('Res','App\Models')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if(!(isset($s) || isset($dev)))
                            <div class="alert alert-info">رنگ قرمز به منزله ی کاربر ویژه و رنگ آبی ، بازی ساز می باشد.</div>
                            @endif
                            <table class="table table-hover table-responsive">
                                <tr>
                                    <th>#</th>

                                    @if(!(isset($s)))
                                        <th>نام</th>
                                        <th>نام خانوادگی</th>
                                        <th>تلفن</th>
                                        <th>نام کاربری</th>
                                        <th>ایمیل</th>
                                        @if(!(isset($dev)))
                                        <th>آدرس</th>
                                        @endif
                                        <th>-</th>
                                    @endif
                                    @if((isset($s) && !isset($dev)))
                                        <th>نام رستوران</th>
                                        <th>نام کاربری</th>
                                        <th>حذف</th>
                                    @endif

                                    @if(!(isset($s) || isset($dev)))
                                    <th>-</th>
                                    <th>-</th>
                                    @endif
                                </tr>

                                @forelse($users as $key => $user)
                                    @php
                                        $Sborder = false;
                                        $Dborder = false;
                                        if(!(isset($s) || isset($dev)))
                                        {
                                            if(!empty($Developer::findByUsername($user->username)))
                                            {
                                                $Dborder = true;
                                            }
                                            if(!empty($Res::findByUsername($user->username)))
                                            {
                                                $Sborder = true;
                                            }
                                        }
                                    @endphp
                                <tr>
                                    <td class="
                                    @if($Sborder)
                                            bg-danger text-white
                                    @elseif($Dborder)
                                            bg-info text-white
                                    @endif
                                            ">{{  $key }}</td>

                                    @if(!(isset($s)))
                                        <td>{{ $user->fname }}</td>
                                        <td>{{ $user->lname }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        @if(!(isset($dev)))
                                            <td>{{ $user->address }}</td>
                                        @endif
                                    @endif

                                    @if((isset($s) && !isset($dev)))
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->username }}</td>
                                    @endif

                                    @if(!(isset($s) || isset($dev)))
                                        <td><a href="{{ url('admin/promote-to-special/'.$user->id) }}">ارتقاء به کاربر ویژه</a></td>
                                        <td><a href="{{ url('admin/promote-to-dev/'.$user->id) }}">ارتقاء به بازی ساز</a></td>
                                    @endif

                                    @if(isset($s))
                                        <td><a href="{{ url('admin/remove-user/s/'.$user->id) }}">حذف</a></td>
                                    @elseif(isset($dev))
                                        <td><a href="{{ url('admin/remove-user/d/'.$user->id) }}">حذف</a></td>
                                    @else
                                        <td><a href="{{ url('admin/remove-user/r/'.$user->id) }}">حذف</a></td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">هیچ کاربری یافت نشد</td>
                                </tr>
                                @endforelse
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