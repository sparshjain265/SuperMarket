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
    <a class='active' href='index.php'>Products</a>
    <a href='insert.php'>Insert</a>
    <a href="#">Department</a>
    <a href='#'>Sales</a>
  </div>
</div>

<table id='t01'>
  <tr>
      <th>ProductID</th>
    <th>ProductName</th>
    <th>BrandName</th>
    <th>DepartmentName</th>
    <th>Costprice</th>
    <th>MRP</th>
    <th>Quantity</th>
    <th>Add to cart </th>
  </tr>
  
<?php
    
          $sql = "SELECT * FROM product";
      
        $run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$productID   = $row['productID'];
			$productName  = $row['productName'];
			$brandName = $row['brandName'];
			$departmentName = $row['departmentName'];
            $costPrice = $row['costPrice'];
            $mrp = $row['MRP'];
            $quantity = $row['quantityStock'];
			echo "
      <tr>
      <td>$productID</td>
      <td>$productName</td>
      <td>$brandName</td>
      <td>$departmentName</td>
      <td>$costPrice</td>
      <td>$mrp</td>
      <td>$quantity</td>
       <td><form action='index.php' method='post'>        
      <input type = 'submit' name='$product_id' value = 'Add' />
   </form></td>    

    </tr>
			";
		}
	}
     
   
  
  echo"</table>";
      ?>
   