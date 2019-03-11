<?php require 'config/db.php';
require 'include/validar.php';
session_start(); ?>



<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de Ayuda:::Bandeja Peticiones</title>
<link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
<meta property="og:title" content="Red de Salud Pacifico Sur" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>





<body>
<?php require "php/top.php"; ?>
<div class="container-fluid">
	
	<div class="container d-flex justify-content-center" style="margin-top: 30px;">
	
<table id="example" class="display nowrap">
	<thead>
		<tr>
			<th>ID</th>
			<th>PERSONAL</th>
			<th>PROCEDENCIA</th>
			<th>ASUNTO</th>
			<th>FECHA</th>
			
			
			
			
			<th data-sortable="false">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$id_usuario=$_SESSION['id_usuario'];
		
$sql="SELECT p.id_problema as idp,p.descripcion as descripcion, p.fecha_registro as fecha ,
a.nombre as nombreasunto, 
t.nombre as tnom, t.paterno as tpat, t.materno as tmat, pa.nombre  as nombreproarea, und.nombre as nombreund
from problema p
join usuario u on u.id_usuario=p.id_usuario
JOIN asunto a on a.id_asunto=p.id_asunto
JOIN trabajador t on t.id_usuario=p.id_usuario
JOIN programa_area pa on pa.id_programa_area=t.id_programa_area
JOIN unidad und on und.id_unidad=pa.id_unidad
WHERE p.estado_peticion=0";
$result= $conexion->query($sql);
if ($result->num_rows>0) {
	
	while($row=$result->fetch_assoc()){
		$id_problema=$row['idp'];
		$nombre=$row['tnom'];
		$paterno=$row['tpat'];
		$materno=$row['tmat'];
		$asunto=$row['nombreasunto'];
		$fecha=$row['fecha'];
		$descripcion=$row['descripcion'];
		$proarea=$row['nombreproarea'];
		$unidad=$row['nombreund'];
		
		
		 ?>
		<tr>
		<td><?php echo 	$id_problema ?></td>
		<td><?php echo  $nombre . " " . $paterno . " " . $materno?></td>
		
		<td><?php echo $proarea . " - " . $unidad?></td>
		<td><?php echo $asunto?></td>
		<td><?php echo  $fecha?></td>
		
		
		<td>



		<a href="#edita<?php echo $id_problema;?>" data-toggle="modal"> 
		<button type='button' class='btn btn-warning btn-sm ' ><span class='fas fa-edit' aria-hidden='true'></span></button>
		</a>
		

 
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
		<input type  ="hidden" name="editarpeticion" value="<?php echo $id_problema; ?>">
		<div class="form-group">



<div class="row">

	<div class="col-6">
		<h3>PROBLEMA:</h3>
		<label>Remitente:</label>
		
		<textarea  readonly  class="form-control" name="remitente"  rows="3" required="" ><?php echo $nombre . " " . $paterno . " " . $materno . "\n" . $proarea ."\n" . $unidad;?></textarea> 
		<br>
		<label>Averia:</label>
		
		<input type="text" class="form-control"  readonly value="<?php echo $asunto; ?>">
		
		<br>
		<label for="descripcionaveria">Descripcion:</label>
		<textarea  readonly maxlength="900" class="form-control" name="descripcion" placeholder="Escriba una breve descripcion del problema." rows="5" required="" ><?php echo $descripcion; ?></textarea>
</div>
<div class="col-6">
		<h3>SOLUCION:</h3>
		<label>Soporte realizado por:</label>
		
		<textarea  readonly  class="form-control" name="remitente"  rows="3" required="" ><?php echo $_SESSION['nombre'] . " " . $_SESSION['paterno'] . " " . $_SESSION['materno']?></textarea> 
		<br>

		<label>Solucion:</label>
		
		<textarea  maxlength="900" class="form-control" name="solucion"  rows="5" required="" ></textarea> 
		<br>
		
		<label>Tiempo de servicio (min):</label>
		<input type="number" value="10" min="0" max="60" step="10" class="form-control col-4" required="" name="tiemposervicio" />
		

</div>
</div>


		</div>
		<div class   ="modal-footer">
		<button type ="submit" class="btn btn-primary" name="actualizarpeticion"><span class="fas fa-edit"></span> Editar</button>
		<button type ="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-times"></span> Cancelar</button>
		</div>
		</div>
		</div>
		</div>
		</form>
		</div>

		</tr>
		

		 <?php 	}
}
 ?>
		
	</tbody>

</table>




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