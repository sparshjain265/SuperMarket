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


<div class='header'>
  <a href=''  color="red" class='logo'>My SUPERMARKET</a>
 
  <div class='header-right'>
    <a  href='index.php'>SHOW TABLES</a>
    <a class='active' href='insert.php'>Insert</a>
  </div>
</div>

<div class="container">
<h2 >Insert Customer </h2>
<br>
 <form name="myForm"  method="post" action = "customer.php" method = "post">
 <div class="form-group">
    <label>Customer ID</label>
    <input type="text" class="form-control" name="customerID"  placeholder="Customer ID">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Customer Name</label>
    <input type="text" class="form-control" name="customerName"  placeholder="Customer Name">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number</label>
    <input type="text" class="form-control" name="phoneNo" placeholder="phoneNo">
    <small id="" class="form-text text-muted"></small>
  
  <div class="form-group">
    <label for="">Customer Address</label>
    <input type="text" class="form-control" name="customerAddress" placeholder="cystomerAddress">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">email ID</label>
    <input type="text" class="form-control" name="emailID" placeholder="emailID">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="date">Join Date</label>
    <input type="date" class="form-control" name="joinDate"  placeholder="Join Date">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Money spent</label>
    <input type="text" class="form-control" name="moneyspent" placeholder="moneyspent">
    <small id="" class="form-text text-muted"></small>
  </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['customerID'])){
		$customerID = stripslashes($_REQUEST['customerID']); // removes backslashes
    $customerID= mysqli_real_escape_string($con,$customerID); //escapes special characters in a string
		$customerName = stripslashes($_REQUEST['customerName']);
    $customerName = mysqli_real_escape_string($con,$customerName);
		$phoneNo = stripslashes($_REQUEST['phoneNo']);
    $phoneNo = mysqli_real_escape_string($con,$phoneNo);
    

    $customerAddress = stripslashes($_REQUEST['customerAddress']);
    $customerAddress = mysqli_real_escape_string($con,$customerAddress);

    $emailID = stripslashes($_REQUEST['emailID']);
    $emailID = mysqli_real_escape_string($con,$emailID);

    $joinDate = stripslashes($_REQUEST['joinDate']);
    $joinDate = mysqli_real_escape_string($con,$joinDate);

    $moneySpent = stripslashes($_REQUEST['moneySpent']);
    $moneySpent = mysqli_real_escape_string($con,$moneySpent);

      
    
    
  	$query = "INSERT into `customer` (customerID,customerName,phoneNo,customerAddress,emailID,joinDate,moneySpent) VALUES ('$customerID','$customerName','$phoneNo', '$customerAddress','$emailID','$joinDate','$moneySpent')";
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
