@extends('admin.master')
@section('title')
    فضای مجازی
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('/') }}" enctype="multipart/form-data">
                                @method(PUT)
                                <div class="form-group">
                                    <label for="email">تلگرام:<b class="text-danger">{{ $errors['name'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" placeholder="آدرس را اینجا وارد کنید" min="0" max="20" name="count" id=""><br>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-primary">تغییر</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('/') }}" enctype="multipart/form-data">
                                @method(PUT)
                                <div class="form-group">
                                    <label for="email">اینستاگرام:<b class="text-danger">{{ $errors['name'] ?? '' }}</b></label>
                                    <input class="form-control" type="text" placeholder="آدرس را اینجا وارد کنید" min="0" max="20" name="count" id=""><br>
                                </div>
                                <button type="submit" name="add_product" class="btn btn-primary">تغییر</button>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection