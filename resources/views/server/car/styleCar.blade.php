@extends('server.master')
@section('content')

<section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Dáng xe
                          </header>
                          <div class="panel-body">
                              <section id="unseen">
                                <div class="col-lg-3">
                                  <form action="{{ route('style-cars.store') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                      <label for="txtTenHang">Tên</label>
                                      <input required="required" type="text" class="form-control" id="txtTenHang" aria-describedby="emailHelp" placeholder="Nhập hãng xe" name="style_cars_name">
                                      <small id="emailHelp" class="form-text text-muted">{{ session()->has('success') ? session()->get('success') : "" }}</small>
                                      <small id="emailHelp" class="form-text text-muted">{{ session()->has('error') ? session()->get('error') : "" }}</small>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                  </form>
                                </div>
                                <div class="col-lg-5"></div>
                                <nav class="col-lg-4 navbar navbar-light bg-light">
                                  <form class="form-inline" method="GET" action="{{ route('style-search') }}">
                                    <input class="form-control mr-sm-2" type="search" name="key" placeholder="Nhập từ khóa..." aria-label="Tìm kiếm">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                                  </form>
                                </nav>
                                <div class="clearfix"></div>
                              </section>
                                </div>
                                <table id="myTable" class="table table-bordered table-striped table-condensed">
                                  <thead>

                                  <tr>
                                      <th>Tên</th>
                                      <th class="numeric">Số lượng xe</th>
                                      <th>Số lượng hãng xe</th>
                                      <th class="numeric">Tùy chỉnh</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($style as $cat)
                                  <tr>
                                      <td class="numeric">{{ $cat->style_cars_name }}</td>
                                      <td></td>
                                      <td class="numeric"></td>
                                      <td class="numeric"><a style="cursor: pointer;" data-toggle="modal" data-target="#style-car-box" onclick="edit_style( <?php echo $cat->style_cars_id ?> )">Edit</a> | <a style="cursor: pointer;" class="delete-product" href="{{ route('style-cars-del',$cat->style_cars_id) }}">Delete</a></td>
                                  </tr>
                                  @endforeach
                                  </tbody>
                              </table>
                              <nav aria-label="Page navigation example">
                                <ul class="pull-right pagination">
                                  <li class="page-item">{{ $style->links() }}</li>
                                  </li>
                                </ul>
                              </nav>
                              </section>
                          </div>
                      </section>
                  </div>
              </div>          
          </section>
      </section>

<!-- Modal -->
<div class="modal fade" id="style-car-box" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="frmEditCar">
        {{ csrf_field() }}
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Sửa thông tin</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-2 text-center">
            <label for="text-ten">Tên xe</label>
          </div>
          <div class="col-lg-4">
            <input required="required" id="txt-style-name" type="text"  name="style_cars_name" class="form-control d-inline-block pulll-right style_cars_name">
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" onclick="do_edit_style()" class="btn btn-primary">Lưu</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection


