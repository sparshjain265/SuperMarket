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
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminDepartment.php">


			
			<label>Vacancies (lower):</label>
      		<div class="form-group">
			<input type="range" class = "form-control" name = "vacancyLower" id="fromPrice" value="1" min="0" max="100" 
            	oninput="document.getElementById('fPrice').innerHTML = this.value" />
        	<label id="fPrice"></label>
			</div>
    		
   			
      		<label >Vaccancies (Upper):</label>
			<div class="form-group">
        	<input class="form-control"  type="range" name = "vacancyUpper" id="toPrice" value="99" min="0" max="100" 
            	oninput="document.getElementById('tPrice').innerHTML = this.value" />
        	<label id="tPrice"></label>
    		</div>

 
        </form>
	   
	</div>
	

    <br>
    
    <div class="col-sm-9 ">
<h2 class = "text-danger"style="text-align:center">Department Details</h2>


    <?php
  require('config.php');
  
        $vacancyLower = $_REQUEST['vacancyLower'];
        $vacancyUpper = $_REQUEST['vacancyUpper'];

    
    // echo $orderID_search;
//  echo $billAmountUpper;

	$sql = "SELECT * FROM department where(vacancy >= '$vacancyLower' and vacancy <= '$vacancyUpper')";
 
    $run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$managerID   = $row['managerID'];
			$departmentName = $row['departmentName'];
            $vacancy = $row['vacancy'];

 

            echo "
            
            <div class='col-sm-4 ' >
            
		<div class='w3-container'>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
           		 <h3>$departmentName</h3>   
			   <P> <b>Manager ID </b> : $managerID </p>
               <p> <b>vacancy </b>: $vacancy </p>
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