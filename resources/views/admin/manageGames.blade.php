@extends('admin.master')

@section('title')
    بازی ها
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">افزودن بازی</h5>

                            <p class="card-text">
                            <form action="{{ url('admin/games') }}" method="post" enctype="multipart/form-data">
                                @method(PUT)
                                @csrf
                                <div class="form-group">
                                    <input name="name" type="text" placeholder="نام بازی" class="mb-2 form-control">
                                </div>
                                <div class="form-group">
                                    <input name="part" type="text" placeholder="تعداد قسمت ها"
                                           class="mb-2 form-control">
                                </div>
                                <div class="form-group">
                                    <span>پوستر بازی:</span>
                                    <input type="file" name="poster" class="mb-2 form-control">
                                </div>
                                <div class="form-group">
                                    <span>فایل بازی با فرمت Zip:</span>
                                    <span class="text-muted">شامل تمامی قسمت های بازی</span>
                                    <input type="file" name="file" class="mb-2 form-control">
                                </div>
                                <div class="form-group">
                                    <span>نسخه کامل با فرمت zip :</span>
                                    <input type="file" name="full" class="mb-2 form-control">
                                </div>

                                <input type="submit" class="btn btn-primary" value="افزودن">
                            </form>
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold"></h5>

                            <p class="card-text">
                            <p class="dropdown-divider"></p>
                            <table class="table table-bordered table table-hover">
                                <tr>
                                    <th>نام بازی</th>
                                    <th>حذف</th>
                                </tr>
                                @forelse($games as $game)
                                    <tr>
                                        <td>{{ $game->name }}</td>
                                        <td><a href="{{ url('admin/games/'.$game->id) }}">حذف</a></td>
                                    </tr>
                                @empty
                                    هیچ بازی پیدا نشد
                                @endforelse
                            </table>
                            </p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">آموزش</h5>
                            <p class="card-text">
                                ابتدا مطابق تصویر هر قسمت رو به نام های part1 , part2 و... پوشه بندی کنید.
                                <p class="text-danger">روی پوشه ها کلیک راست کرده و آن ها را zip کنید</p>
                                <p class="text-danger">دقت کنید پسوند rar را انتخاب نکنید حتما .zip باشد</p>
                            </p>
                            <p class="card-text">
                                دقت کنید محتویات هر part مانند عکس دوم است.
                            </p>
                            <p class="card-text">
                                برای بهبود رابط کاربری بازی در موبایل میتوانید قطعه کد (استایل) زیر را به فایل index.html اضافه کنید.مطابق عکس
                            </p>
                            <img src="{{ asset('img/tut.jpg') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection