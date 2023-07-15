<?php 
include("Db.php");
$id=$_GET['id'];
mysqli_query($con,"UPDATE wr_order SET order_status='Posted' where id='$id'");
 header("location:https://recyclepro.co.uk/unpst.php");
?>