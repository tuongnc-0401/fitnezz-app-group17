<?php include('header.php'); 
if(isset($_SESSION['admin']) == false)
{
  header("Location:../index.php");
  exit();
}
if(isset($_POST['submit'])){
    $in_name = $_POST['ingredientsname'];
    $in_calo = $_POST['ingredientscalories'];
    $in_cat = $_POST['ingredientscategories'];
    $in_detail = $_POST['ingredientsdetail'];

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



$sql = "INSERT INTO ingredients ( in_name, in_img, in_calo_1g, in_detail, in_cat) VALUES ('$in_name','$fileNewName',' $in_calo',' $in_detail','$in_cat')";


        if ($conn->query($sql) === TRUE) {
            header("Location:index_ingredients.php?notification=Created");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }


}
$conn->close();


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
														<h2 class="inner-tittle">Create New Ingredients Form </h2>
															<div class="graph-form">
                                                                    

																	<div class="form-body">
                                                                        <form action="create_ingredients.php" method="POST" enctype="multipart/form-data"> 
                                                                        
                                                                        <div class="form-group"> 
                                                                            <label for="ingredientsname">Ingredients Name</label> 
                                                                            <input type="text" class="form-control" id="ingredientsname" name="ingredientsname" > 
    </div>                  
                                                                            <div class="form-group"> 
                                                                           <label for="ingredientscalories">Ingredients Calories</label> 
                                                                            <input type="text" class="form-control" id="ingredientscalories" name="ingredientscalories" > 
                                                                                                                                               
                                                                            
    </div>
                                                                            <div class="form-group"> 
                                                                                <label for="ingredientscategories">Choose ingredients categories:</label> <br>
                                                                            <input type="radio" id="fruits" name="ingredientscategories" value=1>
                                                                                <label for="fruits">Fruits</label><br>
                                                                                <input type="radio" id="vegetables" name="ingredientscategories" value=2 >
                                                                                <label for="vegetables">Vegetables</label><br>
                                                                                <input type="radio" id="dairy" name="ingredientscategories" value=3 >
                                                                                <label for="dairy">Dairy</label><br>
                                                                                <input type="radio" id="grains" name="ingredientscategories" value=4 >
                                                                                <label for="grains">Grains</label><br>
                                                                                <input type="radio" id="proteins" name="ingredientscategories" value=5 >
                                                                                <label for="proteins">Proteins</label><br>
                                                                            
    </div>     
                                                                                
                                                                                <div class="form-group">                                                                               
                                                                             <label for="ingredientsfile">File Image input</label>
                                                                               
                                                                               <input type="file" id="ingredientsfile" name="ingredientsfile" accept="image/*" required onchange="readURL(this)">                                                                        
                                                                             
                                                                              <div >  
                                                                              <img  id="preImg" src="../img/add_img.jpg" alt="choose an img" height="250px"  height="250px">
                                                                              </div>
    </div>
 
                                                                              <div class="form-group">    
                                                                            <label for="ingredientsdetail">Ingredients Details </label>
                                                                              <div>
                                                                                  <textarea id="ingredientsdetail" name="ingredientsdetail" class="form-control"> </textarea>
                                                                              </div>
    </div>
                                                                             
                                                                            
                                                            
                                                                            <button type="submit" class="btn btn-default" name="submit">Submit</button>
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