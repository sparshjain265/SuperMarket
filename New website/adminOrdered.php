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

<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Admin</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="admin.php">Dashboard</a></li>
        <li><a href="#">Insert</a></li>
        <li><a href="#">Delete</a></li>
        <li><a href="#">Employee</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid" >
  <div class="row content">
    <div class="col-sm-3" style = "background-color :#E0E0E0 ">
      <h2>Search Panel</h2>
      
	  <script type="text/javascript">
		$(function() {
			$('form').each(function() {
				$(this).find('input').keypress(function(e) {
					// Enter pressed?
					if(e.which == 10 || e.which == 13) {
						this.form.submit();
					}
				});

				$(this).find('input[type=submit]').hide();
			});
		});
		</script>

		<!-- this is the form for the search panel -->
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminOrdered.php">


			<div class = "form-group"> 
			<input type="text" class = "form-control" name="orderID_search" placeholder="Search for order ID.." title="Type in a ID">
			</div>

			<div class = "form-group"> 
			<input type="text"class = "form-control" name="supplierID_search" placeholder="Order taken by (ID) ..">
    		</div>

            <div class = "form-group"> 
			<input type="text" class = "form-control" name="productID_search" placeholder="Order for product (ID).." title="Type in a ID">
			</div>

			<label>Quantity Ordered (lower):</label>
      		<div class="form-group">
			<input type="range" class = "form-control" name = "quantityOrderedLower" id="fromPrice" value="1" min="0" max="1000" 
            	oninput="document.getElementById('fPrice').innerHTML = this.value" />
        	<label id="fPrice"></label>
			</div>
    		
   			
      		<label >Quantity Ordered (Upper):</label>
			<div class="form-group">
        	<input class="form-control"  type="range" name = "quantityOrderedUpper" id="toPrice" value="999" min="0" max="1000" 
            	oninput="document.getElementById('tPrice').innerHTML = this.value" />
        	<label id="tPrice"></label>
    		</div>
			

 
        </form>
	   
	</div>
	

    <br>
    
    <div class="col-sm-9 ">

    

        <h2 class = "text-danger"style="text-align:center">Order Details</h2>
        <div class='col-sm-4' >

		<div class="w3-container scroll">
  		<div class="rounded w3-pale-red w3-hover-shadow w3-padding-32 w3-center" style="width:100% ; border-radius : 20px;">

			<br><br>
			
     		<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Place Order</button>
			<br><br><br><br>
  		</div>
		</div>
             </div>

		<!-- ================================================================================= -->
		<!-- ================================== modal form ==================================== -->

        <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Order Details</h4>
        </div>
        <div class="modal-body">
 <form name="myForm"  method="post" action = "adminOrdered.php" method = "post">
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
      
        </form>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    
    </div>
  </div>
     
   


    <?php
  require('config.php');
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
            echo '<script language="javascript">';
			echo 'alert("successfull Placed ordered")';
			echo '</script>';
          } 
          else 
          {
            //   echo("Error description: " . mysqli_error($con));
            echo "";
          }
      
      }
    
   
    // If form submitted, insert values into the database.
  
		
		if ($_REQUEST['quantityOrderedLower']){
		$orderID_search = $_REQUEST['orderID_search'];
        $supplierID_search = $_REQUEST['supplierID_search'];
        $productID_search = $_REQUEST['productID_search'];
        $quantityOrderedLower = $_REQUEST['quantityOrderedLower'];
        $quantityOrderedUpper = $_REQUEST['quantityOrderedUpper'];
		// $departmentName_search = $_REQUEST['departmentName_search'];
	}
    
    // echo $orderID_search;
    // echo $quantityOrderedUpper;
	$sql = "SELECT * FROM ordered where (orderID like '%$orderID_search%'
			and supplierID like '%$supplierID_search%' and productID like '%$productID_search%'
            and quantityOrdered >= '$quantityOrderedLower' and quantityOrdered <= '$quantityOrderedUpper')";
        $run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$orderID   = $row['orderID'];
			$supplierID  = $row['supplierID'];
			$productID = $row['productID'];
            $orderDate = $row['orderDate'];
            $quantityOrdered = $row['quantityOrdered'];
            echo "
            
            <div class='col-sm-4 ' >
            
		<div class='w3-container'>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
           		 <h3>$orderID</h3>   
			   <P> <b>Supplier ID </b> : $supplierID </p>
			   <p> <b>Product ID </b>: $productID </p>
               <p> <b>Order Date </b>: $orderDate </p>
               <p> <b>Quantity </b>: $quantityOrdered </p>  
        	</div>
		</div>
		<br>
        </div>
                
        
			";
		}
	}
     
?>
</div>

</body>
</html>