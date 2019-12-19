@extends('admin.master')

@section('title')
    مشاهده کاربر
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
                                    <th>نام</th>
                                    <th>تلفن</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>آدرس</th>
                                </tr>

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                </tr>

                            </table>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="{{ url('manager/promote/'.$user->id) }}">
                                    @csrf
                                    <div class="alert alert-info">دسترسی ها</div>
                                    <div class="form-group">
                                        <div class="bg-danger p-3">
                                           **تمامی دسترسی ها**
                                            <br>
                                            <input type="checkbox" name="admin"
                                                   @if(!$role->where('access','admin')->isEmpty()) checked @endif>
                                            <br>
                                            <hr>
                                            مدیریت کاربران
                                            <br>
                                            <input type="checkbox" name="users"
                                                   @if(!$role->where('access','users')->isEmpty()) checked @endif>
                                            <br>
                                            مدیریت تبلیغات
                                            <br>
                                            <input type="checkbox" name="advertise"
                                                   @if(!$role->where('access','advertise')->isEmpty()) checked @endif>
                                            <br>
                                            مدیریت بازی ها
                                            <br>
                                            <input type="checkbox" name="games"
                                                   @if(!$role->where('access','games')->isEmpty()) checked @endif>
                                            <br>
                                            تنظیمات ادمین
                                            <br>
                                            <input type="checkbox" name="settings"
                                                   @if(!$role->where('access','adminSettings')->isEmpty()) checked @endif>
                                            <br>
                                            تنظیمات اسلایدر
                                            <br>
                                            <input type="checkbox" name="slides"
                                                   @if(!$role->where('access','slides')->isEmpty()) checked @endif>
                                            <br>
                                        </div>

                                        <div class="bg-success p-3">

                                            دسترسی های کاربر ویژه
                                            <br>
                                            <input id="vip" type="checkbox" name="vip"
                                                   @if(!$role->where('access','vip')->isEmpty()) checked @endif>
                                            <hr>
                                            مدیریت پست ها
                                            <br>
                                            <input type="checkbox" name="posts"
                                                   @if(!$role->where('access','posts')->isEmpty()) checked @endif>
                                            <br>
                                            مدیریت میز ها
                                            <br>
                                            <input type="checkbox" name="tables"
                                                   @if(!$role->where('access','tables')->isEmpty()) checked @endif>
                                            <br>
                                            مدیریت خریدها
                                            <br>
                                            <input type="checkbox" name="payments"
                                                   @if(!$role->where('access','payments')->isEmpty()) checked @endif>
                                            <br>
                                            تنظیمات سایت
                                            <br>
                                            <input type="checkbox" name="settings"
                                                   @if(!$role->where('access','settings')->isEmpty()) checked @endif>
                                            <br>
                                            نظرات
                                            <br>
                                            <input type="checkbox" name="comments"
                                                   @if(!$role->where('access','comments')->isEmpty()) checked @endif>
                                            <br>
                                        </div>
                                        <div class="bg-warning p-3">
                                            دسترسی های بازی ساز
                                            <br>
                                            <input id="developer" type="checkbox" name="developer"
                                                   @if(!$role->where('access','developer')->isEmpty()) checked @endif>
                                            <br>
                                            ارسال بازی
                                            <br>
                                            <input type="checkbox" name="sendGame"
                                                   @if(!$role->where('access','sendGame')->isEmpty()) checked @endif>
                                            <br>
                                            تایید بازی
                                            <br>
                                            <input type="checkbox" name="checkGame"
                                                   @if(!$role->where('access','checkGame')->isEmpty()) checked @endif>
                                            <br>
                                        </div>

                                    </div>
                                    <button class="btn btn-primary" type="submit">تغییر</button>
                                </form>
                            </div>
                        </div>

                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <script>
            vip.onclick = function (e) {
                if (vip.checked) {
                    let all = vip.parentElement.getElementsByTagName('input');
                    for (one of all) {
                        one.checked = true;
                    }
                } else {
                    let all = vip.parentElement.getElementsByTagName('input');
                    for (one of all) {
                        one.checked = false;
                    }
                }
            }
            developer.onclick = function (e) {
                if (developer.checked) {
                    let all = developer.parentElement.getElementsByTagName('input');
                    for (one of all) {
                        one.checked = true;
                    }
                } else {
                    let all = developer.parentElement.getElementsByTagName('input');
                    for (one of all) {
                        one.checked = false;
                    }
                }
            }
        </script>
@endsection