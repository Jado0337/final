<?php 
include("Db.php");
$id=$_POST['id'];
$phn= $_POST['phn'];
$cntry= $_POST['cntry'];
$stt= $_POST['stt'];
mysqli_query($con,"UPDATE wr_user SET phone='$phn',country='$cntry',DOB='$stt' where id='$id'");
?>