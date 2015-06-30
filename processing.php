<?php

  header('Access-Control-Allow-Origin: *');
  error_reporting(0);
  include 'connectDB.php';

  
  $areaname = "";
  $areaname = $_POST["area"];
   
   $areaid;
   $query = "SELECT * FROM areas WHERE areaname='$areaname'"; //Write a query
   $result = mysqli_query($conn, $query);
      //echo "count is: ".mysqli_num_rows($result)."<br>";
      if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
          $areaid = $row['areaid'];
          //echo 'user id is :'. $areaid;
           }
          }

         //now get category names
          $query1 = "SELECT * FROM categories WHERE areaid='$areaid'"; //Write a query
        $result1 = mysqli_query($conn, $query1);
      //echo "count is: ".mysqli_num_rows($result)."<br>";
       echo '<option value=""></option>';
      if (mysqli_num_rows($result1) > 0) {
          while($row = mysqli_fetch_assoc($result1)) {
          $categoryname = $row['categoryname'];
         echo '<option value="'.$row['categoryid'].'">'. $row['categoryname'].'</option>';
           }
          }
   
	

   
  

?>