<div class="col-lg-9">
	<div class="row">
		<div class="col-lg-6 first_compare">
			<div class="card card-car">
				<?php 
					$car = session()->get('first_car');
				?>
				<div class="destroyCompare" onclick="destroy_compare_first(<?php echo $car->id; ?>);">
					<a>
						<i class="fas fa-times"></i>
					</a>
				</div>
				
				<div class="compare-car card-header">
					<p class="text-title">{{ $car->cars_name }}</p>
					<img src="server/img/cars/{{ $car->cars_image }}" style="width: 90%">
					@foreach($category as $c)
						@if($c->category_cars_id == $car->cars_category_id)
						<h4>Hãng xe / <span>{{ $c->category_cars_name }}</span></h4>
						@endif
					@endforeach
					@foreach($style as $c)
						@if($c->style_cars_id == $car->cars_style_id)
						<h4>Kiểu dáng / <span>{{ $c->style_cars_name }}</span></h4>
						@endif
					@endforeach
					<h4>Giá niêm yết: <span>{{ number_format($car->cars_price) }}đ</span></h4>
					<h4 class="marginbot50">Giá đàm phán: <span>{{ number_format($car->cars_promotion_price) }}đ</span></h4>
				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title">Tổng thể</h2>
					<h4>Tổng thể: <span>3954 x 1740 x 1416</span></h4>
					<h4>Chiều dài cơ sở: <span>2469</span></h4>
					<h4>Mâm xe: <span>Hợp kim 15.00"</span></h4>
					<h4>Thông số lốp: <span>205/55R15</span></h4>
					<h4>Trọng lượng: <span>1045</span></h4>
				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title">Động cơ</h2>
					<h4>Hiệu động cơ: <span>Xăng I 4</span></h4>
					<h4>Dung tích: <span>1.40L</span></h4>
					<h4>Công suất: <span>122.00 mã lực</span></h4>
					<h4>Momen xoắn: <span>200.00 Nm</span></h4>
				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title">Kỹ thuật</h2>
					<h4>Hộp số: <span>Tự động</span></h4>
					<h4>Kiểu dẫn động: <span>Cầu trước</span></h4>
					<h4>Hệ thống phanh trước: <span>Đĩa</span></h4>
					<h4>Hệ thống phanh sau: <span>Đĩa</span></h4>
					<h4>Hệ thống treo trước: <span>Kiểu Macpherson</span></h4>
					<h4>Kiểu Macpherson: <span>Trục xoắn</span></h4>
					<h4>Thời gian tăng tốc từ 0-100km/h: <span>8.90s</span></h4>
				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title">Trang bị</h2>
					<h4>Dung tích bình nhiên liệu: <span>45L</span></h4>
				</div>
				
			</div>
		</div>
		<div class="col-lg-6 second_compare">
			<div class="row" id="content-compare-2">
				<div class="col-12">
					<div class="card">
					  <h3 class="card-header text-title">Xe cùng giá</h3>
						<div class="solidline">
						</div>
					  <div class="card-body">
					    <div class="row">
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <a href="compare2.html">
								  	<img style="width: 180px; height: 100px;" class="card-img-top" src="" alt="Card image cap">
								  </a>
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">1.800.000.000đ</h5>
								  </div>
								</div>
					    	</div>
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">1.850.000.000đ</h5>
								  </div>
								</div>
					    	</div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
					  <h3 class="card-header text-title">Xe cùng hãng</h3>
						<div class="solidline">
						</div>
					  <div class="card-body">
					    <div class="row">
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">Lamborghini</h5>
								  </div>
								</div>
					    	</div>
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">Lamborghini</h5>
								  </div>
								</div>
					    	</div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
					  <h3 class="card-header text-title">Xe cùng dáng</h3>
						<div class="solidline">
						</div>
					  <div class="card-body">
					    <div class="row">
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">Siêu xe</h5>
								  </div>
								</div>
					    	</div>
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">Siêu xe</h5>
								  </div>
								</div>
					    	</div>
					    </div>
					  </div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
					  <h3 class="card-header text-title">Xe cùng phiên bản</h3>
						<div class="solidline">
						</div>
					  <div class="card-body">
					    <div class="row">
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">2012</h5>
								  </div>
								</div>
					    	</div>
					    	<div class="col-lg-6">
					    		<div class="card" style="width: 18rem;">
								  <img style="width: 180px; height: 100px;" class="card-img-top" src="img/280px-Geneva_MotorShow_2013_-_Lamborghini_Veneno_1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 style="cursor: pointer;" class="card-title">Lamborghini Aventador</h5>
								    <h5 style="color: #e62e00" class="card-title">2012</h5>
								  </div>
								</div>
					    	</div>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>