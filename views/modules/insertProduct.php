<?php
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass']) && isset($_REQUEST['size'])  && isset($_REQUEST['price'])){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$size = addslashes($_REQUEST['size']);
		$price  = addslashes($_REQUEST['price']);
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->insertNewProduct($size,$price);
				if($respuesta){
					$content = array('id'=>$respuesta,'success'=>true);
					$respuesta = json_encode($content);
					echo $respuesta;
				}else{
					$content = array('id'=>null,'success'=>false);
					$respuesta = json_encode($content);
					echo $respuesta;
				}
		}else{
			$content = array('success0'=>false);
			$respuesta = json_encode($content);
			echo $respuesta;
		}
		}else{
			$content = array('success1'=>false);
			$respuesta = json_encode($content);
			echo $respuesta;
		}
	}else{
		$content = array('success2'=>false);
		$respuesta = json_encode($content);
		echo $respuesta;
	}
