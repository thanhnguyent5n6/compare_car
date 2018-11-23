<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="{{ route('admin.index') }}">
                          <i class="fa fa-dashboard"></i>
                          <span>Trang chủ</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{ route('cars.index') }}">
                          <i class="fas fa-car"></i>
                          
                          <span>Thông số xe</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{ route('category-cars.index') }}">
                          <i class="fa fa-th"></i>
                          <span>Hãng xe</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{ route('style-cars.index') }}">
                          <i class="fas fa-train"></i>
                          <span>Dáng xe</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="server/qlbaiviet.html">
                          <i class="fas fa-newspaper"></i>
                          <span>Chuyên gia đánh giá</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="server/qlbaiviet.html"> 
                        <i class="fas fa-comments"></i>
                          <span>Người dùng đánh giá</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="server/qlbaiviet.html"> 
                       <i class="fas fa-user"></i>
                          <span>Quản lý thành viên</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="{{ route('admin.crawl') }}">
                          <i class="fas fa-address-card"></i>
                          <span>Lấy dữ liệu</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>