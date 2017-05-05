<?php
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
$respuesta="0";
if($_SERVER['REQUEST_METHOD']=='POST') {
	if(!empty($_REQUEST['id']) && !empty($_REQUEST['pass'])  && !empty($_REQUEST['name'])  && !empty($_REQUEST['father_surname']) ){
		$id =addslashes($_REQUEST['id']);
		$contra = addslashes($_REQUEST['pass']);
		$name = addslashes($_REQUEST['name']);
		$father_surname  = addslashes($_REQUEST['father_surname']);
		$mother_surname  = addslashes($_REQUEST['mother_surname']);
		
		if($contra == $responde ->getPass($id)){
			$respuesta =$responde->insertNewClient($name,$father_surname,$mother_surname);
				if($respuesta){
					$result_content=0;
				}else{
					$result_content=4;
				}
		}else{
			$result_content=3;
		}
		}else{
			$result_content=2;
		}
	}else{
		$result_content=1;
	}
	$content = array('id'=>$respuesta,'success'=>$result_content);
	$respuesta = json_encode($content);
	echo $respuesta;
