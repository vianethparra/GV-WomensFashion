<!DOCTYPE html>
<html lang="en">
<head>
	<title>Administrador</title>
	<script src="{{ asset("js/jquery.js")}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset("css/bootstrap.css")}}">
</head>
<body>
<div class="col-md-12">
	<h3>INICIAR SESION</h3>
	<hr>
</div>		
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form action="{{url('/adminLog')}}" method="POST">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-group">
				<label for="user">Usuario</label>
				<input type="text" class="form-control" name="user" required>
			</div>
			<div class="form-group">
				<label for="contra">Contraseña</label>
				<input type="password" class="form-control" name="contra" required>
			</div>
			<input type="submit" class="btn btn-primary" value="Enviar">
			</form>
		</div>
	</div>
</div>		

</body>
<footer>
	<center><hr>Ingenieria Web &copy; 2016</center>
</footer>
<script src="{{ asset("js/bootstrap.js")}}"></script>
</body>
</html>