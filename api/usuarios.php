<? session_start();
function __autoload($class_name) {
    require_once "../mod/" . $class_name . '.php';
}

function row($value) {
	echo "<tr class='registro' id='".$value['id']."'>
		<td>".$value['id']."</td>
		<td>".$value['nombre']."</td>
		<td>".$value['grupo']."</td>
	</tr>";
}

$usuario = new Usuario();

if ((isset($_GET['selectAll']))&&(isset($_GET['selector']))) {
	echo "<option value='' disabled>Seleccione...</option>";
	if ($regs = $usuario->selectAll())
		foreach ($regs as $key => $value) {
			echo "<option value='".$value['id']."'>".$value['nombre']."</option>";
		}
}

elseif (isset($_GET['selectAll'])) {

	$usuario->setJoin("B.nombre AS grupo","grupos B","A.id_grupo = B.id");

	$usuario->limit($_POST['pag'].",50");
	if ($regs = $usuario->selectAll())
		foreach ($regs as $key => $value) {
			row($value);
		}
	}


elseif (isset($_GET['selectOnce'])) {
	$regs = $usuario->selectOnce($_POST['id']);
	echo json_encode($regs);
} 

elseif ((isset($_POST['id']))&&(!isset($_GET['delete']))) {

	foreach ($_POST as $campo => $value) {
		if ($campo!="id") {
			$funcion = "set".ucwords($campo);
			$usuario->$funcion($value);
		}
	  }

	if ($_POST['id']=="") {
		$usuario->insert();
		$regs = $usuario->last();
		$_POST['id']=$regs['id'];
	}
	elseif (!isset($_GET['selectOnce'])) {
		$usuario->update($_POST['id']);
	}
	$usuario->setJoin("B.nombre AS grupo","grupos B","A.id_grupo = B.id");
	$value = $usuario->selectOnce($_POST['id']);
	row($value);

} else {
	$usuario->delete($_POST['id']);
}?>