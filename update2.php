<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$address = $_POST["address"];
$city = $_POST["city"];
$pin = $_POST["pin"];


if($fname!=""){
    $sql = "UPDATE products SET product_name = ? where product_name = ?";
  
    // Prepare a statement with the SQL query
    $stmt = $mysqli->prepare($sql);
    
    // Bind the form data to the statement
    $stmt->bind_param("ss", $fname, $fname);
    
    // Execute the statement
    $stmt->execute();
}

if($lname!=""){
    $result = $mysqli->query('UPDATE products SET Shop_Name ="'. $lname .'" WHERE product_name ='.$fname);
  if($result){
  }
}

if($address!=""){
    $result = $mysqli->query('UPDATE products SET product_desc ="'. $address .'" WHERE product_name ='.$fname);
  if($result){
  }
}

if($city!=""){
    $sql = "UPDATE products SET qty = ? where product_name = ?";
  
    // Prepare a statement with the SQL query
    $stmt = $mysqli->prepare($sql);
    
    // Bind the form data to the statement
    $stmt->bind_param("ds", $city, $fname);
    
    // Execute the statement
    $stmt->execute();
}

if($pin!=""){
    $sql = "UPDATE products SET price = ? where product_name = ?";
  
    // Prepare a statement with the SQL query
    $stmt = $mysqli->prepare($sql);
    
    // Bind the form data to the statement
    $stmt->bind_param("ds", $pin, $fname);
    
    // Execute the statement
    $stmt->execute();
}




header("location:Shop_Products.php");


?>
