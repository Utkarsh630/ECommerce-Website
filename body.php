<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Product</title>
    <link rel="shortcut icon" href="img\srtcticon.png" type="image/png">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link href="css/bootstrap.css" rel="stylesheet">
            <!-- Custom CSS -->
        <link href="css/style.css" rel="stylesheet">
            <!-- jQuery -->
        <script src="js/jquery.js"></script>
            <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
        
</head>
<body>
 <?php require('includes/header.php') ?>
 <?php require('includes/check-if-added.php') ?>
     <div class="row">
         <div class="container">
             <div class="col-md-12 text-center">
                 <div class="panel-group">
                     <div class="panel panel-default">
                         <div class="panel-heading color">
                             <h1>All Products</h1>
                         </div>
            <?php
                $sql = "SELECT *FROM items";
                $query = mysqli_query($con,$sql);
                if(mysqli_num_rows($query)>0){
                    while($row=mysqli_fetch_array($query)){

                        $pro_id=$row['id'];
                        $name =$row['name'];
                        $price = $row['price'];
                        $details = $row['details'];
                        $image = $row['image'];

                        echo"
                        <div class='col-md-4 home-feature'>
                        <div class='panel-body'>
                            <div class='thumbnail'>
                                <a href='project_description.php?id=$pro_id'><img src='$image'>
                                <div class='caption'>
                                    <h3>$name</h3>
                                    <p>Rs.$price</p>";
                                    if(!isset($_SESSION['email'])){
                                        echo "<a href='#' data-toggle='modal' data-target='#loginmodal' role='button' class='btn btn-primary btn-block'>Buy Now</a>";
                                    }
                                    else{
                                        if(check_if_added_to_cart($pro_id)){
                                            echo "<a href='cart.php' class='btn btn-success btn-block'>Go to cart</a>";
                                        }
                                        else{
                                            echo "<a href='cart-add.php?id=$pro_id' class='btn btn-primary btn-block'>Add to cart</a>";
                                        }
                                    }
                                    
                                    echo"
                                </div>
                            </div>
                        </div>
                        </div>
                        ";
                    }
                }
            ?>
                   
                </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php'; ?>
</body>
</html>