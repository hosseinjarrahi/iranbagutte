@extends('admin.master')

@section('title')
    مدیریت رویدادها - بخش مدیریت
@endsection

@section('content')
    <div class="main-panel">
        <div class="row">@include('admin.messages')</div>
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if(!isset($event))
                            رویدادی وجود ندارد...
                            <form action="{{route("event.create")}}" method="get">
                                <button class="btn btn-primary" type="submit" style="margin: auto;display: block;">افزون رویداد</button>
                            </form>
                        @else
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>نام بازی</th>
                                <th>نام رستوران</th>
                                <th>تیتر کاشی</th>
                                <th>متن کاشی</th>
                                <th>مدیریت</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$event->game->name ?? ''}}</td>
                                    <td>{{$event->restaurant->name ?? ''}}</td>
                                    <td>{{$event->title ?? ''}}</td>
                                    <td>{{$event->text ?? ''}}</td>

                                    <td>
                                        <a href="{{route('event.edit',$event->id)}}">
                                            <label class="badge badge-success">ویرایش</label>

                                        </a>
                                        <a href="{{route('event.destroy',$event->id)}}"
                                           onclick="return confirm('آیا رویداد حذف شود')">
                                            <label class="badge badge-danger">حذف</label>

                                        </a>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
