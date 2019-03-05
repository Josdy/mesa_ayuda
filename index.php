<?php require 'config/db.php' ;
require 'include/validar.php';?>

<!DOCTYPE html>
<html>
<head>
  <title>Mesa de Ayuda</title>
  <link rel=" icon" href="images/red_de_salud_pacifico_sur.ico">
       <link rel="stylesheet" href="css/bootstrap.css">
       <link rel="stylesheet" href="css/estilos.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </head>
<body >



<div class="container">
  <div class="d-flex justify-content-center h-100">
    <div class="card" >
      <div class="card-header" >
        <div class="d-flex justify-content-center">
        <img src="images/red_de_salud_pacifico_sur.png" alt="" style="background-color: #06f;margin-bottom: 10px; border-radius: 10px;">
        </div>
        <h3 style=" text-align: center;">Iniciar Sesion</h3>
              </div>
      <div class="card-body">
        <form method="post">
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
			<input type ="text" class="form-control" placeholder="Usuario" name="username"required="">
						</div>
          <div class="input-group form-group">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <input type="password" class="form-control" placeholder="Contraseña" name="password" required="">
            
          </div>
           <div class="card-footer">
        
        <div class="d-flex justify-content-center">
          <a href="recuperar_password.php">Olvide mi contraseña</a>
        </div>
      </div>
                  <div class="form-group ">
            <input type="submit" name="login" value="Aceptar" class="btn float-right btn-estilo">
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</body>
</html>



<style type="text/css">
a:hover{
  color: white;
  text-decoration: none;
  background-color: red;
  border-radius: 2px;
  width: 160px;
  height: 25px;
  text-align: center;
  padding: 2px;
  font-size: .9em;
}
@import url('https://fonts.googleapis.com/css?family=Numans');
html,body{
background-image: url('http://getwallpapers.com/wallpaper/full/5/b/4/5514.jpg');
background-size: cover;
background-repeat: no-repeat;
height: 100%;
font-family: 'Numans', sans-serif;
}

</style>
