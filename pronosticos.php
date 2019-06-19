<?php

session_start();

if(!isset($_SESSION['user_session']) && !isset($_SESSION['user_type'])){
  header('Location: login.php');
}

include_once('api/config/database.php');
include_once('api/config/functions.php');

$nombres = getName($_SESSION['user_session']);
$puntaje = getPuntaje($_SESSION['user_session']);


// partidos grupo a
$sql_partidos_a = "SELECT f.id as id_fixture, f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='A' ORDER BY f.id ASC";
$result_a = $conexion->query($sql_partidos_a);


// partidos grupo b
$sql_partidos_b = "SELECT f.id as id_fixture, f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='B' ORDER BY f.id ASC";
$result_b = $conexion->query($sql_partidos_b);

// partidos grupo c
$sql_partidos_c = "SELECT f.id as id_fixture, f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='C' ORDER BY f.id ASC";
$result_c = $conexion->query($sql_partidos_c);





// obtenemos el score por el id del usuario y el id del fixture
$goles = getUserScore($_SESSION['user_session'], 2);


// $ganador = scoreGanador(1);
// //echo "GANADOR: " . $ganador;

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mis pronósticos :: Copa América</title>
  <link rel="icon" href="assets/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
  <link rel="stylesheet" href="assets/css/app.min.css">
</head>
<body>
  
  <main class="root-app">

    <div class="logout-action">
      <div><a href="logout.php" class="btn btn-default"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></div>
    </div>

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



    <section id="pronosticosScreen" class="pronosticos-screen">





      <div class="container-pronostico">



        <div class="loading">

          <img src="assets/images/loading.svg" alt="">

        </div>

        

        <div class="title-container">

          <h2>Pronóstico</h2>

          <h1><?php echo $nombres; ?></h1>

          <div class="puntaje-container">

            <p><span><?php echo $puntaje; ?></span> puntos</p>

          </div>

        </div><!--/.end.title-container-->



        <div class="fixture-user-group">



          



          <form id="frmPronostico" name="frmPronostico" method="POST">



          <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['user_session']; ?>">



          <div class="title-group">

            <h2>Grupo A</h2>

          </div>



          

          <?php



          while($row = $result_a->fetch_assoc())

          

          {



            $goles = getUserScore($_SESSION['user_session'], $row['id_fixture']);

          

          ?>



          <div class="item-marcador">

            <div class="marcador">

              <input type="hidden" id="fixture_<?php echo $row['id_fixture']; ?>" name="fixture_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['id_fixture']; ?>" />

              <div>

                <div class="item-pais"><?php echo $row['teamA']; ?> <span><img src="<?php echo 'assets/images/flags/' . $row['team_a'] . '.svg'; ?>" alt=""></span></div>

                <input type="text" class="goles" id="score_<?php echo $row['id_fixture']; ?>_a" name="score_<?php echo $row['id_fixture']; ?>_a" pattern="\d*" maxlength="2" value="<?php echo $goles['team_a']; ?>" disabled />

              </div>

              <div>

                <input type="text" class="goles" id="score_<?php echo $row['id_fixture']; ?>_b" name="score_<?php echo $row['id_fixture']; ?>_b" pattern="\d*" maxlength="2" value="<?php echo $goles['team_b']; ?>" disabled />

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



            $goles = getUserScore($_SESSION['user_session'], $row['id_fixture']);

          

          ?>



          <div class="item-marcador">

            <div class="marcador">

              <input type="hidden" id="fixture_<?php echo $row['id_fixture']; ?>" name="fixture_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['id_fixture']; ?>" />

              <div>

                <div class="item-pais"><?php echo $row['teamA']; ?> <span><img src="<?php echo 'assets/images/flags/' . $row['team_a'] . '.svg'; ?>" alt=""></span></div>

                <input type="text" class="goles" id="score_<?php echo $row['id_fixture']; ?>_a" name="score_<?php echo $row['id_fixture']; ?>_a" pattern="\d*" maxlength="2" value="<?php echo $goles['team_a']; ?>" disabled />

              </div>

              <div>

                <input type="text" class="goles" id="txt_goal_b_<?php echo $row['id_fixture']; ?>" name="score_<?php echo $row['id_fixture']; ?>_b" pattern="\d*" maxlength="2" value="<?php echo $goles['team_b']; ?>" disabled />

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



            $goles = getUserScore($_SESSION['user_session'], $row['id_fixture']);

          

          ?>



          <div class="item-marcador">

            <div class="marcador">

              <input type="hidden" id="fixture_<?php echo $row['id_fixture']; ?>" name="fixture_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['id_fixture']; ?>" />

              <div>

                <div class="item-pais"><?php echo $row['teamA']; ?> <span><img src="<?php echo 'assets/images/flags/' . $row['team_a'] . '.svg'; ?>" alt=""></span></div>

                <input type="text" class="goles" id="score_<?php echo $row['id_fixture']; ?>_a" name="score_<?php echo $row['id_fixture']; ?>_a" pattern="\d*" maxlength="2" value="<?php echo $goles['team_a']; ?>" disabled />

              </div>

              <div>

                <input type="text" class="goles" id="score_<?php echo $row['id_fixture']; ?>_b" name="score_<?php echo $row['id_fixture']; ?>_b" pattern="\d*" maxlength="2" value="<?php echo $goles['team_b']; ?>" disabled />

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



          <div id="formActions" class="form-footer">

            <div><button type="submit" id="btnGuardar" class="btn btn-guardar">Guardar</button></div>

            <div><a href="javascript:void(0)" onclick="habilitarForm()" class="btn btn-editar">Editar</a></div>

          </div>



          </form>





        </div><!--/.end.fixture-group-->




      </div>

    </section>



    <div class="copyright">

      <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>

    </div>



  </main>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="assets/js/app.min.js"></script>



  <script type="text/javascript">

    checkStatusForm();    

    $('#frmPronostico').on('submit', function(e){

      e.preventDefault();


      let data = $('#frmPronostico').serialize();

      console.log(data);



      $.ajax({

        type: 'POST',

        url: 'api/user_score.php',

        data: data,

        beforeSend: function(){

          $('.loading').css('display','block');

          console.log('enviando...');

        },

        success: function(res){

          if(res==='ok'){

            $('.loading').fadeOut();

            alert('Pronóstico guardado');

            setTimeout(function(){

              window.location.reload();

            },100);

          }else{

            $('.loading').fadeOut();

            alert('¡Error! Intenta nuevamente');

          }

          console.log(res);

        },

        error: function(xhr,res,text){

          console.log("error ajax");

        }

      })



    });



  </script>



</body>

</html>