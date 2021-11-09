<?php require('includes\common.php') ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Cart | Life Style Store</title>
        <link rel="shortcut icon" href="img\srtcticon.png" type="image/png">

          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link href="css/bootstrap.css" rel="stylesheet">
        <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity= "sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"> 
</script>
        <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Font Awesonme css -->

    <link href= "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" /> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

      <?php include 'includes\header.php';  
        include 'includes/check-if-added.php';
        include 'includes/modal.php';
      ?>
  
      <div class="container-fluid">

<div class="row">
      
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $item_id = $_GET["id"];
            if(isset($_SESSION['user_id']))
            $user_id = $_SESSION['user_id'];
            // echo "".$item_id;
            $query = "SELECT *  FROM items WHERE items.id = '$item_id'";
            $result = mysqli_query($con, $query)or die(mysqli_error($con));
            
           while( $row = mysqli_fetch_array($result)){
            
            // echo "<p> ". $row["details"] ." </p>";
            // echo "<p> ". $row["price"] ." </p>";
            // echo "<p> ". $row["name"] ." </p>";
            // echo "<img src =".$row["image"]." width='50' height='50'>";
            echo '
            <div class="col-sm-4">
    
             <div class="panel-group">
             <div class = "panel panel-default">
             <div class = "panel-body">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
      </ol>
    
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
          <img src='.$row["image1"].' width="400" height="400"  alt="Iphone X" >
        </div>
    
        <div class="item">
          <img src='.$row["image2"].' width="400" height="400"  alt="Iphone X">
        </div>
    
        <div class="item">
          <img src='.$row["image3"].' width="400" height="400" alt="New York">
        </div>
        <div class="item">
          <img src=' .$row["image4"]. ' width="400" height="400" alt="New York" >
        </div>
        <div class="item">
          <img src='.$row["image5"].' width="400" height="400" alt="New York" >
        </div>
      </div>
    
      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    </div>
    </div>
            </div>
            
            
        <div class="col-sm-5">
        <center><div class="product-name">
          <h1> '.$row["name"].' - '.$row["color"].' </h1>
          <h3>  </h3>
        </div></center>

        <a href= "#">Visit the Apple Store</a><br>  
        <hr>
        <span style="color:red; font-size:30px;"> &#x20B9;  '.$row["price"].'  </span>
        <span  style="color:gray; font-size:25px;"><strike>&#x20B9; 90890 </strike></span>

        <h5  style="color:orange; text-transform:uppercase;">In stock.</h5>
        Deal Price.:<span style="color:red; font-size:18px;">&nbsp;&nbsp;&nbsp; &#x20B9;  '.$row["price"].'  </span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span>Original Price.:<strike style="color:gray; font-size:18px;">&#x20B9;  90890 </strike> </span>
          <span style="color:gray; letter-spacing:1px; font-size:14px;">&nbsp;(inclusive of all taxes)</span>
          <hr>
          <span style="color:grey; font-size:13px;letter-spacing:1px;"><a href="#" style="color:gray" class="fa fa-heart-o"></a>&nbsp;Add to wishlist<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <span style="color:grey; font-size:13px;letter-spacing:1px;"><a href="#" style="color:gray" class="fa fa-exchange"></a>&nbsp;Add to compare<span><br><br>
          <span style="font-size:13px; letter-spacing:2px;">&nbsp;Category:&nbsp;Electronics&nbsp;Gadgets &nbsp;Smartphones</span>
          </div>
          <div class= "col-sm-3">
            <center>
              <span style="color:gray; letter-spacing:1px">SHARE:&nbsp;</span>
              <span>
                <a href="#" class = "fa fa-facebook-official" style="color:blue;font-size:18px;"></a>&nbsp;
                <a href="#" class = "fa fa-instagram" style="color:red;font-size:18px;"></a>&nbsp;
                <a href="#" class = "fa fa-envelope" style="color:gray;font-size:18px;"></a>&nbsp;
                <a href="#" class = "fa fa-google-plus" style="color:red; font-size:18px;"></a>&nbsp;
              </span>
            </center><br>
            <div class="panel-group">
                <div class = "panel panel-default">
                  <div class="panel-heading color">
                    Buy Now
                  </div>
                  <div class="panel-body">
                  ';?>
                    
                    <?php if (!isset($_SESSION['email'])) { ?>
                    <br>
                      <p><a href= "#" data-toggle="modal" data-target="#loginmodal" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                          <?php
                      }
                       else {
                      //We have created a function to check whether this particular product is added to cart or not.
                      if (check_if_added_to_cart($row["id"])) { //This is same as if(check_if_added_to_cart != 0)
                          echo '<br><a href="cart.php" class="btn btn-block btn-success" >Go to cart</a>
                          <br>
                          <p><a href= "#" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                          ';

                     } else {
                      ?>
                      <br>
                      <a href="cart-add.php?id=<?php echo $row['id']?>" name="add" value="Add to cart" class="btn btn-block btn-warning">Add to cart</a><br>
                      <p><a href= "#" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                      <br>
                      <?php
                          }
                      }
                  ?>
                   
         <?php echo' </div>
          <div class="panel-footer">
                      <span> <i class="fa fa-map-marker"></i> Select Delievery location
          </div>
                </div>
            </div>
          </div>
          ';
          

           }
        }
      
      
      ?>

        </div>

      </div>
      <hr>
<div class="container">
      <div class="row">
        <div class="col-md-12">
       
       <section class="tabs">
        <nav class="tab-menu">
        <div class="ui horizontal divider">
      <ul>
      <div class="ui horizontal divider">
        <li class="tab-link active-menu" data-tab ="slide-1">Details</li>
      </div>
      <div class="ui horizontal divider">
        <li class="tab-link" data-tab="slide-2">Description</li>
      </div>
      <div class="ui horizontal divider">
        <li class="tab-link" data-tab="slide-3">Review</li>
      </div>
        </ul>
        </div>
        <section class="tab-content">
           <div class="slides active-tab" id="slide-1">
             Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid esse repellendus, beatae exercitationem fugiat, temporibus excepturi, quaerat similique culpa et magni nihil soluta? Ad expedita voluptatem voluptas impedit! Officia repellendus quam placeat ab, neque saepe ut molestias maiores deleniti magni? 
           </div>
           <div class="slides" id="slide-2">
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Rerum provident blanditiis voluptas repudiandae, officia assumenda fugit incidunt inventore ipsa distinctio qui dolore a dolorem, quae totam veniam libero voluptatibus mollitia, ipsam adipisci quia maiores? Facilis nobis, necessitatibus modi dolorem exercitationem rem voluptas delectus ex, accusamus ipsa impedit distinctio dolore, beatae aut. Labore fuga itaque molestiae 
        </div>
        <div class="slides" id="slide-3"><h4 class="ui horizontal divider header ">
        voluptatibus aliquid ratione quas nesciunt sunt! Distinctio cum repudiandae voluptatum, quam consectetur facilis enim unde nesciunt atque. Porro nobis explicabo deserunt quos voluptas. Autem excepturi explicabo nam similique consectetur veritatis ipsa fuga praesentium exercitationem architecto, harum doloremque accusantium natus placeat omnis minus quibusdam nihil, quas error a animi iusto. Ea aut repudiandae qui nisi asperiores eveniet quas voluptatem maxime officiis esse quod, dignissimos nesciunt velit!</h4>
        </div>
        </section>   
    </nav>
    </section>
        </div>
      </div>
      </div>

      <div class="container">
      <div class="row">
        <center><h2>RELATED PRODUCTS</h2></center><br>
          <div class="col-sm-3">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="thumbnail">
                    <img src="./img/iphonex.png" alt="">
                    <div class="caption">
                    <h3>iPhone X</h3>
                                       
                                        <p>Price: Rs. 36000.00 </p>
                                        <?php if (!isset($_SESSION['email'])) { ?>
                                            <p><a href= "#" data-toggle="modal" data-target="#loginmodal" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                                <?php
                                            }
                                             else {
                                            //We have created a function to check whether this particular product is added to cart or not.
                                            if (check_if_added_to_cart(4)) { //This is same as if(check_if_added_to_cart != 0)
                                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                           } else {
                                            ?>
                                            <a href="cart-add.php?id=4" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                            <?php
                                                }
                                            }
                                        ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="thumbnail">
                <img src="./img/iphonex.png" alt="">
                <div class="caption"><h3>iPhone X</h3>
                                        <p>Price: Rs. 36000.00 </p>
                                                <?php if (!isset($_SESSION['email'])) { ?>
                                            <p><a href= "#" data-toggle="modal" data-target="#loginmodal" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                                <?php
                                            }
                                             else {
                                            //We have created a function to check whether this particular product is added to cart or not.
                                            if (check_if_added_to_cart(4)) { //This is same as if(check_if_added_to_cart != 0)
                                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                           } else {
                                            ?>
                                            <a href="cart-add.php?id=4" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                            <?php
                                                }
                                            }
                                        ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="thumbnail">
                <img src="./img/iphonex.png" alt="">
                <div class="caption">
                <h3>iPhone X</h3>
                                        <p>Price: Rs. 36000.00 </p>
                                                <?php if (!isset($_SESSION['email'])) { ?>
                                            <p><a href= "#" data-toggle="modal" data-target="#loginmodal" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                                <?php
                                            }
                                             else {
                                            //We have created a function to check whether this particular product is added to cart or not.
                                            if (check_if_added_to_cart(4)) { //This is same as if(check_if_added_to_cart != 0)
                                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                           } else {
                                            ?>
                                            <a href="cart-add.php?id=4" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                            <?php
                                                }
                                            }
                                        ?></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="panel-group">
              <div class="panel panel-default">
                <div class="thumbnail">
                <img src="./img/iphonex.png" alt="">

                <div class="caption"><h3>iPhone X</h3>
                                        <p>Price: Rs. 36000.00 </p>
                                                <?php if (!isset($_SESSION['email'])) { ?>
                                            <p><a href= "#" data-toggle="modal" data-target="#loginmodal" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                                <?php
                                            }
                                             else {
                                            //We have created a function to check whether this particular product is added to cart or not.
                                            if (check_if_added_to_cart(4)) { //This is same as if(check_if_added_to_cart != 0)
                                                echo '<a href="#" class="btn btn-block btn-success" disabled>Added to cart</a>';
                                           } else {
                                            ?>
                                            <a href="cart-add.php?id=4" name="add" value="add" class="btn btn-block btn-primary">Add to cart</a>
                                            <?php
                                                }
                                            }
                                        ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
   <div class="conatiner">
          <div class="row">
             <div class="col-sm-12">
            <center> <h3>Sign up for offer updates</h3>
                <form action="">
                <div class="form-group">
                  <input class="form-control" type="email">
                </div>
                </form>
                  </center>
             </div>
          </div>
   </div>

<?php include 'includes/footer.php' ?>
    </body>
<script src="./js/index.js"></script>

  <script src= "https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"> </script> 
  <script> 
      </html>
