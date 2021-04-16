     

<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);

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
						<h3 class="inner-tittle two">General Form </h3>
						<div class="grid-1">
							<form class="form-horizontal">
								<div class="form-group mb-n">
									<label class="col-md-2 control-label">Username</label>
									<div class="col-md-8">
										<input type="text" class="form-control1 icon" placeholder="Username">
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label">Email Address</label>
									<div class="col-md-8">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-envelope-o"></i>
											</span>
											<input type="text" class="form-control1 icon" placeholder="Email Address">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Password</label>
									<div class="col-md-8">
										<div class="input-group">
											<span class="input-group-addon">
												<i class="fa fa-key"></i>
											</span>
											<input type="password" class="form-control1 icon" id="exampleInputPassword1" placeholder="Password">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-2 control-label">Password</label>
									<div class="col-md-8">
										<div class="input-group input-icon right">
											<span class="input-group-addon">
												<i class="fa fa-key"></i>
											</span>
											<input type="password" class="form-control1 icon" placeholder="Password">
										</div>
									</div>

								</div>
								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Gender</label>
									<div class="col-sm-8">
										<div class="radio block"><label><input type="radio"> Male</label></div>
										<div class="radio block"><label><input type="radio"> Female</label></div>
										
									</div>
								</div>

								<div class="form-group">
									<label for="radio" class="col-sm-2 control-label">Type</label>
									<div class="col-sm-8">
										<div class="radio block"><label><input type="radio"> User</label></div>
										<div class="radio block"><label><input type="radio"> Admin</label></div>
										<div class="radio block"><label><input type="radio"> Super admin</label></div>
									</div>
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
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Augment</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			<!--/down-->
							
				<?php include('footer.php'); ?>