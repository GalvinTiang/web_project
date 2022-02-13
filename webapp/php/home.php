<!DOCTYPE html>
<html lang="en">

<head>
      <title>MeiJi Product</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../style/style.css">
      <script src="../javascript/script.js"></script>
</head>      

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>MeiJi Food
    </b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Home</a>
    <a href="product.php" class="w3-bar-item w3-button">Products</a>

  </div>
  <a href="login.php" class="w3-bar-item w3-button w3-padding">Login</a> 
  <a href="#footer" class="w3-bar-item w3-button w3-padding">Contact</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'">Purchase History</a>
  <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
      Admin <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="newproduct.php" class="w3-bar-item w3-button">Add a product</a>
    </div>

</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">MeiJi Food</div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-center">Home</p>
    
    </p>
  </header>

  <!-- Product grid -->
  <div id="about" class = "w3-container w3-row w3-black w3-padding-32">
        <div class="w3-display-container w3-third w3-padding-24 w3-hide-small" style="height:300px;">
            <i class="fa fa-info-circle w3-display-middle w3-padding" style="font-size:128px;"></i>
        </div>
        <div class="w3-container w3-twothird" style="height:300px;">
            <h2>About</h2>
            <p style="font-size: 14px;">BACKGROUND & HISTORY <br> MeiJi was founded in 2002 by Tiang's Family. Focusing on the goals of "Quality, Healthy, and Tradition" the company is family operation
                making each dishes (dim sum, pau, polished glutinous rice. MeiJi has three generation of family members wroking together to fulfil the idea
                "Quality is Our Priority". Through hard work and dedication, MeiJi began building its brand around the idea of delicious in Klang Valley. </p>
        </div>
    </div>    

    <div id="products" class = "w3-container w3-row w3-cyan w3-padding-32">
        <div class="w3-container w3-twothird" style="height:300px;">
            <h2>Products</h2>
            <p style="font-size: 14px;">Every day, before dawn, without fail, MeiJi begins to grind up material with their own secret receipe, 
                roll out the dough by handmade & machine and to light the stoves to steam pau. Over the years，deliveryman delivers
                foods to cafeteria and restaurants who ordered. We take pride in satisfying our customers after having taken respite
                from their lives to truly enjoy a traditional meal reminding them of our cultural heritage.
            </p>
        </div>
        <div class="w3-display-container w3-third w3-padding-24 w3-hide-small" style="height:300px;">
            <i class="fa fa-product-hunt w3-display-middle w3-padding" style="font-size:128px;"></i>
        </div>
    </div> 

    <div id="images" class="w3-display-container w3-white" style="height:350px;">
        <img class="mySlides w3-display-middle" src="meijia.jpg" style="height:300px; width:350px;">
        <img class="mySlides w3-display-middle" src="meijib.jpg" style="height:300px; width:350px;">
        <img class="mySlides w3-display-middle" src="meijic.jpg" style="height:300px; width:350px;">
    </div>

    <script>
        var myIndex=0;
        carouse1();
        
        function carouse1(){
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i=0; i<x.length; i++){
                x[i].style.display="none";
            }
            myIndex++;
            if(myIndex> x.length){
                myIndex=1
            }
            x[myIndex-1].style.display ="block";
            setTimeout(carouse1,3000)
        }
    </script>


  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
        <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>
      </div>

      <div class="w3-col s4">
        <h4>About</h4>
        <p><a href="#">About us</a></p>
        <p><a href="#">We're hiring</a></p>
        <p><a href="#">Support</a></p>
        <p><a href="#">Find store</a></p>
        <p><a href="#">Shipment</a></p>
        <p><a href="#">Payment</a></p>
        <p><a href="#">Gift card</a></p>
        <p><a href="#">Return</a></p>
        <p><a href="#">Help</a></p>
      </div>

      <div class="w3-col s4 w3-justify w3-center">
        <h4>Store</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> Company Name</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>We accept</h4>
        <p><i class="fa fa-fw fa-cc-amex"></i> Amex</p>
        <p><i class="fa fa-fw fa-credit-card"></i> Credit Card</p>
        <br>
        <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
        <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
        <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
        <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24">Powered by <a href="" title="MeiJi" target="_blank" class="w3-hover-opacity">MeiJi</a></div>

  <!-- End page content -->
</div>

</body>
</html>
