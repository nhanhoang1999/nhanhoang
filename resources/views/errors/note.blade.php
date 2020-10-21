@if(Session::has('error'))
<p class="alert alert-danger">{{Session::get('error')}}</p>
@endif
@if(Session::has('warning'))
<div class="alert alert-dark" role="alert">
	<p class="alert alert-success">{{Session::get('warning')}}</p>
</div>
@endif

@foreach($errors->all() as $error)
<p class="alert alert-danger">{{$error}}</p>
@endforeach