<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<!-- Start Live Chat Code -->
<script type="text/javascript" src="http://go.iranbaguette.com/assets/js/jquery.min.js"></script>
<script type="text/javascript">jQuery.noConflict();</script>
<script type="text/javascript">jQuery(document).ready(function($) {$.ajaxSetup({xhrFields: {withCredentials: true},headers: {"X-Requested-With": "XMLHttpRequest"}});$.ajax({type: "GET",url: "http://go.iranbaguette.com/live_chat",dataType: "html",success: function(data) {$("body").append(data);}});});</script>
<!-- End Live Chat Code -->
</body>
</html>