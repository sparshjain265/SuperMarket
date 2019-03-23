<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8"> 
  </head>
<title>My Supermarket</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php

require('config.php');
?>

<div class='header'>
  <a href=''  color="red" class='logo'>My SUPERMARKET</a>
 
  <div class='header-right'>
    <a  href='index.php'>SHOW TABLES</a>
    <a class='active' href='insert.php'>Insert</a>
  </div>
</div>

<div class="container">
<h2 >Insert Bill </h2>
<br>
 <form name="myForm"  method="post" action = "insert.php" method = "post">
 <div class="form-group">
    <label>Bill NO</label>
    <input type="text" class="form-control" name="billNo"  placeholder="Bill no">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Bill Date</label>
    <input type="text" class="form-control" name="billDate"  placeholder="Bill Date">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="text" class="form-control" name="amount" placeholder="Amount">
    <small id="" class="form-text text-muted"></small>
  </div>
  
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['billNo'])){
		$billNo = stripslashes($_REQUEST['billNo']); // removes backslashes
    $billNo= mysqli_real_escape_string($con,$billNo); //escapes special characters in a string
		$billDate = stripslashes($_REQUEST['billDate']);
    $billDate = mysqli_real_escape_string($con,$billDate);
		$customerID = stripslashes($_REQUEST['customerID']);
    $customerID = mysqli_real_escape_string($con,$customerID);

    $amount = stripslashes($_REQUEST['amount']);
    $amount = mysqli_real_escape_string($con,$amount);

      
    
    
  	$query = "INSERT into `bill` (billNo,billDate,customerID,amount) VALUES ('$billNo','$billDate','$customerID', '$amount')";
    $result = mysqli_query($con,$query);
        if($result){
          echo "success";
          session_unset();
          } 
          else 
          {
            echo "fail";
          }
      
      }
   ?>
