<?php 
require 'config/db.php';
session_start();


  
  $query = 'SELECT * FROM unidad';
  $result = $conexion->query($query);
  
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_unidad]'>$row[nombre]</option>";
  }
  echo($listas);
?>