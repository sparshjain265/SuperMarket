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
<h2 >Insert Electronics Department </h2>
<br>
 <form name="myForm"  method="post" action = "electronics.php" method = "post">
 <div class="form-group">
    <label>Product ID</label>
    <input type="text" class="form-control" name="productID"  placeholder="Product Id">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Power Rating</label>
    <input type="text" class="form-control" name="powerRating"  placeholder="powerRating">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Warranty</label>
    <input type="text" class="form-control" name="warranty" placeholder="warranty">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group" >
        <label for="Comment">Details</label>
        <textarea class="form-control" rows="5" id="user-message" name = "details" placeholer = "Limit 100">Limit 100</textarea>
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['productID'])){
		$productID = stripslashes($_REQUEST['productID']); // removes backslashes
    $productID= mysqli_real_escape_string($con,$productID); //escapes special characters in a string
		$powerRating = stripslashes($_REQUEST['powerRating']);
    $powerRating = mysqli_real_escape_string($con,$powerRating);
		$warranty = stripslashes($_REQUEST['warranty']);
    $warranty = mysqli_real_escape_string($con,$warranty);

    $details = stripslashes($_REQUEST['details']);
    $details = mysqli_real_escape_string($con,$details);

    
  	$query = "INSERT into `electronics` (productID,powerRating,warranty,details) VALUES ('$productID','$powerRating','$warranty', '$details')";
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
