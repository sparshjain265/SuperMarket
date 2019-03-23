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
<h2 >Insert Employee </h2>
<br>
 <form name="myForm"  method="post" action = "employee.php" method = "post">
 <div class="form-group">
    <label>Employee ID</label>
    <input type="text" class="form-control" name="employeeID"  placeholder="employeeID">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">EmployeeName</label>
    <input type="text" class="form-control" name="employeeName"  placeholder="employeeName">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">DOB</label>
    <input type="text" class="form-control" name="DOB" placeholder="DOB">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone No</label>
    <input type="text" class="form-control" name="phoneNo" placeholder="phoneNo">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Employee Address</label>
    <input type="text" class="form-control" name="employeeAddress" placeholder="employeeAdress">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Email ID</label>
    <input type="text" class="form-control" name="emailID" placeholder="emailID">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">join Date</label>
    <input type="date" class="form-control" name="joinDate" placeholder="joinDate">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Salary</label>
    <input type="text" class="form-control" name="salary" placeholder="salary">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Department Name</label>
    <input type="text" class="form-control" name="departmentName" placeholder="departmentName">
    <small id="" class="form-text text-muted"></small>
  </div>
  
      <button type="submit" class="btn btn-primary" >Submit</button>
      
      <?php
  require('config.php');
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['employeeID'])){
		$employeeID = stripslashes($_REQUEST['employeeID']); // removes backslashes
    $employeeID= mysqli_real_escape_string($con,$employeeID); //escapes special characters in a string
		$employeeName = stripslashes($_REQUEST['employeeName']);
    $employeeName = mysqli_real_escape_string($con,$employeeName);
		$DOB = stripslashes($_REQUEST['DOB']);
    $DOB = mysqli_real_escape_string($con,$DOB);

    $phoneNo = stripslashes($_REQUEST['phoneNo']);
    $phoneNo = mysqli_real_escape_string($con,$phoneNo);

    $employeeAddress = stripslashes($_REQUEST['employeeAddress']);
    $employeeAddress = mysqli_real_escape_string($con,$employeeAddress);

    $emailID = stripslashes($_REQUEST['emailID']);
    $emailID = mysqli_real_escape_string($con,$emailID);

    $joinDate = stripslashes($_REQUEST['joinDate']);
    $joinDate = mysqli_real_escape_string($con,$joinDate);

    $salary = stripslashes($_REQUEST['salary ']);
    $salary = mysqli_real_escape_string($con,$salary );

    $departmentName = stripslashes($_REQUEST['departmentName']);
    $departmentName = mysqli_real_escape_string($con,$departmentName);




      
    
    
  	$query = "INSERT into `employee` (employeeID,employeeName,DOB,phoneNo,employeeAddress,emailID,joinDate,salary,departmentName) VALUES ('$employeeID','$employeeName','$DOB', '$phoneNo','$employeeAddress','$emailID',$joinDate,$salary,$departmentName)";
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
