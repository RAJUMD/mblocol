<?php

  header('Access-Control-Allow-Origin: *');
  error_reporting(0);
  

	$con=mysqli_connect("localhost","root","password","locolpages");
	if (!$con)
	{
	die('Could not connect: ' . mysqli_error($con));
    }
    


   
    $query = "SELECT areaid, areaname FROM areas"; //Write a query

	$data = mysqli_query($con,$query);  //Execute the query
	if (!$data) { // add this check.
			die('Invalid query: ' . mysql_error());
			
			} 
echo '<option value=""></option>';
   
	while($fetch_options = mysqli_fetch_array($data)) { //Loop all the options retrieved from the query
    //Added Id for Options Element
    echo '<option id ="'.$fetch_options['1'].'"  value="'.$fetch_options['1'].'">'. $fetch_options['1'].'</option>';
	}
	mysqli_close($con);
	
     
?>