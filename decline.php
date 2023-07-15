<?php
include('Db.php');
$id=$_POST['id'];
$to = 'noreply@recyclepro.co.uk';
$from='noreply@recyclepro.co.uk';
$name='Recyclepro';
$subject = "Revised Email";
$message='order no#'.$id.'cancelled its order';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$name.'<'. $from .'>'. "\n";
if(mail($to, $subject, $message, $headers)){
      mysqli_query($con,"UPDATE wr_order SET order_status='cancelled' where id='$id'");
    mysqli_query($con,"UPDATE comparerecycle SET status='cancelled' where ordid='$id'");
   header("location: success.php");
} else{
    echo 'Unable to send email. Please try again.';
}
?>