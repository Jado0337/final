<?php






$to = 'sabirsaleem70@gmail.com';

$subject = 'the subject';
$message = "<img src='https://cdn-icons-png.flaticon.com/512/241/241528.png' />";
$headers = 'From: info@recyclepro.co.uk'       . "\r\n" .
'Reply-To: info@recyclepro.co.uk' . "\r\n" .
'X-Mailer: PHP/' . phpversion();
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

mail($to, $subject, $message, $headers);
    

?>