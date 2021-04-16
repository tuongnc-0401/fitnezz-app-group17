<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_POST['vid_submit'])){
    $vid_url = $_POST['vidUrl'];
    $vid_name = $_POST['vidName'];
    $vid_detail = $_POST['vidDetail'];
    $vid_gender = $_POST['vidGender'];
    $vid_status = $_POST['vidStatus'];



$sql = "INSERT INTO video (  vid_url, vid_name, vid_detail, vid_gender, vid_status) VALUES ('$vid_url','$vid_name',' $vid_detail',' $vid_gender','$vid_status')";


        if ($conn->query($sql) === TRUE) {
            header("Location:index_fitnessvid.php?notification=Created");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


}
$conn->close();

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
														<h2 class="inner-tittle">Create New Fitness Video Form </h2>
															<div class="graph-form">
                                                                    

																	<div class="form-body">
                                                                        <form action="create_fitnessvid.php" method="POST" enctype="multipart/form-data"> 
                                                                        
                                                                        <div class="form-group"> 
                                                                            <label for="">Video Name</label> 
                                                                            <input type="text" class="form-control" id="" name="vidName" > 
    </div>                  
                                                                            <div class="form-group"> 
                                                                           <label for="">Video Url</label> 
                                                                            <input type="text" class="form-control" id="" name="vidUrl" > 
                                                                                                                                               
                                                                            
    </div> 
                                                                 
                                                                            <div class="form-group"> 
                                                                                <label for="">Choose video gender:</label> <br>
                                                                            <input type="radio" id="" name="vidGender" value=1>
                                                                                <label for="">Male</label><br>
                                                                                <input type="radio" id="" name="vidGender" value=2 >
                                                                                <label for="">Female</label><br>
                                                                                <input type="radio" id="" name="vidGender" value=3 >
                                                                                <label for="">Both</label><br>
                                                                            
                                                                                
                                                                              
    </div>     
                                                                            <div class="form-group"> 
                                                                                <label for="">Choose video status:</label> <br>
                                                                            <input type="radio"  name="vidStatus" value=1>
                                                                                <label for="underweight">Underweight</label><br>
                                                                                <input type="radio"  name="vidStatus" value=2 >
                                                                                <label for="healthy">Healthy</label><br>
                                                                                <input type="radio"  name="vidStatus" value=3 >
                                                                                <label for="overweight">Overweight</label><br>
                                                                                <input type="radio"  name="vidStatus" value=4 >
                                                                                <label for="obese">Obese</label><br>
                                                                                <input type="radio"  name="vidStatus" value=5 >
                                                                                <label for="extremelyobese">Extremely Obese</label><br>
                                                                                
                                                                              
                                                                                 </div>
                                                                                
                                                                            
 
                                                                              <div class="form-group">    
                                                                            <label for="">Video Details </label>
                                                                              <div>
                                                                                  <textarea id="vidDetail" name="vidDetail" class="form-control"> </textarea>
                                                                              </div>
    </div>
                                                                             
                                                                            
                                                            
                                                                            <button type="submit" class="btn btn-default" name="vid_submit">Submit</button>
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
            <!--/down-->

<?php include('footer.php'); ?>