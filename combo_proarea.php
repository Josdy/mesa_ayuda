<?php 
 



 require 'config/db.php';

function gestlistapa(){
$unidad=$_POST['id_unidad'];
     $sql = "SELECT u.nombre as nombreu , u.id_unidad as idu, pa.nombre as nombreproarea , pa.id_programa_area idpa ,pa.id_unidad as proarea_unidad_id
       from unidad u
       JOIN programa_area pa on pa.id_unidad=u.id_unidad
       WHERE '$unidad' =pa.id_unidad AND u.estado=1 AND pa.estado=1";
    // $queryunidad= "SELECT id_unidad,nombre FROM unidad";
    $validarunidad= $conexion->query($queryunidad); 
    $resu=" ";

    while($row = $validarunidad->fetch_array(MYSQLI_ASSOC)){
    
         $resu.= "<option value='$row[id_unidad]'>$row[nombre]</option>";
}
return $resu;
}
echo gestlistapa();
// $unidad=$_POST['id_unidad'];
// // $unidad=1;
// echo $unidad;
// global $res;
  
//   $sql = "SELECT u.nombre as nombreu , u.id_unidad as idu, pa.nombre as nombreproarea , pa.id_programa_area idpa ,pa.id_unidad as proarea_unidad_id
//       from unidad u
//       JOIN programa_area pa on pa.id_unidad=u.id_unidad
//       WHERE '$unidad' =pa.id_unidad AND u.estado=1 AND pa.estado=1";

//   $validar =$conexion->query($sql);


//   while($selectproarea = mysqli_fetch_array($validar)){
    
//       $res.= "<option value='$selectproarea['idpa']'>$selectproarea['nombreproarea']</option>";
       
//     }  
//   echo $res;



     

 ?>