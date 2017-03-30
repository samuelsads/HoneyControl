<?php 
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";


if($_SERVER['REQUEST_METHOD']==='POST') {
		$respuestas;
		$usuario=addslashes($_REQUEST['user']);
		$contra =addslashes($_REQUEST['pass']);
		$responde  = new controllers();
		$respuestac=$responde -> ingreso($usuario,$contra);
		if($respuestac){
			$respuestas=array('result'=>$respuestac,'responde'=>true);
			echo json_encode($respuestas);
		}else{
			$respuestas=array('result'=>$respuestac,'responde'=>false);
			echo json_encode($respuestas);
		}
		
	}else{
		$respuestas=array('responde'=>false);
		echo json_encode($respuestas);

	}
