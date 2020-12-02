<?php

include("db.php");

class DataOperation extends Database{

	//Insert data
	public function insert_record($table,$fields) {
		//"INSERT INTO table_name (, , ) VALUES ('','')";
		$sql = "";
		$sql .= "INSERT INTO ".$table;
		$sql .= " (".implode(",", array_keys($fields)).") VALUES ";
		$sql .= "('".implode("','",array_values($fields))."')";
		$query = mysqli_query($this->con,$sql);
		if($query){
			return true;
		}
	}

	//Fetch data
	public function fetch_record($table) {
		$sql = "SELECT * FROM ".$table;
		$array = array();
		$query = mysqli_query($this->con,$sql);
		while($row = mysqli_fetch_assoc($query)) {
			$array[] = $row;
		}
		return $array;
	}

	//Select data
	public function select_record($table,$where) {
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND prod_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql .= "SELECT * FROM ".$table." WHERE ".$condition;
		$query = mysqli_query($this->con,$sql);
		$row = mysqli_fetch_array($query);
		return $row;
	}

	//Update data
	public function update_record($table,$where,$fields) {
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			// id = '5' AND prod_name = 'something'
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		foreach($fields as $key => $value) {
			// UPDATE table SET prod_name = '', prod_qty = '' WHERE id = '';
			$sql .= $key . "='".$value."', ";
		}
		$sql = substr($sql, 0, -2);
		$sql = "UPDATE ".$table." SET ".$sql." WHERE ".$condition;
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
	}

	//Delete data
	public function delete_record($table,$where) {
		$sql = "";
		$condition = "";
		foreach ($where as $key => $value) {
			$condition .= $key . "='" . $value . "' AND ";
		}
		$condition = substr($condition, 0, -5);
		$sql = "DELETE FROM ".$table." WHERE ".$condition;
		if(mysqli_query($this->con,$sql)) {
			return true;
		}
	}



} //End of class ----------------


$obj = new DataOperation;


if(isset($_POST["submit"])) {    							 //clicking submit button inside Add form will redirect in this function 	   
  $filetmp = $_FILES["p_img"]["tmp_name"];
  $filename = $_FILES["p_img"]["name"];
  $filetype = $_FILES["p_img"]["type"];
  $filepath = "../../images/".$filename;
  move_uploaded_file($filetmp,$filepath);
 
	$myArray = array(
		"prod_name" => $_POST['name'],
		"prod_price" => $_POST['price'],
		"prod_img" => $filename  
		// key    =>   value
		);
	if($obj->insert_record("tb_prod",$myArray)) {        //if insert_record method inside class is true  
		header("location: ../index.php?msg=Record Inserted");			//then execute this statement
	}
}

if(isset($_POST["edit"])) {
	$id = $_POST["id"];
	$where = array("prod_id"=>$id);
	$myArray = array(
		"prod_name" => $_POST['name'],
		"prod_price" => $_POST['price'],
		"prod_img" => $_POST['img']
		);
	if($obj->update_record("tb_prod",$where,$myArray)) {
		header("location: ../index.php?msg=Record Updated Successfully");
	}
}

if(isset($_GET["delete"])) {
	$id = $_GET["id"] ?? null;
	$where = array("prod_id"=>$id);
	if($obj->delete_record("tb_prod",$where)) {
		header("location: ../index.php?msg=Record Deleted Successfully");
	}
}


?>
