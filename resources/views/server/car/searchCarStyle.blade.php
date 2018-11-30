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
                                  <div class="paginage"></div>
                                </div>