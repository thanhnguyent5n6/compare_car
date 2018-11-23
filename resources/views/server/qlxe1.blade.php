<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Hệ thống quản trị</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

      <!--right slidebar-->
      <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo">Quản trị viên</a>
            <!--logo end-->
            
            
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Trang chủ</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="qlxe1.html">
                          <i class="fas fa-car"></i>
                          
                          <span>Thông số xe</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="qlxe.html">
                          <i class="fa fa-th"></i>
                          <span>Danh mục xe</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="qlxe.html">
                          <i class="fas fa-train"></i>
                          <span>Hãng xe</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="qlbaiviet.html">
                          <i class="fas fa-newspaper"></i>
                          <span>Chuyên gia đánh giá</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="qlbaiviet.html"> 
                        <i class="fas fa-comments"></i>
                          <span>Người dùng đánh giá</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
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
                                <div class="pull-left">
                                  <button style="margin-bottom: 10px;" class="btn-add-new btn btn-primary">Thêm mới</button>
                                </div>
                                <label style="margin-left: 20px;">Hiển thị: </label>
                                  <select style="margin: 0px 0px 10px 10px;" class="select-view-car form-control">
                                    <option>10</option>
                                    <option>20</option>
                                    <option>50</option>
                                    <option>100</option>
                                  </select>
                                <nav class="pull-right navbar navbar-light bg-light" style="margin: 0;">
                                  <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="search" placeholder="Nhập từ khóa..." aria-label="Tìm kiếm">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                                  </form>
                                </nav>
                                <div class="clearfix"></div>
                                <div class="list-car margin-t20">
                                  <div class="row">
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                    <!-- box car -->
                                    <div class="col-lg-20 a-list-car">
                                      <div class="card box-car" style="width: 18rem;">
                                        <div class="edit-car"><button class="btn btn-success"><i class="fas fa-edit"></i></button></div>
                                        <div class="delete-car"><button class="btn btn-danger"><i class="fas fa-times"></i></button></div>
                                        <a style="cursor: pointer;" class="show-car"><img class="card-img-top" src="img/xe1.jpg" alt="Card image cap"></a>
                                        <div class="card-body">
                                          <h5 class="card-title"><span class="font-weight-bold">Tên: </span>Sorento 2.4L GATH 2017</h5>
                                          <p class="card-text"><span class="font-weight-bold">Giá: </span>921 triệu</p>
                                          <p class="card-text"><span class="font-weight-bold">Trạng thái: </span> <button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button>
                                            <button class="btn btn-danger btn-xs btn-khonghienthi"><i class="fa fa-times"></i></button></p>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- end box-car -->
                                  </div>
                                </div>
                              <nav aria-label="Page navigation example">
                                <ul class="pull-right pagination">
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                      <span aria-hidden="true">&laquo;</span>
                                      <span class="sr-only">Previous</span>
                                    </a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                      <span aria-hidden="true">&raquo;</span>
                                      <span class="sr-only">Next</span>
                                    </a>
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
      <!--main content end-->
        <section class="hidden-add-car">
          <div class="add-car-content">
            <div class="card">
              <div class="card-header">
                Thêm thông tin
              </div>
              <div class="close-add-car">
                <button class="btn btn-danger">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Tên xe</label>
                  </div>
                  <div class="col-lg-3">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="row">
                  <div class="col-lg-1"><label>Hãng xe</label></div>
                  <div class="col-lg-2">
                    <select class="form-control">
                      <option>BMW</option>
                      <option>Audi</option>
                      <option>Mecerdes-Benz</option>
                      <option>KIA</option>
                      <option>Toyota</option>
                    </select>
                    <div class="margin-b50"></div>
                  </div>
                  <div class="col-lg-2">
                  </div>
                  <div class="col-lg-1"><label>Dáng xe</label></div>
                  <div class="col-lg-2">
                    <select class="form-control">
                      <option>Thể thao</option>
                      <option>SUV</option>
                      <option>4 Chỗ</option>
                      <option>Bán tải</option>
                    </select>
                    <div class="margin-b50"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Giá niêm yết</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1">
                    <label for="text-ten">Giá đàm phán</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1">
                    <label for="text-ten">Hiển thị</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Kích thước</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1">
                    <label for="text-ten">Dung tích bình xăng</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1">
                    <label for="text-ten">Động cơ</label>
                  </div>
                  <div class="col-lg-3">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Công suất (mã lực):</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1">
                    <label for="text-ten">Mô-men xoắn</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1">
                    <label for="text-ten">Khoảng sáng gầm</label>
                  </div>
                  <div class="col-lg-3">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Đường kính vòng quay tối thiểu (m):</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1">
                    <label for="text-ten">Nguồn gốc:</label>
                  </div>
                  <div class="col-lg-2">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1">
                    <label for="text-ten">Hộp số:</label>
                  </div>
                  <div class="col-lg-3">
                    <input id="text-ten" type="text" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <h2 style="color: #ff9999;">Trang bị</h2>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Chống bó cứng phanh (ABS) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Phân bổ lực phanh điện tử (EBD) :</label>
                  </div>
                  <div class="col-lg-1 ">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Hỗ trợ phanh khẩn cấp (BA) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Cân bằng điện tử (ESP) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Kiểm soát phanh điện tử (ECB) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="margin-b50"></div>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Kiểm soát độ bám đường (TRC) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Túi khí :</label>
                  </div>
                  <div class="col-lg-1 ">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Trợ lực điện (EPS) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Điều khiển hành trình (Cruise Control) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Chìa khóa thông minh :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="margin-b50"></div>
                <div class="row">
                  <div class="col-lg-1 text-center">
                    <label for="text-ten">Đèn pha :</label>
                  </div>
                  <div class="col-lg-2">
                    <select class="form-control">
                      <option>LED</option>
                      <option>AFC</option>
                    </select>
                  </div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Đèn pha tự động :</label>
                  </div>
                  <div class="col-lg-1 ">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Hỗ trợ phanh khẩn cấp (BA) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="col-lg-1 text-right">
                    <label for="text-ten">Cân bằng điện tử (ESP) :</label>
                  </div>
                  <div class="col-lg-1">
                    <input id="text-ten" type="checkbox" name="ten" class="form-control d-inline-block pulll-right">
                  </div>
                  <div class="margin-b50"></div>
                </div>
                <div class="margin-b50"></div>
                <div style="margin: 10px 0px">
                  <a href="#" class="btn btn-primary">Lưu</a>
                  <a href="#" class="btn btn-danger close-add-car-1">Hủy</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      <!-- Right Slidebar start -->
      <section class="box-show-car">
          <div class="box-show-car-content">
            <div class="card">
              <div class="card-header">
                Thông tin chi tiết
              </div>
              <div class="close-add-car">
                <button class="btn btn-danger">
                  <i class="fas fa-times"></i>
                </button>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 text-left">
                    <img style="max-width: 100%;" src="img/xe1.jpg">
                  </div>
                  <div class="col-lg-6">
                    <div class="margin-t20"></div>
                    <div class="col-lg-6">
                      <p><label>Tên xe: </label><span> Lexus ES250</span></p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Nguồn gốc: </label><span> Nhập khẩu</span></p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                      <p><label>Hãng xe: </label><span> Toyota</span></p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Loại xe: </label><span> Sendan</span></p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Giá niêm yết: </label><span class="gia-niem-yet"> 2.280.000.000</span></p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Giá đàm phán: </label><span class="gia-dp"> 2.254.000.000</span></p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Trạng thái: </label><button class="btn btn-success btn-xs btn-hienthi"><i class="fa fa-check"></i></button></p>
                    </div>
                    <div class="clearfix"></div>
                    <h3 style="color: #ff9999;">Kích thước tổng thể</h3>
                    <div class="col-lg-6">
                      <p><label>Dài x rộng x cao (mm): </label>4915x1820x1450</p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Thông số lốp: </label>205/55R15</p>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6">
                      <p><label>Mâm xe: </label>Hợp kim 15.00"</p>
                    </div>
                    <div class="col-lg-6">
                      <p><label>Trọng lượng: </label>1045 (kg)</p>
                    </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <h2 style="color: #ff9999;">Thông số kỹ thuật</h2>
                <div class="row">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Dung tích bình xăng (lít):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>65</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Động cơ:</label>
                  </div>
                  <div class="col-lg-1">
                    <span>2.5 I4</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Công suất (mã lực):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>181</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="row">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Mô-men xoắn (Nm):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>235</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Khoảng sáng gầm (mm):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>155</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Đường kính vòng quay tối thiểu (m):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>11.4</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="row">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Dung tích bình xăng (lít):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>65</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Động cơ:</label>
                  </div>
                  <div class="col-lg-1">
                    <span>2.5 I4</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Công suất (mã lực):</label>
                  </div>
                  <div class="col-lg-1">
                    <span>181</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="row">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Hộp số:</label>
                  </div>
                  <div class="col-lg-1">
                    <span>AT 6 cấp</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Mức tiêu thụ nhiên liệu:</label>
                  </div>
                  <div class="col-lg-1">
                    <span>8</span>
                  </div>
                </div>
              <div class="margin-t20"></div>
              <h2 style="color: #ff9999;">Trang bị</h2>
                <div class="row thongsokt">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Chống bó cứng phanh (ABS) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Phân bổ lực phanh điện tử (EBD) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Hỗ trợ phanh khẩn cấp (BA) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="row thongsokt">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Cân bằng điện tử (ESP) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Kiểm soát độ bám đường (TRC) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Túi khí :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>10</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="row thongsokt">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Trợ lực điện (EPS) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Điều khiển hành trình (Cruise Control) :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Lựa chọn chế độ chạy :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="row thongsokt">
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Hỗ trợ ra vào ghế lái Easy Entry :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Chìa khóa thông minh :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Có</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <!-- first -->
                  <div class="col-lg-2">
                    <label>Đèn pha :</label>
                  </div>
                  <div class="col-lg-1">
                    <span>Xenon</span>
                  </div>
                  <div class="col-lg-1"></div>
                  <!-- end -->
                  <div class="br-line"></div>
                </div>
                <div class="margin-b50"></div>
                <div style="margin: 10px 0px">
                  <a href="#" class="btn btn-primary">Lưu</a>
                  <a href="#" class="btn btn-danger close-add-car-1">Hủy</a>
                </div>
            </div>

          </div>
        </section>
      <div class="sb-slidebar sb-right sb-style-overlay">
          <h5 class="side-title">Online Customers</h5>
          <ul class="quick-chat-list">
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar2.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>John Doe</strong>
                          <small>Dream Land, AU</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/chat-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-important">3</span>
                          </div>
                          <strong>Jonathan Smith</strong>
                          <small>United States</small>
                      </div>
                  </div><!-- media -->
              </li>

              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/pro-ac-1.png" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-success">5</span>
                          </div>
                          <strong>Jane Doe</strong>
                          <small>ABC, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/avatar1.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <strong>Anjelina Joli</strong>
                          <small>Fockland, UK</small>
                      </div>
                  </div><!-- media -->
              </li>
              <li class="online">
                  <div class="media">
                      <a href="#" class="pull-left media-thumb">
                          <img alt="" src="img/mail-avatar.jpg" class="media-object">
                      </a>
                      <div class="media-body">
                          <div class="media-status">
                              <span class=" badge bg-warning">7</span>
                          </div>
                          <strong>Mr Tasi</strong>
                          <small>Dream Land, USA</small>
                      </div>
                  </div><!-- media -->
              </li>
          </ul>
          <h5 class="side-title"> pending Task</h5>
          <ul class="p-task tasks-bar">
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">40%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40" role="progressbar" class="progress-bar progress-bar-success">
                              <span class="sr-only">40% Complete (success)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Database Update</div>
                          <div class="percent">60%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar progress-bar-warning">
                              <span class="sr-only">60% Complete (warning)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Iphone Development</div>
                          <div class="percent">87%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                              <span class="sr-only">87% Complete</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Mobile App</div>
                          <div class="percent">33%</div>
                      </div>
                      <div class="progress progress-striped">
                          <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80" role="progressbar" class="progress-bar progress-bar-danger">
                              <span class="sr-only">33% Complete (danger)</span>
                          </div>
                      </div>
                  </a>
              </li>
              <li>
                  <a href="#">
                      <div class="task-info">
                          <div class="desc">Dashboard v1.3</div>
                          <div class="percent">45%</div>
                      </div>
                      <div class="progress progress-striped active">
                          <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45" role="progressbar" class="progress-bar">
                              <span class="sr-only">45% Complete</span>
                          </div>
                      </div>

                  </a>
              </li>
              <li class="external">
                  <a href="#">See All Tasks</a>
              </li>
          </ul>
      </div>
      <!-- Right Slidebar end -->

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2013 &copy; FlatLab by VectorLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>
    <script src="js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/count.js"></script>
    <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
