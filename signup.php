<?php 
require "header.php" 
?>
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Sign up </h1>
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
              <h1 style="color: white">Become A Member</h1>
              <?php 
                if (isset($_GET['error'])) {
                  if ($_GET['error'] == "emptyfields") {
                    echo '<h2 style="color:black; font-style:bold; font-size:23px"> Fill in all fields!</h2>';
                  }
                  elseif ($_GET['error'] == "passwordcheck") {
                    echo '<h2 style="color:black; font-style:bold; font-size:23px"> Your password does not match!</h2>';
                  }
                  elseif ($_GET['error'] == "invaliduid") {
                    echo '<h2 style="color:black; font-style:bold; font-size:23px"> Invalid username!</h2>';
                  }
                  elseif ($_GET['error'] == "usertaken") {
                    echo '<h2 style="color:black; font-style:bold; font-size:23px"> Username is already taken!</h2>';
                  }

                }
                if (isset($_GET['signup'])) {
                  
                    if ($_GET['signup'] == "success") {
                    echo '<h2 style="color:blue; font-style:bold; font-size:23px"> Signup successful!</h2>';
                  }
                }
               ?>
              <form action="includes/signup.inc.php" method="post">
                <div class="form-group">
                  <input type="text" name="uid" class="form-control" placeholder="Username"
                    <?php 
                      if (isset($_GET['uid'])) {
                          echo 'value='.$_GET['uid'];
                      }
                     ?>
                  >
                </div>
                <div class="form-group">
                  <input type="email" name="mail" class="form-control" placeholder="Email"
                  <?php 
                      if (isset($_GET['email'])) {
                          echo 'value='.$_GET['email'];
                      }
                     ?>
                     >
                </div>
                <div class="form-group">
                  <input type="password" name="pwd" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" name="pwd-repeat" class="form-control" placeholder="Repeat password">
                </div>
                <div class="form-group">
                  <p style="color: white;font-size: 20px">Gender: </p>
                  <input type="radio" name="gender" value="male" checked> <span style="color: white; font-size: 20px; margin-right:30px">Male</span>
                  <input type="radio" name="gender" value="female"> <span style="color: white; font-size: 20px; margin-right:30px">Female</span>
                </div>
                
                <div class="form-group">
                  <input type="submit" name="signup-submit" class="btn btn-warning btn-block py-3" value="Create an account">
                </div>
              </form>
            </div>
          </div>

          
        </div>
      </div>
    </section>

    <?php 
    require "footer.php" ?>