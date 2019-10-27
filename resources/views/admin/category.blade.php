@extends('admin.master')

@section('title')
    دسته بندی ها
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                @if(isset($message))
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <span class="alert alert-info ">{{ $message }}</span>
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($errors))
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @foreach($errors as $error)
                                <span class="alert alert-danger ">{{ $error }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif

                @if(isset($errors) || isset($message))
                        <p><a href="{{ url('admin/category') }}" class="btn btn-primary" >بازگشت</a></p>
                @endif

                @unless(isset($errors) || isset($message))
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">افزودن موضوع</h5>

                            <p class="card-text">
                                <form action="{{ url('admin/category') }}" method="post">
                                    @method(PUT)
                                    <input type="text" name="name" class="mb-2 form-control" placeholder="موضوع جدید">
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

                                    {!! $html ?? '' !!}

                            </p>

                        </div>
                    </div>
                </div>
                @endunless
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection

