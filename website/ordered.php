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
<h2 >Insert Ordered </h2>
<br>
 <form name="myForm"  method="post" action = "ordered.php" method = "post">
 <div class="form-group">
    <label>Order ID</label>
    <input type="text" class="form-control" name="orderID"  placeholder="orderID">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Supplier ID</label>
    <input type="text" class="form-control" name="supplierID"  placeholder="supplierID">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Product ID</label>
    <input type="text" class="form-control" name="productID" placeholder="productID">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Order Date</label>
    <input type="date" class="form-control" name="orderDate" placeholder="order Date">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Quantity Ordered</label>
    <input type="text" class="form-control" name="quantityOrdered" placeholder="quantityOrdered">
    <small id="" class="form-text text-muted"></small>
  </div>
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['orderID'])){
		$orderID = stripslashes($_REQUEST['orderID']); // removes backslashes
    $orderID= mysqli_real_escape_string($con,$orderID); //escapes special characters in a string
		$supplierID = stripslashes($_REQUEST['supplierID']);
    $supplierID = mysqli_real_escape_string($con,$supplierID);
		$productID = stripslashes($_REQUEST['productID']);
    $productID = mysqli_real_escape_string($con,$productID);

    $orderDate = stripslashes($_REQUEST['orderDate']);
    $orderDate = mysqli_real_escape_string($con,$orderDate);

    $quantityOrdered = stripslashes($_REQUEST['quantityOrdered']);
    $quantityOrdered = mysqli_real_escape_string($con,$quantityOrdered);

  


      
    
    
  	$query = "INSERT into `ordered` (orderID,supplierID,productID,orderDate,quantityOrdered) VALUES ('$orderID','$supplierID','$productID', '$orderDate','$quantityOrdered')";
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
