@extends('dashboard.master')

@section('title')
    کد | ایران باگت
@endsection

@section('content')

    <div class="container d-flex flex-column justify-content-center align-items-center mt-3">
        <div class="col-12">
            <table class="table table-striped">
                <tr>
                    <td>کد</td>
                    <td>برای</td>
                </tr>
                @foreach($buycodes as $buycode)
                    <tr>
                        <td>{{ $buycode->code }}</td>
                        <td>
                            @if($buycode->game_id)
                                <span>امکان ادامه بازی در </span>
                                "<span>{{ (\App\Game::find($buycode->game_id))->name }}</span>"
                            @elseif($buycode->product_id)
                                <span>امکان خرید محصول </span>
                                "<span>{{ (\App\Food::find($buycode->product_id))->title }}</span>"
                                <span> با تخفیف </span>
                                <span>{{ $buycode->percent }}</span>
                                <span>%</span>
                                <a href="{{ route('run.buycode',['buycode' => $buycode->id]) }}" class="btn btn-primary">خرید</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection
