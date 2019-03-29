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
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminDiscount.php">


			<div class = "form-group"> 
			<input type="text" class = "form-control" name="discountID_search" placeholder="Search for Discount ID.." title="Type in a ID">
			</div>

			
			<label>Discount Percent (lower):</label>
      		<div class="form-group">
			<input type="range" class = "form-control" name = "discountPercentLower" id="fromPrice" value="1" min="0" max="100" 
            	oninput="document.getElementById('fPrice').innerHTML = this.value" />
        	<label id="fPrice"></label>
			</div>
    		
   			
      		<label >Discount Percent (Upper):</label>
			<div class="form-group">
        	<input class="form-control"  type="range" name = "discountPercentUpper" id="toPrice" value="100" min="0" max="101" 
            	oninput="document.getElementById('tPrice').innerHTML = this.value" />
        	<label id="tPrice"></label>
    		</div>
			

            <label>Discount Amount (lower):</label>
      		<div class="form-group">
			<input type="range" class = "form-control" name = "discountAmountLower" id="fromPrice" value="1" min="0" max="10000" 
            	oninput="document.getElementById('fPrice').innerHTML = this.value" />
        	<label id="fPrice"></label>
			</div>
    		
   			
      		<label >Discount Amount (Upper):</label>
			<div class="form-group">
        	<input class="form-control"  type="range" name = "discountAmountUpper" id="toPrice" value="9999" min="0" max="10000" 
            	oninput="document.getElementById('tPrice').innerHTML = this.value" />
        	<label id="tPrice"></label>
    		</div>
 
        </form>
	   
	</div>
	

    <br>
    
    <div class="col-sm-9 ">

    

        <h2 class = "text-danger"style="text-align:center">Discount Details</h2>
        <div class='col-sm-4' >

		<div class="w3-container scroll">
  		<div class="rounded w3-pale-red w3-hover-shadow w3-padding-32 w3-center" style="width:100% ; border-radius : 20px;">

			<br><br>
			
     		<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Add Discount</button>
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
          <h4 class="modal-title">Insert Discount</h4>
        </div>
        <div class="modal-body">
 
  <form name="myForm"  method="post" action = "adminDiscount.php" method = "post">
 <div class="form-group">
    <label>Discount ID</label>
    <input type="text" class="form-control" name="discountID"  placeholder="Discount Id">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Amount</label>
    <input type="text" class="form-control" name="amount"  placeholder="amount">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Discount Percent</label>
    <input type="text" class="form-control" name="discountPercent" placeholder="discount Percent">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Valid Upto</label>
    <input type="date" class="form-control" name="validUpto" placeholder="discount Percent">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Details</label>
        <textarea class="form-control" rows="5" id="user-message" name = 'details' placeholer = "Limit 100">Limit 200</textarea>
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group" >
        <label for="Comment">Terms and Conditions</label>
        <textarea class="form-control" rows="5" id="user-message" name = 'termsAndConditions' placeholer = "Limit 100">Limit 200</textarea>
        <small id="emailHelp" class="form-text text-muted"></small>
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
if (isset($_REQUEST['discountID'])){
		$discountID = stripslashes($_REQUEST['discountID']); // removes backslashes
    $discountID= mysqli_real_escape_string($con,$discountID); //escapes special characters in a string
		$amount = stripslashes($_REQUEST['amount']);
    $amount = mysqli_real_escape_string($con,$amount);
		$discountPercent = stripslashes($_REQUEST['discountPercent']);
    $discountPercent = mysqli_real_escape_string($con,$discountPercent);

    $validUpto = stripslashes($_REQUEST['validUpto']);
    $validUpto = mysqli_real_escape_string($con,$validUpto);

    $details = stripslashes($_REQUEST['details']);
    $details = mysqli_real_escape_string($con,$details);

    $termsAndConditions = stripslashes($_REQUEST['termsAndConditions']);
    $termsAndConditions = mysqli_real_escape_string($con,$termsAndConditions);



      
    
    // echo $validUpto;
  	$query = "INSERT into `discount` (discountID,amount,discountPercent,validUpto,details,termsAndConditions) VALUES ('$discountID','$amount','$discountPercent', '$validUpto','$details','$termsAndConditions')";
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

  
		
		if ($_REQUEST['discountAmountLower']){
		$discountID_search = $_REQUEST['discountID_search'];
        $discountAmountLower = $_REQUEST['discountAmountLower'];
        $discountAmountUpper = $_REQUEST['discountAmountUpper'];
        $discountPercentLower = $_REQUEST['discountPercentLower'];
        $discountPercentUpper = $_REQUEST['discountPercentUpper'];
		// $departmentName_search = $_REQUEST['departmentName_search'];
	}
    
    // echo $orderID_search;
    // echo $quantityOrderedUpper;
	$sql = "SELECT * FROM discount where (discountID like '%$discountID_search%'
            and amount >= '$discountAmountLower' and amount <= '$discountAmountUpper'
            and discountPercent >= '$discountPercentLower' and discountPercent <= '$discountPercentUpper')";
    
    $run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$discountID   = $row['discountID'];
			$amount  = $row['amount'];
			$discountPercent = $row['discountPercent'];
            $validUpto = $row['validUpto'];
            $details = $row['details'];
            $termsAndConditions = $row['termsAndConditions'];
            echo "
            
            <div class='col-sm-4 ' >
            
		<div class='w3-container'>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
           		 <h3>$discountID</h3>   
			   <P> <b>Discount Amount </b> : $amount </p>
               <p> <b>Discount Percent </b>: $discountPercent </p>
               <p> <b>Valid Upto </b>: $validUpto </p>
               <p> <b> Details </b>: $details </p>
               <p> <b> Terms & Conditions </b>: $termsAndConditions </p>  
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