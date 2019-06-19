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
	<link rel="stylesheet" href="assets/css/style.css">
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
    
    <h4>Pronósticos</h4>

    <div class="row">
      <div class="col-lg-12">
        <table class="table">
          <thead>
            <th scope="col">ID</th>
            <th scope="col">Usuario</th>
            <th scope="col">Fixture</th>
            <th scope="col">Score A</th>
            <th scope="col">Score B</th>
            <th scope="col">Última actualización</th>
          </thead>
          <tbody>
            <?php

            $stmt = "SELECT users.id,users.fullname as nombres,score.user,score.fixture,score.team_a,score.team_b,score.updated_at FROM user_goals_scored AS score INNER JOIN users ON score.user=users.id ORDER BY score.fixture ASC, score.id ASC,users.id ASC";
            $result = $conexion->query($stmt);
            
            while($row = $result->fetch_array())
            
            {

            ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['nombres']; ?></td>
              <td><?php echo $row['fixture']; ?></td>
              <td><?php echo $row['team_a']; ?></td>
              <td><?php echo $row['team_b']; ?></td>
              <td><?php echo $row['updated_at']; ?></td>
            </tr>

            <?php

            }

            ?>
          </tbody>
        </table>
      </div>
    </div>


  </div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>