<?php 
  require "header.php";
  if(isset($_SESSION['userId']) == false)
  {
    header("Location:index.php");
    exit();
  }
  $user = $_SESSION['userId'];
  $query1 = "select * from product_combo where pro_status = (select statusBMI from ibm where idUsers = $user order by idBMI desc limit 1);";
  $result1 = mysqli_query($conn, $query1);
  $cate = 1;
  $query = "select * from product_combo;";
  $result = mysqli_query($conn, $query);
  
 ?>   
    <!-- END header -->
    <div class="black-img-pop-up" style="background-image: url('img/black.jpg');display: none;">
    <div class="recom" style="display: none">0</div>
    <form action="checkout.php" method="post" class="formData">
      
    </form>
      
    </div>

    <!-- <div class="pop-up-div" >
      <i class="fas fa-times"></i>
      <div class="image-product">
        <div class="img-small-product" style="background-image: url('img/meals/Breakfast.jpg')">

        </div>

        <div class="price-fixed-product">
            45,000 VND
        </div>
      </div>

      <div class="detail-product" >

        <div>
          <h5 class="title-product"><strong>Sữa Chua Phúc Bồn Tử Đác Cam</strong></h5>
        </div>

        <div style="margin-top: 10px;">
          <strong>Calories: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <span class="calories-product">540 kcal</span>
        </div>

        <div style="margin-top: 10px;">
          <strong>Best for: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <span class="type-product">healthy</span>
        </div>

        <div style="margin-top: 10px;">
          <strong>Quantity: &nbsp;&nbsp;&nbsp;</strong>
          <i class="fas fa-minus" onclick="decreaseValue()"></i>&nbsp;
          <input type="text" value="1" id="number" class="quantity-product" style="width: 30px;">&nbsp;
          <i class="fas fa-plus" onclick="increaseValue()"></i>
        </div>

        <div class="note-product" style="margin-top: 10px;">
          <strong>Note: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <input type="text" style="width: 80%;height: 100px; border-radius: 10px;border: 1px solid grey;">
        </div>

        <div style="margin-top: 10px;">
          <strong>Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <span class="price-product">45,000 VND</span> 
        </div>
        
        <p style="margin-top: 20px;">
          <button class="btn btn-primary pop-up-add-btn-sm" style="cursor: pointer;">Add to cart</button>
        </p>
      </div>
    </div> -->

    <div class="minimize-btn" id="minimize-btn" style="display: none;">
      <button type="button" class="btn btn-danger" style="cursor: pointer;display: flex;
          justify-content: center;
          align-items: center;
          position: fixed;
          top: 276px;
          height: 0.5%;
          width: 0.5%;
          z-index: 6;
          ">X
      </button>
    </div>

    <div class="minimize-btn-filter" id="minimize-btn-filter" style="display: none;">
        
        <button type="button" class="btn btn-danger" style="cursor: pointer;display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 328px;
            height: 0.5%;
            width: 0.5%;
            z-index: 6;
            ">X
        </button>
    </div>

    <div class="big-new-div" id="big-new-div" style="top: 300px;display: none;background-color: #1e1f29;">
      <div class="new-div" id="new-div" style="top: 300px;background-image: url('img/hehe.jpg');background-position: center;background-size: cover;">
        <div class="div-under">

        </div>
      </div>
        <div id="total-calories">
          <div class="div1" >
            <span style="font-weight: bold;">Total: </span>
            <span class="cart-total-calories"></span>
            <span class="cart-total-calories-hidden" style="display: none"></span>
          </div>

          <div class="div2" style="color: white; cursor:pointer; z-index: 301;">
            Continue <i class="fas fa-step-forward" style="z-index: 301;"></i>
          </div>
          
        </div>
    </div>
    <div class="new-div-filter" id="new-div-filter" style="display: none; width:14%;
height:10%;">

        <label style="background-color: black; height: 100%;margin-bottom: 0px">
          <h5 style="font-weight:bold; color: white" id="myInput">Search(ingredient):</h5>
          <div class="row form-group has-search" style="width:100%;">
            <div class="col-md-12">
              <form class="form-inline active-cyan-4">
                <input class="form-control form-control-sm mr-3 w-75" onkeyup="searchBar()" id="filter_letter" type="text" style="height:20%; margin-left: 5px;" placeholder="Search"
                  aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
              </form>

            </div>


          </div>

        </label>

    </div>

    <section class="home-slider-loop-false  inner-page owl-carousel" >
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');top:100px">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Product Combos</h1>
            </div>
          </div>
        </div>

      </div>

      
    </section>

    

        <!-- filter button -->
    <div class="container-filter" style="position:fixed;width:100%;z-index:3;"> 

      <section class="filter1" id="idForFilter1"  style="width: 60px; height: 60px;display:flex;align-items:center;justify-content:center;cursor: pointer;float:right;">
          <i class="fas fa-bars fa-2x"></i>
      </section>

      <section class="filter2" id="idForFilter2" onmouseover="hover()" onmouseout="offHover()" style="width: 60px; height: 60px;display:flex;align-items:center;justify-content:center;cursor: pointer;">
        <i class="fas fa-bars fa-2x" id="huy"></i>
        <p id="huy1" style="display:none; z-index:4;color:black">Filtering</p>
      </section>
    
    </div>
  
    
    
    <!-- END slider -->

    <section class="section element-animate">

      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Recommendation</h2>
              <span class="back-text">Combo meals</span>
            </div>
          </div>
        </div>
      </div>
        <div class="container">
          <div class="row">
            <div class="major-caousel js-carousel-1 owl-carousel">
            <?php 
        
              while(list($pro_id1, $pro_name1, $pro_img1, $pro_detail1, $pro_cost1, $pro_sub_detail1, $pro_cat1, $pro_status1 ) = mysqli_fetch_array($result1)){
          
            ?>
              <div>
                <div class="media d-block media-custom text-center">
                  <a><img src="img/meals/<?php echo $pro_img1?>" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black"><?php echo $pro_name1?></h3>
                    <p class="lead">
                    <?php 
                    if($pro_status1 ==1){
                    echo "underweight";
                    }else if($pro_status1 ==2){
                      echo "healthy";
                    }else if($pro_status1 ==3){
                      echo "overweight";
                    }else if($pro_status1 ==4){
                      echo "obese";
                    }else if($pro_status1 ==5){
                      echo "extremely obese";
                    }
                    ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php 
        
              }

            ?>
              <!-- <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_2.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Mike Richardson</h3>
                    <p class="lead">CEO, Co-Founder</p>
                  </div>
                </div>
              </div>
              <div>
                <div class="media d-block media-custom text-center">
                  <a href="adoption-single.html"><img src="img/person_3.jpg" alt="Image Placeholder" class="img-fluid"></a>
                  <div class="media-body">
                    <h3 class="mt-0 text-black">Charles White</h3>
                    <p class="lead">CEO, Co-Founder</p>
                  </div>
                </div>
              </div>

               <div>
              <div class="media d-block media-custom text-center">
                <a href="adoption-single.html"><img src="img/person_1.jpg" alt="Image Placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <h3 class="mt-0 text-black">Mellisa Howard</h3>
                  <p class="lead">CEO, Co-Founder</p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <a href="adoption-single.html"><img src="img/person_2.jpg" alt="Image Placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <h3 class="mt-0 text-black">Mike Richardson</h3>
                  <p class="lead">CEO, Co-Founder</p>
                </div>
              </div>
            </div>
            <div>
              <div class="media d-block media-custom text-center">
                <a href="adoption-single.html"><img src="img/person_3.jpg" alt="Image Placeholder" class="img-fluid"></a>
                <div class="media-body">
                  <h3 class="mt-0 text-black">Charles White</h3>
                  <p class="lead">CEO, Co-Founder</p>
                </div>
              </div>
            </div> -->
            
              
          </div>
          <!-- END slider -->
          </div>
        </div>
      
    </section> <!-- .section -->
    
    

    <section class="section element-animate" style="padding-top: 0;margin-top: 60px;" id="grain">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Meal</h2>
              <span class="back-text">Combos</span>
            </div>
          </div>
        </div>
      </div>


       <div class="container" >

        <div class="row">
        <?php 
        
        while(list($pro_id, $pro_name, $pro_img, $pro_detail, $pro_cost, $pro_sub_detail, $pro_cat, $pro_status ) = mysqli_fetch_array($result)){
          
        ?>



         

          <div class="col-md-6 mb-4">
            <div class="blog d-block d-lg-flex" style="width: 540px;height:278px;">
              <div class="bg-image" style="background-image: url('img/meals/<?php echo $pro_img?>');"></div>
              <div class="url-img" style="display: none;">img/meals/<?php echo $pro_img?></div>
              <div class="text">
                <h3 class="title"><?php echo $pro_name?></h3>
                <div class="pro-cost-not-raw" id="pro-cost-not-raw-<?php echo $pro_name?>" style="display: none;"><?php echo number_format($pro_cost, 0, '', ',');?> VND</div>
                <div class="pro-cost-raw" id="pro-cost-raw-<?php echo $pro_name?>" style="display: none;"><?php echo $pro_cost?></div>
                <p class="sched-time" style="margin-bottom: 5px">
                  <span><i class="fas fa-balance-scale"></i> <span class="calo" ><?php echo $pro_sub_detail?></span>/dish</span> <br>
                </p>
                <p class="sched-time" style="margin-bottom: 5px">
                    <span><i class="fas fa-child"></i> Suitable for: <span class="typePro">
                    <?php 
                    if($pro_status ==1){
                    echo "underweight";
                    }else if($pro_status ==2){
                      echo "healthy";
                    }else if($pro_status ==3){
                      echo "overweight";
                    }else if($pro_status ==4){
                      echo "obese";
                    }else if($pro_status ==5){
                      echo "extremely obese";
                    }
                    ?>
                    </span> 
                    </span> <br>
                </p>
                <p class="product-detail" style="width:210px;height:110px;overflow-y:scroll"><?php echo $pro_detail?></p>

                <p>
                  <button class="btn btn-primary btn-sm" id="<?php echo $pro_name?>"><?php echo number_format($pro_cost, 0, '', ',');?> VND</button>
                </p>

              </div>

            </div>
          </div>
        <?php 
        
          }

        ?>
        </div>
      </div>

    </section>

   

    <!-- Start JS -->
    <script>
        

        function hover() {
          document.getElementById('huy1').style.display = "block";
          document.getElementById('huy').style.display = "none";
        }
        
        function offHover() {
          document.getElementById('huy1').style.display = "none";
          document.getElementById('huy').style.display = "block";
        }

        
        function openNewDiv(){
          var newDiv = document.getElementById("new-div");
          var bigNewDiv = document.getElementById("big-new-div");
          if(newDiv.style.display == "none" || bigNewDiv.style.display == "none"){
            newDiv.style.display = "flex";
            bigNewDiv.style.display = "flex";
            document.getElementById('minimize-btn').style.display = "flex";
            document.getElementById('idForFilter1').style.display = "none";
          }
        }
        document.getElementById('idForFilter1').addEventListener('click', openNewDiv);
     
        function minimizeFilter(){
          var newDiv = document.getElementById("minimize-btn-filter");
          var newDiv1 = document.getElementById("new-div-filter");
          var newDiv2 = document.getElementById("idForFilter2");
          newDiv.style.display = "none";
          newDiv1.style.display = "none";
          newDiv2.style.display = "flex";
        }
        document.getElementById('minimize-btn-filter').addEventListener('click', minimizeFilter);
        
        function openNewDivFilter(){
          var newDiv = document.getElementById("new-div-filter");
          
          if(newDiv.style.display == "none"){
            newDiv.style.display = "flex";
            
            // document.getElementsByClassName("minimize-btn-filter").style.display = "flex";
            document.getElementById('idForFilter2').style.display = "none";
            document.getElementById('minimize-btn-filter').style.display = "flex";

          }
        }
        document.getElementById('idForFilter2').addEventListener('click', openNewDivFilter);

    




        function minimizeBtn(){

        }
        function searchBar() {
          var filter = document.getElementById('filter_letter').value.toUpperCase();
          console.log(filter);
          var myproduct = document.getElementsByClassName('col-md-6 mb-4');
          for (var i = 0; i < myproduct.length; i++) {
            var div = myproduct[i].getElementsByClassName('product-detail')[0];
            var div1 = myproduct[i].getElementsByClassName('title')[0];
            if (div) {
              var textvalue = div.innerHTML;
              var textvalue1 = div1.innerHTML;
              if (textvalue.toUpperCase().indexOf(filter) > -1 || textvalue1.toUpperCase().indexOf(filter) > -1) {
                myproduct[i].style.display = "";
              } else {
                myproduct[i].style.display = "none";
              }
            }
          }
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 1400;
        }
        
        
        //huy nho'section

        if(document.readyState == "loading"){
          document.addEventListener("DOMContentLoaded", ready);
        }else{
          ready();
        }


        //
        function increaseValue() {
          var value = parseInt(document.getElementById('number').value, 10);
          value = isNaN(value) ? 0 : value;
          value++;
          document.getElementById('number').value = value;
          forFffun(value);
        }

        function decreaseValue() {
          var value = parseInt(document.getElementById('number').value, 10);
          value = isNaN(value) ? 0 : value;
          value < 1 ? value = 1 : '';
          value--;
          document.getElementById('number').value = value;
          forFffun(value);
        }


        function ready(){
            var removeCartItemButtons = document.getElementsByClassName("remove-btn");
            for (let i = 0; i < removeCartItemButtons.length; i++) {
            var removeButton = removeCartItemButtons[i];
            removeButton.addEventListener("click", removeCartItem);
            }

            var quantityGram = document.getElementsByClassName("gram");
            for(let i = 0; i < quantityGram.length; i++){
                var input = quantityGram[i];
                input.addEventListener("change", quantityChanged);
                // input.addEventListener("change", quantityChangedMini);
            }

          var addtoCartButtons = document.getElementsByClassName("btn btn-primary btn-sm");
          for (let i = 0; i < addtoCartButtons.length; i++) {
            var button = addtoCartButtons[i];
            // button.addEventListener("click", addToCartClicked);
            button.addEventListener("click", takeInfoProCombo);
          }
        }

        var continueButton = document.getElementsByClassName("div2")[0];
        continueButton.addEventListener("click", getOrderDetail);

        var names = [];
        var quantities = [];
        var prices = [];
        var notes = [];
        function getOrderDetail(){
          var count = 0;
          var container = document.getElementsByClassName("new-div")[0];
          var allDetails = container.getElementsByClassName("cart-row");
          for (let i = 0; i < allDetails.length; i++) {
            var cartRow = allDetails[i];
            var name = cartRow.getElementsByClassName("name")[0].innerHTML;
            names.push(name);
            var quantity = cartRow.getElementsByClassName("gram")[0].value;
            quantities.push(quantity);
            var price = cartRow.getElementsByClassName("calories")[0].innerHTML;
            prices.push(price);
            var note = cartRow.getElementsByClassName("note-ne")[0].innerHTML;
            notes.push(note);
            var total = document.getElementsByClassName("cart-total-calories-hidden")[0].innerHTML;
            var divInsideForm = document.createElement("div");
            divInsideForm.id = "div-in" + i;
            divInsideForm.innerHTML= `
              <input type="text" id="name${i}" name="name${i}" value ="${names[i]}" >
              <input type="text" id="quantity${i}" name="quantity${i}" value ="${quantities[i]}" >
              <input type="text" id="price${i}" name="price${i}" value ="${prices[i]}" >
              <input type="text" id="note${i}" name="note${i}" value ="${notes[i]}" >
              `;
            document.getElementsByClassName("formData")[0].appendChild(divInsideForm);
            count++;
            
            

            
            // console.log(form);
          }
          var divInsideForm = document.createElement("div");
          divInsideForm.id = "div-count";
          divInsideForm.innerHTML= `
              <input type="text"  name="count" value ="${count}" >
              `;
          document.getElementsByClassName("formData")[0].appendChild(divInsideForm);

          var divInsideForm02 = document.createElement("div");
          divInsideForm02.id = "div-count02";
          divInsideForm02.innerHTML= `
              <input type="text"  name="total" value ="${total}" >
              `;
          document.getElementsByClassName("formData")[0].appendChild(divInsideForm02);
          document.getElementsByClassName("formData")[0].submit();
          console.log(names);
          console.log(quantities);
          console.log(prices);
          console.log(notes);

        }
        

        //quantity gram changed
        function quantityChanged(event){
          var input = event.target;
          quantityChangedMini(input);
          updateCartTotal();
          // compareTotalvsRec();
        }
        function updateCartTotal(){
          var cartItemContainer = document.getElementsByClassName("new-div")[0];
          var cartRows = cartItemContainer.getElementsByClassName("cart-row");
          var total = 0;
          for(var cartRow of cartRows){
            var quantityElement = cartRow.getElementsByClassName("gram")[0];
            var caloriesElement = cartRow.getElementsByClassName("calories-fixed")[0];
            var quantity = parseFloat(quantityElement.value);
            var calories = parseFloat(caloriesElement.innerHTML);
            var totalSub = quantity * calories;
            total = total + totalSub;
          }
          document.getElementsByClassName("cart-total-calories-hidden")[0].innerHTML = total;
          document.getElementsByClassName("cart-total-calories")[0].innerHTML = total + " VND";

          
        }

        function quantityChangedMini(input){
          var cartRow = input.parentElement.parentElement;
          var inputValue = parseFloat(cartRow.getElementsByClassName("gram")[0].value);
          var calories = parseFloat(cartRow.getElementsByClassName("calories-fixed")[0].innerHTML);
          var sum = inputValue * calories;
          cartRow.getElementsByClassName("calories")[0].innerHTML = sum;
        }

        function minimizeCart(){
          var newDiv = document.getElementById("minimize-btn");
          var newDiv1 = document.getElementById("new-div");
          var newDiv2 = document.getElementById("idForFilter1");
          var bigNewDiv = document.getElementById("big-new-div");
          bigNewDiv.style.display = "none";
          newDiv.style.display = "none";
          newDiv1.style.display = "none";
          newDiv2.style.display = "flex";
        }
        document.getElementById('minimize-btn').addEventListener('click', minimizeCart);

        // function addToCartClicked(event){
        // }

        //remove cart item
        function removeCartItem(event){
          var removeButtonClicked = event.target;
          removeCartItemUpdate(removeButtonClicked);
          removeButtonClicked.parentElement.parentElement.remove();
          updateCartTotal(); 
          // compareTotalvsRec();
        }

        function removeCartItemUpdate(btn){
          //take name's product in cart
          var cartRow = btn.parentElement.parentElement;
          var titleInCart = cartRow.getElementsByClassName("name")[0].innerHTML;
          var idProCostNotRaw = "pro-cost-not-raw-" +titleInCart;
            var proCostNotRaw = document.getElementById(idProCostNotRaw).innerHTML;
          //take name's product in menu 
          var titles = document.getElementsByClassName("title");
          for (let i = 0; i < titles.length; i++) {
            var title = titles[i];
            title = title.innerHTML;
            if (title == titleInCart) {
              var change = document.getElementById(title);
              change.style.backgroundColor = "#f73471";
              change.style.borderColor = "#f73471";
              change.innerHTML = proCostNotRaw;
            }
          }
        }

        function compareTotalvsRec(){
          var rec = document.getElementsByClassName("recom")[0].innerHTML;
          var total = document.getElementsByClassName("cart-total-calories")[0].innerHTML;
          if(parseFloat(total)  > parseFloat(rec)){
            alert("Warning: Your total calories are over the recommendation.");
            document.getElementsByClassName("div1")[0].style.color = "red";
          }else{
            document.getElementsByClassName("div1")[0].style.color = "white";
          }
        }
        

        function closeBigCart(event){
          var button = event.target;
          button.parentElement.remove();
          document.getElementsByClassName("black-img-pop-up")[0].style.display = "none";
        }

        function takeInfoProCombo(event){
          var btn = event.target;
          var container = btn.parentElement.parentElement;
          var containerBig = btn.parentElement.parentElement.parentElement;
          var type = container.getElementsByClassName("typePro")[0].innerHTML;
          var nameProduct = container.getElementsByClassName("title")[0].innerHTML;
          var imgUrl = containerBig.getElementsByClassName("url-img")[0].innerHTML;
          var priceDisplay = container.getElementsByClassName("pro-cost-not-raw")[0].innerHTML;
          var priceCalculate = parseFloat(container.getElementsByClassName("pro-cost-raw")[0].innerHTML);
          var quantity = 1;
          var calories = container.getElementsByClassName("calo")[0].innerHTML;
          calories = calories.replace(" kcal", "");
          calories = parseFloat(calories);
          openBigCart(imgUrl, nameProduct, priceDisplay, priceCalculate, quantity, calories, type, btn);
        }

        function openBigCart(imgUrl, nameProduct, priceDisplay, priceCalculate, quantity, calories, type, btn){
          var popUpDiv = document.createElement("div");
          popUpDiv.innerHTML = `<i class="fas fa-times"></i>
      <div class="image-product">
        <div class="img-small-product" style="background-image: url('${imgUrl}')">

        </div>

        <div class="price-fixed-product">
          ${priceDisplay}
        </div>
      </div>

      <div class="detail-product" >

        <div>
          <h5 class="title-product"><strong>${nameProduct}</strong></h5>
        </div>

        <div style="margin-top: 10px;">
          <strong>Calories: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <span class="calories-product">${calories} kcal</span>
        </div>

        <div style="margin-top: 10px;">
          <strong>Best for: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <span class="type-product">${type}</span>
        </div>

        <div style="margin-top: 10px;">
          <strong>Quantity: &nbsp;&nbsp;&nbsp;</strong>
          <i class="fas fa-minus" onclick="decreaseValue()"></i>&nbsp;
          <input type="text" value="${quantity}" id="number" class="quantity-product" style="width: 30px;">&nbsp;
          <i class="fas fa-plus" onclick="increaseValue()"></i>
        </div>

        <div class="note-product" style="margin-top: 10px;">
          <strong>Note: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <input type="text" class="note-product-input" style="width: 80%;height: 100px; border-radius: 10px;border: 1px solid grey;">
        </div>

        <div style="margin-top: 10px;">
          <strong>Price: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>
          <span class="price-product">${priceCalculate } </span>VND
          <span class="price-product-fixed" style="display: none">${priceCalculate } </span>
        </div>
        
        <p style="margin-top: 20px;">
          <button class="btn btn-primary pop-up-add-btn-sm" style="cursor: pointer;">Add to cart</button>
        </p>
      </div>`;
          popUpDiv.classList.add("pop-up-div");
          var body = document.body;
          body.appendChild(popUpDiv);
          //pop up opacity
          document.getElementsByClassName("black-img-pop-up")[0].style.display = "block";
          //add function for button 
          document.getElementsByClassName("fas fa-times")[0].addEventListener("click", closeBigCart);
          //ad function for change event
          document.getElementsByClassName("quantity-product")[0].addEventListener("change", forFffun);

          //add function for "add to cart" button in pop-up cart (create new div in right div)
          var btnInCarts = document.getElementsByClassName("btn btn-primary pop-up-add-btn-sm");
          for (let i = 0; i < btnInCarts.length; i++) {
            var btnInCart = btnInCarts[i];
            btnInCart.addEventListener("click", function(event){
              var buttonPopUpCart = event.target;
              var popUpCart =  buttonPopUpCart.parentElement.parentElement;
              var inputValue = popUpCart.getElementsByClassName("quantity-product")[0].value;
              var totalPopUp = popUpCart.getElementsByClassName("price-product")[0].innerHTML;
              var note = popUpCart.getElementsByClassName("note-product-input")[0].value;


              var button = document.getElementById(nameProduct);
              
              // take info
              var fullInfo = button.parentElement.parentElement;
              var name = fullInfo.getElementsByClassName("title")[0].innerHTML;
              var calories = parseFloat(fullInfo.getElementsByClassName("pro-cost-raw")[0].innerHTML);
              var img = fullInfo.parentElement.getElementsByClassName("url-img")[0].innerHTML;
              

              // main function

              // remove duplicate
              var divContainer = document.getElementsByClassName("new-div")[0];
              var cartRowNameIterate = divContainer.getElementsByClassName("name");
              for (let i = 0; i < cartRowNameIterate.length; i++) {
                if (cartRowNameIterate[i].innerHTML == name) {
                  return
                }
                
              }
              button.style.backgroundColor = "#a0a6aa";
              button.style.borderColor = "#a0a6aa";
              button.style.color = "white";
              button.innerHTML = "Added"

              var cartRow = document.createElement("div");
              
              
              var cartRowContent = `<div class="col-img" style='background-image: url("${img}");'>
                
                </div>
                
                <div class="col-name">
                  <div class="name">${name}</div>
                  <input type="number" class="gram" name="tentacles" value="${inputValue}" min="1" max="100">
                </div>
      
                <div class="col-end">
                  <span class="calories">${totalPopUp}</span>
                  <span class="calories-fixed" style="display: none;">${calories}</span>
                  <span class="calories-sub">VND</span>
                </div>

                <span class="note-ne" style="display: none;">${note}</span>

                <div style="height: 100%">
                  <button class="remove-btn">X</button>
                </div>`
              cartRow.innerHTML = cartRowContent;
              cartRow.classList.add("cart-row");
              var cartItems = document.getElementsByClassName("new-div")[0];
              cartItems.appendChild(cartRow);
              cartRow.getElementsByClassName("remove-btn")[0].addEventListener("click", removeCartItem);
              cartRow.getElementsByClassName("gram")[0].addEventListener("change", quantityChanged);
              updateCartTotal();
              popUpCart.parentElement.remove();
              document.getElementsByClassName("black-img-pop-up")[0].style.display = "none";
              // compareTotalvsRec();
            });
          }
        }
        
        function forFffun(value){
          var quantity = parseFloat(value);
          var price = parseFloat(document.getElementsByClassName("price-product-fixed")[0].innerHTML);
          document.getElementsByClassName("price-product")[0].innerHTML = price * quantity + " ";
        }

        
  
    </script>

    <!-- End JS -->


     <?php 
    require "footer.php" ?>

    