<?php 
require "config/db.php";
require 'include/validar.php';
session_start();


?>

<!doctype html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de Ayuda:::Bandeja Unidad</title>


<link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
<meta property="og:title" content="Red de Salud Pacifico Sur" />
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>
<body>
<!-- Cabecera -->
<?php include "php/top.php"; ?>
<div class="container-fluid">




<div class="container">

<div class="d-flex justify-content-start" style="margin-top: 10px;margin-bottom: 10px;">
<a href="#agrega" data-toggle="modal">
<button type='button' class='btn btn-success btn-sm' data-toggle="modal" ><span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Agregar Unidad</button>
</a>
</div>

<table id="example" class="display nowrap">
<thead>
<tr>
<th>ID</th>
<th>UNIDAD</th>
<th data-sortable="false">ACCIONES</th>

</tr>
</thead>
  <tbody>
    <?php 
$sql = "SELECT * FROM unidad where estado=1";
$result = $conexion->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
$id = $row['id_unidad'];
$nombreunidad = $row['nombre'];
     ?>
     <tr>
       <td><?php echo  $id ?></td>
       <td><?php echo $nombreunidad ?></td>
       <td>
         <a href="#edita<?php echo $id;?>" data-toggle="modal"> 
<button type='button' class='btn btn-warning btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true' data-toggle="modal" data-target="#edita"></span></button>
</a>
<a href="#eliminar<?php echo $id;?>" data-toggle="modal">
<button type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button>
</a>
       </td>


<div id      ="edita<?php echo $id; ?>" class="modal fade" role="dialog">
<form method ="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<div class   ="modal-dialog modal-lg">
<!-- Modal content-->
<div class   ="modal-content">
<div class   ="modal-header">
  <h5 class    ="modal-title">Editar Unidad</h5>
<button type ="button" class="close" data-dismiss="modal" aira-label="Close"><span aria-hidden="true">&times;</span></button>

</div>
<div class   ="modal-body">
<input type  ="hidden" name="editarunidad"  id="idu" value="<?php echo $id; ?>">
<div class   ="form-group">
<label  for="nombreunidad">Nombre de la Unidad/Oficina:</label>

<input type  ="text" class="form-control" id="nombreunidad" name="nombreunidad" value="<?php echo $nombreunidad; ?>" placeholder="Nombre de la unidad" required autofocus>

</div>
<div class   ="modal-footer">
<button type ="submit" class="btn btn-primary" name="actualizarunidad"><span class="glyphicon glyphicon-edit"></span> Editar</button>
<button type ="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar</button>
</div>
</div>
</div>
</div>
</form>
</div>



 
 <div id="eliminar<?php echo $id; ?>" class="modal fade" role="dialog">
 <div class="modal-dialog">
 <form method="post" class="form-horizontal" role="form">
 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title">Eliminar Unidad</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
 
 </div>
 <div class="modal-body">
 <input type="hidden" name="eliminaru" id="eliminaru" value="<?php echo $id; ?>">
 <div class="form-group">¿Esta seguro de eliminar la unidad  <strong>
 <?php echo $nombreunidad; ?>?</strong>
 </div>
 </div>
 <div class="modal-footer">
 <button type="submit" name="eliminarunidad" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> SI</button>
 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> NO</button>
 </div>
 </div>
 
 </form>
 </div>
 </div>
</tr>

   <?php }

 } ?>
  </tbody>
  
</table>















<div class="modal fade" id="agrega">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <form method="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <div class="modal-header">
        <h5 class="modal-title">Registrar Unidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group ">
      <label for="nombreUnidad">Nombre de la unidad</label>
      <input type="text" class="form-control" id="nombreunidad" name="nombreunidad" placeholder="Escriba el nombre de la Unidad/Oficina" required="">
     <label id="result"></label>
    </div>
      </div>
      <div class="modal-footer">
  <button type="submit" class="btn btn-primary" name="registrarUnidad"><span class="fas fa-plus"></span> Aceptar</button>
  <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-trash-alt"></span> Cancel</button>
  </div>
</form>
    </div>
  </div> 
</div>
</div>





<!-- <div id="agregar" class="modal fade">
<div class="modal-dialog modal-lg">

<div class="modal-content">
<form method="post" class="form-horizontal" role="form">
<div class="modal-header">
  <h4 class="modal-title">Añadir Unidad</h4>
<button type="button" class="close" data-dismiss="modal">&times;</button>

</div>
<div class="modal-body">
<div class="form-group">
<label  for="nombreunidad">Nombre de la unidad:</label>


<input type="text" class="form-control" id="nombreunidad" name="nombreunidad" placeholder="Nombre Unidad" required="" >
<label id="result"></label>
</div>

</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" name="registrarUnidad"><span class="glyphicon glyphicon-plus"></span> Aceptar</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-trash-alt"></span> Cancel</button>
</div>
</form>
</div>
</div>
</div>
 -->




</div>

<div style="margin-top: 100px;">
<!-- Site Footer -->

<?php include "php/footer.php"; ?>
</div>

<!-- Scripts -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/funciones.js"></script>
<script src="js/functions.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/slim.js"></script>
<script src="js/popper.js"></script>


<!-- /Scripts -->

</body>

</html>
