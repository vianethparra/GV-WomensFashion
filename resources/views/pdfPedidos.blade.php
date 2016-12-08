<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Su pedido</title>
</head>
<body>
	<img src="{{ asset("img/logo-4.png")}}" alt="">
	@foreach($pedido as $p)
	<p>GV womens fashion</p>
	<p>Juan de Dios S/N, Guadalupe, 80220 Culiacán Rosales, Sin.</p>
	<p>Gallardo Vargas Victor Armando</p>
	<p>GAVV940810GN5</p>
	<br>
	<h2>Compra #{{$p->id_pedido}}</h2><p>{{$p->created_at}}</p>
	<br>
	<p><strong>TOTAL ${{$p->total}}</strong></p>
	<br>
	@endforeach
</body>
</html>