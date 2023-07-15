<?php 
include("Db.php");
$id=$_POST['id'];
$addr1= $_POST['addr1'];
$addr2= $_POST['addr2'];
$pcode= $_POST['pcode'];
mysqli_query($con,"UPDATE wr_user SET address1='$addr1',address2='$addr2',postcode='$pcode' where id='$id'");
?>