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
							<a href="upload/{{$item->image}}" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="upload/{{$item->image}}" alt=""></a>
						</li>								
						@endforeach
					</ul>
				</div>
				<div class="span5">
					<address>
						<strong>Brand:</strong> <span>{{$product->brand}}</span><br>
						<strong>Product Code:</strong> <span>Product 14</span><br>
						<strong>Reward Points:</strong> <span>0</span><br>
					</address>									
					<h4><strong>Price: ${{$product['price']}}</strong></h4>
				</div>
				<div class="span5">
					<form action="product_detail/{{$product->id}}" class="form-inline" method="POST">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<p>&nbsp;</p>
						<label>Qty:
							<input id="txtQuant" class="span1 quantity" type="text" value="1" name="txtQuant" data="{{$product->id}}">
						</label>
						<label>Size:
							<select id="slcSize" class="span1" name="slcSize">
								@foreach($listSize as $size)
								<option value="{{$size->id}}">{{$size->size}}</option>
								@endforeach
							</select>
						</label>
						<label>Color:
							<select id="slcColor" class="span1" name="slcColor">
								@foreach($listColor as $color)
								<option value="{{$color->id}}">{{$color->name}}</option>
								@endforeach
							</select>
							<input class="span1" type="color" name="iptColor" value="{{$listColor[0]->code_color}}" disabled>
						</label>
						<button class="btn btn-inverse" type="submit">Add to cart</button>
						<div class="detail-alert alert alert-danger " style="display: none">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Title !  </strong><span class="message"></span>
						</div>
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
							for($i = 0; $i < count($relateProduct); $i++) {
								if($i < 3) {
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
									@if($item->id != $product->id)
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>	<a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$item->image}}"></a><br/>
											<a href="product_detail/{{$item->id}}" class="title">Wuam ultrices rutrum</a><br/>
											<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
											<p class="price">${{$item->price}}</p>
										</div>
									</li>
									@endif
									@endforeach												
								</ul>
							</div>
							@endif
							@if(count($relate2) > 0)
							<div class="item">
								<ul class="thumbnails listing-products">
									@foreach($relate2 as $item)
									@if($item->id != $product->id)
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>	<a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$item->image}}"></a><br/>
											<a href="product_detail/{{$item->id}}" class="title">Wuam ultrices rutrum</a><br/>
											<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
											<p class="price">${{$item->price}}</p>
										</div>
									</li>  
									@endif    
									@endforeach
								</ul>
							</div>
							@endif
							@if(count($relate3) > 0)
							<div class="item">
								<ul class="thumbnails listing-products">
									@foreach($relate3 as $item)
									@if($item->id != $product->id)
									<li class="span3">
										<div class="product-box">
											<span class="sale_tag"></span>	<a href="product_detail/{{$item->id}}"><img alt="" src="upload/{{$item->image}}"></a><br/>
											<a href="product_detail/{{$item->id}}" class="title">Wuam ultrices rutrum</a><br/>
											<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
											<p class="price">${{$item->price}}</p>
										</div>
									</li>   
									@endif  
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
		// $('.thumbnail').fancybox({
		// 	openEffect  : 'none',
		// 	closeEffect : 'none'
		// });
		
		$('#myCarousel-2').carousel({
			interval: 2500
		});
		// add event for quantity 
		$('#txtQuant').blur(function (e) {
			$qty = $('#txtQuant').val();
			$id = $('#txtQuant').attr('data');
			$sizeId = $('#slcSize').val();
			$colorId = $('#slcColor').val();
			$alert = $('div.detail-alert');
			$msg = $alert.find('span.message');
			$.ajax({
				'type': 'GET',
				'url': 'product_detail/update/' + $id,
				'cache': false,
				'data': {'id':$id, 'qty':$qty, 'sizeId':$sizeId, 'colorId':$colorId},
				success: function (response) {
					$alert.css('display','none');
					if (response['status'] == 'error') {
						$('#txtQuant').val(response['maxQty']);
						$alert.css('display','block');
						$msg.text(response['error']);

					}
				}

			});
		});	
		// add event for size select
		$('#slcSize').change(function (e) {
			$qty = $('#txtQuant').val();
			$id = $('#txtQuant').attr('data');
			$sizeId = $('#slcSize').val();
			$colorId = $('#slcColor').val();
			$alert = $('div.detail-alert');
			$msg = $alert.find('span.message');
			$.ajax({
				'type': 'GET',
				'url': 'product_detail/update/' + $id,
				'cache': false,
				'data': {'id':$id, 'qty':$qty, 'sizeId':$sizeId, 'colorId':$colorId},
				success: function (response) {
					$alert.css('display','none');
					if (response['status'] == 'error') {
						$('#txtQuant').val(response['maxQty']);
						$alert.css('display','block');
						$msg.text(response['error']);

					}
				}

			});
		});
		// add event for color select
		$('#slcColor').change(function (e) {
			$qty = $('#txtQuant').val();
			$id = $('#txtQuant').attr('data');
			$sizeId = $('#slcSize').val();
			$colorId = $('#slcColor').val();
			$alert = $('div.detail-alert');
			$msg = $alert.find('span.message');
			$.ajax({
				contentType: 'application/json',
				dataType:'jsonp',
				responseType:'application/json',
				xhrFields: {
					withCredentials: false
				},
				headers: {
					'Access-Control-Allow-Credentials' : true,
					'Access-Control-Allow-Origin':'*',
					'Access-Control-Allow-Methods':'GET',
					'Access-Control-Allow-Headers':'application/json',
				},
				'type': 'GET',
				'url': 'product_detail/update/' + $id,
				crossDomain: true,
				'cache': false,
				'data': {'id':$id, 'qty':$qty, 'sizeId':$sizeId, 'colorId':$colorId},
				success: function (response) {
					$alert.css('display','none');
					if (response['status'] == 'error') {
						$('#txtQuant').val(response['maxQty']);
						$alert.css('display','block');
						$msg.text(response['error']);

					}
				}

			});
		});										
	});
</script>
@endsection