@extends('client.master')
@section('content')
<section id="content">
		<!-- Portfolio Projects -->
		<div class="container">
		<div class="row">
	  		@foreach($cars as $rows)
	  		<div class="col-lg-3 col-md-3 col-sm-6">
				<div class="box_car">
				  				<img src="server/img/cars/{{ $rows->cars_image }}" alt="ảnh đại diện" style="width: 252px; height: 160px; margin: 0px !important;" />
				  			<div class="box_view_car" style="width: 252px; height: 160px">
				  				<div class="view_text_box">
				  					<p>Tên: {{ $rows->cars_name }}</p>
				  					<p>Giá niêm yết: {{ number_format($rows->cars_price) }}đ</p>
				  					<p>Giá đàm phán: {{ number_format($rows->cars_promotion_price) }}đ</p>

				  					<p>Honda</p>
				  				</div>
				  				<div class="view_box">
									<a class="txt_view_box" onclick="show_info(<?php echo $rows->cars_id ?>);" data-toggle="modal" data-target=".bd-example-modal-lg">Xem chi tiết</a>
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
		<ul>
				<li>{{ $cars->links() }}</li>
			</ul>
		</div>

	</section>
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row modal_show_info">
            <div class="col-lg-12">
                    <div class="panel">
                      <div class="card">

              <div class="card-header">
                <header class="panel-heading">
                    Thông số xe
                </header>
              </div>
              <form id="form-edit-car" method="POST" enctype="multipart/form-data">
                <p  name="update_id" id="update_id" hidden="hidden">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 text-left">
                    <img class="cars_avt" src="" style="width: 100%">
                  </div>
                  <div class="col-lg-6">
                    <div class="margin-t20"></div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_name">Tên xe: </label>
                        <span id="cars_name" name="cars_name"></span>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_source">Nguồn gốc: </label>
                        <span id="cars_source" name="cars_source" value=""></span>
                      </p>
                    </div>
                    <div class="clarfix"></div>
                    <div class="col-lg-6">
                      <p>
                        <label >Hãng xe: </label>
                        <span class="cars_category"></p>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                      	<label >Kiểu dáng: </label>
                        <span class="cars_style"></span>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_price">Giá niêm yết: </label>
                        <span id="cars_price"   name="cars_price" 
                        value="">
                    	</span>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_promotion_price">Giá đàm phán: </label>
                        <span id="cars_promotion_price"   name="cars_promotion_price" value=""></span>
                      </p>
                    </div>
                    
                    <div class="clearfix"></div>
                    
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_size">Dài x rộng x cao (mm):</label>
                        <span id="cars_size"   name="cars_size" value=""></span>
                      </p>
                    </div>
                </div>
                <div class="clearfix"></div>
              
              </div>
              <h2 style="color: #ff9999;">Thông số kỹ thuật</h2>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_gas_tank">Dung tích bình xăng (lít):</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_gas_tank"   name="cars_gas_tank" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_engine">Động cơ:</label>
                    </div>
                    <div class="col-lg-6">
                      <p   id="cars_engine" name="cars_engine" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_capacity">Công suất (mã lực):</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_capacity"   name="cars_capacity" value="">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_momen">Mô-men xoắn (Nm):</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_momen"   name="cars_momen" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_light_roar">Khoảng sáng gầm (mm):</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_light_roar"   name="cars_light_roar" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_diameter_spin_min">Đường kính vòng quay tối thiểu (m):</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_diameter_spin_min"   name="cars_diameter_spin_min" value="">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_gear">Hộp số:</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_gear"   name="cars_gear" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_fuel_consumption">Mức tiêu thụ nhiên liệu:</label>
                    </div>
                    <div class="col-lg-6">
                      <p id="cars_fuel_consumption"   name="cars_fuel_consumption" value="">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="margin-t20"></div>
              <div class="margin-t20"></div>
              <h2 style="color: #ff9999;">Trang bị</h2>
                <div class="trangbi" style="padding: 15px;">
                	<div class="row">
                	</div>
                </div>
            </div>
            </form>
            </div>
                    </div>
                  </div>
              </div>          
    </div>
  </div>
</div>
@endsection