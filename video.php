<?php 
  require "header.php";
  $cate = 1;
  $query = "select * from video;";
  $result = mysqli_query($conn, $query);
 ?>   
    <!-- END header -->



    <section class="home-slider-loop-false  inner-page owl-carousel" >
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Videos</h1>
            </div>
          </div>
        </div>

      </div>

      
    </section>

    

  
    
    
    <!-- END slider -->

    
    <section class="section element-animate" style="padding-top: 0;margin-top: 60px;">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Video</h2>
           
            </div>
          </div>
        </div>
      </div>


       <div class="container" >

        <?php 
        $count = 0;
          while(list($vid_id, $vid_url, $vid_name, $vid_detail, $vid_gender, $vid_status, $vid_sub_detail) = mysqli_fetch_array($result)){
          $count++;
        ?>



         <?php if($count %2 != 0 ) { echo '<div>';echo '<div class="row">';}?> 

          <div class="col-md-6 mb-4">
          <div class="sched d-block d-lg-flex">
              <div class="bg-image order-2" style="background-image: url('img/img_<?= $vid_id %4 +1 ?>_square.jpg');"></div>
              <div class="text order-1">
                <h3><?= $vid_name ?></h3>
                <h3 style="color:darkmagenta"><?php if($vid_gender == 1) echo "Male"; 
                          if($vid_gender == 2) echo "Female";
                          if($vid_gender == 3) echo "Both male and female";
                ?></h3>
                
                
                <p><a href="course.php?id=<?=$vid_id?>" class="btn btn-primary btn-sm">Watch</a></p>
                
              </div>
              
            </div>
          </div>
        <?php 
        if($count %2 == 0 ) {
            echo '</div>';
        }
          }

        ?>
      </div>

    </section>


   

   



     <?php 
    require "footer.php" ?>

    