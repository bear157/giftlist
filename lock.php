<?php 
session_start(); 
include 'include/config.php';


if(!isset($need_login) && !isset($_SESSION["usr_id"])) 
{
    $_SESSION["login_error"] = 2;
    header("Location: /giftlist/index.php"); 
} 

$acctid = isset($_SESSION["usr_id"]) ? $_SESSION["usr_id"] : 0; 


?>