<div class="col-lg-12">
			<div class="card card-car">
				<!-- <div class="destroyCompare">
					<a href="compare.html">
						<i class="fas fa-times"></i>
					</a>
				</div> -->
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
					<h2 class="text-title">Kích thước</h2>
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
					<h2 class="text-title">Vận hành</h2>
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
					<h2 class="text-title">Tiêu thụ nhiên liệu</h2>
					<h4>Dung tích bình nhiên liệu: <span>45L</span></h4>
				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title">Nội thất</h2>
					<h4>Ghế ngồi: <span>Da</span></h4>
					<h4>Điều hòa không khí: <span>Chỉnh, gập điện</span></h4>
					<h4>Cửa sổ trời: <span>1 cửa sổ trời</span></h4>
				</div>
			</div>
		</div>