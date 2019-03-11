<?php 

require 'config/db.php';

if($_POST) 
  {
  	
      $dni     = strip_tags($_POST['dniTrabajador']);
      
   $sql=("SELECT * FROM trabajador WHERE dni='$dni'");
   $validar=$conexion->query($sql);
   $count=$validar->num_rows;
   
      
   if($count>0)
   {
    echo "<span style='color:red;'>El trabajador ya esta registrado</span>";
   }
   
  }


 ?>