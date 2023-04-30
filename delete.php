<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';


$SH_name = $_POST['SH_name'];
$Sh_name = $_SESSION['Shop_Name'];

$sql = "DELETE FROM `products` WHERE product_name = ? and shop_name = ?";
  
// Prepare a statement with the SQL query
$stmt = $mysqli->prepare($sql);

// Bind the form data to the statement
$stmt->bind_param("ss", $SH_name, $Sh_name);

// Execute the statement
$stmt->execute();


header ("location:Shop_Products.php");

?>