<?php

header('Content-type:application/json;charset=UTF-8');

require_once('config/database.php');
require_once('config/functions.php');
global $conexion;

$idUser=1; $idFixture=1;

$sql = "SELECT f_o.goal_a,f_o.goal_b,f_u.team_a,f_u.team_b FROM fixtures AS f_o INNER JOIN user_goals_scored AS f_u ON f_o.id=f_u.fixture WHERE f_u.fixture='$idFixture' AND f_u.user='$idUser'";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();

// seteamos variables
$score_oficial_equipo_a = $row['goal_a'];
$score_oficial_equipo_b = $row['goal_b'];

$score_user_equipo_a = $row['team_a'];
$score_user_equipo_b = $row['team_b'];

if($score_oficial_equipo_a === '-' && $score_oficial_equipo_b === '-'){

}else{
	$result_fix = getMayorFixture($idFixture);
	$result_user = getMayorUser($idFixture);
	if($result_fix != $result_user){
		asignaPuntaje($idUser, $idFixture, 0);
	}else{
		if($score_oficial_equipo_a === $score_user_equipo_a && $score_oficial_equipo_b === $score_user_equipo_b){
			asignaPuntaje($idUser, $idFixture, 2);

		}
		else{
			asignaPuntaje($idUser, $idFixture, 1);
		}
	}

}
?>