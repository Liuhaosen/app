<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>{{config('app.webname')}} - 博客文章-{{$arcs->title}}</title>		
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
			<header id="header">
				<div class="container">
					<h1 class="logo">
						<a href="index.html">
							<img alt="Porto" width="111" height="54" data-sticky-width="82" data-sticky-height="40" src="/l/img/logo.png">
						</a>
					</h1>
					<div class="search">
						<form id="searchForm" action="page-search-results.html" method="get">
							<div class="input-group">
								<input type="text" class="form-control search" name="q" id="q" placeholder="Search..." required>
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
								</span>
							</div>
						</form>
					</div>
					<nav>
						<ul class="nav nav-pills nav-top">
							<li>
								<a href="about-us.html"><i class="fa fa-angle-right"></i>About Us</a>
							</li>
							<li>
								<a href="contact-us.html"><i class="fa fa-angle-right"></i>Contact Us</a>
							</li>
							<li class="phone">
								<span><i class="fa fa-phone"></i>(123) 456-7890</span>
							</li>
						</ul>
					</nav>
					<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>
				<div class="navbar-collapse nav-main-collapse collapse">
					<div class="container">
					
						<nav class="nav-main mega-menu">
							<ul class="nav nav-pills nav-main" id="mainMenu">
							@foreach($allCates as $k=>$v)
								<li class="dropdown">
									<a class="dropdown" href="/list?cate={{$v->id}}">
										{{$v->name}}
										<i class="fa fa-angle-down"></i>
									</a>
										@if($v->subs)
								<ul class="dropdown-menu">							
								@foreach($v->subs as $a=>$b)
										<li class="dropdown-submenu">
											<a href="/list?cate={{$b->id}}">{{$b->name}}</a>
												@if($b->subs)
												<ul class="dropdown-menu">
													@foreach($b->subs as $c=>$d)		
													<li><a href="/list?cate={{$d->id}}">{{$d->name}}</a></li>
													
													@endforeach
												</ul>
												@endif
										</li>
								@endforeach	
								</ul>
									@endif
								</li>
							@endforeach
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<div role="main" class="main">

				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Blog</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>博客</h2>
							</div>
						</div>
					</div>
				</section>
	@section('header')
	{!!\App\Http\Controllers\LayoutController::header()!!}
	@endsection

				<div class="container">
					
					<div class="row">
					@section('content')
					<!-- 内容区 -->
						<div class="col-md-9">
							<div class="blog-posts single-post">

								<article class="post post-large blog-single-post">
									<div class="post-image">
										<div class="owl-carousel" data-plugin-options='{"items":1}'>
											<div>
												<div class="img-thumbnail">
													<img class="img-responsive" src="{{$arcs->pic}}" alt="">
												</div>
											</div>
											
										</div>
									</div>

									<div class="post-date">
										<span class="day">{{substr($arcs->create_at,8,2)}}</span>
										<span class="month">{{substr($arcs->create_at,5,2)}}月</span>
									</div>

									<div class="post-content">

										<h2><a href="#">{{$arcs->title}}</a></h2>

										<div class="post-meta">
											<span><i class="fa fa-user"></i> By <a href="/list?user={{$arcs->user_id}}">{{$arcs->username}}</a> </span>
											<span><i class="fa fa-tag"></i><a href="/list?name={{$arcs->name}}">{{$arcs->name}}</a> </span>
											<span><i class="fa fa-comments"></i> <a href="#">{{getTotalComment($arcs->id)}}</a></span>
										</div>

										{!!$arcs->content!!}


										<div class="post-block post-comments clearfix">
											<h3><i class="fa fa-comments"></i>评论</h3>
											<ul class="comments">
											@foreach($comments as $k=>$v)
												<li>
													<div class="comment">
														<div class="img-thumbnail">
															<img class="avatar" alt="" src="/l/img/avatar-2.jpg">
														</div>	
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>{{$v->username}}</strong>
																<span class="pull-right">
																	
																</span>
															</span>
															<p>{!!$v->content!!}</p>
															<span class="date pull-right">5月20日</span>
														</div>				
													</div>
												</li>
											@endforeach										
											</ul>
										</div>
										<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.config.js"></script>
    									<script type="text/javascript" charset="utf-8" src="/b/ueditor/ueditor.all.min.js"> </script>
									    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
									    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
									    <script type="text/javascript" charset="utf-8" src="/b/ueditor/lang/zh-cn/zh-cn.js"></script>
									  

									  
										<div class="post-block post-leave-comment">
											<h3>回复文章</h3>
											<form method="post" action="{{url('/comment/insert')}}">											
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
													
																<script id="editor" type="text/plain" name="content" style="width:500px;height:300px;"></script>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-12">
														{{csrf_field()}}
														<input type="hidden" name="article_id" value="{{$arcs->id}}">
														<input type="submit" data-loading-text="Loading..." class="btn btn-primary btn-lg" value="提交回复">
														
													</div>
												</div>
											</form>
										<!-- Small modal -->
									
										<script type="text/javascript">
											var ue = UE.getEditor('editor',{
												toolbars: [
													    ['fullscreen', 'source', 'undo', 'redo', 'bold']
													]
												});

										</script>
									</div>
								</article>

							</div>
						</div>
					<!-- 内容区结束 -->
					@show   
					
					@section('slider')
					<!-- 侧边栏 -->
						<div class="col-md-3">
							<aside class="sidebar">

								<form>
									<div class="input-group input-group-lg">
										<input class="form-control" placeholder="Search..." name="s" id="s" type="text">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
										</span>
									</div>
								</form>

								<hr />

								<h4>分类</h4>
								<ul class="nav nav-list primary push-bottom">
								@foreach($cates as $k=>$v)
									<li><a href="/list?cate={{$v->id}}">{{$v->name}}</a></li>
								@endforeach	
								</ul>

								<div class="tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> 热门</a></li>
										<li><a href="#recentPosts" data-toggle="tab">最近</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="popularPosts">
											<ul class="simple-post-list">
											@foreach($recs as $k =>$v)
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="/post-{{$v->id}}">
																<img src="{{$v->pic}}" alt="" width="50">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="/post-{{$v->id}}">{!!$v->title!!}</a>
														<div class="post-meta">
															{{substr($v->create_at,0,10)}}
														</div>
													</div>
												</li>
											@endforeach()
											</ul>
										</div>
										<div class="tab-pane" id="recentPosts">
											<ul class="simple-post-list">
											@foreach($recent as $k=>$v)
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="/post-{{$v->id}}">
																<img src="{{$v->pic}}" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="/post-{{$v->id}}">{!!$v->title!!}</a>
														<div class="post-meta">
															 {{substr($v->create_at,0,10)}}
														</div>
													</div>
												</li>
											@endforeach
											</ul>
										</div>
									</div>
								</div>

								<hr />

							
							</aside>
						</div>
					<!-- 侧边栏结束 -->
					@show
					</div>

				</div>

			</div>

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
	</body>
</html>
