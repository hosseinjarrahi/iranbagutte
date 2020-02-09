@extends('admin.master')

@section('title')
    ویرایش {{$cyberspace['name']}}
@endsection

@section('content')
    <div class="main-panel">

        <div class="row">@include('admin.messages')</div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('admin.cyberspace.update',$cyberspace->id)}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input type="text" class="form-control"
                                       name="name"
                                       value="{{$cyberspace->name}}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="url">url</label>
                                <input type="text" class="form-control @error('url') is-invalid @enderror"
                                       name="url"
                                       value="{{$cyberspace->url}}">
                                @error('url')
                                <div class="alert alert-danger"> {{$message}}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-success">ویرایش</button>
                                <a href="{{route('admin.cyberspace')}}" class="btn btn-warning">انصراف</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection