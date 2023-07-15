<?php 
include("Db.php");
$id=$_POST['id'];
$name= $_POST['name'];
$url= $_POST['url'];
$title= $_POST['title'];
$keywords= $_POST['keywords'];
$description= $_POST['description'];
mysqli_query($con,"UPDATE url SET page_name='$name',url='$url',title='$title',keywords='$keywords',description='$description' where id='$id'");
$message = '<div class="alert alert-success">Your Page Detail Has Been Updated successfully </div>';
header("location:show_page.php?success=true&message='.$message");
?>