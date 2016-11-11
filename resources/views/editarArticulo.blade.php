@extends('adminPrincipal')

@section('encabezado')
	<h2>Editar Articulo</h2>	
@stop

@section('contenido')
<div class="col-md-6 col-md-offset-3 account-left">
	<form action="{{url('/editarArticulo')}}/{{$articulo->first()->id_articulo}}" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" class="form-control" name="nombre" required value="{{$articulo->first()->nombre}}">
		</div>
		<div class="form-group">
			<label for="categoria">Categoria</label>
			<select name="categoria" class="form-control" required>
				<option value="" selected=>Categoria</option>
				@if($articulo->first()->categoria==1)
					<option value="1" selected>Ropa</option>
					<option value="2">Calzado</option>
					<option value="3">Accesorios</option>
				@else
					@if($articulo->first()->categoria==2)
					<option value="1">Ropa</option>
					<option value="2" selected>Calzado</option>
					<option value="3">Accesorios</option>
					@else
					<option value="1">Ropa</option>
					<option value="2">Calzado</option>
					<option value="3" selected>Accesorios</option>
					@endif
				@endif
			</select>
		</div>
		<div class="form-group">
			<label for="precio">Precio</label>
			<input type="number" class="form-control" name="precio" required value="{{$articulo->first()->precio}}">
		</div>
		<div class="form-group">
			<label for="stock">Stock</label>
			<input type="number" class="form-control" name="stock" required value="{{$articulo->first()->stock}}">
		</div>
		<input type="submit" class="btn btn-primary" value="Guardar">
		<a href="{{url('/consultarArticulos')}}" class="btn btn-danger">Cancelar</a>
	</form>
</div>
@stop