<?php

session_start();

if(!isset($_SESSION['admin_session'])){
  header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador - Copa América 2019 - KillaStudio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="#">Copa América 2019</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link" href="index.php">Home </a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="fixture.php">Fixture</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="participantes.php">Participantes</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="pronosticos.php">Pronósticos</a>
	      </li>
	      <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
	    </ul>
	  </div>
	</nav>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>