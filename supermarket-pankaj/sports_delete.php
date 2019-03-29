<?php
// Start the session
session_start();
require('config.php');
$sql = "SELECT productID FROM product where departmentName = 'sports'";
$run_query = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($run_query)){
    $y=$row['productID'];
    if($_POST["$y"])
    {
        $m=$y;
    }
}
?>
<?php




echo "$user_id";
echo "$name1";
echo "$m";

$query = "DELETE  FROM product WHERE productID='$m'";
$result = mysqli_query($con,$query);
        if($result){
          echo "success";
      }
      else{
          echo "fail";
      }
      /*
header( "Location:admin_sports.php" ); die;*/
?>