<?php
$to = 'sabirsaleem70@gmail.com';
$from='sabirsaleem70@gmail.com';
$name='Recyclepro';
$subject = "My subject";
$message="Tests";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$name.'<'. $from .'>'. "\n";
if(mail($to, $subject, $message, $headers)){
     header("location: success.php");
} else{
    echo 'Unable to send email. Please try again.';
}
?>
