<?php 
require_once "../../models/Constants.php";
require_once "logic.php";

class controllers{
	
	public function getAllMyWarehouse(){
		$result = Datos::getAllMyWarehouse();
		$content  = array();
		if($result){
			foreach ($result as $key) {
				$content[]= array('id'=>$key['idAlmacen'],'amount'=>$key['amount'],'created'=>$key['created'],'product_id' =>$key['product_id']);
			}
			return $content;
		}else{
			return false;
		}
	}

	public function getUpdateClient($idClient,$name,$father_surname,$mother_surname){
		$result = Datos::updateClient($idClient,$name,$father_surname,$mother_surname);
		if($result){
			return true;
		}else{
			return false;
		}
	}	

	public function insertNewWarehouse($amount,$product_id){
		$logic  = new logic();
		$date = $logic->getDate();
		$respuesta = Datos::insertWarehouse($amount,$date,$product_id);
		if($respuesta){
			return $respuesta;
		}else{
			return false;
		}
	}

	public function deleteProduct($id){
		$respuesta  = Datos::deleteProductById($id);
		if($respuesta){
			return true;
		}else{
			return false;
		}
	}

	public function insertNewProduct($size,$price){
		$respuesta = Datos::insertNewProduct($size,$price);
		if($respuesta){
			return $respuesta;
		}else{
			return false;
		}
	}


	public function ingreso($user, $pass){
				if(preg_match('/^[a-zA-Z0-9]+$/', $user) && preg_match('/^[a-zA-Z0-9]+$/', $pass)){
						$content=array();
						$encript = crypt($pass,Constants::$key);
						$arr   = array('user'=>$user,'pass'=>$encript);
						$respuesta = Datos::ingreso($arr);
						if($respuesta['User']==$user && $respuesta['Pass']===$encript){
							 $content[]= array('id'=>$respuesta['idUsers'],'pass'=>$respuesta['Pass']);
							 return $content;
						}else{
							return "error";
						}
					}
				}

	public function getPass($id){
		$respuesta = Datos::findPassById($id);
		if($respuesta){
			return $respuesta['Pass'];
		}else{
			return false;
		}
	}	

	public function getAllMyClient(){
		$respuesta = Datos::findAllMyClients();
		$content =  array();
		if($respuesta){
			foreach ($respuesta as $key) {
				$content[]= array('id'=>$key['idClient'],'name'=>$key['Name'],'father_surname'=>$key['father_surname'],'mother_surname'=>$key['mother_surname']);
			}
			return $content;
		}else{
			return false;
		}
	}


	public function getAllMyProduct(){
		$respuesta  = Datos::findAllMyProducts();
		$content = array();
		if($respuesta){
			foreach ($respuesta as $key) {
				$content[] = array('id'=>$key['idProduct'],'size'=>$key['Size'],'price'=>$key['Price']);
			}
			return $content;
		}else{
			return false;
		}
	}

	public function insertNewClient($name,$father_surname,$mother_surname){
		$respuesta = Datos::insertNewClient($name,$father_surname,$mother_surname);
		if($respuesta){
			return $respuesta;
		}else{
			return false;
		}
	}

	public function deleteClient($id){
		$respuesta  = Datos::deleteClientById($id);
		if($respuesta){
			return true;
		}else{
			return false;
		}

	}

}