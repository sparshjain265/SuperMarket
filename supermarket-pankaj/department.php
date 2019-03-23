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
<h2 >Insert Department </h2>
<br>
 <form name="myForm"  method="post" action = "department.php" method = "post">
 <div class="form-group">
    <label>Department Name</label>
    <input type="text" class="form-control" name="departmentName"  placeholder="department Name">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Manager ID</label>
    <input type="text" class="form-control" name="managerID"  placeholder="manager ID">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Vacancy</label>
    <input type="text" class="form-control" name="vacancy" placeholder="vacancy">
    <small id="" class="form-text text-muted"></small>
  </div>
 
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['departmentName'])){
		$departmentName = stripslashes($_REQUEST['departmentName']); // removes backslashes
    $departmentName= mysqli_real_escape_string($con,$departmentName); //escapes special characters in a string
		$managerID = stripslashes($_REQUEST['managerID']);
    $managerID = mysqli_real_escape_string($con,$managerID);
		$vacancy = stripslashes($_REQUEST['vacancy']);
    $vacancy = mysqli_real_escape_string($con,$vacancy);

    
      
    
    
  	$query = "INSERT into `department` (departmentName,managerID,vacancy) VALUES ('$departmentName','$managerID','$vacancy')";
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
