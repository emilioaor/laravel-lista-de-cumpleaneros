@extends('template.admin')

@section('content')
	@if(Session::has('alert-show') )
		<div class="alert {{ Session::get('alert-type') }} alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Atención!</strong> {!! Session::get('alert-msj') !!}
		</div>
	@endif
	<h1>Agregar Empleado</h1><hr>
	<form action="{{ url('admin/employees') }}" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="name">Nombre</label>
			<input type="text" name="name" class="form-control" placeholder="Nombre" value="@if(Session::has('error-name')){{ Session::get('error-name') }}@endif">
		</div>
		<div class="row">
			<div class="form-group col-md-4">
				<label for="month">Mes</label>
				<input type="text" name="month" class="form-control" placeholder="Mes" value="@if(Session::has('error-month')){{ Session::get('error-month') }}@endif">
			</div>
			<div class="form-group col-md-4">
				<label for="day">Día</label>
				<input type="text" name="day" class="form-control" placeholder="Día" value="@if(Session::has('error-day')){{ Session::get('error-day') }}@endif">
			</div>
			<div class="form-group col-md-4">
				<label for="status">Estatus</label>
				<select name="status" class="form-control">
					<option value="SI">SI</option>
					<option value="NO">NO</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="file">Imagen</label>
			<input type="file" name="file" class="form-control">
		</div>
		
		<div class="form-group">
			<button class="btn btn-success btn-lg">Agregar</button>
		</div>
	</form>
@endsection