<?php 
require_once "../../models/Constants.php";

class controllers{

	public function ingreso($user, $pass){
				if(preg_match('/^[a-zA-Z0-9]+$/', $user) && preg_match('/^[a-zA-Z0-9]+$/', $pass)){
						$encript = crypt($pass,Constants::$key);
						$arr   = array('user'=>$user,'pass'=>$encript);
						$respuesta = Datos::ingreso($arr);
						if($respuesta['User']==$user && $respuesta['Pass']==$encript){
							return "success";
						}else{
							return "error";
						}
					}
				}
/*
	public function getPass(){
		$encript = crypt('samuelsads',Constants::$key);
		return $encript;
	}	
*/
}