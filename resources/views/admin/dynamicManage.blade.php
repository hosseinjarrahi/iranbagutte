@extends('admin.master')

@section('title')
    تبلیغات ابتدای بازی
@endsection

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">
                            <form action="{{ url('admin/advertise/dynamic') }}" method="post" enctype="multipart/form-data">
                                @method(PUT)
                                @csrf
                                <input name="url" type="url" placeholder="آدرس سایت" class="mb-2 form-control">
                                <input name="time" type="number" placeholder="زمان تبلیغ بر حسب ثانیه" class="mb-2 form-control">
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
                                <tr>
                                    <th>url</th>
                                    <th>img</th>
                                    <th>clicks</th>
                                    <th>delete</th>
                                </tr>
                                @forelse($ads as $ad)
                                    <tr>
                                        <td>{{ $ad->url }}</td>
                                        <td class="col-12">
                                            <img class="col-10 col-lg-3 img-fluid" src="{{ asset('upload/'.$ad->img) }}">
                                        </td>
                                        <td>{{ $ad->clicks }}</td>
                                        <td>
                                            <a href="{{ url('admin/advertise/dynamic/delete/'.$ad->id) }}">حذف</a>
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

