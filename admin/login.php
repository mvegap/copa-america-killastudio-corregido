<?php

session_start();

if(isset($_SESSION['admin_session'])){
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Login Administrador - Copa América 2019 - KillaStudio</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<h4>Login</h4>
				<div id="response"></div>
				<form id="frm_login_admin" name="frm_login_admin" method="POST">
					<div class="form-group">
						<input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Usuario">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" name="password" required placeholder="Contraseña">
					</div>
					<button class="btn btn-primary" type="submit">Ingresar</button>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#frm_login_admin').on('submit', function(e){

			e.preventDefault();

			var data = $('#frm_login_admin').serialize();

      $.ajax({
        type: 'POST',
        url: 'api/validate_admin.php',
        data: data,
        beforeSend: function(){
          $('.loading').css('display', 'block');
        },
        success: function(res){
          if(res === 'ok'){
            $('.loading').fadeOut();
            $('#response').html(res);
            window.location.href = 'index.php';
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