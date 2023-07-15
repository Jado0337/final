<?php
session_start();

foreach($_SESSION['products'] AS $product){
//print_r($product);
$pid =  $product['pid'];
echo "<li>$pid</li>";
}


?>