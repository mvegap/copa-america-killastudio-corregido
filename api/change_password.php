<?php

date_default_timezone_set('America/Lima');
header('Content-type:application/json;charset=UTF-8');

require_once('config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $username = htmlspecialchars(strip_tags($_POST['usuario']));

  $password = htmlspecialchars(strip_tags($_POST['password']));
  $re_password = htmlspecialchars(strip_tags($_POST['re_password']));

  if(!empty($username) && !empty($password) && !empty($re_password)){

    if($password === $re_password){

      try{
  
        // comprueba si el usuario existe
        $stmt = "SELECT username FROM users WHERE username='$username'";
        $result = $conexion->query($stmt);
        $count = $result->num_rows;
  
        if($count > 0){
  
          $sql = "UPDATE users SET password='$password' WHERE username='$username'";
        
          if($result = $conexion->query($sql)){
  
            http_response_code(201);
            echo json_encode(array("code" => 201, "message" => "Contraseña cambiada satisfactoriamente"));
  
          }else{
  
            http_response_code(200);
            echo json_encode(array("code" => 400, "message" => "Error al cambiar la contraseña"));
  
          }
  
        }else{
  
          http_response_code(200);
          echo json_encode(array("code" => 401, "message" => "El usuario no existe"));
  
        }
        
    
      }catch(\Exception $ex){
    
        http_response_code(200);
        echo json_encode(array("code" => 404, "message" => "Error: " . $ex->getMessage()));
    
      }
  
    }else{
  
      http_response_code(200);
      echo json_encode(array("code" => 403, "message" => "Las contraseñas no coinciden"));
  
    }

  }else{

    http_response_code(200);
    echo json_encode(array("code" => 404, "message" => "Todos los campos son requeridos"));

  }
  

}else{

  http_response_code(405);
  echo json_encode(array("code" => 405, "message" => "Method not allowed"));

}

?>