<?php
// Include constant variable from helper/CONSTANT.php
include 'constant.php';
// Create mysql connection using mysqli function
// Using constants as parameters
$con = mysqli_connect(HOST,UNAME,PASS,DB);

// Check connection
  if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>