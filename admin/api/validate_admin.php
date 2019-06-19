<?php

session_start();
require_once('../config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$usuario = htmlspecialchars(strip_tags($_POST['usuario']));
	$password = htmlspecialchars(strip_tags($_POST['password']));

	try{

		$sql = "SELECT * FROM admin_users WHERE username='$usuario' AND password='$password'";
		$result = $conexion->query($sql);
		$count = $result->num_rows;

		if($count > 0){
			while ($row = $result->fetch_array()) {
				echo 'ok';
				$_SESSION['admin_session'] = $row['id'];
			}
		}else{
			echo 'Usuario o contraseña incorrectos';
		}

	}catch(\Exception $ex){
		echo "Error: " . $ex->getMessage();
	}

}else{

	echo "method not allowed";

}

?>