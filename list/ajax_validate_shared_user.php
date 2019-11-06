<?php 
include '../lock.php'; 
$shared_user = $_POST["shared_user"]; 
$list_id = $_POST["list_id"]; 

$sql = $conn->prepare("SELECT * FROM tbl_user WHERE email=:shared_user AND status_id=1"); 
$sql->execute(["shared_user"=>$shared_user]); 


$usr_valid = 0;
if($sql->rowCount()>0) 
{
    $usr_row = $sql->fetch(PDO::FETCH_ASSOC); 
    $usr_id = $usr_row["usr_id"]; 
    if($usr_id==$acctid){
        echo 0;
        die;
    }

    $sql2 = $conn->prepare("SELECT * FROM tbl_list_sharing WHERE list_id=:list_id AND usr_id=:usr_id"); 
    $sql2->execute([
        "list_id" => $list_id, 
        "usr_id" => $usr_id 
    ]); 

    if($sql2->rowCount()==0) 
    {
        $sql3 = $conn->prepare("INSERT INTO tbl_list_sharing (list_id, usr_id) VALUES (:list_id, :usr_id)"); 
        $sql3->execute([
            "list_id" => $list_id, 
            "usr_id" => $usr_id 
        ]); 

        $sharing_id = $conn->lastInsertId(); 
        
        echo "<tr id='row_sharing$sharing_id'>";
        echo "<td>".$usr_row["full_name"]." <br><small>Email: ".$usr_row["email"]."</small></td>";
        echo "<td><button class='btn btn-danger' type='button' onclick='removeSharing(\"$sharing_id\")'><i class='fas fa-times'></i></button></td>";
        echo "</tr>";
        die;
    }
    else
    {
        echo 0;
        die;
    }
   

}
else
    echo $usr_valid; 

?>