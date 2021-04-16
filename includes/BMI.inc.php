<?php 
session_start()
?>
<?php 
if (isset($_POST['BMI-submit'])) {
	require 'db.inc.php';

	$height = $_POST['height'];
  	$weight = $_POST['weight'];
  	$BMI=$weight/(($height/100)*($height/100));
  	$BMI1=(int)$BMI;
  	$status;
  	if ($BMI1<19) {
		  $status='underweight';
		  $r =1;
  	}
  	elseif ($BMI1<25) {
		  $status='healthy';
		  $r =2;
  	}
  	elseif ($BMI1<30) {
		  $status='overweight';
		  $r =3;
  	}
  	elseif ($BMI1<40) {
		  $status='obese';
		  $r =4;
  	}
  	else {
		  $status=' extremely obese';
		  $r =5;
  	}
  	date_default_timezone_set('Asia/Krasnoyarsk');
  	$dateBMI=date("Y/m/d");
  	$timeBMI=date("H:i:s");

	$sql ="INSERT INTO ibm(idUsers,	infoBMI,statusBMI,dateBMI,timeBMI,height,weight) VALUES (?,?,?,?,?,?,?)";
  			$stmt=mysqli_stmt_init($conn);

  			if (!mysqli_stmt_prepare($stmt, $sql)) {
  				header("Location:../BMI.php?error=sqlerror");
  				exit();  		
  			}
  			else {
  				
  				mysqli_stmt_bind_param($stmt,"sssssss",$_SESSION["userId"],$BMI1,$r,$dateBMI,$timeBMI,$height,$weight);
  				mysqli_stmt_execute($stmt);
  				header("Location:../BMI.php?infoBMI=".$BMI1."&status=".$status."&height=".$height."&weight=".$weight);
  				exit();
  			}

  	

            
  	
}


 ?>