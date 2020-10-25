@extends('admin.master')

@section('title')
    بازی ها
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2 text-bold"></h5>

                            <p class="card-text">
                            <p class="dropdown-divider"></p>
                            <table class="table table-bordered table table-hover">
                                <tr>
                                    <th>نام بازی</th>
                                    <th>ID بازی</th>
                                    <th>تعداد فروش</th>
                                    <th>نام کاربری فرستنده</th>
                                    <th>دانلود</th>
                                    <th>تایید</th>
                                    <th>عدم تایید</th>
                                    <th>بازی های ویژه</th>
                                    <th>حذف</th>
                                </tr>
                                @forelse($games as $game)
                                    <tr>
                                        <td class="@if($game->status) bg-success @else bg-danger @endif">{{ $game->name }}</td>
                                        <td>{{ $game->id }}</td>
                                        <td>{{ $sells[$game->id] }}</td>
                                        <td>{{ $game->user->username }}</td>
                                        <td><a href="{{ url('manager/download-game/'.$game->id) }}">دانلود</a></td>
                                        <td><a href="{{ url('manager/verification-game/'.$game->id) }}">تایید</a></td>
                                        <td><a href="{{ url('manager/block-game/'.$game->id) }}">عدم تایید</a></td>
                                        <td><a href="{{route('specialGame',$game->id)}}">@if($game->special==0) بازی ساده @else بازی ویژه @endif</a></td>
                                        <td><a href="{{ url('manager/games/'.$game->id) }}">حذف</a></td>
                                    </tr>
                                @empty
                                    هیچ بازی پیدا نشد
                                @endforelse
                            </table>
                            {{ $games->links() }}
                            </p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
