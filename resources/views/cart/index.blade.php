@extends('layout.list')

@section('title','购物车')

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
				<h2>购物车</h2>
			</div>
		</div>
	</div>
</section>	
@endsection

@section('content')
<div class="col-md-12">

	<div class="row featured-boxes">
		<div class="col-md-12">
			<div class="featured-box featured-box-secundary featured-box-cart">
				<div class="box-content">
					<form method="post" action="/order/insert">
						<table cellspacing="0" class="shop_table cart">
							<thead>
								<tr>
									<th class="product-remove">
										&nbsp;
									</th>
									<th class="product-thumbnail">
										&nbsp;
									</th>
									<th class="product-name">
										商品名称
									</th>
									<th class="product-price">
										价格
									</th>
									<th class="product-quantity">
										数量
									</th>
									<th class="product-subtotal">
										小计
									</th>
								</tr>
							</thead>
							<tbody>
							@foreach($goods as $k=>$v)
								<tr class="cart_table_item">
									<td class="product-remove">
										<a title="Remove this item" class="remove" href="/cart/delete?id={{$v->id}}">
											<i class="fa fa-times"></i>
										</a>
									</td>
									<td class="product-thumbnail">
										<a href="/goods-{{$v->id}}">
											<img width="100" height="100" alt="" class="img-responsive" src="{{$v->pic}}">
										</a>
									</td>
									<td class="product-name">
										<a href="/goods-{{$v->id}}">{{$v->title}}</a>
									</td>
									<td class="product-price">
										<span class="amount" id="price">{{$v->price}}</span>元
									</td>
									<td id="pnum" class="product-quantity">							
											<div class="quantity">
												<input type="hidden" name="goods[{{$k}}][id]" value="{{$v->id}}">
												<input type="button" class="minus" value="-">
												
												<input type="text" class="input-text qty text" title="Qty" value="{{$v->num}}" name="goods[{{$k}}][num]" min="1" step="1" id="kucun" kucun="{{$v->kucun}}">
												<input type="button" class="plus" value="+" >
											</div>
									</td>
									<td class="product-subtotal">
										<span class="amount" id="total">{{$v->price*$v->num}}</span>元
									</td>
								</tr>
							@endforeach
								<tr>
									<td class="actions" colspan="6">
										<div class="actions-continue">
										{{csrf_field()}}

											<input type="submit" value="创建订单" class="btn btn-default">
									
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection

@section('js')
<script type="text/javascript">	
	//点击数量增加
	$('.plus').click(function(){
		var num = parseInt($(this).prev().val());
		
		var newNum = ++num;	
		var kucun =$(this).siblings('#kucun').attr('kucun');
		var total = parseInt($(this).parents('#pnum').next().find('#total').html());
		var price = parseInt($(this).parents('#pnum').prev().find('#price').html());

		//重新设值
		if(newNum>kucun){
			$(this).prev().val(kucun);
			
		}else{
			$(this).prev().val(newNum);
			$(this).parents('#pnum').next().html(price*newNum);
		}
		
		
	})
	//点击数量减少
	$('.minus').click(function(){
		var num1 = parseInt($(this).next().val());
		var newNum1 = --num1;
		var total1 = parseInt($(this).parents('#pnum').next().find('#total').html());
		var price1 = parseInt($(this).parents('#pnum').prev().find('#price').html());
		//重新设值
		if(newNum1<1){
			$(this).next().val(1);
		}else{
			$(this).next().val(newNum1);
			$(this).parents('#pnum').next().html(price1*newNum1);
		}
		
	})

	//小计随着数量增加而动态改变
	
	//点击删除商品
	
</script>
@endsection

