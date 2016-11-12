@extends('template.admin')

@section('onload')
	@if(Session::has('alert-show') )
		goToAdminEmployee({{ Session::get('alert-show') }})
	@endif
@endsection

@section('content')
	
	<h1>Lista de Empleados</h1><hr>
	<table class="table table-striped">
		<thead>
			<th>Foto</th>
			<th>Nombre</th>
			<th>Mes</th>
			<th>Día</th>
			<th>Imagen</th>
			<th>Estatus</th>
			<th></th>
		</thead>
		<tbody>
			@foreach($employees as $employee)
				<form action="{{ url('admin/employees/'.$employee->id) }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					{{ method_field('PUT') }}
					<tr id="row{{ $employee->id }}">
						<td rowspan="2">
							@if( file_exists( public_path().'/imagesEmployees/'.$employee->image ) )
								<img src="{{ url('imagesEmployees/'.$employee->image) }}" class="thumb">
							@else
								<img src="{{ url('images/logo.jpg') }}" class="thumb">
							@endif
						</td>
						<td><input type="text" name="name" class="form-control" value="{{ $employee->name }}"></td>
						<td><input type="text" name="month" class="form-control date" value="{{ $employee->month }}"></td>
						<td><input type="text" name="day" class="form-control date" value="{{ $employee->day }}"></td>
						<td><input type="file" name="file" class="form-control"></td>
						<td>
							<select class="form-control" name="status">
								@if($employee->status == 'SI')
									<option value="SI" selected>SI</option>
									<option value="NO">NO</option>
								@else
									<option value="SI">SI</option>
									<option value="NO" selected>NO</option>
								@endif
							</select>
						</td>
						<td><button class="btn btn-info">Actualizar</button></td>
					</tr>
					<tr>
						<td colspan="6">
							@if(Session::has('alert-show') && Session::get('alert-show') == $employee->id )
								<div class="alert {{ Session::get('alert-type') }} alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<strong>Atención!</strong> {!! Session::get('alert-msj') !!}
								</div>
							@endif
						</td>
					</tr>
				</form>
			@endforeach
		</tbody>
	</table>
@endsection