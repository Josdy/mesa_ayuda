<?php require 'config/db.php';
require 'include/validar.php';
session_start(); ?>



<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de Ayuda:::Bandeja Averia</title>
<link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
<meta property="og:title" content="Red de Salud Pacifico Sur" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>





<body>
<?php require "php/top.php"; ?>
<div class="container-fluid">
	<div style="margin-bottom: 30px;margin-top: 20px;margin-left: 190px;" >
	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#agrega"><span class="fas fa-plus"></span>Agregar Peticion</button>
	</div>
	<div class="container d-flex justify-content-center">
	
<table id="example" class="display nowrap">
	<thead>
		<tr>
			<th>ID</th>
			<th>ASUNTO</th>
			<th>DESCRIPCION</th>
			<th>FECHA</th>
			<th>ESTADO</th>
			
			
			
			<th data-sortable="false">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$id_usuario=$_SESSION['id_usuario'];
		
$sql="SELECT p.id_problema idp, a.nombre as asunto,p.fecha_registro as fechareg, p.estado_peticion as estadopet, p.descripcion as descripcion
from problema p 
join usuario u on u.id_usuario=p.id_usuario
JOIN asunto a on a.id_asunto=p.id_asunto
where u.id_usuario= '$id_usuario'";
$result= $conexion->query($sql);
if ($result->num_rows>0) {
	
	while($row=$result->fetch_assoc()){
		$id_problema=$row['idp'];
		$asunto=$row['asunto'];
		$fecha=$row['fechareg'];
		$descripcion=$row['descripcion'];
		$estado_peticion=$row['estadopet'];
		
		
		 ?>
		<tr>
		<td><?php echo 	$id_problema ?></td>
		<td><?php echo  $asunto?></td>
		
		
		<td><?php echo $descripcion?></td>
		<td><?php echo  $fecha?></td>
		
		<td><?php if( $estado_peticion ==1){echo "ACTIVO"; }else{echo "EN PROCESO";} ?></td>
		<td>

<?php if($estado_peticion==0){ ?> 

		<a href="#edita<?php echo $id_problema;?>" data-toggle="modal"> 
		<button type='button' class='btn btn-warning btn-sm ' ><span class='fas fa-edit' aria-hidden='true'></span></button>
		</a>
		<a href="#elimina<?php echo $id_problema;
		 ?>" data-toggle="modal"> 
		<button type='button' class='btn btn-danger btn-sm'><span class='fas fa-trash-alt' aria-hidden='true'></span></button>
		</a>

 <?php } ?>
		</td>
		<div id      ="edita<?php echo $id_problema; ?>" class="modal fade" role="dialog">
		<form method ="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<div class   ="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class   ="modal-content">
		<div class   ="modal-header">
		<h5 class    ="modal-title">Editar Peticion</h5>
		<button type ="button" class="close" data-dismiss="modal" aira-label="Close"><span aria-hidden="true">&times;</span></button>
		
		</div>
		<div class   ="modal-body">
		<input type  ="hidden" name="editaraveria" value="<?php echo $id_problema; ?>">
		
		<?php $query= "SELECT id_asunto,nombre FROM asunto";
		$validar= $conexion->query($query); 
		?>
		
		<div class="form-group">
		<label for="selectaveria">Averia:</label>
		<select id="averia" name="selectaveria" class="form-control">
		<option  selected="<?php echo $id_problema; ?>" value="<?php echo $id_problema; ?>"><?php echo $asunto ?></option>
		<?php 
		while($datoselect = mysqli_fetch_array($validar)){
		?>
		<option value="<?php echo $datoselect['id_asunto'];?>"><?php echo $datoselect['nombre'];?> </option>
		<?php 
		}
		?> 
		</select>
		<br>
		<label for="descripcionaveria">Descripcion:</label>
		<textarea  maxlength="900" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion del problema." rows="5" required="" ><?php echo $descripcion; ?></textarea>
		</div>
		<div class   ="modal-footer">
		<button type ="submit" class="btn btn-primary" name="actualizaraveria"><span class="fas fa-edit"></span> Editar</button>
		<button type ="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-times"></span> Cancelar</button>
		</div>
		</div>
		</div>
		</div>
		</form>
		</div>

		</tr>



	<div id="elimina<?php
	echo $id_problema;
	?>" class="modal fade1" role="dialog">
	<div class="modal-dialog">
	<form method="post" class="form-horizontal" role="form">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title">Eliminar Peticion</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
	
	</div>
	<div class="modal-body">
	<input type="hidden" name="eliminaridaveria" value="<?php 
	echo $id_problema;
	?>">
	<div class="form-group">¿Esta seguro de eliminar la peticion <strong>
	<?php
	echo $asunto;
	?>?</strong>
	</div>
	</div>
	<div class="modal-footer">
	<button type="submit" name="eliminaraveria" class="btn btn-danger"><span class="fas fa-trash-alt"></span> SI</button>
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
<h5 class="modal-title">Registrar Averia</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?php $query= "SELECT id_asunto,nombre FROM asunto";
$validar= $conexion->query($query); 
?>

<div class="form-group">
<label for="selectaveria">Averia:</label>
<select id="averia" name="selectaveria" class="form-control">
<option value="#">-Seleccione un asunto</option>

<?php 
while($datoselect = mysqli_fetch_array($validar)){
?>
<option value="<?php echo $datoselect['id_asunto'];?>"><?php echo $datoselect['nombre'];?> </option>
<?php 
}
?> 
</select>
<br>
<label for="descripcionaveria">Descripcion:</label>
<textarea  maxlength="900" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion del problema." rows="5" required=""></textarea>
</div>
</div>
<div class="modal-footer">
<button type="submit" class="btn btn-primary" name="registraraveria"><span class="fas fa-plus"></span> Aceptar</button>
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