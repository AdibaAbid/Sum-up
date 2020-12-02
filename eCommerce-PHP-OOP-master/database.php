<?php

class Database{
	public $connection;

	public function __construct(){
		$this->connection = mysqli_connect("localhost","root","","shopping_cart");
		
	}


} //end of class

$obj = new Database;

?>