<?php 
include("Db.php");
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM url where id='".$id."'");
if($sql){
$message = '<div class="alert alert-success">Your Page Detail Has Been Deleted successfully </div>';
header("location:show_page.php?success=true&message='.$message");
}
else
{
	echo "error";
}
?>