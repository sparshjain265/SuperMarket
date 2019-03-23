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
<h2 >Insert Discount </h2>
<br>
 <form name="myForm"  method="post" action = "discount.php" method = "post">
 <div class="form-group">
    <label>Discount ID</label>
    <input type="text" class="form-control" name="discountID"  placeholder="Discount Id">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="text" class="form-control" name="amount"  placeholder="amount">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Discount Percent</label>
    <input type="text" class="form-control" name="discountPercent" placeholder="discount Percent">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valid Upto</label>
    <input type="date" class="form-control" name="ValidUpto" placeholder="discount Percent">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Details</label>
    <input type="text" class="form-control" name="details" placeholder="details">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group" >
        <label for="Comment">Terms and Conditions</label>
        <textarea class="form-control" rows="5" id="user-message" name = 'termsAndConditions' placeholer = "Limit 100">Limit 100</textarea>
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['discountID'])){
		$discountID = stripslashes($_REQUEST['discountID']); // removes backslashes
    $discountID= mysqli_real_escape_string($con,$discountID); //escapes special characters in a string
		$amount = stripslashes($_REQUEST['amount']);
    $amount = mysqli_real_escape_string($con,$amount);
		$discountPercent = stripslashes($_REQUEST['discountPercent']);
    $discountPercent = mysqli_real_escape_string($con,$discountPercent);

    $validUpto = stripslashes($_REQUEST['validUpto']);
    $validUpto = mysqli_real_escape_string($con,$validUpto);

    $details = stripslashes($_REQUEST['details']);
    $details = mysqli_real_escape_string($con,$details);

    $termsAndConditions = stripslashes($_REQUEST['termsAndConditions']);
    $termsAndConditions = mysqli_real_escape_string($con,$termsAndConditions);



      
    
    
  	$query = "INSERT into `discount` (discountID,amount,discountPercent,validUpto,details,termsAndConditions) VALUES ('$discountID','$amount','$discountPercent', '$validUpto','$details','$termsAndConditions')";
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
