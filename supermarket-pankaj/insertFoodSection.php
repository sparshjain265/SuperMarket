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
    <a  href='index.php'>Products</a>
    <a class='active' href='insertFoodSection.php'>Insert</a>
  </div>
</div>


<div class="container">
<h2 >Insert Food Section </h2>
    <br>
    <form name="myForm"  method="post" action = "insertFoodSection.php" method = "post">
    <div class="form-group">
       <label>Product ID</label>
       <input type="text" class="form-control" name="productId"  placeholder="Product Id">
       <small id="" class="form-text text-muted"></small>
     </div>
 
    <div class="form-group">
    <label for="date">Manfufacture Date</label>
    <input type="date" class="form-control" name="manufactureDate"  placeholder="Manufacture Date">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="date">Expiry Date</label>
    <input type="date" class="form-control" name="expiryDate" placeholder="Expiry Date">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="text">quanity</label>
    <input type="text" class="form-control" name="quantity" placeholder="Quantity">
    <small id="" class="form-text text-muted"></small>
  </div>  
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['productId']))
    {
		$productId = stripslashes($_REQUEST['productId']); // removes backslashes
        $productId= mysqli_real_escape_string($con,$productId); //escapes special characters in a string
        
        $manufactureDate = stripslashes($_REQUEST['manufactureDate']);
        $manufactureDate = date("Y-m-d", strtotime($manufactureDate));
        
        $expiryDate = stripslashes($_REQUEST['expiryDate']);
        $expiryDate = date("Y-m-d", strtotime($expiryDate));

        $quantity = stripslashes($_REQUEST['quantity']);
        $quantity = mysqli_real_escape_string($con,$quantity);
    
  	$query = "INSERT into `foodSection` (productID,manufactureDate,expiryDate,quantity) VALUES ('$productId','$manufactureDate','$expiryDate', '$quantity')";
    $result = mysqli_query($con,$query);
        if($result){
          echo "success";
          session_unset();
          } 
          else 
          {
            echo "fail";
            echo("Error description: " . mysqli_error($con));
          }
      
      }
   ?>
