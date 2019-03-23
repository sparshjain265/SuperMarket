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
    <a class='active' href='clothes.php'>Insert</a>
  </div>
</div>

<div class="container">
<h2 >Clothes</h2>
<br>
 <form name="myForm"  method="post" action = "clothes.php" method = "post">
 <div class="form-group">
    <label>Product ID</label>
    <input type="text" class="form-control" name="productId"  placeholder="Product Id">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <input type="text" class="form-control" name="category"  placeholder="category">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Size</label>
    <select type="text" class="form-control" name="size" placeholder="size">
      <option value = "XL"> XL</option> 
      <option value = "M"> M</option>
      <option value = "S"> S </option>
      <option value = "XXL"> XXL </option>
      </select>
      </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Season</label>
    <input type="text" class="form-control" name="season" placeholder="season">
    <small id="" class="form-text text-muted"></small>
  </div>
  
        
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['productId'])){
		$productId = stripslashes($_REQUEST['productId']); // removes backslashes
    $productId= mysqli_real_escape_string($con,$productId); //escapes special characters in a string
		$category = stripslashes($_REQUEST['category']);
    $category = mysqli_real_escape_string($con,$category);
		$size = stripslashes($_REQUEST['size']);
    $size = mysqli_real_escape_string($con,$size);

    $season = stripslashes($_REQUEST['season']);
    $season = mysqli_real_escape_string($con,$season);

      
    
    
  	$query = "INSERT into `clothes` (productID,category,size,season) VALUES ('$productId','$category','$size', '$season')";
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
