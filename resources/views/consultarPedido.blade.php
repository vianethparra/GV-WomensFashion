@extends('principal')
@section('contenido')
<div class="col-md-10 col-md-offset-1" style="margin-bottom: 100px;">
	<h1><strong>Pedidos</strong></h1>
	<br>
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
				<td>No hay pedidos del usuario {{$p->nombre}}</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
@stop