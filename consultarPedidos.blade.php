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
			@forelse($pedidos as $p)
				<tr>
					<td>{{$p->id_pedido}}</td>
					<td>{{$p->created_at}}</td>
					<td>{{$p->id_usuario}} - {{$p->nombre}}</td>
					<td>{{$p->total}}</td>
				</tr>
			@empty
			<tr>
				<STYLE type="text/css">
					td {font-style: bold; 
					color: silver;
					font-family: Comic Sans MS;
					text-align: center}
				</STYLE>
				<td>No hay pedidos</td>
			</tr>
			@endforelse
		</tbody>
	</table>
@stop