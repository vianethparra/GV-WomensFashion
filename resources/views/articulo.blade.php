@extends('principal')
@section('contenido')
<div class="single contact">
	<div class="container">
		<div class="single-main">
			<div class="col-md-10 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="img/1.png">
									<img src="img/1.png" />
								</li>
								<li data-thumb="img/2.png">
									<img src="img/2.png" />
								</li>
								<li data-thumb="img/1.png">
									<img src="img/1.png" />
								</li>
								<li data-thumb="img/2.png">
									<img src="img/2.png" />
								</li>
							</ul>
						</div>
						<script defer src="js/jquery.flexslider.js"></script>
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

						<script>
							$(window).load(function() {
							  $('.flexslider').flexslider({
							    animation: "slide",
							    controlNav: "thumbnails"
							  });
							});
						</script>
					</div>	
					<div class="col-md-7 single-top-right">
					<div class="details-left-info">
						<h3>Accessories Latest</h3>
						<p class="availability">Availability: <span class="color">In stock</span></p>
						<div class="price_single">
							<span>$600.00</span>
						</div>
						<h2 class="quick">Descripcion:</h2>
						<p class="quick_desc"> Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; es</p>
						<div class="quantity_box">
							<span>Cantidad:</span>
							<input type="number" value="1" min="1" name="cantidad">
						</div>
						<div class="clearfix"> </div>
						<div class="single-but agregar">
							<input type="submit" value="Agregar">
						</div>
					</div>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop