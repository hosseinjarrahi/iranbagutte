@extends('master')

@section('content')

	<div class="container-fluid main-text">
		<div class="d-block p-5 col-12 col-lg-8 m-auto text-center shadow" style=" background: hsl(352, 70%, 44%,0.2);">
			<div class="col-12 dropdown-divider">.</div>
			<p class="alert text-white" style="background: hsl(352, 70%, 44%,0.3);box-shadow: inset 0px 0px 10px #0b2e13">مزایای عضویت</p>
			<p class="shadow bg-primary ">{!! $benefits->main ?? "" !!}</p>
		</div>
	</div>

<br><br>
@endsection