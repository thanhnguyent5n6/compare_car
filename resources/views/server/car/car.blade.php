@extends('server.master')
@section('content')

<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading">
                              Quản lý thông tin xe
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <label style="margin-left: 20px;">Danh mục: </label>
                                  <select onchange="change_category()" style="margin: 0px 0px 10px 10px;" class="select-view-car form-control" id="sel_category_car">
                                    <option value="0">Chọn hãng</option>
                                    @foreach($categories as $rows)
                                    <option value="{{ $rows->category_cars_id }}">{{ $rows->category_cars_name }}</option>
                                    @endforeach
                                  </select>
                                <label  style="margin-left: 20px;">Kiểu dáng: </label>
                                  <select onchange="change_style()"  style="margin: 0px 0px 10px 10px;" class="select-view-car form-control" id="sel_style_car">
                                    <option value="0">Chọn kiểu dáng</option>

                                    @foreach($style as $rows)
                                    <option value="{{ $rows->style_cars_id }}">{{ $rows->style_cars_name }}</option>
                                    @endforeach
                                  </select>
                                <div class="pull-left">
                                  <!-- <button style="margin-bottom: 10px;" class="btn-add-new btn btn-primary">Thêm mới</button> -->
                                  <!-- <button id="add-car-modal" type="button" class="btn btn-primary" data-toggle="modal" data-target=".add-car-modal">Thêm mới</button> -->
                                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Thêm mới</button>
                                  @if(!empty(session()->has('success')))
                                    <h5>{{ session()->get('success') }}</h5>
                                  @endif
                                  
                                </div>

                                <nav class="pull-right navbar navbar-light bg-light" style="margin: 0;">
                                  <form class="form-inline" action="{{ route('admin.car.search') }}" method="POST">
                                    {{ csrf_field() }}
                                    <input name="search_car" class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa..." aria-label="Tìm kiếm">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                                  </form>
                                </nav>
                                </div>
                                
                                
                                <div class="clearfix"></div>
                                <div id="loading"></div>
                                <div class="list-car margin-t20">
                                  <div class="row">
                                    <!-- box car -->
                                    @foreach($cars as $car)
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car"">
                                        <div class="edit-car">
                                            <!-- <a href="{{ route('cars.edit',$car->cars_id) }}" title="Chỉnh sửa thông tin" class="btn btn-success"><i class="fas fa-edit"></i></a> -->
                                            <a class="btn btn-success" onclick="edit_car(<?php echo $car->cars_id ?>)" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fas fa-edit"></i></a>
                                        </div>
                                       <!--  <div class="delete-car"><a href="{{ route('cars-destroy',$car->cars_id) }}" title="Xóa" class="btn btn-danger"><i class="fas fa-times"></i></a></div> -->
                                       <div class="delete-car"><a onclick="return destroy_car(<?php echo $car->cars_id ?>)" title="Xóa" class="btn btn-danger"><i class="fas fa-times"></i></a></div>
                                        <a style="cursor: pointer;" class="show-car"><img style="width: 100%" class="card-img-top" src="server/img/cars/{{ $car->cars_image }}" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>{{ $car->cars_name }}</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>{{ number_format($car->cars_promotion_price) }}đ</p>
                                          <!-- <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p> -->
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    @endforeach
                                  </div>
                                  <nav aria-label="Page navigation example">
                                <ul class="pull-right pagination">
                                  
                                  <li class="page-item"></li>
                                 {{ $cars->links() }}
                                  </li>
                                </ul>
                              </nav>
                                </div>
                              
                              </section>
                          </div>
                      </section>
                  </div>
              </div>          
          </section>
      </section>
      <!--main content end-->
      <!-- Right Slidebar start -->

        <!-- modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="card">
              <div class="card-header">
                <p><label>Thêm thông tin xe</label></p>
              </div>
              <div class="close-add-car">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i></button>
              </div>
              <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
              <div class="card-body">

                <div class="row">
                  <div class="col-lg-6 text-left">
                    <h3 style="color: #ff9999;">Ảnh đại diện</h3>
                    <canvas id="cars_image"> </canvas>
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
                        <input class="form-control" type="text" id="cars_name" name="cars_name">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_source">Nguồn gốc: </label>
                        <input class="form-control" type="text" id="cars_source" name="cars_source">
                      </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                      <p>
                        <label for="sel1">Hãng xe: </label>
                        <select class="form-control" name="cars_category" id="sel1">
                          @foreach($categories as $cat)
                            <option value="{{ $cat->category_cars_id }}">{{ $cat->category_cars_name }}</option>
                          @endforeach
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="sel2">Loại xe: </label>
                        <select class="form-control" name="cars_style" id="sel2">
                          @foreach($style as $s)
                            <option value="{{ $s->style_cars_id }}">{{ $s->style_cars_name }}</option>
                          @endforeach
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_price">Giá niêm yết: </label>
                        <input id="cars_price" class="form-control" type="number" name="cars_price">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_promotion_price">Giá đàm phán: </label>
                        <input id="cars_promotion_price" class="form-control" type="number" name="cars_promotion_price">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <div class="col-lg-8">
                          <label style="margin-top: 10px;" for="status">Trạng thái: </label>
                        </div>
                        <div class="col-lg-4">
                          <input type="checkbox" name="cars_status" id="status" class="form-control form-control-lg inline-block">
                        </div>
                      </p>
                    </div>
                    <div class="clearfix"></div>
                    <h3 style="color: #ff9999;">Kích thước tổng thể</h3>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_size">Dài x rộng x cao (mm):</label>
                        <input id="cars_size" class="form-control" type="text" name="cars_size">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="cars_weight">Trọng lượng:</label>
                        <input id="cars_weight" class="form-control" type="text" name="cars_weight">
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
                      <input id="cars_gas_tank" class="form-control" type="text" name="cars_gas_tank">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_engine">Động cơ:</label>
                    </div>
                    <div class="col-lg-6">
                      <input class="form-control" type="text" id="cars_engine" name="cars_engine">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_capacity">Công suất (mã lực):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_capacity" class="form-control" type="text" name="cars_capacity">
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
                      <input id="cars_momen" class="form-control" type="text" name="cars_momen">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_light_roar">Khoảng sáng gầm (mm):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_light_roar" class="form-control" type="text" name="cars_light_roar">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_diameter_spin_min">Đường kính vòng quay tối thiểu (m):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_diameter_spin_min" class="form-control" type="text" name="cars_diameter_spin_min">
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
                      <input id="cars_gear" class="form-control" type="text" name="cars_gear">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_fuel_consumption">Mức tiêu thụ nhiên liệu:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_fuel_consumption" class="form-control" type="text" name="cars_fuel_consumption">
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
                      <input id="cars_brake_abs" class="form-control" type="checkbox" name="cars_brake_abs">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_brake_ebd">Phân bổ lực phanh điện tử (EBD) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_brake_ebd" class="form-control" type="checkbox" name="cars_brake_ebd">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_brake_ba">Hỗ trợ phanh khẩn cấp (BA) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_brake_ba" class="form-control" type="checkbox" name="cars_brake_ba">
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
                      <input id="cars_electric_balance_eps" class="form-control" type="checkbox" name="cars_electric_balance_eps">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_control_degree_grip">Kiểm soát độ bám đường (TRC) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_control_degree_grip" class="form-control" type="checkbox" name="cars_control_degree_grip">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_air_bag">Túi khí :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id=" cars_air_bag" class="form-control" type="number" name=" cars_air_bag">
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
                      <input id="cars_electric_support_eps" class="form-control" type="checkbox" name="cars_electric_support_eps">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_support_start_steep">Hỗ trợ khởi động trên dốc</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_support_start_steep" class="form-control" type="checkbox" name="cars_support_start_steep">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_cruise_control">Điều khiển hành trình (Cruise Control) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_cruise_control" class="form-control" type="checkbox" name="cars_cruise_control">
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
                      <input id="cars_run_mode" class="form-control" type="checkbox" name="cars_run_mode">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_electric_hand_brake">Phanh điện tử tay</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_electric_hand_brake" class="form-control" type="checkbox" name="cars_electric_hand_brake">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_smart_lock">Chìa khóa thông minh:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_smart_lock" class="form-control" type="checkbox" name="cars_smart_lock">
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
                      <input id="cars_headlight" class="form-control" type="text" name="cars_headlight">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_auto_headlight">Đèn pha tự động:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_auto_headlight" class="form-control" type="checkbox" name="cars_auto_headlight">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_auto_headlight_afs">Đèn pha tự động điều chỉnh góc chiếu (AFS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_auto_headlight_afs" class="form-control" type="checkbox" name="cars_auto_headlight_afs">
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
                      <input id="cars_auto_wiper" class="form-control" type="checkbox" name="cars_auto_wiper">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_interiar_materials">Chất liệu nội thất :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_interiar_materials" class="form-control" type="text" name="cars_interiar_materials">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_air_conditioning">Điều hòa :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_air_conditioning" class="form-control" type="text" name="cars_air_conditioning">
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
                      <input id="cars_after_cooler" class="form-control" type="checkbox" name="cars_after_cooler">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_after_wind_door">Cửa gió cho hàng ghế sau :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_after_wind_door" class="form-control" type="checkbox" name="cars_after_wind_door">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_mirror_anti_dazzle">Gương chiếu hậu chống chói :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_mirror_anti_dazzle" class="form-control" type="checkbox" name="cars_mirror_anti_dazzle">
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
                      <input id="cars_seat" class="form-control" type="text" name="cars_seat">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_seat_glass_door">Cửa kính ghế lái </label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_seat_glass_door" class="form-control" type="text" name="cars_seat_glass_door">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_speakers">Hệ thống loa (cái) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_speakers" class="form-control" type="number" name="cars_speakers">
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
                      <input id="cars_bluetooth" class="form-control" type="checkbox" name="cars_bluetooth">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_usb">Đầu cắm USB : </label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_usb" class="form-control" type="checkbox" name="cars_usb">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_camera_back">Camera lùi :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_camera_back" class="form-control" type="checkbox" name="cars_camera_back">
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
                      <input id="cars_sensor_distance " class="form-control" type="checkbox" name="cars_sensor_distance ">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="cars_out_window">Cửa sổ trời :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="cars_out_window" class="form-control" type="checkbox" name="cars_out_window">
                    </div>
                  </div>
                </div>
                <div class="margin-b50"></div>
                <div style="margin: 10px 0px">
              </div>
        <button type="submit" class="btn btn-success">Thêm</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Hủy</button>
                </div>
            </div>
            </form>
    </div>
    </div>
  </div>
</div>

<!-- Small modal -->


<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="row">
                  <div class="col-lg-12">
                    <div class="panel">
                      <div class="card">

              <div class="card-header">
                <header class="panel-heading">
                    Quản lý thông tin xe
                </header>
              </div>
              <form id="form-edit-car" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="text" name="update_id" id="update_id" hidden="hidden">
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 text-left">
                    <h3 style="color: #ff9999;">Ảnh đại diện</h3>
                    <img class="cars_avt" src="" style="max-width: 100%">
                    <h3 style="color: #ff9999;">Thay ảnh đại diện</h3>
                    
                    <p style="margin-top: 10px;">
                      Chọn ảnh:
                      <label for="updateImage" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Upload Image
                      </label>
                      <input name="updateImage" type="file" id="updateImage" multiple="false" accept="image/*" onchange="uploadImage()" style="display: none;" />
                    </p>
                  </div>
                  <div class="col-lg-6">
                    <div class="margin-t20"></div>
                    <div class="col-lg-6">
                      <p>
                        <label for="edit_cars_name">Tên xe: </label>
                        <input class="form-control" type="text" id="edit_cars_name" name="edit_cars_name" value="">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="edit_cars_source">Nguồn gốc: </label>
                        <input class="form-control" type="text" id="edit_cars_source" name="edit_cars_source" value="">
                      </p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                      <p>
                        <label for="sel1">Hãng xe: </label>
                        <select class="form-control sel_cars_category" name="sel_cars_category" id="sel1">
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="sel2">Loại xe: </label>
                        <select class="form-control sel_cars_style" name="sel_cars_style" id="sel2">
                        </select>
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="edit_cars_price">Giá niêm yết: </label>
                        <input id="edit_cars_price" class="form-control" type="number" name="edit_cars_price" 
                        value="">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="edit_cars_promotion_price">Giá đàm phán: </label>
                        <input id="edit_cars_promotion_price" class="form-control" type="number" name="edit_cars_promotion_price" value="">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <div class="col-lg-8">
                          <label style="margin-top: 10px;" for="edit_cars_status">Trạng thái: </label>
                        </div>
                        <div class="col-lg-4">
                          <input type="checkbox" name="edit_cars_status" id="edit_cars_status" class="form-control form-control-lg inline-block">
                        </div>
                      </p>
                    </div>
                    <div class="clearfix"></div>
                    <h3 style="color: #ff9999;">Kích thước tổng thể</h3>
                    <div class="col-lg-6">
                      <p>
                        <label for="edit_cars_size">Dài x rộng x cao (mm):</label>
                        <input id="edit_cars_size" class="form-control" type="text" name="edit_cars_size" value="">
                      </p>
                    </div>
                    <div class="col-lg-6">
                      <p>
                        <label for="edit_cars_weight">Trọng lượng:</label>
                        <input id="edit_cars_weight" class="form-control" type="text" name="edit_cars_weight" value="">
                      </p>
                    </div>
                </div>
                <div class="clearfix"></div>
              
              </div>
              <h2 style="color: #ff9999;">Thông số kỹ thuật</h2>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_gas_tank">Dung tích bình xăng (lít):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_gas_tank" class="form-control" type="text" name="edit_cars_gas_tank" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_engine">Động cơ:</label>
                    </div>
                    <div class="col-lg-6">
                      <input class="form-control" type="text" id="edit_cars_engine" name="edit_cars_engine" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_capacity">Công suất (mã lực):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_capacity" class="form-control" type="text" name="edit_cars_capacity" value="">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_momen">Mô-men xoắn (Nm):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_momen" class="form-control" type="text" name="edit_cars_momen" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_light_roar">Khoảng sáng gầm (mm):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_light_roar" class="form-control" type="text" name="edit_cars_light_roar" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_diameter_spin_min">Đường kính vòng quay tối thiểu (m):</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_diameter_spin_min" class="form-control" type="text" name="edit_cars_diameter_spin_min" value="">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_gear">Hộp số:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_gear" class="form-control" type="text" name="edit_cars_gear" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_fuel_consumption">Mức tiêu thụ nhiên liệu:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_fuel_consumption" class="form-control" type="text" name="edit_cars_fuel_consumption" value="">
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
                      <label for="edit_cars_brake_abs">Chống bó cứng phanh (ABS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_brake_abs" class="form-control" type="checkbox" name="edit_cars_brake_abs">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_brake_ebd">Phân bổ lực phanh điện tử (EBD) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_brake_ebd" class="form-control" type="checkbox" name="edit_cars_brake_ebd">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_brake_ba">Hỗ trợ phanh khẩn cấp (BA) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_brake_ba" class="form-control" type="checkbox" name="edit_cars_brake_ba">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_electric_balance_eps">Cân bằng điện tử (EPS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_electric_balance_eps" class="form-control" type="checkbox" name="edit_cars_electric_balance_eps">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_control_degree_grip">Kiểm soát độ bám đường (TRC) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_control_degree_grip" class="form-control" type="checkbox" name="edit_cars_control_degree_grip">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_air_bag">Túi khí :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_air_bag" class="form-control" type="text" name="edit_cars_air_bag" value="">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_electric_support_eps">Trợ lực điện (EPS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_electric_support_eps" class="form-control" type="checkbox" name="edit_cars_electric_support_eps">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_support_start_steep">Hỗ trợ khởi động trên dốc</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_support_start_steep" class="form-control" type="checkbox" name="edit_cars_support_start_steep">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_cruise_control">Điều khiển hành trình (Cruise Control) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_cruise_control" class="form-control" type="checkbox" name="edit_cars_cruise_control">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_run_mode">Lựa chọn chế độ chạy :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_run_mode" class="form-control" type="checkbox" name="edit_cars_run_mode">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_electric_hand_brake">Phanh điện tử tay</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_electric_hand_brake" class="form-control" type="checkbox" name="edit_cars_electric_hand_brake">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_smart_lock">Chìa khóa thông minh:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_smart_lock" class="form-control" type="checkbox" name="edit_cars_smart_lock">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_headlight">Đèn pha :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_headlight" class="form-control" type="text" name="edit_cars_headlight" 
                      value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_auto_headlight">Đèn pha tự động:</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_auto_headlight" class="form-control" type="checkbox" name="edit_cars_auto_headlight">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_auto_headlight_afs">Đèn pha tự động điều chỉnh góc chiếu (AFS) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_auto_headlight_afs" class="form-control" type="checkbox" name="edit_cars_auto_headlight_afs">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_auto_wiper">Gạt mưa tự động :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_auto_wiper" class="form-control" type="checkbox" name="edit_cars_auto_wiper">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_interiar_materials">Chất liệu nội thất :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_interiar_materials" class="form-control" type="text" name="edit_cars_interiar_materials" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_air_conditioning">Điều hòa :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_air_conditioning" class="form-control" type="text" name="edit_cars_air_conditioning" value="">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_after_cooler">Dàn lạnh cho hàng ghế sau :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_after_cooler" class="form-control" type="checkbox" name="edit_cars_after_cooler">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_after_wind_door">Cửa gió cho hàng ghế sau :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_after_wind_door" class="form-control" type="checkbox" name="edit_cars_after_wind_door">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_mirror_anti_dazzle">Gương chiếu hậu chống chói :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_mirror_anti_dazzle" class="form-control" type="checkbox" name="edit_cars_mirror_anti_dazzle">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_seat">Ghế lái :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_seat" class="form-control" type="text" name="edit_cars_seat" value="">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_seat_glass_door">Cửa kính ghế lái </label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_seat_glass_door" class="form-control" type="text" name="edit_cars_seat_glass_door">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_speakers">Hệ thống loa (cái) :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_speakers" class="form-control" type="text" name="edit_cars_speakers">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_bluetooth">Kết nối Bluetooth :</label>
                    </div>
                    <div class="col-lg-6">
                      <input type="checkbox" name="edit_cars_bluetooth" id="edit_cars_bluetooth" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_usb">Đầu cắm USB : </label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_usb" class="form-control" type="checkbox" name="edit_cars_usb">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_camera_back">Camera lùi :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_camera_back" class="form-control" type="checkbox" name="edit_cars_camera_back">
                    </div>
                  </div>
                </div>
                <div class="margin-t20"></div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_sensor_distance  ">Cảm biến khoảng cách :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_sensor_distance " class="form-control" type="checkbox" name="edit_cars_sensor_distance">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="col-lg-6">
                      <label for="edit_cars_out_window">Cửa sổ trời :</label>
                    </div>
                    <div class="col-lg-6">
                      <input id="edit_cars_out_window" class="form-control" type="checkbox" name="edit_cars_out_window">
                    </div>
                  </div>
                </div>
                <div class="margin-b50"></div>
                <div style="margin: 10px 0px">
              </div>
                <a onclick="update_car()" class="btn btn-success">Lưu</a>
                <a href="{{ route('cars.index') }}" type="button" class="btn btn-danger" data-dismiss="modal">Hủy</a>
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