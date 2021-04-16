<?php

include("../includes/db.inc.php");
if(isset($_GET['user_id']) == true){
    $id = $_GET['user_id'];

    	//$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql1 = "DELETE from users where idUsers =".$id;
        //$sql = "INSERT INTO users(uidUsers,emailUsers,pwdUsers,gender,admin) VALUES (?,?,?,?,?)";
        $stmt1 = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt1, $sql1)) {
            header("Location:../private/index_users.php?user_id=".$id."&error=sqlerror");
            exit();
        } else {  
            mysqli_stmt_execute($stmt1);
            header("Location:../private/index_users.php?notification=Deleted");
            exit();
        }


}

?>