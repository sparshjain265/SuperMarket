<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Super Market</title>
<link rel="stylesheet" href="style.css"/>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>

</script>
<style>
  body {
  background-color: dodgerblue;
  font-family: "Helvetica Neue", Helvetica, Arial;
  padding-top: 20px;
}
</style>
	</head>
<body  >

<div class="header">
  </div>
</div>
<div class="container">
<h2 >Register form</h2>
<br>
 <form name="myForm"  method="post" action = "register.php" method = "post">
 <div class="form-group">
    <label for="name">Role</label>
    <input type="text" class="form-control" name="role"  placeholder="Name">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">User ID</label>
    <input type="text" class="form-control" name="user_id" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="password2" placeholder="Password">
    <small id="" class="form-text text-muted"></small>
  </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      <a href="login.php" >Login<a>
      </div>
      <?php
  require('config.php');
  $red_flag=0;
 
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['role'])){
		$role = stripslashes($_REQUEST['role']); // removes backslashes
    $role = mysqli_real_escape_string($con,$role); //escapes special characters in a string
		$user_id = stripslashes($_REQUEST['user_id']);
    $user_id = mysqli_real_escape_string($con,$user_id);
		$password = stripslashes($_REQUEST['password']);
    $password= mysqli_real_escape_string($con,$password);
    $password2= stripslashes($_REQUEST['password2']);
    $password2= mysqli_real_escape_string($con,$password2);
    if($password==$password2)
    {
     // echo "$password , $password2";
    $hashed_password =password_hash($password, PASSWORD_DEFAULT);
    if($red_flag==0)
    {
  	$query = "INSERT into `user_info` (user_id,password,role) VALUES ('$user_id','$password','$role')";
    $result = mysqli_query($con,$query);
        if($result){
          echo "success";
          session_unset();
/*
// destroy the session
        session_destroy();
        session_start();
          $sql = "SELECT * FROM user_info WHERE email = '$email'and password ='$hashed_password'";
          $run_query = mysqli_query($con,$sql);
          if(mysqli_num_rows($run_query) > 0)
          {
              $row = mysqli_fetch_array($run_query);
              $name1   = $row['name'];
              $_SESSION["name1"] = $row['name'];
              $_SESSION["login"] = true;
              $_SESSION["user_id"] =$row['user_id'];
              header( "Location:user.php" ); die;
          
              echo "$name1";
              
              
          } */
      
      }
      else{
        echo"<script>alert('password doesn't match')</script>";
      }
  }
    else{
       echo"<script>alert('password doesn't match')</script>";
    }
  }
   
       
    }
   ?>
