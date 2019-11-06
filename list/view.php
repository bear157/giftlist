<?php 
$nav_active="list";
include '../lock.php';

//===== list class =====//
include '../classes/GiftList.php';
$list_class = new GiftList(); 
$list_class->setConn($conn); 

// check if this list id is valid? 
if(!isset($_GET["list_id"])) 
{
    header("Location: index.php"); 
    die;
}
else
{
    $list_id = $_GET["list_id"]; 
    if(!$list_class->checkListId($list_id)) 
    {
        header("Location: index.php"); 
        die;
    }

    $list_class->checkUserAccess($acctid, $list_id); 


    $is_owner = true;

    $list_info = $list_class->getSingleGiftList($list_id); 
    $list_title = $list_info["title"]; 
    $list_owner = $list_info["created_by"]; 

    if($list_owner != $acctid)
        $is_owner = false;
}


include '../include/header.php';
include '../include/topbar.php'; 
?>

<div class="container-fluid">
    
    <h3><i><?= $list_title; ?></i></h3>

    <div class="d-flex">
        <a class="btn btn-sm btn-danger mr-2" href="index.php">Back</a>
        <?php 
        if($is_owner)
        {
        ?>
        <button class="btn btn-sm btn-info mr-2 active" type="button" data-toggle="tab" data-target="#tab_view_list" onclick="$(this).siblings('[data-toggle=\'tab\']').removeClass('active');">View list</button>
        <button class="btn btn-sm btn-primary mr-2" type="button" data-toggle="tab" data-target="#tab_add_item" onclick="$(this).siblings('[data-toggle=\'tab\']').removeClass('active');">Add item</button>
        <button class="btn btn-sm btn-warning mr-2" type="button" onclick="deleteList('<?= $list_id; ?>')">Delete list</button>
        <button class="btn btn-sm btn-secondary mr-2" type="button" data-toggle="tab" data-target="#tab_privacy" onclick="$(this).siblings('[data-toggle=\'tab\']').removeClass('active');">Set privacy</button>
        <?php
        } // end if
        ?>
        <button class="btn btn-sm border mr-2" type="button" onclick="window.location.reload();">Refresh</button>
    </div>

    <hr>

    <div class="tab-content">
        <div class="tab-pane active" id="tab_view_list">
            <?php include 'all_gift.php'; ?>
        </div>
        <?php 
        if($is_owner)
        {
        ?>
        <div class="tab-pane fade" id="tab_add_item">
            <?php include 'new_gift_form.php'; ?>
        </div>
        <div class="tab-pane fade" id="tab_privacy">
            <?php include 'privacy_page.php'; ?>
        <?php
        } // end if
        ?>
        </div>
    </div>

</div>



<script type="text/javascript">
    function checkQuantity(this_input) 
    {
        var qty = Number(this_input.val());
        if(!Number.isInteger(qty)) 
        {
            this_input.val(1);
        }
        else 
        {
            if(qty<=0) 
            {
                this_input.val(1);
            }
        }
    }

    function addQuantity(this_input)
    {
        
        var qty = Number(this_input.val()); 
        console.log(qty);
        if(qty<=0) 
            this_input.val(1);
        else{
            qty++
            this_input.val(qty);
        }
    }

    function minusQuantity(this_input)
    {
        checkQuantity(this_input); 
        var qty = Number(this_input.val());
        qty--;
        if(qty<=0) 
            this_input.val(1);
        else
            this_input.val(qty);
    }

    function deleteList(list_id) 
    {
        if(confirm("Delete gift list?"))
        {
            $.ajax({
                method: "POST", 
                url: "ajax_delete_list.php", 
                data: {list_id: list_id}, 
                success: function(){
                    window.location = "index.php"; 
                }
            });
        }
       
    }

</script>


<?php 
include '../include/footer.php'; 
$conn=null; 
?>