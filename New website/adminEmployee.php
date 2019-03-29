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
      <li class="active"><a href="#">Home</a></li>
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
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminEmployee.php">


			<div class = "form-group"> 
			<input type="text" class = "form-control" name="employeeID_search" placeholder="Search for employeeID.." title="Type in a ID">
			</div>

			<div class = "form-group"> 
			<input type="text"class = "form-control" name="employeeName_search" placeholder="Search for Employee Name ..">
    		</div>

            <div class="form-group">
            <label for="exampleInputPassword1">Department Name</label>
            <select type="text" class="form-control" name="departmentName_search" placeholder="departmentName">
              <option value = "Food Section"> Food Section</option> 
              <option value = "Clothes"> Clothes</option>
              <option value = "Household"> Household </option>
              <option value = "Electronics"> Electronics </option>
              <option value = "Sports"> Sports </option>
             </select>
            </div>
 
        </form>
	   
	</div>
	

    <br>
    
    <div class="col-sm-9 ">

    

        <h2 class = "text-danger"style="text-align:center">Employee Details</h2>
        <div class='col-sm-4' >

		<div class="w3-container scroll">
  		<div class="rounded w3-pale-red w3-hover-shadow w3-padding-32 w3-center" style="width:100% ; border-radius : 20px;">

			<br><br><br>
			
     		<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Insert Employee Details</button>
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
          <h4 class="modal-title">Employee Details</h4>
        </div>
        <div class="modal-body">
        
            <form name="myForm"  method="post" action = "adminEmployee.php" method = "post">
 <div class="form-group">
    <label>Employee ID</label>
    <input type="text" class="form-control" name="employeeID"  placeholder="employeeID">
    <small id="" class="form-text text-muted"></small>
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">EmployeeName</label>
    <input type="text" class="form-control" name="employeeName"  placeholder="employeeName">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">DOB</label>
    <input type="date" class="form-control" name="DOB" placeholder="joinDate">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone No</label>
    <input type="text" class="form-control" name="phoneNo" placeholder="phoneNo">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Employee Address</label>
    <input type="text" class="form-control" name="employeeAddress" placeholder="employeeAdress">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Email ID</label>
    <input type="text" class="form-control" name="emailID" placeholder="emailID">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">join Date</label>
    <input type="date" class="form-control" name="joinDate" placeholder="joinDate">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="">Salary</label>
    <input type="text" class="form-control" name="salary" placeholder="salary">
    <small id="" class="form-text text-muted"></small>
  </div>

            <div class="form-group">
            <label for="exampleInputPassword1">Department Name</label>
            <select type="text" class="form-control" name="departmentName" placeholder="departmentName">
              <option value = "Food Section"> Food Section</option> 
              <option value = "Clothes"> Clothes</option>
              <option value = "Household"> Household </option>
              <option value = "Electronics"> Electronics </option>
              <option value = "Sports"> Sports </option>
             </select>
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
        if (isset($_REQUEST['employeeID'])){
		$employeeID = stripslashes($_REQUEST['employeeID']); // removes backslashes
    $employeeID= mysqli_real_escape_string($con,$employeeID); //escapes special characters in a string
		$employeeName = stripslashes($_REQUEST['employeeName']);
    $employeeName = mysqli_real_escape_string($con,$employeeName);
		$DOB = stripslashes($_REQUEST['DOB']);
    $DOB = mysqli_real_escape_string($con,$DOB);

    $phoneNo = stripslashes($_REQUEST['phoneNo']);
    $phoneNo = mysqli_real_escape_string($con,$phoneNo);

    $employeeAddress = stripslashes($_REQUEST['employeeAddress']);
    $employeeAddress = mysqli_real_escape_string($con,$employeeAddress);

    $emailID = stripslashes($_REQUEST['emailID']);
    $emailID = mysqli_real_escape_string($con,$emailID);

    $joinDate = stripslashes($_REQUEST['joinDate']);
    $joinDate = mysqli_real_escape_string($con,$joinDate);

    $salary = stripslashes($_REQUEST['salary']);
    $salary = mysqli_real_escape_string($con,$salary );

    $departmentName = stripslashes($_REQUEST['departmentName']);
    $departmentName = mysqli_real_escape_string($con,$departmentName);




      
    
    
  	$query = "INSERT into `employee` (employeeID,employeeName,DOB,phoneNo,employeeAddress,emailID,joinDate,salary,departmentName)
       VALUES ('$employeeID','$employeeName','$DOB', '$phoneNo','$employeeAddress','$emailID','$joinDate','$salary','$departmentName')";
    $result = mysqli_query($con,$query);
    // echo $query;
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
		
		if ($_REQUEST['departmentName_search']){
		$employeeID_search = $_REQUEST['employeeID_search'];
		$employeeName_search = $_REQUEST['employeeName_search'];
		$departmentName_search = $_REQUEST['departmentName_search'];
	}
	
	$sql = "SELECT * FROM employee where (employeeID like '%$employeeID_search%'
			and employeeName like '%$employeeName_search%' 
			and departmentName = '$departmentName_search')"; 
      
        $run_query = mysqli_query($con,$sql);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$employeeID   = $row['employeeID'];
			$employeeName  = $row['employeeName'];
			$DOB = $row['DOB'];
			$phoneNo = $row['phoneNo'];
            $employeeAddress = $row['employeeAddress'];
            $emailID = $row['emailID'];
            $joinDate = $row['joinDate'];
            $salary = $row['salary'];
            $departmentName = $row['departmentName'];
            echo "
            
            <div class='col-sm-4 ' >
            
		<div class='w3-container '>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
           		 <h3 >$employeeName</h3>
			   <p> <b> Department name</b> : $departmentName  </p>   
			   <P> <b>Phone Number </b> : $phoneNo </p>
			   <p> <b>Employee Address </b>: $employeeAddress </p>
			   <p> <b>Email ID </b>: $emailID </p>
               <p> <b>Join Date </b>: $joinDate </p>
               <p> <b>Salary </b>: $joinDate </p>
               
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