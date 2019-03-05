
<?php require 'config/db.php' ;
require 'include/validar.php';
session_start();


    
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mesa de Ayuda:::Registrar Programa/Area</title>
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
    <?php $query= "SELECT id_unidad,nombre FROM unidad";
    $validar= $conexion->query($query); 
    ?>
    <div class="d-flex justify-content-center" style="margin-bottom: 80px;">
            
          <form style="margin-top: 10px;" class="col col-md-6" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">

  <div class="form-group">
    <label for="nombreproarea">Nombre del programa o area:</label>
    <input type="text" class="form-control" name="nombreproarea" placeholder="Escriba el nombre del programa o area">
  </div>
  
    <div class="form-group">
      <label for="selectunidad">Unidad/Oficina:</label>
      <select id="unidad" name="unidad" class="form-control">
        <option value="#">-Seleccione unidad u oficina-</option>
        <!-- <option value="<?php echo $datoselect['id_unidad'];?>"><?php echo $datoselect['nombre'];?> </option> -->
                <?php 
                while($datoselect = mysqli_fetch_array($validar)){
                 ?>
                    <option value="<?php echo $datoselect['id_unidad'];?>"><?php echo $datoselect['nombre'];?> </option>
                <?php 
              }
              ?> 
      </select>
    </div>
    
  
  
  <button type="submit" name="registrarproarea" class="btn   btn-block repabtn col-2" style="font-weight: normal;">Aceptar</button>
</form>


     </div>
     
     
     
    
     <!-- Site Footer -->
    
     </div> 
     <?php require "php/footer.php"; ?>
     <!-- Scripts -->
     <script src="js/jquery-3.3.1.min.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
     <script src="js/functions.js"></script>
     <script src="js/bootstrap.js"></script>
     <script src="js/slim.js"></script>
     <script src="js/popper.js"></script>
     
     <!-- /Scripts -->
     
     </body>







