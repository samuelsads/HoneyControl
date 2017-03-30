<?php 
require_once "../../models/Constants.php";

class controllers{

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
				$content[]= array('id'=>$key['idClient'],'name'=>$key['Name']);
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

}