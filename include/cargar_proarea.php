<?php 
require 'config/db.php';


  $id = $_POST['id'];
  $query = "SELECT * FROM programa_area WHERE id_unidad = $id";
  $result = $conexion->query($query);
  $videos = '<option value="0">Elige una opción</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $videos .= "<option value='$row[id_programa_area]'>$row[nombre]</option>";
  }
  echo $videos;