<?php
     if(isset($_POST["submit"])){
        include_once("../dbconnect.php");
        $productid=$_POST["productid"];
        $name=$_POST["name"];
        $price=$_POST["price"];
        $sqlregister = "INSERT INTO `tbl_products`(`productid`, `name`, `price`) VALUES ('$productid', '$name',
        '$price')";
        try{
            $conn->exec($sqlregister);
            if (file_exists($_FILES["fileToUpload"]["tmp_name"]) || is_uploaded_file($_FILES["fileToUpload"]["tmp_name"])){
                uploadImage($productid);
                echo "<script>alert('Registration successful')</script>";
                echo "<script>window.location.replace('product.php')</script>";
            }    
            
        }catch (PDOException $e) {
                echo"<script>alert('Registration failed')</script>";
                echo "<script>window.location.replace('newcustomer.php')</script>";
            }
    }

        function uploadImage($id){
            $target_dir = "../res/images/";
            $target_file = $target_dir . $id . ".png";
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>MeiJi</title>
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
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b>MeiJi Food
    </b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button">Home</a>
    <a href="product.php" class="w3-bar-item w3-button">Products</a>

  </div>
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
    <p class="w3-left">New Products</p>
    <p class="w3-right">
      <i class="fa fa-shopping-cart w3-margin-right"></i>
      <i class="fa fa-search"></i>
    </p>
  </header>

  <!-- Product form -->
  <div class="w3-container w3-padding-64 form-container">
        <div class="w3-card">
            <div class="w3-container w3-black">
                <p>New Product Registration</p>
            </div>
            <form class="w3-container w3-padding " name="registerForm" action="newproduct.php" method="post" onsubmit="return confirmDialog()" enctype="multipart/form-data">
                <div class="w3-container w3-border w3-center w3-padding">
                    <img class="w3-image w3-round w3-margin"
                    src="../res/images/profile.png" style="width:100%;
                    max-width:600px"><br>
                    <input type="file" onchange="previewFile()" name="fileToUpload"
                    id="fileToUpload"><br>
                </div>

                <p>
                    <label>Product ID</label>
                    <input class="w3-input w3-border w3-round" name="productid" id="idproductid"
                    type="text" required>
                </p>

                <p>
                    <label>Food Name</label>
                    <input class="w3-input w3-border w3-round" name="name" id="idname"
                    type="text" required>
                </p>

                <p>
                    <label>Price</label>
                    <input class="w3-input w3-border w3-round" name="price" id="idprice"
                    type="double" required>
                </p>

                <div class="row">
                    <input class="w3-input w3-border w3-block w3-black w3-round" type="submit" 
                    name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
  
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
