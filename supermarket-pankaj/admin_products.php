<!DOCTYPE html>
<html lang="en">
<head>
  <title>Super Market</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
	.scroll {
    max-height: 250px;
    overflow-y: auto;
	}
	::-webkit-scrollbar {
    width: 0px;
    background: transparent; /* make scrollbar transparent */
}
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
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
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
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
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="#">Dashboard</a></li>
        <li><a href="#">Insert</a></li>
        <li><a href="#">Delete</a></li>
        <li><a href="#">Employee</a></li>

      </ul><br>
	  <div>
	  <form name = "mrpQuery" method = "post" action = "admin_products.php">
    	<p>
        	<label>MRP From:</label>
        	<input type="range" name = "rangeLower" id="fromPrice" value="1" min="0" max="100000" 
            	oninput="document.getElementById('fPrice').innerHTML = this.value" />
        	<label id="fPrice"></label>
    		</p>
   			 <p>
        	<label>MRP To:</label>
        	<input type="range" name = "rangeUpper" id="toPrice" value="99999" min="0" max="100000" 
            	oninput="document.getElementById('tPrice').innerHTML = this.value" />
        	<label id="tPrice"></label>
    		</p>

			<label>Cost Price From:</label>
        	<input type="range" name = "costLower" id="costFromPrice" value="0" min="0" max="100000" 
            	oninput="document.getElementById('tcostPrice').innerHTML = this.value" />
        	<label id="tcostPrice"></label>
    		</p>

			<label>Cost Price To:</label>
        	<input type="range" name = "costUpper" id="costToPrice" value="99999" min="0" max="100000" 
            	oninput="document.getElementById('lcostPrice').innerHTML = this.value" />
        	<label id="lcostPrice"></label>
    		</p>
    	<p><input type="submit" value="submit"/></p>
	   </form>
	</div>
    </div>
    <br>
    
	<!-- <script>
	function ti() {
        var fP = document.getElementById('fPrice').innerHTML;
        var tP = document.getElementById('tPrice').innerHTML;
        // if (fP != '' && tP != '')
            // window.location.replace(window.location.href + '?min_Price=' + fP + '&max_Price=' + tP);
    }
	</script> -->


	
    <div class="col-sm-9"> 
    <?php
    require('config.php');
	
	if ($_REQUEST['rangeLower']){
		$rangeLower = $_REQUEST['rangeLower'];
		$rangeUpper = $_REQUEST['rangeUpper'];
		$costLower = $_REQUEST['costLower'];
		$costUpper = $_REQUEST['costUpper'];
	}

    
    $sql = "SELECT * FROM product where MRP >= $rangeLower and MRP <= $rangeUpper and costPrice >= $costLower and costPrice <= $costUpper";
      
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
			 
            <div class='col-sm-3 scroll' >
           
            <div class='well' style='background-color:pink'>
			<div class='card' style='width: 20rem'>
            <div class='card-body text-center '>
			
			   <h3 >$productName</h3>
			   <p> Department name : $departmentName  </p>   
			   <P> Brand : $brandName </p>
			   <p> costPrice : $costPrice </p>
			   <p> MRP : $mrp </p>
			   <p> Quantity : $quantity </p> 
		
			</div>
        	</div>
			</div>
			</div>
        
			";
		}
	}
     
   
  
  echo"</table>";

?>
</div>

</body>
</html>
