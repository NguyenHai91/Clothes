<div class="block">								
	<h4 class="title"><strong>Best</strong> Seller</h4>								
	<ul class="small-product">
		@foreach($bestSeller as $item)
		<li>
			<a href="#" title="Praesent tempor sem sodales">
				<img src="upload/{{$item['image']}}" alt="Praesent tempor sem sodales">
			</a>
			<a href="#">{{$item['name']}}</a>
		</li>
		@endforeach
	</ul>
</div>