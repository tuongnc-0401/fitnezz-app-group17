     
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

$sql = "SELECT pro_id, pro_name, pro_img, pro_detail, pro_cost, pro_sub_detail, pro_cat, status_name FROM  product_combo, product_status  WHERE  product_combo.pro_status  = product_status.status_id ORDER BY pro_id ASC";

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
											
									
													<h3 class="inner-tittle two">Meals Table </h3>
													<a class="btn float-right" href="create_meals.php">
                                     					<i class="fa fa-plus"></i> Add new meals</a>
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
																<th>Meals name</th> 
																<th>Meals image</th> 
																<th>Meals detail</th> 
                                                                <th>Meals cost</th> 
																<th>Meals calories</th> 
																<th>Meals categories</th>
                                                                <th>Meals status</th>
																<th>Meals CRUD</th>
																</tr> 
																</thead> 
																<tbody> 
																<?php 

																if (mysqli_num_rows($result) > 0) {
																			// output data of each row
																			while($row = mysqli_fetch_assoc($result)) {
																?>
																				<tr> 
																				<th scope='row'><?php echo $row['pro_id']; ?></th> 
																				<td><?php echo $row['pro_name']; ?></td>
																				 <td> <img style='height: 100px;width:100px;' src='../img/Meals/<?php echo $row['pro_img']; ?>'></td> 
																				 <td><?php echo $row['pro_detail']; ?></td> 
																				 <td><?php echo $row['pro_cost']; ?> VND</td> 
                                                                                 <td><?php echo $row['pro_sub_detail']; 
                                                                                 if (strpos($row['pro_sub_detail'], 'kcal') === false) {
                                                                                    echo ' kcal';
                                                                                }
                                                                                 ?></td> 
                                                                                 <td> <?php if($row['pro_cat'] ==1){
                                                                                        echo "breakfast";
                                                                                 }else if($row['pro_cat']==2){
                                                                                     echo"lunch";
                                                                                 }else if ($row['pro_cat']==3){
                                                                                     echo"dinner";
                                                                                 } ?>                                                                                 
                                                                                 </td>
                                                                                 <td><?php echo $row['status_name']; ?></td>
																				 <td><a class='btn btn-info' style='width:80%' href='update_meals.php?id=<?php echo $row['pro_id']; ?>'>
																				 <i class='fa fa-pencil-square-o'>Edit</i></a>
																				 <a class='btn btn-danger' style='width:80%' href='delete_meals.php?id=<?php echo $row['pro_id']; ?>'>
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