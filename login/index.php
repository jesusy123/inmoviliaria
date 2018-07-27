<?php 
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']=='POST') {
	$tusuario=$con->real_escape_string(htmlentities($_POST['usuario']));
	$tcontra=$con->real_escape_string(htmlentities($_POST['contra']));

	$candado= ' ';
	$str_u=strpos($tusuario,$candado);//strpos busca caracteres
	$str_p=strpos($tcontra,$candado);//strpos busca caracteres

	if (is_int(str_u)) {
		$tusuario='';
	}else{
		$usuario=$tusuario;
	}

	if (is_int(str_p)) {
		$tcontra='';
	}else{
		$contra= sha1($tcontra);
	}

	if ($usuario==null && $contra==null) {
		header('location:../extend/alerta.php?msj=El formato no es correcto&c=salir&p=salir&t=error');
	}else{
		$sel=$con->query("SELECT nick,nombre,nivel,correo,foto,pass FROM usuarios WHERE nick='$usuario' AND pass='$contra' AND bloqueo=1");
		$row=mysqli_num_rows($sel);
		if ($row==1) {
			if ($var=$sel->fetch_assoc()) {
				$nick=$var['nick'];
				$bcontra=$var['pass'];
				$nivel=$var['nivel'];
				$correo=$var['correo'];
				$foto=$var['foto'];
				$nombre=$var['nombre'];
			}
			if ($nick==$usuario && $bcontra==$contra && $nivel=='ADMINISTRADOR') {


				$_SESSION['nick']=$nick;
				$_SESSION['nombre']=$nombre;
				$_SESSION['nivel']=$nivel;
				$_SESSION['correo']=$correo;
				$_SESSION['foto']=$foto;
				header('location:../extend/alerta.php?msj=Bienvenido&c=home&p=home&t=success');
			//if de las variables
			}else{
				header('location:../extend/alerta.php?msj=No tienes acceso&c=salir&p=salir&t=error');
			}
			//if del row
			}else{
				header('location:../extend/alerta.php?msj=Los datos no son correctos&c=salir&p=salir&t=error');
			}
			//llave del else principal
			}

///cierra if post	
}else{
	header('location:../extend/alerta.php?msj=Debes Logearte&c=salir&p=salir&t=error');
}

 ?>