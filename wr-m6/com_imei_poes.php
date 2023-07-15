<?php
include('Db.php');
$fltmp= $_POST['imei'];
$flpmt= $_POST['poes'];
$id= $_POST['id'];
$sql=mysqli_query($con,"UPDATE comparerecycle SET imei='$fltmp', ponm='$flpmt' where ordid='$id'");
if($sql)
{
    $message = '<div class="alert alert-success">Your Data Has Been Enter successfully </div>';
header("location:wr-m6/mngorder.php?index=view&id='.$id.'");
    }
    else
    {
    $message = '<div class="alert alert-danger">There Is Some Error  </div>';
header("location:wr-m6/mngorder.php?success=false&message='.$message");
    }

?>