<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
 
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop Products || OSIC</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>

    <nav class="top-bar" data-topbar role="navigation">
      <ul class="title-area">
        <li class="name">
          <h1><a href="index.php">OSIC</a></h1>
        </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
      <!-- Right Nav Section -->
        <ul class="right">
          <li><a href="about.php">About</a></li>
          <li class='active'><a href="Shop_Products.php"> Shop Products</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="Shopkeeper_Account.php">Shopkeeper Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>

    <div class="row" style="margin-top:10px;">
      <div class="small-12">
        <?php
          $i=0;
          $product_id = array();
          $product_quantity = array();
          $shop_name =  $_SESSION['Shop_Name'];  

          $sql = "SELECT * FROM products INNER JOIN shopkeepers ON products.Shop_Name=shopkeepers.Shop_Name WHERE shopkeepers.Shop_Name = ?";

// Prepare a statement with the SQL query
          $stmt = $mysqli->prepare($sql);

// Bind the session variable to the statement
          $stmt->bind_param("s", $_SESSION['Shop_Name']);

// Execute the statement
          $stmt->execute();

// Get the result set
          $result = $stmt->get_result();
          if($result === FALSE){
            die(mysql_error());
          }

          if($result){

            while($obj = $result->fetch_object()) {

              echo '<div class="large-4 columns">';
              echo '<p><h3>'.$obj->product_name.'</h3></p>';
              echo '<p><strong>Shop Name</strong>: '.$obj->Shop_Name .'</p>';
              echo '<p><strong>Description</strong>: '.$obj->product_desc.'</p>';
              echo '<p><strong>Units Available</strong>: '.$obj->qty.'</p>';
              echo '<p><strong>Price (Per Unit)</strong>: '.$currency.$obj->price.'</p>';
              echo '</div>';



              $i++;
            }
            echo '<div style="text-align:center;">
            <button style="background: #333 ; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;"><a href="Shop_Add.php">Add Items</a></button>
                  </div>';
            echo '<div style="text-align:center;">
                  <button style="background: #333; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;"><a href="Shop_Delete.php">Delete Items</a></button>
                  </div>';  
            echo '<div style="text-align:center;">
                  <button style="background: #333; border: none; color: #fff; font-family: "Helvetica Neue", sans-serif; font-size: 1em; padding: 10px;"><a href="Shop_Update1.php">Update Items</a></button>
                  </div>';  

          }

          $_SESSION['product_id'] = $product_id;


          echo '</div>';
          echo '</div>';
          ?>






    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
