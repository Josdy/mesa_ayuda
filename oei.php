<?php 
require "config/db.php";
require 'include/validar.php';
session_start();

// $u=$_SESSION['nombre'];
// echo $u;

if (empty($_SESSION['username'])) {
 header("Location: index.php");
}else{

 ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Estadistica e Informatica::: Mesa de Ayuda</title>
    <link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
        <meta property="og:title" content="Red de Salud Pacifico Sur" />
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic">
    
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    
</head>
     <body>
         <!-- Cabecera -->
     <?php include "php/top.php"; ?>
     <div class="container-fluid">
    
     
        
    <div class="d-flex justify-content-center">
            
            <h3 style="text-align: center;"class="  text-primary"> TRABAJAMOS EN TU SOLUCION! </p>
           
          
     <img class="col col-md-12" style="width: 600px;height: 400px" src="images/soporte_fondo.jpg" alt="Fondo Soporte Tecnico OEI">
     
     </div>
     
     
     
    
    
     </div>
      <!-- Site Footer -->
     <?php include "php/footer.php"; ?>
     <!-- Scripts -->
     <script src="js/jquery-3.3.1.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
     <script src="js/functions.js"></script>
     <script src="js/bootstrap.js"></script>
     <script src="js/slim.js"></script>
     <script src="js/popper.js"></script>
     
     <!-- /Scripts -->
     
     </body>

</html>
<?php } ?>