<?php 
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();

if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass'])){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->getAllMyWarehouse();
				if($respuesta){
					$respuesta = json_encode(array('respuesta'=>$respuesta,'success'=>true));
					echo $respuesta;
				}else{
					echo 'error';
				}
		}else{
			echo "incorrecto";
		}
		}else{
			echo "error 1";
		}
	}else{
		echo "error";
	}
	




