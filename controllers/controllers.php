<?php 


class controllers{

	public function ingreso($user, $pass){
				if(preg_match('/^[a-zA-Z0-9]+$/', $user) && preg_match('/^[a-zA-Z0-9]+$/', $pass)){
						 $encript = crypt($pass,'ads32ASDASDasddas$$4asdasd$xxvfghfdfgdf');
						$arr   = array('user'=>$user,'pass'=>$encript);
						$respuesta = Datos::ingreso($arr,"misusuarios");
						if($respuesta['user']==$user && $respuesta['pass']==$encript){
							return "success";
						}else{
							return "error";
						}
					}
				}	

}