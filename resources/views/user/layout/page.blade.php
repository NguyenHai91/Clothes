<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap E-commerce Templates</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
	<base href="{{asset('')}}">
	<!--[if ie]><meta content='IE=8' http-equiv='X-UA-Compatible'/><![endif]-->
	<!-- bootstrap -->
	<link href="user/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
	<link href="user/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">

	<link href="user/themes/css/bootstrappage.css" rel="stylesheet"/>

	<!-- global styles -->
	<link href="user/themes/css/flexslider.css" rel="stylesheet"/>
	<link href="user/themes/css/main.css" rel="stylesheet"/>
	@yield('css')
	

</head>
<body>
	<div id="top-bar" class="container">
		<div class="row">
			<div class="span4">
				<form method="POST" class="search_form" action="products/search">
					<input type="hidden" name="_token" value="{{csrf_token('')}}">
					<div class="cover-text-search">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt" name="txtSearch">
						<button class="btn" type="submit">Search</button>
					</div>
				</form>
			</div>
			<div class="span8">
				<div class="account pull-right">
					<ul class="user-menu">				
						
						<li><a href="cart">Your Cart</a></li>
						<li><a href="checkout">Checkout</a></li>		@if(!isset($user))
						<li><a href="login">Login</a></li>	
						@else
						<li><a href="#">{{$user['username']}}</a></li>
						<li><a href="logout">Logout</a></li>
						@endif	
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div id="wrapper" class="container">
		@include('user.layout.header')
		@yield('content')
		@include('user.layout.footer')
	</div>
	
	<!-- scripts -->
	<script src="user/themes/js/jquery-1.7.2.min.js"></script>
	<script src="user/bootstrap/js/bootstrap.min.js"></script>				
	<script src="user/themes/js/superfish.js"></script>	
	<script src="user/themes/js/jquery.scrolltotop.js"></script>
	<script src="user/themes/js/common.js"></script>
	@yield('script')
</body>
</html>