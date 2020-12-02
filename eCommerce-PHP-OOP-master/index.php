<?php
include("inc/header.php");
?>

<div class="container">
<div class="row">
    <div class="col-md-8">

    <!-- <div class="container" style="width:1000px;"> -->
    	<h3 align="center">Shopping Cart</h3>

        	<?php
            	$myrow = $obj->fetch_record();
                  foreach($myrow as $row) {
        	?>

    	<div class="col-md-4">
    		<form method="post" action="index.php?action=add&id=<?php echo $row["prod_id"]; ?>">
    			<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:25px; text-align:center" >
    				<img src="images/<?php echo $row["prod_img"]; ?>" style="height:100px"/> <br/>
                    <h4 class="text-info"><?php echo $row["prod_name"]; ?></h4>
                    <h4 class="text-danger"><?php echo $row["prod_price"]; ?></h4>
                    <input type="text" name="quantity" class="form-control" value="1" />
                    <input type="hidden" name="hidden_name" value="<?php echo $row["prod_name"]; ?>" />
                    <input type="hidden" name="hidden_price" value="<?php echo $row["prod_price"]; ?>" />
                    <input type="submit" name="add_to_cart" style="margin-top:5px" class="btn btn-success" value="Add to Cart" />
    			</div>
    		</form>
            <br/>
    	</div>

    	<?php

    		}
    	
    	?>

    </div>
     <div class="col-md-4">

        <div style="clear:both"></div>
        <br/>
        <h3>Order Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="40%">Item Name</th>
                    <th width="10%">Quantity</th>
                    <th width="20%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>

                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $total = 0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td><?php echo number_format($values["item_price"], 2); ?></td>
                    <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                </tr>
                <?php

                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                    }
                ?>

                <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total, 2); ?></td>
                    <td></td>

                </tr>

                <?php 
                }

                ?>

            </table>
    </div>
</div>
</div>


<?php
include("inc/footer.php");
?>

