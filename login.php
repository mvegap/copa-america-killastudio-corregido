<?php



session_start();



if(isset($_SESSION['user_session'])){

  header('Location: pronosticos.php');

}





?>



<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login :: Copa América</title>
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

    <section id="loginScreen" class="login-screen">
      <header class="header-section">
        <div class="logo">
          <a href="index.php"><img src="assets/images/logo-copaamerica.svg" alt=""></a>
        </div>
      </header>

      <div class="login-form">
        <div id="response">&nbsp;</div>
        <div class="loading">
          <img src="assets/images/loading.svg" alt="">
        </div>
        <form id="loginForm" name="loginForm" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
        </form>
        <div class="container-reset-password">
          <p><a href="reset_password.php" title="Olvidé mi contraseña">Olvidé mi contraseña</a></p>
        </div>
        <div class="whatsapp">
          <p><a href="https://wa.me/5114455690" target="_blank" title="Consúltanos por WhatsApp"><span><img src="assets/images/icons/icon-whatsapp.svg" alt=""></span> Dudas y consultas</a></p>
        </div>
      </div>
    </section><!--/.end.login-screen-->


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
    </section><!--/.end.menu-screen-->



    <div class="copyright">
      <p>Powered by <span><a href=""><img src="assets/images/logo-killastudio.svg" alt=""></a></span></p>
    </div>
  </main>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script type="text/javascript">

    $('#loginForm').on('submit', function(e){

      e.preventDefault();

      var data = $('#loginForm').serialize();

      $.ajax({
        type: 'POST',
        url: 'api/signin.php',
        data: data,
        beforeSend: function(){
          $('.loading').css('display', 'block');
        },
        success: function(res){
          if(res === 'ok'){
            $('.loading').fadeOut();
            $('#response').html(res);
            window.location.href = 'pronosticos.php';
          }else{
            $('.loading').fadeOut();
            $('#response').html(res);
          }
        },
        error: function(xhr,res,txt){
          console.log(xhr,res,txt);
        }
      });

    });

  </script>

</body>
</html>