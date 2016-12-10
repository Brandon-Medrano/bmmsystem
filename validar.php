
<?php



require("conex.php");

$username=$_POST['ID'];
$pass=$_POST['contraseña'];

$sql2=mysql_query("SELECT * FROM usuarios WHERE ID='$username'");
if($f2=mysql_fetch_array($sql2)){
    if($pass==$f2['contraseña']){
        echo '<script>alert("Bienvenido Administrador")</script> ';
        echo "<script>location.href='regis.php'</script>";
        
    }
}


?>