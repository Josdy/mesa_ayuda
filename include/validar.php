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
$query = "INSERT INTO programa_area(nombre, id_unidad, estado) VALUES ('$nombreproarea' , $id_unidad, 1)";
	if ($conexion->query($query) === TRUE) {
                  echo "<script language=javascript>alert('Porgrama/Area Registrada Correctamente');window.location='bandeja_proarea'; </script>'";
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


if (isset($_POST['registrarpersonal'])) {
require 'config/db.php';
$dni=$_POST['dniTrabajador'];
$nombresTrabajador=$_POST['nombresTrabajador'];
$paterno=$_POST['paternoTrabajador'];
$materno =$_POST['maternoTrabajador'];
$unidad=$_POST['unidadselect'];
$proarea=$_POST['proareaselect'];
$nombreusuario=$_POST['nombreusuario'];
$passwordusuario=$_POST['passwordusuario'];
$fecha=date("Y/m/d");
$passhash = password_hash($passwordusuario, PASSWORD_DEFAULT);
$sql=" SELECT * 
from trabajador
WHERE dni ='$dni'";
$validar=$conexion->query($sql);
$existe=$validar->num_rows;
if ($existe>0) {
echo "<script language=javascript>alert('Ya esta registrado el trabajador');window.location='registro_personal'; </script>'";
}else{
$sqlu=" SELECT * 
from usuario
WHERE username ='$nombreusuario'";
$validaru=$conexion->query($sqlu);
$existeu=$validaru->num_rows;
if ($existeu>0) {
echo "<script language=javascript>alert('USUARIO NO DISPONIBLE');window.location='registro_personal'; </script>'";
}else{
if (isset($_SESSION['username'])) {
$user=$_SESSION['username'];

$queryuser = "INSERT INTO usuario(username,password) VALUES ('$nombreusuario', '$passhash')";

if ($conexion->query($queryuser) === TRUE) {
$id_usuario=$conexion->insert_id;
$querytrabajador="INSERT INTO trabajador(dni,nombre,paterno,materno,id_programa_area,id_usuario,fecha_registro,user_registro,estado) 
VALUES ('$dni', '$nombresTrabajador', '$paterno', '$materno', '$proarea', '$id_usuario','$fecha','$user',1)";
if ($conexion->query($querytrabajador) === TRUE) {
echo "<script language=javascript>alert('Personal Correctamente Registrado');window.location='registro_personal'; </script>'";
}else{
echo $conexion->error;        	
}}else {
echo $conexion->error;
}
}else{
echo $conexion->error;
}}}}


if (isset($_POST['actualizarpersonal'])) {
require 'config/db.php';

$id_trabajador=$_POST['editartrabajador'];
$nombres=$_POST['nombresTrabajador'];
$paterno=$_POST['paternoTrabajador'];
$materno =$_POST['maternoTrabajador'];
$proarea=$_POST['proareaselect'];
$nombreusuario=$_POST['nombreusuario'];
$passwordusuario=$_POST['passwordusuario'];
$fecha=date("Y/m/d");
$passhash = password_hash($passwordusuario, PASSWORD_DEFAULT);
$estado=$_POST['estadotselect'];
$sql="SELECT t.id_trabajador as id_trabajador , t.estado as estadotrabajador,t.dni as dni, t.nombre as nombretrabajador, t.paterno as paterno, t.materno as materno, pa.id_programa_area as idpa , pa.nombre nombreproarea, pa.estado as proareaestado, u.id_usuario as id_usuario , u.username as nombreusuario,und.id_unidad as idu, und.nombre as nombreund
FROM trabajador t
JOIN programa_area pa on pa.id_programa_area=t.id_programa_area
JOIN usuario u on u.id_usuario=t.id_usuario
join unidad und on und.id_unidad=pa.id_unidad
where t.id_trabajador='$id_trabajador'";

$sqlu="SELECT u.id_usuario as idu , u.username as nombreusuario, u.password as pass
from usuario u
JOIN trabajador t on t.id_usuario=u.id_usuario
where t.id_trabajador='$id_trabajador'
";
$validar=$conexion->query($sql);
$row=mysqli_fetch_assoc($validar);
$sqlt=array();

$validaru=$conexion->query($sqlu);
$rowu=mysqli_fetch_assoc($validaru);
$idu=$rowu['idu'];
$passbd=$rowu['pass'];
$sqluser=array();

if($row['nombretrabajador']!==$nombres) $sqlt[]="nombre='$nombres'";
if($row['paterno']!==$paterno) $sqlt[]="paterno='$paterno'";
if($row['materno']!==$materno) $sqlt[]="materno='$materno'";
if($row['idpa']!==$proarea) $sqlt[]="id_programa_area='$proarea'";
if($row['estadotrabajador']!==$estado) $sqlt[]="estado='$estado'";

if($rowu['nombreusuario']!==$nombreusuario) $sqluser[]="username='$nombreusuario'";
if($passwordusuario!==$passbd) $sqluser[]="password='$passhash'";

if (isset($_SESSION['username'])) {
$user=$_SESSION['username'];

if((count($sqlt)>0)&count($sqluser)==0) {
$sqlt[]="fecha_modificacion='$fecha'";
$sqlt[]="user_modificacion='$user'";
$querytrabajador="update trabajador set ".implode(", " , $sqlt)." where id_trabajador='$id_trabajador'";
if ($conexion->query($querytrabajador) === TRUE) {
echo "<script language=javascript>alert('Personal Correctamente Actualizado');window.location='bandeja_personal'; </script>'";
}else{
$conexion->error;
}
}else{
if (((count($sqlt)==0)&count($sqluser)>0)||((count($sqlt)>0)&count($sqluser)>0)) {
$sqlt[]="fecha_modificacion='$fecha'";
$sqlt[]="user_modificacion='$user'";
$querytrabajador="update trabajador set ".implode(", " , $sqlt)." where id_trabajador='$id_trabajador'";
$queryuser="update usuario set ".implode(", " , $sqluser)." where id_usuario='$idu'";
if ($conexion->query($querytrabajador) === TRUE&$conexion->query($queryuser) === TRUE) {
echo "<script language=javascript>alert('Personal Correctamente Actualizado');window.location='bandeja_personal'; </script>'";
}else{
$conexion->error;
}}}}}


	if (isset($_POST['eliminartrabajador'])) {
	require 'config/db.php';
	$id_trabajador=$_POST['eliminaridt'];
	$query = "UPDATE  trabajador 
	SET estado=0 WHERE id_trabajador='$id_trabajador' ";

	       if ($conexion->query($query) === TRUE) {
	                 echo "<script language=javascript>alert('Se dio de baja el trabajador');window.location='bandeja_personal'; </script>'";
	         }else {
	          echo $conexion->error;
	      }
	}






if(isset($_POST['registraraveria'])) {
		require 'config/db.php';
		$id_asunto=$_POST['selectaveria'];
		$descripcion=$_POST['descripcion'];
		$fecha=date("Y/m/d");
	 if (isset($_SESSION['id_usuario'])){	
	 	$id_usuario=$_SESSION['id_usuario']; 
	 	$nombreusuario=$_SESSION['username'];
	 	
$sqlbuscar="SELECT  p.id_problema as idp,p.id_usuario as pidu,p.id_asunto as pida, u.username as nombreusuario, a.id_asunto as ida
		FROM problema p
		JOIN usuario u on u.id_usuario= p.id_usuario
		join asunto a on a.id_asunto=p.id_asunto
		where p.id_usuario='$id_usuario' and p.estado_peticion=0 and p.id_asunto='$id_asunto'";
		$validar=$conexion->query($sqlbuscar);

$row=mysqli_fetch_assoc($validar);
$existe=$validar->num_rows;



if ($existe>0) {
		
		 echo "<script language=javascript>alert('Ya tiene una peticion en cola, espere su turno de atencion, Gracias ! :) ');window.location='bandeja_averia'; </script>'";
	}else{

		$sqlp="INSERT INTO problema(id_usuario,id_asunto,descripcion,fecha_registro,user_registro,estado_peticion) 
VALUES ('$id_usuario', '$id_asunto', '$descripcion', '$fecha', '$nombreusuario',0)";


if ($conexion->query($sqlp) === TRUE) {
	                 echo "<script language=javascript>alert('Averia Registrada Correctamente');window.location='bandeja_averia'; </script>'";
	         }else {
	          echo $conexion->error;
	      }}}}







if(isset($_POST['actualizaraveria'])) {
		require 'config/db.php';
		$id_problema=$_POST['editaraveria'];
		
		$id_asunto=$_POST['selectaveria'];
		$descripcion=$_POST['descripcion'];
		$fecha=date("Y/m/d");
	 if (isset($_SESSION['id_usuario'])){	
	 	$id_usuario=$_SESSION['id_usuario']; 
	 	$nombreusuario=$_SESSION['username'];
		$fecha=date("Y/m/d");	 	
		$sqlbuscar="SELECT  p.id_problema as idp,p.id_usuario as pidu,p.id_asunto as pida, u.username as nombreusuario, a.id_asunto as ida,p.descripcion as descripcion
		FROM problema p
		JOIN usuario u on u.id_usuario= p.id_usuario
		join asunto a on a.id_asunto=p.id_asunto
		where p.id_usuario='$id_usuario' and p.estado_peticion=0 and p.id_asunto='$id_asunto'";
		$validar=$conexion->query($sqlbuscar);

$row=mysqli_fetch_assoc($validar);
$existe=$validar->num_rows;



if ($existe>0) {
		
		 echo "<script language=javascript>alert('Ya tiene una peticion en cola, espere su turno de atencion, Gracias ! :) ');window.location='bandeja_averia'; </script>'";
	}else{
$sqlb="SELECT  p.id_asunto as pida,p.descripcion as descripcion
		FROM problema p
		JOIN usuario u on u.id_usuario= p.id_usuario
		join asunto a on a.id_asunto=p.id_asunto
		where p.id_problema='$id_problema'";
		$valida=$conexion->query($sqlb);

$rows=mysqli_fetch_assoc($valida);
$sql=array();

if($rows['pida']!==$id_asunto) $sql[]="id_asunto='$id_asunto'";
if($rows['descripcion']!==$descripcion) $sql[]="descripcion='$descripcion'";
if((count($sql)>0)) {
$sql[]="fecha_modificacion='$fecha'";
$sql[]="user_modificacion='$nombreusuario'";
$query="update problema set ".implode(", " , $sql)." where id_problema='$id_problema'";

if ($conexion->query($query) === TRUE) {
echo "<script language=javascript>alert('Peticion Correctamente Actualizada');window.location='bandeja_averia'; </script>'";
}else{
$conexion->error;
}
}

	  }}
	  }



if (isset($_POST['eliminaraveria'])) {
	require 'config/db.php';
	$id_problema=$_POST['eliminaridaveria'];
	$query = "DELETE FROM problema WHERE id_problema='$id_problema' ";

	       if ($conexion->query($query) === TRUE) {
	                 echo "<script language=javascript>alert('Se elimino correctamente');window.location='bandeja_averia'; </script>'";
	         }else {
	          echo $conexion->error;
	      }
	}





if (isset($_POST['actualizarpeticion'])) {
	$id_problema=$_POST['editarpeticion'];
	$solucion=$_POST['solucion'];
	$tiempo=$_POST['tiemposervicio'];
	$fecha=date("Y/m/d");
	if (isset($_SESSION['username'])) {
		$user=$_SESSION['username'];
	$query = "UPDATE  problema 
	SET solucion='$solucion', tiempo_servicio='$tiempo', fecha_modificacion='$fecha',user_modificacion='$user', estado_peticion=1 WHERE id_problema='$id_problema' ";
	
	if ($conexion->query($query) === TRUE) {
	echo "<script language=javascript>alert('Se actualizo Correctamente');window.location='bandeja_peticiones'; </script>'";
	}else {
	echo $conexion->error;
	}



		
	}
	

}


  		if(isset($_POST['micuenta'])) {
		require 'config/db.php';
		$nombreusuario=$_POST['user'];
		$p1=$_POST['pass1'];
		$p2=$_POST['pass2'];
		
		$sql=" SELECT * 
from usuario
JOIN trabajador t on t.id_usuario= usuario.id_usuario
WHERE username ='$nombreusuario'";
	$validar=$conexion->query($sql);

	
           
        
          	
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


}













?>

 