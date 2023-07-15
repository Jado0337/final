<?php 
include("Db.php");
$id=$_POST['id'];
mysqli_query($con,"UPDATE wr_order SET order_status='Canceled' where id='$id'");
?>