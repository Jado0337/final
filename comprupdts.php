<?php 
include("Db.php");
$id=$_GET['id'];
mysqli_query($con,"UPDATE comparerecycle SET status='Unsubscribe' where id='$id'");
 header("location:https://recyclepro.co.uk/unsub.php");
?>