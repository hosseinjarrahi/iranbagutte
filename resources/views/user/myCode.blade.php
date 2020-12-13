@extends('dashboard.master')

@section('title')
    بازی های من
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
{{--                            ////--}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">بازی های من</h3>

                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-striped">
                                                <tbody><tr>
                                                    <th>كد ادامه بازی</th>
                                                    <th>لينک بازی</th>
                                                </tr>
                                                @foreach($mycode as $code)
                                                <tr>
                                                    <td>{{$code->code}}</td>
                                                    <td>
                                                        @if(isset($code->game_id))

                                                        <a href="{{route('front.game',$code->game()->first()->id)}}">{{$code->game()->first()->name}}</a>


                                                        @else
                                                            <span class="badge badge-primary">هنوز استفاده نشده...</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody></table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">بازی های خریداری شده</h3>

                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body table-responsive p-0">
                                            <table class="table table-striped">
                                                <tbody><tr>
                                                    <th>نام بازی</th>
                                                    <th>لينک بازی</th>
                                                </tr>
                                                @foreach($games as $game)
                                                    @php
                                                    $game=$game->game()->first();
                                                    @endphp
                                                    <tr>
                                                        <td>{{$game->name}}</td>
                                                        <td>


                                                                <a href="{{route('front.game',$game->id)}}">برو به صفحه بازی</a>


                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody></table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>

                            </div>
{{--                            --}}
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
