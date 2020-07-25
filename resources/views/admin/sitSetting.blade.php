@extends('admin.master')
@section('title')
    تنظیمات و افزودن میز
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{route('tableInfo.update',$tableInfo->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    قیمت:
                                    <input class="form-control" type="number" name="price"
                                           value="{{ $tableInfo->price ?? ''}}">
                                    <br>
                                    تصاویر رستوران:
                                    <div class="row">
                                        <div class="col-6">
                                            @if(!empty($tableInfo->img1))
                                                <img src="{{ url('upload/'.$tableInfo->img1) }}"
                                                     class="img-fluid col-12 col-md-6 col-lg-4">
                                            @endif
                                            <input type="file" name="img1" class="form-control">
                                        </div>

                                        <div class="col-6">
                                            @if(!empty($tableInfo->img2))
                                                <img src="{{ url('upload/'.$tableInfo->img2) }}"
                                                     class="img-fluid col-12 col-md-6 col-lg-4">
                                            @endif
                                            <input type="file" name="img2" class="form-control">
                                        </div>
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
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('manager/add/sit') }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="email">میز چند نفره:<b class="text-danger">{{ $errors->name ?? '' }}</b></label>
                                    <input class="form-control" type="number" min="0" max="20" name="capacity"
                                           id=""><br>
                                </div>
                                {{--                                <div class="form-group">--}}
                                {{--                                    <label for="email">هزینه میز:<b class="text-danger">{{ $errors->price ?? '' }}</b></label>--}}
                                {{--                                        <input class="form-control" type="number" name="price" id=""><br>--}}
                                {{--                                </div>--}}
                                <button type="submit" name="add_product" class="btn btn-primary">افزودن محصول</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">میز های شما</h5>
                            <table class="table table-bordered table table-hover">
                                <tr>
                                    <th>نفر</th>
                                    {{--                                    <th>هزینه</th>--}}
                                    <th>حذف</th>
                                </tr>
                                @forelse($opt as $o)
                                    <tr>
                                        <td class="col-12">{{ $o->capacity }}</td>
                                        {{--                                        <td class="col-12">{{ $o->price }}</td>--}}
                                        <td><a href="{{ url('manager/rm-sit/'.$o->id) }}">حذف</a></td>
                                    </tr>
                                @empty
                                    <p>هیچ میزی یافت نشد</p>
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
