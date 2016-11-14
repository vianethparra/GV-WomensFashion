@extends('adminPrincipal')

@section('encabezado')
	<h2>Articulos</h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Img</th>
				<th>Nombre</th>
				<th>Categoria</th>
				<th>Precio-MXN</th>
				<th>Stock</th>
				<th>Descripcion</th>
				<th>Opciones</th>
				<th>Comentarios</th>
			</tr>
		</thead>
		<tbody>
			@foreach($articulo as $a)
				<tr>
					<td>{{$num=$a->id_articulo}}</td>
					<td><img src="img/{{$num}}.png" class="img-responsive"></td>
					<td>{{$a->nombre}}</td>
					<td>
						@if($a->categoria==1)
							Ropa
						@else
							@if($a->categoria==2)
								Calzado
							@else
								Accesorio
							@endif
						@endif
					</td>
					<td>${{$a->precio}}</td>
					<td>{{$a->stock}}</td>
					<td>{{$a->descripcion}}</td>
					<td>
						
						<a href="{{url('/editar')}}/{{$num}}" class="btn btn-success btn-xs">Editar</a>

						<a href="{{url('/eliminarArticulo')}}/{{$num}}" class="btn btn-danger btn-xs">Eliminar</a>
					</td>
					<td>
						<a href="{{url('/comentarios')}}/{{$num}}" class="btn btn-success btn-xs">Comentarios</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop