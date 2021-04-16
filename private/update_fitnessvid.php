<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_GET['id'])){
    $vid_id= $_GET['id'];
    $sql ="SELECT * FROM video WHERE vid_id = $vid_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $vid_id =$row['vid_id'];
            $vid_name = $row['vid_name'];
            $vid_url = $row['vid_url'];
            $vid_detail = $row['vid_detail'];
            $vid_gender = $row['vid_gender'];
            $vid_status= $row['vid_status'];
      } 
}
}
if(isset($_POST['vid_update_submit'])){
    $vid_id = $_POST['vidId'];
    $vid_name = $_POST['vidName'];
    $vid_gender = $_POST['vidGender'];
    $vid_url = $_POST['vidUrl'];
    $vid_detail = $_POST['vidDetail'];
    $vid_status = $_POST['vidStatus'];


  $sql = "UPDATE video SET vid_name='$vid_name', vid_gender='$vid_gender', vid_url ='$vid_url',vid_detail ='$vid_detail', vid_status='$vid_status' WHERE vid_id= '$vid_id'";

    if (mysqli_query($conn, $sql)) {
    header("Location:index_fitnessvid.php?notification=Updated");
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
															<li class="active">Forms</li>
														</ol>
											</div>	
											<!--/sub-heard-part-->	
												<!--/forms-->
													<div class="forms-main">
														<h2 class="inner-tittle">Update Ingredients Form </h2>
															<div class="graph-form">
																	<div class="form-body">
                                                                    <form action="update_fitnessvid.php" method="POST" > 
                                                                        
                                                                        <div class="form-group"> 
                                                                            <label for="">Video Name</label> 
                                                                            <input type="text" class="form-control" id="mealsname" name="vidName"  value="<?php echo $vid_name;?>"> 
                                                                            <input type="hidden" name="vidId" value=<?php echo $vid_id;?> > 

    </div>                  
                                                                            <div class="form-group"> 
                                                                           <label for="">Video URL</label> 
                                                                            <input type="text" class="form-control" id="" name="vidUrl" value=<?php echo $vid_url ?> > 
                                                                                                                                               
                                                                            
    </div> 
                                                                          
                                                                                                                                               
                                                                            
                                    
                                                                            <div class="form-group"> 
                                                                                <label for="">Choose video gender:</label> <br>
                                                                            <input type="radio" id="" name="vidGender" value=1 <?php if ($vid_gender == 1) {echo"checked";}?>>
                                                                                <label for="">Male</label><br>
                                                                                <input type="radio" id="" name="vidGender" value=2 <?php if ($vid_gender == 2) {echo"checked";}?>>
                                                                                <label for="">Female</label><br>
                                                                                <input type="radio" id="" name="vidGender" value=3 <?php if ($vid_gender == 3) {echo"checked";}?> >
                                                                                <label for="">Both</label><br>
                                                                                
                                                                              
    </div>     
                                                                        <div class="form-group"> 
                                                                                <label for="">Choose video status:</label> <br>
                                                                            <input type="radio"  name="vidStatus" value=1 <?php if ($vid_status == 1) {echo"checked";}?>>
                                                                                <label for="underweight">Underweight</label><br>
                                                                                <input type="radio"  name="vidStatus" value=2 <?php if ($vid_status == 2) {echo"checked";}?>>
                                                                                <label for="healthy">Healthy</label><br>
                                                                                <input type="radio"  name="vidStatus" value=3 <?php if ($vid_status == 3) {echo"checked";}?>>
                                                                                <label for="overweight">Overweight</label><br>
                                                                                <input type="radio"  name="vidStatus" value=4 <?php if ($vid_status == 4) {echo"checked";}?>>
                                                                                <label for="obese">Obese</label><br>
                                                                                <input type="radio"  name="vidStatus" value=5 <?php if ($vid_status == 5) {echo"checked";}?> >
                                                                                <label for="extremelyobese">Extremely Obese</label><br>
                                                                                
                                                                              
                                                                                 </div>     
                                                                                
             
 
                                                                              <div class="form-group">    
                                                                            <label for="">Video Detail </label>
                                                                              <div>
                                                                                  <textarea id="" name="vidDetail" class="form-control"> <?php echo $vid_detail?></textarea>
                                                                              </div>
    </div>
                                                                             
                                                                            
                                                            
                                                                            <button type="submit" class="btn btn-default" name="vid_update_submit">Submit</button>
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