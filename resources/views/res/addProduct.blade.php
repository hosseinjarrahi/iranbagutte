@extends('res.master')
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
                            <form method="post" action="{{ url('restaurant/add-product') }}" enctype="multipart/form-data">
                                @method(PUT)
                                <div class="form-group">
                                    <label for="email"> نام محصول:<b class="text-danger"> {{ $errors['name'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="name" value="{{ $product->name ?? '' }}"><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> عنوان محصول:<b class="text-danger"> {{ $errors['title'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="title" id="" value="{{ $product->title ?? '' }}"><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> قیمت:<b class="text-danger"> {{ $errors['price'] ?? '' }}</b></label>
                                    <input class="form-control" type="number" name="price" id="" value="{{ $product->price ?? '' }}"><br>
                                </div>

                                <div class="form-group">
                                    <label for="email"> توضیحات جرئی:<b class="text-danger"> {{ $errors['small_detail'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="small_detail" id="" value="{{ $product->small_detail ?? '' }}"><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> توضیحات:<b class="text-danger"> {{ $errors['main_detail'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="main_detail" id="" value="{{ $product->main_detail ?? '' }}"><br>
                                </div>
                                <div class="form-group">
                                    <label for="email"> عکس:<b class="text-danger"> {{ $errors['img'] ?? '' }}</b></label>
                                    <input class="form-control" type="file" name="img" id=""><br>
                                </div>
                                <div class="form-group">
                                    <p class="alert border border-info">برچسب ها را با - از هم جدا کنید</p>
                                    <label for="email"> برچسب ها:<b class="text-danger"> {{ $errors['labels'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" name="labels" id="" value="{{ $product->labels ?? '' }}"><br>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-primary">افزودن محصول</button>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">موضوع</h5>
                            {!! $html ?? 'موضوعی یافت نشد' !!}
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection