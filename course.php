
    <?php 
require "header.php"; 
$id = $_GET['id'];
$query = "select * from video where vid_id = ".$id;
$result = mysqli_query($conn, $query);
list($vid_id, $vid_url, $vid_name, $vid_detail, $vid_gender, $vid_status, $vid_sub_detail) = mysqli_fetch_array($result);

 ?>
    <!-- END header -->
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1><?= $vid_name?></h1>
              
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- END slider -->

    
    <section class="section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12 mb-5">
       
            
            <div class="row justify-content-center">
              <div class="col-md-7 mb-5">
                <h2 class="mb-5"><?= $vid_name?></h2>                
                <iframe width="560" height="315" src="<?= $vid_url?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                <br>
                <p>This video is for <?php if($vid_gender == 1) echo "Male"; 
                          if($vid_gender == 2) echo "Female";
                          if($vid_gender == 3) echo "Both male and female";
                ?></p>
                <p><?= $vid_detail?></p>                
              </div>
            </div>
            

          </div>

        </div>
      </div>
    </section>
    <?php 
    require "footer.php" ?>

   
   
   
   