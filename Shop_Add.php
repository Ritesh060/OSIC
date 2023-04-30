<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop Add || OSIC</title>
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
          <li><a href="Shop_Products.php">Shop Products</a></li>
          <?php

          if(isset($_SESSION['username'])){
            echo '<li><a href="Shopkeeper_Account.php">Shopkeeper Account</a></li>';
            echo '<li><a href="logout.php">Log Out</a></li>';
          }
          else{
            echo '<li class="active"><a href="login.php">Log In</a></li>';
            echo '<li><a href="register.php">Register</a></li>';
          }
          ?>
        </ul>
      </section>
    </nav>





    <form method="POST" action="insert2.php" enctype="multipart/form-data" style="margin-top:30px;">
      <div class="row">
        <div class="small-8">

          <!-- <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Shop Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Gada" name="Sh_name">
            </div>      
          </div> -->
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Product Name</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Jetha" name="SH_name">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Product Description</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Describe" name="SH_email">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Quantity</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Number" name="pwd">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <label for="right-label" class="right inline">Price</label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Amount" name="price">
            </div>
          </div>
          <div class="row">
            <div class="small-4 columns">

            </div>
            <div class="small-8 columns">
              <input type="submit" id="right-label" value="Add" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
              <input type="reset" id="right-label" value="Reset" style="background: #0078A0; border: none; color: #fff; font-family: 'Helvetica Neue', sans-serif; font-size: 1em; padding: 10px;">
            </button>
            </div>
          </div>
        </div>
      </div>
    </form>




    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
