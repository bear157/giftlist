<?php 
class User
{
    private $conn; 

    
    public function setConn($conn)
    {
        $this->conn = $conn;
    }

    public function login($email, $input_password) 
    {
        $sql = $this->conn->prepare("SELECT * FROM tbl_user usr WHERE usr.email=:email"); 
        $sql->execute([
            "email" => $email
        ]); 

        if($sql->rowCount()>0)
        {
            $row = $sql->fetch(PDO::FETCH_ASSOC); 
            $fetch_password = $row["usr_password"]; 
            $usr_id = $row["usr_id"]; 
            $full_name = $row["full_name"]; 
            if(password_verify($input_password, $fetch_password)) 
            {
                $_SESSION["usr_id"] = $usr_id; 
                $_SESSION["full_name"] = $full_name; 
                $_SESSION["login_error"] = 0;  

                header("Location: index.php"); 
            }
            else
            {
                $_SESSION["login_error"] = 1;
                header("Location: index.php"); 
            }
        }
        else
        {
            $_SESSION["login_error"] = 1;
            header("Location: index.php"); 
        }

    }


    public function getAllUser() {
        $res = $this->conn->query("SELECT * FROM tbl_user usr ORDER BY usr.username"); 
        return $res; 
    }


} // end class

?>