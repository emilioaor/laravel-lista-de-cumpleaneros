@extends('template.main')

@section('onload','goToMonth('. date('m') .'); ready();')

@section('content')
	<div class="employees" id="employees">
		<table>
			<tr>
				@foreach($employees as $employee)
					@if(file_exists(public_path().'/imagesEmployees/'.$employee->image) )
						<th><span id="row{{ $employee->id }}"></span><img class="m{{ $employee->month }}" src="{{ url('imagesEmployees/'.$employee->image) }}"></th>
					@else
						<th><img class="m{{ $employee->month }}" src="{{ url('images/logo.jpg') }}"></th>
					@endif
				@endforeach
			</tr>
			<tr>
				@foreach($employees as $employee)
					<th><p class="text-center">{{ $employee->name }}</p></th>
				@endforeach
			</tr>
			<tr>
				@foreach($employees as $employee)
					<th><p class="text-center">{{ $employee->day.'/'.$employee->month }}</p></th>
				@endforeach
			</tr>
		</table>
	</div>
	<div class="row spaceSearch">
		<div class="col-md-6 col-md-offset-3">
			<div class="input-group">
			  <input type="text" id="search" class="form-control" placeholder="Busqueda por nombre...">
			  <span class="input-group-btn">
			    <button class="btn btn-default" type="button" onclick="searchEmployee()"><span class="glyphicon glyphicon-search"></span></button>
			  </span>
			</div><!-- /input-group -->
		    <div class="spaceResult" id="spaceResult">
		    	<!-- Resultado de busqueda -->
		    </div>
		</div>
	</div>
	<div class="row months">
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(1)">Enero</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(2)">Febrero</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(3)">Marzo</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(4)">Abril</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(5)">Mayo</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(6)">Junio</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(7)">Julio</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(8)">Agosto</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(9)">Septiembre</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(10)">Octubre</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(11)">Noviembre</a></div>
		<div class="col-md-2 text-center"><a href="JavaScript:goToMonth(12)">Diciembre</a></div>
	</div>
@endsection