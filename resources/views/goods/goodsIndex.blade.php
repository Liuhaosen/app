<!DOCTYPE html>
<html>
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <title>{{config('app.webname')}} - 商城</title>      
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
        <link rel="stylesheet" type="text/css" href="/l/css/index.css">
    
    </head>
    <body>

<div class="body" style="background:#DBEAF9">
@section('header')
    {!!\App\Http\Controllers\LayoutController::goodsHeader()!!}
@show
    <div role="main" class="main">
        <section class="page-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li><a href="/goods/index">首页</a></li>
                            <li class="active">商城</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2>欢迎来到我的商城</h2>
                    </div>
                </div>
            </div>
        </section>
            <div class="container shop">                   
                <div class="row">                    
                @section('content')
                <!-- 内容区 -->
                <div class="col-md-12" >

                    <div class="row">
                        <div class="col-md-12" id="md12" >
                            <ul class="images" >
                            @foreach($good as $a=>$b)
                                <li ><a href="/goods-{{$b->id}}"><img src="{{$b->pic}}" alt="" style="width:800px;height:600px"></a></li>
                             @endforeach  
                            </ul>
                            <ul class = "num">
                                <li class="item">1</li>
                                <li >2</li>
                                <li >3</li>
                                <li >4</li>
                                
                            </ul>
                            <div id="hot"><span>热门商品!</span></div>
                            <div class="but" id="prev"><</div>
                             <div class="but" id="next">></div>
                        </div> 
                    </div>
<div style="height:50px;margin-top:50px;line-height: 50px;"><span style="font-size:30px;color:black;width:800px;">请选择您要浏览的板块:</span></div>
    <div class="col-md-12" style=" ">
        <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>

         @foreach($goods as $k=>$v)        
            <li class="col-md-4 col-sm-6 col-xs-12 product">
                <a href="#">
                    <span class="onsale">端午!</span>
                </a>
                <span class="product-thumb-info">
               
                    <a href="/goods/list?cate={{$v->cid}}">
                        <span class="product-thumb-info-image">
                            <span class="product-thumb-info-act">
                                <span class="product-thumb-info-act-left"><em>点击</em></span>
                                <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i>查看</em></span>
                            </span>
                            <img alt="" class="img-responsive" src="{{$v->pic}}">
                        </span>
                    </a>
                    <span class="product-thumb-info-content">

                        <a href="/goods/list?cate={{$v->cid}}">                
                            <h4>{{$v->cname}}</h4>               
                        </a>
                    </span>
                </span>
            </li>
            @endforeach
        </ul>
    </div>

    

    <div class="row">

    </div>

    </div>

</div>
    <!-- 内容区结束 -->
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
<script src="/l/js/index.js"></script>

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
<script type="text/javascript" src="/l/js/jquery-1.8.3.min.js"></script>

@show
    </body>
</html>


