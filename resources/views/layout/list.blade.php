<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>{{config('app.webname')}} - @yield('title')</title>		
		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="/l/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="/l/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="/l/vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="/l/vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="/l/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="/l/css/theme.css">
		<link rel="stylesheet" href="/l/css/theme-elements.css">
		<link rel="stylesheet" href="/l/css/theme-blog.css">
		<link rel="stylesheet" href="/l/css/theme-shop.css">
		<link rel="stylesheet" href="/l/css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="/l/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="/l/css/custom.css">

		<!-- Head Libs -->
		<script src="/l/vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="/l/css/my.css">
	</head>
	<body>

		<div class="body">
			@section('header')
				
			@show
			<div role="main" class="main">
			@section('top')
		
			@show
				<div class="container shop">
					
					<div class="row">
					
					@section('content')
					<!-- 内容区 -->
					
					<!-- 内容区结束 -->
					@show   
					
					@section('slider')
					<!-- 侧边栏 -->
					
					<!-- 侧边栏结束 -->
					@show
					</div>

				</div>

			</div>
			@section('footer')
			<footer id="footer" style="padding:0px;">
			
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" class="img-responsive" src="/l/img/logo-footer.png">
								</a>
							</div>
							<div class="col-md-7">
								<p>© Copyright 2014. All Rights Reserved.</p>
							</div>
							<div class="col-md-4">
								<nav id="sub-menu">
									<ul>
										<li><a href="page-faq.html">FAQ's</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
										<li><a href="contact-us.html">Contact</a></li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
			</footer>
			@show
		</div>

		<!-- Vendor -->
		<script src="/l/vendor/jquery/jquery.js"></script>
		<script src="/l/vendor/jquery.appear/jquery.appear.js"></script>
		<script src="/l/vendor/jquery.easing/jquery.easing.js"></script>
		<script src="/l/vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="/l/vendor/bootstrap/bootstrap.js"></script>
		<script src="/l/vendor/common/common.js"></script>
		<script src="/l/vendor/jquery.validation/jquery.validation.js"></script>
		<script src="/l/vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="/l/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="/l/vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="/l/vendor/twitterjs/twitter.js"></script>
		<script src="/l/vendor/isotope/jquery.isotope.js"></script>
		<script src="/l/vendor/owlcarousel/owl.carousel.js"></script>
		<script src="/l/vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="/l/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="/l/vendor/vide/vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="/l/js/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="/l/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="/l/js/theme.init.js"></script>

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);
		
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
		 -->
  									
		@if(session('info'))	
		<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
			  <div class="modal-dialog modal-sm">
			  <div class="modal-header" style="background-color:white">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="exampleModalLabel">状态</h4>
			      </div>
			    <div class="modal-content">
			      
			      <p class="bg-info" style="padding:20px">{{session('info')}}</p>
			    </div>
			  </div>
			</div>
		</div>

		<script type="text/javascript">
			$('.modal').modal();
		</script>
		@endif
		@section('js')
		@show
	</body>
</html>
