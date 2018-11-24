@extends('client.master')
@section('content')

	<section id="content">
		<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<input type="text" class="form-control" id="search_keyup" placeholder="Tìm xe theo từ khóa" aria-label="Recipient's username" aria-describedby="basic-addon2">
				<ul class="list-group list-show-car">
				  	@foreach($cars as $rows)
				  	<li class="li_cars_search list-group-item" onclick="add_compare(<?php echo $rows->cars_id ?>)">{{$rows->cars_name}}</li>
				  	@endforeach
				</ul>
			</div>	
			<div id="content-compare">
			</div>
		</div>
		</div>
	</section>

@endsection