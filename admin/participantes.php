<?php

session_start();

if(!isset($_SESSION['admin_session'])){
  header('Location: login.php');
}

include_once('config/database.php');

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador - Copa América 2019 - KillaStudio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Copa América 2019</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="fixture.php">Fixture</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="participantes.php">Participantes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pronosticos.php">Pronósticos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Cerrar sesión</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">

    <h4>Participantes</h4>

    <div class="row">
      <div class="col-lg-6 column-form">
        <div class="response"></div>
        <form id="frm_users" name="frm_users" method="POST">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
              </div>
            </div>
            <div class="col-lg-6">
              <select name="tipo_usuario" id="tipo_usuario" class="form-control" required>
                <option value="1">Amigo</option>
                <option value="2">Cliente</option>
              </select>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
              </div>
            </div>
            <div class="col-lg-6">
              <input type="password" class="form-control" id="password" name="password" required placeholder="Contraseña">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Guardar</button>
          </div>
        </form>
      </div>
      <div class="col-lg-6 column-data">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombres</th>
              <th scope="col">Usuario</th>
              <th scope="col">Tipo de usuario</th>
              <th scope="col">Score</th>
            </tr>
          </thead>
          <tbody>
            <?php

            $sql = "SELECT id,fullname,username,type_user,score_total FROM users ORDER BY id DESC";
            $result = $conexion->query($sql);

            while($row = $result->fetch_array())
            
            {
            
            ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['fullname']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['type_user']; ?></td>
              <td><?php echo $row['score_total']; ?></td>
            </tr>

            <?php

            }

            ?>
          </tbody>
        </table>
      </div>
    </div>

    

  </div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    
    $('#frm_users').on('submit', function(e){

      e.preventDefault();

      var data = $('#frm_users').serialize();

      $.ajax({
        type: 'POST',
        url: 'api/users/insert.php',
        data: data,
        beforeSend: function(){
          console.log('connecting...');
        },
        success: function(res){
          $('#frm_users')[0].reset();
          alert(res.message);
          window.location.reload();
        }
      })

    });

  </script>
</body>
</html>