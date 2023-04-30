<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';

$username = $_POST["username"];
$password = $_POST["pwd"];
$flag = 'true';
//$query = $mysqli->query("SELECT email, password from users");

$result = $mysqli->query('SELECT s_id,Shop_Name,Shopkeeper_Password,Shopkeeper_Name,Shopkeeper_Email from shopkeepers order by s_id asc');

if($result === FALSE){
  die(mysql_error());
}

if($result){
  while($obj = $result->fetch_object()){
    if($obj->Shopkeeper_Email === $username && $obj->Shopkeeper_Password === $password) {

      $_SESSION['username'] = $username;
      $_SESSION['s_id'] = $obj->s_id;
      $_SESSION['Shopkeeper_Name'] = $obj->Shopkeeper_Name;
      $_SESSION['Shop_Name'] = $obj->Shop_Name;
      header("location:Shop_Products.php");
    } else {

        if($flag === 'true'){
          redirect();
          $flag = 'false';
        }
    }
  }
}

function redirect() {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}


?>