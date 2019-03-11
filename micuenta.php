	<?php require 'config/db.php';
	require 'include/validar.php'; 
	session_start(); ?>

<title>Mesa de Ayuda:::Mi Cuenta</title>
<link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
<meta property="og:title" content="Red de Salud Pacifico Sur" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/slim.js"></script>
	<script src="js/popper.js"></script>
	<div class="container ">
	<div style="justify-content: center; text-align: center; color: white; margin-top: 30px;">
			<h4>Solicitud Recuperar Contraseña</h4>
			</div>
			<div style="justify-content: center; margin:auto;">
	<div class="middle ">

	<div class="col-md-12">
	
	<form method="post"  >

		<div class="d-flex justify-content-center">
			<img src="images/red_de_salud_pacifico_sur.png" alt="" style="justify-content: flex-start; width: 200px;height: 80px; margin-top: -20px; background-color: #06f; border-radius: 10px;">
			
			</div>
        
	<p style="color:white;">Nombre de usuario</p>
	
<input type="text" name="user" class="form-control input-lg"  readonly value="<?php $usuario=$_SESSION['username']; echo $usuario;?>">
	<br>

	<p style="color:white;">Contraseña Nueva</p>          
	<input type="password" class="form-control input-lg" name="pass1" id="password1" placeholder="Escriba su contraseña" required="" />
	<span id="eye" style="display:none" data-click-state="1" class="far fa-eye"></span>
	

		<p style="color:white;">Repita Contraseña</p>          
	<input type="password" class="form-control input-lg" name="pass2"id="password2" placeholder="Repita la contraseña" required="" />
	<span id="eye" style="display:none" data-click-state="1" class="far fa-eye"></span>
	<div class="row">
<div class="col-sm-12" style="color: white;margin-top: 5px; text-align: center;">
<span id="pastate" style="color: red" class="fas fa-times-circle"></span>  Coinciden las contraseñas
</div>
</div>
		<div class="process" style="display:none; margin-top: -20px;"><p> </p>
	<div class="progress">
	<div id="bar" class="progress-bar progress-bar-danger progress-bar-striped active" style="width: 10%;">
	Poor 
	</div>
	</div>
	</div>
	<button style="margin-top: 20px;" type="submit" name="micuenta" class="btn btn-block repabtn">Aceptar</button>
	   <div  style=" margin-top: 20px;"class="d-flex justify-content-center">
          <a href="oei.php">Ir a la pagina principal</a>
        </div>

		
	</form>
	
	
	</div>
	
	</div>
	
	</div>
	
	
	
		<script src="js/funciones.js"></script>
	<style type="text/css">
	
	html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/5/b/4/5514.jpg');
background-size: cover;
background-repeat: no-repeat;

font-family: 'Numans', sans-serif;
}
a:hover{
  color: white;
  text-decoration: none;
  
  text-align: center;
  
}

	
	</style>
	