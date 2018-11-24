<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>So sánh và đánh giá</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<base href="{{ asset('') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Bootstrap 3 template for corporate business" />
<meta name="author" content="http://iweb-studio.com" />
<!-- css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link href="client/css/bootstrap.min.css" rel="stylesheet" />
<link href="client/plugins/flexslider/flexslider.css" rel="stylesheet" media="screen" />	
<link href="client/css/cubeportfolio.min.css" rel="stylesheet" />
<link href="client/css/style.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://fontawesome.com/icons/eye?style=solid">

<!-- Theme skin -->
<link id="t-colors" href="client/skins/default.css" rel="stylesheet" />

	<!-- boxed bg -->
	<link id="bodybg" href="client/bodybg/bg1.css" rel="stylesheet" type="text/css" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="client/http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>



<div id="wrapper">
	<!-- start header -->
	@include('client.header')
	<!-- end header -->
	<section id="featured" class="bg">
	<!-- start slider -->

			
	<!-- start slider -->
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
    @include('client.slide')
	<!-- end slider -->
			</div>
		</div>
	</div>	


	</section>
	
	
	@yield('content')
	
	<footer>
	@include('client.footer')
	</footer>
</div>
<a href="client/#" class="scrollup"><i class="fa fa-angle-up active"></i></a>

<!-- Placed at the end of the document so the pages load faster -->
<script src="client/js/jquery.min.js"></script>
<script src="client/js/modernizr.custom.js"></script>
<script src="client/js/jquery.easing.1.3.js"></script>
<script src="client/js/bootstrap.min.js"></script>
<script src="client/plugins/flexslider/jquery.flexslider-min.js"></script> 
<script src="client/plugins/flexslider/flexslider.config.js"></script>
<script src="client/js/jquery.appear.js"></script>
<script src="client/js/stellar.js"></script>
<script src="client/js/classie.js"></script>
<script src="client/js/uisearch.js"></script>
<script src="client/js/jquery.cubeportfolio.min.js"></script>
<script src="client/js/google-code-prettify/prettify.js"></script>
<script src="client/js/animate.js"></script>
<script src="client/js/custom.js"></script>

	
</body>
</html>