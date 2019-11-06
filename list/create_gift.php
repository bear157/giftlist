<?php 
include '../lock.php';

if(!isset($_POST["gift_id"])) 
{
    header("Location: index.php"); 
    die;
}

//===== list class =====//
include '../classes/GiftList.php';
$list_class = new GiftList(); 
$list_class->setConn($conn); 

$list_id = $_POST["list_id"]; 

$arr_info = array(); 
$arr_info["list_id"]        = $list_id;
$arr_info["gift_name"]      = $_POST["gift_name"]; 
$arr_info["quantity"]       = $_POST["quantity"]; 
$arr_info["price"]          = $_POST["price"]; 
$arr_info["ranking"]        = $_POST["ranking"]; 
$arr_info["where_to_buy"]   = ($_POST["where_to_buy"] == "") ? null : $_POST["where_to_buy"]; 
$arr_info["detail"]         = ($_POST["detail"] == "") ? null : $_POST["detail"]; 
$arr_info["website_link"]   = ($_POST["website_link"] == "") ? null : $_POST["website_link"]; 
$arr_info["created_by"]     = $acctid; 
$arr_info["updated_by"]     = $acctid; 


      
try
{
    $conn->beginTransaction(); 

    // create gift
    $gift_id = $list_class->createGift($arr_info);

    if(!empty($_FILES["image"]["name"])) 
    {
        $gift_image = $_FILES["image"]["name"]; 
        $file_basename = substr($gift_image, 0,strripos($gift_image, '.'));
        $file_ext = substr($gift_image, strripos($gift_image, '.'));
        //rename file
        $newfilename="gift-".$gift_id.$file_ext;
        //upload location
        $location="images/".$newfilename;

        // update image location
        $image_info["gift_image"] = $location; 
        $list_class->updateGift($gift_id, $image_info);


        move_uploaded_file($_FILES["image"]['tmp_name'], "../$location"); 

    }
    


    $conn->commit(); 
    header("Location: view.php?list_id=$list_id");
}
catch(PDOException $ex)
{
    $conn->rollBack();
    echo $ex->getMessage();
}


// echo "<pre>".print_r($_POST,true).print_r($_FILES,true)."</pre>";




$conn=null; 
?>