<?php 
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "giftlist";
try
{
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name",$db_username, $db_password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "DB connection error";
}   
?>