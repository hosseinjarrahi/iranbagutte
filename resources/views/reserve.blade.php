@extends('master')

@section('title')
	ایران باگت
@endsection
@section('content')
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('calendar/skins/aqua/theme.css')}}" title="Aqua" />


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
            for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
                if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
                    a.disabled = true;
                    if(a.getAttribute("title") == title) a.disabled = false;
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

        #flat_calendar_1, #flat_calendar_2{
            width: 200px;
        }
        .example {
            padding: 10px;
        }

        .display_area {
            background-color: #FFFF88
        }
    </style>

    <div class="container" id="salam">

        @if(isset($message))
            <div class="col-12 text-center alert alert-info" style="line-height: 50px">
                {{ $message }}
            </div>
        @endif
        <form id="myform" action="{{ url('reserve/'.$id) }}" method="post" class="form-input-holder-base form-group row p-4 p-lg-1">

            <h2>رزرو میز</h2>

            <div class="form-row">


                <div class="col-12">
                        <label>زمان و تاریخ ورود : </label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend3">
                                 <img id="date_btn_9" src="{{ asset('calendar/cal.png') }}" style="vertical-align: top;" />
                            </span>
                        </div>
                        <input required placeholder="تاریخ و زمان" class="form-control" id="date_input_9" name="time_s" data-format="yyyy-MM-dd hh:mm:ss" type="text">
                    </div>
                    <p class="text-danger">{{ $errors['time_s'] ?? '' }}</p>
                </div>

                <div class="col-12">
                    <label for="validationServer01">زمان مورد نیاز استفاده از میز به ساعت:</label>
                    <select name="time_e" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                    <p class="text-danger">{{ $errors['time_e'] ?? '' }}</p>
                </div>
                <div class="col-6 p-1">
                    <img src="{{asset('img/LEdu.jpg')}}" class="img-thumbnail " alt="...">

                </div><div class="col-6 p-1">
                    <img src="{{asset('img/LEdu.jpg')}}" class="img-thumbnail " alt="...">

                </div>

                <label class="col-12">میز های موجود : </label>
                @foreach($out as $o)
                    <a class="btn btn-primary m-2 item-a" miz="{{ $o->id }}" onclick="tik(this)"><span>میز</span> {{ $o->capacity }} <span>نفره</span> </a>
                @endforeach
                <a class="btn btn-secondary m-2" onclick="def()">پاک کردن همه ی میز انتخابی </a>
                <input type="hidden" id="selecter" name="capacity" value="">
                <input type="hidden" name="res" value="{{ $id }}">

                <h2 class="col-12 mt-2">اطلاعات شما</h2>
                <div class="col-12">
                    <label for="validationServer01">نام و نام خانوادگی</label>
                    <input type="text" name="name" class="form-control" id="validationServer01" placeholder="نام و نام خانوادگی" required>
                    <p class="text-danger">{{ $errors['name'] ?? '' }}</p>

                </div>

                <div class="col-12">
                    <label for="validationServer02">شماره موبایل</label>
                    <input type="tel" name="phone" class="form-control " id="validationServer02" placeholder="شماره موبایل" required>
                    <p class="text-danger">{{ $errors['phone'] ?? '' }}</p>

                </div>

                <div class="col-12">
                    <p class="text-danger">{{ $errors['detail'] ?? '' }}</p>
                    <label for="validationServerUsername">جزئیات بیشتر رزرو</label>
                    <textarea class="form-control" name="detail" placeholder="بطور مثال : من یک صندلی بیشتر بر روی این میز می خواهم"></textarea>
                </div>
            </div>
            <p class="col-12 pt-2">جهت رزرو میز مبلغ<span style="color: red;"> 30.000 ریال </span> بعنوان پیش پرداخت دریافت می گردد.</p>
            <input type="submit" name="submit" value="رزرو میز" class="btn btn-primary">

        </form>
        
    </div>

    <script type="text/javascript">
        Calendar.setup({
            inputField  : "date_input_9",   // id of the input field
            button      : "date_btn_9",   // trigger for the calendar (button ID)
            ifFormat    : "%Y-%m-%d %H:%M",       // format of the input field
            showsTime   : true,
            dateType	: 'jalali',
            showOthers  : true,
            langNumbers : true,
            timeFormat  : "24",
            weekNumbers : true
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker').datetimepicker({
                language: 'pt-BR'
            });
            $('#datetimepicker_2').datetimepicker({
                language: 'pt-BR'
            });
        });
    </script>
    <script>

        function tik(element){
            element.classList.toggle('tik');
        }

        myform.onsubmit = function(){
            let a = document.getElementsByClassName('item-a');
            selecter.value = "";
            for(let j=0;j < a.length;j++)
            {
                if(a[j].classList.contains('tik'))
                {
                    selecter.value += a[j].getAttribute('miz') + '-';
                }
            }
            return true;
        }

        function getMiz()
        {
            let a = document.getElementsByClassName('item-a');
            selecter.value = "";
            for(let j=0;j < a.length;j++)
            {
                if(a[j].classList.contains('tik'))
                {
                    selecter.value += a[j].getAttribute('miz') + '-';
                }
            }
            var x = document.getElementsByName('myform');
            console.log(x);
            x[0].submit(); // Form submission
        }

        function def()
        {
            let a = document.getElementsByClassName('item-a');
            for(let j=0;j < a.length;j++)
            {
                selecter.value = "";
                a[j].classList.remove('tik');
            }
        }
    </script>
@endsection