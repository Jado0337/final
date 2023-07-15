<?php
include('Db.php');
$fltmp= $_POST['ime'];
$flpmt= $_POST['pos'];
$id= $_POST['oid'];
$sql=mysqli_query($con,"UPDATE comparerecycle SET imei='$fltmp', ponm='$flpmt' where id='$id'");
if($sql)
{
    $message = '<div class="alert alert-success">Your Data Has Been Enter successfully </div>';
header("location:wr-m6/mngorder.php");
    }
    else
    {
    $message = '<div class="alert alert-danger">There Is Some Error  </div>';
header("location:wr-m6/mngorder.php?success=false&message='.$message");
    }

?>