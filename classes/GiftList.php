<?php 

class GiftList 
{

private $conn = null;

public function setConn($conn) 
{
    $this->conn = $conn; 
}

public function checkUserAccess($usr_id, $list_id) 
{
    $sql = $this->conn->prepare("SELECT * FROM tbl_list_sharing list WHERE list.list_id=:list_id AND list.usr_id=:usr_id");
    $sql->execute([
        "list_id" => $list_id,
        "usr_id" => $usr_id
    ]);
    if($sql->rowCount()==0) 
    {
        header("Location: index.php");
        die;
    }

}

public function getUserGiftList($usr_id) 
{
    $sql = $this->conn->prepare("
        SELECT *, 
            (SELECT COUNT(gift_id) FROM tbl_gift gift WHERE gift.list_id=list.list_id) as count_gift 
        FROM tbl_gift_list list 
        WHERE list.created_by=:usr_id AND list.status_id=1"); 
    $sql->execute([
        "usr_id" => $usr_id
    ]);
    return $sql;
}

public function getUserSharingList($usr_id) 
{
    $sql = $this->conn->prepare("
        SELECT *, 
            (SELECT COUNT(gift_id) FROM tbl_gift gift WHERE gift.list_id=list.list_id) as count_gift 
        FROM tbl_gift_list list 
        INNER JOIN tbl_list_sharing share ON share.list_id=list.list_id
        WHERE share.usr_id=:usr_id AND list.status_id=1"); 
    $sql->execute([
        "usr_id" => $usr_id
    ]);
    return $sql;
}


public function createGiftList($usr_id, $list_title) 
{
    $sql = $this->conn->prepare("
        INSERT INTO tbl_gift_list(title, created_by, updated_by) 
        VALUES(:list_title, :usr_id, :usr_id) "); 
    $sql->execute([
        "list_title" => $list_title, 
        "usr_id" => $usr_id 
    ]);

    $list_id = $this->conn->lastInsertId(); 
    return $list_id;

}

public function checkListId($list_id) 
{
    $sql = $this->conn->prepare("SELECT * FROM tbl_gift_list list WHERE list.list_id=:list_id AND list.status_id=1"); 
    $sql->execute([
        "list_id" => $list_id 
    ]);
    if($sql->rowCount()>0)
        return true;
    else
        return false;
}

public function getSingleGiftList($list_id) 
{
    $sql = $this->conn->prepare("SELECT * FROM tbl_gift_list list WHERE list.list_id=:list_id ");
    $sql->execute([
        "list_id" => $list_id 
    ]);
    return $sql->fetch(PDO::FETCH_ASSOC); 
}

public function getGift($list_id) 
{
    $sql = $this->conn->prepare("
        SELECT gift.* FROM tbl_gift_list list 
        INNER JOIN tbl_gift gift ON gift.list_id=list.list_id 
        WHERE gift.status_id=1 AND list.status_id=1 AND list.list_id=:list_id"); 
    $sql->execute([
        "list_id" => $list_id 
    ]);
    return $sql; 
}

public function createGift($arr_info) 
{
    $sql = "INSERT INTO tbl_gift(".implode(", ", array_keys($arr_info)).") VALUES(:".implode(", :", array_keys($arr_info)).")"; 
    // echo $sql; 
    $query = $this->conn->prepare($sql); 
    $query->execute($arr_info); 
    $gift_id = $this->conn->lastInsertId(); 
    return $gift_id; 
}

public function updateGift($gift_id, $arr_info) 
{
    $sql = "UPDATE tbl_gift SET ";
    foreach ($arr_info as $key => $value) {
        $sql .= "$key = :$key,"; 
    }
    $sql = substr($sql, 0, -1);
    $sql .= " WHERE gift_id = :gift_id"; 
    // echo $sql;
    $query = $this->conn->prepare($sql); 
    $arr_info["gift_id"] = $gift_id; 
    $query->execute($arr_info); 
}


} //=== end class ===//


?>