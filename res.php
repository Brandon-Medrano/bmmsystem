<?php
		session_start();
		include('conex.php'); 
		if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='e'){
		}else{
			header('location:error.php');
		}
		if($_SESSION['tipo_usu']=='a'){
			$titulo='Administrador';
		}else{
			$titulo='Usuario';
		}
		$usuario=limpiar($_SESSION['username']);
		$sqll=mysql_query("SELECT * FROM usuarios WHERE usu='$usuario'");
		if($dato=mysql_fetch_array($sqll)){
			$nombre=$dato['nom'];
			$palabra=explode(" ", $nombre);
			$nomb=$palabra[0];
		}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

	include("conex.php");
	?>

	<?php


    $uno=$_POST['first_name'];
    $dos=$_POST['last_name'];
    $tres=$_POST['password'];
    $cuatro=$_POST['password2'];
    $cinco=$_POST['email'];
    $seis=$_POST['telefono'];
    
            $sql1="insert into form values('$uno','$dos','$tres','$cuatro','$cinco','$seis')";
            $consulta1=mysql_query($sql1,$cone);
             
           if($consulta1)
            {
           echo"<script> alert('Datos Guardados');window.location='index.php';</script>";
            }
	        else{
			echo"<script> alert('Error al realizar registro');window.location='index.php';</script>";
			}
 ?>
 
 </body>
</html>
 
 