<?php 
if (isset($_POST['login-submit'])) {
	require 'db.inc.php';

	$mailuid = $_POST['mailuid'];
	$password = $_POST['pwd'];

	if (empty($mailuid) || empty($password)) {
		header("Location:../login.php?error=emptyfields");
		exit();
	}
	else {
		$sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) {
			header("Location:../login.php?error=sqlerror");
			exit();
		}
		else {
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row=mysqli_fetch_assoc($result)) {
				$pwdCheck= password_verify($password, $row['pwdUsers']);
				if ($pwdCheck == false) {
					header("Location:../login.php?error=wrong password");
					exit();
				}
				elseif ($pwdCheck == true) {
					session_start();
					$_SESSION['userId']=$row['idUsers'];
					$_SESSION['userUid']=$row['uidUsers'];
					$_SESSION['emailUsers']=$row['emailUsers'];
					$_SESSION['gender']=$row['gender'];
					if($row['admin'] == 1 || $row['admin'] == 2 ){
						header("Location:../private/index.php");
						$_SESSION['admin']=$row['admin'];
					} else {
						header("Location:../index.php?login=success");
					}
					
					
				}
			}
			else {
				header("Location:../login.php?error=no user");
				exit();
			}

		}


	}

}
else {
	header("Location:../login.php");
	exit();
}