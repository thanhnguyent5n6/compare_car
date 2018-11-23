<div class="col-lg-9">
	<h4>Gợi ý so sánh</h4>
	<div class="row">
		<div class="row">
			
			<div class="col-lg-3 col-md-3 col-sm-6 boxPriceCar">
				<div class="box_car">
						<img src="server/img/cars/" alt="ảnh đại diện" style="width: 252px; height: 160px; margin: 0px !important;" />
					<div class="box_view_car" style="width: 252px; height: 160px">
						<div class="view_text_box">
							<p>Tên: </p>
							<p>Giá niêm yết: đ</p>
							<p>Giá đàm phán: đ</p>

							<p>Honda</p>
						</div>
						<div class="view_box">
						<a class="txt_view_box" data-toggle="modal" >Xem chi tiết</a>
						</div>
					</div>
					<div style="padding: 15px; border: 1px solid #f1f1f1;">
						<div class="cbp-l-grid-projects-title" ></div>
					
					</div>
				</div>
			</div>

		</div>
	</div>
	<h4>Khoảng giá</h4>
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" id="myTab" role="tablist">
	  <li class="nav-item">
	    <a class="nav-link active" id="home-tab" data-toggle="tab" href="client/#home" role="tab" aria-controls="home" aria-selected="true">Dưới 1 tỉ</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="profile-tab" data-toggle="tab" href="client/#profile" role="tab" aria-controls="profile" aria-selected="false">1 tỉ - 2 tỉ</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="messages-tab" data-toggle="tab" href="client/#messages" role="tab" aria-controls="messages" aria-selected="false">2 tỉ - 5 tỉ</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" id="settings-tab" data-toggle="tab" href="client/#settings" role="tab" aria-controls="settings" aria-selected="false">Trên 5 tỉ</a>
	  </li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
	  	<div class="row">
	  		@foreach($under_1b as $rows)
	  		<div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom: 30px;">
	  			<div class="box_car" style="width: 100%; height: 254px;" >
	  				<img src="server/img/cars/{{ $rows->cars_image }}" alt="ảnh đại diện" style="width: 100%; height: 153px; margin: 0px !important;" />
	  			<div class="box_view_car" style="width: 100%; height: 153px">
	  				<div class="view_text_box">
	  					<p>Tên: {{ $rows->cars_name }}</p>
	  					<p>Giá niêm yết: {{ number_format($rows->cars_price) }}đ</p>
	  					<p>Giá đàm phán: {{ number_format($rows->cars_promotion_price) }}đ</p>

	  					<p>Honda</p>
	  				</div>
	  				<div class="view_box">
						<a class="txt_view_box" onclick="show_info(<?php echo $rows->cars_id ?>);" data-toggle="modal" data-target=".bd-example-modal-lg">So sánh</a>
					</div>
	  			</div>
				<div style="padding: 15px; border: 1px solid #f1f1f1;">
				<div class="cbp-l-grid-projects-title" >{{ $rows->cars_name }}</div>
				@foreach($category as $c)
					@if($c->category_cars_id == $rows->cars_category_id)
					<div class="cbp-l-grid-projects-desc">Hãng xe / {{ $c->category_cars_name }}</div>
					@endif
				@endforeach
				@foreach($style as $c)
					@if($c->style_cars_id == $rows->cars_style_id)
					<div class="cbp-l-grid-projects-desc">Kiểu dáng / {{ $c->style_cars_name }}</div>
					@endif
				@endforeach
				</div>
			</div>
			</div>
			@endforeach
	  	</div>
	  </div>
	  <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
	  	<div class="row">
	  		@foreach($in_1b_2b as $rows)
	  		<div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom: 30px;">
	  			<div class="box_car" style="width: 100%; height: 254px;" >
	  				<img src="server/img/cars/{{ $rows->cars_image }}" alt="ảnh đại diện" style="width: 100%; height: 153px; margin: 0px !important;" />
	  			<div class="box_view_car" style="width: 100%; height: 153px">
	  				<div class="view_text_box">
	  					<p>Tên: {{ $rows->cars_name }}</p>
	  					<p>Giá niêm yết: {{ number_format($rows->cars_price) }}đ</p>
	  					<p>Giá đàm phán: {{ number_format($rows->cars_promotion_price) }}đ</p>

	  					<p>Honda</p>
	  				</div>
	  				<div class="view_box">
						<a class="txt_view_box" onclick="show_info(<?php echo $rows->cars_id ?>);" data-toggle="modal" data-target=".bd-example-modal-lg">So sánh</a>
					</div>
	  			</div>
				<div style="padding: 15px; border: 1px solid #f1f1f1;">
				<div class="cbp-l-grid-projects-title" >{{ $rows->cars_name }}</div>
				@foreach($category as $c)
					@if($c->category_cars_id == $rows->cars_category_id)
					<div class="cbp-l-grid-projects-desc">Hãng xe / {{ $c->category_cars_name }}</div>
					@endif
				@endforeach
				@foreach($style as $c)
					@if($c->style_cars_id == $rows->cars_style_id)
					<div class="cbp-l-grid-projects-desc">Kiểu dáng / {{ $c->style_cars_name }}</div>
					@endif
				@endforeach
				</div>
			</div>
			</div>
			@endforeach
	  	</div>
	  </div>
	  <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
	  	<div class="row">
	  		@foreach($in_2b_5b as $rows)
	  		<div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom: 30px;">
	  			<div class="box_car" style="width: 100%; height: 254px;" >
	  				<img src="server/img/cars/{{ $rows->cars_image }}" alt="ảnh đại diện" style="width: 100%; height: 153px; margin: 0px !important;" />
	  			<div class="box_view_car" style="width: 100%; height: 153px">
	  				<div class="view_text_box">
	  					<p>Tên: {{ $rows->cars_name }}</p>
	  					<p>Giá niêm yết: {{ number_format($rows->cars_price) }}đ</p>
	  					<p>Giá đàm phán: {{ number_format($rows->cars_promotion_price) }}đ</p>

	  					<p>Honda</p>
	  				</div>
	  				<div class="view_box">
						<a class="txt_view_box" onclick="show_info(<?php echo $rows->cars_id ?>);" data-toggle="modal" data-target=".bd-example-modal-lg">So sánh</a>
					</div>
	  			</div>
				<div style="padding: 15px; border: 1px solid #f1f1f1;">
				<div class="cbp-l-grid-projects-title" >{{ $rows->cars_name }}</div>
				@foreach($category as $c)
					@if($c->category_cars_id == $rows->cars_category_id)
					<div class="cbp-l-grid-projects-desc">Hãng xe / {{ $c->category_cars_name }}</div>
					@endif
				@endforeach
				@foreach($style as $c)
					@if($c->style_cars_id == $rows->cars_style_id)
					<div class="cbp-l-grid-projects-desc">Kiểu dáng / {{ $c->style_cars_name }}</div>
					@endif
				@endforeach
				</div>
			</div>
			</div>
			@endforeach
	  	</div>
	  </div>
	  <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
	  	<div class="row">
	  		@foreach($over_5b as $rows)
	  		<div class="col-lg-4 col-md-4 col-sm-6" style="margin-bottom: 30px;">
	  			<div class="box_car" style="width: 100%; height: 254px;" >
	  				<img src="server/img/cars/{{ $rows->cars_image }}" alt="ảnh đại diện" style="width: 100%; height: 153px; margin: 0px !important;" />
	  			<div class="box_view_car" style="width: 100%; height: 153px">
	  				<div class="view_text_box">
	  					<p>Tên: {{ $rows->cars_name }}</p>
	  					<p>Giá niêm yết: {{ number_format($rows->cars_price) }}đ</p>
	  					<p>Giá đàm phán: {{ number_format($rows->cars_promotion_price) }}đ</p>

	  					<p>Honda</p>
	  				</div>
	  				<div class="view_box">
						<a class="txt_view_box" onclick="show_info(<?php echo $rows->cars_id ?>);" data-toggle="modal" data-target=".bd-example-modal-lg">So sánh</a>
					</div>
	  			</div>
				<div style="padding: 15px; border: 1px solid #f1f1f1;">
				<div class="cbp-l-grid-projects-title" >{{ $rows->cars_name }}</div>
				@foreach($category as $c)
					@if($c->category_cars_id == $rows->cars_category_id)
					<div class="cbp-l-grid-projects-desc">Hãng xe / {{ $c->category_cars_name }}</div>
					@endif
				@endforeach
				@foreach($style as $c)
					@if($c->style_cars_id == $rows->cars_style_id)
					<div class="cbp-l-grid-projects-desc">Kiểu dáng / {{ $c->style_cars_name }}</div>
					@endif
				@endforeach
				</div>
			</div>
			</div>
			@endforeach
	  	</div>
	  </div>
	</div>
</div>