<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';


$Sh_name = $_SESSION['Shop_Name'];
$SH_name = $_POST['SH_name'];
$SH_email = $_POST['SH_email'];
$pwd = $_POST['pwd'];
$price = $_POST['price'];

$sql = "INSERT INTO products (Shop_Name, product_name, product_desc, qty, price) VALUES (?, ?, ?, ?, ?)";
  
// Prepare a statement with the SQL query
$stmt = $mysqli->prepare($sql);

// Bind the form data to the statement
$stmt->bind_param("sssdd", $Sh_name, $SH_name, $SH_email, $pwd, $price);

// Execute the statement
$stmt->execute();


header ("location:Shop_Products.php");

?>