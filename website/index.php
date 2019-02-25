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
    <a class='active' href='index.php'>SHOW TABLES</a>
    <a href='insert.php'>Insert</a>
  </div>
</div>
<form action = '#' method = 'post'>

 select TABLE:        
         <select name = 'table'>
            <option value = 'bill'>BILL</option>
            <option value = 'clothes'>CLOTHES</option>
            <option value = 'customer'>CUSTOMER</option>
            <option value = 'department'>DEPARTMENT</option>
            <option value = 'discount'>DISCOUNT</option>
            <option value = 'electronics'>ELECTRONICS</option>
            <option value = 'employee'>EMPLOYEE</option>
            <option value = 'foodSection'>FOOD SECTION</option>
            <option value = 'household'>HOUSEHOLD</option>
            <option value = 'offers'>OFFERS</option>
            <option value = 'ordered'>ORDERED</option>
            <option value = 'product'>PRODUCT</option>
            <option value = 'sales'>SALES</option>
            <option value = 'sports'>SPORTS</option>
            <option value = 'supplied'>SUPPLIED</option>
            <option value = 'supplier'>SUPPLIER</option>
         </select>
         <input type = 'submit' value = 'SHOW' />
      </form>


  
<?php
    if (isset($_REQUEST['table'])){
      $table_name = stripslashes($_REQUEST['table']); // removes backslashes
      
     
      if($table_name=='product')
      {
     echo "  <table id='t01'>
  <tr>
      <th>ProductID</th>
    <th>ProductName</th>
    <th>BrandName</th>
    <th>DepartmentName</th>
    <th>Costprice</th>
    <th>MRP</th>
    <th>Quantity</th>
  </tr>";
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

    </tr>
			";
		}
	}
     
   
  
  echo"</table>";
}

/* second table */

if($table_name=='clothes')
{
echo "  <table id='t01'>
<tr>
<th>Product ID</th>
<th>Category</th>
<th>Size</th>
<th>Season</th>
</tr>";
    $sql = "SELECT * FROM clothes";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$productID  = $row['productID'];
$category  = $row['category'];
$size = $row['size'];
$season = $row['season'];
    
echo "
<tr>
<td>$productID</td>
<td>$category</td>
<td>$size</td>
<td>$season</td>
</tr>
";
}
}



echo"</table>";
}
/* third table  customer*/

if($table_name=='customer')
{
echo "  <table id='t01'>
<tr>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Phone No</th>
<th>Customer Address</th>
<th>email Id </th>
<th>Join Date </th>
<th> Money Spent </th>
</tr>";
    $sql = "SELECT * FROM customer";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['customerID'];
$r2 = $row['customerName'];
$r3 = $row['phoneNo'];
$r4= $row['customerAddress'];
$r5= $row['emailID'];
$r6 = $row['joinDate'];
$r7= $row['moneySpent'];
    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>
<td>$r5</td>
<td>$r6</td>
<td>$r7</td>
</tr>
";
}
}



echo"</table>";
}
/*fourth table department*/


if($table_name=='department')
{
echo "  <table id='t01'>
<tr>
<th>Department Name</th>
<th>Manager ID</th>
<th>Vacancy</th>

</tr>";
    $sql = "SELECT * FROM department";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['departmentName'];
$r2 = $row['managerID'];
$r3 = $row['vacancy'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>

</tr>
";
}
}



echo"</table>";
}

/* table 5 discount */

if($table_name=='discount')
{
echo "  <table id='t01'>
<tr>
<th>Discount ID</th>
<th>Amount</th>
<th>Discount Percent</th>
<th>Valid Upto</th>
<th>Details</th>
<th>Terms And Conditions</th>
</tr>";
    $sql = "SELECT * FROM discount";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['discountID'];
$r2 = $row['amount'];
$r4= $row['discountPercent'];
$r5= $row['validUpto'];
$r6 = $row['details'];
$r7= $row['termsAndConditions'];
    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r4</td>
<td>$r5</td>
<td>$r6</td>
<td>$r7</td>
</tr>
";
}
}

echo"</table>";
}

/* table 6 electronics */

if($table_name=='electronics')
{
echo "  <table id='t01'>
<tr>
<th>Product ID</th>
<th>PowerRating</th>
<th>Warranty</th>
<th>details</th>
</tr>";
    $sql = "SELECT * FROM electronics";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['productID'];
$r2 = $row['powerRating'];
$r3 = $row['warranty'];
$r4= $row['details'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>

</tr>
";
}
}
echo"</table>";
}

/* new table 7 employee */
if($table_name=='employee')
{
echo "  <table id='t01'>
<tr>
<th>Employee ID</th>
<th>Employee Name</th>
<th>DOB</th>
<th>Phone No</th>
<th>Employee Address </th>
<th>Email ID</th>
<th>Join Date </th>
<th>Salary</th>
<th>Department Name</th>
</tr>";
    $sql = "SELECT * FROM employee";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['employeeID'];
$r2 = $row['employeeName'];
$r3 = $row['DOB'];
$r4= $row['phoneNo'];
$r5= $row['employeeAddress'];
$r6 = $row['emailID'];
$r7= $row['joinDate'];
$r8= $row['salary'];
$r9= $row['departmentName'];
    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>
<td>$r5</td>
<td>$r6</td>
<td>$r7</td>
<td>$r8</td>
<td>$r9</td>
</tr>
";
}
}
echo"</table>";
}

/* table 8  food section */


if($table_name=='foodSection')
{
echo "  <table id='t01'>
<tr>
<th>Product ID</th>
<th>Manufacture Date</th>
<th>Expiry Date</th>
<th>Quantity</th>
</tr>";
    $sql = "SELECT * FROM foodSection";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['productID'];
$r2 = $row['manufactureDate'];
$r3 = $row['expiryDate'];
$r4= $row['quantity'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>

</tr>
";
}
}



echo"</table>";
}

/* 9 table  household*/

if($table_name=='household')
{
echo "  <table id='t01'>
<tr>
<th>Product ID</th>
<th>Quantity</th>
<th>Category</th>
</tr>";
    $sql = "SELECT * FROM household";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['productID'];
$r2 = $row['quantity'];
$r3 = $row['category'];

    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>

</tr>
";
}
}
echo"</table>";
}
/* 11 table  offers*/

if($table_name=='offers')
{
echo "  <table id='t01'>
<tr>
<th>discount ID</th>
<th>product ID</th>

</tr>";
    $sql = "SELECT * FROM offers";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['discountID'];
$r2 = $row['productID'];

echo "
<tr>
<td>$r1</td>
<td>$r2</td>
</tr>
";
}
}
echo"</table>";
}

/* 12 table  ordered*/

if($table_name=='ordered')
{
echo "  <table id='t01'>
<tr>
<th>Order ID</th>
<th>Supplier ID</th>
<th>Product ID</th>
<th>order Date</th>
<th>Quantity Ordered</th>

</tr>";
    $sql = "SELECT * FROM ordered";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['orderID'];
$r2 = $row['supplierID'];
$r3 = $row['productID'];
$r4= $row['orderDate'];
$r5= $row['quantityOrdered'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>
<td>$r5</td>

</tr>
";
}
}

echo"</table>";
}

/* 13 table  sales*/

if($table_name=='sales')
{
echo "  <table id='t01'>
<tr>
<th>Bill NO</th>
<th>ProductID</th>
<th>Discount ID</th>
<th>Quantity sold</th>
</tr>";
    $sql = "SELECT * FROM sales";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['billNo'];
$r2 = $row['productID'];
$r3 = $row['discountID'];
$r4= $row['quantitySold'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>

</tr>
";
}
}

echo"</table>";
}

/* 14 table  sports*/

if($table_name=='sports')
{
echo "  <table id='t01'>
<tr>
<th> Product ID</th>
<th>Warranty</th>
<th>Details</th>
<th>Category</th>

</tr>";
    $sql = "SELECT * FROM sports";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['productID'];
$r2 = $row['warranty'];
$r3 = $row['details'];
$r4= $row['category'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>

</tr>
";
}
}

echo"</table>";
}

/* 15 table  supply*/

if($table_name=='supplied')
{
echo "  <table id='t01'>
<tr>
<th>Supply ID</th>
<th>Order ID</th>
<th>Supply Date</th>
<th>Quantity Supplied</th>

</tr>";
    $sql = "SELECT * FROM supplied";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['supplyID'];
$r2 = $row['orderID'];
$r3 = $row['supplyDate'];
$r4= $row['quantitySupplied'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>

</tr>
";
}
}



echo"</table>";
}

/* 16 table  supplier*/

if($table_name=='supplier')
{
echo "  <table id='t01'>
<tr>
<th>Supplier ID ID</th>
<th>Supplier Name</th>
<th>Phone No</th>
<th>Supplier Address</th>
<th>email Id </th>

</tr>";
    $sql = "SELECT * FROM supplier";

  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
while($row = mysqli_fetch_array($run_query)){
$r1 = $row['supplierID'];
$r2 = $row['supplierName'];
$r3 = $row['phoneNo'];
$r4= $row['supplierAddress'];
$r5= $row['emailID'];

    
    
echo "
<tr>
<td>$r1</td>
<td>$r2</td>
<td>$r3</td>
<td>$r4</td>
<td>$r5</td>

</tr>
";
}
}



echo"</table>";
}
    }
      ?>
   