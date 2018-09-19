<?php 
include '../conexion/conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<link rel="stylesheet" href="../css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">

	<style media="screen">
    header, main, footer {
      padding-left: 300px;
    }
	.button-collpase{
		display:none;
		}
    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
    .button-collpase{
		display:inherit;
		}
    }
	</style>

	<title>Proyecto</title>
</head>
<body>
<main>

<?php include 'menu_admin.php'; ?>