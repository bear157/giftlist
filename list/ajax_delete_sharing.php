<?php
include '../lock.php';
$sharing_id = $_POST["sharing_id"]; 

$sql = $conn->prepare("DELETE FROM tbl_list_sharing WHERE id=:sharing_id");
$sql->execute(["sharing_id"=>$sharing_id]); 

$conn=null;
?>