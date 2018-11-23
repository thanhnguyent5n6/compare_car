<header>
			<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<ul class="topleft-info">
								<li><i class="fa fa-phone"></i> +62 088 999 123</li>
							</ul>
						</div>
						<div class="col-md-6">
						<div id="sb-search" class="sb-search">
							<form>
								<input class="sb-search-input" placeholder="Nhập từ khóa tìm kiếm..." type="text" value="" name="search" id="search">
								<input class="sb-search-submit" type="submit" value="">
								<span class="sb-icon-search" title="Click to start searching"></span>
							</form>
						</div>


						</div>
					</div>
				</div>
			</div>	
			
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="client/index.html"><img src="client/img/logo.png" alt="" width="199" height="52" /></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li>
							<a href="{{ route('home') }}">Trang chủ</a>			
						
						</li>
                        <li class="dropdown">
                            <a href="client/#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Hãng xe <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                            	@foreach($hang_xe as $h)
                                <li><a href="{{ route('view.category',$h->category_cars_id) }}">{{ $h->category_cars_name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        
                        <li class="dropdown"><a href="client/#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Dáng xe <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
								@foreach($dang_xe as $d)
                                <li><a href="{{ route('view.style',$d->style_cars_id) }}">{{ $d->style_cars_name }}</a></li>
                                @endforeach
                            </ul>
						</li>
						<li class="dropdown"><a href="client/#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Đánh giá xe <i class="fa fa-angle-down"></i></a>
							<ul class="dropdown-menu">
                                <li><a href="client/blog-rightsidebar.html">Đánh giá của chuyên gia</a></li>
                                <li><a href="client/blog-rightsidebar.html">Người dùng đánh giá</a></li>
                            </ul>
						</li>
                        <li><a href="{{ route('view.compare') }}">So sánh thông số</a></li>
                    </ul>
                </div>
            </div>
        </div>
	</header>