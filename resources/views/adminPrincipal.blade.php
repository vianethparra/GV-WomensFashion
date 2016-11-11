<!DOCTYPE html>
<html>
<head>
	<title>Panel de Control</title>
	<script src="{{ asset("js/jquery.js")}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.css")}}">
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{url('/inicio')}}">GV-ControlPanel</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Articulos<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/consultarArticulos')}}">Consultar</a></li>
            <li class="divider"></li>
            <li><a href="{{url('/generarArticulo')}}">Generar</a></li>
            <li><a href="#">Generar-CSV</a></li>
          </ul>
        </li>
        <li><a href="{{url('/consultarCategorias')}}">Categorias</a></li>
        </li>
        <li><a href="{{url('/consultarPedidos')}}">Pedidos</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			@yield('encabezado')
			<hr>
			@yield('contenido')
		</div>
	</div>
</div>
<footer>
<center><hr>Ingenieria Web &copy; 2016</center>
</footer>
<script src="{{ asset("js/bootstrap.js")}}"></script>
</body>
</html>