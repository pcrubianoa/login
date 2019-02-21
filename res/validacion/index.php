<? session_start();
	unset($_SESSION['empresa']);
	function __autoload($class_name) {
	    require_once "../../mod/" . $class_name . '.php';
	}

	$data = explode('.', $_POST['usuario']);

	$hoy = strtotime(date('Ymd'));

	$usuario = new Usuario();
	$usuario->where("A.usuario = '".$_POST['usuario']."'");
	//$usuario->where("B.fecha_caducidad <= '".$hoy."'");
	$usuario->setJoin("B.DB, B.fecha_caducidad","empresas B","B.id = A.id_empresa AND B.DB = '".$data[1]."'");
	$usuario->limit(1);

	if($usu = $usuario->selectAll()) {
		$_SESSION['id_empresa']=$usu[0]['id_empresa'];

		$venc = strtotime($usu[0]['fecha_caducidad']);
		$diff = round(($venc-$hoy) / 86400); 
		$_SESSION['limit_days'] = $diff;

		if ($diff >= 0) //echo $_SESSION['limit_days'];
			header("Location:../../../app/res/validacion/?usuario=".$data[0]."&clave=".$_POST["clave"]."&empresa=".$data[1]);
		else { //echo $_SESSION['limit_days'];
			header("Location:../../../account/res/validacion/?key=".$data[0]."&empresa=".$data[1]);
		}
	} else {
		if ($data[0]=='development') {
			header("Location:../../../app/res/validacion/?usuario=".$data[0]."&clave=".$_POST["clave"]."&empresa=".$data[1]);
		} else {
			header("Location:../../?error=402");
		}
	}

	unset($usuario);
?>