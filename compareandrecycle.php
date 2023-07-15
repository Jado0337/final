<?php
include('Db.php');
$secure_token=isset($_POST['secure_token']) ? $_POST['secure_token'] :'';
$order_id=isset($_POST['order_id']) ? $_POST['order_id'] :'';
$first_name=isset($_POST['first_name']) ? $_POST['first_name'] :'';
$last_name=isset($_POST['last_name']) ? $_POST['last_name'] :'';
$email=isset($_POST['email']) ? $_POST['email'] :'';$_POST['email'];
$number=isset($_POST['number']) ? $_POST['number'] :'';$_POST['number'];
$address_line_1=isset($_POST['address_line_1']) ? $_POST['address_line_1'] :'';
$address_line_2=isset($_POST['address_line_2']) ? $_POST['address_line_2'] :'';
$address_line_3=isset($_POST['address_line_3']) ? $_POST['address_line_3'] :'';
$address_town=isset($_POST['address_town']) ? $_POST['address_town'] :'';
$bank_account_number=isset($_POST['bank_account_number']) ? $_POST['bank_account_number'] :'';
$bank_sortcode=isset($_POST['bank_sortcode']) ? $_POST['bank_sortcode'] :'';
$paypal=isset($_POST['paypal']) ? $_POST['paypal'] :'';
$conditions=isset($_POST['condition']) ? $_POST['condition'] :'';
$network=isset($_POST['network']) ? $_POST['network'] :'';
$product_id=isset($_POST['product_id']) ? $_POST['product_id'] :'';
$manufacturer_name=isset($_POST['manufacturer_name']) ? $_POST['manufacturer_name'] :'';
$product_name=isset($_POST['product_name']) ? $_POST['product_name'] :'';
$quoted_price=isset($_POST['quoted_price']) ? $_POST['quoted_price'] :'';
$address_postcode=isset($_POST['address_postcode']) ? $_POST['address_postcode'] :'';
$address_country=isset($_POST['address_country']) ? $_POST['address_country'] :'';
$addd=str_replace("'","",$address_line_1);
$add2=str_replace("'","",$address_line_2);
$add3=str_replace("'","",$address_line_3);
 ini_set('display_errors', 1);
$chk=mysqli_query($con,"select ordid from comparerecycle order by id DESC Limit 1");
$row=mysqli_fetch_assoc($chk);
$oid=$row['ordid']+1;
if(!empty($order_id)){
$sql=mysqli_query($con,"INSERT INTO comparerecycle(secure_token,order_id,first_name,last_name,email,numbers,address_line_1,address_line_2,address_line_3,address_town,bank_account_number,bank_sortcode,paypal,conditions,network,product_id,manufacturer_name,product_name,ordid,quoted_price,status,address_country,address_postcode) VALUES('$secure_token','$order_id','$first_name','$last_name','$email','$number','$addd','$add2','$add3','$address_town','$bank_account_number','$bank_sortcode','$paypal','$conditions','$network','$product_id','$manufacturer_name','$product_name','$oid','$quoted_price','Placed','$address_postcode','$address_country')");

if($sql)
{
    $lbl=mysqli_query($con,"select * from label order by id ASC limit 1");
    $rowlabel=mysqli_fetch_assoc($lbl);
$label=$rowlabel['label'];
$lblid=$rowlabel['id'];
$files=array($label);
    /*$lbl=mysqli_query($con,"select * from label order by id ASC limit 1");
    $rowlabel=mysqli_fetch_assoc($lbl);
$label=$rowlabel['label'];
$lblid=$rowlabel['id'];
 $lbls=mysqli_query($con,"select * from specials_label order by id ASC limit 1");
    $rowlabel=mysqli_fetch_assoc($lbls);
$lab=$rowlabels['label'];
$lbd=$rowlabels['id'];
$files=array($label,$lab);
*/
    

mysqli_query($con,"UPDATE comparerecycle SET manufacturer_name='$label' where ordid ='$oid'");
$tto = array(
$email,
"aqeelnaeem@recyclepro.co.uk");
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
          
          <hr style="color:#0B88EE; 2px; height: 1px; background: #0B88EE;" />
          <div style="background:white;">
            <table cellpadding="0" cellspacing="0">
              <tr>
                <td ><img src="https://recyclepro.co.uk/img/recyclepro1.png" style="max-width:100%"></td>
                
              </tr>
            </table>
          </div>
          <div>
           <div class="warning">
  <p><strong>Alert</strong> *Please note that if you did not receive your shipping label via email, go to Recyclepro.co.uk, log into your account and download the free shipping label from the order details section of your account.</p>
  <p><strong>Would you like to get it collected ?</strong> </p>
  </br>
  <p>Royal Mail now offer a <a style="color:#00adff;" href="https://send.royalmail.com/collect/youritems">collection service</a> where you can arrange to have your return collected from your home or work.  You will have your prepaid returns label which is sent to you via email, and all you need to do is follow the steps to book a collection from your desired address.</p>
  <p style="margin-top:20px;">When <a style="color:#00adff;" href="https://send.royalmail.com/collect/youritems">booking your collection</a>, tick the second option: that I purchased via Send an item or other similar service, or postage for an item being returned using a Royal Mail Tracked Return service.</p>
  <p style="margin-top:20px;">Then tick the option: Yes, there’s a tracking number (you can find your returns tracking information on your prepaid returns label in your email usually will be in this format: #AB 1111 0001 2GB#). This will allow you to track the progress of your return to us.
When inputting a weight, the weight can be maximum in that catagory depending on the size of the parcel you are sending in. If you are not sure just select the 2kg for watch, phone, laptop and gaming consoles and 5kg for Pc and imacs.</p>
<p>All you then need to do is to provide your address from where you wish Royal Mail to collect your Parcel and choose a collection date that suits you before paying for your collection.</p>
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
"aqeelnaeem@recyclepro.co.uk");
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
    
     for($i=0;$i<count($files);$i++){ 
    $file_name = basename($files[$i]); 
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
     }
                $message .= "--{$mime_boundary}--"; 
    $returnpath = "-f" . $from; 
     
    // Send email 
    
    $mail = @mail($eto, $subject, $message, $headers, $returnpath); 
    }
    mysqli_query($con,"delete from label where id='".$lblid."' ");
$return_arr= array("order_id" => $oid,
                    "result" => "success",
                    "message" => null);
                    echo json_encode($return_arr);
    }
    else
    {
    $return_arr= array("order_id" => $oid,
                    "result" => "failure",
                    "message" =>error_reporting(E_ERROR));
                    echo json_encode($return_arr);
    }
}
else{
    $return_arr= array("order_id" => null,
                    "result" => "failure",
                    "message" => "Order ID is Null");
                    echo json_encode($return_arr);
     
}
?>