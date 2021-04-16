<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_GET['id'])){
    $order_id = $_GET['id'];
    $sql ="SELECT * FROM order_details WHERE order_id = $order_id";
    $result = mysqli_query($conn, $sql);
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
											<li class="active">Tables</li>
										</ol>
									   </div>
								  <!--//sub-heard-part-->
									<div class="graph-visual tables-main">
											
									
													<h3 class="inner-tittle two">Order Detail Table </h3>
													
														  <div class="graph" style="margin-top: 100px">

															<div class="tables">
														
																<table class="table table-bordered" > 
																<thead > 
																<tr > 
																
																<th style="text-align:center">Order Id</th> 
																
																<th style="text-align:center">Product Name</th> 
																<th style="text-align:center">Quantity</th> 
																<th style="text-align:center">Sub Total</th> 
																<th style="text-align:center">Note
                                                                </th>
																</tr> 
																</thead> 
																<tbody> 
																<?php 

																if (mysqli_num_rows($result) > 0) {
																			// output data of each row
																			while($row = mysqli_fetch_assoc($result)) {
																?>
																				<tr> 
																				<th scope='row'><?php echo $row['order_id']; ?></th> 
																				
                                                                                <td><?php echo $row['pro_name']; ?></td>
			
                                                
																				 <td><?php echo $row['quantity']; ?></td> 
																				 <td><?php echo $row['sub_total']; ?></td> 
                                                                                 <td><?php echo $row['note']; ?></td> 

																			
																				 </tr>
																			
																			
																<?php		
																			} 
																		}
																?>
															  
																 </tbody> 
																 </table> 
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