<?php 
include("Db.php");
$id=$_GET['id'];
mysqli_query($con,"UPDATE wr_order SET order_status='Unsubscribe' where id='$id'");
 header("location:https://recyclepro.co.uk/unsub.php");
?>