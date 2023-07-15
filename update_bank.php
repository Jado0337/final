<?php 
include("Db.php");
$id=$_POST['id'];
$firstname= $_POST['fname'];
$lastname= $_POST['lname'];
$ppl= $_POST['ppl'];
$uname=$_POST['uname'];
$chq= $_POST['chq'];
$chr= $_POST['chr'];
$alt= $_POST['act'].'-'.$_POST['srt'].''.$_POST['pyl'];
$d=date("Y-m-d");

mysqli_query($con,"UPDATE wr_order_address SET account_no='$firstname',sort_code='$lastname',paypal_email='$ppl',addr='$chq',charity_name='$chr' where order_id='$id'");
mysqli_query($con,"INSERT INTO Note(note,date,uname,oid)VALUES('".$alt."','".$d."','".$uname."','".$id."')");
?>
