<a href="JavaScript:cerrarResult()"><span class="glyphicon glyphicon-remove"></span> Cerrar</a>
@if( count($employees)>0 )
	@foreach($employees as $employee)
		<div class="row">
			<div class="col-md-3">
				@if(file_exists(public_path().'/imagesEmployees/'.$employee->image ) )
					<img src="{{ url('imagesEmployees/'.$employee->image) }}">
				@else
					<img src="{{ url('images/logo.jpg') }}">
				@endif
			</div>
			<div class="col-md-9"><h4><a href="JavaScript:goToEmployee({{ $employee->id }})">{{ $employee->name }}</a></h4></div>
		</div>
	@endforeach
@else
	<div class="row">
		<div class="col-md-12"><h4>Sin Resultados</h4></div>
	</div>
@endif