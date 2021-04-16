<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_POST['del_order'])){
    $del_id=$_POST['del_id'];
    // sql to delete a record
$sql = "DELETE FROM orders WHERE order_id= $del_id ";
$sql1 = "DELETE FROM order_details WHERE order_id= $del_id ";


if ($conn->query($sql1) === TRUE) {
    if ($conn->query($sql) === TRUE){ 
  header("Location:index_order.php?notification=Deleted");
} 
}else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
}
if(isset($_GET['id'])){
    $order_id = $_GET['id'];
    $sql ="SELECT * FROM order_details WHERE order_id = $order_id";
    $result = mysqli_query($conn, $sql);
    $sql1 ="SELECT * FROM orders WHERE order_id = $order_id";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
        // output data of each row
        while($row1 = mysqli_fetch_assoc($result1)) {
    $user_name =$row1['name_user'];
    $order_date = $row1['date_order'];
    $order_time = $row1['time_order'];
    $address = $row1['address'];
    $phone_number = $row1['phone_number'];
    $status= $row1['status'];
    $total = $row1['total'];
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
                                  <h2 style="color:blue;">  Order: </h2>
											
									
												
														  <div class="graph" style="margin-top: 20px">
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
												
																
																</tr>
																</thead> 
																<tbody> 

                                                                <tr> 
                                                                <tr> 
																				<th scope='row'><?php echo $order_id; ?></th> 
																				<td><?php echo $user_name; ?></td>
																		
																				 <td><?php echo $order_date; ?></td> 
																		
                                                                         
                                                                                 <td><?php echo $order_time; ?></td> 
                                                                                 <td><?php echo $address; ?></td> 
                                                                                 <td><?php echo $phone_number; ?></td> 
                                                                                 <td><?php echo $status; ?></td> 
                                                                                 <td><?php echo $total; ?></td> 
        
																			
																				 </tr>
																			
																			
					
															  
																 </tbody> 
																 </table> 
                                                            </div>
                                                            

													</div>
                                        </div>
                                    
                                        <!--//graph-visual-->
                                        							
                                        <h2 style="color:blue;">  Order Detail: </h2>		
														  <div class="graph" style="margin-top: 20px">
															<div class="tables">
														
																<table class="table table-bordered"> 
																<thead> 
																<tr> 
																<th style="text-align:center">Order Id</th> 
																
																<th style="text-align:center">Product Name</th> 
																<th style="text-align:center">Quantity</th> 
																<th style="text-align:center">Sub Total</th> 
																<th style="text-align:center">Note
																
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

                                        <!------->
                                        <h2 style="color:blue; text-align:center;">  If you delete this order, all the related order details will also be deleted ? </h2>
                                        <div style="text-align: center">
                                        <form action="delete_order.php" method="POST"> 
                                        <a  class="btn btn-danger"  style="display: inline-block;" href="index_order.php">No</a>
                                        
                                        
                                        <input type="hidden" name="del_id" value=<?php echo $order_id;?> > 
						
                                     
                                        <button type="submit" class="btn btn-danger"  style="display: inline-block;" name="del_order">Yes</button>
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