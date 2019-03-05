<?php require 'config/db.php';
require 'include/validar.php';
session_start(); ?>



<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de Ayuda:::Bandeja Programa/Area</title>
<link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
<meta property="og:title" content="Red de Salud Pacifico Sur" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>





<body>
<?php require "php/top.php"; ?>
<div class="container-fluid">
	<div class="container">
	<div style="margin-bottom: 10px;margin-top: 10px;">
	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#agrega"><span class="fas fa-plus"></span>Agregar Programa/Area </button>
	</div>
<table id="example" class="display nowrap">
	<thead>
		<tr>
			<th>ID</th>
			<th>PROGRAMA/AREA</th>
			<th>UNIDAD</th>
			<th data-sortable="false">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		<?php 
$sql="SELECT pa.id_programa_area as id_proarea,pa.nombre as nombreproarea,u.id_unidad as idu, u.nombre as nombreunidad
FROM programa_area pa
join unidad u on u.id_unidad=pa.id_unidad
WHERE pa.estado=1";
$result= $conexion->query($sql);
if ($result->num_rows>0) {
	
	while($row=$result->fetch_assoc()){
		$id_proarea=$row['id_proarea'];
		$nombreproarea=$row['nombreproarea'];
		$id_unidad=$row['idu'];
		$nombreunidad=$row['nombreunidad'];
		 ?>
		<tr>
		<td><?php echo $id_proarea; ?></td>
		<td><?php echo $nombreproarea; ?></td>
		<td><?php echo $nombreunidad ?></td>
		<td>
		<a href="#edita<?php echo $id_proarea;?>" data-toggle="modal"> 
		<button type='button' class='btn btn-warning btn-sm'><span class='fas fa-edit' aria-hidden='true'></span></button>
		</a>
		<a href="#elimina<?php
		 echo $id_proarea;
		 ?>" data-toggle="modal"> 
		<button type='button' class='btn btn-danger btn-sm'><span class='fas fa-trash-alt' aria-hidden='true'></span></button>
		</a>

		</td>
		<div id      ="edita<?php echo $id_proarea; ?>" class="modal fade" role="dialog">
		<form method ="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<div class   ="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class   ="modal-content">
		<div class   ="modal-header">
		<h5 class    ="modal-title">Editar Programa/Area</h5>
		<button type ="button" class="close" data-dismiss="modal" aira-label="Close"><span aria-hidden="true">&times;</span></button>
		
		</div>
		<div class   ="modal-body">
		<input type  ="hidden" name="editarproarea" value="<?php echo $id_proarea; ?>">
		<div class   ="form-group">
		
		<label for="nombreproarea">Nombre del programa o area:</label>
		<input type="text" class="form-control" name="nombreproarea" placeholder="Escriba el nombre del programa o area" value="<?php echo $nombreproarea; ?>" required="" autofocus>
		
		<label for="selectunidad">Unidad/Oficina:</label>
		<input type="hidden" class="form-control"  name="id_unidad" value="<?php echo $id_unidad; ?>">
		<input type="text" class="form-control" name="nombreunidad" value="<?php echo $nombreunidad; ?>" readonly>

		</div>
		<div class   ="modal-footer">
		<button type ="submit" class="btn btn-primary" name="actualizarproarea"><span class="fas fa-edit"></span> Editar</button>
		<button type ="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-times"></span> Cancelar</button>
		</div>
		</div>
		</div>
		</div>
		</form>
		</div>

		</tr>

		 <div id="elimina<?php
 echo $id_proarea;
  ?>" class="modal fade1" role="dialog">
 <div class="modal-dialog">
 <form method="post" class="form-horizontal" role="form">
  <div class="modal-content">
 <div class="modal-header">
 <h5 class="modal-title">Eliminar Programa/Area</h5>
 <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
 
 </div>
 <div class="modal-body">
 <input type="hidden" name="eliminaridproarea" value="<?php 
 echo $id_proarea;
  ?>">
 <div class="form-group">¿Esta seguro de eliminar el programa/area  <strong>
 <?php
  echo $nombreproarea;
   ?>?</strong>
 </div>
 </div>
 <div class="modal-footer">
 <button type="submit" name="eliminarproarea" class="btn btn-danger"><span class="fas fa-trash-alt"></span> SI</button>
 <button type="button" class="btn btn-default" data-dismiss="modal"><span class="fas fa-times-circle"></span> NO</button>
 </div>
 </div>
 
 </form>
 </div>
 </div>
		

		 <?php 	}
}
 ?>
		
	</tbody>

</table>




	</div>



<div class="modal fade" id="agrega">
<div class="modal-dialog modal-lg" >
<div class="modal-content">
<form method="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
<div class="modal-header">
<h5 class="modal-title">Registrar Programa o Area</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php $query= "SELECT id_unidad,nombre FROM unidad";
$validar= $conexion->query($query); 
?>

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
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" name="registrarproarea"><span class="fas fa-plus"></span> Aceptar</button>
<button type="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-times-circle"></span> Cancel</button>
</div>
</form>
</div>
</div> 
</div>
</div>



</div>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/funciones.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/functions.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/slim.js"></script>
<script src="js/popper.js"></script>



</body>
<?php require "php/footer.php"; ?>




</html>