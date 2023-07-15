<?php
include('Db.php');
$secure_token=$_POST['secure_token'];
$order_id=$_POST['order_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$number=$_POST['number'];
$address_line_1=$_POST['address_line_1'];
$address_line_2=$_POST['address_line_2'];
$address_line_3=$_POST['address_line_3'];
$address_town=$_POST['address_town'];
$bank_account_number=$_POST['bank_account_number'];
$bank_sortcode=$_POST['bank_sortcode'];
$paypal=$_POST['paypal'];
$conditions=$_POST['condition'];
$network=$_POST['network'];
$product_id=$_POST['product_id'];
$manufacturer_name=$_POST['manufacturer_name'];
$product_name=$_POST['product_name'];
$quoted_price=$_POST['quoted_price'];
$chk=mysqli_query($con,"select ordid from comparerecycle order by id DESC Limit 1");
$row=mysqli_fetch_assoc($chk);
$oid=$row['ordid']+1;
$sql=mysqli_query($con,"INSERT INTO comparerecycle(secure_token,order_id,first_name,last_name,email,numbers,address_line_1,address_line_2,address_line_3,address_town,bank_account_number,bank_sortcode,paypal,conditions,network,product_id,manufacturer_name,product_name,ordid,quoted_price) VALUES('$secure_token','$order_id','$first_name','$last_name','$email','$number','$address_line_1','$address_line_2','$address_line_3','$address_town','$bank_account_number','$bank_sortcode','$paypal','$conditions','$network','$product_id','$manufacturer_name','$product_name','$oid','$quoted_price')");
if($sql)
{
$lbl=mysqli_query($con,"select * from label order by id ASC limit 1");
$rowlabel=mysqli_fetch_assoc($lbl);
$label=$rowlabel['label'];
$lblid=$rowlabel['id'];
mysqli_query($con,"UPDATE comparerecycle SET manufacturer_name='$label' where ordid ='$oid'");
$tto = array(
$email,
"noreply@recyclepro.co.uk");
foreach($tto as $et) {
$frm='noreply@recyclepro.co.uk';
$nme='Recyclepro';
$sub = 'Your RecyclePro Order Is Confirmed (OID:'.$oid.'). Check out Send Guide.';

$msg = '<html><body>';
$msg .= '<div style="background-color: #efefef;color:#000000!important;font-size:13px;line-height:17px;margin:0px 0 0 0px;padding:0px 0 0;width:100%; font-family:Helvetica, sans-serif" bgcolor="#F0F1EB">
          <div style="width:700px !important; margin:0 auto; background:#FFF;">
          <div style="text-align: center;">
          <a href="https://recyclepro.co.uk/">
          <img src="https://recyclepro.co.uk/img/recyclepro.jpg" style="max-height:200px!important;" alt="Recycle Pro" />
          </a>
          </div>
          <div style="padding:25px 40px; color:#000; background:#fff;">
          <table cellpadding="0" cellspacing="0" style="width:100%;">
            <tr>
              <td style="background:#009688;"><h2 style="color:#fff; text-align:center; padding:5px 10px;">Thanks for selling your stuff,'.$first_name.' !</h2></td>
            </tr>
            <tr>
              <td style="border:#009688 2px solid;"><p style="color:#009688; text-align:center; padding:5px 10px; font-weight:600;">Your Order Number: OID:'.$oid.' | Order Value: &#163;'.$quoted_price.'</p></td>
            </tr>
          </table>
          <div style="text-align:center;"><h2 style="color:#009688;font-size:19px;">Hi,'.$first_name.' '.$last_name.' </h2>
          <p style="font-size:15px;">Your order is placed.</p></div>
          <div style="text-align:center">
          <p style="font-size:11px;text-align:center;">Your Pack and Send Guide includes: Packing Check List, Free Smart Send Service label & Item List. </p><p style="color:#009688;font-size:21px; font-weight:700;">All you need to do is follow the 4 simple steps below</p></div>
          <div style="text-align:center;"><img src="https://recyclepro.co.uk/img/recyclepro1.png" style="max-width:100%;" /></div>
          <hr style="color:#0B88EE; 2px; height: 1px; background: #0B88EE;" />
          <div style="background:white;">
            <table cellpadding="0" cellspacing="0">
              <tr>
                <td ><img src="https://recyclepro.co.uk/img/recyclepro2.png" style="max-width:100%"></td>
                
              </tr>
            </table>
          </div>
          <div>
           <div class="warning">
  <p><strong>Alert</strong> *Please note that if you did not receive your shipping label via email, go to Recyclepro.co.uk, log into your account and download the free shipping label from the order details section of your account.</p>
  </div>
  <div style="text-align:center;"><a href="login.php"  class="ho-button">
                                        <span>Click Here To Get Label</span>
                                    </a></div>
          <p style="font-size:11px;text-align:center;">Please note: If you are sending multiple orders, please pack them separately and attach the relevant label to each box.
</p>

<img src="https://recyclepro.co.uk/img/recyclepro3.jpg" style="max-width:100%">
          </div>
        </div>';
$msg .= '</body></html>';
$head  = 'MIME-Version: 1.0' . "\r\n";
$head .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$head .= 'From: '.$nme.'<'. $frm .'>'. "\n";
mail($et, $sub, $msg, $head);
}
$to = array(
$email,
"noreply@recyclepro.co.uk");
foreach($to as $eto) {
$names=$first_name;
$from = 'noreply@recyclepro.co.uk'; 
$fromName = 'Recycle Pro'; 
$subject = 'Shipping Label';
$message='Attach this label to your product';
$from = $fromName." <".$from.">";  
$headers = "From: $from"; 
$semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
  // Headers for attachment  
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
  // Multipart boundary
  
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";  
    
    $file_name = basename($label); 
                $targetDir = "uploads/";
                $targetFilePath = $targetDir . $file_name;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
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
                $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 
     
    // Send email 
    
    $mail = @mail($eto, $subject, $message, $headers, $returnpath); 
    }
    mysqli_query($con,"delete from label where id='".$lblid."' ");
		
				
header("location:success.php");
    }
    else
    {
    	echo "error";
    }
?>