<?php

require_once 'database.php';


function getTotalUsers(){

	global $conexion;

	$sql = "SELECT COUNT(id) AS Total FROM users";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	return $row['Total'];

}

function getTotalFixtures(){

	global $conexion;

	$sql = "SELECT COUNT(id) as Total FROM fixtures";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	return $row['Total'];

}


// obtiene el nombre del equipo ganador del score oficial
function getEquipoGanador($fixture){

	global $conexion;

	$sql = "SELECT * FROM fixtures WHERE id='$fixture'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	$score_a = $row['goal_a'];
	$score_b = $row['goal_b'];

	if($score_a === '-' && $score_b === '-'){

		return false;

	}else{

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

	

}

// obtiene el nombre del equipo gandor del score del usuario
function getEquipoGanadorUser($idUser, $fixture){

	global $conexion;

	$sql = "SELECT fix.team_a AS IdEquipoA,t1.name AS NameEquipoA, fix.team_b AS IdEquipoB, t2.name AS NameEquipoB, score.team_a AS ScoreUserEquipoA,score.team_b AS ScoreUserEquipoB FROM user_goals_scored AS score INNER JOIN fixtures AS fix ON score.fixture=fix.id INNER JOIN teams AS t1 ON fix.team_a=t1.id INNER JOIN teams AS t2 ON fix.team_b=t2.id WHERE score.fixture='$fixture' AND user='$idUser'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	// puntaje del usuario por cada equipo del fixture
	$team_a = $row['ScoreUserEquipoA'];
	$team_b = $row['ScoreUserEquipoB'];


	// algoritmo de comparación
	if($team_a > $team_b){

		return $row['NameEquipoA'];

	}else{

		return $row['NameEquipoB'];

	}
	

}



function asignaPuntaje($user,$fixture,$points){

	global $conexion;

	$stmt = "SELECT user,fixture FROM score WHERE user='$user' AND fixture='$fixture'";
	$result = $conexion->query($stmt);
	$count = $result->num_rows;

	if($count > 0){

		$sql = "UPDATE score SET fixture='$fixture', total_score='$points' WHERE user='$user' AND fixture='$fixture'";
		$result = $conexion->query($sql);

		if($result === TRUE){

			return true;

		}else{

			return false;

		}

	}else{

		$sql = "INSERT INTO score (user,fixture,total_score) VALUES ('$user','$fixture','$points')";
		$result = $conexion->query($sql);

		if($result === TRUE){

			return true;

		}else{

			return false;

		}

	}

}









// refactor
function getMayorFixture($fixture){

	global $conexion;

	$sql = "SELECT goal_a,goal_b FROM fixtures WHERE id='$fixture'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	$golA = $row['goal_a'];
	$golB = $row['goal_b'];

	if($golA === $golB){
		return "empate";
	}else if($golA > $golB){
		return "A";
	}else{
		return "B";
	}

}

function getMayorUser($fixture){

	global $conexion;

	$sql = "SELECT team_a,team_b FROM user_goals_scored WHERE fixture='$fixture'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	$gol_a = $row['team_a'];
	$gol_b = $row['team_b'];

	if($gol_a === $gol_b){
		return "empate";
	}else if($gol_a > $gol_b){
		return "A";
	}else{
		return "B";
	}

}


function mayorDosNumeros($one,$two){
	if($one > $two){
		return $one;
	}else if($one === $two){
		return "equals";
	}else{
		return $two;
	}
}



function comparaScoreExacto($idUser, $idFixture){

	global $conexion;

	$sql = "SELECT f_o.goal_a,f_o.goal_b,f_u.team_a,f_u.team_b FROM fixtures AS f_o INNER JOIN user_goals_scored AS f_u ON f_o.id=f_u.fixture WHERE f_u.fixture='$idFixture' AND f_u.user='$idUser'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	// seteamos variables
	$score_oficial_equipo_a = $row['goal_a'];
	$score_oficial_equipo_b = $row['goal_b'];

	$score_user_equipo_a = $row['team_a'];
	$score_user_equipo_b = $row['team_b'];

	/*
	if($score_oficial_equipo_a === '-' && $score_oficial_equipo_b === '-'){

		// asignaPuntaje($idUser, $idFixture, 0);
		//echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : -\n";

	}else{

		// algoritmo para la comparación de igualdad en resultados
		if($score_oficial_equipo_a === $score_user_equipo_a && $score_oficial_equipo_b === $score_user_equipo_b){

			asignaPuntaje($idUser, $idFixture, 2);
			//echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : 2\n";

		}else{

			// asignaPuntaje($idUser, $idFixture, 0);

			// $ganador_oficial = mayorDosNumeros($score_oficial_equipo_a, $score_oficial_equipo_b);
			// $ganador_user = mayorDosNumeros($score_user_equipo_a, $score_user_equipo_b);

			// if($ganador_oficial === $ganador_user){
			// 	asignaPuntaje($idUser, $idFixture, 1);
			// 	echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : 1\n";
			// }else{
			// 	asignaPuntaje($idUser, $idFixture, 0);
			// 	echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : 0\n"; 
			// }




			//comprobamos quien es mayor de ambos equipos
			$result_fix = getMayorFixture($idFixture);
			$result_user = getMayorUser($idFixture);

			if($result_fix != $result_user){
				// echo '0 puntos';
				asignaPuntaje($idUser, $idFixture, 0);
				//echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : 0\n";
			}else{
				// echo "1 punto";
				asignaPuntaje($idUser, $idFixture, 1);
				//echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : 1\n";
			}
			
			// //comparaScoreGanador($idUser, $idFixture);


		}

	}
	*/

	if($score_oficial_equipo_a === '-' && $score_oficial_equipo_b === '-'){
		asignaPuntaje($idUser, $idFixture, 0);
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

}
























function comparaScoreGanador($idUser, $idFixture){

	$match_official = getEquipoGanador($idFixture);
	$match_user = getEquipoGanadorUser($idUser, $idFixture);

	if($match_official){

		if($match_user === $match_official){
		
			asignaPuntaje($idUser,$idFixture,1);
			echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . "| [PUNTOS] : 1\n";

		}else{

			asignaPuntaje($idUser,$idFixture,0);
			echo "[FIXTURE] : " . $idFixture . " | [USUARIO] : " . $idUser . " | [PUNTOS] : 0\n";

		}

	}else{

		asignaPuntaje($idUser,$idFixture,0);
		echo "[FIXTURE] : " . $idFixture . " | [USUARIO]: " . $idUser . " | [PUNTOS] : 0\n";


	}

	

}




function sumarScore($user){

	global $conexion;

	$sql = "SELECT SUM(total_score) AS consolidado FROM score WHERE user='$user'";
	$result = $conexion->query($sql);
	$row = $result->fetch_assoc();

	$total = $row['consolidado'];

	$stmt = "UPDATE users SET score_total='$total' WHERE id='$user'";
	$res = $conexion->query($stmt);

	if($res === TRUE){
		return true;
	}else{
		return false;
	}

}





?>