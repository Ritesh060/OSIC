<?php

include 'config.php';

$Sh_name = $_POST['Sh_name'];
$SH_name = $_POST['SH_name'];
$SH_email = $_POST['SH_email'];
$pwd = $_POST['pwd'];

if($mysqli->query("INSERT INTO `shopkeepers`(Shop_Name, Shopkeeper_Name, Shopkeeper_Email, Shopkeeper_Password) VALUES('$Sh_name', '$SH_name', '$SH_email', '$pwd');"))
{
    echo 'Data Inserted';
}

header ("location:Shopkeeper_Login.php");

?>