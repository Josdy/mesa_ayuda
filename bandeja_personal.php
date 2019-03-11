<?php require 'config/db.php';
require 'include/validar.php';
session_start(); ?>



<html>

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Mesa de Ayuda:::Bandeja Personal</title>
<link rel="shortcut icon" href="images/red_de_salud_pacifico_sur.ico">
<meta property="og:title" content="Red de Salud Pacifico Sur" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">

</head>





<body>
<?php require "php/top.php"; ?>
<div class="container-fluid">
	<div class="container d-flex justify-content-center">
	
<table id="example" class="display nowrap">
	<thead>
		<tr>
			<th>ID</th>
			<th>NOMBRES</th>
			<th>UNIDAD</th>
			<th>PROGRAMA</th>
			<th>ESTADO DEL AREA</th>
			<th>USUARIO</th>
			<th>ESTADO TRABAJADOR</th>
			
			
			<th data-sortable="false">ACCIONES</th>
		</tr>
	</thead>
	<tbody>
		<?php 
$sql="SELECT t.id_trabajador as id_trabajador , t.estado as estadotrabajador,t.dni as dni, t.nombre as nombretrabajador, t.paterno as paterno, t.materno as materno, pa.id_programa_area as idpa , pa.nombre nombreproarea, pa.estado as proareaestado, u.id_usuario as id_usuario , u.username as nombreusuario, u.password as pass , und.id_unidad as idu,  und.nombre as nombreund
FROM trabajador t
JOIN programa_area pa on pa.id_programa_area=t.id_programa_area
JOIN usuario u on u.id_usuario=t.id_usuario
join unidad und on und.id_unidad=pa.id_unidad";
$result= $conexion->query($sql);
if ($result->num_rows>0) {
	
	while($row=$result->fetch_assoc()){
		$id_trabajador=$row['id_trabajador'];
		$dni=$row['dni'];
		$nombres=$row['nombretrabajador'];
		$paterno=$row['paterno'];
		$materno=$row['materno'];
		$unidad=$row['nombreund'];
		$id_programa_area=$row['idpa'];
		$programa=$row['nombreproarea'];
		$estadoproarea=$row['proareaestado'];
		$usuario=$row['nombreusuario'];
		$pass=$row['pass'];
		$estadotrabajador=$row['estadotrabajador'];
		
		 ?>
		<tr>
		<td><?php echo 	$id_trabajador ?></td>
		<td><?php echo  $nombres. " ". $paterno . " " . $materno?></td>
		<td><?php echo  $unidad?></td>
		<td><?php echo $programa?></td>
		<td><?php if( $estadoproarea ==1){echo "ACTIVO"; }else{echo "INACTIVO";}?></td>
		<td><?php echo $usuario ?></td>
		<td><?php if( $estadotrabajador ==1){echo "ACTIVO"; }else{echo "INACTIVO";} ?></td>
		<td>
		<a href="#edita<?php echo $id_trabajador;?>" data-toggle="modal"> 
		<button type='button' class='btn btn-warning btn-sm'><span class='fas fa-edit' aria-hidden='true'></span></button>
		</a>
		<a href="#elimina<?php
		 echo $id_trabajador;
		 ?>" data-toggle="modal"> 
		<button type='button' class='btn btn-danger btn-sm'><span class='fas fa-trash-alt' aria-hidden='true'></span></button>
		</a>

		</td>
<div id      ="edita<?php echo $id_trabajador; ?>" class="modal fade" role="dialog">
		<form method ="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
		<div class   ="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class   ="modal-content">
		<div class   ="modal-header">
		<h5 class    ="modal-title">Editar Personal</h5>
		<button type ="button" class="close" data-dismiss="modal" aira-label="Close"><span aria-hidden="true">&times;</span></button>
		
		</div>
		<div class   ="modal-body">
		<input type  ="hidden" name="editartrabajador" value="<?php echo $id_trabajador; ?>">
		<div class   ="form-group">
			<div class="row">
		 <div class="col-6">
    <h4>DATOS DEL PERSONAL</h4><br>
    <label for="dniTrabajador">DNI del Trabajador:</label>
    <input type="text" class="form-control" name="dniTrabajador" id="dniTrabajador" value="<?php echo $dni; ?>" readonly>
    <label id="resultt"></label>
    <br>
    <label for="nombresTrabajador">Nombres del Trabajador:</label>
    <input type="text" class="form-control" name="nombresTrabajador" value="<?php echo $nombres; ?>" placeholder="Escriba el nombre del trabajador" required="" >
    <br>
    <label for="paternoTrabajador">Apellido Paterno:</label>
    <input type="text" class="form-control" name="paternoTrabajador"  value="<?php echo $paterno; ?>" placeholder="Escriba el apellido paterno del trabajador" required="">
    <br>
    <label for="maternoTrabajador">Apellido Materno:</label>
    <input type="text" class="form-control" name="maternoTrabajador" value="<?php echo $materno; ?>" placeholder="Escriba el apellido materno del trabajador" required="">
    <br>
 
    

    <label for="selectUnidad">Unidad:</label>
    <select name="unidadselect" class="form-control" id="unidadselect">
 <option  selected="<?php echo $row['idu']; ?>"><?php echo $unidad ?></option>
     </select>
    <br>
  <label for="selectproarea">Programa/Area:</label>
    <select name="proareaselect" class="form-control" id="proareaselect">
    	
     <option  selected="<?php echo $id_programa_area; ?>" value="<?php echo $id_programa_area; ?>"><?php echo $programa ?></option>
       </select>

       <br>
  <label for="selectestadot">Estado del trabajador:</label>
    <select name="estadotselect" class="form-control" id="selectestadot">
    	<option value="#">Seleccione Estado</option>
        
<?php 
$imp="";
  if( $estadotrabajador ==1){
  	$imp .= "<option selected='$estadotrabajador' value='$estadotrabajador'>ACTIVO</option>";
  	$imp .= "<option  value='0'>INACTIVO</option>";
  }else{
$imp .= "<option selected='$estadotrabajador' value='$estadotrabajador'>INACTIVO</option>";
  	$imp .= "<option  value='1'>ACTIVO</option>";
  } ECHO $imp;?>

    

    
       </select>

       


  </div>
  <div class=" col-6">
    <h4>DATOS DEL USUARIO</h4><br>
    <label for="usuarioTrabajador">Nombre de usuario:</label>
    <input type="text" class="form-control" name="nombreusuario" id="nombreusuario" value="<?php echo $usuario; ?>" placeholder="Escriba el nombre de usuario" required="">
    <label id="result"></label>
    <br>
    <label for="passwordTrabajador">Password:</label>
    <input type="password" class="form-control" name="passwordusuario" value="<?php echo  $pass; ?>" placeholder="Escriba la contraseña" required="">
  </div>
  </div>
		</div>
		<div class   ="modal-footer">
		<button type ="submit" class="btn btn-primary" name="actualizarpersonal"><span class="fas fa-edit"></span> Editar</button>
		<button type ="button" class="btn btn-warning" data-dismiss="modal"><span class="fas fa-times"></span> Cancelar</button>
		</div>
		</div>
		</div>
		</div>
		</form>
		</div>

		</tr>



	<div id="elimina<?php
	echo $id_trabajador;
	?>" class="modal fade1" role="dialog">
	<div class="modal-dialog">
	<form method="post" class="form-horizontal" role="form">
	<div class="modal-content">
	<div class="modal-header">
	<h5 class="modal-title">Dar de baja al Trabajador</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
	
	</div>
	<div class="modal-body">
	<input type="hidden" name="eliminaridt" value="<?php 
	echo $id_trabajador;
	?>">
	<div class="form-group">¿Esta seguro de dar de baja a <strong>
	<?php
	echo $nombres. " ". $paterno . " " . $materno;
	?>?</strong>
	</div>
	</div>
	<div class="modal-footer">
	<button type="submit" name="eliminartrabajador" class="btn btn-danger"><span class="fas fa-trash-alt"></span> SI</button>
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