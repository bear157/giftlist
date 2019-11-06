<?php 
$nav_active="list";
include '../lock.php';
include '../include/header.php';
include '../include/topbar.php';

//===== list class =====//
include '../classes/GiftList.php';
$list_class = new GiftList(); 
$list_class->setConn($conn); 

?>
<div class="container-fluid">
    <h3>Your Gift List</h3>
    <div class="simple-datatable-wrapper mt-2">
        <button class="btn btn-primary btn-sm float-left" type="button" data-toggle="modal" data-target="#create_list_modal">Create Gift List</button>
        <table class="table simple-datatable table-sm table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Number of Gifts</th>
                    <th>Created date</th>
                    
                </tr>
            </thead>
            <tbody>               
                <?php 
                $res = $list_class->getUserGiftList($acctid); 
                while($row = $res->fetch(PDO::FETCH_ASSOC)) 
                {
                    $list_id = $row["list_id"]; 
                    $title = $row["title"]; 
                    $created_date = $row["created_date"]; 
                    $count_gift = $row["count_gift"]; 

                ?>

                <tr class="clickable" onclick="window.location='view.php?list_id=<?= $list_id; ?>'" data-toggle="tooltip" title="Click to view gift list.">
                    <td><?= $title; ?></td>
                    <td><?= $count_gift; ?></td>
                    <td><?= $created_date; ?></td>
                </tr>

                <?php 
                }//=== end while loop ===//
                ?>
            </tbody>
        </table>
    </div>

    <hr>

    <h3>Your Friend's Gift List</h3>
    <div class="simple-datatable-wrapper mt-2">
        <table class="table simple-datatable table-sm table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Title</th>
                    <th>Number of Gifts</th>
                    <th>Created date</th>
                    
                </tr>
            </thead>
            <tbody>               
                <?php 
                $res = $list_class->getUserSharingList($acctid); 
                while($row = $res->fetch(PDO::FETCH_ASSOC)) 
                {
                    $list_id = $row["list_id"]; 
                    $title = $row["title"]; 
                    $created_date = $row["created_date"]; 
                    $count_gift = $row["count_gift"]; 

                ?>

                <tr class="clickable" onclick="window.location='view.php?list_id=<?= $list_id; ?>'" data-toggle="tooltip" title="Click to view gift list.">
                    <td><?= $title; ?></td>
                    <td><?= $count_gift; ?></td>
                    <td><?= $created_date; ?></td>
                </tr>

                <?php 
                }//=== end while loop ===//
                ?>
            </tbody>
        </table>
    </div>


</div>



<!-- The Modal -->
<div class="modal" id="create_list_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header border-bottom-0">
                <h5>Create Gift List</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form class="form" method="POST" action="create_list.php">
                    <div class="form-group row">
                        <label class="col-2" for="list_title">Title: </label>
                        <div class="col-6">
                            <input class="form-control form-control-sm" type="text" name="list_title" id="list_title" maxlength="100" />
                        </div>
                    </div>
                    <button class="btn btn-sm btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php 
include '../include/footer.php'; 
$conn=null; 
?>