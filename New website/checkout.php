<!DOCTYPE html>
<html lang="en">
<head>
  <title>Super Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script>
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
    	var demovalue = $(this).val(); 
        $("div.myDiv").hide();
        $("#show"+demovalue).show();
    });
});
</script>
  <style>
    .myDiv {
        display:None;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
    	.scroll {
    max-height: 250px;
    overflow-y: auto;
	}
	::-webkit-scrollbar {
    width: 0px;
    background: transparent; /* make scrollbar transparent */
}
  </style>
</head>
<body >

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SuperMarket</a>
    </div>
     <ul class="nav navbar-nav">
      <li class="active"><a href="admin.html">Home</a></li>
	  <li ><a href="adminFood.php">Food</a></li>
	   <li ><a href="adminClothes.php">Clothes</a></li>
	    <li ><a href="adminElectronics.php">Electronics</a></li>
		 <li><a href="adminSports.php">Sports</a></li>
     <li><a href="adminHousehold.php">Household</a></li>
    </ul>
     <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul> 


  
  </div>
</nav>

<?php
require('config.php');
session_start();
// Start the session
session_start();
require('config.php');
$itemList = $_SESSION['array'];
$itemCount =$_SESSION['array_count'];

// $sql = "SELECT * FROM product ";
// $run_query = mysqli_query($con,$sql);

    // print_r($itemList);
    // print_r($itemCount);
?>

<div align="center">
<div style="width:50%;">
    <form name='customer'  method='post' action = 'checkout.php'>
    <div class='form-group'>

    <input type='radio' name='demo' value ='Existing'> Existing Customer </option> 
    <input type='radio' name='demo' value='New'> New Customer </option>
    
        <div id='showExisting' class='myDiv'>

            <div class="form-group">
              <label for="ID">Customer ID</label>
              <input type="text" class="form-control" name="customerID"  placeholder="Customer ID">
              <small id="emailHelp" class="form-text text-muted"></small>

              <input type='submit' class='btn btn-primary' name="IDSubmit" value="Submit" >
            </div>

        </div>

        <div id='showNew' class='myDiv'>
            <div class="form-group">
                <label for="exampleInputEmail1">Customer Name</label>
                <input type="text" class="form-control" name="customerName"  placeholder="Customer Name">
                <small id="emailHelp" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="text" class="form-control" name="phoneNo" placeholder="phoneNo">
                <small id="" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="">Customer Address</label>
                <input type="text" class="form-control" name="customerAddress" placeholder="cystomerAddress">
                <small id="" class="form-text text-muted"></small>
            </div>
            <div class="form-group">
                <label for="">email ID</label>
                <input type="text" class="form-control" name="emailID" placeholder="emailID">
                <small id="" class="form-text text-muted"></small>
            </div>
            <input type='submit' class='btn btn-primary' name="customerSubmit" value="Submit" >

        </div>

    </div>
    </form>
    

<?php

require('config.php');

// old customer
if(isset($_POST['IDSubmit']))
{
    $exists = 0;
    // echo $_POST['customerID'];
    $customerID = $_POST['customerID'];
    $query = "SELECT * from customer where customerID='$customerID'";
    $result = mysqli_query($con, $query);
    $exists = mysqli_num_rows(($result));

    if($exists == 1)
    {
        $date = date("Y-m-d");
        $query = "insert into bill(billDate, customerID, amount) values ('$date', '$customerID', 0)";
        $result = mysqli_query($con, $query);
        if($result)
        {
            $query = "select max(billNo) as billNo from bill";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            $billNo = $row['billNo'];
            foreach ($itemCount as $productID => $quantitySold) {
                $query = "insert into sales(billNo, productID, quantitySold) values ('$billNo', '$productID', '$quantitySold')";
                $result = mysqli_query($con, $query);
                if($result)
                {
                    $_SESSION['array'] = array();
                    $_SESSION['array_count'] = array();
                }else{
                    echo mysqli_error($con);
                }
            }

            $query = "select * from bill where billNo = '$billNo'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            $billDate = $row['billDate'];
            $customerID = $row['customerID'];
            $amount = $row['amount'];

            echo "
		    <div class='w3-container '>
  		    <!--    <div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'> -->
                    <div align='left'>
                    <p> Bill No : $billNo  </p>   
		        	<P> Date : $billDate </p>
		        	<p> Customer ID : $customerID </p>
		        	<p> Billing Amount : $amount </p>
                    </div>";
                    echo "  <table id='t01' style='width:100%'>
                    <tr>
                      <th>Product Name</th>
                      <th>Brand Name</th>
                      <th>MRP</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                    </tr>";

                    $query = "select quantitySold, productName, brandName, MRP from product natural join sales where billNo = '$billNo'";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                        $quantity = $row['quantitySold'];
                        $productName = $row['productName'];
                        $brandName = $row['brandName'];
                        $MRP = $row['MRP'];
                        $amount = $MRP * $quantity;
                    echo "
                        <tr>
                        <td>$productName</td>
                        <td>$brandName</td>
                        <td>$MRP</td>
                        <td>$quantity</td>
                        <td>$amount</td>
                      </tr>
                    ";
                    
                    }
            


            echo " 	<!--</div>-->
                    </table>
                    <div>
                    <br>
                    <button type = 'submit'><a href='cashier.php'>Next</a></button>
                    </div>
		        </div>
		    <br>
			";

        }
        else
        {
            echo $customerID;;
        }
    }
}

// new customer
if(isset($_POST['customerSubmit']))
{
    $customerName = $_POST['customerName'];
    $phoneNo = $_POST['phoneNo'];
    $customerAddress = $_POST['customerAddress'];
    $emailID = $_POST['emailID'];
    $joinDate = date("Y-m-d");

    $query = "insert into customer(customerName, phoneNo, customerAddress, emailID, joinDate, moneySpent) values ('$customerName', '$phoneNo', '$customerAddress', '$emailID', '$joinDate', 0)";
    $result = mysqli_query($con, $query);

    if($result)
    {
        $query = "select max(customerID) as customerID from customer";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $customerID = $row['customerID'];
        $date = date("Y-m-d");
        $query = "insert into bill(billDate, customerID, amount) values ('$date', '$customerID', 0)";
        $result = mysqli_query($con, $query);

        if($result)
        {
            $query = "select max(billNo) as billNo from bill";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            $billNo = $row['billNo'];
            foreach ($itemCount as $productID => $quantitySold) {
                $query = "insert into sales(billNo, productID, quantitySold) values ('$billNo', '$productID', '$quantitySold')";
                $result = mysqli_query($con, $query);
                if($result)
                {
                    $_SESSION['array'] = array();
                    $_SESSION['array_count'] = array();
                }else{
                    echo mysqli_error($con);
                }
            }

            $query = "select * from bill where billNo = '$billNo'";
            $result = mysqli_query($con, $query);
            $row = mysqli_fetch_array($result);
            $billDate = $row['billDate'];
            $customerID = $row['customerID'];
            $amount = $row['amount'];

            echo "
            
		    <div class='w3-container '>
  		    <!--    <div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'> -->
                    <div align='left'>
                    <p> Bill No : $billNo  </p>   
		        	<P> Date : $billDate </p>
		        	<p> Customer ID : $customerID </p>
                    <p> Billing Amount : $amount </p> 
                    </div>";
                    echo "  
                    <!--div align='center'-->
                    <table id='t01' style='width:100%'>
                    <tr>
                      <th>Product Name</th>
                      <th>Brand Name</th>
                      <th>MRP</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                    </tr>";

                    $query = "select quantitySold, productName, brandName, MRP from product natural join sales where billNo = '$billNo'";
                    $result = mysqli_query($con, $query);
                    while($row = mysqli_fetch_array($result))
                    {
                        $quantity = $row['quantitySold'];
                        $productName = $row['productName'];
                        $brandName = $row['brandName'];
                        $MRP = $row['MRP'];
                        $amount = $MRP * $quantity;
                    echo "
                        <tr>
                        <td>$productName</td>
                        <td>$brandName</td>
                        <td>$MRP</td>
                        <td>$quantity</td>
                        <td>$amount</td>
                      </tr>
                    ";
                    
                    }
            


            echo " 	<!--/div-->
                    </table>
                    <br>
                    <button type = 'submit'><a href='cashier.php'>Next</a></button>
		        </div>
		    <br>
			";

        }
        else
        {
            echo mysqli_error($con);
        }
    }
    else{
        echo mysqli_error($con);
    }

}

// header( "Location:cashiercart.php" ); 
 ?>
 </div>

</div>
<div align='center'>

</div>
 </body>
 </html>