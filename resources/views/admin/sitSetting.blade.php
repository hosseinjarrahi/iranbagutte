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
                            <form method="post" action="{{ url('admin/add/sit') }}" enctype="multipart/form-data">
                                @method(PUT)
                                <div class="form-group">
                                    <label for="email">میز چند نفره:<b class="text-danger">{{ $errors['name'] ?? '' }}</b></label>
                                    <input class="form-control" type="number" min="0" max="20" name="count" id=""><br>
                                </div>
                                <div class="form-group">
                                    <label for="email">هزینه میز:<b class="text-danger">{{ $errors['name'] ?? '' }}</b></label>
                                        <input class="form-control" type="number" name="price" id=""><br>
                                </div>
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
                                    <th>هزینه</th>
                                    <th>حذف</th>
                                </tr>
                            @forelse($opt as $o)
                                    <tr>
                                        <td class="col-12">{{ $o->capacity }}</td>
                                        <td class="col-12">{{ $o->price }}</td>
                                        <td><a href="{{ url('admin/rm-sit/'.$o->id) }}">حذف</a></td>
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