@extends('user.layout.page')
@section('content')

<section  class="homepage-slider" id="home-slider">
	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="user/themes/images/carousel/banner-1.jpg" alt="" />
			</li>
			<li>
				<img src="user/themes/images/carousel/banner-2.jpg" alt="" />
				<div class="intro">
					<h1>Mid season sale</h1>
					<p><span>Up to 50% Off</span></p>
					<p><span>On selected items online and in stores</span></p>
				</div>
			</li>
		</ul>
	</div>			
</section>
<section class="header_text">
	We stand for top quality templates. Our genuine developers always optimized bootstrap commercial templates. 
	<br/>Don't miss to use our cheap abd best bootstrap templates.
	
</section>
<section class="main-content">
	<div class="row">
		<div class="span12">													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel" class="myCarousel carousel slide">
						<?php 
						$i=0;
						$list1 = array();
						$list2 = array();
						foreach($featureProducts as $item){
							if($i<4){
								array_push($list1, $item);
							}else {
								array_push($list2, $item);
							}
							$i++;
						}
						?>
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">
									@if(isset($list1))
									@foreach($list1 as $item)						
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="product_detail/{{$item['id']}}"><img src="upload/{{$item['image']}}" alt="" /></a></p>
											<a href="product_detail/{{$item['id']}}" class="title">{{$item['name']}}</a><br/>
											<a href="product_detail/{{$item['id']}}" class="category">{{$item['brand']}}</a>
											<p class="price">${{$item['price']}}</p>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
							</div>

							<div class="item">
								<ul class="thumbnails">
									@if(isset($list2))
									@foreach($list2 as $item)
									<li class="span3">
										<div class="product-box">
											<p><a href="product_detail/{{$item['id']}}"><img src="upload/{{$item['image']}}" alt="" /></a></p>
											<a href="product_detail/{{$item['id']}}" class="title">{{$item['name']}}</a><br/>
											<a href="product_detail/{{$item['id']}}" class="category">{{$item['brand']}}</a>
											<p class="price">${{$item['price']}}</p>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
							</div>
						</div>	
					</div>
				</div>						
			</div>
			<br/>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<?php 
							$j=0;
							$listLatest1 = array();
							$listLatest2 = array();
							foreach($latestProducts as $item){
								if($j<4){
									array_push($listLatest1, $item);
								}else {
									array_push($listLatest2, $item);
								}
								$j++;
							}
							?>
							<div class="active item">
								<ul class="thumbnails">
									@if(isset($listLatest1))				
									@foreach($listLatest1 as $item)				
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="product_detail/{{$item['id']}}"><img src="upload/{{$item['image']}}" alt="" /></a></p>
											<a href="product_detail/{{$item['id']}}" class="title">{{$item['name']}}</a><br/>
											<a href="product_detail/{{$item['id']}}" class="category">brand/{{$item['brand']}}</a>
											<p class="price">${{$item['price']}}</p>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
							</div>

							<div class="item">
								<ul class="thumbnails">
									@if(isset($listLatest2))
									@foreach($listLatest2 as $item)
									<li class="span3">
										<div class="product-box">
											<p><a href="product_detail/{{$item['id']}}"><img src="upload/{{$item['image']}}" alt="" /></a></p>
											<a href="product_detail/{{$item['id']}}" class="title">{{$item['name']}}</a><br/>
											<a href="product_detail/{{$item['id']}}" class="category">{{$item['brand']}}</a>
											<p class="price">${{$item['price']}}</p>
										</div>
									</li>
									@endforeach
									@endif
								</ul>
							</div>

						</div>							
					</div>
				</div>						
			</div>
			<div class="row feature_box">						
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<img src="user/themes/images/feature_img_2.png" alt="" />
							<h4>MODERN <strong>DESIGN</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<img src="user/themes/images/feature_img_1.png" alt="" />
							<h4>FREE <strong>SHIPPING</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<img src="user/themes/images/feature_img_3.png" alt="" />
							<h4>24/7 LIVE <strong>SUPPORT</strong></h4>
							<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
						</div>
					</div>
				</div>	
			</div>		
		</div>				
	</div>
</section>
<section class="our_client">
	<h4 class="title"><span class="text">Manufactures</span></h4>
	<div class="row">					
		<div class="span2">
			<a href="#"><img alt="" src="user/themes/images/clients/14.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="user/themes/images/clients/35.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="user/themes/images/clients/1.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="user/themes/images/clients/2.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="user/themes/images/clients/3.png"></a>
		</div>
		<div class="span2">
			<a href="#"><img alt="" src="user/themes/images/clients/4.png"></a>
		</div>
	</div>
</section>
@endsection

@section('script')

<script src="user/themes/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(function() {
		$(document).ready(function() {
			$('.flexslider').flexslider({
				animation: "fade",
				slideshowSpeed: 4000,
				animationSpeed: 600,
				controlNav: false,
				directionNav: true,
				controlsContainer: ".flex-container" 
			});
		});
	});
</script>
@endsection
