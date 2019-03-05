<?php 

require 'config/db.php';

if($_POST) 
  {
  	
      $nombreusuario     = strip_tags($_POST['nombreusuario']);
      
   $sql=("SELECT username FROM usuario WHERE username='$nombreusuario'");
   $validar=$conexion->query($sql);
   $count=$validar->num_rows;
   
      
   if($count>0)
   {
    echo "<span style='color:red;'>Nombre de usuario no esta disponible</span>";
   }else{
     echo "<span style='color:green;'>Nombre de usuario disponible</span>";
   }
   
  }


 ?>