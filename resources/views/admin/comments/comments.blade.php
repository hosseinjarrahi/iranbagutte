@extends('admin.master')

@section('title')
    مدیریت نظرات - بخش مدیریت
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
                                <th>خلاصه نظر</th>
                                <th>نویسنده</th>
                                <th>برای مطلب</th>
                                <th>تاریخ ثبت</th>
                                <th>وضعیت</th>
                                <th>مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>


                            @foreach($comments as $comment)

                                @switch($comment->status)
                                @case('1')
                                @php
                                    $url=route('admin.comments.status',$comment->id);
                                    $status="<a href='".$url."' class='badge badge-success'>منتشر شده</a>";
                                @endphp
                                @break
                                @case('0')
                                @php
                                    $url=route('admin.comments.status',$comment->id);
                                    $status="<a href='".$url."' class='badge badge-warning'>منتشر نشده</a>";
                                @endphp
                                @break
                                @endswitch


                                <tr>
                                    <td>{{mb_substr($comment->body,0,50)}}</td>

                                    <td>{{$comment->name}}</td>

                                    <td>

                                        @php
                                            $role=$comment->role;
                                        @endphp
                                        @if($role == 1)
                                            {{ $comment->game->name }}

                                        @elseif($role == 2)
                                            {{--{{ $comment->restaurant->name }}--}}
                                        @endif

                                    </td>

                                    <td>{!! jdate($comment->created_at)!!}</td>
                                    <td>{!! $status !!}</td>

                                    <td>
                                        <a href="{{route('admin.comments.edit',$comment->id)}}">
                                            <label class="badge badge-success">ویرایش</label>

                                        </a>
                                        <a href="{{route('admin.comments.destroy',$comment->id)}}"
                                           onclick="return confirm('آیا این نظر حذف شود')">
                                            <label class="badge badge-danger">حذف</label>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$comments->links()}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
