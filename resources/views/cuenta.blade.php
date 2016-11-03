@extends('principal')
@section('contenido')
<div class="account">
	<div class="container"> 
	<form action="#" method="POST">
	<input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="col-md-6 col-md-offset-3 account-left">
		<div class="account-top heading">
			<h3>CREAR CUENTA</h3>
		</div>
		<div class="address">
			<span>Nombre*</span>
			<input type="text" name="nombre" required>
		</div>
		<div class="address">
			<span>Correo*</span>
			<input type="email" name="correo" required>
		</div>
		<div class="address">
			<span>Contraseña*</span>
			<input type="password" name="contra" required>
		</div>
		<div class="address">
			<span>Confirmar contraseña*</span>
			<input type="password" name="recontra" required>
		</div>
		<div class="address new">
			<input type="submit" value="Registrar">
		</div>
	</div>
	</form>
	</div>
</div>
@stop