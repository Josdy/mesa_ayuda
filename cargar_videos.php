<?php 
require 'config/db.php';
session_start();

  $id = $_POST['id'];
  $query = "
SELECT u.nombre as nombreu , u.id_unidad as idu, pa.nombre as nombreproarea , pa.id_programa_area idpa ,pa.id_unidad as proarea_unidad_id
       from unidad u
       JOIN programa_area pa on pa.id_unidad=u.id_unidad
       WHERE pa.id_unidad ='$id' AND u.estado=1 AND pa.estado=1


  ";
  $result = $conexion->query($query);
  $videos = '<option value="#">Seleccionar Programa/Area</option>';
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $videos .= "<option value='$row[idpa]'>$row[nombreproarea]</option>";
  }
  echo utf8_decode($videos);



?>  