<!--div class="container-fluid d-flex w-100 IB-footer align-content-center align-items-center justify-content-center flex-column"-->
<footer style="background-color: #0c5460;">
<div class="container-fluid d-flex w-100 footer align-content-center align-items-center justify-content-center flex-column">
	<p style="color: white;font-weight: bold;padding-top: 1em;">دانلود نسخه های موبایل ایران باگت</p>
	<div>
		<a href="{{($cyberspace[2]['url']) ?? '#'}}"><img style="padding-bottom: 1em;" width="50px";height="50px" src="{{ asset('img/android.png') }}" alt="mac"></a>
        <a href="{{($cyberspace[3]['url']) ?? '#'}}"><img style="padding-bottom: 1em;" width="50px";height="50px" src="{{ asset('img/ios.png') }}" alt="android"></a>
        <a href="{{($cyberspace[4]['url']) ?? '#'}}"><img style="padding-bottom: 1em;" width="160px";height="160px" src="{{ asset('img/myket.png') }}" alt="android"></a>
	</div>
</div>
</footer>
