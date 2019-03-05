<?php 

require 'config/db.php';

if($_POST) 
  {
  	
      $nombreUnd     = strip_tags($_POST['nombreunidad']);
      
   $sql=("SELECT nombre FROM unidad WHERE nombre='$nombreUnd'");
   $validar=$conexion->query($sql);
   $count=$validar->num_rows;
   
      
   if($count>0)
   {
    echo "<span style='color:red;'>La unidad ya ha sido registrada anteriormente</span>";
   }
   
  }


 ?>