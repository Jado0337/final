<?php 
include("Db.php");
$id=$_GET['id'];
$sql=mysqli_query($con,"DELETE FROM label where id='".$id."'");
if($sql){
$message = '<div class="alert alert-success">Your Label Has Been Deleted successfully </div>';
header("location:show_label.php?success=true&message='.$message");
}
else
{
	echo "error";
}
?>