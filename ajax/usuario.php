<?php 
require_once('../config/conexion.php');
require_once('../modelos/Usuarios.php');

$usuarios = new Usuarios();
$id_usuario = isset($_POST["id_usuario"]);
$nombre = isset($_POST["nombre"]);
$apellidos = isset($_POST["apellidos"]);
$telefono = isset($_POST["telefono"]);
$correo = isset($_POST["correo"]);
$usuario = isset($_POST["usuario"]);
$password1 = isset($_POST["password1"]);
$password2 = isset($_POST["password2"]);

switch ($_GET["op"]) {
	case "guardaryeditar":
		if($password1 == $password2){
			if(empty($_POST["id_usuario"])){
					$usuarios->registrar_usuarios($nombre, $apellidos, $telefono, $correo, $usuario, $password1, $password2);
					$messages[]="El usuario se registro con exito";	
			}
			else{
					$usuarios->editar_usuarios($nombre, $apellidos, $telefono, $correo, $usuario, $password1, $password2);
					$messages[]="El usuario se edito con exito";
			}	
		}
		else {
			$errors[]="El password no coincide";
		}

		if (isset($messages)) {
			?>

<!-- codigo html-->
<div class="alert alert-success" role="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>¡Bien hecho!</strong>
	<?php
	foreach ($messages as $message) {
		echo "$message";
	}
	?>
</div>

			<?php	
		}
		if(isset($errors)){
			?>
<!-- codigo html-->
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<strong>¡Error!</strong>
	<?php
	foreach ($errors as $error) {
		echo "$error";
	}
	?>
</div>
			<?php
		}
		break;
	/*
	case "mostrar":
		$datos = $usuarios->get_usuario_id($_POST["id_usuario"]);
		if (is_array($datos)==true and count($datos)>0){
			foreach ($datos as $row) {
				$output["nombre"]=$row["nombre"];
				$output["apellidos"]=$row["apellidos"];
				$output["telefono"]=$row["telefono"];
				$output["correo"]=$row["correo"];
				$output["usuario"]=$row["usuario"];
				$output["password"]=$row["password"];
			}
			echo json_encode($output);
		}
		else{
			$errors[]="El usuario no existe";
			}
				?>
<!-- codigo html-->
<div class="alert alert-danger" role="alert">
	<button type="button" class="close" data-dimiss="alert">&times;</button>
	<strong>¡WOLOLO!</strong>
	<?php
	foreach ($errors as $error) {
		echo "$error";
	}
	?>
</div>
			<?php	
		break;
	*/
		case "listar":
			$datos = $usuarios->get_usuarios();
			$data = array();
			foreach ($datos as $row) {
				$sub_array=array();//se anexa esta linea
				$sub_array[]=$row["nombre"];
				$sub_array[]=$row["apellidos"];
				$sub_array[]=$row["telefono"];
				$sub_array[]=$row["correo"];
				$sub_array[]=$row["usuario"];
				$sub_array[]=$row["password"];

				$sub_array[]='<button type="button" onClick="mostrar('.$row["id_usuario"].');" id="'.$row["id_usuario"].'" class="btn btn-warning btn-md update"><i class="glyphicon glyphicon-edit"></i>Editar</button>';

				$sub_array[]='<button type="button" onClick="eliminar('.$row["id_usuario"].');" id="'.$row["id_usuario"].'" class="btn btn-danger btn-md"><i class="glyphicon glyphicon-edit"></i>Eliminar</button>';

				$data[]=$sub_array;

				 }
				 $results = array(
				 	"sEcho"=>1,//informacion para el datables
				 	"iTotalRecords"=>count($data),//total de registros
				 	"iTotalDisplayRecords"=>count($data),//registros a vizualizar
					"aaData"=>$data);
			
				echo json_encode($results);
				break;
			}

?>