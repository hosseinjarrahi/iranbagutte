@extends('admin.master')

@section('title')
    ایجاد رویداد
@endsection

@section('content')
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('calendar/skins/aqua/theme.css')}}" title="Aqua"/>
    <!-- import the Jalali Date Class script -->
    <script type="text/javascript" src="{{asset('calendar/jalali.js')}}"></script>
    <!-- import the calendar script -->
    <script type="text/javascript" src="{{asset('calendar/calendar.js')}}"></script>
    <!-- import the calendar script -->
    <script type="text/javascript" src="{{asset('calendar/calendar-setup.js')}}"></script>
    <!-- import the language module -->
    <script type="text/javascript" src="{{asset('calendar/lang/calendar-fa.js')}}"></script>
    <!-- helper script that uses the calendar -->
    <script type="text/javascript">

        var oldLink = null;

        // code to change the active stylesheet
        function setActiveStyleSheet(link, title) {
            var i, a, main;
            for (i = 0; (a = document.getElementsByTagName("link")[i]); i++) {
                if (a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
                    a.disabled = true;
                    if (a.getAttribute("title") == title) a.disabled = false;
                }
            }
            if (oldLink) oldLink.style.fontWeight = 'normal';
            oldLink = link;
            link.style.fontWeight = 'bold';
            return false;
        }

    </script>
    <style type="text/css">
        .calendar {
            direction: rtl;
        }

        #flat_calendar_1, #flat_calendar_2 {
            width: 200px;
        }

        .example {
            padding: 10px;
        }

        .display_area {
            background-color: #FFFF88
        }
    </style>

    <div class="main-panel">
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
                                <label for="end_time">زمان و تاریخ پایان: </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                 <img id="date_btn_9" src="{{ asset('calendar/cal.png') }}"
                                      style="vertical-align: top;"/>
                            </span>
                                    </div>
                                    <input required  class="form-control" id="date_input_9"
                                           name="end_time"
                                           data-format="yyyy-MM-dd hh:mm:ss" type="text">
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
                                        <option value="{{$game->id}}">
                                            {{$game->name}}
                                        </option>
                                    @endforeach
                                </select>
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



    <script type="text/javascript">
        Calendar.setup({
            inputField: "date_input_9",   // id of the input field
            button: "date_btn_9",   // trigger for the calendar (button ID)
            ifFormat: "%Y-%m-%d %H:%M",       // format of the input field
            showsTime: true,
            dateType: 'jalali',
            showOthers: true,
            langNumbers: true,
            timeFormat: "24",
            weekNumbers: true
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('#datetimepicker').datetimepicker({
                language: 'pt-BR'
            });
            $('#datetimepicker_2').datetimepicker({
                language: 'pt-BR'
            });
        });
    </script>
    <script>

        function tik(element) {
            element.classList.toggle('tik');
        }

        myform.onsubmit = function () {
            let a = document.getElementsByClassName('item-a');
            selecter.value = "";
            for (let j = 0; j < a.length; j++) {
                if (a[j].classList.contains('tik')) {
                    selecter.value += a[j].getAttribute('miz') + '-';
                }
            }
            return true;
        }

        function getMiz() {
            let a = document.getElementsByClassName('item-a');
            selecter.value = "";
            for (let j = 0; j < a.length; j++) {
                if (a[j].classList.contains('tik')) {
                    selecter.value += a[j].getAttribute('miz') + '-';
                }
            }
            var x = document.getElementsByName('myform');
            console.log(x);
            x[0].submit(); // Form submission
        }

        function def() {
            let a = document.getElementsByClassName('item-a');
            for (let j = 0; j < a.length; j++) {
                selecter.value = "";
                a[j].classList.remove('tik');
            }
        }
    </script>


@endsection
