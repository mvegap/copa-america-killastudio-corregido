<?php

date_default_timezone_set('America/Lima');
header('Content-type:application/json;charset=UTF-8');

include_once('../../config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$fixture_3 = htmlspecialchars(strip_tags(trim($_POST['fixture_3'])));
	$fixture_4 = htmlspecialchars(strip_tags(trim($_POST['fixture_4'])));
	$fixture_9 = htmlspecialchars(strip_tags(trim($_POST['fixture_9'])));
	$fixture_10 = htmlspecialchars(strip_tags(trim($_POST['fixture_10'])));
	$fixture_15 = htmlspecialchars(strip_tags(trim($_POST['fixture_15'])));
	$fixture_16 = htmlspecialchars(strip_tags(trim($_POST['fixture_16'])));

	$goal_a_3 = htmlspecialchars(strip_tags(trim($_POST['goal_a_3'])));
	$goal_a_4 = htmlspecialchars(strip_tags(trim($_POST['goal_a_4'])));
	$goal_a_9 = htmlspecialchars(strip_tags(trim($_POST['goal_a_9'])));
	$goal_a_10 = htmlspecialchars(strip_tags(trim($_POST['goal_a_10'])));
	$goal_a_15 = htmlspecialchars(strip_tags(trim($_POST['goal_a_15'])));
	$goal_a_16 = htmlspecialchars(strip_tags(trim($_POST['goal_a_16'])));

	$goal_b_3 = htmlspecialchars(strip_tags(trim($_POST['goal_b_3'])));
	$goal_b_4 = htmlspecialchars(strip_tags(trim($_POST['goal_b_4'])));
	$goal_b_9 = htmlspecialchars(strip_tags(trim($_POST['goal_b_9'])));
	$goal_b_10 = htmlspecialchars(strip_tags(trim($_POST['goal_b_10'])));
	$goal_b_15 = htmlspecialchars(strip_tags(trim($_POST['goal_b_15'])));
	$goal_b_16 = htmlspecialchars(strip_tags(trim($_POST['goal_b_16'])));

	$sql = "UPDATE fixtures SET goal_a = '$goal_a_3', goal_b = '$goal_b_3' WHERE id='$fixture_3';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_4', goal_b = '$goal_b_4' WHERE id='$fixture_4';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_9', goal_b = '$goal_b_9' WHERE id='$fixture_9';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_10', goal_b = '$goal_b_10' WHERE id='$fixture_10';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_15', goal_b ='$goal_b_15' WHERE id='$fixture_15';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_16', goal_b ='$goal_b_16' WHERE id='$fixture_16';";

	$result = $conexion->multi_query($sql);

	if($result === TRUE){
		http_response_code(201);
		echo json_encode(array("code" => 201, "message" => "Datos actualizados"));
	}else{
		http_response_code(200);
		echo json_encode(array("code" => 400, "message" => "Error al actualizar el fixture"));
	}


}else{

	http_response_code(405);
	echo json_encode(array("code" => 405, "message" => "Method not allowed"));

}


?>