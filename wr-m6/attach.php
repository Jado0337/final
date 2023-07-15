<?php
include('Db.php');
$uid=$_POST['uid'];
$oid=$_POST['oid'];
$sqlyr = "select email from wr_user where id='".$uid."' ";
            $recordyr = mysqli_query($con,$sqlyr);
            while($year=mysqli_fetch_array($recordyr))
            {
                  $email=$year['email'];
                  $name=$year['fname'];
                  $name1=$year['lname'];
            }
$to = $email;
$names=$name.' '.$name1;
$from = 'noreply@recyclepro.co.uk'; 
$fromName = 'Recycle Pro'; 
$subject = 'Revised Images Email';
$message='Revised Images Email';
$from = $fromName." <".$from.">";  
$headers = "From: $from"; 
$countfiles = count($_FILES['image']['name']); 
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
  // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
  // Multipart boundary  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";  
  // Preparing attachment 
   for($i=0;$i<$countfiles;$i++){ 
            $file_name = basename($_FILES['image']['name'][$i]); 
                $file_size = filesize($_FILES['image']['size'][$i]); 
                $targetDir = "uploads/";
                $targetFilePath = $targetDir . $file_name;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES['image']['tmp_name'][$i], $targetFilePath);
                $uploadedFile = $targetFilePath;
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($uploadedFile, "rb"); 
                $data =  @fread($fp,filesize($uploadedFile)); 
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".$uploadedFile."\"\n" .  
                "Content-Description: ".$uploadedFile."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".$uploadedFile."\"; size=".$uploadedFile.";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
          } 
     
    $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 
     
    // Send email 
    $mail = @mail($to, $subject, $message, $headers, $returnpath);  
     
    // Return true, if email sent, otherwise return false 
    if($mail){ 
         $message = '<div class="alert alert-success">Email has been sent successfully </div>';
         header("location: wr-m6/manageorders.php?index=view&id=$oid&message='.$message");
    }else{ 
        return false; 
    } 


?>
