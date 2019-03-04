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
<h2 >Insert Supplier </h2>
<br>
 <form name="myForm"  method="post" action = "supplier.php" method = "post">
 <div class="form-group">
    <label>Supplier ID</label>
    <input type="text" class="form-control" name="supplierID"  placeholder="supplierID">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Supplier Name</label>
    <input type="text" class="form-control" name="supplerName"  placeholder="Name">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Phone No</label>
    <input type="text" class="form-control" name="phoneNo" placeholder="phoneNo">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Supplier Address</label>
    <input type="text" class="form-control" name="supplierAddress" placeholder="supplierAdress">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Email ID</label>
    <input type="text" class="form-control" name="emailID" placeholder="emailID">
    <small id="" class="form-text text-muted"></small>
  </div>
  
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['supplierID'])){
		$supplierID = stripslashes($_REQUEST['supplierID']); // removes backslashes
    $supplierID= mysqli_real_escape_string($con,$supplierID); //escapes special characters in a string
		$supplierName = stripslashes($_REQUEST['supplierName']);
    $supplierName = mysqli_real_escape_string($con,$supplierName);
	

    $phoneNo = stripslashes($_REQUEST['phoneNo']);
    $phoneNo = mysqli_real_escape_string($con,$phoneNo);

    $supplierAddress = stripslashes($_REQUEST['supplierAddress']);
    $supplierAddress = mysqli_real_escape_string($con,$supplierAddress);

    $emailID = stripslashes($_REQUEST['emailID']);
    $emailID = mysqli_real_escape_string($con,$emailID);

   


      
    
    
  	$query = "INSERT into `supplier` (supplierID,supplierName,phoneNo,supplierAddress,emailID) VALUES ('$supplierID','$supplierName', '$phoneNo','$supplierAddress','$emailID')";
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
