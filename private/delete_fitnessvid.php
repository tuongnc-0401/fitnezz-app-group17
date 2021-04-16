<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_POST['del_vid'])){
    $del_id=$_POST['del_id'];
    // sql to delete a record
$sql = "DELETE FROM video WHERE vid_id=$del_id";


if ($conn->query($sql) === TRUE) {
  header("Location:index_fitnessvid.php?notification=Deleted");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
if(isset($_GET['id'])){
    $vid_id= $_GET['id'];
    $sql ="SELECT * FROM video, product_status WHERE vid_id = $vid_id and video.vid_status = product_status.status_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $vid_name =$row['vid_name'];
            $vid_url = $row['vid_url'];
            $vid_gender = $row['vid_gender'];
            $vid_detail = $row['vid_detail'];
            $vid_status = $row['status_name'];
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
																<th>Video Name</th> 
                                                                <th >Video Url</th> 
																<th >Video Gender</th> 
																<th >Video Status</th> 
																<th >Video Detail</th>
												
																
																</tr>
																</thead> 
																<tbody> 

                                                                <tr> 
                                                                <tr> 
																				<th scope='row'><?php echo $vid_id; ?></th> 
																				<td><?php echo $vid_name; ?></td>
																		
																				 <td><?php echo $vid_url; ?></td> 
																		
                                                                                 <td><?php if ($vid_gender == 1){
                                                                                    echo "male";
                                                                                 }else if ($vid_gender == 2) {
                                                                                    echo "female";
                                                                                 }else if ($vid_gender == 3){
																					 echo "both";
																				 }
                                                                                 ?></td> 
                                                                                 <td><?php echo $vid_status; ?></td> 
                                                                                 <td><?php echo $vid_detail; ?></td> 
        
																			
																				 </tr>
																			
																			
					
															  
																 </tbody> 
																 </table> 
                                                            </div>
                                                            

													</div>
                                        </div>
                                    
                                        <!--//graph-visual-->
                                        <h2 style="color:blue; text-align:center;">  Are you sure to delete this video ? </h2>
                                        <div style="text-align: center">
                                        <form action="delete_fitnessvid.php" method="POST"> 
                                        <a  class="btn btn-danger"  style="display: inline-block;" href="index_fitnessvid.php">No</a>
                                        
                                        
                                        <input type="hidden" name="del_id" value=<?php echo $vid_id;?> > 
						
                                     
                                        <button type="submit" class="btn btn-danger"  style="display: inline-block;" name="del_vid">Yes</button>
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