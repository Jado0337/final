<?php
include('Db.php');
$query= "SELECT distinct(wr_user.email) FROM wr_user LEFT JOIN wr_order ON wr_user.id = wr_order.user_id where wr_order.order_status='Placed' ";
$result= mysqli_query($con, $query) 
or die ('Error querying database.');
while ($row = mysqli_fetch_array($result)) {
$email= $row['email'];
$from='noreply@recyclepro.co.uk';
$name='Recyclepro';
$subject = "Placed Order";
$headers = 'From: '.$name.'<'. $from .'>'. "\n";
$msg= "Followup Email By Recyclepro";
if(mail($email, $subject, $msg, $headers)){
     header("location: success.php");
} else{
    echo 'Unable to send email. Please try again.';
}

}

?>
