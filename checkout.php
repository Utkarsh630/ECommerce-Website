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

    <body>
    
    <?php
        include 'includes\header.php';?>
        <div class="container">
        <center><h3>PROCEED TO CHECKOUT</h3></center><br>
            <div class="row">
                <div class="col-sm-6">
                    <form action="">
                        <div class="form-group">
                            <input type="text" name="name" id="Name" class="form-control" placeholder = Name>
                        </div>
                        <div class="form-group">
                            <input type="tel" limit="10" name="phone" id="Mobile" class="form-control" placeholder = "Mobile Number">
                        </div>
                        <div class="form-group">
                        <!-- <label for="Mobile" class>Alternate Mobile Number</label> -->
                            <input type="tel" limit="10" name="phone" id="Mobile" class="form-control" placeholder = "Alternate Mobile Number">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="Email" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea rows="5"cols="67" placeholder="Address1" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea rows="5"cols="67" placeholder="Address2(Optional)" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-sm-6">

                <table class="table table-striped">

<!--show table only if there are items added in the cart-->
<?php
$sum = 0;
$user_id = $_SESSION['user_id'];
$query = "SELECT items.price AS Price, items.id, items.image, items.name AS Name FROM users_items JOIN items ON users_items.item_id = items.id WHERE users_items.user_id='$user_id' and status='Added to cart'";
$result = mysqli_query($con, $query)or die($mysqli_error($con));
if (mysqli_num_rows($result) >= 1) {
    ?>
    <thead>
        <tr>
            <th>Image</th>
            <!-- <th>Item Number</th> -->
            <th>Item Name</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    
    <tbody>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $sum+= $row["Price"];
            $id="";
            $id .= $row["id"] . ",";
            echo "<tr>
                   <td><img src=". $row["image"] ." width='50' height='40' ></td>
                     
                      <td>" . $row["Name"] . "</td>
                      <td>Rs " . $row["Price"] . "</td>
                      <td><a href='cart-remove.php?id={$row['id']}' class='remove_item_link'>Remove</a></td>
                  </tr>";
        }
        $id = rtrim($id, ",");
        echo "<tr>
                
                  <td>&nbsp;</td>
                  <td>Total</td>
                  <td>Rs " . $sum . "</td>
                  <td><a href='checkout.php?itemsid=".$id ."'class='btn btn-primary'>Confirm Order</a></td>
                  </tr>";
        ?>
    </tbody>
    <?php
} else {
    echo "<center><h2>Add items to the cart first!</h2></center>";
}
?>
<?php
?>
</table>

                </div>
            </div>
        </div>
    </body>