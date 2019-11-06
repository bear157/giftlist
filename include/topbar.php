<!-- Grey with black text -->
<nav class="navbar navbar-expand-sm bg-secondary navbar-dark mb-2">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item <?= ($nav_active=="home") ? "active" : ""; ?>">
            <a class="nav-link nav-brand" href="/giftlist/">Home</a>
        </li>
        <li class="nav-item <?= ($nav_active=="about") ? "active" : ""; ?>" title="This page is not available." data-toggle="tooltip">
            <a class="nav-link disabled" href="#">About</a>
        </li>
        <li class="nav-item <?= ($nav_active=="list") ? "active" : ""; ?>">
            <a class="nav-link" href="/giftlist/list/">Gift List</a>
        </li>
    </ul>
    <ul class="navbar-nav">
        <?php 
            if(!isset($_SESSION["usr_id"]))
            {
        ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="#login_modal">Login</a>
            </li>
        <?php 
            }
            else
            {
        ?>  
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><i class="fas fa-user"></i> <?= $_SESSION["full_name"]; ?></a>
                <div class="dropdown-menu" style="right: 0; left: unset;">
                    <a class="dropdown-item" href="/giftlist/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </li>   
        <?php
            }
        ?>
        </li>
    </ul>
</nav>

<?php 
if(isset($_SESSION["login_error"])) 
{
    $login_error = $_SESSION["login_error"]; 

    switch ($login_error) 
    {
        case 0:
             echo '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Login success!</strong> </div>';
            break;
        
        case 1:
            echo '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Login failed!</strong> Email or password is invalid. </div>';
            break;

        default: 
            echo "<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Please login first.</strong> </div>";
            break; 
    }
    
    unset($_SESSION["login_error"]); 
}

?>