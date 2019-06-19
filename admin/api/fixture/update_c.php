<?php

date_default_timezone_set('America/Lima');
header('Content-type:application/json;charset=UTF-8');

include_once('../../config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$fixture_5 = htmlspecialchars(strip_tags(trim($_POST['fixture_5'])));
	$fixture_6 = htmlspecialchars(strip_tags(trim($_POST['fixture_6'])));
	$fixture_11 = htmlspecialchars(strip_tags(trim($_POST['fixture_11'])));
	$fixture_12 = htmlspecialchars(strip_tags(trim($_POST['fixture_12'])));
	$fixture_17 = htmlspecialchars(strip_tags(trim($_POST['fixture_17'])));
	$fixture_18 = htmlspecialchars(strip_tags(trim($_POST['fixture_18'])));

	$goal_a_5 = htmlspecialchars(strip_tags(trim($_POST['goal_a_5'])));
	$goal_a_6 = htmlspecialchars(strip_tags(trim($_POST['goal_a_6'])));
	$goal_a_11 = htmlspecialchars(strip_tags(trim($_POST['goal_a_11'])));
	$goal_a_12 = htmlspecialchars(strip_tags(trim($_POST['goal_a_12'])));
	$goal_a_17 = htmlspecialchars(strip_tags(trim($_POST['goal_a_17'])));
	$goal_a_18 = htmlspecialchars(strip_tags(trim($_POST['goal_a_18'])));

	$goal_b_5 = htmlspecialchars(strip_tags(trim($_POST['goal_b_5'])));
	$goal_b_6 = htmlspecialchars(strip_tags(trim($_POST['goal_b_6'])));
	$goal_b_11 = htmlspecialchars(strip_tags(trim($_POST['goal_b_11'])));
	$goal_b_12 = htmlspecialchars(strip_tags(trim($_POST['goal_b_12'])));
	$goal_b_17 = htmlspecialchars(strip_tags(trim($_POST['goal_b_17'])));
	$goal_b_18 = htmlspecialchars(strip_tags(trim($_POST['goal_b_18'])));

	$sql = "UPDATE fixtures SET goal_a = '$goal_a_5', goal_b = '$goal_b_5' WHERE id='$fixture_5';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_6', goal_b = '$goal_b_6' WHERE id='$fixture_6';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_11', goal_b = '$goal_b_11' WHERE id='$fixture_11';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_12', goal_b = '$goal_b_12' WHERE id='$fixture_12';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_17', goal_b ='$goal_b_17' WHERE id='$fixture_17';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_18', goal_b ='$goal_b_18' WHERE id='$fixture_18';";

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