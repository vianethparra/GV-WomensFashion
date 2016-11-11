@extends('adminPrincipal')

@section('encabezado')
	<h2>Generar Articulo</h2>	
@stop

@section('contenido')
<div class="col-md-6 col-md-offset-3 account-left">
	<form action="{{url('/guardarArticulo')}}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" required>
		</div>
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="categoria" class="form-control" required>
				<option value="" selected=>Categoria</option>
				<option value="1">Ropa</option>
				<option value="2">Calzado</option>
				<option value="3">Accesorios</option>
			</select>
		</div>
		<div class="form-group">
			<label for="precio">Precio (#,##)</label>
			<input type="number" step='0.01' min="0" max="8000" class="form-control" name="precio" required>
		</div>
		<div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" min="0" class="form-control" name="stock" required>
		</div>
		<input type="submit" class="btn btn-primary" value="Guardar">
		<a href="{{url('/consultarArticulos')}}" class="btn btn-danger">Cancelar</a>
	</form>
</div>
@stop