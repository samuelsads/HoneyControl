<?php
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass'])  &&isset($_REQUEST['idProduct'])){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$idProduct = addslashes($_REQUEST['idProduct']);
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->deleteProduct($idProduct);
				if($respuesta){
					$content = array('success'=>true);
					$respuesta = json_encode($content);
					echo $respuesta;
				}else{
					$content = array('success'=>false);
					$respuesta = json_encode($content);
					echo $respuesta;
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
