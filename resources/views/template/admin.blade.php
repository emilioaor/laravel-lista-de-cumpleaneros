<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cumpleaños</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/estilos.css') }}">
	<link rel="stylesheet" href="{{ url('css/admin.css') }}">
	<script src="{{ url('js/eventos.js') }}"></script>
</head>
<body onload="@yield('onload')" >
	<header>
		<div class="container">
			<h1 class="text-center">Administrador</h1>
		</div>
	</header>
	@if(Auth::check() )
		<section class="menu">
			<div class="container">
				<ul>
					<li><a href="{{ url('admin/employees') }}"><span class="glyphicon glyphicon-user"></span> Empleados</a></li>
					<li><a href="{{ url('admin/employees/create') }}"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
					<li><a href="{{ url('auth/logout') }}" onclick="return confirm('¿Salir?')"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				</ul><hr>
			</div>
		</section>
	@endif
	<section class="main">
		<div class="container">
			@yield('content')
		</div>
	</section>
	<footer>
		<div class="container">
			<p class="text-center">Oficina de Informática | EO</p>
		</div>
	</footer>

	<script src="{{ url('js/jquery.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>