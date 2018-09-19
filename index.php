<?php 
include 'conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<title>Proyecto</title>
</head>
<body class="brown lighten-3">
<main>
	<div class="row">
		<div class="input-field col s12 center">
			<img src="img/logo.jpg" width="200" class="circle">
		</div>
	</div>
	<div class="container">
		 <div class="row">
		    <div class="col s12">
		      <div class="card blue-grey z-depth-5">
		        <div class="card-content white-text">
		          <span class="card-title">Inicio de Sesion</span>
		          <form action="login/index.php" method="post" autocomplete="off">
		          	<div class="input-field">
		          		<i class="material-icons prefix">perm_identity</i>
		          		<input type="text" name="usuario" id="usuario" requiered autofocus>
		          		<label for="usuario">Usuario</label>
		          	</div>

		          	<div class="input-field">
		          		<i class="material-icons prefix">vpn_key</i>
		          		<input type="password" name="contra" id="contra" requiered>
		          		<label for="contra">Contrasena</label>
		          	</div>

		          	<div class="input-field center">
		          		<button type="submit" class="btn waves-effect waves-ligth"> ACCEDER </button>
		          	</div>



		          </form>
		        </div>
		      </div>
		    </div>
		  </div>
	</div>
</main>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="js/materialize.min.js"></script>
</body>
</html>