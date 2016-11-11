@extends('adminPrincipal')

@section('encabezado')
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
			@foreach($comentario as $key=>$c)
				<tr>
					<td>{{++$key}}</td>
					<td>{{$c->usuario}}</td>
					<td>{{$c->comentario}}</td>
					<td>
						<a href="{{url('/eliminarComentario')}}/{{$c->id_comentario}}/{{$c->id_articulo}}" class="btn btn-danger btn-xs">Eliminar</a>
					</td>
				</tr>
				
			@endforeach
		</tbody>
	</table>
	<a href="{{url('/consultarArticulos')}}" class="btn btn-danger">Volver</a>
@stop