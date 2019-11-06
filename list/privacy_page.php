<h5><u>Gift List Privacy</u></h5>


<div class="small">
    <div class="float-left">
        
        <label for="shared_user">Enter the user's email to give access:</label>
        <input class="form-control-sm" type="email" name="email" id="shared_user" required>
        <button class="btn btn-sm btn-info" type="button" onclick="shareUser()"><i class="fas fa-check"></i></button>
        
    </div>
    <table class="table table-striped table-sm simple-datatable" id="table-privacy">
        <thead>
            <tr>
                <th>Shared user</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = $conn->prepare("SELECT usr.*, share.id as sharing_id FROM tbl_list_sharing share 
                INNER JOIN tbl_user usr ON usr.usr_id=share.usr_id 
                WHERE share.list_id=:list_id"); 
            $sql->execute([
                "list_id" => $list_id
            ]); 
            while($row = $sql->fetch(PDO::FETCH_ASSOC)) 
            {
                $sharing_id = $row["sharing_id"]; 
                $full_name = $row["full_name"]; 
                $email = $row["email"]; 

                echo "<tr id='row_sharing$sharing_id'>";
                echo "<td>".$full_name." <br><small>Email: ".$email."</small></td>";
                echo "<td><button class='btn btn-danger' type='button' onclick='removeSharing(\"$sharing_id\")'><i class='fas fa-times'></i></button></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    function shareUser() 
    {
        var shared_user = $("#shared_user").val(); 
        $.ajax({
            url: "ajax_validate_shared_user.php", 
            method: "POST", 
            data: {shared_user: shared_user, list_id: <?= $list_id; ?>}, 
            success: function(data) {
                if(data!=0)
                {
                    $("#table-privacy").DataTable().destroy();

                    $("#table-privacy tbody").append(data);

                    $("#table-privacy").DataTable({
                        "fixedHeader": true, 
                        "info": false, 
                        "ordering": false, 
                        "lengthChange": false 
                    }); 

                    $("#shared_user").val("");
                }
                else
                {
                    alert("Invalid email"); 
                    $("#shared_user").val("");
                }
            }
        });

    }


    function removeSharing(sharing_id) 
    {
        if(confirm("Remove sharing?"))
        {
            $.ajax({
                method: "POST", 
                url: "ajax_delete_sharing.php", 
                data: {sharing_id: sharing_id}, 
                success: function(){
                    $("#table-privacy").DataTable().destroy();

                    $("#row_sharing"+sharing_id).remove();

                    $("#table-privacy").DataTable({
                        "fixedHeader": true, 
                        "info": false, 
                        "ordering": false, 
                        "lengthChange": false 
                    }); 

                    
                }
            });
        }
       
    }

</script>