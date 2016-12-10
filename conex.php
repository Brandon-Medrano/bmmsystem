


<?php



	$conexion = mysql_connect("localhost","root","bmms");
	mysql_select_db("bmmsystem",$conexion);
	



	function limpiar($tags){
		$tags = strip_tags($tags);
		$tags = stripslashes($tags);
		$tags = mysql_real_escape_string($tags);
		return $tags;
	}

	function insertar()
	{
		echo"<script> alert('datos insertados correctamente'); window.location='index.php';</script>";
	}



?>
