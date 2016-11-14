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

						<div class="clearfix"> </div>
					</ul>
					@forelse($articulo as $a)
					<form action="{{url('/dejarArticulo')}}/{{$a->id_articulo}}" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<ul class="cart-header">
						<div class="close1">
							<input type="image" border="0" src="img/close-1.png" alt="Submit">
						</div>
							<li class="ring-in"><a href="#" >	<img src="img/{{$a->id_articulo}}.png" class="img-responsive" alt=""></a>
							</li>
							<li><span>{{$a->nombre}}</span></li>
							<li><span>${{$a->precio}}</span></li>
							<li><span>{{$a->cantidad}}</span></li>
						<div class="clearfix"> </div>
					</ul>
					</form>
					@empty
						<h2>Carrito vacio</h2>	
					@endforelse
				</div>
				</div>
				<div class="col-md-3 col-md-offset-9 contact-left comprar">
					<form action="{{url('/realizarPedido')}}/2" method="POST">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="submit" value="Comprar">
					</form>
				</div>
			</div>  
		</div>
	</div>
@stop