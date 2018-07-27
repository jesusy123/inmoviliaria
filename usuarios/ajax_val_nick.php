<?php 
include '../conexion/conexion.php';

$nick = $con->real_escape_string($_POST['nick']);
$sel = $con->query("SELECT id FROM usuarios WHERE nick = '$nick'");
$row = mysqli_num_rows($sel);
if ($row !=0) {
	echo "<label style='color:red'>No disponible</label>";
}else{
	echo "<label style='color:green'>Disponible</label>";
}
$con->close();


 ?>