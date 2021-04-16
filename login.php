<?php 
require "header.php" 
?>
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Login</h1>
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
            <div class="form-wrap overlap element-animate">
              <h2 class="h2">Log in</h2>
              <form action="includes/login.inc.php" method="post">
                <div class="form-group">
                  <input type="text" name="mailuid" class="form-control" placeholder="Email or Username">
                </div>
                <div class="form-group">
                  <input type="password" name="pwd" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <p>Forgot your password? <a href="#">click here</a></p>
                  <?php if(isset($_GET['error']) == true) {
                      echo '<h4 style="color: red" class="h4">'.$_GET['error'].'</h4>';
                  }?>
                </div>
                <div class="form-group">
                  <input type="submit" name="login-submit" class="btn btn-primary btn-block py-3" value="Log In">
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </section>

    <?php 
    require "footer.php" ?>