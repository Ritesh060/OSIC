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
    <title>Shop Delete || OSIC</title>
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


    <form method="POST" action="delete.php" style="margin-top:30px;">
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
              <label for="right-label" class="right inline">Name of the product you want to delete: </label>
            </div>
            <div class="small-8 columns">
              <input type="text" id="right-label" placeholder="Nope" name="SH_name">
            </div>
          </div>