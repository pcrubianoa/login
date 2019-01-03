<? session_start();
      require_once 'config.php';
      $path = $_SERVER['DOCUMENT_ROOT']."/".PATH;
      $_SESSION['path'] = $_SERVER['DOCUMENT_ROOT']."/".PATH;
      if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $dir = "https://".$_SERVER['SERVER_NAME']."/".PATH;
      } else {
            $dir = "http://".$_SERVER['SERVER_NAME']."/".PATH;      
      }
      define("MODULO",$modulo);

      //if (!isset($_SESSION['id_usuario'])) header("Location:$dir");
?>
<!DOCTYPE html>
<html lang="es">
<head>
      <title>Logis | <? echo $modulo!='' ? $modulo : "Bienvenido";?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="shortcut icon" href="<?echo $dir;?>/img/favicon.png" type="image/x-icon"/>

      <!-- Bootstrap CSS -->
      <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
      <link rel="stylesheet" href="<?echo $dir;?>/css/bootstrap/bootstrap.min.css" >
      <link rel="stylesheet" href="<?echo $dir;?>/css/bootstrap/bootstrap-switch.css" >
      <link rel="stylesheet" href="<?echo $dir;?>/css/jquery/jquery.ui.css">

      <!-- Own Style -->
      <link rel="stylesheet" type="text/css" href="<?echo $dir;?>/css/style.css">
      <link rel="stylesheet" type="text/css" href="<?echo $dir;?>/css/fonts.css">

      <link rel="stylesheet" href="<?echo $dir;?>/lib/fonts/css/all.css">
</head>