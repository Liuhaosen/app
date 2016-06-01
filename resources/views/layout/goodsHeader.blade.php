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
					<a href="#"><i class="fa fa-angle-right"></i>About Us</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-angle-right"></i>Contact Us</a>
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
						<a class="dropdown" onclick="location.href=this.href" href="/goods/list?cate={{$v->id}}">
							{{$v->name}}
							<i class="fa fa-angle-down"></i>
						</a>
							@if($v->subs)
					<ul class="dropdown-menu">							
					@foreach($v->subs as $a=>$b)
							<li class="dropdown-submenu">
								<a href="/goods/list?cate={{$b->id}}" onclick="location.href=this.href" >{{$b->name}}</a>
									@if($b->subs)
									<ul class="dropdown-menu">
										@foreach($b->subs as $c=>$d)		
										<li><a href="/goods/list?cate={{$d->id}}">{{$d->name}}</a></li>
										
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