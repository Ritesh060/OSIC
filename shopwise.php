<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
$image_url = "images/My project(1).jpg";
include 'config.php';

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop Wise || OSIC</title>
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
          <li><a href="products.php">Products</a></li>
          <li><a href="cart.php">View Cart</a></li>
          <li><a href="orders.php">My Orders</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li class = 'active'><a href="shopwise.php">Shop Wise</a></li>
          <li><a href="shopkeeper.php">Shopkeepers</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="account.php">My Account</a></li>';
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


   
    <div class="row" style="margin-top:30px;">

        <p><h3>Choose the shop:</h3></p>

      </div>
    </div>       
    

<?php
$result = $mysqli->query('SELECT Shop_Name FROM `shopkeepers`;');
// Create the cascading list
echo '<div class="row" style="margin-top:30px;">';
echo "<form action='process.php' method='POST'>";
echo "<select id='Shop_Name', name = 'shopname'>";
echo "<option value=''>Select Shop Name</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['Shop_Name'] . "'>" . $row['Shop_Name'] . "</option>";
}
echo "</select>";
echo '<input type="submit" id="right-label" value="Submit" style="background: #0078A0; border: none; color: #fff, sans-serif; font-size: 1em; padding: 10px;">';
echo "</form>"; 
echo '</div>';
?>