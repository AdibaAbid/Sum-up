<?php
  include("includes/header.php");
?>

  <br/>
  <div class="container">
    <div class="row">
      <div class="col-md-3"> 
      </div>
      <div class="col-md-6">
        
              <?php
                if(isset($_GET["update"])) {
                  $id = $_GET["id"] ?? null;
                  $where = array("prod_id" => $id);
                  $row = $obj->select_record("tb_prod",$where);

                  ?>
            <div class="panel panel-primary">
              <div class="panel-heading">Update Product Form</div>
                <div class="panel-body">
                  <form method="post" action="includes/action.php">
                    <table class="table table-hover">
                        <tr hidden>
                          <td><input type="input" name="id" value="<?php echo $row["prod_id"]; ?>" hidden></td>
                        </tr>
                        <tr>
                          <td>Product Name</td>
                          <td><input type="input" name="name" placeholder="Enter Product Name" value="<?php echo $row["prod_name"]; ?>" required></td>
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td><input type="number" name="price" placeholder="Enter Price" value="<?php echo $row["prod_price"]; ?>" required></td>
                        </tr>
                         <tr>
                          <td>Image</td>
                          <td><input type="file" name="img" value="<?php echo $row["prod_img"]; ?>" ></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>
                        </tr>
                    </table>
                  </form>
                </div>
              </div>
            </div>
                  <?php

                } else {

                  ?>

            <div class="panel panel-primary">
              <div class="panel-heading">Add Product Form</div>
                <div class="panel-body">
                  <form method="post" action="includes/action.php" enctype="multipart/form-data">
                    <table class="table table-hover">
                        <tr>
                          <td>Product Name</td>
                          <td><input type="input" name="name" placeholder="Enter Product Name" required></td>
                        </tr>
                        <tr>
                          <td>Price</td>
                          <td><input type="number" name="price" placeholder="Enter Price" required></td>
                        </tr>
                         <tr>
                          <td>Image</td>
                          <td><input type="file" name="p_img" placeholder="Select Image" required></td>
                        </tr>
                        <tr>
                          <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Save"></td>
                        </tr>
                    </table>
                  </form>
                </div>
             </div>
           </div>

                  <?php

                }

              ?>
      <div class="col-md-3"> 
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <tr>
            <th width="10%" class="text-center">#</th>
            <th width="30%" class="text-center">Name</th>
            <th width="20%" class="text-center">Price</th>
            <th width="20%" class="text-center">Image</th>
            <th>&nbsp;</th>
          </tr>

          <?php
          $myrow = $obj->fetch_record('tb_prod');
          foreach($myrow as $row) {
            //breaking point
            ?>

          <tr class="text-center">
            <td><?php echo $row["prod_id"]; ?></td>
            <td><?php echo $row["prod_name"]; ?></td>
            <td>$ <?php echo $row["prod_price"]; ?></td>
            <td><img src="../images/<?php echo $row["prod_img"]; ?>" style="height:100px"/></td>
            <td>
              <a href="index.php?update=1&id=<?php echo $row["prod_id"] ?>" class="btn btn-info">Edit</a>
              <a href="includes/action.php?delete=1&id=<?php echo $row["prod_id"] ?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>

            <?php

          }

          ?>

        </table>
      </div>
    </div>
  </div>



<?php
  include("includes/footer.php");
?>
    