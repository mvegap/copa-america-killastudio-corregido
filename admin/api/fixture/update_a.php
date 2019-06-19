<?php

date_default_timezone_set('America/Lima');
header('Content-type:application/json;charset=UTF-8');

include_once('../../config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$fixture_1 = htmlspecialchars(strip_tags(trim($_POST['fixture_1'])));
	$fixture_2 = htmlspecialchars(strip_tags(trim($_POST['fixture_2'])));
	$fixture_7 = htmlspecialchars(strip_tags(trim($_POST['fixture_7'])));
	$fixture_8 = htmlspecialchars(strip_tags(trim($_POST['fixture_8'])));
	$fixture_13 = htmlspecialchars(strip_tags(trim($_POST['fixture_13'])));
	$fixture_14 = htmlspecialchars(strip_tags(trim($_POST['fixture_14'])));

	$goal_a_1 = htmlspecialchars(strip_tags(trim($_POST['goal_a_1'])));
	$goal_a_2 = htmlspecialchars(strip_tags(trim($_POST['goal_a_2'])));
	$goal_a_7 = htmlspecialchars(strip_tags(trim($_POST['goal_a_7'])));
	$goal_a_8 = htmlspecialchars(strip_tags(trim($_POST['goal_a_8'])));
	$goal_a_13 = htmlspecialchars(strip_tags(trim($_POST['goal_a_13'])));
	$goal_a_14 = htmlspecialchars(strip_tags(trim($_POST['goal_a_14'])));

	$goal_b_1 = htmlspecialchars(strip_tags(trim($_POST['goal_b_1'])));
	$goal_b_2 = htmlspecialchars(strip_tags(trim($_POST['goal_b_2'])));
	$goal_b_7 = htmlspecialchars(strip_tags(trim($_POST['goal_b_7'])));
	$goal_b_8 = htmlspecialchars(strip_tags(trim($_POST['goal_b_8'])));
	$goal_b_13 = htmlspecialchars(strip_tags(trim($_POST['goal_b_13'])));
	$goal_b_14 = htmlspecialchars(strip_tags(trim($_POST['goal_b_14'])));

	$sql = "UPDATE fixtures SET goal_a = '$goal_a_1', goal_b = '$goal_b_1' WHERE id='$fixture_1';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_2', goal_b = '$goal_b_2' WHERE id='$fixture_2';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_7', goal_b = '$goal_b_7' WHERE id='$fixture_7';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_8', goal_b = '$goal_b_8' WHERE id='$fixture_8';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_13', goal_b ='$goal_b_13' WHERE id='$fixture_13';";
	$sql .= "UPDATE fixtures SET goal_a = '$goal_a_14', goal_b ='$goal_b_14' WHERE id='$fixture_14';";

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