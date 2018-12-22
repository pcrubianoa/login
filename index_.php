<? session_start();
include("lang/es/index.php");
require_once "inc/header.php";
?>

<body>
	<div class="container-fluid text-center mt-5">
		<h1>
			<?echo NOMBRE_APP; ?>
		</h1>
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<!-- Inicio CardView -->
				<div class="card text-center">
					<div class="card-header">
						<strong><?echo BIENVENIDO.NOMBRE_APP; ?></strong>
					</div>
					<div class="card-body">
						<form name="session_start" action="./res/validacion/" method="POST" class="row">
							<div class="form-group text-left col-md-6">
								<label for="usuario"><?echo LABEL_USUARIO; ?></label>
								<input type="text" class="form-control" id="usuario" name="usuario" placeholder="<?echo LABEL_USUARIO; ?>" required autofocus>
							</div>
							<div class="form-group text-left col-md-6">
								<label for="clave"><?echo LABEL_CLAVE; ?></label>
								<input type="password" class="form-control" id="clave" name="clave" placeholder="<?echo LABEL_CLAVE; ?>" required>
							</div>
							<div class="col-md-12">
								<input type="submit" class="btn btn-outline-primary text-center" value="<? echo BOTON_INICIAR; ?>">
							</div>

						</form>
						<!-- Fin Tab Configuración -->

					</div>
				<!-- Fin CardView -->
				</div>
			</div>
		</div>

		<?

		if (isset($_GET['error'])) {
			if ($_GET['error']=='402') { ?>
				<div class="col-md-6 offset-md-3 alert alert-danger mt-5">
					Nombre de usuario o clave incorrectos!!! :(<br>
					Verifique los datos e intente de nuevo.<br>
				</div>
			<?}

			if ($_GET['error']=='403') { ?>
				<div class="col-md-6 offset-md-3 alert alert-danger mt-5">
					Acceso no autorizado!!!<br>
					Ingreso las credenciales de inicio de sesión.<br>
				</div>
			<?}
		}


		$datetime1 = new DateTime('2018-05-31');
		$datetime2 = new DateTime(date('Y-m-d'));
		$interval = $datetime1->diff($datetime2);

		/*
		if ((isset($_GET['time']))||($interval->format('%a')>15)) { ?>
		<div class="col-md-6 offset-md-3 alert alert-danger mt-5">
			El periodo de prueba ha finalizado!!! :(<br>
			Comuniquese ahora con un asesor comercial.<br>
			Tel. (1)8900900 - 300 200 2914
		</div>
		<?}


		if (($interval->format('%a')>10)&&($interval->format('%a')<16)) {
			$dias = 16-$interval->format('%a');
			?>
			<div class="col-md-6 offset-md-3 alert alert-info mt-5">
				Restan <?echo $dias;?> para finalizar el periodo de prueba<br>
				Comuniquese ahora con un asesor comercial.<br>
				Tel. (1)8900900 - 300 200 2914
			</div>
		<?}*/?>

	</div>

<? //include("inc/toast.php");?>

</body>
</html>

<!--
<script type="text/javascript" src="js/init.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		toastConfirm();
	});
</script>
-->
