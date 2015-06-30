<?php
   header('Access-Control-Allow-Origin: *');
   error_reporting(0);
   include 'connectDB.php';

   $username = $password = $mobile = $password1 ="";

   
      $username = test_input($_POST["email"]);
      $mobile = test_input($_POST["mobile"]);
      $password = test_input($_POST["password"]);
      if ($username==''|| $mobile=='' & $password=='') { 
      	echo "2";
      }
      else{
      $sql = "UPDATE users SET password='$password' WHERE username='$username' AND mobile='$mobile'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
       echo "0";
       
   	} else {
   	    echo "1";
   	}

      }


      
      

      echo $username;
      echo $password;
      echo $mobile;
      

   function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

?>