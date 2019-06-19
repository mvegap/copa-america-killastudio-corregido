<?php

include_once('database.php');

function getNameWinner($num1,$num2){
	if($num1 > $num2){
		return "teamA";
	}else if($num1 == $num2){
		return "empate";
	}else{
		return "teamB";
	}
}

function obtienePuntuacion($score_teamA_fixture, $score_teamB_fixture,$score_teamA_user,$score_teamB_user){

	$winner_fixture = getNameWinner($score_teamA_fixture, $score_teamB_fixture);
	$winner_user = getNameWinner($score_teamA_user, $score_teamB_user);

	if($score_teamA_fixture === '-' && $score_teamB_fixture === '-'){
		return 0;
	}else if($score_teamA_fixture === $score_teamA_user && $score_teamB_fixture === $score_teamB_user){
		return 2;
	}else if($winner_fixture == $winner_user){
		return 1;
	}else{
		return 0;
	}

}


function actualizaPuntuacion($user, $fixture){

	global $conexion;

	$sql = "SELECT f_o.goal_a,f_o.goal_b,f_u.team_a,f_u.team_b FROM fixtures AS f_o INNER JOIN user_goals_scored AS f_u ON f_o.id=f_u.fixture WHERE f_u.fixture='$fixture' AND f_u.user='$user'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	$score_oficial_equipo_a = $row['goal_a'];
	$score_oficial_equipo_b = $row['goal_b'];

	$score_user_equipo_a = $row['team_a'];
	$score_user_equipo_b = $row['team_b'];

	$result = obtienePuntuacion($score_oficial_equipo_a,$score_oficial_equipo_b, $score_user_equipo_a, $score_user_equipo_b);

	return $result;

}

function insertaPuntuacion($user,$fixture,$puntaje){

	global $conexion;

	$stmt = "SELECT user,fixture FROM score WHERE user='$user' AND fixture='$fixture'";
	$result = $conexion->query($stmt);
	$count = $result->num_rows;

	if($count > 0){

		$sql = "UPDATE score SET fixture='$fixture', total_score='$puntaje' WHERE user='$user' AND fixture='$fixture'";
		$result = $conexion->query($sql);

		if($result === TRUE){
			return true;
		}else{
			return false;
		}

	}else{

		$sql = "INSERT INTO score(user,fixture,total_score) VALUES ('$user', '$fixture', '$puntaje')";
		$result = $conexion->query($sql);

		if($result === TRUE){
			return true;
		}else{
			return false;
		}

	}

}



function init(){

	global $conexion;

	$sql = "SELECT user,fixture FROM user_goals_scored ORDER BY user ASC,fixture ASC";
	$result = $conexion->query($sql);

	while($row = $result->fetch_assoc()){
		// insertaPuntuacion($row['user'], )

		$puntos = actualizaPuntuacion($row['user'], $row['fixture']);

		insertaPuntuacion($row['user'], $row['fixture'], $puntos);

		// echo "User: " . $row['user'] . " Fixture:" . $row['fixture']  . " " .  $puntos . "<br>";
		// echo actualizaPuntuacion($row['user'], $row['fixture']) . "<br>";
	}

}

init();


?>