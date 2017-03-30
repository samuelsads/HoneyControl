<?php
 require_once "Connections.php";


class Datos extends Connections{

	public function ingreso($datos){
		
		$query  = "Select * from Users where User=:user and Pass=:pass";
		$stmt = Connections::connect()->prepare($query);
		$stmt->bindParam(':user',$datos['user'], PDO::PARAM_STR);
		$stmt->bindParam(':pass',$datos['pass'], PDO::PARAM_STR);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();

	}

	public function findPassById($id){
		$query  = "SELECT * from Users where idUsers=:id";
		$stmt = Connections::connect()->prepare($query);
		$stmt->bindParam(':id',$id,PDO::PARAM_INT);
		$stmt->execute();
		return $stmt->fetch();
		$stmt->close();
	}

	public function findAllMyClients(){
		$query  = "SELECT * FROM Client";
		$stmt = Connections::connect()->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public function findAllMyProducts(){
		$query  ="SELECT * FROM Product";
		$stmt  = Connections::connect()->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}
}

