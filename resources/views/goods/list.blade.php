@extends('layout.list')

@section('title','商品列表')
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
				<h2>商品列表</h2>
			</div>
		</div>
	</div>
</section>
@endsection
@section('header')
{!!\App\Http\Controllers\LayoutController::goodsHeader()!!}
@endsection


@section('content')
<div class="col-md-9">

	<div class="row">

	</div>

	<div class="row">

		<ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
		@foreach($goods as $k=>$v)
			<li class="col-md-4 col-sm-6 col-xs-12 product">
				<a href="#">
					<span class="onsale">特卖!</span>
				</a>
				<span class="product-thumb-info">

					<a href="/goods-{{$v->id}}">
						<span class="product-thumb-info-image">
							<span class="product-thumb-info-act">
								<span class="product-thumb-info-act-left"><em>点击</em></span>
								<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i>查看</em></span>
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
		</ul>
	</div>

	<div class="row">
		<div class="col-md-12">
			<ul class="pagination ">
			{!!$goods->appends($request)->render()!!}
			</ul>
		</div>
	</div>
</div>
@endsection

@section('slider')
<!-- 侧边栏 -->
{!!\App\Http\Controllers\LayoutController::goodsSlider()!!}
<!-- 侧边栏结束 -->
@endsection

