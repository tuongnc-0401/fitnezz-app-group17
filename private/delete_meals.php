<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_POST['upload_meal'])){
    $del_id=$_POST['del_id'];
    // sql to delete a record
$sql = "DELETE FROM product_combo WHERE pro_id=$del_id";
$path ="../img/Meals/".$_POST['del_img'];
if(!unlink($path)){
	echo" Error delete img";
}

if ($conn->query($sql) === TRUE) {
  header("Location:index_meals.php?notification=Deleted");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
if(isset($_GET['id'])){
    $pro_id= $_GET['id'];
    $sql ="SELECT * FROM product_combo,product_status WHERE pro_id = $pro_id and product_combo.pro_status = product_status.status_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $pro_name =$row['pro_name'];
            $pro_calo = $row['pro_sub_detail'];
            $pro_cat = $row['pro_cat'];
            $pro_detail = $row['pro_detail'];
            $pro_img = $row['pro_img'];
            $pro_cost= $row['pro_cost'];
            $pro_status = $row['status_name'];
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
																<th>Meals name</th> 
																<th>Meals image</th> 
																<th>Meals detail</th> 
                                                                <th>Meals cost</th> 
																<th>Meals calories</th> 
																<th>Meals categories</th>
                                                                <th>Meals status</th>
																
																</tr>
																</thead> 
																<tbody> 

                                                                <tr> 
                                                                <tr> 
																				<th scope='row'><?php echo $pro_id; ?></th> 
																				<td><?php echo $pro_name; ?></td>
																				 <td> <img style='height: 100px;width:100px;' src='../img/Meals/<?php echo $pro_img; ?>'></td> 
																				 <td><?php echo $pro_detail; ?></td> 
																				 <td><?php echo $pro_cost; ?> VND</td> 
                                                                                 <td><?php echo $pro_calo; 
                                                                                 if (strpos($pro_calo, 'kcal') === false) {
                                                                                    echo ' kcal';
                                                                                }
                                                                                 ?></td> 
                                                                                 <td> <?php if($pro_cat ==1){
                                                                                        echo "breakfast";
                                                                                 }else if($pro_cat==2){
                                                                                     echo"lunch";
                                                                                 }else if ($pro_cat==3){
                                                                                     echo"dinner";
                                                                                 } ?>                                                                                 
                                                                                 </td>
                                                                                 <td><?php echo $pro_status; ?></td>
																			
																				 </tr>
																			
																			
					
															  
																 </tbody> 
																 </table> 
                                                            </div>
                                                            

													</div>
                                        </div>
                                    
                                        <!--//graph-visual-->
                                        <h2 style="color:blue; text-align:center;">  Are you sure to delete this meal ? </h2>
                                        <div style="text-align: center">
                                        <form action="delete_meals.php" method="POST"> 
                                        <a  class="btn btn-danger"  style="display: inline-block;" href="index_meals.php">No</a>
                                        
                                        
                                        <input type="hidden" name="del_id" value=<?php echo $pro_id;?> > 
										<input type="hidden" name="del_img" value=<?php echo $pro_img;?> > 
                                     
                                        <button type="submit" class="btn btn-danger"  style="display: inline-block;" name="upload_meal">Yes</button>
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