<?php 
include("Db.php");
$id=$_POST['id'];
$firstname= $_POST['fname'];
$lastname= $_POST['lname'];
mysqli_query($con,"UPDATE wr_user SET fname='$firstname',lname='$lastname' where id='$id'");
?>