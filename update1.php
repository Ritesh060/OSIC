<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$Sh_name = $_POST["Sh_name"];
$SH_name = $_POST["SH_name"];
$SH_email = $_POST["SH_email"];
$pwd = $_POST["pwd"];


if($Sh_name!=""){
  $result = $mysqli->query('UPDATE shopkeepers SET Shop_Name ="'. $Sh_name .'" WHERE s_id ='.$_SESSION['s_id']);
  if($result){
  }
}

if($SH_name!=""){
  $result = $mysqli->query('UPDATE shopkeepers SET Shopkeeper_Name ="'. $SH_name .'" WHERE s_id ='.$_SESSION['s_id']);
  if($result){
  }
}

if($SH_email!=""){
    $result = $mysqli->query('UPDATE shopkeepers SET Shopkeeper_Email ="'. $SH_email .'" WHERE s_id ='.$_SESSION['s_id']);
    if($result){
    }
  }



//$result = $mysqli->query('Select password from shopkeepers WHERE s_id ='.$_SESSION['s_id']);

//$obj = $result->fetch_object();

if(/*$opwd === $obj->password &&*/ $pwd!=""){
  $query = $mysqli->query('UPDATE shopkeepers SET Shopkeeper_Password ="'. $pwd .'" WHERE s_id ='.$_SESSION['s_id']);
  if($query){
  }
}

//else {
//  echo 'Wrong Password. Please try again. <a href="account.php">Go Back</a>';
//}

header("location:success1.php");


?>
