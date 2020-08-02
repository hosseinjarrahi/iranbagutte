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
                            <form method="post" action="{{ url('manager/detail-res') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                        نام رستوران:
                                        <input class="form-control" type="text" name="name" value="{{ $res->name ?? ''}}">
                                        <br>
                                        آدرس:
                                        <input class="form-control" type="text" name="address" value="{{ $res->options->address ?? ''}}">
                                        <br>
                                        نحوه تماس با فروشگاه:
                                        <input class="form-control" type="text" name="contact" value="{{ $res->options->contact ?? ''}}">
                                        <br>
                                        نحوه ارسال:
                                        <input class="form-control" type="text" name="send" value="{{ $res->options->send ?? ''}}">
                                        <br>
                                        ساعت کاری:
                                        <br>
                                        از
                                        <input class="form-control" type="text" name="time1" value="{{ $res->options->start ?? ''}}">
                                        تا
                                        <input class="form-control" type="text" name="time2" value="{{ $res->options->end ?? ''}}">
                                        <br>
                                        توضیحات رستوران شما:
                                        <br>
                                        <textarea name="details" class="form-control" cols="30" rows="5">{{ $res->options->details ?? ''}}</textarea>
                                        <br>
                                        جای پارک:
                                        <br>
                                        دارد
                                        <input type="radio" name="park" value="1" @if($res->options->park ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="park" value="0" @unless($res->options->park ?? 0) checked @endif>
                                        <br>
                                        اینترنت:
                                        <br>
                                        دارد
                                        <input type="radio" name="wifi" value="1" @if($res->options->wifi ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="wifi" value="0" @unless($res->options->wifi ?? 0) checked @endif>
                                        <br>
                                        زمین بازی:
                                        <br>
                                        دارد
                                        <input type="radio" name="game" value="1" @if($res->options->game ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="game" value="0" @unless($res->options->game ?? 0) checked @endif>
                                        <br>
                                        میز کودک:
                                        <br>
                                        دارد
                                        <input type="radio" name="child_bench" value="1" @if($res->options->child_bench ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="child_bench" value="0" @unless($res->options->child_bench ?? 0) checked @endif>
                                        <br>
                                        موسیقی زنده :
                                        <br>
                                        دارد
                                        <input type="radio" name="music" value="1" @if($res->options->music ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="music" value="0" @unless($res->options->music ?? 0) checked @endif>
                                        <br>
                                        تحویل رایگان :
                                        <br>
                                        دارد
                                        <input type="radio" name="delivery" value="1" @if($res->options->delivery ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="delivery" value="0" @unless($res->options->delivery ?? 0) checked @endif>
                                        <br>
                                        کارت خوان سیار:
                                        <br>
                                        دارد
                                        <input type="radio" name="kart" value="1" @if($res->options->kart ?? 0) checked @endif>
                                        ندارد
                                        <input type="radio" name="kart" value="0" @unless($res->options->kart ?? 0) checked @endif>
                                        <br>
                                        تصویر رستوران:
                                        @if(!empty($res->pics))
                                            @foreach($res->pics as $pic)
                                                <img src="{{ url('upload/'.$pic) }}" class="img-fluid col-12 col-md-6 col-lg-4">
                                            @endforeach
                                        @endif
                                        <input type="file" name="img" class="form-control">
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
