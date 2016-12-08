@extends('principal')
@section('contenido')

	<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
				<div class=" cart-items heading">
					<h3>Checkout</h3>
					<script>$(document).ready(function(c) {
						$('.close1').on('click', function(c){
							$('.cart-header').fadeOut('slow', function(c){
								$('.cart-header').remove();
							});
							});	  
						});
				   </script>
				
				<div class="in-check" >
					<ul class="unit">
						<li>Articulo</li>
						<li>Nombre</li>		
						<li>Precio</li>
						<li>Cantidad</li>
						<li>Subtotal</li>

						<div class="clearfix"> </div>
					</ul>
					@forelse($articulo as $a)
					<form action="{{url('/cancelarProducto')}}/{{$a->id_articulo}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<ul class="cart-header">
						<div class="close1">
							<input type="image" border="0" src="img/close-1.png" alt="Submit">
						</div>
							<li class="ring-in"><a href="{{url('/articulo')}}/{{$a->id_articulo}}" ><img src="img/{{$a->id_articulo}}.png" class="img-responsive" alt=""></a>
							</li>
							<li><span>{{$a->nombre}}</span></li>
							<li><span>${{$a->precio}}</span></li>
							<li><span>{{$a->cantidad}}</span></li>
							<li><span>${{$a->subtotal}}</span></li>
						<div class="clearfix"> </div>
					</ul>
					</form>
					@empty
						<center><h2>Carrito vacio</h2></center>
					@endforelse
				</div>
				</div>
				<div class="col-md-3 col-md-offset-9 contact-left comprar">

					<form action="{{url('/confirmarPedido')}}/{{Auth::user()->id}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					@if(!$articulo->count()==0)
						<center><h3>${{$total}}</h3></center>
						<input type="submit" value="Comprar">
					@endif
					</form>
				</div>
			</div>  
		</div>
	</div>
@stop