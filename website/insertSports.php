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
    <a class='active' href='insertSports.php'>Insert</a>
  </div>
</div>


<div class="container">
<h2 >Insert Sports </h2>
    <br>
    <form name="myForm"  method="post" action = "insertSports.php" method = "post">
    <div class="form-group">
       <label>Product ID</label>
       <input type="text" class="form-control" name="productId"  placeholder="Product Id">
       <small id="" class="form-text text-muted"></small>
     </div>
 
    <div class="form-group" >
        <label for="Comment">Warranty</label>
        <textarea class="form-control" rows="5" id="user-message" name = 'warranty' placeholer = "Limit 100">Limit 100</textarea>
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>

    <div class="form-group">
      <label for="Comment">Details</label>
      <textarea class="form-control" rows="5" id="comment" name = 'details'>Limit 200</textarea>
      <small id="" class="form-text text-muted"></small>
    </div>
  
    <div class="form-group">
      <label for="text">category</label>
      <input type="text" class="form-control" name="category" placeholder="Category">
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
        
        $warranty = stripslashes($_REQUEST['warranty']); // removes backslashes
        $warranty= mysqli_real_escape_string($con,$warranty);
        
        $details = stripslashes($_REQUEST['details']); // removes backslashes
        $details = mysqli_real_escape_string($con,$details);

        $category = stripslashes($_REQUEST['category']); // removes backslashes
        $category= mysqli_real_escape_string($con,$category);

    
  	$query = "INSERT into `sports` (productID,warranty , details , category ) VALUES ('$productId','$warranty','$details', '$category')";
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
