<?php
include('Db.php');
$fltmp= $_FILES['image']['tmp_name'];
        
        $fname= $_FILES['image']['name'];
        $id= $_POST['oid'];
        $targetDir = "uploads/";
        $targetFilePath = $targetDir . $fname;
        move_uploaded_file($fltmp, $targetFilePath);
        $sql=mysqli_query($con,"UPDATE comparerecycle SET manufacturer_name='$fname' where id='$id'");
   
if($sql)
{
    $message = '<div class="alert alert-success">Your Data Has Been Enter successfully </div>';
header("location:wr-m6/mngorder.php?success=true&message='.$message");
    }
    else
    {
    $message = '<div class="alert alert-danger">There Is Some Error  </div>';
header("location:wr-m6/mngorder.php?success=false&message='.$message");
    }

?>