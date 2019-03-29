<?php
// Start the session
session_start();
require('config.php');
$array_cart=array();
print_r($array_cart);
$cartname=array();
$cartprice=array();
$cartquantiy=array();
$val = $_SESSION['array'];
$cartname_s = $_SESSION['cartname'];
$cartprice_s = $_SESSION['cartprice'];
$cartquantity_s = $_SESSION['cartquantity'];
$array_cart=array_merge($val,$array_cart);
print_r($array_cart);
$cartname=array_merge($cartname_s,$cartname);
$cartprice=array_merge($cartname_s,$cartname);

$sql = "SELECT productID FROM product ";
$run_query = mysqli_query($con,$sql);
$flag=0;
while($row = mysqli_fetch_array($run_query)){
    $y=$row['productID'];
    if($_POST["$y"])
    {
        $m=$y;
        echo"sucess";
        echo"$m";
        array_push($array_cart,$m);
        print_r($array_cart);
        $flag = 1;
    }
}
print_r($array_cart);
$_SESSION['array']=$array_cart;
if($flag==0)
{
    echo"fail";
}
 header( "Location:cashier.php" );
?>