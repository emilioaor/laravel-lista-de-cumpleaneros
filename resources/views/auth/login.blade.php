@extends('template.admin')

@section('content')
	@if(Session::has('alert-show') )
		<br>
		<div class="alert {{ Session::get('alert-type') }} alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Atención!</strong> {!! Session::get('alert-msj') !!}
		</div>
	@endif
	<h1>Login de usuario</h1>
	<form action="{{ url('auth/login') }}" method="post">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="user">Usuario</label>
			<input type="text" name="user" class="form-control" placeholder="Usuario">
		</div>
		<div class="form-group">
			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control" placeholder="Contraseña">
		</div>
		<div class="form-group">
			<button class="btn btn-success btn-lg">Login</button>
		</div>
	</form>
@endsection