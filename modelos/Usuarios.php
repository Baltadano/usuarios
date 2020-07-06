<?php 
//conexion a la red

require_once('../config/conexion.php');

class Usuarios extends Conectar {//heredando de la conexion

	//listar usuarios
	public function get_usuarios(){//obtien una lista de todos los usuarios de la base de datos

		$conectar = parent::conexion();
		parent::set_name();

		$sql="select * from usuarios";

		$sql=$conectar->prepare($sql);
		$sql->execute();

		return $resultado=$sql->fetchAll();//regresa la liista de todos los datos
	}

	//registrar usarios
	public function registrar_usuarios($nombre, $apellidos, $telefono, $correo, $usuario, $password1){
		//parametros que recibira, para ser registrados
		$conectar=parent::conexion();
		parent::set_name();
		$sql="insert into usuarios values(null,?,?,?,?,?,?);";
		$sql=$conectar->prepare($sql);
		$sql->bindValue(1, $_POST["nombre"]);
		$sql->bindValue(2, $_POST["apellidos"]);
		$sql->bindValue(3, $_POST["telefono"]);
		$sql->bindValue(4, $_POST["correo"]);
		$sql->bindValue(5, $_POST["usuario"]);
		$sql->bindValue(6, $_POST["password1"]);
		$sql->execute(); 
	}

	//edicion de usuarios
	public function editar_usuarios($nombre,$apellidos,$telefono,$correo,$usuario,$password1){

		$conectar = parent::conexion();
		parent::set_name();

		$sql="update usuarios set
			nombre=?,
			apellidos=?,
			telefono=?,
			correo=?,
			usuario=?,
			password=?,
			where
			id_usuario=?
			";
			$sql=$conectar->prepare($sql);
			$sql->bindValue(1, $_POST["nombre"]);
			$sql->bindValue(2, $_POST["apellidos"]);
			$sql->bindValue(3, $_POST["telefono"]);
			$sql->bindValue(4, $_POST["correo"]);
			$sql->bindValue(5, $_POST["usuario"]);
			$sql->bindValue(6, $_POST["password1"]);
			$sql->execute();
	}

	//mostras datos por el id
	public function get_usuario_id($id_usuario){

		$conectar = parent::conexion();
		parent::set_name();

		$sql="select * from usuarios where id_usuario=?";

		$sql=$conectar->prepare($sql);

		$sql->bindValue(1, $id_usuario);
		$sql->execute();

		return $resultado=$sql->fetchAll();
	}
}

?>