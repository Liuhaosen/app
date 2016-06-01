@extends('layout.list')

@section('title','商品详情')
@section('top')
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="#">首页</a></li>
					<li class="active">商城</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>商品详情</h2>
			</div>
		</div>
	</div>
</section>
@endsection

@section('content')
<div class="col-md-9">

	<div class="row">
		<div class="col-md-6">

			<div class="owl-carousel" data-plugin-options='{"items": 1, "autoHeight": true}'>
				<div>
					<div class="thumbnail">
						<div class="col-md-3" style="width:100px;height:100px;display: none"></div>
						<img alt="" class="img-responsive img-rounded" src="{{$goods->pic}}">
					</div>
					
				</div>
			</div>

		</div>
	
		<div class="col-md-6">

			<div class="summary entry-summary">

				<h2 class="shorter"><strong>{{$goods->title}}</strong></h2>

				<div class="review_num">
					<span class="count" itemprop="ratingCount">2</span>
				</div>

				<div title="Rated 5.00 out of 5" class="star-rating">
					<span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
				</div>

				<p class="price">
					<span class="amount">￥{{$goods->price}}</span>
				</p>
				<form enctype="multipart/form-data" method="post" action="/cart/insert" class="cart">
					<div class="quantity">
						<input type="button" class="minus" value="-">
						<input type="text" class="input-text qty text" title="Qty" value="1" name="num" min="1" step="1">
						<input type="button" class="plus" value="+">
					</div>
					{{csrf_field()}}
					<input type="hidden" name="id" value="{{$goods->id}}">
					<button class="btn btn-primary btn-icon">加入购物车</button>
				</form>
				<div class="product_meta" style="margin-top:10px">
					<a rel="tag" href="/cart/index">前往购物车结算</a>
				</div>
				<div class="product_meta" style="margin-top:10px">
					<span class="posted_in">库存剩余:　{{$goods->kucun}}件</span>
				</div>
				<div class="product_meta" style="margin-top:10px">
					<span class="posted_in">相关分类:<a rel="tag" href="#">{{$goods->name}}</a></span>
				</div>
			</div>


		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="tabs tabs-product">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#productDescription" data-toggle="tab">商品描述</a></li>
					<li><a href="#productInfo" data-toggle="tab">详细参数</a></li>
					<li><a href="#productReviews" data-toggle="tab">评论(2)</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="productDescription">
						<p>{!!$goods->content!!}</p>
					</div>
					<div class="tab-pane" id="productInfo">
						<table class="table table-striped push-top">
							<tbody>
								<tr>
									<th>
										尺寸:
									</th>
									<td>
										{{$goods->size}}
									</td>
								</tr>
								<tr>
									<th>
										颜色:
									</th>
									<td>
										{{$goods->color}}
									</td>
								</tr>
								<tr>
									<th>
										材质
									</th>
									<td>
										???
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="productReviews">
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
												<div title="Rated 5.00 out of 5" class="star-rating">
													<span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
												</div>
											</span>
										</span>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim ornare nisi, vitae mattis nulla ante id dui.</p>
									</div>
								</div>
							</li>
						</ul>
						<hr class="tall">
						<h4>Add a review</h4>
						<div class="row">
							<div class="col-md-12">

								<form action="" id="submitReview" method="post">
									<div class="row">
										<div class="form-group">
											<div class="col-md-6">
												<label>Your name *</label>
												<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name">
											</div>
											<div class="col-md-6">
												<label>Your email address *</label>
												<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Review *</label>
												<textarea maxlength="5000" data-msg-required="Please enter your message." rows="10" class="form-control" name="message" id="message"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Submit Review" class="btn btn-primary" data-loading-text="Loading...">
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr class="tall" />

	<div class="row">

		<div class="col-md-12">
			<h2>相关<strong>商品</strong></h2>
		</div>

		<ul class="products product-thumb-info-list">
		@foreach($relateGoods as $k =>$v)
			<li class="col-sm-3 col-xs-12 product">
				<a href="shop-product-sidebar.html">
					<span class="onsale">特卖!</span>
				</a>
				<span class="product-thumb-info">
					<a href="shop-cart.html" class="add-to-cart-product">
						<span><i class="fa fa-shopping-cart"></i>加入购物车</span>
					</a>
					<a href="/goods-{{$v->id}}">
						<span class="product-thumb-info-image">
							<span class="product-thumb-info-act">
								<span class="product-thumb-info-act-left"><em>点击 </em></span>
								<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> 查看</em></span>
							</span>
							<img alt="" class="img-responsive" src="{{$v->pic}}">
						</span>
					</a>
					<span class="product-thumb-info-content">
						<a href="/goods-{{$v->id}}">
							<h4>{{$v->title}}</h4>
							<span class="price">
								<del><span class="amount">￥{{$v->price}}</span></del>
								<ins><span class="amount">￥{{($v->price)*0.6}}</span></ins>
							</span>
						</a>
					</span>
				</span>
			</li>
		@endforeach
			</li>
		</ul>
	</div>

</div>
@endsection

@section('slider')
<!-- 侧边栏 -->
{!!\App\Http\Controllers\LayoutController::goodsSlider()!!}
<!-- 侧边栏结束 -->
@endsection

@section('js')
<script type="text/javascript">	
	//点击数量增加
	$('.plus').click(function(){
		var num = parseInt($('input[name=num]').val());
		var newNum = ++num;	
		//重新设置
		if(newNum>={{$goods->kucun}}){
			$('input[name=num]').val({{$goods->kucun}});
		}else{
			$('input[name=num]').val(newNum);	
			}
		
	})
	//点击数量减少
	$('.minus').click(function(){
		var num1 = parseInt($('input[name=num]').val());
		var newNum1 = --num1;	
		//重新设置
		if(newNum1<=1){
			$('input[name=num]').val(1);
		}else{
			$('input[name=num]').val(newNum1);
		}
		
	})

	//设置鼠标移入大图显示
	
</script>
@endsection