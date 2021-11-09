<?php
  require("includes/common.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cart | Life Style Store</title>
        <link rel="shortcut icon" href="img\srtcticon.png" type="image/png">

          <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap Core CSS -->
          <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
          <link href="./css/style.css" rel="stylesheet">
        <!-- jQuery -->
          <script src="js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
          <script src="js/bootstrap.min.js"></script>
    </head>
    <body style="padding-top: 50px;">

        <!-- Header -->
        <?php
        include 'includes/header.php';
        ?>
        <!--Header end-->
        
        <div class="container">
               <div class="row">
                <div class="col-sm-8 col-sm-offset-2" style="">
                    <table class="table table-striped">

                        <!--show table only if there are items added in the cart-->
                        <?php
                        $sum = 0;
                        $user_id = $_SESSION['user_id'];
                        
                       
                        
                        
                        $query = "SELECT items.price AS Price, items.image, items.id, users_items.quantity, items.name AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart'";
                      
                        $result = mysqli_query($con, $query)or die(mysqli_error($con));
                        if (mysqli_num_rows($result) >0 ) {
                            ?>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th >Price</th>
                                    <th >Quantity</th>
                                    <!-- <th></th> -->
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            $n =0 ;
                                while ($row = mysqli_fetch_array($result)) {
                                    $n++;
                                    $sum+= $row["Price"];
                                    $id="";
                                    $id .= $row["id"] .", ";
                                    echo "<tr>
                                    <td><img src=".$row['image']." width='50px'  height='50px'></td>
                                    <td>" . "#" . $row["id"] . "</td>
                                    <td>" . $row["Name"] . "</td>
                                    <td>Rs " . $row["Price"]*$row['quantity'] . "</td>
                                    <td><input type='number' min='1' max='10' value=".$row['quantity']." readonly></td>
                                    <td></td>
                                    <td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'> X </a></td>
                                    </tr>";
                                }
                                
                                echo "<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>Total</td>
                                <td>Rs " . $sum . "</td>
                                <td><a href='success.php?itemsid=".$id ."'class='btn btn-primary'>Confirm Order</a></td>
                                                  tr>";
                                ?>
                            </tbody>
                         
                         <?php
                        } else {
                            echo "<center><h2>Add items to the cart first!</h2></center>";
                        }
                        ?>
                           
                           
                         
                        
                    </table>
                </div>
             </div>
        </div>
<?php
        //Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}
?>
                       

        <!--Footer-->
        
            <?php include 'includes/footer.php';?>
        
        <!--Footer end-->
        
    </body>
</html>