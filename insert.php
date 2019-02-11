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
    <a class='active' href='insert.php'>Insert</a>
    <a href="#">Department</a>
    <a href='#'>Sales</a>
  </div>
</div>
<div class="container">
<h2 >Insert Product </h2>
<br>
 <form name="myForm"  method="post" action = "insert.php" method = "post">
 <div class="form-group">
    <label>Product ID</label>
    <input type="text" class="form-control" name="productId"  placeholder="Product Id">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Product Name</label>
    <input type="text" class="form-control" name="productName"  placeholder="Product Name">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Brand Name</label>
    <input type="text" class="form-control" name="brandName" placeholder="Brand Name">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Department Name</label>
    <input type="text" class="form-control" name="departmentName" placeholder="Department Name">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">CostPrice</label>
    <input type="text" class="form-control" name="costPrice" placeholder="costPrice">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">MRP</label>
    <input type="text" class="form-control" name="mrp" placeholder="MRP">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Quantity in stock</label>
    <input type="text" class="form-control" name="quantity" placeholder="Quantity">
    <small id="" class="form-text text-muted"></small>
  </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['productId'])){
		$productId = stripslashes($_REQUEST['productId']); // removes backslashes
    $productId= mysqli_real_escape_string($con,$productId); //escapes special characters in a string
		$productName = stripslashes($_REQUEST['productName']);
    $productName = mysqli_real_escape_string($con,$productName);
		$brandName = stripslashes($_REQUEST['brandName']);
    $brandName = mysqli_real_escape_string($con,$brandName);

    $departmentName = stripslashes($_REQUEST['departmentName']);
    $departmentName = mysqli_real_escape_string($con,$departmentName);

    $costPrice = stripslashes($_REQUEST['costPrice']);
    $costPrice = mysqli_real_escape_string($con,$costPrice);

    $mrp = stripslashes($_REQUEST['mrp']);
    $mrp = mysqli_real_escape_string($con,$mrp);

    $quantity = stripslashes($_REQUEST['quantity']);
    $quantity = mysqli_real_escape_string($con,$quantity);

      
    
    
  	$query = "INSERT into `product` (productID,productName,brandName,departmentName,costPrice,MRP,quantityStock) VALUES ('$productId','$productName','$brandName', '$departmentName','$costPrice','$mrp','$quantity')";
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
