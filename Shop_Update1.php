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
    <title>Shop Product Update || OSIC</title>
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


<div class="row" style="margin-top:30px;">

<p><h3>Choose the the product:</h3></p>

</div>
</div>       


<?php
$sql = "SELECT * FROM products INNER JOIN shopkeepers ON products.Shop_Name=shopkeepers.Shop_Name WHERE shopkeepers.Shop_Name = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_SESSION['Shop_Name']);
$stmt->execute();
 $result = $stmt->get_result();
// Create the cascading list
echo '<div class="row" style="margin-top:30px;">';
echo "<form action='Shop_Update.php' method='POST'>";
echo "<select id='product_name', name = 'p_name'>";
echo "<option value=''>Select Product Name</option>";
while ($row = mysqli_fetch_array($result)) {
echo "<option value='" . $row['product_name'] . "'>" . $row['product_name'] . "</option>";
}
echo "</select>";
echo '<input type="submit" id="right-label" value="Submit" style="background: #0078A0; border: none; color: #fff, sans-serif; font-size: 1em; padding: 10px;">';
echo "</form>"; 
echo '</div>';
?>