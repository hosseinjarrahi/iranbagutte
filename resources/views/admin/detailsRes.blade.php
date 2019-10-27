@extends('admin.master')

@section('title')
    ویژگی ها و امکانات رستوران
@endsection
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ url('admin/detail-Res') }}">
                                    <div class="form-group">
                                        نام رستوران:
                                        <input class="form-control" type="text" name="name" value="{{ $res->name ?? ''}}">
                                        <br>
                                        ساعت کاری:
                                        <br>
                                        از
                                        <input class="form-control" type="text" name="time1" value="{{ $res->time1 ?? ''}}">
                                        تا
                                        <input class="form-control" type="text" name="time2" value="{{ $res->time2 ?? ''}}">
                                        <br>
                                        توضیحات رستوران شما:
                                        <br>
                                        <textarea name="details" class="form-control" cols="30" rows="5">{{ $res->details ?? ''}}</textarea>
                                        <br>
                                        جای پارک:
                                        <br>
                                        دارد
                                        <input type="radio" name="park" value="1" @if($res->park) checked @endif>
                                        ندارد
                                        <input type="radio" name="park" value="0" @if(!$res->park) checked @endif>
                                        <br>
                                        اینترنت:
                                        <br>
                                        دارد
                                        <input type="radio" name="wifi" value="1" @if($res->wifi) checked @endif>
                                        ندارد
                                        <input type="radio" name="wifi" value="0" @if(!$res->wifi) checked @endif>
                                        <br>
                                        زمین بازی:
                                        <br>
                                        دارد
                                        <input type="radio" name="game" value="1" @if($res->game) checked @endif>
                                        ندارد
                                        <input type="radio" name="game" value="0" @if(!$res->game) checked @endif>
                                        <br>
                                        میز کودک:
                                        <br>
                                        دارد
                                        <input type="radio" name="child_bench" value="1" @if($res->child_bench) checked @endif>
                                        ندارد
                                        <input type="radio" name="child_bench" value="0" @if(!$res->child_bench) checked @endif>
                                        <br>
                                        موسیقی زنده :
                                        <br>
                                        دارد
                                        <input type="radio" name="music" value="1" @if($res->music) checked @endif>
                                        ندارد
                                        <input type="radio" name="music" value="0" @if(!$res->music) checked @endif>
                                        <br>
                                        تحویل رایگان :
                                        <br>
                                        دارد
                                        <input type="radio" name="delivery" value="1" @if($res->delivery) checked @endif>
                                        ندارد
                                        <input type="radio" name="delivery" value="0" @if(!$res->delivery) checked @endif>
                                        <br>
                                        کارت خوان سیار:
                                        <br>
                                        دارد
                                        <input type="radio" name="kart" value="1" @if($res->kart) checked @endif>
                                        ندارد
                                        <input type="radio" name="kart" value="0" @if(!$res->kart) checked @endif>
                                    </div>
                                    <button class="btn btn-primary" type="submit">تغییر</button>
                            </form>
                        </div>
                    </div>

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


@endsection