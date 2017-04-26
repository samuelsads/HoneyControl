<?php
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass']) && isset($_REQUEST['amount']) && isset($_REQUEST['product_id'])){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$amount  = addslashes($_REQUEST['amount']);
		$product_id = addslashes($_REQUEST['product_id']);
		if($contra == $responde ->getPass($id)){
			$respuestaAmount = $responde->insertNewWarehouse($amount,$product_id);
			$content = array('id'=>$respuestaAmount,'success'=>true);
			$respuesta = json_encode($content);
			echo $respuesta;

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
