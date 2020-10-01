@extends('admin.master')

@section('title')
    مدیریت فضای مجازی و اپلیکیشن
@endsection

@section('content')
    <div class="main-panel">
    {{--<div class="content-wrapper">--}}
    <!-- Page Title Header Starts-->
        {{--<div class="row page-title-header">--}}
        {{--<div class="col-12">--}}
        {{--<div class="page-header">--}}
        {{--<h4 class="page-title">مدیریت نظرات</h4>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
        <div class="row">@include('admin.messages')</div>
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>نام</th>
                                <th>آدرس</th>
                                <th>مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($cyberspaces as $cyberspace)

                                <tr>
                                    <td>{{$cyberspace->name}}</td>
                                    <td>{{$cyberspace->url}}</td>

                                    <td>
                                        <a href="{{route('admin.cyberspace.edit',$cyberspace->id)}}">
                                            <label class="badge badge-success">ویرایش</label>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
