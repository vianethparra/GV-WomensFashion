@extends('adminPrincipal')

@section('encabezado')
	<h2>Categorias</h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th></th>
				<th>Categoria</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categoria as $c)
				<tr>
					<td>{{$c->id_categoria}}</td>
					<td></td>
					<td>{{$c->categoria}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop