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
<body>

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
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hi Cashier</a></li>
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

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Cashier</h2>
      <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="cashier.php">Dashboard</a></li>
        <!-- <li><button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModalcart'>cart</button></li> -->
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
     
        <h2 style="color:red;text-align:center">Products</h2>
        
         
     

    <?php
  require('config.php');
 
  session_start();
            
  
  $val=$_SESSION['array'];
  array_merge($val,$array); 
  $item=array();
  $item_quantity=array();
  
  $array_counts = $_SESSION['array_count'];
  $cart_total=0;
  // foreach ($item as $key => $element) {
    foreach ($array_counts as $pid => $qty) {


// if($item_quantity[$key]>0)
{

  $sql = "SELECT * FROM product where productID=$pid";
      
  $run_query = mysqli_query($con,$sql);
if(mysqli_num_rows($run_query) > 0){
  while($row = mysqli_fetch_array($run_query)){
      $productID   = $row['productID'];
      $productName  = $row['productName'];
      $brandName = $row['brandName'];
      $departmentName = $row['departmentName'];
      $costPrice = $row['costPrice'];
      $mrp = $row['MRP'];
     
      $quantity = $qty;
      $total = $mrp*$quantity;
      $cart_total=$cart_total+$total;
      
    
    
			echo "
        
                <div class='col-sm-4 ' >
            
                <div class='w3-container '>
                  <div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
                  <h3 >$productName</h3>
                  <p> MRP : $mrp </p>
                  <p> Total : $total </p>
                  <p> Quantity : $quantity </p>
                  <P> Brand : $brandName </p>
                 
                   
                  <form action='empty_cart.php' method='post'>        
                  <input type = 'submit' class='btn btn-info btn-lg' data-toggle='modal' name='$productID' value = 'delete ' />
                  </form>
                      
                      </div>
                </div>
                <br>
                    </div>

			";

  }
}
  }}
  // header( "Location:cashiercart.php" ); 
   ?>

<div class="col-sm-9">
     
        <h2 style="color:red;text-align:center">Total <?php echo$cart_total ?> </h2>

        <form action='checkout.php' method='post'>        
  <input type = 'submit' class='btn btn-info btn-lg' data-toggle='modal' name='$productID' value = 'checkout ' />
</form>

</div>
</div>

</body>
</html>
