<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cambiar contraseña :: Copa América</title>
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
        <form id="resetpasswordForm" name="resetpasswordForm" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="re_password" name="re_password" placeholder="Re-contraseña" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block" style="text-transform:inherit;">Cambiar contraseña</button>
        </form>
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

    $('#resetpasswordForm').on('submit', function(e){

      e.preventDefault();

      var data = $('#resetpasswordForm').serialize();

      $.ajax({
        type: 'POST',
        url: 'api/change_password.php',
        data: data,
        beforeSend: function(){
          $('.loading').css('display', 'block');
        },
        success: function(res){
          
          if(res.code === 201){
            $('.loading').fadeOut();
            $('#response').html(res.message);
            $('#resetpasswordForm')[0].reset();
            setTimeout(function(){
              window.location.href = 'login.php';
            },1500);
          }else{
            $('.loading').fadeOut();
            $('#response').html(res.message);
            $('#resetpasswordForm')[0].reset();
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