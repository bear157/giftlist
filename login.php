<?php 
if(!isset($conn)) {
    $need_login = false; 
    include 'lock.php';
}

if(isset($_SESSION["login_error"]))
{
    $login_error = ($_SESSION["login_error"]) ? true : false; 
}
else
{
    $login_error = false;
}

if(isset($_POST["email"]))
{

    $email = $_POST["email"]; 
    $usr_password = $_POST["usr_password"]; 

    include "classes/User.php"; 
    $user_class = new User(); 
    $user_class->setConn($conn); 

    $user_class->login($email, $usr_password); 
    die;
}
else
{

?>


<!-- The Modal -->
<div class="modal" id="login_modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header p-0 pr-1 border-bottom-0">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <style type="text/css">
                    #login-form .form-group *, 
                    #login-form p 
                    {
                        font-size: 12px !important; 
                    }

                    #login-form legend 
                    {
                        font-size: 1rem !important; 
                        font-weight: 500; 
                    }

                    p#response_text 
                    {
                        color: red; 
                    }
                </style>

               
                <form class="needs-validation" id="login-form" method="POST" action="login.php">
                    
                    <legend>Login</legend>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                        </div>
                        <input class="form-control" type="text" name="email" placeholder="Email" required />
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input class="form-control" type="password" name="usr_password" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>

                </form>
                            

            </div>

        </div>
    </div>
</div>
<?php
} // end if else
?>