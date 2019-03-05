		<?php 
		if(isset($_POST['login'])) {
		require 'config/db.php';
		$nombreusuario=$_POST['username'];
		$contra=$_POST['password'];
if (empty($nombreusuario)||empty($contra)) {
echo "<script language=javascript>alert('CAMPOS VACIOS ');window.location='index.php'; </script>";
}else{
		$sql=" SELECT * 
from usuario
JOIN trabajador t on t.id_usuario= usuario.id_usuario
WHERE username ='$nombreusuario' and estado=1";
		$validar=$conexion->query($sql);
		

		if (!$validar) {
		header("Location:index.php?error=sqlerror");
				}else{

			$row=mysqli_fetch_assoc($validar);
		if($row){
				$validarpass=password_verify($contra,$row['password']);
				if ($validarpass==false) {
			echo "<script language=javascript>alert('CONTRASEÑA INCORRECTA');window.location='index.php'; </script>";
	exit();
			}
		else if ($validarpass==true){
	
			session_start();
			$_SESSION['nombre']=$row['nombre'];
			$_SESSION['paterno']=$row['paterno'];
			$_SESSION['materno']=$row['materno'];
			$_SESSION['username']=$row['username'];
			$_SESSION['id_usuario']=$row['id_usuario'];
		// 	$a=$row['username'];
		// echo $a;

header("Location: oei.php");
	exit();
		}
	}else{
		echo "<script language=javascript>alert('USUARIO INCORRECTO ');window.location='index.php'; </script>";
	exit();
	}
		}
		}
  }
  		if(isset($_POST['recuperarpass'])) {
		require 'config/db.php';
		$nombreusuario=$_POST['user'];
		$p1=$_POST['pass1'];
		$p2=$_POST['pass2'];
		

		$sql=" SELECT * 
from usuario
JOIN trabajador t on t.id_usuario= usuario.id_usuario
WHERE username ='$nombreusuario'";
	$validar=$conexion->query($sql);

	
           $existe=mysqli_num_rows($validar);
          if ($existe<= 0) {
            echo '<script>alert("El Nombre de Usuario no esta Registrado"); window.location="recuperar_password.php";</script>';
            exit();
          } else{
          	
          	if ($p1==$p2) {
          		
          		$row=mysqli_fetch_assoc($validar);
          		
          		
		if($row){
			
			$id_user=$row['id_usuario'];
			$hash = password_hash($p1, PASSWORD_DEFAULT);
			$query = "UPDATE usuario SET password='$hash' where id_usuario='$id_user'";

			 if ($conexion->query($query) === TRUE) {
                 
                 echo "<script language=javascript>alert('Contraseña Cambiada');window.location='index'; </script>'";
                 exit();
                 } else {
                      echo '<script>alert("Error al Cambiar Contraseña. Datos Incorrectos");</script>';
                      exit();
                   }
		}
          	}else{
          		echo '<script>alert("CONTRASEÑAS NO COINCIDEN"); window.location="recuperar_password.php";</script>';
          		exit();
          	}
}}


if(isset($_POST['registrarUnidad'])) {
		require 'config/db.php';
		$nombreUnidad= $_POST['nombreunidad'];
		
$sql=" SELECT * 
from unidad
WHERE nombre ='$nombreUnidad'";
	$validar=$conexion->query($sql);
	$existe=$validar->num_rows;
	if ($existe>0) {
		 echo "<script language=javascript>alert('Unidad ya está registrada');window.location='registro_unidad'; </script>'";
	}else{
		$query = "INSERT INTO unidad(nombre,estado) VALUES ('$nombreUnidad', 1)";
        if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Unidad Registrada Correctamente');window.location='registro_unidad'; </script>'";
          }else {
           echo $conexion->error;
       }
	}

		





	}


	         



if (isset($_POST['actualizarunidad'])) {
require 'config/db.php';
$id_unidad=$_POST['editarunidad'];
	$nombreUnidad= $_POST['nombreunidad'];

$sql=" SELECT * 
from unidad
WHERE id_unidad ='$id_unidad'";
	$validar=$conexion->query($sql);
$row=mysqli_fetch_assoc($validar);
	if ($row['nombre']!==$nombreUnidad) {
		
		$query = "UPDATE unidad SET 
nombre='$nombreUnidad'
WHERE id_unidad='$id_unidad' ";

        if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Unidad Actualizada Correctamente');window.location='bandeja_unidad'; </script>'";
          }else {
           echo $conexion->error;
       }
	}
 }




if (isset($_POST['eliminarunidad'])) {
require 'config/db.php';
$id_unidad=$_POST['eliminaru'];

	
	$query = "UPDATE  unidad u
    JOIN programa_area pa on pa.id_unidad =u.id_unidad
    SET u.estado=0 , pa.estado=0
    	WHERE u.id_unidad='$id_unidad'  ";

        if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Se elimino Correctamente');window.location='bandeja_unidad'; </script>'";
          }else {
           echo $conexion->error;
       }
	
 }



if(isset($_POST['registrarproarea'])) {
		require 'config/db.php';
		 $id_unidad=$_POST['unidad'];
		 $nombreproarea=$_POST['nombreproarea'];
		 
		$sql="SELECT pa.id_programa_area as idproarea,pa.nombre as nombreproarea,u.id_unidad as iduni, u.nombre as nombreu FROM programa_area pa
join unidad u on u.id_unidad=pa.id_unidad
where pa.id_unidad= '$id_unidad' and pa.nombre= '$nombreproarea'" ;
		$validar=$conexion->query($sql);
		$datos = mysqli_fetch_assoc($validar); 
$existe=$validar->num_rows;
	if ($existe>0) {
		
		 echo "<script language=javascript>alert('Programa o area ya registrado');window.location='registro_proarea'; </script>'";
	}else{
$query = "INSERT INTO programa_area(nombre, id_unidad) VALUES ('$nombreproarea' , $id_unidad)";
	if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Porgrama/Area Registrada Correctamente');window.location='registro_proarea'; </script>'";
          }else {
           
          	echo $conexion->error;
       }	
}
}


	         



if (isset($_POST['actualizarproarea'])) {
require 'config/db.php';
$id_proarea=$_POST['editarproarea'];
	$nombreproarea= $_POST['nombreproarea'];
	$id_unidad=$_POST['id_unidad'];


	$sql="SELECT pa.id_programa_area as idproarea,pa.nombre as nombreproarea,u.id_unidad as iduni, u.nombre as nombreu FROM programa_area pa
join unidad u on u.id_unidad=pa.id_unidad
where pa.id_unidad= '$id_unidad' and pa.nombre= '$nombreproarea'" ;

	$validar=$conexion->query($sql);
$row=mysqli_fetch_assoc($validar);
$existe=$validar->num_rows;


if ($existe>0) {
		
		 echo "<script language=javascript>alert('Programa o area ya registrado');window.location='bandeja_proarea'; </script>'";
	}else{
		
		$query = "UPDATE programa_area SET 
		nombre='$nombreproarea'
		WHERE id_programa_area='$id_proarea' ";
	if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Porgrama/Area Actualizada Correctamente');window.location='bandeja_proarea'; </script>'";
          }else {
           
          	echo $conexion->error;
       }	
}

 }

 if (isset($_POST['eliminarproarea'])) {
require 'config/db.php';
$id_proarea=$_POST['eliminaridproarea'];


	
	$query = "UPDATE  programa_area 
	SET estado=0 WHERE id_programa_area='$id_proarea' ";

        if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Se elimino Correctamente');window.location='bandeja_proarea'; </script>'";
          }else {
           echo $conexion->error;
       }
	}







?>

 