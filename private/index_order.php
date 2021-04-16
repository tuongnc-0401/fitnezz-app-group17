     
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

$sql = "SELECT order_id, user_id, name_user, date_order, time_order, address, phone_number, status, total FROM  orders ORDER BY order_id ASC";

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
											<li class="active">Tables</li>
										</ol>
									   </div>
								  <!--//sub-heard-part-->
									<div class="graph-visual tables-main">
											
									
													<h3 class="inner-tittle two">Order Table </h3>
											
														  <div class="graph" style="margin-top: 100px">
														  <?php if(isset($_GET['notification']) == true)
                 echo '
                 <div class="alert alert-info alert-dismissable fade-show" role="alert">
                     '.$_GET["notification"].' successfully. 
                     <button style="margin-right: 20px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true"> &times;</span>
                 </button>
                     </div>

                 ';

         ?>
															<div class="tables">
														
																<table class="table table-bordered"> 
																<thead> 
																<tr> 
																
																	<th>Id</th> 
																	<th>User Name</th> 
																	<th>Order Date</th> 
																	<th>Order Time</th> 
																	<th>Address</th> 
																	<th>Phone Number</th>
																	<th>Status</th>
																	<th>Total</th>
																	<th></th>
																	<th></th>
																	<th></th>

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
																				<td><?php echo $row['name_user']; ?></td>
			
																				 <td><?php echo $row['date_order']; ?></td> 
																				 <td><?php echo $row['time_order']; ?></td>
                                                                                 <td><?php echo $row['address']; ?></td>
                                                                                 <td><?php echo $row['phone_number']; ?></td> 
                                                                            
                                                                                 <td> <?php if($row['status'] ==0){
                                                                                        echo "pending";
                                                                                 }else if($row['status']==1){
                                                                                     echo"shipping";
                                                                                 }else if ($row['status']==2){
                                                                                     echo"finished";
                                                                                 } ?>                                                                                 
                                                                                 </td>
                                                                                 <td><?php echo $row['total']." Vnd"; ?></td> 
                                                                                
																				 <td>
                                                                               
                                                  
                                                                                    <a class='btn btn-info'  href='read_order.php?id=<?php echo $row['order_id']; ?>'>
                                                                                    <i class='fa fa-eye'>Read</i></a>
                                                                                 </td>
                                                                                 <td>
                                             
                                                                                    <a class='btn btn-info col'  href='update_order.php?id=<?php echo $row['order_id']; ?>'>
                                                                                    <i class='fa fa-pencil-square-o'>Edit</i></a>
                                                                                 </td>
                                                                                 <td>
                                                                                    <a class='btn btn-danger col'  href='delete_order.php?id=<?php echo $row['order_id']; ?>'>
                                                                                    <i class='fa fa-trash-o'>Delete</i></a>	
                                                                               
                                                                     
                                                                                    																			 
																				 </td>
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