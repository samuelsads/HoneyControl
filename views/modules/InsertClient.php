<?php
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass'])  &&isset($_REQUEST['name'])){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$name = addslashes($_REQUEST['name']);
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->insertNewClient($name);
				if($respuesta){
					$respuesta = json_encode('success');
					echo $respuesta;
				}else{
					$respuesta = json_encode('error');
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
