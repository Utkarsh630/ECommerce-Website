<?php

require("includes/common.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];
   
    
    $quantity = $_POST['quantity'];
    echo $quantity;
    echo "<br>".$item_id;
    echo "<br>".$user_id;


    if($quantity>1){
        
            $query = "INSERT INTO users_items(user_id, item_id, status,quantity) VALUES('$user_id', '$item_id', 'Added to cart','$quantity')";
            mysqli_query($con, $query) or die(mysqli_error($con));
            // header('location: products.php');
    }

    else{
    $query2 = "INSERT INTO users_items(user_id, item_id, status,quantity) VALUES('$user_id', '$item_id', 'Added to cart','$quantity')";
    mysqli_query($con, $query2) or die(mysqli_error($con));
  
    // header('location: products.php');    
    }
    // $_SESSION['quantity'] = $quantity;
}
?>