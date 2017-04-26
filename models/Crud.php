<?php
 require_once "Connections.php";


class Datos extends Connections{

	public function getAllMyWarehouse(){
		$query = "SELECT * FROM  Warehouse";
		$stmt = Connections::connect()->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll();
		$stmt->close();
	}

	public function updateClient($idClient,$name,$father_surname,$mother_surname){
		$query = "UPDATE Client SET name=:name, father_surname=:father_surname,mother_surname=:mother_surname WHERE idClient=:idClient";
		$conn  = Connections::connect();
		$stmt = $conn->prepare($query);
		try{
			$conn->beginTransaction();
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);
			$stmt->bindParam(':father_surname',$father_surname,PDO::PARAM_STR);
			$stmt->bindParam(':mother_surname',$mother_surname,PDO::PARAM_STR);
			$stmt->bindParam(':idClient',$idClient,PDO::PARAM_INT);
			$result = $stmt->execute();
			var_dump($result);
			$conn->commit();
			return $result;
			$conn->close();
		}catch(PDOException $e){
			$conn->rollBack();
		}

	}

	public function insertWarehouse($amount,$date,$product_id){
		$query = "INSERT INTO Warehouse(amount,created,product_id) values(:amount,:created,:product_id)";
		$conn = Connections::connect();
		$stmt = $conn->prepare($query);
		try{
			$conn->beginTransaction();
			$stmt->bindParam(':amount',$amount,PDO::PARAM_STR);
			$stmt->bindParam(':created',$date,PDO::PARAM_STR);
			$stmt->bindParam(':product_id',$product_id,PDO::PARAM_INT);
			$result = $stmt->execute();
			$contenido= $conn->lastInsertId();
			$conn->commit();
			return $contenido;
			$conn->close();
		}catch(PDOException $e){
			$conn->rollBack();
		}

	}

	public function deleteProductById($id){
		$query = "DELETE FROM Product where idProduct=:id";
		$conn = Connections::connect();
		$stmt = $conn->prepare($query);
		try{
			$conn->beginTransaction();
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$contenido=$stmt->execute();
			$conn->commit();
			return $contenido;
			$conn->close();
		}catch(PDOException $e){
			$conn->rollBack();
		}
	}

	public function insertNewProduct($size,$price){
		$query  = "INSERT INTO Product(size,price) values(:size,:price)";
		$conn = Connections::connect();
		$stmt = $conn->prepare($query);
		try {
			$conn->beginTransaction();
			$stmt->bindParam(':size',$size,PDO::PARAM_STR);
			$stmt->bindParam(':price',$price,PDO::PARAM_STR);;
			$stmt->execute();
			$contenido= $conn->lastInsertId();
			$conn->commit();
			return $contenido;
			$conn->close();
		}catch(PDOException $e){
			$conn->rollBack();
		}
	}

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
		$query  = 'SELECT * FROM Client order by idClient desc';
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

	public function insertNewClient($name,$father_surname,$mother_surname){
		$query  = "INSERT INTO Client(name, father_surname, mother_surname) values(:name,:father_surname,:mother_surname)";
		$conn = Connections::connect();
		$stmt = $conn->prepare($query);
		try {
			$conn->beginTransaction();
			$stmt->bindParam(':name',$name,PDO::PARAM_STR);
			$stmt->bindParam(':father_surname',$father_surname,PDO::PARAM_STR);
			$stmt->bindParam(':mother_surname',$mother_surname,PDO::PARAM_STR);
			$stmt->execute();
			$contenido= $conn->lastInsertId();
			$conn->commit();
			return $contenido;
			$conn->close();
		}catch(PDOException $e){
			$conn->rollBack();
		}
	}

	public function deleteClientById($id){
		$query = "DELETE FROM Client where idClient=:id";
		$conn = Connections::connect();
		$stmt = $conn->prepare($query);
		try{
			$conn->beginTransaction();
			$stmt->bindParam(':id',$id,PDO::PARAM_INT);
			$contenido=$stmt->execute();
			$conn->commit();
			return $contenido;
			$conn->close();
		}catch(PDOException $e){
			$conn->rollBack();
		}
	}
}

