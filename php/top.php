<?php require 'config/db.php';
require 'include/validar.php';?>




<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top ">
  <a class="logo"><img src="images/red_de_salud_pacifico_sur.png" alt="Red de Salud Pacífico Sur" class="logo-img"></a> 

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div style="justify-content: flex-end;"class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ">
      

      <?php 
                   $name= $_SESSION['username'];
                   if (strlen(stristr($name,'admin'))>0){
                    
               
  ?>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Personal
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="registro_personal.php">Registrar Personal</a>
          <a class="dropdown-item" href="bandeja_personal.php">Bandeja Personal</a>
          
      </li>
<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Unidad
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="registro_unidad.php">Registrar Unidad</a>
          <a class="dropdown-item" href="bandeja_unidad.php">Bandeja unidad</a>
          
      </li>


         <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Programa o Area
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="registro_proarea.php">Registrar Programa/Area</a>
          <a class="dropdown-item" href="bandeja_proarea.php">Bandeja Programa/Area</a>
          
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#">Bandeja de peticiones</a>

      </li>

          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php 
     print($_SESSION['nombre']. " " .$_SESSION['paterno']. " ". $_SESSION['materno']) ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="recuperar_password.php">Mi cuenta </a>
          <a class="dropdown-item" href="logout.php">Cerrar sesion </a>
          
      </li>
      <?php } else{
                    
                  ?>
<li class="nav-item">
        <a class="nav-link " href="#">Registrar averia</a>

      </li>
                  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php 
     print($_SESSION['nombre']. " " .$_SESSION['paterno']. " ". $_SESSION['materno']) ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="recuperar_password.php">Mi cuenta </a>
          <a class="dropdown-item" href="logout.php">Cerrar sesion </a>
          
      </li>

<?php } ?>
    </ul>
  
  </div>
  
</nav>