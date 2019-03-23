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
<h2 >Insert Supplied</h2>
<br>
 <form name="myForm"  method="post" action = "supplied.php" method = "post">
 <div class="form-group">
    <label>Supply ID</label>
    <input type="text" class="form-control" name="supplyID"  placeholder="supply ID">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">order ID</label>
    <input type="text" class="form-control" name="orderID"  placeholder="order ID">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">supply Date</label>
    <input type="date" class="form-control" name="supplyDate" placeholder="supply DAte">
    <small id="" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group">
    <label for="">Quantity Supplied</label>
    <input type="text" class="form-control" name="quantitySupplied" placeholder="quantitySupplied">
    <small id="" class="form-text text-muted"></small>
  </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['supplyID'])){
		$supplyID = stripslashes($_REQUEST['supplyID']); // removes backslashes
    $supplyID= mysqli_real_escape_string($con,$supplyID); //escapes special characters in a string
		$supplyDate = stripslashes($_REQUEST['supplyDate']);
    $supplyDate = mysqli_real_escape_string($con,$supplyDate);
		$orderID = stripslashes($_REQUEST['orderID']);
    $orderID = mysqli_real_escape_string($con,$orderID);

    $quantitySupplied = stripslashes($_REQUEST['quantitySupplied']);
    $quantitySupplied = mysqli_real_escape_string($con,$quantitySupplied);

  

  


      
    
    
  	$query = "INSERT into `supplied` (supplyID,orderID,supplyDate,quantitySupplied) VALUES ('$supplyID','$orderID','$supplyDate', '$quantitySupplied')";
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
