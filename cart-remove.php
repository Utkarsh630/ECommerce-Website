<?php

require("includes/common.php");
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET["id"];
    $user_id = $_SESSION['user_id'];
    // $quant = "SELECT users_items.quantity FROM users_items WHERE users_items.user_id = '$user_id'
    // and status='Added to cart'";
    // $result_quant = mysqli_query($con, $quant)or die(mysqli_error($con));
    
    // $row_quant = mysqli_num_rows($result_quant);
    // $row = mysqli_fetch_array($result_quant);
    // $sum = 0;
    // while($row_quant>0){
    //     $sum =  $sum+$row["quantity"];
    //     echo $sum;
    //     $row_quant; 
    // }
    // echo $row_quant;
    // // Delete the rows from user_items table where item_id and user_id equal to the item_id and user_id we got from the cart page and session
    // if($row_quant>=1)
    // {
    //     $quantity = $row['quantity']--;
    //     $row_quant--;
    //  $query2 = "UPDATE users_items SET users_items.quantity = '$quantity'  WHERE users_items.item_id = '$item_id'";
    //  $res = mysqli_query($con, $query2) or die(mysqli_error($con));
    // }
    
         $query = "DELETE FROM users_items WHERE item_id='$item_id' AND user_id='$user_id' ";
         $res = mysqli_query($con, $query) or die($mysqli_error($con));
       
        header("location:cart.php");
}
?>
