<div class="col-lg-9">
	<div class="row" style="max-height: 730px !important; overflow: hidden;">
	@foreach($cars as $rows)
	  		<div class="col-lg-3 col-md-3 col-sm-6 search_car" style="margin-bottom: 30px;">
	  			<div class="box_car " style="width: 100%; height: 230px;" >
	  				<img src="server/img/cars/{{ $rows->cars_image }}" alt="ảnh đại diện" style="width: 100%; height: 153px; margin: 0px !important;" />
	  			<div class="box_view_car" style="width: 100%; height: 153px">
	  				<div class="view_text_box">
	  					<p class="name_of_car">Tên: {{ $rows->cars_name }}</p>
	  					<p>Giá niêm yết: {{ number_format($rows->cars_price) }}đ</p>
	  				</div>
	  				<div class="view_box">
						<a class="txt_view_box" onclick="add_compare(<?php echo $rows->cars_id ?>);">So sánh</a>
					</div>
	  			</div>
				<div style="padding: 15px; border: 1px solid #f1f1f1;">
				<div class="cbp-l-grid-projects-title" >{{ $rows->cars_name }}</div>
				
				</div>
			</div>
			</div>
			@endforeach
</div>
</div>