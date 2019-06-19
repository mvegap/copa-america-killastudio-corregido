<?php



session_start();



if(!isset($_SESSION['user_session']) && !isset($_SESSION['user_type'])){

  header('Location: login.php');

}



include_once('api/config/database.php');

include_once('api/config/functions.php');



$nombres = getName($_SESSION['user_session']);



?>



<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Participantes :: Copa América</title>

  <link rel="icon" href="assets/images/favicon.ico">

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



    

    <section id="participantesScreen" class="participantes-screen">

      <div class="title-screen">

        <h2>Participantes</h2>

      </div>

      <div class="container-participantes">

        <table class="table-participantes">

          <thead>

            <tr>

              <th style="display: none;"><span><img src="assets/images/icons/icon-copa.svg" alt=""></span></th>

              <th><span><img src="assets/images/icons/icon-participante.svg" alt=""></span></th>

              <th><span><img src="assets/images/icons/icon-puesto.svg" alt=""></span></th>

              <th>&nbsp;</th>

            </tr>

          </thead>

          <tbody>



            <?php



            $sql = "SELECT * FROM users WHERE type_user='$_SESSION[user_type]' ORDER BY score_total DESC";

            $result = $conexion->query($sql);



            while($row = $result->fetch_array()){


              echo '<tr>';

              echo '<td style="display:none;">&nbsp;</td>';

              echo '<td>'. $row['fullname'] .'</td>';

              echo '<td>' . $row['score_total'] . '</td>';

              echo '<td><form action="ver-pronostico.php" method="POST"><input type="hidden" id="id_jugador" name="id_jugador" value="'.$row['id'].'"><button type="submit" class="btn btn-ver-pronostico">ver pronóstico</button></form></td>';

              echo '</tr>';

            }



            ?>

            

          </tbody>

        </table>

      </div>

    </section>





    <div class="copyright">

      <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>

    </div>

  </main>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/app.min.js"></script>
</body>
</html>