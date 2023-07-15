<?php
session_start();
include('Db.php');
$uid=$_POST['odi'];
$uname=$_POST['revs'];
$sqlyr = mysqli_query($con,"UPDATE `comparerecycle` SET `revs`='$uname' WHERE id='$uid'");
if($sqlyr){ 
         header("location: wr-m6/mngorders.php?index=view&id=$uid");
    }else{ 
        return false; 
    } 
    ?>