<?php

include("database.php");
// $obj = new dbconfig();
// $con = $obj->db_connect();

class DataOperation extends Database{


public function fetch_record($tableName) {
    // use database;
		$sql = "SELECT * FROM $tableName ";
		$array = array();
		$query = mysqli_query($this->connection, $sql);
		if(mysqli_num_rows($query) > 0)
    	{
    		while($row = mysqli_fetch_array($query))
    		{
    			$array[] = $row;
    		}
    		return $array;
    	}

	}

	} // End of class

$obj = new DataOperation;


if(isset($_POST["add_to_cart"]))
{
    if(isset($_SESSION["shopping_cart"]))
    {
        //Check if the itemid is already in array or not?
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            $count = count($_SESSION["shopping_cart"]);
            echo 'count-->'.$count;
            $item_array = array(
            'item_id'       =>   $_GET["id"],
            'item_name'     =>   $_POST{"hidden_name"},
            'item_price'    =>   $_POST{"hidden_price"},
            'item_quantity' =>   $_POST{"quantity"}
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else 
        {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Sorry!", "Already in cart", "warning");';
            echo '}, 500);</script>';
            // echo '<script>window.location="index.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'       =>   $_GET["id"],
            'item_name'     =>   $_POST{"hidden_name"},
            'item_price'    =>   $_POST{"hidden_price"},
            'item_quantity' =>   $_POST{"quantity"}
            );
        $_SESSION["shopping_cart"] [0] = $item_array;
    }
}

// Remove item from cart
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
        	if($values["item_id"] == $_GET["id"])
        	{
        		unset($_SESSION["shopping_cart"][$keys]);
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Successfully!", "Removed item from cart", "success");';
                echo '}, 500);</script>';
        		// echo '<script>window.location="index.php"</script>';
        	}
        }
    }
}



?>