@extends('res.master')
@section('title')
    رویداد ویژه
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('restaurant/add-event') }}" enctype="multipart/form-data">
                                @method(PUT)
                                <div class="form-group">
                                    <label for="email">عنوان رویداد:<b class="text-danger">{{ $errors['name'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="title" id=""><br>
                                </div>
                                <div class="form-group">
                                    <label for="email">توضیحات:<b class="text-danger">{{ $errors['title'] ?? '' }}</b></label>
                                    <textarea class="form-control" type="text" name="main" id=""></textarea><br>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-primary">افزودن رویداد</button>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">افزودن تصویر به رویداد</h5>
                            <form action="{{ url('restaurant/add-img-event') }}" enctype="multipart/form-data" method="post">
                                <input type="file" name="img" class="form-control">
                                <input type="submit" class="btn btn-primary m-2" value="افزودن تصویر">
                            </form>
                            <p class="p-2">
                                <table class="table table-bordered table table-hover">
                                    @forelse($imgs as $img)
                                        <tr>
                                            <td class="col-12"><img class="img-fluid col-5 col-lg-2" src="{{ asset('upload/'.$img->img) }}" alt=""></td>
                                            <td><a href="{{ url('restaurant/rmv-img-event/'.$img->id) }}">حذف</a></td>
                                        </tr>
                                    @empty
                                    <p>هیچ تصویری یافت نشد</p>
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