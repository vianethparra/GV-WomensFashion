@extends('adminPrincipal')

@section('encabezado')
	<h2>Generar Articulo CSV</h2>	
@stop

@section('contenido')
<div class="col-md-6 col-md-offset-3 account-left">
	<form action="{{url('/guardarArticuloCSV')}}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="nombre">Archivo</label>
			<input type="file" class="form-control" name="csv" required>
		</div>
		<input type="submit" class="btn btn-primary" value="Generar">
		<a href="{{url('/consultarArticulos')}}" class="btn btn-danger">Cancelar</a>
	</form>
</div>
@stop