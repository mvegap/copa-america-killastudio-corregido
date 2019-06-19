<?php



include_once('config/database.php');



if($_SERVER['REQUEST_METHOD'] === 'POST'){



	$id_user = (int)$_POST['user_id'];



	$fixture_1 = $_POST['fixture_1'];

	$score_1_a = $_POST['score_1_a'];

	$score_1_b = $_POST['score_1_b'];



	$fixture_2 = $_POST['fixture_2'];

	$score_2_a = $_POST['score_2_a'];

	$score_2_b = $_POST['score_2_b'];



	$fixture_3 = $_POST['fixture_3'];

	$score_3_a = $_POST['score_3_a'];

	$score_3_b = $_POST['score_3_b'];



	$fixture_4 = $_POST['fixture_4'];

	$score_4_a = $_POST['score_4_a'];

	$score_4_b = $_POST['score_4_b'];



	$fixture_5 = $_POST['fixture_5'];

	$score_5_a = $_POST['score_5_a'];

	$score_5_b = $_POST['score_5_b'];



	$fixture_6 = $_POST['fixture_6'];

	$score_6_a = $_POST['score_6_a'];

	$score_6_b = $_POST['score_6_b'];



	$fixture_7 = $_POST['fixture_7'];

	$score_7_a = $_POST['score_7_a'];

	$score_7_b = $_POST['score_7_b'];



	$fixture_8 = $_POST['fixture_8'];

	$score_8_a = $_POST['score_8_a'];

	$score_8_b = $_POST['score_8_b'];



	$fixture_9 = $_POST['fixture_9'];

	$score_9_a = $_POST['score_9_a'];

	$score_9_b = $_POST['score_9_b'];



	$fixture_10 = $_POST['fixture_10'];

	$score_10_a = $_POST['score_10_a'];

	$score_10_b = $_POST['score_10_b'];



	$fixture_11 = $_POST['fixture_11'];

	$score_11_a = $_POST['score_11_a'];

	$score_11_b = $_POST['score_11_b'];



	$fixture_12 = $_POST['fixture_12'];

	$score_12_a = $_POST['score_12_a'];

	$score_12_b = $_POST['score_12_b'];



	$fixture_13 = $_POST['fixture_13'];

	$score_13_a = $_POST['score_13_a'];

	$score_13_b = $_POST['score_13_b'];



	$fixture_14 = $_POST['fixture_14'];

	$score_14_a = $_POST['score_14_a'];

	$score_14_b = $_POST['score_14_b'];



	$fixture_15 = $_POST['fixture_15'];

	$score_15_a = $_POST['score_15_a'];

	$score_15_b = $_POST['score_15_b'];



	$fixture_16 = $_POST['fixture_16'];

	$score_16_a = $_POST['score_16_a'];

	$score_16_b = $_POST['score_16_b'];



	$fixture_17 = $_POST['fixture_17'];

	$score_17_a = $_POST['score_17_a'];

	$score_17_b = $_POST['score_17_b'];



	$fixture_18 = $_POST['fixture_18'];

	$score_18_a = $_POST['score_18_a'];

	$score_18_b = $_POST['score_18_b'];


	// consulta si el usuario ya ha ingresado su score anteriormente
	$stmt = "SELECT * FROM user_goals_scored WHERE user='$id_user'";
	$result = $conexion->query($stmt);
	$count = $result->num_rows;


	if($count === 0){

		// INSERT INTO
		$sql = "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_1', '$score_1_a', '$score_1_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_2', '$score_2_a', '$score_2_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_3', '$score_3_a', '$score_3_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_4', '$score_4_a', '$score_4_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_5', '$score_5_a', '$score_5_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_6', '$score_6_a', '$score_6_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_7', '$score_7_a', '$score_7_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_8', '$score_8_a', '$score_8_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_9', '$score_9_a', '$score_9_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_10', '$score_10_a', '$score_10_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_11', '$score_11_a', '$score_11_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_12', '$score_12_a', '$score_12_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_13', '$score_13_a', '$score_13_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_14', '$score_14_a', '$score_14_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_15', '$score_15_a', '$score_15_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_16', '$score_16_a', '$score_16_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_17', '$score_17_a', '$score_17_b');";
		$sql .= "INSERT INTO user_goals_scored (user,fixture,team_a,team_b) VALUES ('$id_user','$fixture_18', '$score_18_a', '$score_18_b')";

	}else{

		// UPDATE
		$sql = "UPDATE user_goals_scored SET team_a = '$score_1_a', team_b = '$score_1_b' WHERE user = '$id_user' AND fixture = '$fixture_1';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_2_a', team_b = '$score_2_b' WHERE user = '$id_user' AND fixture = '$fixture_2';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_3_a', team_b = '$score_3_b' WHERE user = '$id_user' AND fixture = '$fixture_3';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_4_a', team_b = '$score_4_b' WHERE user = '$id_user' AND fixture = '$fixture_4';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_5_a', team_b = '$score_5_b' WHERE user = '$id_user' AND fixture = '$fixture_5';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_6_a', team_b = '$score_6_b' WHERE user = '$id_user' AND fixture = '$fixture_6';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_7_a', team_b = '$score_7_b' WHERE user = '$id_user' AND fixture = '$fixture_7';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_8_a', team_b = '$score_8_b' WHERE user = '$id_user' AND fixture = '$fixture_8';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_9_a', team_b = '$score_9_b' WHERE user = '$id_user' AND fixture = '$fixture_9';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_10_a', team_b = '$score_10_b' WHERE user = '$id_user' AND fixture = '$fixture_10';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_11_a', team_b = '$score_11_b' WHERE user = '$id_user' AND fixture = '$fixture_11';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_12_a', team_b = '$score_12_b' WHERE user = '$id_user' AND fixture = '$fixture_12';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_13_a', team_b = '$score_13_b' WHERE user = '$id_user' AND fixture = '$fixture_13';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_14_a', team_b = '$score_14_b' WHERE user = '$id_user' AND fixture = '$fixture_14';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_15_a', team_b = '$score_15_b' WHERE user = '$id_user' AND fixture = '$fixture_15';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_16_a', team_b = '$score_16_b' WHERE user = '$id_user' AND fixture = '$fixture_16';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_17_a', team_b = '$score_17_b' WHERE user = '$id_user' AND fixture = '$fixture_17';";
		$sql .= "UPDATE user_goals_scored SET team_a = '$score_18_a', team_b = '$score_18_b' WHERE user = '$id_user' AND fixture = '$fixture_18';";

	}

	

	try{



		if($conexion->multi_query($sql) === TRUE){

			echo 'ok';

		}else{

			echo 'err';

			// echo "Error: " . $sql . "<br>" . $conexion->error;

		}

	}catch(\Exception $ex){

		echo "Error: " . $ex->getMessage();

	}


}else{



	echo 'error';



}



?>