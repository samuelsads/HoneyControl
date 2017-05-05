<?php 
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();

if($_SERVER['REQUEST_METHOD']=='POST') {
	if(isset($_REQUEST['id']) && isset($_REQUEST['pass']) && isset($_REQUEST['name']) && isset($_REQUEST['father']) && isset($_REQUEST['mother']) && isset($_REQUEST['idClient']) ){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$name = addslashes($_REQUEST['name']);
		$father_surname = addslashes($_REQUEST['father']);
		$mother_surname = addslashes($_REQUEST['mother']);
		$idClient  = addslashes($_REQUEST['idClient']);
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->getUpdateClient($idClient,$name,$father_surname,$mother_surname);
				if($respuesta){
					$respuesta = json_encode(array('respuesta'=>$respuesta));
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