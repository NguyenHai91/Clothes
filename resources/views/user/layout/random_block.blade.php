<div class="block">
	<h4 class="title">
		<span class="pull-left"><span class="text">Randomize</span></span>
		<span class="pull-right">
			<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
		</span>
	</h4>
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
			<?php $i = 0; ?>
			@if(count($randProducts) > 0)
			@foreach($randProducts as $item)
			
			<div class="{{$i == 0 ? 'active' : ''}} item">
				<ul class="thumbnails listing-products">
					<li class="span3">
						<div class="product-box">
							<span class="sale_tag"></span>												
							<img alt="" src="upload/{{$item['image']}}"><br/>
							<a href="product_detail/{{$item['id']}}" class="title">{{$item['name']}}</a><br/>
							<a href="category/{{$item['category_id']}}" class="category">Suspendisse aliquet</a>
							<p class="price">${{$item['price']}}</p>
						</div>
					</li>
				</ul>
			</div>
			<?php $i++; ?>
			@endforeach
			@endif
		</div>
	</div>
</div>