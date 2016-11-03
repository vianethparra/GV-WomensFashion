@extends('principal')
@section('contenido')

	<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
				<div class=" cart-items heading">
					<h3>Checkout (**)</h3>
					<script>$(document).ready(function(c) {
						$('.close1').on('click', function(c){
							$('.cart-header').fadeOut('slow', function(c){
								$('.cart-header').remove();
							});
							});	  
						});
				   </script>
					<script>$(document).ready(function(c) {
						$('.close2').on('click', function(c){
							$('.cart-header1').fadeOut('slow', function(c){
								$('.cart-header1').remove();
							});
							});	  
						});
					</script>
					<script>$(document).ready(function(c) {
						$('.close3').on('click', function(c){
							$('.cart-header2').fadeOut('slow', function(c){
								$('.cart-header2').remove();
							});
							});	  
						});
				   </script>
				
				<div class="in-check" >
					<ul class="unit">
						<li>Articulo</li>
						<li>Nombre</li>		
						<li>Precio</li>
						<li>Stock</li>

						<div class="clearfix"> </div>
					</ul>
					<ul class="cart-header">
						<div class="close1"> </div>
							<li class="ring-in"><a href="#" ><img src="images/shoes-1.png" class="img-responsive" alt=""></a>
							</li>
							<li><span>Woo Dress</span></li>
							<li><span>$ 290.00</span></li>
							<li><span>Variables de producto</span></li>
						<div class="clearfix"> </div>
					</ul>
				</div>
				</div>
			</div>  
		</div>
	</div>
@stop