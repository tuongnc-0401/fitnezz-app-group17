<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}



if(isset($_GET['id'])){
    $in_id= $_GET['id'];
    $sql ="SELECT * FROM ingredients WHERE in_id = $in_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {

            $in_name =$row['in_name'];
            $in_calo = $row['in_calo_1g'];
            $in_cat = $row['in_cat'];
            $in_detail = $row['in_detail'];
            $in_img = $row['in_img'];
      } 
}
}
if(isset($_POST['s'])){
    $in_id = $_POST['ingredients_id'];
    $in_name = $_POST['ingredientsname'];
    $in_calo = $_POST['ingredientscalories'];
    $in_cat = $_POST['ingredientscategories'];
    $in_detail = $_POST['ingredientsdetail'];
    $in_img = $_POST['ingredients_img'];

    if(isset($_FILES['ingredientsfile']['name']) && ($_FILES['ingredientsfile']['name'] !="")){
  $fileName =$_FILES['ingredientsfile']['name'];
  $fileTmpName = $_FILES['ingredientsfile']['tmp_name'];
  $fileSize =$_FILES['ingredientsfile']['size'];
  $fileError =$_FILES['ingredientsfile']['error'];  
  $fileExt = explode('.',$fileName);
  $fileActualExt = strtolower(end($fileExt));
  $allowed = array('jpg','jpeg','png');
  
  if (in_array($fileActualExt,$allowed)) { // check type of IMG
    
    if ($fileError === 0) { // check ERROR OF UPLOADING
      
      if ($fileSize < 1000000) { // check size of IMG
          // upload successfully 
          $fileNewName= uniqid("",true).'_'.$fileName;
          $fileDestination = '../img/ingredients/'.$fileNewName; 
          move_uploaded_file($fileTmpName,$fileDestination);
          $path = "../img/ingredients/".$in_img;
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
    $fileNewName = $in_img;
}

//   echo $in_cat;
//   echo $in_calo;
//   echo $in_id;
//   echo $in_name;
//   echo $in_detail;
//   echo $fileNewName;

  $sql = "UPDATE ingredients SET in_name='$in_name', in_img='$fileNewName',in_calo_1g ='$in_calo',in_detail ='$in_detail', in_cat='$in_cat'  WHERE in_id= '$in_id'";

    if (mysqli_query($conn, $sql)) {
    header("Location:index_ingredients.php?notification=Updated");
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
                                                                        <form action="update_ingredients.php" method="POST" enctype="multipart/form-data"> 
                                                                        <div class="form-group"> 
                                                                            <label for="ingredientsname">Ingredients Name</label>
                                                                            <input type="hidden" name="ingredients_id" value=<?php echo $in_id;?> > 
                                                                            <input type="hidden" name="ingredients_img" value=<?php echo $in_img;?> > 
                                                                            <input type="text" class="form-control" id="ingredientsname" name="ingredientsname" value="<?php echo $in_name;?>" > 
                                                                        </div> 
                                                                        <div class="form-group"> 
                                                                           <label for="ingredientscalories">Ingredients Calories</label> 
                                                                            <input type="text" class="form-control" id="ingredientscalories" name="ingredientscalories" value=<?php echo $in_calo;?>> 
                                                                            </div>                                                                     
                                                                           
                                                                  
                                                                        
                                                                                <div class="form-group"> 
                                                                                <label for="ingredientscategories">Choose ingredients categories:</label> <br>
                                                                                <input type="radio" id="fruits" name="ingredientscategories" value=1 <?php if ($in_cat == 1) {echo"checked";}?>>
                                                                                <label for="fruits">Fruits</label><br>
                                                                                <input type="radio" id="vegetables" name="ingredientscategories" value=2 <?php if ($in_cat == 2) {echo"checked";}?>>
                                                                                <label for="vegetables">Vegetables</label><br>
                                                                                <input type="radio" id="dairy" name="ingredientscategories" value=3 <?php if ($in_cat == 3) {echo"checked";}?> >
                                                                                <label for="dairy">Dairy</label><br>
                                                                                <input type="radio" id="grains" name="ingredientscategories" value=4 <?php if ($in_cat == 4) {echo"checked";}?>>
                                                                                <label for="grains">Grains</label><br>
                                                                                <input type="radio" id="proteins" name="ingredientscategories" value=5 <?php if ($in_cat == 5) {echo"checked";}?> >
                                                                                <label for="proteins">Proteins</label><br>
                                                                            
                                                                                   
                                                                            </div>
                                     
                                                                             
                                                                             
                                                                             <div class="form-group">                                                                               
                                                                             <label for="ingredientsfile">File Image input</label>
                                                                               
                                                                               <input type="file" id="ingredientsfile" name="ingredientsfile" accept="image/*"  onchange="readURL(this)" >                                                                        
                                                                             
                                                                              <div >  
                                                                              <img  id="preImg" src="../img/ingredients/<?php echo $in_img;?>" alt="choose an img" height="250px"  height="250px">
                                                                              </div>
    </div>
                                                                            
                                                                            <div class="form-group">    
                                                                            <label for="ingredientsdetail">Ingredients Details </label>
                                                                              <div>
                                                                                  <textarea  name="ingredientsdetail" class="form-control" > <?php echo $in_detail?></textarea>
                                                                              </div>
    </div>
                                                                            <button type="submit" class="btn btn-default" name="s">Submit</button>
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