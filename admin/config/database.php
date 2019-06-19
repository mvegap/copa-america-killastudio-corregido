<?php

// production
// $db_host = 'localhost';
// $db_user = 'killa_dev';
// $db_pass = 'Cambiar01#_';
// $db_name = 'killastudio_copaamerica';


// development
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'miguel';

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

mysqli_query($conexion, 'SET NAMES "utf8"');

if(mysqli_connect_errno()){
	printf("Error de conexion a la BD: %s\n", mysqli_connect_errno());
	exit();
}

?>