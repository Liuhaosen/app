<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>{{config('app.webname')}} - {{$arcs->title}}</title>		
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
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Home
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li class="dropdown-submenu">
											<a href="#">Sliders</a>
											<ul class="dropdown-menu">
												<li><a href="index.html">Revolution Slider</a></li>
												<li><a href="index-slider-2.html">Nivo Slider</a></li>
											</ul>
										</li>
										<li><a href="index.html">Home - Default</a></li>
										<li><a href="index-2.html">Home - Color</a></li>
										<li><a href="index-3.html">Home - Light</a></li>
										<li><a href="index-4.html">Home - Video</a></li>
										<li><a href="index-5.html">Home - Video - Light</a></li>
										<li><a href="index-one-page.html">One Page Website</a></li>
									</ul>
								</li>
								<li>
									<a href="shortcodes.html">Shortcodes</a>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										About Us
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li><a href="about-us.html">About Us</a></li>
										<li><a href="about-us-basic.html">About Us - Basic</a></li>
										<li><a href="about-me.html">About Me</a></li>
									</ul>
								</li>
								<li class="dropdown mega-menu-item mega-menu-fullwidth">
									<a class="dropdown-toggle" href="#">
										Features
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li>
											<div class="mega-menu-content">
												<div class="row">
													<div class="col-md-3">
														<ul class="sub-menu">
															<li>
																<span class="mega-menu-sub-title">Main Features</span>
																<ul class="sub-menu">
																	<li><a href="feature-pricing-tables.html">Pricing Tables</a></li>
																	<li><a href="feature-icons.html">Icons</a></li>
																	<li><a href="feature-animations.html">Animations</a></li>
																	<li><a href="feature-typography.html">Typography</a></li>
																	<li><a href="feature-grid-system.html">Grid System</a></li>
																</ul>
															</li>
														</ul>
													</div>
													<div class="col-md-3">
														<ul class="sub-menu">
															<li>
																<span class="mega-menu-sub-title">Headers</span>
																<ul class="sub-menu">
																	<li><a href="index-header-2.html">Header Version 2</a></li>
																	<li><a href="index-header-3.html">Header Version 3</a></li>
																	<li><a href="index-header-4.html">Header Version 4</a></li>
																	<li><a href="index-header-5.html">Header Version 5</a></li>
																	<li><a href="index-header-6.html">Header Version 6</a></li>
																	<li><a href="index-header-7.html">Header Version 7 (Below Slider)</a></li>
																	<li><a href="index-header-8.html">Header Version 8 (Full Video)</a></li>
																	<li><a href="index-header-signin.html">Header - Sign In / Sign Up</a></li>
																	<li><a href="index-header-logged.html">Header - Logged</a></li>
																</ul>
															</li>
														</ul>
													</div>
													<div class="col-md-3">
														<ul class="sub-menu">
															<li>
																<span class="mega-menu-sub-title">Footers</span>
																<ul class="sub-menu">
																	<li><a href="index.html#footer">Footer Version 1</a></li>
																	<li><a href="index-footer-2.html#footer">Footer Version 2</a></li>
																	<li><a href="index-footer-3.html#footer">Footer Version 3</a></li>
																	<li><a href="index-footer-4.html#footer">Footer Version 4</a></li>
																</ul>
															</li>
														</ul>
													</div>
													<div class="col-md-3">
														<ul class="sub-menu">
															<li>
																<span class="mega-menu-sub-title">Admin Extension <em class="not-included">(Not Included)</em></span>
																<ul class="sub-menu">
																	<li><a href="feature-admin-forms-basic.html">Forms Basic</a></li>
																	<li><a href="feature-admin-forms-advanced.html">Forms Advanced</a></li>
																	<li><a href="feature-admin-forms-wizard.html">Forms Wizard</a></li>
																	<li><a href="feature-admin-forms-code-editor.html">Code Editor</a></li>
																	<li><a href="feature-admin-tables-advanced.html">Tables Advanced</a></li>
																	<li><a href="feature-admin-tables-responsive.html">Tables Responsive</a></li>
																	<li><a href="feature-admin-tables-editable.html">Tables Editable</a></li>
																	<li><a href="feature-admin-tables-ajax.html">Tables Ajax</a></li>
																	<li><a href="feature-admin-charts.html">Charts</a></li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Portfolio
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li><a href="portfolio-4-columns.html">4 Columns</a></li>
										<li><a href="portfolio-3-columns.html">3 Columns</a></li>
										<li><a href="portfolio-2-columns.html">2 Columns</a></li>
										<li><a href="portfolio-lightbox.html">Portfolio Lightbox</a></li>
										<li><a href="portfolio-timeline.html">Portfolio Timeline</a></li>
										<li><a href="portfolio-full-width.html">Portfolio Full Width</a></li>
										<li><a href="portfolio-single-project.html">Single Project</a></li>
									</ul>
								</li>
								<li class="dropdown active">
									<a class="dropdown-toggle" href="#">
										Pages
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li class="dropdown-submenu">
											<a href="#">Shop</a>
											<ul class="dropdown-menu">
												<li><a href="shop-full-width.html">Shop - Full Width</a></li>
												<li><a href="shop-sidebar.html">Shop - Sidebar</a></li>
												<li><a href="shop-product-full-width.html">Shop - Product Full Width</a></li>
												<li><a href="shop-product-sidebar.html">Shop - Product Sidebar</a></li>
												<li><a href="shop-cart.html">Shop - Cart</a></li>
												<li><a href="shop-login.html">Shop - Login</a></li>
												<li><a href="shop-checkout.html">Shop - Checkout</a></li>
											</ul>
										</li>
										<li class="dropdown-submenu">
											<a href="#">Blog</a>
											<ul class="dropdown-menu">
												<li><a href="blog-full-width.html">Blog Full Width</a></li>
												<li><a href="blog-large-image.html">Blog Large Image</a></li>
												<li><a href="blog-medium-image.html">Blog Medium Image</a></li>
												<li><a href="blog-timeline.html">Blog Timeline</a></li>
												<li><a href="blog-post.html">Single Post</a></li>
											</ul>
										</li>
										<li><a href="page-full-width.html">Full width</a></li>
										<li><a href="page-left-sidebar.html">Left sidebar</a></li>
										<li><a href="page-right-sidebar.html">Right sidebar</a></li>
										<li><a href="page-custom-header.html">Custom Header</a></li>
										<li><a href="page-404.html">404 Error</a></li>
										<li><a href="page-team.html">Team</a></li>
										<li><a href="page-services.html">Services</a></li>
										<li><a href="page-careers.html">Careers</a></li>
										<li><a href="page-faq.html">FAQ</a></li>
										<li><a href="page-login.html">Login / Register</a></li>
										<li><a href="sitemap.html">Sitemap</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a class="dropdown-toggle" href="#">
										Contact Us
										<i class="fa fa-angle-down"></i>
									</a>
									<ul class="dropdown-menu">
										<li><a href="contact-us.html">Contact Us - Basic</a></li>
										<li><a href="contact-us-advanced.php">Contact Us - Advanced</a></li>
									</ul>
								</li>
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

				<div class="container">

					<div class="row">
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

										<h2><a href="blog-post.html">{{$arcs->title}}</a></h2>

										<div class="post-meta">
											<span><i class="fa fa-user"></i> By <a href="#">{{$arcs->username}}</a> </span>
											<span><i class="fa fa-tag"></i><a href="{{url('/list?cate=25')}}">{{$arcs->name}}</a> </span>
											<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
										</div>

										{!!$arcs->content!!}


									

										<div class="post-block post-author clearfix">
											<h3><i class="fa fa-user"></i>Author</h3>
											<div class="img-thumbnail">
												<a href="blog-post.html">
													<img src="/l/img/avatar.jpg" alt="">
												</a>
											</div>
											<p><strong class="name"><a href="#">John Doe</a></strong></p>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui. </p>
										</div>

										<div class="post-block post-comments clearfix">
											<h3><i class="fa fa-comments"></i>Comments (3)</h3>

											<ul class="comments">
												<li>
													<div class="comment">
														<div class="img-thumbnail">
															<img class="avatar" alt="" src="/l/img/avatar-2.jpg">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>John Doe</strong>
																<span class="pull-right">
																	<span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
															<span class="date pull-right">January 12, 2013 at 1:38 pm</span>
														</div>
													</div>

													<ul class="comments reply">
														<li>
															<div class="comment">
																<div class="img-thumbnail">
																	<img class="avatar" alt="" src="/l/img/avatar-3.jpg">
																</div>
																<div class="comment-block">
																	<div class="comment-arrow"></div>
																	<span class="comment-by">
																		<strong>John Doe</strong>
																		<span class="pull-right">
																			<span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span>
																		</span>
																	</span>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
																	<span class="date pull-right">January 12, 2013 at 1:38 pm</span>
																</div>
															</div>
														</li>
														<li>
															<div class="comment">
																<div class="img-thumbnail">
																	<img class="avatar" alt="" src="/l/img/avatar-4.jpg">
																</div>
																<div class="comment-block">
																	<div class="comment-arrow"></div>
																	<span class="comment-by">
																		<strong>John Doe</strong>
																		<span class="pull-right">
																			<span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span>
																		</span>
																	</span>
																	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
																	<span class="date pull-right">January 12, 2013 at 1:38 pm</span>
																</div>
															</div>
														</li>
													</ul>
												</li>
												<li>
													<div class="comment">
														<div class="img-thumbnail">
															<img class="avatar" alt="" src="/l/img/avatar.jpg">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>John Doe</strong>
																<span class="pull-right">
																	<span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															<span class="date pull-right">January 12, 2013 at 1:38 pm</span>
														</div>
													</div>
												</li>
												<li>
													<div class="comment">
														<div class="img-thumbnail">
															<img class="avatar" alt="" src="/l/img/avatar.jpg">
														</div>
														<div class="comment-block">
															<div class="comment-arrow"></div>
															<span class="comment-by">
																<strong>John Doe</strong>
																<span class="pull-right">
																	<span> <a href="#"><i class="fa fa-reply"></i> Reply</a></span>
																</span>
															</span>
															<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
															<span class="date pull-right">January 12, 2013 at 1:38 pm</span>
														</div>
													</div>
												</li>
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
				
										</div>
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

								<h4>Categories</h4>
								<ul class="nav nav-list primary push-bottom">
									<li><a href="#">Design</a></li>
									<li><a href="#">Photos</a></li>
									<li><a href="#">Videos</a></li>
									<li><a href="#">Lifestyle</a></li>
									<li><a href="#">Technology</a></li>
								</ul>

								<div class="tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#popularPosts" data-toggle="tab"><i class="fa fa-star"></i> 热门</a></li>
										<li><a href="#recentPosts" data-toggle="tab">最近</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="popularPosts">
											<ul class="simple-post-list">
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="blog-post.html">
																<img src="/l/img/blog/blog-thumb-1.jpg" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Jan 10, 2013
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="blog-post.html">
																<img src="/l/img/blog/blog-thumb-2.jpg" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Jan 10, 2013
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="blog-post.html">
																<img src="/l/img/blog/blog-thumb-3.jpg" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Odiosters Nullam Vitae</a>
														<div class="post-meta">
															 Jan 10, 2013
														</div>
													</div>
												</li>
											</ul>
										</div>
										<div class="tab-pane" id="recentPosts">
											<ul class="simple-post-list">
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="blog-post.html">
																<img src="/l/img/blog/blog-thumb-2.jpg" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Jan 10, 2013
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="blog-post.html">
																<img src="/l/img/blog/blog-thumb-3.jpg" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Odiosters Nullam Vitae</a>
														<div class="post-meta">
															 Jan 10, 2013
														</div>
													</div>
												</li>
												<li>
													<div class="post-image">
														<div class="img-thumbnail">
															<a href="blog-post.html">
																<img src="/l/img/blog/blog-thumb-1.jpg" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html">Nullam Vitae Nibh Un Odiosters</a>
														<div class="post-meta">
															 Jan 10, 2013
														</div>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>

								<hr />

								<h4>About Us</h4>
								<p>Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Nulla nunc dui, tristique in semper vel. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. </p>

							</aside>
						</div>
					</div>

				</div>

			</div>

			<footer id="footer" style="padding:0px">
			
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

	</body>
</html>
