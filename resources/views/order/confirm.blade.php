@extends('layout.list')

@section('title','订单确认')

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
				<h2>订单确认</h2>
			</div>
		</div>
	</div>
</section>	
@endsection

@section('content')
<div class="col-md-12">
	<h3>收货地址</h3>
		<div style="margin:20px">{{$order->address_id}}</div>
	<h3>支付方式</h3>
		<div style="margin:20px">{{$request->input('pay')}}</div>
	<h3>商品信息</h3>
		<div id="goods" style="margin:20px">
			@foreach($goods as $k=>$v)
			<div class="col-md-3" style="margin:20px">
				<h4>标题:
					<div>{{$v->title}}</div>
				</h4>
			</div>
			@endforeach
		</div>
</div>
@endsection