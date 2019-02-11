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
    <a class='active' href='insertHousehold.php'>Insert</a>
  </div>
</div>


<div class="container">
<h2 >Insert Household </h2>
    <br>
    <form name="myForm"  method="post" action = "insertHousehold.php" method = "post">
    <div class="form-group">
       <label>Product ID</label>
       <input type="text" class="form-control" name="productId"  placeholder="Product Id">
       <small id="" class="form-text text-muted"></small>
     </div>
 
    <div class="form-group">
        <label for="text">Quantity</label>
        <input type="text" class="form-control" name="quantity"  placeholder="Quantity">
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>

    <div class="form-group">
      <label for="text">Category</label>
      <input type="text" class="form-control" name="category" placeholder="category">
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
        
        $quantity = stripslashes($_REQUEST['quantity']);
        $quantity = date("Y-m-d", strtotime($quantity));
        
        $category = stripslashes($_REQUEST['category']);
        $category = date("Y-m-d", strtotime($category));

    
  	$query = "INSERT into `household` (productID,quantity , category) VALUES ('$productId','$quantity','$category')";
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
