@extends('user.layout.page')

@section('content')
<section class="header_text sub">
	<img class="pageBanner" src="user/themes/images/pageBanner.png" alt="New products" >
	<h4><span>Product Detail</span></h4>
</section>
<section class="main-content">				
	<div class="row">						
		<div class="span9">
			<div class="row">
				<div class="span4">
					<a href="" class="thumbnail" data-fancybox-group="group1" title="Description 1"><img alt="" src="upload/{{$product['image']}}"></a>												
					<ul class="thumbnails small">
						
						@foreach($product->productImages as $item)	

						<li class="span1">
							<a href="themes/images/ladies/2.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="upload/{{$item['image']}}" alt=""></a>
						</li>								
						@endforeach
					</ul>
				</div>
				<div class="span5">
					<address>
						<strong>Brand:</strong> <span>{{$product->brand}}</span><br>
						<strong>Product Code:</strong> <span>Product 14</span><br>
						<strong>Reward Points:</strong> <span>0</span><br>
						<strong>Availability:</strong> <span>{{$product['quantity']}}</span><br>								
					</address>									
					<h4><strong>Price: ${{$product['price']}}</strong></h4>
				</div>
				<div class="span5">
					<form action="" class="form-inline" method="post">
						<input type="hidden" name="_token" value="{{csrf_token('')}}">
						{{-- <label class="checkbox">
							<input type="checkbox" value=""> Option one is this and that
						</label>
						<br/>
						<label class="checkbox">
							<input type="checkbox" value=""> Be sure to include why it's great
						</label> --}}
						<p>&nbsp;</p>
						<label>Qty:</label>
						<input type="text" class="span1"  value="1" name="txtQuant">
						<button class="btn btn-inverse" type="submit">Add to cart</button>
					</form>
				</div>							
			</div>
			<div class="row">
				<div class="span9">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active"><a href="#home">Description</a></li>
						<li class=""><a href="#profile">Additional Information</a></li>
					</ul>							 
					<div class="tab-content">
						<div class="tab-pane active" id="home">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem</div>
						<div class="tab-pane" id="profile">
							<table class="table table-striped shop_attributes">	
								<tbody>
									<tr class="">
										<th>Size</th>
										<td>Large, Medium, Small, X-Large</td>
									</tr>		
									<tr class="alt">
										<th>Colour</th>
										<td>Orange, Yellow</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>							
				</div>						
				<div class="span9">	
					<br>
					<h4 class="title">
						<span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-1" class="carousel slide">
						<div class="carousel-inner">
							<?php
							$relate1 = array();
							$relate2 = array();
							$relate3 = array();
							for($i=0; $i < count($relateProduct); $i++) {
								

								if($i<3) {
									array_push($relate1, $relateProduct[$i]);
								} else if($i >= 3 && $i < 6){
									array_push($relate2, $relateProduct[$i]);
								} else {
									array_push($relate3, $relateProduct[$i]);
								}
							}
							?>
							@if(count($relate1) > 0)
							<div class="active item">
								<ul class="thumbnails listing-products">
									@foreach($relate1 as $item)
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>	<a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$item->image}}"></a><br/>
											<a href="product_detail/{{$item->id}}" class="title">Wuam ultrices rutrum</a><br/>
											<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
											<p class="price">${{$item->price}}</p>
										</div>
									</li>
									@endforeach												
								</ul>
							</div>
							@endif
							@if(count($relate2) > 0)
							<div class="item">
								<ul class="thumbnails listing-products">
									@foreach($relate2 as $item)
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>	<a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$item->image}}"></a><br/>
											<a href="product_detail/{{$item->id}}" class="title">Wuam ultrices rutrum</a><br/>
											<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
											<p class="price">${{$item->price}}</p>
										</div>
									</li>      
									@endforeach
								</ul>
							</div>
							@endif
							@if(count($relate3) > 0)
							<div class="item">
								<ul class="thumbnails listing-products">
									@foreach($relate3 as $item)
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>	<a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$item->image}}"></a><br/>
											<a href="product_detail/{{$item->id}}" class="title">Wuam ultrices rutrum</a><br/>
											<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
											<p class="price">${{$item->price}}</p>
										</div>
									</li>      
									@endforeach
								</ul>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span3 col">
			@include('user.layout.sub_category')
			@include('user.layout.random_block')
			@include('user.layout.bestseller_block')
		</div>
	</div>
</section>			

@endsection

@section('script')

<script>
	$(function () {
		$('#myTab a:first').tab('show');
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})
	})
	$(document).ready(function() {
		$('.thumbnail').fancybox({
			openEffect  : 'none',
			closeEffect : 'none'
		});
		
		$('#myCarousel-2').carousel({
			interval: 2500
		});								
	});
</script>
@endsection