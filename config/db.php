	<?php  
		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbname = "mesa_ayuda";
		$conexion = mysqli_connect($servername, $username, $password, $dbname);


// if(!$conexion){
//    echo "error".mysqli_error($conexion);
//   }else{
//    echo "conecto";
//   }
return $conexion;
		
// try {
//   $conexion = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
//   $conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//   // if(!$conexion){
//   // 	echo "error";
//   // }else{
//   // 	echo "conecto";
//   // }
//   return $conexion;
  

// } catch (PDOException $e) {
//   return $e->getMessage();
// }


		
		?>