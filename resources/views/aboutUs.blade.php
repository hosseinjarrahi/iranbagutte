@extends('master')

@section('content')

	<div class="container-fluid">
		<div class="d-block p-5 text-center">
			<div class="col-12 dropdown-divider">.</div>
			<p class="p2 alert alert-warning">درباره ما</p>
			<p>{!! $about ?? "" !!}</p>
		</div>
	</div>

<br><br>
@endsection