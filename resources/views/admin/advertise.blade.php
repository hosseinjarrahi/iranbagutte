@extends('admin.master')

@section('title')
    تبلیغات ثابت
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold">افزودن تبلیغات ثابت</h5>

                            <p class="card-text">
                            <form action="{{ url('admin/advertise') }}" method="post" enctype="multipart/form-data">
                                @method(PUT)
                                @csrf
                                <input name="url" type="url" placeholder="url" class="mb-2 form-control">
                                <input type="file" name="img" class="mb-2 form-control">
                                <select name="state" class=" mb-2 form-control">
                                    <option value="1">بالا</option>
                                    <option value="0">بایین</option>
                                </select>
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
                                    <th>state</th>
                                    <th>url</th>
                                    <th>img</th>
                                    <th>clicks</th>
                                    <th>delete</th>
                                </tr>
                                @forelse($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->state == 1 ? 'up' : 'down'}}</td>
                                        <td>{{ $ad->url }}</td>
                                        <td class="col-12">
                                            <img class="col-10 col-lg-3 img-fluid" src="{{ asset('upload/'.$ad->img) }}">
                                        </td>
                                        <td>{{ $ad->clicks }}</td>
                                        <td>
                                            <a href="{{ url('admin/advertise/delete/'.$ad->id) }}">حذف</a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>هیچ تبلیغاتی یافت نشد</p>
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

