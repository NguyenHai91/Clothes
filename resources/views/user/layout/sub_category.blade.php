<div class="block">	
	<ul class="nav nav-list">
		<li class="nav-header">SUB CATEGORIES</li>
		@foreach($cate as $item)
		<li><a href="category/{{$item['id']}}">{{$item['name']}}</a></li>
		@endforeach
	</ul>
	<br/>
	<ul class="nav nav-list below">
		<li class="nav-header">MANUFACTURES</li>
		@foreach($brand as $item)
		<li><a href="brand/{{$item['brand']}}">{{$item['brand']}}</a></li>
		@endforeach
	</ul>
</div>