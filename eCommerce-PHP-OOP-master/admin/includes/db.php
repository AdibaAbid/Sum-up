<?php

class Database{
	public $con;

	public function __construct(){
		$this->con = mysqli_connect("localhost","root","","shopping_cart");
		
	}


} //end of class

$obj = new Database;

?>