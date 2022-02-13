<?php
    include '../dbconnect.php';
    if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $pass = sha1($_POST["password"]);
    $stmt = $conn->prepare("SELECT *FROM `tbl_users` WHERE `user_email`='$email' AND `user_password`= '$pass'");
    $stmt->execute();
    $number_of_rows = $stmt->rowCount();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows = $stmt->fetchAll();
    if ($number_of_rows  > 0) {
        foreach ($rows as $user)
        {
            $user_name = $user['user_name'];
            $user_phone = $user['user_phone'];
        }
        session_start();
        $_SESSION["sessionid"] = session_id();
        $_SESSION["user_email"] = $email;
        $_SESSION["user_name"] = $user_name;
        $_SESSION["user_phone"] = $user_phone;
        echo "<script>alert('Login Success');</script>";
        echo "<script> window.location.replace('home.php')</script>";
    }else{
         echo "<script>alert('Login Failed');</script>";
         echo "<script> window.location.replace('login.php')</script>";
    }
}
if (isset($_POST["reset"])) {
     $email = $_POST["email"];
    sendMail($email);
     echo "<script>alert('Check your email');</script>";
     echo "<script> window.location.replace('login.php')</script>";
}

    

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
      <script src="../javascript/script.js"></script>
</head>      

<body class="w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <h3 class="w3-wide"><b>MeiJi Food
    </b></h3>
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide">MeiJi Food</div>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-center"></p>
    
  </header>
  
  <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">
         <div class="w3-row w3-card">
            <div class="w3-center w3-container">
               <h4>Login</h4>
               <form name="loginForm" class=""  method="post">
                  <p>
                     <label class="w3-text-grey">
                     <b>Email</b>
                     </label>
                     <input class="w3-input w3-border w3-round" name="email" type="email" id="idemail" required>
                  </p>
                  <p>
                     <label class="w3-text-grey">
                     <b>Password</b>
                     </label>
                     <input class="w3-input w3-border w3-round" name="password" type="password" id="idpass" required>
                  </p> 
                  <p>
                     <input class="w3-check" type="checkbox" id="idremember" name="remember" onclick="rememberMe()">
                     <label>Remember Me</label>
                  </p>
                  <p>
                     <button class="w3-btn w3-round w3-black w3-block" name="submit" value="login">Login</button>
                  </p>
               </form>
               <p><a href="register.php" style="text-decoration:none;">Dont have an account. Create here.</a><br>
               <a href="" style="text-decoration:none;" onclick="document.getElementById('id01').style.display='block';return false;">Forgot your account. Click here.</a>
               </p>
            </div>
         </div>
      </div>
      <footer class="w3-row-padding w3-padding-32">


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
