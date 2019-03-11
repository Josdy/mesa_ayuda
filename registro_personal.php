
<?php require 'config/db.php' ;
require 'include/validar.php';
session_start();

    

?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mesa de Ayuda:::Registrar Personal</title>
    <link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
        <meta property="og:title" content="Red de Salud Pacifico Sur" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic">
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    
</head>
     <body > 
      <?php include "php/top.php"; ?>
     <div class="container-fluid">
     
    
     
        
    <div class="w-75 p-3 container" style="margin-top: 10px; margin-bottom: 100px;">
            
          <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
  
  <div class="d-flex justify-content-start">

  <div class="form-group col-6">
    <h4>DATOS DEL PERSONAL</h4><br>
    <label for="dniTrabajador">DNI del Trabajador:</label>
    <input type="text" class="form-control" name="dniTrabajador" id="dniTrabajador"placeholder="Escriba el dni del trabajador" required="" autofocus="">
    <label id="resultt"></label>
    <br>
    <label for="nombresTrabajador">Nombres del Trabajador:</label>
    <input type="text" class="form-control" name="nombresTrabajador" placeholder="Escriba el nombre del trabajador" required="" >
    <br>
    <label for="paternoTrabajador">Apellido Paterno:</label>
    <input type="text" class="form-control" name="paternoTrabajador" placeholder="Escriba el apellido paterno del trabajador" required="">
    <br>
    <label for="maternoTrabajador">Apellido Materno:</label>
    <input type="text" class="form-control" name="maternoTrabajador" placeholder="Escriba el apellido materno del trabajador" required="">
    <br>
 
    

    <label for="selectUnidad">Unidad:</label>
    <select name="unidadselect" class="form-control" id="unidadselect">
 
     </select>
    <br>
  <label for="selectproarea">Programa/Area:</label>
    <select name="proareaselect" class="form-control" id="proareaselect">
     <option value="#">Seleccionar Programa/Area</option> 
       </select>


  </div>
  <div class="form-group col-6">
    <h4>DATOS DEL USUARIO</h4><br>
    <label for="usuarioTrabajador">Nombre de usuario:</label>
    <input type="text" class="form-control" name="nombreusuario" id="nombreusuario" placeholder="Escriba el nombre de usuario" required="">
    <label id="result"></label>
    <br>
    <label for="passwordTrabajador">Password:</label>
    <input type="password" class="form-control" name="passwordusuario" placeholder="Escriba la contraseña" required="">
  </div>
  </div>
  
<div class="d-flex justify-content-center ">
  <button type="submit" class="btn btn-block repabtn col-2" name="registrarpersonal">Aceptar</button></div>
</form>


     </div>
     
     
     
    
     <!-- Site Footer -->
    
     </div> 
     <?php include "php/footer.php"; ?>
     <!-- Scripts -->
     <script src="js/jquery-3.3.1.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
     <script src="js/functions.js"></script>
     <script src="js/funciones.js"></script>
     <script src="js/bootstrap.js"></script>
     <script src="js/slim.js"></script>
     <script src="js/popper.js"></script>
     
     <!-- /Scripts -->
     
     </body>







