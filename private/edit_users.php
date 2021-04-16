	 <?php include('header.php');
	 if(isset($_SESSION['admin']) == false)
	 {
	   header("Location:../index.php");
	   exit();
	 }

		

		if (isset($_POST['submit'])) {


			$id = $_POST['id'];
			$username = $_POST['uid'];
			$email = $_POST['mail'];
			//$password = $_POST['pwd'];
			//$passwordRepeat = $_POST['pwd-repeat'];
			$gender = $_POST['gender'];
			$type = $_POST['type-user'];

			if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
				header("Location:../private/edit_users.php?user_id=".$id."&error=invaliduid&email=" . $email);
				exit();
			} 
			// elseif ($password !== $passwordRepeat) {
			// 	header("Location:../private/edit_users.php?user_id=".$id."&error=passwordcheck&uid=" . $username . "&email=" . $email);
			// 	exit();}
			 else {
				
					

						//$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						$sql1 = "UPDATE users SET uidUsers = '$username', emailUsers = '$email', gender = '$gender', admin = '$type' where idUsers = '$id'";
						//$sql = "INSERT INTO users(uidUsers,emailUsers,pwdUsers,gender,admin) VALUES (?,?,?,?,?)";
						$stmt1 = mysqli_stmt_init($conn);
						if (!mysqli_stmt_prepare($stmt1, $sql1)) {
							header("Location:../private/edit_users.php?user_id=".$id."error=sqlerror");
							exit();
						} else {
							
							
							mysqli_stmt_execute($stmt1);
							header("Location:../private/index_users.php?notification=Edited");
							exit();
						}
					


				
			}

			mysqli_stmt_close($stmt);
			mysqli_close($conn);
		} 
		else{
			if (isset($_GET['user_id'])) {
				$id = $_GET['user_id'];
				$sql = "Select * from users where idUsers =" . $id;
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					header("Location:../private/index_users.php?error=sqlerror2");
					exit();
				} else {
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					if ($row = mysqli_fetch_assoc($result)) {
						$username = $row['uidUsers'];
						$email = $row['emailUsers'];
						//$password = $row['pwdUsers'];					
						$gender = $row['gender'];
						$type = $row['admin'];
					}
				}
			}

		}
				
		

		?>

	 <body>
	 	<div class="page-container">
	 		<!--/content-inner-->
	 		<div class="left-content">
	 			<div class="inner-content">
	 				<!-- header-starts -->

	 				<!-- //header-ends -->
	 				<!--outter-wp-->
	 				<div class="outter-wp">
	 					<!--sub-heard-part-->
	 					<div class="sub-heard-part">
	 						<ol class="breadcrumb m-b-0">
	 							<li><a href="index.php">Home</a></li>
	 							<li class="active">Users</li>
	 						</ol>
	 					</div>
	 					<!--//sub-heard-part-->
	 					<div class="graph-visual tables-main">


	 						<div class="set-3">
	 							<div class="outter-wp">
	 								<div class="graph-2 general">
	 									<h3 class="inner-tittle two">Edit users</h3>
	 									<div class="grid-1">
	 										<?php
												if (isset($_GET['error'])) {
													if ($_GET['error'] == "emptyfields") {
														echo '<h2 style="color:red; font-style:bold; font-size:23px"> Fill in all fields!</h2>';
													} elseif ($_GET['error'] == "passwordcheck") {
														echo '<h2 style="color:red; font-style:bold; font-size:23px"> Your password does not match!</h2>';
													} elseif ($_GET['error'] == "invaliduid") {
														echo '<h2 style="color:red; font-style:bold; font-size:23px"> Invalid username!</h2>';
													} elseif ($_GET['error'] == "usertaken") {
														echo '<h2 style="color:red; font-style:bold; font-size:23px"> Username is already taken!</h2>';
													}
												}
												?>
											 <form class="form-horizontal" action="edit_users.php?user_id=<?= $id?>" method="post">
												 <input type="hidden" class="form-control1 icon"  placeholder="Username" name="id" value="<?= $id?>">
	 											<div class="form-group mb-n">
	 												<label class="col-md-2 control-label">Username</label>
	 												<div class="col-md-8">
	 													<input type="text" class="form-control1 icon" placeholder="Username" name="uid" value="<?= $username?>" required>
	 												</div>
	 											</div>

	 											<div class="form-group">
	 												<label class="col-md-2 control-label">Email Address</label>
	 												<div class="col-md-8">
	 													<div class="input-group">
	 														<span class="input-group-addon">
	 															<i class="fa fa-envelope-o"></i>
	 														</span>
	 														<input type="text" class="form-control1 icon" placeholder="Email Address" name="mail" value="<?= $email ?>" required>
	 													</div>
	 												</div>
	 											</div>
	 											<div class="form-group">
	 												<label class="col-md-2 control-label">Password</label>
	 												<div class="col-md-8">
	 													<div class="input-group">
	 														<span class="input-group-addon" style="padding: 10px;">
																 <i class="fa fa-key"></i>
																 <a href="inc/reset_pwd.php?user_id=<?= $id?>"> Reset Password</a>
	 														</span>
	 														<!-- <input type="password" class="form-control1 icon" id="exampleInputPassword1" placeholder="Password" name="pwd" required> -->
														 	
														</div>
	 												</div>
	 											</div>

	 											<!-- <div class="form-group">
	 												<label class="col-md-2 control-label"> Confirm password</label>
	 												<div class="col-md-8">
	 													<div class="input-group input-icon right">
	 														<span class="input-group-addon">
	 															<i class="fa fa-key"></i>
	 														</span>
	 														<input type="password" class="form-control1 icon" placeholder="Password" name="pwd-repeat" required>
	 													</div>
	 												</div>

	 											</div> -->
	 											<div class="form-group">
	 												<label for="radio" class="col-sm-2 control-label">Gender</label>
	 												<div class="col-sm-8">
	 													<div class="radio block"><label><input type="radio" value="male" name="gender" <?php if($gender == 'male') echo 'checked'; ?>> Male</label></div>
	 													<div class="radio block"><label><input type="radio" value="female" name="gender" <?php if($gender == 'female') echo 'checked'; ?>> Female</label></div>

	 												</div>
	 											</div>

	 											<div class="form-group">
	 												<label for="radio" class="col-sm-2 control-label">Type</label>
	 												<div class="col-sm-8">
	 													<div class="radio block"><label><input value="0" type="radio" name="type-user" <?php if($type != '1' && $type != '2') echo 'checked'; ?> <?php if ($_SESSION['admin'] != 2) echo 'disabled'; ?>> User</label></div>
	 													<div class="radio block"><label><input value="1" type="radio" name="type-user"  <?php if($type == '1') echo 'checked'; ?> <?php if ($_SESSION['admin'] != 2) echo 'disabled'; ?>> Admin</label></div>
	 													<div class="radio block"><label><input value="2" type="radio" name="type-user" <?php if($type == '2') echo 'checked'; ?> <?php if ($_SESSION['admin'] != 2) echo 'disabled'; ?>> Super admin</label></div>
	 												</div>
	 											</div>
	 											<div class="row">
	 												<button type="submit" style="float: right;" class="btn btn-primary" name="submit" value="create">Submit</button>
	 											</div>





	 										</form>
	 									</div>
	 								</div>
	 							</div>


	 						</div>



	 					</div>


	 					<!--//graph-visual-->
	 				</div>
	 				<!--//outer-wp-->
	 				<!--footer section start-->

	 				<!--footer section end-->
	 			</div>
	 		</div>
	 		<!--//content-inner-->
	 		<!--/sidebar-menu-->
	 		<div class="sidebar-menu">
	 			<header class="logo">
	 				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo">
	 						<h1>Augment</h1>
	 					</span>
	 					<!--<img id="logo" src="" alt="Logo"/>-->
	 				</a>
	 			</header>
	 			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
	 			<!--/down-->

	 			<?php include('footer.php'); ?>