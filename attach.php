<?php
include('Db.php');
$uid=$_POST['uid'];
$oid=$_POST['oid'];
$image=$_FILES['image']['name'];
$imagetmp=$_FILES['image']['tmp_name'];

 $sqlyr = "select email from wr_user where id='".$uid."' ";
            $recordyr = mysqli_query($con,$sqlyr);
            while($year=mysqli_fetch_array($recordyr))
            {
                  $email=$year['email'];
            }
            echo $email;
            ?>
            
