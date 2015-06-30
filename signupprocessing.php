<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
include 'connectDB.php';

$username = $mobile = $password = $confirmpwd = "";


   $username = test_input($_POST["email"]);
   $mobile = test_input($_POST["mobile"]);
   $password = test_input($_POST["password"]);
   $confirmpwd = test_input($_POST["cnfmpassword"]);
   
    if ($username=='' || $mobile=='' || $password=='' || $confirmpwd=='') { 
      echo "<div id='ajax2'><p>It seems some fields are empty. Make sure all fields are filled in</p></div>";
     }
     
     // function for email validation
    $email;
    $sql = "SELECT * FROM signup";
    $result = mysqli_query($conn, $sql);
    //echo "count is: ".mysqli_num_rows($result)."<br>";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        $email = $row['email'];
        //echo 'email id is :'. $email;
         }
        }
        
    if ($email==$username) {
      //check email exists or not
      echo "email already exists";
    }
     elseif($password!=$confirmpwd) {
       //comparing password and confirm password
        echo "passwords doesn't match";
     }
    else{

       // storing values in database
      $sql = "INSERT INTO signup (email, mobile, password, cnfmpassword)
     VALUES ('$username', '$mobile', '$password','$confirmpwd')";

     if (mysqli_query($conn, $sql)) {
         echo "<div id='ajax2'><p>Thank You Successfully Registered</p></div>";
     } 
    }
      


    
   


function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

  

?>