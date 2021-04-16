 <?php 
 
 session_start();
 $_SESSION["total"] = $_POST['total'];
 $count = $_POST['count'];
 $_SESSION['count'] = $count;
    require "header.php" ?>
    <!-- END header -->
    
    <section class="home-slider-loop-false  inner-page owl-carousel">
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');">
        
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Checkout</h1>
              
            </div>
          </div>
        </div>

      </div>

    </section>
    <!-- END slider -->

    <section class="section element-animate">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Checkout</h2>
              <span class="back-text">Checkout</span>
            </div>
          </div>
        </div>
      </div>
      <div class="container">

      <form action="test.php" method="post" class="formInfo">
        <div class="row">
          <div class="col-lg-6">
            <h4 class="mb-5" style="font-weight: bold;">Shipping Information</h4>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="name">Name</label>
                  <input type="text" id="name" class="form-control" name="customerName" pattern="^([A-Za-z]+[,.]?[ ]?|[A-Za-z]+['-]?)+$" required>
                </div>
              </div>
   
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="phone">Phone</label>
                  <input type="text" id="email" class="form-control" name="phone" required pattern="^[0-9]{10}$"> 
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 form-group">
                  <label for="address">Address</label>
                  <input type="text" id="email" class="form-control" name="address" required>
                </div>
              </div>
          </div>
          
          <div class="col-lg-6 pl-2 pl-lg-5">

            <div class="col-md-8 mx-auto contact-form-contact-info" style="padding-left: 0px; padding-right: 0px;">
              <h4 class="mb-5" style="font-weight: bold;" >Product Details</h4>
             
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Product</th>
                      <th scope="col">Note</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
                    for ($i = 0; $i < $count; $i++){
                      $name = "name" . $i;
                      $quantity = "quantity" . $i;
                      $price = "price" . $i;
                      $note = "note" . $i;
                      $_SESSION[$name] = $_POST[$name];
                      $_SESSION[$quantity] = $_POST[$quantity];
                      $_SESSION[$price] = $_POST[$price];
                      $_SESSION[$note] = $_POST[$note];
                  ?>
                    <tr>
                      <td>
                        <?php echo $_SESSION[$name]?>
                      </td>
                      <td >
                        <?php 
                          if($_SESSION[$note] != ''){
                            echo '<i class="fa fa-check" aria-hidden="true"></i>';
                          } else{
                            echo '<i class="fa fa-times-circle" aria-hidden="true"></i>';
                          }
                        ?>
                      </td>
                      <td >
                        <?php echo $_SESSION[$quantity]?>
                      </td>
                      <td>
                        <?php echo $_SESSION[$price]?>
                      </td>
                    </tr>
                  <?php 
                    }
                  ?>
                    <tr>
                      <th>Total</th>
                      <td></td>
                      <td></td>
                      <th><?php echo $_POST['total']?></th>
                    </tr>
                  </tbody>
                </table>
              
              </div>

          </div>
    
        </div>
        <div class="row">
          <div class="col-9 form-group">
        </div>
              <div class="col-3 form-group">
                <input type="submit" value="Place Order" class="btn btn-primary">
              </div>
            </div>
      </form>
      </div>

    </section>

    <script>
      var button = document.getElementsByClassName("btn btn-primary")[0];
      button.addEventListener("click", function(){

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;

        var time = new Date().toLocaleTimeString();
        var div = document.createElement("div");
        div.innerHTML = `<input type="text"  name="today" value ="${today}" >
        <input type="text"  name="time" value ="${time}" >`;
        document.getElementsByClassName("formInfo")[0].appendChild(div);
        document.getElementsByClassName("formInfo")[0].submit();
        
      });
    </script>


     <?php 
    require "footer.php" ?>