@extends('admin.master')

@section('title')
    ویرایش رویداد
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
                            <form action="{{route('event.update',$event->id)}}" method="post">
                                @method('put')
                                @csrf
                                <div class="form-group">
                                    <label for="title">تیتر</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           name="title"
                                           value="{{$event->title}}">
                                    @error('title')
                                    <div class="alert alert-danger"> {{$message}}</div>
                                    @enderror
                                </div>



                                <div class="form-group">
                                    <label for="text">متن</label>
                                    <input type="text" class="form-control @error('text') is-invalid @enderror"
                                           name="text"
                                           value="{{$event->text}}">
                                    @error('text')
                                    <div class="alert alert-danger"> {{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="restaurant_id">ID رستوران</label>
                                    <input type="text" class="form-control @error('restaurant_id') is-invalid @enderror"
                                           name="restaurant_id"
                                           value="{{$event->restaurant_id}}">
                                    @error('restaurant_id')
                                    <div class="alert alert-danger"> {{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <label for="game_id">ID بازی</label>
                                    <input type="text" class="form-control @error('game_id') is-invalid @enderror"
                                           name="game_id"
                                           value="{{$event->game_id}}">
                                    @error('game_id')
                                    <div class="alert alert-danger"> {{$message}}</div>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">ویرایش</button>
                                    <a href="{{route('event.show')}}" class="btn btn-warning">انصراف</a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

    </div>
@endsection
