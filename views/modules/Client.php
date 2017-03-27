<?php 
require_once "../../models/Crud.php";
require_once "../../controllers/controllers.php";
$responde  = new controllers();
$respuestac=$responde -> getPass();
echo $respuestac;
