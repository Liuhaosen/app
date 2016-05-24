@extends('login.register')

@section('title')
	重置密码
@endsection
	
@section('content')
	<div role="main" class="main">

				<section class="page-top">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<ul class="breadcrumb">
									<li><a href="#">Home</a></li>
									<li class="active">Pages</li>
								</ul>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<h2>重置</h2>
							</div>
						</div>
					</div>
				</section>

				<div class="container">

					<div class="row">
						<div class="col-md-12">

							<div class="row featured-boxes login">
								
								<div class="col-sm-6 col-sm-offset-3">
									<div class="featured-box featured-box-secundary default info-content">
										<div class="box-content">
											@if (count($errors) > 0)
											    <div class="alert alert-danger">
											        <ul>
											            @foreach ($errors->all() as $error)
											                <li>{{ $error }}</li>
											            @endforeach
											        </ul>
											    </div>
											@endif
											@if (session('error'))
											    <div class="alert alert-danger">
											        <ul>
											                <li>{{session('error')}}</li>						          
											        </ul>
											    </div>
											@endif

											<h4>登录</h4>
											<form action="{{url('/reset')}}" id="" method="post">
												
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
														
															<label>密码</label>
															<input type="password" name="password" value="" class="form-control input-lg">
														</div>
													
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<div class="col-md-12">
															<label>再次输入密码</label>
															<input type="password" name="repassword" value="" class="form-control input-lg">
														</div>
													
													</div>
												</div>								
												
										
												<div class="row">
													<div class="col-md-12">
														{{csrf_field()}}
														<input type="hidden" name="id" value="{{$user->id}}">
														<input type="hidden" name="token" value="{{$user->token}}">
														<input type="submit" value="提交重置" class="btn btn-primary pull-right push-bottom" data-loading-text="Loading...">
														
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
			
			</div>
@endsection