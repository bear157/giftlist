<?php 
include '../lock.php';

if(!isset($_POST["list_title"])) 
{
    header("Location: index.php"); 
    die;
}

include '../classes/GiftList.php';
$list_class = new GiftList(); 
$list_class->setConn($conn); 

$list_title = $_POST["list_title"]; 
$list_id = $list_class->createGiftList($acctid, $list_title); 

header("Location: view.php?list_id=$list_id"); 

?>