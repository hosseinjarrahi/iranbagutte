@extends('dev.master')
@section('title')
    ارسال بازی
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
                                    <span>پوستر بازی:</span>
                                    <input type="file" name="poster" class="mb-2 form-control">
                                </div>
                                <div class="form-group">
                                    <span>فایل بازی با فرمت Zip:</span>
                                    <span class="text-muted">شامل تمامی قسمت های بازی</span>
                                    <input type="file" name="file" class="mb-2 form-control">
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
                                    <th>وضعیت</th>
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
        </div>
    </div>

@endsection