<?php 
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$nick=$con->real_escape_string(htmlentities($_POST['nick']));
	$pass1=$con->real_escape_string(htmlentities($_POST['pass1']));
	
	$nivel=$con->real_escape_string(htmlentities($_POST['nivel']));
	$nombre=$con->real_escape_string(htmlentities($_POST['nombre']));
	$correo=$con->real_escape_string(htmlentities($_POST['correo']));

	///validaciones del formulario
	if (empty($nick)||empty($pass1)||empty($nivel)||empty($nombre)) {
		header('location:../extend/alerta.php?msj=Hay un campo vacio&c=us&p=in&t=error');
		exit;
	}
	if (!ctype_alpha($nick)) {
		header('location:../extend/alerta.php?msj=El campo nick no contiene solo letras&c=us&p=in&t=error');
	}
	if (!ctype_alpha($nivel)) {
		header('location:../extend/alerta.php?msj=El campo nivel no contiene solo letras&c=us&p=in&t=error');
	}

	//permitir letras y espacios
	$caracteres="ABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	for ($i=0; $i < strlen($nombre); $i++) { 
		$buscar=substr($nombre, $i,1);
		if (strpos($caracteres, $buscar)==false) {
			header('location:../extend/alerta.php?msj=El campo nombre no contiene solo letras&c=us&p=in&t=error');
		}
	}

	$usuario=strlen($nick);
	$contra=strlen($pass1);

	if ($usuario<8 || $usuario>15) {
		header('location:../extend/alerta.php?msj=la logitud del nick no es valida&c=us&p=in&t=error');
	}

	if ($contra<8 || $contra>15) {
		header('location:../extend/alerta.php?msj=la logitud de la contrsena no es valida&c=us&p=in&t=error');
	}

	if (empty($correo)) {
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			header('location:../extend/alerta.php?msj=Coloca una direccion de correo valida&c=us&p=in&t=error');
			exit;
	}
		}

	$extension='';
	$ruta='foto_perfil';
	$archivo=$_FILES['foto']['tmp_name'];
	$narchivo=$_FILES['foto']['name'];
	$info=pathinfo($narchivo);


	if ($archivo !='') {
		$extension = $info['extension'];
		if ($extension =="png" || $extension=="PNG" || $extension =="jpg" || $extension=="JPG") {
			move_uploaded_file($archivo, 'foto_perfil/'.$nick.'.'.$extension);
			$ruta = $ruta."/".$nick.'.'.$extension;
		}else{
			header('location:../extend/alerta.php?msj=Lo que tratas de cargar no es una imagen&c=us&p=in&t=error');
		}
		
	}else{
		$ruta="foto_perfil/perfil.png";
	}

	$pass1=sha1($pass1);
	$ins=$con->query("INSERT INTO usuarios VALUES(null,'$nick','$pass1','$nombre','$correo','$nivel',1,'$ruta')");
	if ($ins) {
		header('location:../extend/alerta.php?msj=Correcto&c=us&p=in&t=success');
 }else{
 	header('location:../extend/alerta.php?msj=No se pudo insertar&c=us&p=in&t=error');
 	//echo("Error description: " . mysqli_error($con));
 }

 $con->close();

}else{
	header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
 }

?>

