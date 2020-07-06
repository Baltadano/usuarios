<?php 
class Conectar {
	protected $db;

	protected function conexion(){
		try {
			$conectar = $this->db = new PDO("mysql:local=localhost;dbname=dbproyecto", "root","");
				return $conectar;
			
		} catch (Exception $e) {
			print("Error: ". $e->getMessage(). "</br>");
			die();
		}
	}

	public function set_name(){
		return $this->db->query("SET NAMES 'utf8'");
	}

	public function ruta(){
		return "http://localhost/proyecto/";
	}
}
?>