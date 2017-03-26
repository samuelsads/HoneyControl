<?php
 require_once "Connections.php";


class Datos extends Connections{

	public function ingreso($datos,$tabla){
		
		$query  = "Select * from $tabla where user=:user and pass=:pass";
		$stmt = Connections::connect()->prepare($query);
		$stmt->bindParam(':user',$datos['user'], PDO::PARAM_STR);
		$stmt->bindParam(':pass',$datos['pass'], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}
}

