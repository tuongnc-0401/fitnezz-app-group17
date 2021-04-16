<?php 
  require "header.php";
  $cate = 4;
  $query_for_grain = "select * from ingredients where in_cat = '$cate';";
  $result_for_grain = mysqli_query($conn, $query_for_grain);
  $dairy = 3;
  $user = $_SESSION['userId'];
  $query_for_dairy = "select * from ingredients where in_cat = '$dairy'";
  $result_for_dairy = mysqli_query($conn, $query_for_dairy);
  $result_for_fruit = mysqli_query($conn, "select * from ingredients where in_cat = 1");
  $result_for_proteins = mysqli_query($conn, "select * from ingredients where in_cat = 5");
  $result_for_vegetable = mysqli_query($conn, "select * from ingredients where in_cat = 2");
  $result_for_cal = mysqli_query($conn, "select calo from product_status where status_id = (select statusBMI from ibm where idUsers = $user order by idBMI desc limit 1)");
 ?>   
    <!-- END header -->
    

    <div class="minimize-btn" id="minimize-btn" style="display: none;">
      <button type="button" class="btn btn-danger" style="cursor: pointer;display: flex;
          justify-content: center;
          align-items: center;
          position: fixed;
          top: 326px;
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

    <div class="big-new-div" id="big-new-div" style="display: none;background-color: #1e1f29;">
      <div class="new-div" id="new-div" style="background-image: url('img/hehe.jpg');background-position: center;background-size: cover;">
        <div class="div-under">

        </div>
      </div>
        <div id="total-calories">
          <div class="div1" >
            <span style="font-weight: bold;">Total: </span>
            <span class="cart-total-calories"></span>
          </div>

          <div class="div2" style="color: white;">
          <?php 
        
          while(list($cal) = mysqli_fetch_array($result_for_cal)){
          
          ?>
            Rec: <span class="recom"><?php echo $cal ?>
                  </span>
                  <span> kcal</span>
          <?php 
        
            }

          ?>
          </div>
          
        </div>
    </div>
    

    <div class="new-div-filter" id="new-div-filter" style="display: none;background-image: url('img/hehe.jpg');background-position: center;background-size: cover;">

        <button class="btn btn-primary cart-row-filter" id='all' onclick="clickAll(); "> Show all</button>
        <button class="btn btn-primary cart-row-filter" id='grain1' onclick="clickGrain(); "> Grain</button>
        <button class="btn btn-primary cart-row-filter" id='dairy1' onclick="clickDairy(); "> Dairy</button>
        <button class="btn btn-primary cart-row-filter" id='fruit1' onclick="clickFruit(); "> Fruit</button>
        <button class="btn btn-primary cart-row-filter" id='vegetable1' onclick="clickVegetable(); "> Vegetable</button>
        <button class="btn btn-primary cart-row-filter" id='protein1' onclick="clickProtein();"> Protein</button>
        <label style="background-color: black;">
          <h5 style="font-weight:bold; color: white" id="myInput">Search(ingredient):</h5>
          <div class="row form-group has-search" style="width:100%;">
            <div class="col-md-12" style="width:100%; height: 20px; margin-bottom:5px">
              <!-- <span class="fa fa-search form-control-feedback" style="height:1px"></span>
              <input class="input form-control" id="filter_letter" style="height: 10%" onkeyup="searchBar()" placeholder="Search here"> -->
              <form class="form-inline active-cyan-4">
                <input class="form-control form-control-sm mr-3 w-75" onclick="hello()" onkeyup="searchBar()" id="filter_letter" type="text" style="height:20%; margin-left: 5px;" placeholder="Search"
                  aria-label="Search">
                <i class="fas fa-search" aria-hidden="true"></i>
              </form>
            </div>


          </div>

        </label>
    </div>

    <section class="home-slider-loop-false  inner-page owl-carousel" >
      <div class="slider-item" style="background-image: url('img/slider-1.jpg');top: 100px;">
        <div class="container">
          <div class="row slider-text align-items-center justify-content-center">
            <div class="col-md-8 text-center col-sm-12 element-animate">
              <h1>Ingredient Menu</h1>
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

    
    <section class="section element-animate" style="padding-top: 0;margin-top: 60px;" id="grain">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Grains</h2>
              <span class="back-text">Grains</span>
            </div>
          </div>
        </div>
      </div>


       <div class="container" >

        <div class="row">
        <?php 
        
          while(list($in_id, $in_name, $in_img, $ing_calo_1g, $in_detail, $in_cat) = mysqli_fetch_array($result_for_grain)){
          
        ?>



         

          <div class="col-md-6 mb-4">
            <div class="blog d-block d-lg-flex" style="width: 540px;height:278px;">
              <div class="bg-image" style="background-image: url('img/ingredients/<?php echo $in_img?>');"></div>
              <div class="url-img" style="display: none;">img/ingredients/<?php echo $in_img?></div>
              <div class="text">
                <h3 class="title"><?php echo $in_name?></h3>
                <p class="sched-time">
                  <span><i class="fas fa-balance-scale"></i> <span class="calo" ><?php echo $ing_calo_1g?></span> kcal/gam</span> <br>
                </p>
                <p style="width:210px;height:110px;overflow-y:scroll"><?php echo $in_detail?></p>

                <p>
                  <button class="btn btn-primary btn-sm" id="<?php echo $in_name?>">Add to cart</button>
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


    <section class="section element-animate" style="padding-top: 0;margin-top: 60px;margin-left:60px;margin-right:60px" id="dairy">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Dairy</h2>
              <span class="back-text">Dairy</span>
            </div>
          </div>
        </div>
      </div>


       <div class="container" >

       <div class="row">
        <?php 
          while(list($in_id2, $in_name2, $in_img2, $ing_calo_1g2, $in_detail2, $in_cat2) = mysqli_fetch_array($result_for_dairy)){

        ?>



         <?php if($count1 %2 != 0 ) { echo '<div>';echo '<div class="row">';}?> 

          <div class="col-md-6 mb-4">
            <div class="blog d-block d-lg-flex" style="width: 540px;height:278px;">
            <div class="bg-image" style="background-image: url('img/ingredients/<?php echo $in_img2?>');"></div>
              <div class="url-img" style="display: none;">img/ingredients/<?php echo $in_img2?></div>
              <div class="text">
                <h3 class="title"><?php echo $in_name2?></h3>
                <p class="sched-time">
                  <span><i class="fas fa-balance-scale"></i> <span class="calo" ><?php echo $ing_calo_1g2?></span> kcal/gam</span> <br>
                </p>
                <p style="width:210px;height:110px;overflow-y:scroll"><?php echo $in_detail2?></p>

                <p>
                  <button class="btn btn-primary btn-sm" id="<?php echo $in_name2?>" >Add to cart</button>
                </p>

              </div>

            </div>
          </div>
        <?php 
      
          }

        ?></div>
      </div>

    </section>

    <section class="section element-animate" style="padding-top: 0;margin-top: 60px;margin-left:60px;margin-right:60px" id="fruit">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Fruits</h2>
              <span class="back-text">Fruits</span>
            </div>
          </div>
        </div>
      </div>


       <div class="container" >
         <div class="row">

        <?php 

          while(list($in_id3, $in_name3, $in_img3, $ing_calo_1g3, $in_detail3, $in_cat3) = mysqli_fetch_array($result_for_fruit)){
        ?>



         <?php if($count2 %2 != 0 ) { echo '<div>';echo '<div class="row">';}?> 

          <div class="col-md-6 mb-4">
            <div class="blog d-block d-lg-flex" style="width: 540px;height:278px;">
              <div class="bg-image" style="background-image: url('img/ingredients/<?php echo $in_img3?>');"></div>
              <div class="url-img" style="display: none;">img/ingredients/<?php echo $in_img3?></div>
              <div class="text">
                <h3 class="title" ><?php echo $in_name3?></h3>
                <p class="sched-time">
                  <span><i class="fas fa-balance-scale"></i> <span class="calo" ><?php echo $ing_calo_1g3?></span> kcal/gam</span> <br>
                  
                </p>
                <p style="width:210px;height:110px;overflow-y:scroll"><?php echo $in_detail3?></p>

                <p>
                  <button class="btn btn-primary btn-sm" id="<?php echo $in_name3?>" >Add to cart</button>
                </p>

              </div>

            </div>
          </div>
        <?php 
      
          }

        ?></div>
      </div>
    </section>

    <section class="section element-animate" id="protein" style="padding-top: 0;margin-top: 60px;margin-left:60px;margin-right:60px">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Protein</h2>
              <span class="back-text">Protein</span>
            </div>
          </div>
        </div>
      </div>


       <div class="container" >
        <div class="row">
        <?php 
        
          while(list($in_id4, $in_name4, $in_img4, $ing_calo_1g4, $in_detail4, $in_cat4) = mysqli_fetch_array($result_for_proteins)){
          
        ?>



         

          <div class="col-md-6 mb-4">
            <div class="blog d-block d-lg-flex" style="width: 540px;height:278px;">
              <div class="bg-image" style="background-image: url('img/ingredients/<?php echo $in_img4?>');"></div>
              <div class="url-img" style="display: none;">img/ingredients/<?php echo $in_img4?></div>
              <div class="text">
                <h3 class="title" ><?php echo $in_name4?></h3>
                <p class="sched-time">
                  <span><i class="fas fa-balance-scale"></i> <span class="calo" ><?php echo $ing_calo_1g4?></span> kcal/gam</span> <br>
                </p>
                <p style="width:210px;height:110px;overflow-y:scroll"><?php echo $in_detail4?></p>

                <p>
                  <button class="btn btn-primary btn-sm" id="<?php echo $in_name4?>">Add to cart</button>
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

    <section class="section element-animate" id="vegetable" style="padding-top: 0;margin-top: 60px;margin-left:60px;margin-right:60px">
      <div class="clearfix mb-5 pb-5">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 text-center heading-wrap">
              <h2>Vegetable</h2>
              <span class="back-text">Vegetable</span>
            </div>
          </div>
        </div>
      </div>


       <div class="container" >
          <div class="row">
        <?php 
        
          while(list($in_id5, $in_name5, $in_img5, $ing_calo_1g5, $in_detail5, $in_cat5) = mysqli_fetch_array($result_for_vegetable)){
          
        ?>
          <div class="col-md-6 mb-4">
            <div class="blog d-block d-lg-flex" style="width: 540px;height:278px;">
              <div class="bg-image" style="background-image: url('img/ingredients/<?php echo $in_img5?>');"></div>
              <div class="url-img" style="display: none;">img/ingredients/<?php echo $in_img5?></div>
              <div class="text">
                <h3 class="title" ><?php echo $in_name5?></h3>
                <p class="sched-time">
                  <span><i class="fas fa-balance-scale"></i> <span class="calo" ><?php echo $ing_calo_1g5?></span> kcal/gam</span> <br>
                </p>
                <p style="width:210px;height:110px;overflow-y:scroll"><?php echo $in_detail5?></p>

                <p>
                  <button class="btn btn-primary btn-sm" id="<?php echo $in_name5?>">Add to cart</button>
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
        if(document.readyState == "loading"){
          document.addEventListener("DOMContentLoaded", ready);
        }else{
          ready();
        }
        function hover() {
          document.getElementById('huy1').style.display = "block";
          document.getElementById('huy').style.display = "none";
        }
        
        function offHover() {
          document.getElementById('huy1').style.display = "none";
          document.getElementById('huy').style.display = "block";
        }

        document.getElementById("new-div").style.display = "none";

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
        
        // Add to cart section
        if(document.readyState == "loading"){
          document.addEventListener("DOMContentLoaded", ready);
        }else{
          ready();
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
            button.addEventListener("click", addToCartClicked);
          }

          compareTotalvsRec();
        }


        function removeCartItemUpdate(btn){
          //take name's product in cart
          var cartRow = btn.parentElement.parentElement;
          var titleInCart = cartRow.getElementsByClassName("name")[0].innerHTML;

          //take name's product in menu 
          var titles = document.getElementsByClassName("title");
          for (let i = 0; i < titles.length; i++) {
            var title = titles[i];
            title = title.innerHTML;
            if (title == titleInCart) {
              var change = document.getElementById(title);
              change.style.backgroundColor = "#f73471";
              change.style.borderColor = "#f73471";
              change.innerHTML = "Add to cart";
            }
          }
        }
        

        //remove cart item
        function removeCartItem(event){
          var removeButtonClicked = event.target;
          removeCartItemUpdate(removeButtonClicked);
          removeButtonClicked.parentElement.parentElement.remove();
          updateCartTotal(); 
          compareTotalvsRec();
        }

        //quantity gram changed mini
        function quantityChangedMini(input){
          var cartRow = input.parentElement.parentElement;
          var inputValue = parseFloat(cartRow.getElementsByClassName("gram")[0].value);
          var calories = parseFloat(cartRow.getElementsByClassName("calories-fixed")[0].innerHTML);
          var sum = inputValue * calories;
          cartRow.getElementsByClassName("calories")[0].innerHTML = sum;
        }


        //quantity gram changed
        function quantityChanged(event){
          var input = event.target;
          quantityChangedMini(input);
          updateCartTotal();
          compareTotalvsRec();
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
          total = total.toFixed(2);
          document.getElementsByClassName("cart-total-calories")[0].innerHTML = total + " kcal";

          
        }

        function addToCartClicked(event){
          var button = event.target;
          // take info
          var fullInfo = button.parentElement.parentElement;
          var name = fullInfo.getElementsByClassName("title")[0].innerHTML;
          var calories = parseFloat(fullInfo.getElementsByClassName("calo")[0].innerHTML);
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
              <input type="number" class="gram" name="tentacles" value="1" min="1" max="100">
            </div>
  
            <div class="col-end">
              <span class="calories">${calories}</span>
              <span class="calories-fixed" style="display: none;">${calories}</span>
              <span class="calories-sub">kcal</span>
            </div>
  
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
          compareTotalvsRec();
        }

        var today  = new Date();
        console.log(today.toLocaleDateString("en-US"));

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
          window.scrollTo(0,document.body.scrollHeight);
          if(newDiv.style.display == "none"){
            newDiv.style.display = "flex";

            // document.getElementsByClassName("minimize-btn-filter").style.display = "flex";
            document.getElementById('idForFilter2').style.display = "none";
            document.getElementById('minimize-btn-filter').style.display = "flex";

          }
          window.scrollTo({top: 0, behavior: 'smooth'});
        }
        document.getElementById('idForFilter2').addEventListener('click', openNewDivFilter);

        function clickAll(){
          var huy = document.getElementsByClassName('section element-animate');
          for (let x of huy){
            console.log(x);
            x.style.display = "block";
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 430;
          }
          
          var arr = document.getElementsByClassName('col-md-6 mb-4');
          for(let i = 0; i < arr.length; i++){
            arr[i].style.display = "flex";
          }
          document.getElementById('filter_letter').value = "";

        }
        function clickGrain(){
          var huy = document.getElementsByClassName('section element-animate');
          for (let x of huy){
            console.log(x);
            if (x.id == "grain") {
              x.style.display = "block";
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 430;
            } else {
              x.style.display = "none";
              console.log(x.className);
            }
          }

          var arr = document.getElementById("grain").getElementsByClassName('col-md-6 mb-4');
          for(let i = 0; i < arr.length; i++){
            arr[i].style.display = "flex";
          }
          document.getElementById('filter_letter').value = "";
        }
        function clickDairy(){
          var huy = document.getElementsByClassName('section element-animate');
          for (let x of huy){
            if (x.id == "dairy") {
              x.style.display = "block";
              console.log(x.id);
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 430;
            } else {
              x.style.display = "none";
              console.log(x.id);
            }
          }
          var arr = document.getElementById("dairy").getElementsByClassName('col-md-6 mb-4');
          for(let i = 0; i < arr.length; i++){
            arr[i].style.display = "flex";
          }
          document.getElementById('filter_letter').value = "";
        }
        function clickFruit(){
          var huy = document.getElementsByClassName('section element-animate');
          for (let x of huy){
            if (x.id == "fruit") {
              x.style.display = "block";
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 430;
            } else {
              x.style.display = "none";
              console.log(x.id);
            }
          }
          var arr = document.getElementById("fruit").getElementsByClassName('col-md-6 mb-4');
          for(let i = 0; i < arr.length; i++){
            arr[i].style.display = "flex";
          }
          document.getElementById('filter_letter').value = "";
        }
        function clickProtein(){
          var huy = document.getElementsByClassName('section element-animate');
          for (let x of huy){
            if (x.id == "protein") {
              x.style.display = "block";
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 430;
            } else {
              x.style.display = "none";
              console.log(x.id);
            }
          }
          var arr = document.getElementById("protein").getElementsByClassName('col-md-6 mb-4');
          for(let i = 0; i < arr.length; i++){
            arr[i].style.display = "flex";
          }
          document.getElementById('filter_letter').value = "";
        }
        function clickVegetable(){
          var huy = document.getElementsByClassName('section element-animate');
          for (let x of huy){
            if (x.id == "vegetable") {
              x.style.display = "block";
              document.body.scrollTop = 0;
              document.documentElement.scrollTop = 430;
            } else {
              x.style.display = "none";
              console.log(x.id);
            }
          }
          var arr = document.getElementById("vegetable").getElementsByClassName('col-md-6 mb-4');
          for(let i = 0; i < arr.length; i++){
            arr[i].style.display = "flex";
          }
          document.getElementById('filter_letter').value = "";
        }
        function searchBar() {
          var filter = document.getElementById('filter_letter').value.toUpperCase();
          console.log(filter);
          var myproduct = document.getElementsByClassName('col-md-6 mb-4');
          for (var i = 0; i < myproduct.length; i++) {
            var div = myproduct[i].getElementsByClassName('title')[0];
            if (div) {
              var textvalue = div.innerHTML;
              if (textvalue.toUpperCase().indexOf(filter) > -1) {
                myproduct[i].style.display = "block";
              } else {
                myproduct[i].style.display = "none";
              }
            }
          }
          var divGrain = document.getElementById('grain');
          var hoangTuan = divGrain.getElementsByClassName('col-md-6 mb-4');
          var count = 0;
            for (var i= 0; i < hoangTuan.length; i++){
              var divBu = hoangTuan[i];
              console.log(divBu);
              if (divBu.style.display != "none"){
                count++;
              }
            }
          if (count == 0){
            divGrain.style.display = "none";
          }else{
            divGrain.style.display = "block";
          }

          var divDairy = document.getElementById('dairy');
          var hoangTuan1 = divDairy.getElementsByClassName('col-md-6 mb-4');
          var count1 = 0;
          for (var i= 0; i < hoangTuan1.length; i++){
            var divBu = hoangTuan1[i];
            console.log(divBu);
            if (divBu.style.display != "none"){
              count1++;
            }
          }
          if (count1 == 0){
            divDairy.style.display = "none";
          }else{
            divDairy.style.display = "block";
          }

          var divVegetable = document.getElementById('vegetable');
          var hoangTuan2 = divVegetable.getElementsByClassName('col-md-6 mb-4');
          var count2 = 0;
          for (var i= 0; i < hoangTuan2.length; i++){
            var divBu = hoangTuan2[i];
            console.log(divBu);
            if (divBu.style.display != "none"){
              count2++;
            }
          }
          if (count2 == 0){
            divVegetable.style.display = "none";
          }else{
            divVegetable.style.display = "block";
          }
         
          var divFruit = document.getElementById('fruit');
          var hoangTuan3 = divFruit.getElementsByClassName('col-md-6 mb-4');
          var count3 = 0;
          for (var i= 0; i < hoangTuan3.length; i++){
            var divBu = hoangTuan3[i];
            console.log(divBu);
            if (divBu.style.display != "none"){
              count3++;
            }
          }
          if (count3 == 0){
            divFruit.style.display = "none";
          }else{
            divFruit.style.display = "block";
          }

          var divProtein = document.getElementById('protein');
          var hoangTuan4 = divProtein.getElementsByClassName('col-md-6 mb-4');
          var count4 = 0;
          for (var i= 0; i < hoangTuan4.length; i++){
            var divBu = hoangTuan4[i];
            console.log(divBu);
            if (divBu.style.display != "none"){
              count4++;
            }
          }
          if (count4 == 0){
            divProtein.style.display = "none";
          }else{
            divProtein.style.display = "block";
          }

          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 430;
          
        }
        

        //huy nho's section
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

    </script>

    <!-- End JS -->


     <?php 
    require "footer.php" ?>

    