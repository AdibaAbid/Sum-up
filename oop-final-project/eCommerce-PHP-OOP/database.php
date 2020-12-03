<?php

class Database{
	public $connection;

	public function __construct(){
		$this->connection = mysqli_connect("localhost","root","","e_commerce");
		
	}


} //end of class

$obj = new Database;

?>