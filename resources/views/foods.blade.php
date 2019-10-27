@extends('master')

@section('content')

	<div class="container-fluid row m-0">
		<div class="col-lg-3 col-5 pt-3 p-0 p-lg-3 pt-lg-4">

			<div id="accordion" style="font-weight: bold;">

				<div class="card" style="box-shadow: 0px 2px 3px darkgray;">
				    <div class="card-header">
				      <a class="card-link text-dark" data-toggle="collapse" href="#collapse1">
				        موضوع
				      </a>
				    </div>
				    <div id="collapse1" class="collapse" data-parent="#accordion">
				      <div class="card-body">
				        
				      	<table class="table table-hover border-0">
						      <tr>
						        <td><a href="#">John</a></td>
						      </tr>
						      <tr>
						        <td><a href="#">John</a></td>
						      </tr>
						      <tr>
						        <td><a href="#">John</a></td>
						      </tr>
						</table>

				      </div>
				    </div>
				</div>

				<div class="card" style="box-shadow: 0px 2px 3px darkgray;">
				    <div class="card-header">
				      <a class="card-link text-dark" data-toggle="collapse" href="#collapse2">
				        موضوع
				      </a>
				    </div>
				    <div id="collapse2" class="collapse" data-parent="#accordion">
				      <div class="card-body">
				        
				      	<table class="table table-hover border-0">
						      <tr>
						        <td><a href="#">John</a></td>
						      </tr>
						      <tr>
						        <td><a href="#">John</a></td>
						      </tr>
						      <tr>
						        <td><a href="#">John</a></td>
						      </tr>
						</table>

				      </div>
				    </div>
				</div>

			</div>
	
		</div>

		<div class="position-relative pb-5 col-lg-9 col-7 pt-3 p-0 d-flex flex-row flex-wrap justify-content-center">

			@forelse($products as $product)
			<div class="col-lg-4 col-12 mb-4 p-0 pl-1 p-lg-1 ">
				<div class="card bg-light">
				  <div class="card-header">{{ $product->name }}</div>
					<img class="card-img-top" src="{{ asset('upload/'.$product->img) }}" alt="{{ $product->img }}">
					<div class="card-body">
				  	<p class="text-justify">{{ $product->small_detail }}</p>
				  </div> 
				  <div class="card-footer">
				  	<a href="{{ url('food/'.$product->id) }}" class="btn btn-outline-danger btn-block">مشاهده جزئیات</a>
				  </div>
				</div>
			</div>
			@empty
			<div class="alert alert-danger col-12 text-center">غذایی یافت نشد</div>
			@endforelse
			<nav class="col-12 col-lg-3 position-absolute nav-pagination" style="bottom: 0; ">
			  <ul class="pagination">

				  @if(!$empty)
					  <li class="page-item">
						  <a class="page-link" href="{{ url('foods/'.($page + 1)) }}">
							<span aria-hidden="true">&laquo; صفحه بعد </span>
						  </a>
					  </li>
				  @endif
{{--			    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--			    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--			    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
				  @if($page > 0)
					<li class="page-item">
					  <a class="page-link" href="{{ url('foods/'.($page - 1)) }}">
						<span aria-hidden="true">صفحه قبل &raquo;</span>
					  </a>
					</li>
				  @endif
			  </ul>
			</nav>

		</div>

	</div>


<br><br>
@endsection