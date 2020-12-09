@extends('admin.master')
@section('title')
    مدیریت کد ها
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('buycode.store') }}">
                                @csrf
                                <input type="text" name="count" class="my-2 form-control" placeholder="تعداد کد">
                                <select name="game_id" class="my-2 form-control" placeholder="بازی">
                                    <option value=""> - </option>
                                    @foreach($games as $game)
                                        <option value="{{$game->id}}">
                                            {{$game->name}} * {{$game->id}}
                                        </option>
                                    @endforeach
                                </select>
{{--                                <input type="text" name="game_id" class="my-2 form-control" placeholder="آیدی بازی">--}}

                                <select name="food_id" class="my-2 form-control" placeholder="غذا">
                                    <option value=""> - </option>
                                    @foreach($foods as $food)
                                        <option value="{{$food->id}}">
                                            {{$food->title}} * {{$food->restaurant->name}} * {{$food->id}}
                                        </option>
                                    @endforeach

                                </select>
{{--                                <input type="text" name="product_id" class="my-2 form-control" placeholder="آیدی محصول">--}}

                                <input type="text" name="event_id" class="my-2 form-control" placeholder="آیدی رویداد">
                                <input type="text" name="percent" class="my-2 form-control" placeholder="درصد تخفیف محصول">
                                <button class="btn btn-primary">ثبت</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <td>کد</td>
                                    <td>آیدی بازی</td>
                                    <td>آیدی محصول</td>
                                    <td>درصد تخفیف</td>
                                    <td>حذف</td>
                                </tr>
                                @forelse($buyCodes as $buyCode)
                                    <tr>
                                        <td>{{ $buyCode->code ?? '*' }}</td>
                                        <td>{{ $buyCode->game_id ?? '*' }}</td>
                                        <td>{{ $buyCode->product_id ?? '*'}}</td>
                                        <td>{{ $buyCode->percent ?? '*'}}</td>
                                        <td>
                                            <form action="{{ route('buycode.destroy',['buycode' => $buyCode->id]) }}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    هیچ کدی پیدا نشد
                                @endforelse
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
