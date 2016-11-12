<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cumpleaños</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/estilos.css') }}">
	<script src="{{ url('js/eventos.js') }}"></script>
</head>
<body onload="@yield('onload')" >
	<header>
		<div class="container">
			<h1 class="text-center">Procuraduría del Estado Carabobo</h1>
		</div>
	</header>
	<section class="main">
		<div class="container">
			@yield('content')
		</div>
	</section>
	<div class="spaceLogo">
		<div class="container">
			<img src="{{ url('images/logo.jpg') }}">
		</div>
	</div>
	<footer>
		<div class="container">
			<p class="text-center">¿No apareces? Comunicate con la Oficina de Informática</p>
		</div>
	</footer>

	<script src="{{ url('js/jquery.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>