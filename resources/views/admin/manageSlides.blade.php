@extends('admin.master')

@section('title')
    مدیریت اسلاید ها
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

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-2 text-bold">افزودن اسلاید</h5>

                                <p class="card-text">
                                <form action="{{ url('manager/slides') }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <select name="category" class="form-control">
                                        @foreach($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                    <input type="file" name="img" class="mb-2 form-control">
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
                                    @forelse($slides as $slide)
                                        <tr>
                                            <td class="col-12"><img class="col-10 col-lg-3 img-fluid" src="{{ asset('upload/'.$slide->img) }}"></td>
                                            <td><a href="{{ url('manager/slides/delete/'.$slide->id) }}">حذف</a></td>
                                        </tr>
                                    @empty
                                        <p>هیچ اسلاید یافت نشد</p>
                                    @endforelse
                                </table>
                                </p>

                            </div>
                        </div>
                    </div>
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
@endsection

