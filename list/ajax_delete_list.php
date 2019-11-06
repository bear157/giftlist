<?php
include '../lock.php';
$list_id = $_POST["list_id"]; 

$sql = $conn->prepare("UPDATE tbl_gift_list SET status_id=2 WHERE list_id=:list_id");
$sql->execute(["list_id"=>$list_id]); 

$conn=null;
?>