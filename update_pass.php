<?php 
include("Db.php");
$email= $_POST['email'];
$password= $_POST['password'];
$check=mysqli_query($con,"select * from wr_user where email='$email'");
if(mysqli_num_rows($check)>0)
{
mysqli_query($con,"UPDATE wr_user SET password='$password' where email='$email'");
$message = '<div class="alert alert-success">Your Password Has Been Updated successfully </div>';
header("location:login.php");
}
else
{
$message = '<div class="alert alert-danger">Your Email is Incorrect </div>';
header("location:update_password.php?success=false&message='.$message");
}
?>