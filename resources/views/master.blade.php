<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/UserSheetFa.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ResponsiveStyleSheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate-min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/liteaccordion.css') }}">
    {{--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">--}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        /* loader  */
        #loader {
            position: fixed;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            z-index: 99999;
            background: #34b1c4;
        }
        .load-three-bounce{
            position: absolute;
            top: 50%;
            left: 50%;
            text-align: center;
            width: 80px;
            margin-left: -40px;
            margin-top: -10px;
        }
        .load-three-bounce .load-child {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #fff;
            animation: load-three-bounce 1.4s ease-in-out 0s infinite both;
        }
        .load-three-bounce .bounce1{
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }
        .load-three-bounce .bounce2{
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        @-webkit-keyframes load-three-bounce {
            0%, 80%, 100% {
                -webkit-transform: sacle(0);
                transform: scale(0);
            }
            40% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        @-o-keyframes load-three-bounce {
            0%, 80%, 100% {
                -webkit-transform: sacle(0);
                transform: scale(0);
            }
            40% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        @-moz-keyframes load-three-bounce {
            0%, 80%, 100% {
                -webkit-transform: sacle(0);
                transform: scale(0);
            }
            40% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        @keyframes load-three-bounce {
            0%, 80%, 100% {
                -webkit-transform: sacle(0);
                transform: scale(0);
            }
            40% {
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }


    </style>
</head>
<body style="background-color: #ecf0f1;"onload="startGame();">

    <div align="center" style="margin: 0; padding: 0;">
        <div class="IB-container">
    		@include('header')
    		@yield('slider')
        </div>
    </div>

	@yield('content')

	@include('footer')


</body>

{{-- <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script> --}}

{{--<script src="http://code.jquery.com/jquery-1.12.4.js"></script>--}}
@if(isset($home))
<script src="{{ asset('js/jquery-1.7.1.min.js') }}"></script>
<script src="{{ asset('js/paccordion.js') }}"></script>
<script src="{{ asset('js/liteaccordion.jquery.js') }}"></script>
<script src="{{ asset('js/jquery.flip.min.js') }}"></script>
@else
<script src="{{ asset('js/jquery.js') }}"></script>
@endif
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script type="text/javascript">
    $("#card-1").flip({
        axis: 'y',
        trigger: 'hover'
    });
    $("#card-2").flip({
        axis: 'y',
        trigger: 'hover'
    });
    $("#card-3").flip({
        axis: 'y',
        trigger: 'hover'
    });
    $("#card-4").flip({
        axis: 'y',
        trigger: 'hover'
    });
</script>
<script>
    var url = window.location.href;
    var id = url.substring(url.lastIndexOf('#') + 1);

    $('#IB-one').liteAccordion({

        onActivate: function() {
            this.find('figcaption').fadeOut();
        },
        slideCallback: function() {
            this.find('figcaption').fadeIn();
        },
        containerWidth: screen.width - 10,
        containerHeight: 500,
        autoPlay: false,
        pauseOnHover: true,
        theme: 'dark',
        firstSlide:id,
        rounded: true,
        cycleSpeed : 5000000000,
        enumerateSlides: false
    }).find('figcaption:last').show();
</script>
<script>
    $(function() {
        var html = $('html, body'),
            navContainer = $('.IB-nav-container'),
            navToggle = $('.IB-nav-toggle'),
            navDropdownToggle = $('.IB-has-dropdown');

        // Nav toggle
        navToggle.on('click', function(e) {
            var $this = $(this);
            e.preventDefault();
            $this.toggleClass('IB-is-active');
            navContainer.toggleClass('IB-is-visible');
            html.toggleClass('IB-nav-open');
        });

        // Nav dropdown toggle
        navDropdownToggle.on('click', function() {
            var $this = $(this);
            $this.toggleClass('IB-is-active').children('ul').toggleClass('IB-is-visible');
        });

        // Prevent click events from firing on children of navDropdownToggle
        navDropdownToggle.on('click', '*', function(e) {
            e.stopPropagation();
        });
    });
</script>
<script>
    "use strict";

    productScroll();

    function productScroll() {
        let slider = document.getElementById("slider");
        let next = document.getElementsByClassName("pro-next");
        let prev = document.getElementsByClassName("pro-prev");
        let slide = document.getElementById("slide");
        let item = document.getElementById("slide");

        for (let i = 0; i < next.length; i++) {
            //refer elements by class name

            let position = 0; //slider postion

            prev[i].addEventListener("click", function() {
                //click previos button
                if (position > 0) {
                    //avoid slide left beyond the first item
                    position -= 1;
                    translateX(position); //translate items
                }
            });

            next[i].addEventListener("click", function() {
                if (position >= 0 && position < hiddenItems()) {
                    //avoid slide right beyond the last item
                    position += 1;
                    translateX(position); //translate items
                }
            });
        }

        function hiddenItems() {
            //get hidden items
            let items = getCount(item, false);
            let visibleItems = slider.offsetWidth / 600 ;
            return items - Math.ceil(visibleItems);
        }
    }

    function translateX(position) {
        //translate items
        slide.style.left = position * -210 + "px";
    }

    function getCount(parent, getChildrensChildren) {
        //count no of items
        let relevantChildren = 0;
        let children = parent.childNodes.length;
        for (let i = 0; i < children; i++) {
            if (parent.childNodes[i].nodeType != 3) {
                if (getChildrensChildren)
                    relevantChildren += getCount(parent.childNodes[i], true);
                relevantChildren++;
            }
        }
        return relevantChildren;
    }
</script>
<script>
    function remove(el){
        loader.classList.add('d-none');
        console.log(el);
    }
</script>


<!-- Start Live Chat Code -->
<script type="text/javascript" src="http://go.iranbaguette.com/assets/js/jquery.min.js"></script>
<script type="text/javascript">jQuery.noConflict();</script>
<script type="text/javascript">jQuery(document).ready(function($) {$.ajaxSetup({xhrFields: {withCredentials: true},headers: {"X-Requested-With": "XMLHttpRequest"}});$.ajax({type: "GET",url: "http://go.iranbaguette.com/live_chat",dataType: "html",success: function(data) {$("body").append(data);}});});</script>
<!-- End Live Chat Code -->


</html>