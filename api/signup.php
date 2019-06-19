<?php

date_default_timezone_set('America/Lima');
header('Content-type:application/json;charset=UTF-8');

include_once('config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $data = json_decode(file_get_contents("php://input"), true);
  
  $nombres = htmlspecialchars(strip_tags(trim($data['nombres'])));
  $apellidos = htmlspecialchars(strip_tags(trim($data['apellidos'])));
  $email = htmlspecialchars(strip_tags(trim($data['email'])));
  $password = htmlspecialchars(strip_tags(trim($data['password'])));

  $fecha = date('Y-m-d H:i:s');

  if(!empty($email) && !empty($password)){

    $stmt = $con->prepare("INSERT INTO usuarios (nombres,apellidos,email,password,created_at) VALUES (:nombres,:apellidos,:email,:password,:fecha)");
    $stmt->bindParam(":nombres", $nombres);
    $stmt->bindParam(":apellidos", $apellidos);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":fecha", $fecha);

    if($stmt->execute()){

      http_response_code(201);
      echo json_encode(array("message" => "Participante registrado satisfactoriamente"));

    }else{

      http_response_code(400);
      echo json_encode(array("message" => "Error al registrar al participante"));

    }


  }else{

    http_response_code(200);
    echo json_encode(array("message" => "El email y la contraseña son requeridos"));

  }



}else{

  http_response_code(405);
  echo json_encode(array("message" => "Method not allowed"));

}

?>