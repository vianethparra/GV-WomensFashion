@extends('principal')
@section('contenido')
	<div class="contact">
		<div class="container">
			<div class="contact-top heading"> 
				<h3>CONTACTO</h3>
			</div>
			<br>
			<div class="col-md-6 contact-left"> 
				<form action="#" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="text" placeholder="Nombre" name="nombre" required>
					<input type="text" placeholder="E-mail" name="email" required>
					<textarea placeholder="Mensaje" name="mensaje"></textarea>
					<input type="submit" value="ENVIAR">
				</form>
			</div>

			<div class="col-md-6 contact-left">
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14488.608226249116!2d-107.39124709409178!3d24.790246262390788!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x918d0686e996a928!2sInstituto+Tecnol%C3%B3gico+de+Culiac%C3%A1n!5e0!3m2!1sen!2smx!4v1478123194385" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>	
			</div>
		</div>
	</div>
@stop