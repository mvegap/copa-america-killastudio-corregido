<?php

header('Content-type:application/json;charset=UTF-8');

require_once('../config/database.php');
require_once('../config/functions.php');

if($_SERVER['REQUEST_METHOD'] === 'GET'){

	$sql = "SELECT user,fixture FROM user_goals_scored ORDER BY user ASC,fixture ASC";
	$result = $conexion->query($sql);

	while($row = $result->fetch_assoc()){
		// echo $row['user'] . " - " . $row['fixture'] . "\n";
		comparaScoreExacto($row['user'], $row['fixture']);
		sumarScore($row['user']);
	}

	http_response_code(201);
	echo json_encode(array("message" => "Puntajes actualizados"));

}else{

	http_response_code(405);
	echo json_encode(array("message" => "Method not allowed"));

}



?>