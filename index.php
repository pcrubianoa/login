<? session_start();
    include("lang/es/index.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?echo NOMBRE_APP; ?> | Bienvenido</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme1.css">
</head>
<body>
    <div class="form-body" class="container-fluid">
        <div class="website-logo">
            <a href="./">
                <div class="logo">
                    <img height=""  src="images/logo_logis.png" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">

                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">

                    <div class="form-items">
                        <h3>Bienvenido!</h3>
                        
                        <br>
                        <form action="./res/validacion/" method="POST">
                            <input class="form-control" type="text" name="usuario" placeholder="Usuario" required autofocus>
                            <input class="form-control" type="password" name="clave" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" class="ibtn">Ingresar</button>
                            </div>
                        </form>
                        <?
							if (isset($_GET['error'])) {
								if ($_GET['error']=='402') { ?>
									<p>
										Nombre de usuario o clave incorrectos.<br>
									</p>
								<?}

								if ($_GET['error']=='403') { ?>
									<p>
										Acceso no autorizado.
									</p>
								<?}
							}?>
                        <div class="other-links">
                            <span>Powered by</span><a target="_BLANK" href="http://pclinea.com.co"><img height="30" src="./images/logo.png"></a>
                        </div>
                                            
                    </div>

                </div>
    
            </div>
        </div>
    </div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>