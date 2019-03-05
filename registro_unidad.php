
<?php require 'config/db.php' ;
require 'include/validar.php';

session_start();


    
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mesa de Ayuda:::Registrar Unidad</title>
    <link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
        <meta property="og:title" content="Red de Salud Pacifico Sur" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic">
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    
</head>
     <body  > <!-- Cabecera -->
     <?php include "php/top.php"; ?>
     <div class="container-fluid ">
    
     
        
<div class="d-flex justify-content-center ">

<form style="margin-top: 80px;" class="col col-md-6 " method="post" id="reg-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

<div class="form-group ">
<label for="nombreUnidad">Nombre de la unidad</label>
<input type="text" class="form-control" id="nombreunidad" name="nombreunidad" placeholder="Escriba el nombre de la Unidad/Oficina" required="">
<label id="result"></label>
</div>
<button style="width: 150px; margin-top: 20px; font-weight: normal; "type="submit" name="registrarUnidad" class="btn btn-block repabtn">Aceptar</button>

</form>


</div>
  
     
     
   
     </div> 
     <!-- Site Footer -->
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





