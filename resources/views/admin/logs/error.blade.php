@if(count($errors) > 0)
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Title!</strong>
	@foreach($errors->all() as $err)
	<p>{{$err}}</p>
	@endforeach
</div>
@endif
