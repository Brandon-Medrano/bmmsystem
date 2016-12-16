<?php
		session_start();
		include_once('php_conexion.php'); 
		
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
      if($dato=mysql_fetch_array($can)){
				if($dato['estado']=='s'){
					$_SESSION['username']=$dato['usu'];
					$_SESSION['tipo_usu']=$dato['tipo'];
          
					///////////////////////////////
					if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='u'){						
						header('location:Administrador.php');
					}
				}
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <title>Bmmsystem</title>
</head>
<body  style="padding-left:10%; padding-right:10%">
               <div class="row">
                  <div class="col s12">
                       <header align="center" class="card-panel cyan accent-3 z-depth-4">
                              <h1 class="white-text">Bienvenido Bmmsystem</h1>
                       </header>        
               </div>
               </div>
<!-- fomluario -->
               <form class="form-horizontal" method="POST" action="">
<div class="card-panel white z-depth-4">
                   <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">ID USUARIO</label>
                                <div class="col-sm-10">
                                    <input type="number_format" class="form-control" name="usuario" placeholder="ID User" >
                               </div>           
                      </div>
                      <!-- Otro-->
                                      <div class="form-group">
                                           <label for="inputPassword3" class="col-sm-2 control-label">CONTRASEÑA</label>
                                                <div class="col-sm-10">
                                                      <input type="password" class="form-control" name="contra"  placeholder="Password" >
                                                </div>
                                       </div>
                       <!--otro -->                
                                      <div class="form-group">
                                             <div class="col-sm-offset-2 col-sm-10">
                                                   <div class="checkbox">
                                                      <label>  
                                                          <input type="checkbox"> Remember me
                                                      </label>
                                                   </div>
                                              </div>
                                       </div>
                                       <div class="form-group">
                                                      <div class="col-sm-offset-2 col-sm-10">
                                                           <button type="submit" class="btn btn-default">Enviar</button>
                                                       </div>
                                       </div>
               </form>
</div>
    
<?php
		$act="1";
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=limpiar($_POST['usuario']);
			$contra=limpiar($_POST['contra']);

			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if(!$dato=mysql_fetch_array($can)){
				if($act=="1"){
					echo '<div class="alert alert-error" align="center"><strong>Usuario y Contraseña Incorrecta</strong></div>';
				}else{
					$act="0";
				}
			}else{
				if($dato['estado']=='n'){
					echo '<div class="alert alert-error" align="center"><strong>Consulte con el Administrador</strong></div>';
				}
			}
		}else{
			
		}
	?>
</body>
 <footer align="center">Bmmmsystem@ Derechos Reservados</footer>
</html>
