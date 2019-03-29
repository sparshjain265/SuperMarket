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
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Hi Admin</a></li>
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
      <h2>Admin</h2>
      <ul class="nav nav-pills nav-stacked">
      <li class="active"><a href="Admin.php">Dashboard</a></li>
        <li><a href="#">Insert</a></li>
        <li><a href="#">Delete</a></li>
        <li><a href="#">Employee</a></li>
      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
     
        <h2 style="color:red;text-align:center">Dashboard</h2>
        
      
      <div class="row">
      <a href="admin_products.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3 >PRODUCTS</h3>
    </a>
   
   
  </div>
</div>
          </div>
        </div>
        <a href="index.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>CUSTOMERS</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
        <a href="admin_department.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>DEPARTMENT</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
        <a href="index.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 20rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>DISCOUNT</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
      </div>
      <div class="row">
      <a href="admin_electronics.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 20rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3 >ELECTRONICS</h3>
    </a>
   
  </div>
</div>
          </div>
        </div>
        <a href="admin_clothes.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 20rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>CLOTHES</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
        <a href="admin_foodsection.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 20rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
     <h3>FOOD SECTION </h3>
    </a>
    </div>
  </div>
          </div>
        </div>
        <a href="admin_household.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>HOUSEHOLD</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
      </div>
      <div class="row">
      <a href="admin_sports.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>SPORTS</h3>
    </a>
   
  </div>
</div>
          </div>
        </div>
        <a href="index.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>SALES</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
        <a href="index.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>BILL</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
        <a href="index.php">
        <div class="col-sm-3" >
       
          <div class="well" style="background-color:pink">
          <div class="card " style="width: 18rem;" style="background-color:lightblue">
          <div class="card-body text-center ">
    <h3>SUPPLIED</h3>
    </a>
    </div>
  </div>
          </div>
        </div>
      </div>

   
      
    </div>
  </div>
</div>

</body>
</html>
