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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		p{
			margin-bottom: 0;
		}
		.input-score{
			max-width: 55px;
			margin: 0 auto;
			text-align: center;
			font-size: 30px;
			font-weight: bold;
		}
		.text-detail{
			font-size: 14px;
		}
	</style>
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

		<div class="row">
			<div class="col-lg-6">
				<p>&nbsp;</p>
				<h2>Fixture oficial</h2>
			</div>
			<div class="col-lg-6 text-right">
				<p>&nbsp;</p>
				<p><a href="javascript:void(0)" onclick="reloadPoints()" class="btn btn-success btn-sm"><i class="fas fa-redo-alt"></i> Actualizar puntajes</a></p>
			</div>
		</div>

		<hr>

		<div class="row">
			<div class="col-lg-4">
				
				<form id="frmFixtureA" name="frmFixtureA" method="POST">

					<div class="text-center">
						<h4>GRUPO A</h4>
					</div>
					

					<?php

					$sql_grupo_a = "SELECT f.id as id_fixture, f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='A' ORDER BY f.id ASC";
					$result_grupo_a = $conexion->query($sql_grupo_a);

					while($row = $result_grupo_a->fetch_array())
					
					{

					?>

					<input type="hidden" id="fixture_<?php echo $row['id_fixture']; ?>" name="fixture_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['id_fixture']; ?>" />

					<div class="row">
						<div class="col-lg-6 text-center">
							<div class="form-group">
								<label><?php echo $row['teamA']; ?></label>
								<input type="text" class="form-control input-score" id="goal_a_<?php echo $row['id_fixture']; ?>" name="goal_a_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['goal_a']; ?>" disabled required>
							</div>
						</div>
						<div class="col-lg-6 text-center">
							<div class="form-group">
								<label><?php echo $row['teamB']; ?></label>
								<input type="text" class="form-control input-score" id="goal_b_<?php echo $row['id_fixture']; ?>" name="goal_b_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['goal_b']; ?>" disabled required>
							</div>
						</div>
						<div class="col-lg-12 text-center text-detail">
							<p><?php echo $row['date']; ?> | <?php echo $row['stadium']; ?></p>
						</div>
					</div>

					<hr>

					<?php
					
					}

					?>

					<div class="form-group">
						<a href="javascript:void(0)" onclick="enableForm()" class="btn btn-secondary btn-block">Editar</a>
						<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>

				</form><!--/.end.form-->

			</div><!--/.end.col-lg-4-->


			<div class="col-lg-4">
				<form id="frmFixtureB" name="frmFixtureB" method="POST">

					<div class="text-center">
						<h4>GRUPO B</h4>
					</div>

					<?php

					$sql_grupo_b = "SELECT f.id as id_fixture, f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='B' ORDER BY f.id ASC";
					$result_grupo_b = $conexion->query($sql_grupo_b);

					while($row = $result_grupo_b->fetch_array())
					
					{

					?>

					<input type="hidden" id="fixture_<?php echo $row['id_fixture']; ?>" name="fixture_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['id_fixture']; ?>" />

					<div class="row">
						<div class="col-lg-6 text-center">
							<div class="form-group">
								<label><?php echo $row['teamA']; ?></label>
								<input type="text" class="form-control input-score" id="goal_a_<?php echo $row['id_fixture']; ?>" name="goal_a_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['goal_a']; ?>" disabled required>
							</div>
						</div>
						<div class="col-lg-6 text-center">
							<div class="form-group">
								<label><?php echo $row['teamB']; ?></label>
								<input type="text" class="form-control input-score" id="goal_b_<?php echo $row['id_fixture']; ?>" name="goal_b_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['goal_b']; ?>" disabled required>
							</div>
						</div>
						<div class="col-lg-12 text-center text-detail">
							<p><?php echo $row['date']; ?> | <?php echo $row['stadium']; ?></p>
						</div>
					</div>

					<hr>

					<?php
					
					}

					?>

					<div class="form-group">
						<a href="javascript:void(0)" onclick="enableForm()" class="btn btn-secondary btn-block">Editar</a>
						<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>

				</form><!--/.end.form-->
			</div><!--/.end.col-lg-4-->


			<div class="col-lg-4">
				<form id="frmFixtureC" name="frmFixtureC" method="POST">

					<div class="text-center">
						<h4>GRUPO C</h4>
					</div>

					<?php

					$sql_grupo_c = "SELECT f.id as id_fixture, f.team_a, t1.name AS teamA, f.team_b, t2.name AS teamB, f.goal_a AS goal_a, f.goal_b AS goal_b,f.stadium as stadium, f.date AS date FROM fixtures AS f JOIN teams AS t1 ON f.team_a=t1.id JOIN teams AS t2 ON f.team_b=t2.id WHERE f.group_fixture='C' ORDER BY f.id ASC";
					$result_grupo_c = $conexion->query($sql_grupo_c);

					while($row = $result_grupo_c->fetch_array())
					
					{

					?>

					<input type="hidden" id="fixture_<?php echo $row['id_fixture']; ?>" name="fixture_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['id_fixture']; ?>" />

					<div class="row">
						<div class="col-lg-6 text-center">
							<div class="form-group">
								<label><?php echo $row['teamA']; ?></label>
								<input type="text" class="form-control input-score" id="goal_a_<?php echo $row['id_fixture']; ?>" name="goal_a_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['goal_a']; ?>" disabled required>
							</div>
						</div>
						<div class="col-lg-6 text-center">
							<div class="form-group">
								<label><?php echo $row['teamB']; ?></label>
								<input type="text" class="form-control input-score" id="goal_b_<?php echo $row['id_fixture']; ?>" name="goal_b_<?php echo $row['id_fixture']; ?>" value="<?php echo $row['goal_b']; ?>" disabled required>
							</div>
						</div>
						<div class="col-lg-12 text-center text-detail">
							<p><?php echo $row['date']; ?> | <?php echo $row['stadium']; ?></p>
						</div>
					</div>

					<hr>

					<?php
					
					}

					?>

					<div class="form-group">
						<a href="javascript:void(0)" onclick="enableForm()" class="btn btn-secondary btn-block">Editar</a>
						<button type="submit" class="btn btn-primary btn-block">Actualizar</button>
					</div>

				</form><!--/.end.form-->
			</div><!--/.end.col-lg-4-->


		</div>

	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">

		function enableForm(){
			document.querySelector('input').disabled = false;
			$('input').attr('disabled', false);
		}
		
		$('#frmFixtureA').on('submit', function(e){
			
			e.preventDefault();

			let data = $(this).serialize();

			$.ajax({
				type: 'POST',
				url: 'api/fixture/update_a.php',
				data: data,
				beforeSend: function(){
					console.log('connecting...');
				},
				success: function(res){
					if(res.code === 201){
						alert(res.message);
						window.location.reload();
					}else{
						alert(res.message);
					}
					console.log(res);
				},
				error: function(xhr,status,text){
					console.log(xhre,status,text);
				}
			})

			console.log(data);

		});



		$('#frmFixtureB').on('submit', function(e){
			
			e.preventDefault();

			let data = $(this).serialize();

			$.ajax({
				type: 'POST',
				url: 'api/fixture/update_b.php',
				data: data,
				beforeSend: function(){
					console.log('connecting...');
				},
				success: function(res){
					if(res.code === 201){
						alert(res.message);
						window.location.reload();
					}else{
						alert(res.message);
					}
					console.log(res);
				},
				error: function(xhr,status,text){
					console.log(xhre,status,text);
				}
			})

			console.log(data);

		});

		$('#frmFixtureC').on('submit', function(e){
			
			e.preventDefault();

			let data = $(this).serialize();

			$.ajax({
				type: 'POST',
				url: 'api/fixture/update_c.php',
				data: data,
				beforeSend: function(){
					console.log('connecting...');
				},
				success: function(res){
					if(res.code === 201){
						alert(res.message);
						window.location.reload();
					}else{
						alert(res.message);
					}
					console.log(res);
				},
				error: function(xhr,status,text){
					console.log(xhre,status,text);
				}
			})

			console.log(data);

		});


		function reloadPoints(){
			
			console.log('reloading points...');

			$.ajax({
				type:'GET',
				url: 'api/reload_points.php',
				beforeSend: function(){
					console.log('connecting...');
				},
				success: function(res){
					alert(res.message);
					console.log(res);
				}
			});

		}

	</script>
</body>
</html>