<?php 
require 'config/db.php';
session_start();

  
  $query = 'SELECT * FROM unidad WHERE estado=1';
  $result = $conexion->query($query);
  $listas = '<option value="#">Seleccionar Unidad</option>';
  
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $listas .= "<option value='$row[id_unidad]'>$row[nombre]</option>";
  }
  echo utf8_decode($listas);


?>