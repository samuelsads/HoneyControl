<?php
require_once "Constants.php";


 class Connections{
	
	public function connect(){
		$link = new PDO("mysql:host=localhost;dbname=users","","");
 		return $link;
	}
}
 