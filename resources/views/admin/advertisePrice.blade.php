@extends('admin.master')

@section('title')
    تبلیغات
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <p class="card-text">
                            <form action="{{ route('adver.price.change') }}" method="post">
                                @method("post")
                                @csrf
                                <p>هزینه تبلیغات (تومان)</p>
                                <input name="price" type="number" placeholder="url" value="{{ $option->main }}" class="mb-2 form-control">
                                <input type="submit" class="btn btn-primary" value="ویرایش">
                            </form>
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

