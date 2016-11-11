@extends('adminPrincipal')

@section('encabezado')
	<h2>Pedidos</h2>
@stop

@section('contenido')
	<table class="table table-hover">
		<thead>
			<tr>
				<th>#</th>
				<th>Fecha</th>
				<th>ID - Usuario</th>
				<th>Total - MXN</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pedidos as $p)
				<tr>
					<td>{{$p->id_pedido}}</td>
					<td>{{$p->created_at}}</td>
					<td>{{$p->id_usuario}} - {{$p->nombre}}</td>
					<td>{{$p->total}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@stop