<?php
 require_once "Connections.php";


class Datos extends Connections{

	public function ingreso($datos){
		
		$query  = "Select * from users where User=:user and Pass=:pass";
		$stmt = Connections::connect()->prepare($query);
		$stmt->bindParam(':user',$datos['user'], PDO::PARAM_STR);
		$stmt->bindParam(':pass',$datos['pass'], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}
}

