<?php
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass'])  && isset($_REQUEST['name'])  && isset($_REQUEST['father_surname'])  && isset($_REQUEST['mother_surname'])){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$name = addslashes($_REQUEST['name']);
		$father_surname  = addslashes($_REQUEST['father_surname']);;
		$mother_surname  = addslashes($_REQUEST['mother_surname']);;
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->insertNewClient($name,$father_surname,$mother_surname);
				if($respuesta){
					$content = array('id'=>$respuesta,'success'=>true);
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
