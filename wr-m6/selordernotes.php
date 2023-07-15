<?php
session_start();
include('Db.php');
$uid=$_POST['odi'];
$uname=$_POST['uname'];
$rvw=$_POST['review'];
$d=date("Y/m/d");
$sqlyr = mysqli_query($con,"INSERT INTO Note(note,date,uname,oid,User)VALUES('".$rvw."','".$d."','".$uname."','".$uid."','".$_SESSION['adminname']."')");
if($sqlyr){ 
         header("location: wr-m6/mngselorder.php?index=view&id=$uid");
    }else{ 
        return false; 
    } 
    ?>