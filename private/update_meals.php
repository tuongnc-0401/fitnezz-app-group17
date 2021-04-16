<?php include('header.php'); 


if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}

if(isset($_GET['id'])){
    $pro_id= $_GET['id'];
    $sql ="SELECT * FROM product_combo WHERE pro_id = $pro_id";
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
            $pro_status = $row['pro_status'];
      } 
}
}
if(isset($_POST['meals_update_submit'])){
    $pro_id = $_POST['meals_id'];
    $pro_name = $_POST['mealsname'];
    $pro_calo = $_POST['mealscalories'];
    $pro_cat = $_POST['mealscategories'];
    $pro_detail = $_POST['mealsdetail'];
    $pro_cost = $_POST['mealscost'];
    $pro_status = $_POST['mealsstatus'];
    $pro_img = $_POST['meals_img'];

    if(isset($_FILES['mealsfile']['name']) && ($_FILES['mealsfile']['name'] !="")){
  $fileName =$_FILES['mealsfile']['name'];
  $fileTmpName = $_FILES['mealsfile']['tmp_name'];
  $fileSize =$_FILES['mealsfile']['size'];
  $fileError =$_FILES['mealsfile']['error'];  
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');
  
  if (in_array($fileActualExt,$allowed)) { // check type of IMG
    
    if ($fileError === 0) { // check ERROR OF UPLOADING
      
      if ($fileSize < 1000000) { // check size of IMG
          // upload successfully 
          $fileNewName= uniqid("",true).'_'.$fileName;
          $fileDestination = '../img/Meals/'.$fileNewName; 
          move_uploaded_file($fileTmpName,$fileDestination);
          $path = "../img/Meals/".$pro_img;
          unlink($path);
          //insert new product into DB
         
      } else {
        $error =" Your img is too big! ";
      }      
    } else {
        $error=" There was an error uploading your file! ";
    }
  }
  else {
    $error=" You cannot upload files!";
  }

}else{
    $fileNewName = $pro_img;
}


  $sql = "UPDATE product_combo SET pro_name='$pro_name', pro_img='$fileNewName', pro_sub_detail ='$pro_calo',pro_detail ='$pro_detail', pro_cat='$pro_cat', pro_status='$pro_status', pro_cost = '$pro_cost'  WHERE pro_id= '$pro_id'";

    if (mysqli_query($conn, $sql)) {
    header("Location:index_meals.php?notification=Updated");
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
                                                                    <form action="update_meals.php" method="POST" enctype="multipart/form-data"> 
                                                                        
                                                                        <div class="form-group"> 
                                                                            <label for="mealsname">Meals Name</label> 
                                                                            <input type="text" class="form-control" id="mealsname" name="mealsname"  value="<?php echo $pro_name;?>"> 
                                                                            <input type="hidden" name="meals_id" value=<?php echo $pro_id;?> > 
                                                                            <input type="hidden" name="meals_img" value=<?php echo $pro_img;?> >
    </div>                  
                                                                            <div class="form-group"> 
                                                                           <label for="mealscalories">Meals Calories</label> 
                                                                            <input type="text" class="form-control" id="mealscalories" name="mealscalories" value=<?php echo $pro_calo ?> > 
                                                                                                                                               
                                                                            
    </div> 
                                                                            <div class="form-group"> 
                                                                           <label for="mealscost">Meals Cost</label> 
                                                                            <input type="text" class="form-control" id="mealscost" name="mealscost" value=<?php echo $pro_cost?> > 
                                                                                                                                               
                                                                            
                                                                            </div>
                                                                            <div class="form-group"> 
                                                                                <label for="mealscategories">Choose meals categories:</label> <br>
                                                                            <input type="radio" id="breakfast" name="mealscategories" value=1 <?php if ($pro_cat == 1) {echo"checked";}?>>
                                                                                <label for="breakfast">Breakfast</label><br>
                                                                                <input type="radio" id="lunch" name="mealscategories" value=2 <?php if ($pro_cat == 2) {echo"checked";}?>>
                                                                                <label for="lunch">Lunch</label><br>
                                                                                <input type="radio" id="dinner" name="mealscategories" value=3 <?php if ($pro_cat == 3) {echo"checked";}?> >
                                                                                <label for="dinner">Dinner</label><br>
                                                                                
                                                                              
    </div>     
                                                                        <div class="form-group"> 
                                                                                <label for="mealsstatus">Choose meals status:</label> <br>
                                                                            <input type="radio"  name="mealsstatus" value=1 <?php if ($pro_status == 1) {echo"checked";}?>>
                                                                                <label for="underweight">Underweight</label><br>
                                                                                <input type="radio"  name="mealsstatus" value=2 <?php if ($pro_status == 2) {echo"checked";}?>>
                                                                                <label for="healthy">Healthy</label><br>
                                                                                <input type="radio"  name="mealsstatus" value=3 <?php if ($pro_status == 3) {echo"checked";}?>>
                                                                                <label for="overweight">Overweight</label><br>
                                                                                <input type="radio"  name="mealsstatus" value=4 <?php if ($pro_status == 4) {echo"checked";}?>>
                                                                                <label for="obese">Obese</label><br>
                                                                                <input type="radio"  name="mealsstatus" value=5 <?php if ($pro_status == 5) {echo"checked";}?> >
                                                                                <label for="extremelyobese">Extremely Obese</label><br>
                                                                                
                                                                              
                                                                                 </div>     
                                                                                
                                                                                <div class="form-group">                                                                               
                                                                             <label for="mealsfile">File Image input</label>
                                                                               
                                                                               <input type="file" id="mealsfile" name="mealsfile" accept="image/*"  onchange="readURL(this)">                                                                        
                                                                             
                                                                              <div >  
                                                                              <img  id="preImg" src="../img/Meals/<?php echo $pro_img;?>" alt="choose an img" height="250px"  height="250px">
                                                                              </div>
    </div>
 
                                                                              <div class="form-group">    
                                                                            <label for="mealsdetail">Ingredients Details </label>
                                                                              <div>
                                                                                  <textarea id="mealsdetail" name="mealsdetail" class="form-control"> <?php echo $pro_detail?></textarea>
                                                                              </div>
    </div>
                                                                             
                                                                            
                                                            
                                                                            <button type="submit" class="btn btn-default" name="meals_update_submit">Submit</button>
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