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
		 <form name = "mrpQuery" method = "post" target = "_self" action = "adminProducts.php">


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
    
    <div class="col-sm-9 ">

    

        <h2 class = "text-danger"style="text-align:center">Products</h2>
        <div class='col-sm-4' >

		<div class="w3-container scroll">
  		<div class="rounded w3-pale-red w3-hover-shadow w3-padding-32 w3-center" style="width:100% ; border-radius : 20px;">

			<br><br><br>
			
     		<button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Insert Item</button>
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
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        <form name='myForm'  method='post' action = 'adminProducts.php' method = 'post'>
      	
		<div class='form-group'>
         <label>Product ID</label>
         <input type='text' class='form-control' name='productID'  placeholder='Product Id'>
         <small id='' class='form-text text-muted'></small>
       </div>
      
	  	<div class='form-group'>
         <label for='exampleInputEmail1'>Product Name</label>
         <input type='text' class='form-control' name='productName'  placeholder='Product Name'>
         <small id='emailHelp' class='form-text text-muted'></small>
       </div>
       
	   <div class='form-group'>
         <label for='exampleInputEmail1'>Brand Name</label>
         <input type='text' class='form-control' name='brandName' placeholder='Brand Name'>
         <small id='' class='form-text text-muted'></small>
       </div>
       
	   <form name='departmentName'  method='post' action = 'product.php' method = 'post'>
       <div class='form-group'>
      
       <input type='radio' name='demo' value ='Food'> Food Section </option> 
       <input type='radio' name='demo' value='Household'> Household </option>
       <input type='radio' name='demo' value = 'Sports'> Sports </option>
       <input type='radio' name='demo' value = 'Electronics'> Electronics </option>
       <input type='radio' name='demo' value = 'Clothes'> Clothes </option>
		<!-- ============================= food section ========================= -->
       <div id='showFood' class='myDiv'>

         <div class="form-group">
              <label for="date">Manfufacture Date</label>
              <input type="date" class="form-control" name="manufactureDateFood"  placeholder="Manufacture Date">
              <small id="emailHelp" class="form-text text-muted"></small>
         </div>
         <div class="form-group">
             <label for="date">Expiry Date</label>
             <input type="date" class="form-control" name="expiryDateFood" placeholder="Expiry Date">
             <small id="" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
            <label for="text">quanity</label>
             <input type="text" class="form-control" name="quantityFood" placeholder="Quantity">
           <small id="" class="form-text text-muted"></small>
        </div> 
    
		<!-- ========================= household ================================= -->
       </div>
       <div id='showHousehold' class='myDiv'>
             <div class="form-group">
               <label for="text">Quantity</label>
               <input type="text" class="form-control" name="quantityHousehold"  placeholder="Quantity">
               <small id="emailHelp" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
              <label for="text">Category</label>
              <input type="text" class="form-control" name="categoryHousehold" placeholder="category">
              <small id="" class="form-text text-muted"></small>
             </div>
     </div>
       <!-- ============================== sports ================================== -->
	   <div id='showSports' class='myDiv'>
       <div class="form-group" >
        <label for="Comment">Warranty</label>
        <textarea class="form-control" rows="5" id="user-message" name = 'warrantySports' placeholer = "Limit 100">Limit 100</textarea>
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>

    <div class="form-group">
      <label for="Comment">Details</label>
      <textarea class="form-control" rows="5" id="comment" name = 'detailsSports'>Limit 200</textarea>
      <small id="" class="form-text text-muted"></small>
    </div>
  
    <div class="form-group">
      <label for="text">category</label>
      <input type="text" class="form-control" name="categorySports" placeholder="Category">
      <small id="" class="form-text text-muted"></small>
    </div>
       </div>
	   <!-- ========================= electronics================================ -->
       <div id='showElectronics' class='myDiv'>
       <div class="form-group">
    <label for="exampleInputEmail1">Power Rating</label>
    <input type="text" class="form-control" name="powerRatingElectronics"  placeholder="powerRating">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Warranty</label>
    <input type="text" class="form-control" name="warrantyElectronics" placeholder="warranty">
    <small id="" class="form-text text-muted"></small>
  </div>
  <div class="form-group" >
        <label for="Comment">Details</label>
        <textarea class="form-control" rows="5" id="user-message" name = "detailsElectronics" placeholer = "Limit 100">Limit 100</textarea>
        <small id="emailHelp" class="form-text text-muted"></small>
    </div>
       </div>
	   <!-- ====================================== clothes ========================= -->
       <div id='showClothes' class='myDiv'>
       <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <input type="text" class="form-control" name="categoryClothes"  placeholder="category">
    <small id="emailHelp" class="form-text text-muted"></small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Size</label>
    <select type="text" class="form-control" name="sizeClothes" placeholder="size">
      <option value = "XL"> XL</option> 
      <option value = "M"> M</option>
      <option value = "S"> S </option>
      <option value = "XXL"> XXL </option>
      </select>
      </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Season</label>
    <select type="text" class="form-control" name="seasonClothes" placeholder="size">
      <option value = "Summer Wear">Summer Wear</option> 
      <option value = "Winter Wear">Winter Wear</option>
      <option value = "Monsoon Wear">Monsoon Wear </option>
      </select>
    <small id="" class="form-text text-muted"></small>
  </div>
       </div>
         <small id='' class='form-text text-muted'></small>
       </div>

	   <!-- =================== normal products ===================== -->
       <div class='form-group'>
         <label for=''>MRP</label>
         <input type='text' class='form-control' name='mrp' placeholder='MRP'>
         <small id='' class='form-text text-muted'></small>
       </div>

       <div class='form-group'>
         <label for=''>Cost Price</label>
         <input type='text' class='form-control' name='costPrice' placeholder='MRP'>
         <small id='' class='form-text text-muted'></small>
       </div>

       <div class='form-group'>
         <label for=''>Quantity in stock</label>
         <input type='text' class='form-control' name='quantityStock' placeholder='Quantity'>
         <small id='' class='form-text text-muted'></small>
       </div>
           <button type='submit' class='btn btn-primary' >Submit</button>
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
      if (isset($_REQUEST['productID'])){
	  
		$productID = stripslashes($_REQUEST['productID']); // removes backslashes
        $productID= mysqli_real_escape_string($con,$productID); //escapes special characters in a string
		
		$productName = stripslashes($_REQUEST['productName']);
        $productName = mysqli_real_escape_string($con,$productName);
		
		$brandName = stripslashes($_REQUEST['brandName']);
        $brandName = mysqli_real_escape_string($con,$brandName);
    
        $departmentName = stripslashes($_REQUEST['demo']);
        $departmentName = mysqli_real_escape_string($con,$departmentName);
    
        $costPrice = stripslashes($_REQUEST['costPrice']);
        $costPrice = mysqli_real_escape_string($con,$costPrice);
    
        $mrp = stripslashes($_REQUEST['mrp']);
        $mrp = mysqli_real_escape_string($con,$mrp);
    
        $quantityStock = stripslashes($_REQUEST['quantityStock']);
        $quantityStock = mysqli_real_escape_string($con,$quantityStock);
	  
		// this is for 
        $categoryClothes = stripslashes($_REQUEST['categoryClothes']);
        $categoryClothes = mysqli_real_escape_string($con,$categoryClothes);
        
        $sizeClothes = stripslashes($_REQUEST['sizeClothes']);
        $sizeClothes = mysqli_real_escape_string($con,$sizeClothes);
  
      $seasonClothes = stripslashes($_REQUEST['seasonClothes']);
      $seasonClothes = mysqli_real_escape_string($con,$seasonClothes);

              
        $warrantySports = stripslashes($_REQUEST['warrantySports']); // removes backslashes
        $warrantySports= mysqli_real_escape_string($con,$warrantySports);
        
        $detailsSports = stripslashes($_REQUEST['detailsSports']); // removes backslashes
        $detailsSports = mysqli_real_escape_string($con,$detailsSports);

        $categorySports = stripslashes($_REQUEST['categorySports']); // removes backslashes
        $categorySports= mysqli_real_escape_string($con,$categorySports);

        $manufactureDateFood = stripslashes($_REQUEST['manufactureDateFood']);
        $manufactureDateFood = date("Y-m-d", strtotime($manufactureDateFood));
        
        $expiryDateFood = stripslashes($_REQUEST['expiryDateFood']);
        $expiryDateFood = date("Y-m-d", strtotime($expiryDateFood));

        $quantityFood = stripslashes($_REQUEST['quantityFood']);
        $quantityFood = mysqli_real_escape_string($con,$quantityFood);

                
        $quantityHousehold = stripslashes($_REQUEST['quantityHousehold']);
        $quantityHousehold = date("Y-m-d", strtotime($quantityHousehold));
        
        $categoryHousehold = stripslashes($_REQUEST['categoryHousehold']);
        $categoryHousehold = date("Y-m-d", strtotime($categoryHousehold));

		$powerRatingElectronics = stripslashes($_REQUEST['powerRatingElectronics']);
    $powerRatingElectronics = mysqli_real_escape_string($con,$powerRatingElectronics);
		$warrantyElectronics = stripslashes($_REQUEST['warrantyElectronics']);
    $warrantyElectronics = mysqli_real_escape_string($con,$warrantyElectronics);

    $detailsElectronics = stripslashes($_REQUEST['detailsElectronics']);
    $detailsElectronics = mysqli_real_escape_string($con,$detailsElectronics);


	if ($departmentName == 'Food'){
		$departmentName = "Food Section";
	}
        
      $query = "INSERT into `product` (productID,productName,brandName,departmentName,costPrice,MRP,quantityStock) VALUES ('$productID','$productName','$brandName', '$departmentName','$costPrice','$mrp','$quantityStock')";
      $result = mysqli_query($con,$query);
          if($result){
            echo "";
            } 
            else 
            {
              echo "";
			}
      if ($departmentName == 'Clothes' and $result == true){
		$query1 = "UPDATE clothes SET category='$categoryClothes',size='$sizeClothes',season='$seasonClothes' where productID='$productID'";
	}

      else if ($departmentName == 'Food Section' and $result == true){
		$query1 = "UPDATE  foodSection SET manufactureDate='$manufactureDateFood',expiryDate='$expiryDateFood',quantity='$quantityFood' where productID='$productID'";
      }

	else if ($departmentName == 'Sports' and $result == true){
		$query1 = "UPDATE  sports SET warranty='$warrantySports',details='$detailsSports',category='$categorySports' where productID='$productID'";
	  }
	  
	  else if ($departmentName == 'Household' and $result == true){
		$query1 = "UPDATE  household SET quantity='$quantityHousehold',category='$categoryHousehold' where productID='$productID'";
	  }
	  
	  else if ($departmentName == 'Electronics' and $result == true){
		
		$query1 = "UPDATE  electronics SET powerRating='$powerRatingElectronics',warranty='$warrantyElectronics',details='$detailsElectronics' where productID='$productID'";
      }
      $result1 = mysqli_query($con,$query1);
          if($result1){
            echo '<script language="javascript">';
			echo 'alert("successfull Insertion")';
			echo '</script>';
            } 
            else 
            {
              echo '';  
            }
        }
     
		// ==================================================================================
		// This is for desplaying the product table
		
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
	
	$sql = "SELECT * FROM product where (MRP >= $rangeLower and MRP <= $rangeUpper) and (costPrice >= $costLower 
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
			echo "
            
            <div class='col-sm-4 ' >
            
		<div class='w3-container '>
  		<div class='scroll w3-pale-red w3-hover-shadow w3-padding-32 w3-center' style='width:100% ; border-radius : 20px;'>
           		 <h3 >$productName</h3>
			   <p> Department name : $departmentName  </p>   
			   <P> Brand : $brandName </p>
			   <p> costPrice : $costPrice </p>
			   <p> MRP : $mrp </p>
			   <p> Quantity : $quantity </p>
			    
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