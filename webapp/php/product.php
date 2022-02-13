<?php
  include_once ("../dbconnect.php");
  session_start();
  if (isset($_SESSION['sessionid'])){
         $useremail= $_SESSION['user_email'];
  }   if (isset($_GET['submit'])){
        if ($_GET['submit'] == "cart"){
          if(!empty($useremail)){
            $productid=$_GET['productid'];
            $cartqty='1';  

            $addcart="INSERT INTO `tbl_carts`(`user_email`, `product_id`, `cart_qty`) VALUES ('$useremail','$productid','$cartqty')"; 
            try{
                  $conn->exec($addcart);
                  echo "<script>alert('Cart updated')</script>";
                  echo "<script> window.location.replace('product.php')</script>";
              } catch (PDOException $e){
                  echo "<script>alert('Failed')</script>";
                  
              }
            }
          }

        }
  
  $sqlquery = "SELECT * FROM tbl_products ";
  $stmt = $conn->prepare($sqlquery);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $rows = $stmt->fetchAll();


  /*$useremail = "Guest";
  $user_name = "Guest";
  $user_phone = "-";
  if (isset($_SESSION['sessionid']))
  {
      $useremail = $_SESSION["user_email"];
      $user_name = $_SESSION["user_name"];
      $user_phone = $_SESSION["user_phone"];
  }
  $carttotal = 0;
  if (isset($_GET['submit']))
  {
      include_once ("dbconnect.php");
      if ($_GET['submit'] == "cart")
      {
          if ($useremail != "Guest")
          {
              $productid = $_GET['productid'];
              $cartqty = "1";
              $stmt = $conn->prepare("SELECT * FROM `tbl_carts` WHERE `user_email` = '$useremail' AND `productid` = '$productid'");
              $stmt->execute();
              $number_of_rows = $stmt->rowCount();
              $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $rows = $stmt->fetchAll();
              if ($number_of_rows > 0)
              {
                  foreach ($rows as $carts)
                  {
                      $cartqty = $carts['cart_qty'];
                  }
                  $cartqty = $cartqty + 1;
                  $updatecart = "UPDATE `tbl_carts` SET `cart_qty`= '$cartqty' WHERE user_email = '$useremail' AND product_id = '$productid'";
                  $conn->exec($updatecart);
                  echo "<script>alert('Cart updated')</script>";
                  echo "<script> window.location.replace('index.php')</script>";
              }
              else
              {
                  $addcart = "INSERT INTO `tbl_carts`(`user_email`, `product_id`, `cart_qty`) VALUES ('$useremail','$productid','$cartqty')";
                  try
                  {
                      $conn->exec($addcart);
                      echo "<script>alert('Success')</script>";
                      echo "<script> window.location.replace('product.php')</script>";
                  }
                  catch(PDOException $e)
                  {
                      echo "<script>alert('Failed')</script>";
                  }
              }
  
          }
          else
          {
              echo "<script>alert('Please login or register')</script>";
              echo "<script> window.location.replace('login.php')</script>";
          }
      }
      if ($_GET['submit'] == "search")
      {
          $search = $_GET['search'];
          $sqlquery = "SELECT * FROM tbl_products WHERE product_name LIKE '%$search%'";
      }
  }
  else
  {
      $sqlquery = "SELECT * FROM tbl_products WHERE id > 0";
  }
  
  $stmtqty = $conn->prepare("SELECT * FROM tbl_carts WHERE user_email = '$useremail'");
  $stmtqty->execute();
  $resultqty = $stmtqty->setFetchMode(PDO::FETCH_ASSOC);
  $rowsqty = $stmtqty->fetchAll();
  foreach ($rowsqty as $carts)
  {
      $carttotal = $carts['cart_qty'] + $carttotal;
  }
  
  $results_per_page = 10;
  if (isset($_GET['pageno']))
  {
      $pageno = (int)$_GET['pageno'];
      $page_first_result = ($pageno - 1) * $results_per_page;
  }
  else
  {
      $pageno = 1;
      $page_first_result = 0;
  }
  
  $stmt = $conn->prepare($sqlquery);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $rows = $stmt->fetchAll();
  $number_of_result = $stmt->rowCount();
  $number_of_page = ceil($number_of_result / $results_per_page);
  $sqlquery = $sqlquery . " LIMIT $page_first_result , $results_per_page";
  $stmt = $conn->prepare($sqlquery);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $rows = $stmt->fetchAll();
  
  function subString($str)
  {
      if (strlen($str) > 15)
      {
          return $substr = substr($str, 0, 15) . '...';
      }
      else
      {
          return $str;
      }
  }  */
?>

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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <a href="home.php" class="w3-bar-item w3-button">Home</a>
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
    <p class="w3-left">Pau</p>
    <p class="w3-right">
      <a href="login.php" class="w3-bar-item w3-button">Welcome   <?php echo$useremail?></a>
      <a href="mycart.php"><i class="fa fa-shopping-cart w3-margin-right" ></i></a>
      <i class="fa fa-search"></i>
    </p>
  </header>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    
      <?php
      $cart = 'cart';
          foreach ($rows as $products){
              $productid = $products['product_id'];
              $productname = $products['product_name'];
              $price = $products['price'];

              echo "<div class='w3-col l3 s6'><div class='w3-display-container'>
              <div class='w3-container w3-center'>
              <img class='w3-image' src=../res/images/$productid.png
              onerror=this.onerro=null; this.src='../res/images/users/profile.png style='width:267px; height:270px'></a>
              <div class='w3-display-middle w3-display-hover'>
              <a href='product.php?productid=$productid&submit=$cart' button class='w3-button w3-black')'>Add to Cart <i class='fa fa-shopping-cart'></i></a></button></div>
              <b>$productname</b><br>RM $price<br>

              </div></div></div>";
            
             }
        ?> 
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

  
<script>
 function addCart(productid) {
	jQuery.ajax({
		type: "GET",
		url: "updatecartajax.php",
		data: {
			productid: productid,
			submit: 'add',
		},
		cache: false,
		dataType: "json",
		success: function(response) {
		    var res = JSON.parse(JSON.stringify(response));
		    console.log("HELLO ");
			console.log(res.status);
			if (res.status == "success") {
			    console.log(res.data.carttotal);
				//document.getElementById("carttotalida").innerHTML = "Cart (" + res.data.carttotal + ")";
				document.getElementById("carttotalidb").innerHTML = "Cart (" + res.data.carttotal + ")";
				alert("Success");
			}
			if (res.status == "failed") {
			    alert("Please login/register account");
			}
			

		}
	});
}
</script>

</body>
</html>
