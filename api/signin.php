<?php

session_start();
require_once('config/database.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $usuario = htmlspecialchars(strip_tags($_POST['usuario']));
  $password = htmlspecialchars(strip_tags($_POST['password']));

  try{

    $sql = "SELECT * FROM users WHERE username='$usuario' AND password='$password'";
    $result = $conexion->query($sql);
    $count = $result->num_rows;

    if($result->num_rows > 0){

      while($row = $result->fetch_array()){
        echo 'ok';
        $_SESSION['user_session'] = $row['id'];
        $_SESSION['user_type'] = $row['type_user'];
      }

      
    }else{
      echo 'Usuario o contraseña inválidos';
    }

  }catch(\Exception $ex){
    echo "Error: " . $ex->getMessage();
  }

}else{
  echo 'error';
}

?>