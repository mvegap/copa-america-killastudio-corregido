<?php

date_default_timezone_set('America/Lima');

$puntaje = 0;
//header('Content-type:application/json;charset=UTF-8');

// score exacto = 2 puntos
// score al ganador = 1 punto



/**
 * 
 * 
 * Compara el score del usuario con el de la base de datos
 * 
 * @param $userScore1
 * @param $userScore2
 * @param $dbScore1
 * @param $dbScore2
 * 
 * 
 */

function compareScore($dbScore1, $dbScore2, $userScore1, $userScore2){
  if($dbScore1 === $userScore1 && $dbScore2 === $userScore2){
    $puntaje = 2;
    echo 'Puntos: ' . $puntaje;
  }else{

    $winner_db = getWinnerFromScore($dbScore1, $dbScore2);
    $winner_user = getWinnerFromScore($userScore1, $userScore2);

    // una vez obtenido el match ganador por cada score (usuario y fixture) se haría la consulta
    // a la base de datos para obtener el ID del equipo para después realizar la misma 
    // comparación entre usuario y fixture

    // se podría crear una función que retorne el nombre del ganador de la base de datos según el score

    $puntaje = 0;
    echo 'Winner DB: ' . $winner_db . " - Winner User: " . $winner_user;
    // echo 'Puntos: ' . $puntaje;

  }
}


/**
 * 
 * Obtiene el equipo ganador según los scores
 * 
 * @param $score1
 * @param $score2
 * 
 */

function getWinnerFromScore($score1, $score2){
  if($score1 > $score2){
    // echo 'El ganador es el score del equipo 1';
    // echo 1;
    return $score1;
  }else{
    // echo 2;
    return $score2;
    // echo 'El ganador es el score del equipo 2';
  }
}

// getWinnerFromScore(1,2);
compareScore(0,0,0,0);



/*
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $data = json_decode(file_get_contents("php://input"), true);
  
  $equipo1 = intval(htmlspecialchars(strip_tags(trim($data['equipo1']))));
  $equipo2 = intval(htmlspecialchars(strip_tags(trim($data['equipo2']))));

  if($equipo1 > $equipo2){
    echo json_encode(array("message" => "Ganó el equipo 1"));
  }else if($equipo1 === $equipo2){
    echo json_encode(array("message" => "Empates"));
  }else{
    echo json_encode(array("message" => "Ganó el equipo 2"));
  }


}else{
  http_response_code(405);
  echo json_encode(array("message" => "method not allowed"));
}
*/



?>