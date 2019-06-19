<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Reglas :: Copa América</title>

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



    

    <section id="reglasScreen" class="reglas-screen">

      <header class="header-section" style="display: none;">

        <div class="logo">

          <a href=""><img src="assets/images/logo-copaamerica.svg" alt=""></a>

        </div>

      </header>

      <div class="container-reglas">

        <h1>Reglas</h1>

        <ol>

          <li><span>Los participantes que acierten el resultado final indistintamente del score dentro de los 90 minutos de juego sumarán 01 punto</span></li>

          <li><span>Los participantes que acierten el resultado final y acierten el score dentro de los 90 minutos de juego sumarán 02 puntos.</span></li>

          <li><span>El ingreso de los pronósticos debe ser antes del inicio de cada fase</span></li>

          <li><span>Los que no ingresen los pronósticos dentro de la fecha no sumarán punto alguno</span></li>

          <li><span>Ganará el participante que sume más puntos al final de la copa</span></li>

          <li><span>En caso de haber más de un ganador el premio se repartirá entre los participantes que ocupen el primer lugar.</span></li>

        </ol>

      </div>

    </section><!--/.end.reglas-screen-->



    <div class="copyright">

      <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>

    </div>



  </main>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="assets/js/app.min.js"></script>

</body>

</html>