     
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php include('header.php');
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
// count users 
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
// count ingredients 
$sql1 = "SELECT * FROM ingredients";
$result1 = mysqli_query($conn, $sql1);
$count1 = mysqli_num_rows($result1);

// count meals
$sql2 = "SELECT * FROM product_combo";
$result2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($result2);
// count new order
$sql3 = "SELECT * FROM orders WHERE status = 0";
$result3 = mysqli_query($conn, $sql3);
$count3 = mysqli_num_rows($result3);


?>
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			
					<!-- //header-ends -->
						<div class="outter-wp">
								<!--custom-widgets-->
												<div class="custom-widgets">
												   <div class="row-one">
														<div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Have</h5>
																<h4> Users</h4>
															</div>
															<div class="stats-right">
																<label><?php echo $count; ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Have</h5>
																<h4>Ingredients</h4>
															</div>
															<div class="stats-right">
																<label> <?= $count1 ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Have</h5>
																<h4>Meals</h4>
															</div>
															<div class="stats-right">
																<label><?= $count2 ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Have</h5>
																<h4>New Orders</h4>
															</div>
															<div class="stats-right">
																<label><?= $count3 ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div>
														<div class="clearfix"> </div>	
													</div>
												</div>
												<!--//custom-widgets-->
												
													
												<!--/charts-->
												
																								
												<!--/float-charts-->
														 
									
									<!--//bottom-grids-->
									
									
									
									 
									<!--footer section end-->
								
							</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<?php include('footer.php'); ?>