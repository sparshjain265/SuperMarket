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
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminCustomer.php">


			<div class = "form-group"> 
			<input type="text" class = "form-control" name="customerID_search" placeholder="Search for customerID.." title="Type in a ID">
			</div>

			<div class = "form-group"> 
			<input type="text"class = "form-control" name="customerName_search" placeholder="Search for customer Name ..">
    		</div>


 
        </form>
	   
	</div>
	

    <br>
    
    <div class="col-sm-9 ">

    

        <h2 class = "text-danger"style="text-align:center">Customer Details</h2>
        <div class='col-sm-4' >

		<div class="w3-container scroll">
  		<div class="rounded w3-pale-red w3-hover-shadow w3-padding-32 w3-center" style="width:100% ; border-radius : 20px;">

			<br><br><br>
			
     		<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Insert Customer Details</button>
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
          <h4 class="modal-title">Customer Details</h4>
        </div>
        <div class="modal-body">

        <form name="myForm"  method="post" action = "adminCustomer.php" method = "post">
        <div class="form-group">
        <label>Customer ID</label>
        <input type="text" class="form-control" name="customerID"  placeholder="Customer ID">
        <small id="" class="form-text text-muted"></small>
        </div>
 
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
 
  <div class="form-group">
    <label for="date">Join Date</label>
    <input type="date" class="form-control" name="joinDate"  placeholder="Join Date">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
 
  <div class="form-group">
    <label for="">Money spent</label>
    <input type="text" class="form-control" name="moneySpent" placeholder="moneySpent">
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
 
    
   
      // If form submitted, insert values into the database.
  if (isset($_REQUEST['customerID'])){
		$customerID = stripslashes($_REQUEST['customerID']); // removes backslashes
    $customerID= mysqli_real_escape_string($con,$customerID); //escapes special characters in a string
		$customerName = stripslashes($_REQUEST['customerName']);
    $customerName = mysqli_real_escape_string($con,$customerName);
		$phoneNo = stripslashes($_REQUEST['phoneNo']);
    $phoneNo = mysqli_real_escape_string($con,$phoneNo);
    

    $customerAddress = stripslashes($_REQUEST['customerAddress']);
    $customerAddress = mysqli_real_escape_string($con,$customerAddress);

    $emailID = stripslashes($_REQUEST['emailID']);
    $emailID = mysqli_real_escape_string($con,$emailID);

    $joinDate = stripslashes($_REQUEST['joinDate']);
    $joinDate = mysqli_real_escape_string($con,$joinDate);

    $moneySpent = stripslashes($_REQUEST['moneySpent']);
    $moneySpent = mysqli_real_escape_string($con,$moneySpent);

      
    // echo $moneySpent;
  	$query = "INSERT into `customer` (customerID,customerName,phoneNo,customerAddress,emailID,joinDate,moneySpent) 
      VALUES ('$customerID','$customerName','$phoneNo', '$customerAddress','$emailID','$joinDate','$moneySpent')";
    // echo $query;
    $result = mysqli_query($con,$query);
          if($result){
            echo '<script language="javascript">';
			echo 'alert("successfull Insertion")';
			echo '</script>';
          } 
          else 
          {
            //   echo("Error description: " . mysqli_error($con));
            echo "";
          }
      
      }
		// ==================================================================================
		// This is for desplaying the product table
		
		if ($_REQUEST['customerID_search']){
		$customerID_search = $_REQUEST['customerID_search'];
		$customerName_search = $_REQUEST['customerName_search'];
		// $departmentName_search = $_REQUEST['departmentName_search'];
	}
	
	$sql = "SELECT * FROM customer where (customerID like '%$customerID_search%'
			and customerName like '%$customerName_search%')";
        $run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$customerID   = $row['customerID'];
			$customerName  = $row['customerName'];
			$phoneNo = $row['phoneNo'];
            $customerAddress = $row['customerAddress'];
            $emailID = $row['emailID'];
            $joinDate = $row['joinDate'];
            $moneySpent = $row['moneySpent'];
            echo "
            
            <div class='col-sm-4 ' >
            
		<div class='w3-container '>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
           		 <h3 >$customerName</h3>   
			   <P> <b>Phone Number </b> : $phoneNo </p>
			   <p> <b>Address </b>: $customerAddress </p>
			   <p> <b>Email ID </b>: $emailID </p>
               <p> <b>Join Date </b>: $joinDate </p>
               <p> <b>moneySpent </b>: $moneySpent </p>
               
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