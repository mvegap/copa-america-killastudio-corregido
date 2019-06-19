<?php

require_once 'database.php';

// obtiene el nombre
function getName($id){

	global $conexion;

	$sql = "SELECT fullname FROM users WHERE id='$id'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();
	
	return $row['fullname'];
}

// obtiene el puntaje acumulado del usuario
function getPuntaje($id){

	global $conexion;

	$sql = "SELECT SUM(total_score) AS TotalScore FROM score WHERE user='$id'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	return $row['TotalScore'];
}

// obtiene el score del usuario por el id del fixture
function getUserScore($usuario, $fixture){

	global $conexion;

	$sql = "SELECT * FROM user_goals_scored WHERE user='$usuario' AND fixture='$fixture'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	return $row;
}


function compareScore($idFixture, $idUser){

	global $conexion;

	// compara los resultados del fixture oficial con el del usuario
	$sql = "SELECT f_o.goal_a,f_o.goal_b,f_u.team_a,f_u.team_b FROM fixtures AS f_o INNER JOIN user_goals_scored AS f_u ON f_o.id=f_u.fixture WHERE f_u.fixture='$idFixture' AND f_u.user='$idUser'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	// seteamos las variables
	$goal_a = $row['goal_a'];
	$goal_b = $row['goal_b'];
	
	$team_a = $row['team_a'];
	$team_b = $row['team_b'];

	// algoritmo de comparación de resultados
	if($goal_a === $team_a && $goal_b === $team_b){

		// return "score exacto";
		return true;

	}else{

		// return "el score no es exacto";
		return false;

	}

	
	return $row;

}



// obtiene el nombre del equipo ganador del score oficial
function getEquipoGanador($fixture){

	global $conexion;

	$sql = "SELECT * FROM fixtures WHERE id='$fixture'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	$score_a = $row['goal_a'];
	$score_b = $row['goal_b'];

	if($score_a > $score_b){

		$stmt = "SELECT fixtures.team_a,teams.name as equipo_ganador FROM fixtures INNER JOIN teams ON fixtures.team_a=teams.id WHERE fixtures.goal_a='$score_a' AND fixtures.id='$fixture'";
		$res = $conexion->query($stmt);
		$row = $res->fetch_assoc();

		return $row['equipo_ganador'];

	}else{

		$stmt = "SELECT fixtures.team_b,teams.name as equipo_ganador FROM fixtures INNER JOIN teams ON fixtures.team_b=teams.id WHERE fixtures.goal_b='$score_b' AND fixtures.id='$fixture'";
		$res = $conexion->query($stmt);
		$row = $res->fetch_assoc();

		return $row['equipo_ganador'];
		
	}

}


// obtiene el nombre del equipo gandor del score del usuario
function getEquipoGanadorUser($fixture){

	global $conexion;

	$sql = "SELECT * FROM user_goals_scored WHERE fixture='$fixture'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	// puntaje del usuario por cada equipo del fixture
	$team_a = $row['team_a'];
	$team_b = $row['team_b'];


	// algoritmo de comparación
	if($team_a > $team_b){

		return $row['team_a'];

	}else{

		return $row['team_b'];

	}
	

}

















?>