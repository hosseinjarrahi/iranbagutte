@extends('admin.master')
@section('title')
    افزودن محصول
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            {{--<h5 class="card-title mb-2 text-bold">فرم افزودن کالا</h5>--}}

                            <form action="{{ url('manager/add-food') }}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="email"> عنوان محصول:<b class="text-danger">{{ $errors->title ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="title" id=""><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> قیمت:<b class="text-danger">{{ $errors->price ?? '' }}</b></label>
                                    <input class="form-control" type="number" name="price" id=""><br>
                                </div>

                                <div class="form-group">
                                    <label for="email"> توضیحات جرئی:<b class="text-danger">{{ $errors->small_detail ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="small_detail" id=""><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> توضیحات:<b class="text-danger">{{ $errors->main_detail ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="main_detail" id=""><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> عکس:<b class="text-danger"></b></label>
                                    <input class="form-control" type="file" name="img" id=""><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> برچسب ها:<b class="text-danger">{{ $errors->labels ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="labels" id=""><br>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-primary">افزودن محصول</button>

                        </div>
                    </div>

                    <!-- /.col-md-6 -->
                </div>

                <div class="row col-6">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-bold">موضوع</h5>
                                {!! $html ?? 'موضوعی یافت نشد' !!}
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection