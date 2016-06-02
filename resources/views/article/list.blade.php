@extends('layout.list')

@section('title','文章列表')
@section('top')
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="/post-1">首页</a></li>
					<li class="active">博客</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>文章列表</h2>
			</div>
		</div>
	</div>
</section>
@endsection
@section('header')
{!!\App\Http\Controllers\LayoutController::header()!!}
@endsection
<div class="container">
					
	<div class="row">

@section('content')
<div class="col-md-9">
<article class="post post-medium">
	@foreach($arcs as $k=>$v)
		<div class="col-md-5">
			<div class="post-image">
				<div data-plugin-options="{&quot;items&quot;:1}" class="owl-carousel owl-theme owl-carousel-init" style="opacity: 1; display: block;">
					<div class="owl-wrapper-outer">
						<div class="owl-wrapper" style="width: 1344px; left: 0px; display: block;">		<div class="owl-item" style="width: 336px;">
								<div>
									<div class="img-thumbnail">
										<a href="/post-{{$v->id}}"><img alt="" src="{{$v->pic}}" class="img-responsive"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				<div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div></div></div>
			</div>
		</div>
		<div class="col-md-7">

			<div class="post-content">

				<h2><a href="/post-{{$v->id}}">{{$v->title}}</a></h2>
				<p>{{$v->descr}}[...]</p>

			</div>
		</div>


	<div class="row">
		<div class="col-md-12">
			<div class="post-meta">
				<span><i class="fa fa-calendar"></i>{{substr($v->create_at,0,10)}}</span>
				<span><i class="fa fa-user"></i> By <a href="/list?user={{$v->user_id}}">{{$v->username}}</a> </span>
				<span><i class="fa fa-tag"></i> <a href="/list?name={{$v->name}}">{{$v->name}}</a></span>
				<span><i class="fa fa-comments"></i> <a href="#">{{getTotalComment($v->id)}}评论</a></span>
				<a class="btn btn-xs btn-primary pull-right" href="{{'/post-'.$v->id}}">Read more...</a>
			</div>
		</div>
	</div>
	<hr>
	@endforeach
	<div class="pull-right">
	{!!$arcs->appends($request)->render()!!}
	</div>
</article>
</div>

@endsection


@section('slider')
<!-- 侧边栏 -->
{!!\App\Http\Controllers\LayoutController::articleSlider()!!}
<!-- 侧边栏结束 -->
@endsection
</div>
</div>
