@extends('server.master')
@section('content')

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                    <div class="panel">
                      <div class="card">

              <div class="card-header">
                <header class="panel-heading">
                              Quản lý thông tin xe
                          </header>
              </div>
              <form action="{{ route('cars.update',$car) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('PUT') }}
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 text-left">
                    <h3 style="color: #ff9999;">Ảnh đại diện</h3>
                    @if(!empty($car->cars_image))
                      <img src="server/img/cars/{{ $car->cars_image }}" >
                    @endif
                    <h3 style="color: #ff9999;">Thay ảnh đại diện</h3>
                    <canvas id="cars_image"> 
                    </canvas>
                    <p style="margin-top: 10px;">
                      Chọn ảnh:
                      <label for="finput" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Upload Image
                      </label>
                      <input name="cars_image" type="file" id="finput" multiple="false" accept="image/*" onchange="upload()" style="display: none;" />
                    </p>
                  </div>
                  <div class="col-lg-6">
                    <div class="margin-t20"></div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_name">Tên xe: </label>
                        <input class="form-control" type="text" id="cars_name" name="cars_name" value="{{ $car->cars_name }}">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_source">Nguồn gốc: </label>
                        <input class="form-control" type="text" id="cars_source" name="cars_source" value="{{ $car->cars_source }}">
                      </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                      <p>
                        <label for="sel1">Hãng xe: </label>
                        <select class="form-control" name="cars_category" id="sel1">
                          @foreach($categories as $cat)
                            <option value="{{ $cat->category_cars_id }}"
                              <?php 
                                if(isset($car->cars_category_id) && $car->cars_category_id == $cat->category_cars_id)
                                {
                                  echo "selected";
                                }
                              ?>
                            >
                              {{ $cat->category_cars_name }}
                            </option>
                          @endforeach
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="sel2">Loại xe: </label>
                        <select class="form-control" name="cars_style" id="sel2">
                          @foreach($style as $s)
                            <option value="{{ $s->style_cars_id }}"
                              <?php 
                                if(isset($car->cars_style_id) && $car->cars_style_id == $s->style_cars_id)
                                {
                                  echo "selected";
                                }
                              ?>
                            >
                              {{ $s->style_cars_name }}
                            </option>
                          @endforeach
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_price">Giá niêm yết: </label>
                        <input id="cars_price" class="form-control" type="number" name="cars_price" 
                        value="<?php echo $car->cars_price ?>">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_promotion_price">Giá đàm phán: </label>
                        <input id="cars_promotion_price" class="form-control" type="number" name="cars_promotion_price" value="{{ $car->cars_promotion_price }}">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <div class="col-lg-8">
                          <label style="margin-top: 10px;" for="status">Trạng thái: </label>
                        </div>
                        <div class="col-lg-4">
                          <input type="checkbox" name="cars_status" id="status" class="form-control form-control-lg inline-block"
                          <?php 
                            if($car->cars_status == 1 || $car->cars_status == 'on')
                            {
                              echo "checked";
                            }
                          ?>
                          >
                        </div>
                      </p>
                    </div>
                    <div class="clearfix"></div>
                    <h3 style="color: #ff9999;">Kích thước tổng thể</h3>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_size">Dài x rộng x cao (mm):</label>
                        <input id="cars_size" class="form-control" type="text" name="cars_size" value="{{ $car->cars_size }}">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_weight">Trọng lượng:</label>
                        <input id="cars_weight" class="form-control" type="text" name="cars_weight" value="{{ $car->cars_weight }}">
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
                      <input id="cars_gas_tank" class="form-control" type="text" name="cars_gas_tank" value="{{ $car->cars_gas_tank }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_engine">Động cơ:</label>
                    </div>
                    <div class="col-lg-6">
                      <input class="form-control" type="text" id="cars_engine" name="cars_engine" value="{{ $car->cars_engine }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_capacity">Công suất (mã lực):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_capacity" class="form-control" type="text" name="cars_capacity" value="{{ $car->cars_capacity }}">
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
                      <input id="cars_momen" class="form-control" type="text" name="cars_momen" value="{{ $car->cars_momen }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_light_roar">Khoảng sáng gầm (mm):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_light_roar" class="form-control" type="text" name="cars_light_roar" value="{{ $car->cars_light_roar }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_diameter_spin_min">Đường kính vòng quay tối thiểu (m):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_diameter_spin_min" class="form-control" type="text" name="cars_diameter_spin_min" value="{{ $car->cars_diameter_spin_min }}">
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
                      <input id="cars_gear" class="form-control" type="text" name="cars_gear" value="{{ $car->cars_gear }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_fuel_consumption">Mức tiêu thụ nhiên liệu:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_fuel_consumption" class="form-control" type="text" name="cars_fuel_consumption" value="{{ $car->cars_fuel_consumption }}">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="margin-t20"></div>
              <div class="margin-t20"></div>
              <h2 style="color: #ff9999;">Trang bị</h2>
                <div class="trangbi">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_brake_abs">Chống bó cứng phanh (ABS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_brake_abs" class="form-control" type="checkbox" name="cars_brake_abs"
                          <?php 
                            if($car->cars_brake_abs == 1 || $car->cars_brake_abs == 'on')
                            {
                              echo "checked";
                            }
                          ?>
                      >
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_brake_ebd">Phân bổ lực phanh điện tử (EBD) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_brake_ebd" class="form-control" type="checkbox" name="cars_brake_ebd" <?php 
                            if($car->cars_brake_ebd == 1 || $car->cars_brake_ebd == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_brake_ba">Hỗ trợ phanh khẩn cấp (BA) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_brake_ba" class="form-control" type="checkbox" name="cars_brake_ba" <?php 
                            if($car->cars_brake_ba == 1 || $car->cars_brake_ba == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_electric_balance_eps">Cân bằng điện tử (EPS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_electric_balance_eps" class="form-control" type="checkbox" name="cars_electric_balance_eps" <?php 
                            if($car->cars_electric_balance_eps == 1 || $car->cars_electric_balance_eps == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_control_degree_grip">Kiểm soát độ bám đường (TRC) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_control_degree_grip" class="form-control" type="checkbox" name="cars_control_degree_grip" <?php 
                            if($car->cars_control_degree_grip == 1 || $car->cars_control_degree_grip == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="  cars_air_bag">Túi khí :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id=" cars_air_bag" class="form-control" type="number" name=" cars_air_bag" value="{{ $car->cars_air_bag }}">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_electric_support_eps">Trợ lực điện (EPS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_electric_support_eps" class="form-control" type="checkbox" name="cars_electric_support_eps" <?php 
                            if($car->cars_electric_support_eps == 1 || $car->cars_electric_support_eps == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_support_start_steep">Hỗ trợ khởi động trên dốc</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_support_start_steep" class="form-control" type="checkbox" name="cars_support_start_steep" <?php 
                            if($car->cars_support_start_steep == 1 || $car->cars_support_start_steep == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_cruise_control">Điều khiển hành trình (Cruise Control) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_cruise_control" class="form-control" type="checkbox" name="cars_cruise_control" <?php 
                            if($car->cars_cruise_control == 1 || $car->cars_cruise_control == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_run_mode">Lựa chọn chế độ chạy :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_run_mode" class="form-control" type="checkbox" name="cars_run_mode" <?php 
                            if($car->cars_run_mode == 1 || $car->cars_run_mode == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_electric_hand_brake">Phanh điện tử tay</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_electric_hand_brake" class="form-control" type="checkbox" name="cars_electric_hand_brake" <?php 
                            if($car->cars_electric_hand_brake == 1 || $car->cars_electric_hand_brake == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_smart_lock">Chìa khóa thông minh:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_smart_lock" class="form-control" type="checkbox" name="cars_smart_lock" <?php 
                            if($car->cars_smart_lock == 1 || $car->cars_smart_lock == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_headlight">Đèn pha :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_headlight" class="form-control" type="text" name="cars_headlight" 
                      value="{{ $car->cars_headlight }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_auto_headlight">Đèn pha tự động:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_auto_headlight" class="form-control" type="checkbox" name="cars_auto_headlight" <?php 
                            if($car->cars_auto_headlight == 1 || $car->cars_auto_headlight == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_auto_headlight_afs">Đèn pha tự động điều chỉnh góc chiếu (AFS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_auto_headlight_afs" class="form-control" type="checkbox" name="cars_auto_headlight_afs" <?php 
                            if($car->cars_auto_headlight_afs == 1 || $car->cars_auto_headlight_afs == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_auto_wiper">Gạt mưa tự động :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_auto_wiper" class="form-control" type="checkbox" name="cars_auto_wiper" <?php 
                            if($car->cars_auto_wiper == 1 || $car->cars_auto_wiper == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_interiar_materials">Chất liệu nội thất :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_interiar_materials" class="form-control" type="text" name="cars_interiar_materials" value="{{ $car->cars_interiar_materials }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_air_conditioning">Điều hòa :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_air_conditioning" class="form-control" type="text" name="cars_air_conditioning" value="{{ $car->cars_air_conditioning }}">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_after_cooler">Dàn lạnh cho hàng ghế sau :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_after_cooler" class="form-control" type="checkbox" name="cars_after_cooler" <?php 
                            if($car->cars_after_cooler == 1 || $car->cars_after_cooler == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_after_wind_door">Cửa gió cho hàng ghế sau :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_after_wind_door" class="form-control" type="checkbox" name="cars_after_wind_door" <?php 
                            if($car->cars_after_wind_door == 1 || $car->cars_after_wind_door == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_mirror_anti_dazzle">Gương chiếu hậu chống chói :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_mirror_anti_dazzle" class="form-control" type="checkbox" name="cars_mirror_anti_dazzle" <?php 
                            if($car->cars_mirror_anti_dazzle == 1 || $car->cars_mirror_anti_dazzle == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_seat">Ghế lái :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_seat" class="form-control" type="text" name="cars_seat" value="{{ $car->cars_seat }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_seat_glass_door">Cửa kính ghế lái </label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_seat_glass_door" class="form-control" type="text" name="cars_seat_glass_door" value="{{ $car->cars_seat_glass_door }}">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_speakers">Hệ thống loa (cái) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_speakers" class="form-control" type="number" name="cars_speakers" value="{{ $car->cars_speakers }}">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_bluetooth">Kết nối Bluetooth :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_bluetooth" class="form-control" type="checkbox" name="cars_bluetooth" <?php 
                            if($car->cars_bluetooth == 1 || $car->cars_bluetooth == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_usb">Đầu cắm USB : </label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_usb" class="form-control" type="checkbox" name="cars_usb" <?php 
                            if($car->cars_usb == 1 || $car->cars_usb == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_camera_back">Camera lùi :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_camera_back" class="form-control" type="checkbox" name="cars_camera_back" <?php 
                            if($car->cars_camera_back == 1 || $car->cars_camera_back == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_sensor_distance  ">Cảm biến khoảng cách :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_sensor_distance " class="form-control" type="checkbox" name="cars_sensor_distance " <?php 
                            if($car->cars_sensor_distance == 1 || $car->cars_sensor_distance == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_out_window">Cửa sổ trời :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_out_window" class="form-control" type="checkbox" name="cars_out_window" <?php 
                            if($car->cars_out_window == 1 || $car->cars_out_window == 'on')
                            {
                              echo "checked";
                            }
                          ?>>
                    </div>
                  </div>
                </div>
                <div class="margin-b50"></div>
                <div style="margin: 10px 0px">
              </div>
                <button type="submit" class="btn btn-success">Lưu</button>
                <a href="{{ route('cars.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
                        </div>
                    </div>
                    </form>
            </div>
                    </div>
                  </div>
              </div>          
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->

        <!-- modal -->
@endsection