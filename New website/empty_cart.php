<?php
require('config.php');
session_start();
// Start the session
session_start();
require('config.php');
$array_cart=array();
$cartname=array();
$cartprice=array();
$cartquantiy=array();
$val = $_SESSION['array'];
/* $cartname_s = $_SESSION['cartname'];
$cartprice_s = $_SESSION['cartprice'];
$cartquantity_s = $_SESSION['cartquantity']; */
$array_cart=array_merge($val,$array_cart);
/* $cartname=array_merge($cartname_s,$cartname);
$cartprice=array_merge($cartname_s,$cartname); */

$array_counts=$_SESSION['array_count'];

$sql = "SELECT * FROM product ";
$run_query = mysqli_query($con,$sql);
$flag=0;
while($row = mysqli_fetch_array($run_query)){
   $flag++;
    $y=$row['productID'];
    if($_POST["$y"])
    {
        $m=$y;
      //   echo"$m";
      //   echo $row['productName'];
        foreach ($array_counts as $key => $element) {
           if($m==$key)
           {
               $array_counts[$key] = $element - 1;
               if($element==1)
               {
                   unset($array_counts[$key]);  
               }
              /* echo $row['productName']; */

              foreach ($val as $i => $item)
              {
                 if($item==$key)
                 {
                    array_splice($val,$i,1);
                    break;
                 }
              }
           }
        }
       
        $_SESSION['array_count']=$array_counts;
        $_SESSION['array']=$val;
      //   print_r($_SESSION['array_count']);
      //   print_r($_SESSION['array']);
    }
}

header( "Location:cashiercart.php" ); 



 
 
 ?>