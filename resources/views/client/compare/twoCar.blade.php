<div class="col-lg-9">
	<div class="row wrap_compare">
		<div class="col-lg-6 first_compare">
			<div class="card card-car">
				<?php $car = session()->get('first_car');
					  $jsonCar = json_encode($car);
				 ?>
				<div class="destroyCompare" onclick="destroyCompare(<?php echo $car->cars_id; ?>)">
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
					<h2 class="text-title">Tổng thể - Kỹ thuật</h2>
					<h4>Dài x rộng x cao (Nm)<span>{{ $car->cars_size }}</span></h4>
					<h4>Dung tích bình xăng (lít)<span>{{ $car->cars_gas_tank }}</span></h4>
					<h4>Động cơ<span>{{ $car->cars_engine }}</span></h4>
					<h4>Công suất (mã lực)<span>{{ $car->cars_capacity }}</span></h4>
					<h4>Mô-men xoắn (Nm):<span>{{ $car->cars_momen }}</span></h4>
					<h4>Khoảng sáng gầm (mm)<span>{{ $car->cars_light_roar }}</span></h4>
					<h4>Đường kính vòng quay tối thiểu (m)<span>{{ $car->cars_diameter_spin_min }}</span></h4>
					<h4>Nguồn gốc<span>{{ $car->cars_source }}</span></h4>
					<h4>Hộp số<span>{{ $car->cars_gear }}</span></h4>
					<h4>Mức tiêu thụ nhiên liệu<span>{{ $car->cars_fuel_consumption }}</span></h4>

				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title">Trang bị</h2>
					<div class="first_equipment"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-6 second_compare">
			<div class="card card-car second_compare">
				<?php 
					$second_car = session()->get('second_car'); 
					$jsonSecondCar = json_encode($second_car);
				?>
				<div class="destroyCompare" onclick="destroyCompare(<?php echo $second_car->cars_id; ?>)">
					<a>
						<input type="text" hidden="hidden" name="id_second_car" class="id_second_car">
						<i class="fas fa-times"></i>
					</a>
				</div>
				
				<div class="compare-car card-header">
					<p class="text-title">{{ $second_car->cars_name }}</p>
					<img src="server/img/cars/{{ $second_car->cars_image }}" style="width: 90%">
					@foreach($category as $c)
						@if($c->category_cars_id == $second_car->cars_category_id)
						<h4><span>{{ $c->category_cars_name }}</span></h4>
						@endif
					@endforeach
					@foreach($style as $c)
						@if($c->style_cars_id == $second_car->cars_style_id)
						<h4><span>{{ $c->style_cars_name }}</span></h4>
						@endif
					@endforeach
					<h4><span>{{ number_format($second_car->cars_price) }}đ</span></h4>
					<h4 class="marginbot50"><span>{{ number_format($second_car->cars_promotion_price) }}đ</span></h4>
				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title"></h2>
					<h4><span>{{ $second_car->cars_size }}</span></h4>
					<h4><span>{{ $second_car->cars_gas_tank }}</span></h4>
					<h4><span>{{ $second_car->cars_engine }}</span></h4>
					<h4><span>{{ $second_car->cars_capacity }}</span></h4>
					<h4><span>{{ $second_car->cars_momen }}</span></h4>
					<h4><span>{{ $second_car->cars_light_roar }}</span></h4>
					<h4><span>{{ $second_car->cars_diameter_spin_min }}</span></h4>
					<h4><span>{{ $second_car->cars_source }}</span></h4>
					<h4><span>{{ $second_car->cars_gear }}</span></h4>
					<h4><span>{{ $second_car->cars_fuel_consumption }}</span></h4>

				</div>
				<div class="compare-car card-body">
					<div class="solidline"></div>
					<h2 class="text-title"></h2>
					<div class="second_equipment"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var php_variable = '<?php echo $jsonCar; ?>';
	var php_variable_second = '<?php echo $jsonSecondCar; ?>';
	var data = JSON.parse(php_variable);
	var data_second = JSON.parse(php_variable_second);
	// console.log(data);
	var check_equipment = [
            {'id':'cars_brake_abs','name':"Chống bó cứng phanh (ABS) : "},
            {'id':'cars_brake_ebd','name':"Phân bổ lực phanh điện tử (EBD) : "},
            {'id':'cars_brake_ba','name':"Hỗ trợ phanh khẩn cấp (BA) : "},
            {'id':'cars_electric_balance_eps','name':"Cân bằng điện tử (ESP) : "},
            {'id':'cars_control_degree_grip','name':"Kiểm soát độ bám đường (TRC) : "},
            {'id':'cars_air_bag','name':"Túi khí : "},
            {'id':'cars_electric_support_eps','name':"Trợ lực điện (EPS) : "},
            {'id':'cars_support_start_steep','name':"Hỗ trợ khởi hành ngang dốc (HAS) : "},
            {'id':'cars_cruise_control','name':"Điều khiển hành trình (Cruise Control) : "},
            {'id':'cars_run_mode','name':"Lựa chọn chế độ chạy : "},
            {'id':'cars_electric_hand_brake','name':"Phanh tay điện tử : "},
            {'id':'cars_smart_lock','name':"Chìa khóa thông minh : "},
            {'id':'cars_headlight','name':"Đèn pha : ",},
            {'id':'cars_auto_headlight','name':"Đèn pha tự động : "},
            {'id':'cars_auto_headlight_afs','name':"Đèn pha tự động điều chỉnh góc chiếu (AFS) : "},
            {'id':'cars_auto_wiper','name':"Gạt mưa tự động : "},
            {'id':'cars_interiar_materials','name':"Chất liệu nội thất : "},
            {'id':'cars_air_conditioning','name':"Điều hòa : "},
            {'id':'cars_after_cooler','name':"Dàn lạnh cho hàng ghế sau : "},
            {'id':'cars_after_wind_door','name':"Cửa gió cho hàng ghế sau : "},
            {'id':'cars_mirror_anti_dazzle','name':"Gương chiếu hậu chống chói : "},
            {'id':'cars_seat','name':"Ghế lái : "},
            {'id':'cars_seat_glass_door','name':"Cửa kính ghế lái : "},
            {'id':'cars_speakers','name':"Hệ thống loa (cái) : "},
            {'id':'cars_bluetooth','name':"Kết nối Bluetooth : "},
            {'id':'cars_usb','name':"Đầu cắm USB : "},
            {'id':'cars_camera_back','name':"Camera lùi : "},
            {'id':'cars_sensor_distance','name':"Cảm biến khoảng cách : "},
            {'id':'cars_out_window','name':"Cửa sổ trời : "},
        ];
        

        $.each(check_equipment,function(check_equipment_key, check_equipment_value){
            $.each(data,function(cars_key,cars_value){
                if(cars_key == check_equipment_value.id)
                {
                    if(cars_value == 1 || cars_value == '1')
                    {
                    	cars_value = "Có";
                    }
                        
                    if(cars_value == 0 || cars_value == '0')
                    {
                    	cars_value = "Không";
                    }
                    $('.first_equipment').append('<h4>'+check_equipment_value.name+'<span class=\"pull-right\">'+cars_value+'</span></h4');
                }
            });
            
        });
        $.each(check_equipment,function(check_equipment_key, check_equipment_value){
            $.each(data_second,function(cars_second_key,cars_second_value){
                if(cars_second_key == check_equipment_value.id)
                {
                    if(cars_second_value == 1 || cars_second_value == '1')
                    {
                    	cars_second_value = "Có";
                    }
                        
                    if(cars_second_value == 0 || cars_second_value == '0')
                    {
                    	cars_second_value = "Không";
                    }
                    $('.second_equipment').append('<h4><span>'+cars_second_value+'</span></h4');
                }
            });
            
        });
</script>