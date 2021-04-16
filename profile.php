<?php 
require "header.php" 
?>
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Profile</h1>
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- END slider -->
    
    <link rel="stylesheet" href="css/w3.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
</style>
<body class="w3-light-grey">

<!-- Page Container -->
<div class="w3-content w3-margin-top" style="max-width:1400px;">

  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-third">
    
      <div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-display-container">
          <img source="img/person_2.jpg"
          <?php if (isset($_SESSION['gender'])) {
                if ($_SESSION['gender']=='male') {
             echo 'src="img/person_2.jpg"';
          } else {
            echo 'src="img/person_1.jpg"';
          } 
          }
           
          ?> style="width:100%" alt="Avatar">
          <div class="w3-display-bottomleft w3-container w3-text-black">
            </div>
        </div>
        <div class="w3-container">
          <br>
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large " style='color: #f73471'></i><?php if (isset($_SESSION['userUid'])) echo $_SESSION['userUid'];?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large " style='color: #f73471'></i>London, UK</p>
          <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large " style='color: #f73471'></i><?php if (isset($_SESSION['emailUsers'])) echo $_SESSION['emailUsers'];?></p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large " style='color: #f73471'></i>1224435534</p>
          <hr>

          
        </div>
      </div><br>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
    
      <div class="w3-container w3-card w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><a href="BMI.php">BMI</a></h2>

        <?php 
          require 'includes/db.inc.php';
          $sql = "SELECT * FROM ibm WHERE idUsers=".$_SESSION['userId'];            
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
             while($row = mysqli_fetch_assoc($result)) {
              if ($row['infoBMI']<19) {
                $status='underweight';
                $r =1;
              }
              elseif ($row['infoBMI']<25) {
                $status='healthy';
                $r =2;
              }
              elseif ($row['infoBMI']<30) {
                $status='overweight';
                $r =3;
              }
              elseif ($row['infoBMI']<40) {
                $status='obese';
                $r =4;
              }
              else {
                $status=' extremely obese';
                $r =5;
              }
               echo '
                <div class="w3-container">
              <h5 class="w3-opacity"><b></b></h5>
              <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>'.$row['dateBMI'].'<br>  Time: <span class="w3-tag w3-teal w3-round">'.$row['timeBMI'].'</span></h6>
              <p> Height: '.$row['height'].'. Weight: '.$row['weight'].'. BMI: '.$row['infoBMI'].'. Result: '.$status.'.</p>
              <hr>
            </div>




                ';
           }
          }else {
            echo 'There is no record of this person';
          }

         ?>



        
        
        
      </div>
    <!-- Order History -->

    
    <div class="w3-container w3-card w3-white w3-margin-bottom">
      <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-shopping-cart fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><a>Order history</a></h2>

      <?php 
        require 'includes/db.inc.php';
        $sql = "SELECT * FROM orders WHERE user_id=".$_SESSION['userId'];            
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
           while($row = mysqli_fetch_assoc($result)) {
            if ($row['status'] == 0) {
              $status='pending';
             
            }
            elseif ($row['status'] == 1) {
              $status='shipping';
             
            }
            elseif ($row['status'] == 2) {
              $status='finished';
              
            }
            
             echo '
            <div class="w3-container">
            <h5 class="w3-opacity"><b></b></h5>
            <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>'.$row['date_order'].'<br>  Time: <span class="w3-tag w3-teal w3-round">'.$row['time_order'].'</span></h6>
            <p> Order ID: '.$row['order_id'].'. Address: '.$row['address'].'</p>
            <p> Phone: '.$row['phone_number'].'. Status of order: '.$status.'.</p>
            <p class="w3-text-teal"> Total: '.$row['total'].' VND.</p>
            <hr>
            </div>




              ';
         }
        }else {
          echo 'There is no record of this person';
        }

       ?>



      
      
      
    
    <!-- End  -->    

    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
  </div>
  <div>
    
  </div>
  <?php 
    require "footer.php" 
    ?>