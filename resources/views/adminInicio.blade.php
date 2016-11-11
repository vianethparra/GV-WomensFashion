@extends('adminPrincipal')
@section('encabezado')

	<h2>Bienvenido</h2>
@stop

@section('contenido')
	<div class="jumbotron">
	  <h1>GV Womens Fashion!</h1>
	  <p>Pagina de valor escolar para la materia de Ingenieria Web, creada por
	  <br>Gallardo Vargas, Ortiz Cazares y Parra Parra</p>
	  <p><a class="btn btn-primary btn-lg" href="{{url('/quienesSomos')}}" role="button">Mas</a></p>
	</div>
@stop