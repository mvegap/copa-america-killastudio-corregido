<?php

include_once('api/config/database.php');

// partidos grupo a
$partidos_grupo_a = "SELECT f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='A' ORDER BY f.id ASC";
$result_a = $conexion->query($partidos_grupo_a);

// partidos grupo b
$partidos_grupo_b = "SELECT f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='B' ORDER BY f.id ASC";
$result_b = $conexion->query($partidos_grupo_b);

// partidos grupo c
$partidos_grupo_c = "SELECT f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='C' ORDER BY f.id ASC";
$result_c = $conexion->query($partidos_grupo_c);


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fixture :: Copa América</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/app.min.css">
</head>
<body>
  
  <main class="root-app">

    <nav class="nav-app">
      <div><button onclick="menu()" class="btn_menu"><img src="assets/images/icons/icon-menu.png" alt=""></button></div>
    </nav>


    <section id="menuScreen" class="menu-screen">
      <header class="header-section">
        <div class="logo">
          <a href="index.php"><img src="assets/images/logo-copaamerica.svg" alt=""></a>
        </div>
      </header>
      <div class="container-menu">
        <div><p><a href="reglas.php" class="btn btn-secondary btn-block">Reglas</a></p></div>
        <div><p><a href="participantes.php" class="btn btn-secondary btn-block">Participantes</a></p></div>
        <div><p><a href="fixture.php" class="btn btn-secondary btn-block">Fixture</a></p></div>
        <div><p><a href="login.php" class="btn btn-primary btn-block">Jugar</a></p></div>
        <div class="whatsapp">
          <p><a href="https://wa.me/5114455690" target="_blank" title="Consúltanos por WhatsApp"><span><img src="assets/images/icons/icon-whatsapp.svg" alt=""></span> Dudas y consultas</a></p>
        </div>
      </div>
    </section><!--/.end.menu-screen-->

    <section id="fixtureScreen" class="fixture-screen">
      <header class="header-section">
        <div class="logo">
          <a href=""><img src="assets/images/logo-copaamerica.svg" alt=""></a>
        </div>
      </header>
      <div class="container-fixture">
        
        <div class="fixture-group">
          
          <div class="title-group">
            <h2>Grupo A</h2>
          </div>

          <?php

          while($row = $result_a->fetch_assoc())
          
          {

          ?>

          <div class="item-marcador">
            <div class="marcador">
              <div>
                <div class="item-pais"><?php echo $row['teamA']; ?> <span><img src="<?php echo 'assets/images/flags/' . $row['team_a'] . '.svg'; ?>" alt=""></span></div>
                <div class="goles"><?php echo $row['goal_a']; ?></div>
              </div>
              <div>
                <div class="goles"><?php echo $row['goal_b']; ?></div>
                <div class="item-pais"><span><img src="<?php echo 'assets/images/flags/' . $row['team_b'] . '.svg'; ?>" alt=""></span> <?php echo $row['teamB']; ?></div>
              </div>
            </div>
            <div class="info-partido">
              <p><span><?php echo $row['date']; ?></span> | <span><?php echo $row['stadium']; ?></span></p>
            </div>
          </div><!--/.end.item-marcador-->

          
          <?php 
          
          }

          ?>




          <div class="title-group">
            <h2>Grupo B</h2>
          </div>

          <?php

          while($row = $result_b->fetch_assoc())
          
          {

          ?>

          <div class="item-marcador">
            <div class="marcador">
              <div>
                <div class="item-pais"><?php echo $row['teamA']; ?> <span><img src="<?php echo 'assets/images/flags/' . $row['team_a'] . '.svg'; ?>" alt=""></span></div>
                <div class="goles"><?php echo $row['goal_a']; ?></div>
              </div>
              <div>
                <div class="goles"><?php echo $row['goal_b']; ?></div>
                <div class="item-pais"><span><img src="<?php echo 'assets/images/flags/' . $row['team_b'] . '.svg'; ?>" alt=""></span> <?php echo $row['teamB']; ?></div>
              </div>
            </div>
            <div class="info-partido">
              <p><span><?php echo $row['date']; ?></span> | <span><?php echo $row['stadium']; ?></span></p>
            </div>
          </div><!--/.end.item-marcador-->

          
          <?php 
          
          }

          ?>

          <div class="title-group">
            <h2>Grupo C</h2>
          </div>


          <?php

          while($row = $result_c->fetch_assoc())
          
          {

          ?>

          <div class="item-marcador">
            <div class="marcador">
              <div>
                <div class="item-pais"><?php echo $row['teamA']; ?> <span><img src="<?php echo 'assets/images/flags/' . $row['team_a'] . '.svg'; ?>" alt=""></span></div>
                <div class="goles"><?php echo $row['goal_a']; ?></div>
              </div>
              <div>
                <div class="goles"><?php echo $row['goal_b']; ?></div>
                <div class="item-pais"><span><img src="<?php echo 'assets/images/flags/' . $row['team_b'] . '.svg'; ?>" alt=""></span> <?php echo $row['teamB']; ?></div>
              </div>
            </div>
            <div class="info-partido">
              <p><span><?php echo $row['date']; ?></span> | <span><?php echo $row['stadium']; ?></span></p>
            </div>
          </div><!--/.end.item-marcador-->

          
          <?php 
          
          }

          ?>








          
        </div><!--/.end.fixture-group-->
        
      </div>
    </section><!--/.end.fixture-screen-->

    <div class="copyright">
      <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>
    </div>

  </main>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/app.min.js"></script>
</body>
</html>