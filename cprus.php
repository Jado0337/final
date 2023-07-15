<?php 
include("Db.php");
$id=$_GET['id'];
mysqli_query($con,"UPDATE comparerecycle SET status='Posted' where id='$id'");
 header("location:https://recyclepro.co.uk/unpst.php");
?>