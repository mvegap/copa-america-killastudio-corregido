<?php


header('Content-type:application/json;charset=UTF-8');
require_once('../../config/database.php');


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$nombres = htmlspecialchars(strip_tags(trim($_POST['nombres'])));
	$tipo_usuario = htmlspecialchars(strip_tags(trim($_POST['tipo_usuario'])));
	$usuario = htmlspecialchars(strip_tags(trim($_POST['usuario'])));
	$password = htmlspecialchars(strip_tags(trim($_POST['password'])));

	if(!empty($nombres) && !empty($tipo_usuario) && !empty($usuario) && !empty($password)){

		$sql = "INSERT INTO users (fullname,username,password,type_user) VALUES ('$nombres', '$usuario', '$password', '$tipo_usuario')";
		$result = $conexion->query($sql);

		if($result === TRUE){

			http_response_code(201);
			echo json_encode(array("message" => "Participante registrado satisfactoriamente"));

		}else{

			http_response_code(200);
			echo json_encode(array("message" => "Error al crear el participante"));

		}

	}else{

		http_response_code(200);
		echo json_encode(array("message" => "Todos los campos son requeridos"));

	}

}else{

	http_response_code(405);
	echo json_encode(array("message"=>"Method not allowed"));

}



?>