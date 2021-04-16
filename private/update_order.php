<?php include('header.php'); 

if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}


if(isset($_GET['id'])){
    $order_id= $_GET['id'];
    $sql ="SELECT * FROM orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $user_name =$row['name_user'];
            $order_date = $row['date_order'];
            $order_time = $row['time_order'];
            $address = $row['address'];
            $phone_number = $row['phone_number'];
            $status= $row['status'];
            $total = $row['total'];
      } 
}
}
if(isset($_POST['order_update_submit'])){
    $id= $_POST['orderId'];
    $user_name= $_POST['userName'];
    $order_date = $_POST['orderDate'];
    $order_time = $_POST['orderTime'];
    $address = $_POST['address'];
    $phone_number = $_POST['phoneNumber'];
    $status = $_POST['orderStatus'];
    $total= $_POST['total'];
   

    $sql = "UPDATE orders SET name_user='$user_name', date_order='$order_date', time_order='$order_time',address ='$address', phone_number='$phone_number', status='$status', total= '$total'  WHERE order_id= '$id'";

    if (mysqli_query($conn, $sql)) {
    header("Location:index_order.php?notification=Updated");
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }

mysqli_close($conn);



}
?>
<script>
	  function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preImg')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        } 
</script>
<body>
<div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			
					<!-- //header-ends -->
						<!--outter-wp-->
                        <div class="outter-wp">
											<!--/sub-heard-part-->
											 <div class="sub-heard-part">
													   <ol class="breadcrumb m-b-0">
															<li><a href="index.php">Home</a></li>
															<li class="active">Form</li>
														</ol>
											</div>	
											<!--/sub-heard-part-->	
												<!--/forms-->
													<div class="forms-main">
														<h2 class="inner-tittle">Update Order Form </h2>
															<div class="graph-form">
																	<div class="form-body">
                                                                    <form action="update_order.php" method="POST" > 
                                                                        
                                                                        <div class="form-group"> 
                                                                            <label for="">User Name</label> 
                                                                            <input type="text" class="form-control"  name="userName"  value="<?php echo $user_name;?>"> 
                                                                            <input type="hidden" name="orderId" value=<?php echo $order_id;?>> 

    </div>                  
                                                                            <div class="form-group"> 
                                                                           <label >Order Date</label> 
                                                                            <input type="text" class="form-control"  name="orderDate" value=<?php echo $order_date; ?> > 
                                                                                                                                               
                                                                            
    </div> 
                                                                            <div class="form-group"> 
                                                                           <label for=>Order Time</label> 
                                                                            <input type="text" class="form-control"  name="orderTime" value=<?php echo $order_time;?> > 
                                                                                                                                               
                                                                            
                                                                            </div>
                                                                            <div class="form-group"> 
                                                                           <label for=>Address</label> 
                                                                            <input type="text" class="form-control"  name="address" value="<?php echo $address?>"> 
                                                                                                                                               
                                                                            
                                                                            </div>
                                                                            <div class="form-group"> 
                                                                           <label for=>Phone Number</label> 
                                                                            <input type="text" class="form-control"  name="phoneNumber" value=<?php echo $phone_number?>> 
                                                                                                                                               
                                                                            
                                                                            </div>
                                                                            <div class="form-group"> 
                                                                                <label >Choose order status:</label> <br>
                                                                            <input type="radio" id="breakfast" name="orderStatus" value=0 <?php if ($status == 0) {echo"checked";}?>>
                                                                                <label >Pending</label><br>
                                                                                <input type="radio" id="lunch" name="orderStatus" value=1 <?php if ($status == 1) {echo"checked";}?>>
                                                                                <label >Shipping</label><br>
                                                                                <input type="radio" id="dinner" name="orderStatus" value=2 <?php if ($status == 2) {echo"checked";}?> >
                                                                                <label >Finished</label><br>
                                                                                
                                                                            </div>
                                                                            <div class="form-group"> 
                                                                           <label for=>Total</label> 
                                                                            <input type="text" class="form-control"  name="total" value="<?php echo $total?>" > 
                                                                                                                                               
                                                                            
                                                                            </div>
   
                                         
                 
 
       
                                                                             
                                                                            
                                                            
                                                                            <button type="submit" class="btn btn-default" name="order_update_submit">Submit</button>
                                                                         </form> 
                                                                        
																	</div>

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
<?php include('footer.php'); ?>