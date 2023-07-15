<?php
include('Db.php');
$name=$_POST['name'];
$url=$_POST['url'];
$title=$_POST['title'];
$keywords=$_POST['keywords'];
$description=$_POST['description'];
$sql=mysqli_query($con,"insert into url(page_name,url,title,keywords,description) values('$name','$url','$title','$keywords','$description')");
if($sql)
{
	$message = '<div class="alert alert-success">Your Data Has Been Enter successfully </div>';
header("location:managepage.php?success=true&message='.$message");
	}
	else
	{
	$message = '<div class="alert alert-danger">There Is Some Error  </div>';
header("location:managepage.php?success=false&message='.$message");
	}
?>