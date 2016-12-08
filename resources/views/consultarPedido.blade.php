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
				<th>PDF</th>
			</tr>
		</thead>
		<tbody>
			@forelse($pedidos as $key=>$p)
                                <tr>
                                        <td>{{++$key}}</td>
					<td>{{$p->created_at}}</td>
					<td>{{$p->id_usuario}} - {{$p->nombre}}</td>
					<td>{{$p->total}}</td>
					<td><a href="{{url('/pdfPedidos')}}/{{Auth::id()}}/{{$p->id_pedido}}"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></a></td>
				</tr>
			@empty
			<tr>
				<td>No hay pedidos del usuario</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>
@stop
