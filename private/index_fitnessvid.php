     
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

$sql = "SELECT vid_id, vid_url, vid_name, vid_detail, vid_gender, status_name  FROM  video, product_status  WHERE  video.vid_status  = product_status.status_id ORDER BY vid_id ASC";

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
											
									
													<h3 class="inner-tittle two">Fitness Video Table </h3>
													<a class="btn float-right" href="create_fitnessvid.php">
                                     					<i class="fa fa-plus"></i> Add new video</a>
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
														
																<table class="table table-bordered" > 
																<thead > 
																<tr > 
																
																<th style="text-align:center">Id</th> 
																<th style="text-align:center">Video Name</th> 
																<th style="text-align:center">Video Url</th> 
																<th style="text-align:center">Video Gender</th> 
																<th style="text-align:center">Video Status</th> 
																<th style="text-align:center">Video Detail</th>
																<th style="text-align:center">Video CRUD</th>
																</tr> 
																</thead> 
																<tbody> 
																<?php 

																if (mysqli_num_rows($result) > 0) {
																			// output data of each row
																			while($row = mysqli_fetch_assoc($result)) {
																?>
																				<tr> 
																				<th scope='row'><?php echo $row['vid_id']; ?></th> 
																				<td><?php echo $row['vid_name']; ?></td>
                                                                                <td><?php echo $row['vid_url']; ?></td>
			
                                                                                 <td><?php if ($row['vid_gender'] == 1){
                                                                                    echo "male";
                                                                                 }else if ($row['vid_gender'] == 2) {
                                                                                    echo "female";
                                                                                 }else if ($row['vid_gender'] == 3){
																					 echo "both";
																				 }
                                                                                 ?></td> 
																				 <td><?php echo $row['status_name']; ?></td> 
																				 <td><?php echo $row['vid_detail']; ?></td> 
																				 <td><a class='btn btn-info' style='width:80%' href='update_fitnessvid.php?id=<?php echo $row['vid_id']; ?>'>
																				 <i class='fa fa-pencil-square-o'>Edit</i></a>
																				 <a class='btn btn-danger' style='width:80%' href='delete_fitnessvid.php?id=<?php echo $row['vid_id']; ?>'>
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