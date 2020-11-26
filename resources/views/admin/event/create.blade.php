
@extends('admin.master')

@section('title')
    ایجاد رویداد
@endsection

@section('content')
    <div class="main-panel">

        <!-- Page Title Header Starts-->
    {{--<div class="row page-title-header">--}}
    {{--<div class="col-12">--}}
    {{--<div class="page-header">--}}
    {{--<h4 class="page-title">ویرایش نظر</h4>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div>--}}
    <!-- Page Title Header Ends-->
        <div class="row">@include('admin.messages')</div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('event.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">تیتر</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       name="title"
                                >
                                @error('title')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>


{{--                            <div class="form-group">--}}
{{--                                <label for="end_time">زمان و تاریخ شروع : </label>--}}
{{--                                <div class="input-group">--}}
{{--                                    <div class="input-group-prepend">--}}
{{--                            <span class="input-group-text" id="inputGroupPrepend3">--}}
{{--                                 <img id="date_btn_9" src="{{ asset('calendar/cal.png') }}"--}}
{{--                                      style="vertical-align: top;"/>--}}
{{--                            </span>--}}
{{--                                    </div>--}}
{{--                                    <input required  class="form-control" id="date_input_9"--}}
{{--                                           name="end_time"--}}
{{--                                           data-format="yyyy-MM-dd hh:mm:ss" type="text">--}}
{{--                                </div>@error('end_time')--}}
{{--                                <div class="alert alert-danger"> {{$message}}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}





                            <div class="form-group">
                                <label for="end_time">زمان و تاریخ پایان : </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                 <img id="date_btn_9" src="{{ asset('calendar/cal.png') }}"
                                      style="vertical-align: top;"/>
                            </span>
                                    </div>
                                    <input required  class="form-control" id="date_input_9"
                                           name="end_time"
                                           data-format="yyyy-MM-dd hh:mm:ss" type="text"
                                    placeholder="2021-09-28 20:30">
                                </div>@error('end_time')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>











                            <div class="form-group">
                                <label for="text">متن</label>
                                <input type="text" class="form-control @error('text') is-invalid @enderror"
                                       name="text">
                                @error('text')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="restaurant_id"> رستوران</label>
                                <select class="form-control @error('restaurant_id') is-invalid @enderror"
                                       name="restaurant_id">
                                    @foreach($restaurants as $restaurant)

                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
{{--                                        @if(1) selected="selected" @endif--}}
                                    @endforeach
                                </select>
                                @error('restaurant_id')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>
                            {{--/////////////////////////////////////////////////////////////--}}


                            <div class="form-group">
                                <label for="game_id">بازی</label>
                                <select class="form-control @error('game_id') is-invalid @enderror"
                                       name="game_id">
                                    @foreach($games as $game)

                                        <option value="{{$game->id}}">{{$game->name}}</option>
                                        {{--                                        @if(1) selected="selected" @endif--}}
                                    @endforeach                                </select>
                                @error('game_id')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ایجاد رویداد</button>
                                <a href="{{route('event.show')}}" class="btn btn-warning">انصراف</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
