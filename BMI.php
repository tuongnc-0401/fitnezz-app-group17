<?php 
  require "header.php";
  if(isset($_SESSION['userId']) == false)
  {
    header("Location:index.php");
    exit();
  }
?>
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>BMI </h1>
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- END slider -->
    
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="form-wrap overlap primary element-animate">
              <h2 class="h2">Calculate your BMI</h2>
              <form action="includes/BMI.inc.php" method="post" >
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Height (cm)" name="height" <?php if (isset($_GET['height'])) {
                      echo 'value='.$_GET['height'];
                  } ?>>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Weight (kg)" name="weight" <?php if (isset($_GET['weight'])) {
                      echo 'value='.$_GET['weight'];
                  } ?>>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="" <?php if (isset($_GET['infoBMI'])) {
                      echo 'value='.$_GET['infoBMI'];
                  } ?>>
                </div>
                <?php  if (isset($_GET['status'])) {               
                    echo '<h2 style="color:black; font-style:bold; font-size:23px">You are '.$_GET['status'].'</h2>';}
                  
 ?>
                
                <div class="form-group">
                  <input type="submit" class="btn btn-warning btn-block py-3" value="Calculate" name="BMI-submit">
                </div>
              </form>
            </div>
          </div>

          

        </div>
      </div>
    </section>

    <?php 
    require "footer.php" ?>