<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_POST['upload'])){
    $del_id=$_POST['del_id'];
    // sql to delete a record
$sql = "DELETE FROM ingredients WHERE in_id=$del_id";
$path ="../img/ingredients/".$_POST['del_img'];
if(!unlink($path)){
	echo" Error delete img";
}
if ($conn->query($sql) === TRUE) {
  header("Location:index_ingredients.php?notification=Deleted");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
if(isset($_GET['id'])){
    $in_id= $_GET['id'];
    $sql ="SELECT * FROM ingredients,food_categories WHERE in_id = $in_id and ingredients.in_cat = food_categories.cat_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $in_name =$row['in_name'];
            $in_calo = $row['in_calo_1g'];
            $in_cat = $row['cat_name'];
            $in_detail = $row['in_detail'];
            $in_img = $row['in_img'];
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
											<li class="active">Delete</li>
										</ol>
									   </div>
                                  <!--//sub-heard-part-->
                                  
                                  
                                  <div class="graph-visual tables-main">
											
									
												
														  <div class="graph" style="margin-top: 100px">
															<div class="tables">
														
																<table class="table table-bordered"> 
																<thead> 
																<tr> 
																
																<th>Id</th> 
																<th>Ingredients name</th> 
																<th>Ingredients image</th> 
																<th>Ingredients calories</th> 
																<th>Ingredients detail</th> 
																<th>Ingredients categories</th>											
																</tr> 
																</thead> 
																<tbody> 

																				<tr> 
																				<th scope='row'><?php echo $in_id; ?></th> 
																				<td><?php echo $in_name; ?></td>
																				 <td> <img style='height: 100px;width:100px;' src='../img/ingredients/<?php echo $in_img; ?>'></td> 
																				 <td><?php echo $in_calo; ?></td> 
																				 <td><?php echo $in_detail; ?></td> 
																				 <td><?php echo $in_cat; ?></td> 
																																	 
																				 
																				 </tr>
																			
																			
					
															  
																 </tbody> 
																 </table> 
                                                            </div>
                                                            

													</div>
                                        </div>
                                    
                                        <!--//graph-visual-->
                                        <h2 style="color:blue; text-align:center;">  Are you sure to delete this ingredient ? </h2>
                                        <div style="text-align: center">
                                        <form action="delete_ingredients.php" method="POST"> 
                                        <a  class="btn btn-danger"  style="display: inline-block;" href="index_ingredients.php">No</a>
                                        
                                        
                                        <input type="hidden" name="del_id" value=<?php echo $in_id;?> > 
										<input type="hidden" name="del_img" value=<?php echo $in_img;?> > 
                                     
                                        <button type="submit" class="btn btn-danger"  style="display: inline-block;" name="upload">Yes</button>
                                        </form>


									</div>
									<!--//outer-wp-->
									 <!--footer section start-->
									
									<!--footer section end-->
								</div>
							</div>
                                        
                                     
      
  
									<!--//outer-wp-->
									 <!--footer section start-->
									
									<!--footer section end-->
							
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo">
					<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.html"> <span id="logo"> <h1>Augment</h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a> 
				</header>
            <div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
        <?php include('footer.php');?>