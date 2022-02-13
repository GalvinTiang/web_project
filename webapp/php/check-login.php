<?php
      session_start();
      error_reporting(0);
      include("../dbconnect.php");

    if(isset($_POST["login"])) {
        $email= $_POST["email"];
        $_SESSION["email"]  = "$email";
        $pass = sha1($_POST["password"]);
        $_SESSION["password"]  = "$pass";
        $position = $_POST["position"];
        $_SESSION["position"]  = "$position";
        if($position == "Admin"){
            echo "<script>alert('I'm Admin'); </script>";
            $stmt = $conn->prepare("SELECT *FROM `tbl_admin` WHERE `email`='$email' AND
            `password`= '$pass'");
            $stmt->execute();
            $number_of_rows = $stmt->fetchColumn();
             if($number_of_rows  > 0){
               session_start();
               $_SESSION["sessionid"] = session_id();
               //echo "<script>alert('Login Sucess'); </script>";
               //echo "<script> window.location.replace('home.php')</script>";
               } else{
                  //echo "<script>alert('Login Failed'); </script>";
               }
         }else {
            echo "<script>alert('I'm User'); </script>";
            $stmt = $conn->prepare("SELECT *FROM `tbl_users` WHERE `user_email`='$email' AND
            `user_password`= '$pass'");
            $stmt->execute();
            $number_of_rows = $stmt->fetchColumn();
             if($number_of_rows  > 0){
               session_start();
               $_SESSION["sessionid"] = session_id();
               //echo "<script>alert('Login Sucess'); </script>";
               //echo "<script> window.location.replace('home.php')</script>";
               } else{
                  //echo "<script>alert('Login Failed'); </script>";
                  //echo "<script> window.location.replace('login.php')</script>";
               }

         }
      }      

?>