 <?php 
 require 'config/db.php';
 require 'include/validar.php';


	session_start();
	

	unset($_SESSION['nombre']);
    unset($_SESSION['paterno']);
    unset($_SESSION['username']);
    
    
	echo "<script language=javascript>;window.location='index.php'; </script>";

   ?>