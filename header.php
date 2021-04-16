<?php 
session_start();
include("includes/db.inc.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Fitnezz</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800" rel="stylesheet">
    <script src="https://kit.fontawesome.com/03847e9be6.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="css/magnific-popup.css">


    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

    <!-- Theme Style -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/newstyle.css">
    <style>
/* width */
::-webkit-scrollbar {
  width: 20px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: red; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
</style>
  </head>
  <body>
    
    <header role="banner" style="background-color: black; position: fixed;">
      <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="index.php">Fitne<span>zz</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav mr-auto pl-lg-5 pl-0">
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <?php if (isset($_SESSION['userUid']) == true) {
                  echo '<li class="nav-item">
                  <a class="nav-link" href="recipes.php">Ingredients</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="meals.php">Meals</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="video.php">Videos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="BMI.php">Calculate BMI</a>
                </li>';
                } ?>
              
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <?php 
                if (isset($_SESSION['userUid']) == true) {
                  echo '<li class="nav-item cta-btn">
                          <a class="nav-link" href="profile.php">Hi! '.$_SESSION["userUid"].'</a>
                        </li>
                        <li class="nav-item cta-btn">
                          <a class="nav-link" href="includes/logout.inc.php">Log out</a>
                        </li>';
                }
                else {
                  echo '<li class="nav-item cta-btn">
                          <a class="nav-link" href="signup.php">Sign up</a>
                        </li>
                        <li class="nav-item cta-btn">
                          <a class="nav-link" href="login.php">Log in</a>
                        </li>';
                }
                if (isset($_SESSION['admin']) == true) {
                  echo '<li class="nav-item cta-btn">
                          <a class="nav-link" href="private/index.php">Admin page</a>
                        </li>'; 
                      }
               ?>
            </ul>
            
          </div>
        </div>
      </nav>
    </header>
    <!-- END header -->
    
    