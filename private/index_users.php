     

<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
	$sql = "SELECT * FROM users";
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
											<li class="active">Users</li>
										</ol>
									   </div>
								  <!--//sub-heard-part-->
									<div class="graph-visual tables-main">								
												
												
																								
													
									<div class="row">      
	<a class="btn float-right" href="new_users.php">
                                                         <i class="fa fa-plus"></i> Add a new user</a>	
    </div>																
		<div class="graph">
		 <?php if(isset($_GET['notification']) == true)
				 echo '
				 <div class="alert alert-info alert-dismissable fade-show" role="alert">
					 '.$_GET["notification"].' with success. 
					 <button style="margin-right: 20px;" type="button" class="close" data-dismiss="alert" aria-label="Close">
					 <span aria-hidden="true"> &times;</span>
				 </button>
		 			</div>
				 
				 ';
		 
		 ?>
	 	


		<div class="tables">														
		<table class="table table-bordered" >        
          <thead >
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Gender</th>           
            <th>Type</th>            
            
            <th></th>
          </tr>  
          </thead>
          
          <tbody> 
            <?php while($object=mysqli_fetch_assoc($result)){?>      
          <tr>
            <td><?= $object['idUsers']?></td>
            <td><?= $object['uidUsers']?></td>
            <td><?= $object['pwdUsers']?></td>
            <td><?= $object['emailUsers']?></td>
            <td><?= $object['gender']?></td>
            <td><?php if($object['admin'] ==  1) echo 'Admin'; elseif($object['admin'] == 2) echo 'Super admin'; else echo 'Users'; ?></td>  
            <td ><a class="btn btn-info btn-sm" href="edit_users.php?user_id=<?=$object['idUsers']?>" role="button" <?php if($_SESSION['admin'] <= $object['admin']) echo 'disabled';   ?>><i class='fa fa-pencil-square-o'> Edit </i></a>
            <a class="btn btn-danger btn-sm confirmation" href="delete_users.php?user_id=<?=$object['idUsers']?>" role="button" <?php if($_SESSION['admin'] <= $object['admin']) echo 'disabled';   ?>> <i class='fa fa-trash-o'>Delete</i></a></td>
          </tr>
            <?php }?>
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
					<script>
						$('.confirmation').on('click',function(){
							return confirm('Are you sure you want to do delete this users?');
						});

					</script>
				<?php include('footer.php'); ?>