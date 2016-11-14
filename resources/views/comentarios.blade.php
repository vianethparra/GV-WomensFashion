@extends('adminPrincipal')
@section('encabezado')
	@forelse($comentario as $key=>$c)
	<h2>Comentarios del articulo "{{$comentario->first()->nombre}}"</h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Usuario</th>
				<th>Comentario</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			
				<tr>
					<td>{{++$key}}</td>
					<td>{{$c->usuario}}</td>
					<td>{{$c->comentario}}</td>
					<td>
						<a href="{{url('/eliminarComentario')}}/{{$c->id_comentario}}/{{$c->id_articulo}}" class="btn btn-danger btn-xs">Eliminar</a>
					</td>
				</tr>
			
			
		</tbody>
	</table>
	<a href="{{url('/consultarArticulos')}}" class="btn btn-danger">Volver</a>
	@empty
	<h2>No hay comentarios del articulo</h2>
	<a href="{{url('/consultarArticulos')}}" class="btn btn-danger">Volver</a>
	@endforelse
@stop
