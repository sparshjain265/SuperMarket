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
  <style>
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
    }</style>
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
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Dashboard</a></li>
    
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
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
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminElectronics.php">


			<div class = "form-group"> 
			<input type="text" class = "form-control" name="product_ID" placeholder="Search for productID.." title="Type in a name">
			</div>
			<div class = "form-group"> 
			<input type="text"class = "form-control" name="product_name" placeholder="Search for Product Name ..">
    		</div>

			<label>MRP From:</label>
      		<div class="form-group">
			<input type="range" class = "form-control" name = "rangeLower" id="fromPrice" value="1" min="0" max="100000" 
            	oninput="document.getElementById('fPrice').innerHTML = this.value" />
        	<label id="fPrice"></label>
			</div>
    		
   			
      		<label >MRP To:</label>
			<div class="form-group">
        	<input class="form-control"  type="range" name = "rangeUpper" id="toPrice" value="99999" min="0" max="100000" 
            	oninput="document.getElementById('tPrice').innerHTML = this.value" />
        	<label id="tPrice"></label>
    		</div>
			

			<label>Cost Price From:</label>
        	<div class="form-group">
			<input type="range" class = "form-control" name = "costLower" id="costFromPrice" value="0" min="0" max="100000" 
            	oninput="document.getElementById('tcostPrice').innerHTML = this.value" />
        	<label id="tcostPrice"></label>
    		</div>


			<label>Cost Price To:</label>
        	<div class="form-group">
			<input class = "form-control" type="range" name = "costUpper" id="costToPrice" value="99999" min="0" max="100000" 
            	oninput="document.getElementById('lcostPrice').innerHTML = this.value" />
        	<label id="lcostPrice"></label>
    		</div>
			
			<label>Quantity From:</label>
        	<div class="form-group">
			<input class = "form-control" type="range" name = "quantityLower" id="toPrice" value="0" min="0" max="1000" 
            	oninput="document.getElementById('lQuantity').innerHTML = this.value" />
        	<label id="lQuantity"></label>
    		</div>

			<div class = "form-group"> 
			<label>Quantity To:</label>
        	<input class = "form-control" type="range" name = "quantityUpper" id="toPrice" value="999" min="0" max="1000" 
            	oninput="document.getElementById('tQuantity').innerHTML = this.value" />
        	<label id="tQuantity"></label>
    		</div>

	   </form>
    </div>
    <br>
    
    <div class="col-sm-9">
     <h2 class = "text-danger"style="text-align:center">Electronics</h2>
    <?php
    require('config.php');
    
    		if ($_REQUEST['rangeLower']){
		$rangeLower = $_REQUEST['rangeLower'];
		$rangeUpper = $_REQUEST['rangeUpper'];
		$costLower = $_REQUEST['costLower'];
		$costUpper = $_REQUEST['costUpper'];
		$quantityUpper = $_REQUEST['quantityUpper'];
		$quantityLower = $_REQUEST['quantityLower'];
		$productID_search = $_REQUEST['product_ID'];
		$productName_search = $_REQUEST['product_name'];

	}
    
          $sql = "SELECT * FROM electronicsDetails where (MRP >= $rangeLower and MRP <= $rangeUpper) and (costPrice >= $costLower 
			and costPrice <= $costUpper) and productID like '$productID_search%'
			and productName like '%$productName_search%' 
			and (quantityStock >= $quantityLower and quantityStock <= $quantityUpper)";
    
      
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
			$powerRating = $row['powerRating'];
			$warranty = $row['warranty'];
			$details = $row['details'];
            echo "
            
               <div class='col-sm-4 ' >
		<div class='w3-container '>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
            
          <h3 >$productName</h3>
        <P> Brand : $brandName </p>
        <p> costPrice : $costPrice </p>
        <p> MRP : $mrp </p>
        <p> Quantity left : $quantity </p>
        <p> Power Rating : $powerRating </p>
        <p> Warranty : $warranty </p>
        <p> Details : $details </p>  
        
        </div>
        </div>
                 <br> 
                </div>
        
			";
		}
	}
     
   
  
  echo"</table>";

?>
</div>

</body>
</html>
