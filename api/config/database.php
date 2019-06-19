<?php

require_once 'constants.php';

$conexion = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

mysqli_query($conexion, 'SET NAMES "' . DB_ENCODE . '"');

if(mysqli_connect_errno()){
	printf("Error de conexion a la BD: %s\n", mysqli_connect_errno());
	exit();
}

?>