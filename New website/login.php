<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Travel-oquisa</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
function validateForm() {
    
    var y = document.forms["myForm"]["email"].value;
    if (y == "") {
        alert("Email must be filled out");
        return false;
    }
    var z = document.forms["myForm"]["password"].value;
    if (z == "") {
        alert("Email must be filled out");
        return false;
    }
   
}

</script>••••
<link rel="stylesheet" href="style.css"/>
<style>
</style>
	</head>
<body>

<div class="container">
<h2 >Login form</h2>
<br>
<form name="myForm"  method="post" action = "login.php" >
  <div class="form-group">
    <label for="exampleInputEmail1">User Id</label>
    <input type="text" class="form-control" name="user_id">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <small id="" class="form-text text-muted"></small>
  </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <a href="register.php" >Register<a>
      </div>
      <?php
	require('config.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['user_id']))
    {
		$user_id = stripslashes($_REQUEST['user_id']);
		$user_id = mysqli_real_escape_string($con,$user_id);
		$password = stripslashes($_REQUEST['password']);
        $password= mysqli_real_escape_string($con,$password);
        $sql = "SELECT * FROM user_info WHERE user_id = '$user_id'";
    // echo "md5($password)";
        $run_query = mysqli_query($con,$sql);
        if(mysqli_num_rows($run_query) > 0)
        {
            $row = mysqli_fetch_array($run_query);
            $hash=$row['password'];
            $role= $row['role'];
            echo "$role";
            echo "$hash";
            if ($password==$hash)
            {
            $name1   = $row['name'];
            $_SESSION["role"] = $row['role'];
            echo "success";
            header( "Location:admin.php" ); die;
        
            //echo "$name1";
            }
            else{
               echo"<script>alert('wrong password')</script>";
            $_SESSION["name1"] = "";
            $_SESSION["login"] = false;
            $_SESSION["user_id"] =NULL;

            }
            
        } 
        else{
            echo"<script>alert('wrong password')</script>";
            $_SESSION["name1"] = "";
            $_SESSION["login"] = false;
            $_SESSION["user_id"] =NULL;
        }   
    }
   ?>
