<?php

require_once 'database.php';
require_once 'functions.php';

// function getMayorFixture($fixture){

// 	global $conexion;

// 	$sql = "SELECT goal_a,goal_b FROM fixtures WHERE id='$fixture'";
// 	$result = $conexion->query($sql);
// 	$row = $result->fetch_assoc();

// 	$golA = $row['goal_a'];
// 	$golB = $row['goal_b'];

// 	if($golA === $golB){
// 		return "empate";
// 	}else if($golA > $golB){
// 		return "A";
// 	}else{
// 		return "B";
// 	}

// }



// function getMayorUser($fixture){

// 	global $conexion;

// 	$sql = "SELECT team_a,team_b FROM user_goals_scored WHERE fixture='$fixture'";
// 	$result = $conexion->query($sql);
// 	$row = $result->fetch_assoc();

// 	$gol_a = $row['team_a'];
// 	$gol_b = $row['team_b'];

// 	if($gol_a === $gol_b){
// 		return "empate";
// 	}else if($gol_a > $gol_b){
// 		return "A";
// 	}else{
// 		return "B";
// 	}

// }

// $result_fix = getMayorFixture(2);
// $result_user = getMayorUser(2);

// if($result_fix != $result_user){
// 	echo '0 puntos';
// }else{
// 	echo "1 punto";
// }


// echo "<br>" . $result_fix . " " . $result_user;

// comparaScoreExacto(3, 3);

// if(0 === 2 && 2 === 2){
// 	echo 'igualdad';
// }else{
// 	echo 'no igualdad';
// }

echo sumarScore(6);



?>