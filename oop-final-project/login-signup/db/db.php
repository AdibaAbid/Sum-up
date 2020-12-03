<?php

trait database{
    public $con;
    
    public function db_connect(){
        $this->con= mysqli_connect('localhost','root','','e_commerce');
        if(mysqli_connect_error()){
            echo 'not connected';
        
        }else{
            //  echo 'True connected';
             return $this->con;
        }
    }
}
class dbconfig{
    use database;
}
$obj = new dbconfig();
$con = $obj->db_connect();


?>