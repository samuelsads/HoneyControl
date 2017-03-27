<?php
require_once "Constants.php";


 class Connections{
	
	public function connect(){
		$link = new PDO("mysql:host=".Constants::$host.";dbname=".Constants::$dbName."",Constants::$user,Constants::$pass);
 		return $link;
	}
}
 