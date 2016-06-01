@extends('layout.list')

@section('title','订单')

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
				<h2>订单管理</h2>
			</div>
		</div>
	</div>
</section>	
@endsection

@section('content')
<form action="/order/create" method="post">
<h3>收货地址 　<a data-toggle="modal" data-target="#myModal" style="font-size:14px;cursor:pointer">添加收货地址</a></h3>

<div class="col-md-12" id = "addresses">
@foreach($addresses as $k=>$v)
	<div class="col-md-2 item" addrid="{{$v->id}}">
		<h5>收货人:<span>{{$v->name}}</span></h5>
		<p>地址:<span class = "addr" aid="{{$v->sheng}},{{$v->shi}},{{$v->xian}}">xxx xxx xxx</span>{{$v->jiedao}}</p>
	</div>
@endforeach
</div>
<div style="clear:both"></div>
<h3 style="margin-top:20px">选择付款方式</h3>
<div class="col-md-12">
	<input type="radio" value="支付宝" name="pay">支付宝
	<input type="radio" value="财付通" name="pay">财付通
	<input type="radio" value="银联支付" name="pay">银联支付
	<input type="radio" value="high" name="pay">小High支付
</div>
<div style="clear:both"></div>
{{csrf_field()}}
<input type="hidden" name="address_id" value="">
<button class="btn btn-primary" style="margin-top:50px;margin-left:10px">点击提交</button>
</form>
<!-- Modal -->
<script type="text/javascript" src="/l/js/jquery.js"></script>
<script type="text/javascript" src="/l/js/area.js"></script>
<script type="text/javascript" src="/l/js/location.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<form role="form" action="/address/insert" method="post">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        		<h4 class="modal-title" id="myModalLabel">添加收货地址</h4>
	      	</div>
	      	<div class="modal-body">
	       		
					  <div class="form-group">
					    	<label for="exampleInputEmail1">收件人</label>
					    		<input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="收件人姓名">
					  </div>
					  <div class="form-group">
					    	<label for="exampleInputPassword1">手机号</label>
					    	<input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="手机号">
					  </div>
					  		<select id="loc_province" name="sheng" style="width:80px;"></select>
							<select id="loc_city" name="shi" style="width:100px;"></select>
							<select id="loc_town" name="xian" style="width:120px;"></select>
					  <div class="form-group" style="margin-top:10px">
					    	<label for="exampleInputPassword1">街道信息</label>
					    	<input type="textarea" class="form-control" name="jiedao" placeholder="详细街道地址">
					  </div>
					  <div class="checkbox">
					    	<label>
					      	<input type="checkbox" name="isdefault" value="1">选中默认
					    	</label>
					  </div>				
		      	</div>
		      	<div class="modal-footer">
		      		{{csrf_field()}}

		        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		        	<button type="submit" class="btn btn-primary">提交</button>
		      	</div>
		    </div><!-- /.modal-content -->
	    </form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
$(document).ready(function() {
	showLocation();
	//通过数字id来显示省市县
	$('.addr').each(function(){
		//获取当前元素aid属性
		var aid = $(this).attr('aid');
		//通过封装好的函数来获取名称
		var names = getAddressStr(aid);
		$(this).html(names);
	})

	function getAddressStr(aid)
	{
		//拆分数字字符串
		var arr = aid.split(',');
		var location = new Location;
		var ls = location.items;//所有的地址的一个对象
		console.log(arr);
		var sheng = ls['0'][arr[0]];
		var shi = ls['0,'+arr[0]][arr[1]];
		var xian = ls ['0,'+arr[0]+','+arr[1]][arr[2]];

		return sheng+' '+shi+' '+xian+' ';
	}

	//给地址元素绑定单击事件
	$('#addresses .item').click(function(){
		//去除同辈元素中的active类
		$(this).siblings().removeClass('active');
		//给自己添加active类
		$(this).addClass('active');
		//获取正点击的aid
		var id = $(this).attr('addrid');
		//设置value
		$('input[name=address_id]').val(id);
	})



});
</script>
@endsection