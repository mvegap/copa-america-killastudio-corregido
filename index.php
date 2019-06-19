<!DOCTYPE html>

<html lang="es">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Copa América</title>

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



    <section id="splashScreen" class="splash-screen">

      <nav class="navigation" style="display: none;">

        <div><button onclick="menu()" class="btn_menu"><img src="assets/images/icons/icon-menu.png" alt=""></button></div>

      </nav>

      <header class="header-section">

        <div class="logo">

          <a href=""><img src="assets/images/logo-copaamerica.svg" alt=""></a>

        </div>

      </header>

      <div class="contador-home">

        <h3>Llena tus pronósticos</h3>

        <div class="countdown">

          <p id="countDown"><span>00</span>:<span>00</span>:<span>00</span></p>

          <div class="label_countdown">

            <div><span>Horas</span></div>

            <div><span>Minutos</span></div>

            <div><span>Segundos</span></div>

          </div>

        </div>

        <a href="login.php" class="btn btn-primary btn-block">Jugar</a>

        <!-- <button class="btn btn-primary btn-block">Jugar</button> -->

      </div>

    </section><!--/.end.splash-screen-->





    <section id="menuScreen" class="menu-screen">

      <header class="header-section">

        <div class="logo">

          <a href=""><img src="assets/images/logo-copaamerica.svg" alt=""></a>

        </div>

      </header>

      <div class="container-menu">

        <div><p><a href="reglas.php" class="btn btn-secondary btn-block">Reglas</a></p></div>

        <div><p><a href="participantes.php" class="btn btn-secondary btn-block">Participantes</a></p></div>

        <div><p><a href="fixture.php"class="btn btn-secondary btn-block">Fixture</a></p></div>

        <div><p><a href="login.php" class="btn btn-primary btn-block">Jugar</a></p></div>

        <div class="whatsapp">
          <p><a href="https://wa.me/5114455690" target="_blank" title="Consúltanos por WhatsApp"><span><img src="assets/images/icons/icon-whatsapp.svg" alt=""></span> Dudas y consultas</a></p>
        </div>

      </div>



      <div class="copyright">

        <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>

      </div>

    </section><!--/.end.menu-screen-->



    <div class="copyright">

      <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>

    </div>



  </main>

  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="assets/js/app.min.js"></script>

  <script type="text/javascript">

    

    function countdownInit(){

      var dateFinish = new Date('Jun 14, 2019 18:30:00').getTime();

      var x = setInterval(function(){

        

        var now = new Date().getTime();

        var distance = dateFinish - now;



        var days = Math.floor(distance / (1000 * 60 * 60 * 24));

        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

        var seconds = Math.floor((distance % (1000 * 60)) / 1000);



        var hours_format = (hours < 10) ? "0" + hours : hours;

        var minutes_format = (minutes < 10) ? "0" + minutes : minutes;

        var seconds_format = (seconds < 10) ? "0" + seconds : seconds;



        document.getElementById('countDown').innerHTML = '<span>' + hours_format + '</span>:<span>' + minutes_format + '</span>:<span>' + seconds_format + '</span>';



        if(distance < 0){

          clearInterval(x);

          document.getElementById('countDown').innerHTML = '-';

        }



      },1000);

    }



    countdownInit();



  </script>

</body>

</html>