<?php
include('Db.php');

$email = (isset($_POST['email']) && $_POST['email'] != '') ? $_POST['email'] : '';
$first_name = (isset($_POST['first_name']) && $_POST['first_name'] != '') ? $_POST['first_name'] : '';
$last_name = (isset($_POST['last_name']) && $_POST['last_name'] != '') ? $_POST['last_name'] : '';
$phone = (isset($_POST['phone']) && $_POST['phone'] != '') ? $_POST['phone'] : '';
$house_name = (isset($_POST['house_name']) && $_POST['house_name'] != '') ? $_POST['house_name'] : '';
$house_number = (isset($_POST['house_number']) && $_POST['house_number'] != '') ? $_POST['house_number'] : '';
$house_name_number = (isset($_POST['house_name_number']) && $_POST['house_name_number'] != '') ? $_POST['house_name_number'] : '';
$street = (isset($_POST['street']) && $_POST['street'] != '') ? $_POST['street'] : '';
if ($house_name_number != '') {
$street1 = $house_name_number.' '.$street;
} else {
$street1 = $house_number.$house_name.' '.$street;
}
$city = (isset($_POST['city']) && $_POST['city'] != '') ? $_POST['city'] : '';
$county = (isset($_POST['county']) && $_POST['county'] != '') ? $_POST['county'] : '';
$country = (isset($_POST['country']) && $_POST['country'] != '') ? $_POST['country'] : '';
$postcode = (isset($_POST['postcode']) && $_POST['postcode'] != '') ? $_POST['postcode'] : '';
$company_name = (isset($_POST['company_name']) && $_POST['company_name'] != '') ? $_POST['company_name'] : '';
$device_id = (isset($_POST['device_id']) && $_POST['device_id'] != '') ? $_POST['device_id'] : ''; //sellmyphone device id
$device_name = (isset($_POST['device_name']) && $_POST['device_name'] != '') ? $_POST['device_name'] : ''; // Apple iPhone 5 16GB
$device_price = (isset($_POST['device_price']) && $_POST['device_price'] != '') ? $_POST['device_price'] : '';  // 102.10

$device_grade_id = (isset($_POST['device_grade_id']) && $_POST['device_grade_id'] != '') ? $_POST['device_grade_id'] : '';  // 1,2,10
$device_grade = (isset($_POST['device_grade']) && $_POST['device_grade'] != '') ? $_POST['device_grade'] : '';        // working, broken, new


$network = (isset($_POST['network']) && $_POST['network'] != '') ? $_POST['network'] : '';  // Unlocked, Other, EE, Orange, T-Mobile, Three, Vodafone, O2, Tesco, Virgin, Lyca Mobile, Giff Gaff

//$network_id = (isset($_POST['network_id']) && $_POST['network_id'] != '') ? $_POST['network_id'] : '';  // 1, 2, 3, 4, 5 etc

$payment_method = (isset($_POST['payment_method']) && $_POST['payment_method'] != '') ? $_POST['payment_method'] : ''; //bacs, cheque, paypal
$bank_sort_code = (isset($_POST['bank_sort_code']) && $_POST['bank_sort_code'] != '') ? $_POST['bank_sort_code'] : ''; //123456
$bank_account_number = (isset($_POST['bank_account_number']) && $_POST['bank_account_number'] != '') ? $_POST['bank_account_number'] : '';  //12345678

$bank_account_name = (isset($_POST['bank_account_name']) && $_POST['bank_account_name'] != '') ? $_POST['bank_account_name'] : ''; //only if bacs selected - Mr Test Testman

$name_on_cheque = (isset($_POST['name_on_cheque']) && $_POST['name_on_cheque'] != '') ? $_POST['name_on_cheque'] : ''; //only if cheque selected - Mr Test Testman
$paypal_email = (isset($_POST['paypal_email']) && $_POST['paypal_email'] != '') ? $_POST['paypal_email'] : ''; //only if paypal selected - test@test.com
/*$first_name = 'Ian';
    /*$first_name = 'Ian';

    $last_name = 'Lawrence';

    $email = 'ilawrence_1987@outlook.com';

    $phone = '07759552135';

    $house_name_number = '19-21 Flat 3';

    $street = 'Rock Street';

    $city = 'Wellingborough';

    $postcode = 'NN84FX';

    $county = 'Northamptonshire';

    $country = 'United Kingdom';

    $company_name = '';

    $device_id= '68';

    $device_name= 'Apple iPhone 13 128GB';

    $device_price = '461.00';

    $device_grade_id = '1';

    $device_grade = 'working';

    $network_id = '1';

    $network = 'unlocked';

    $payment_method= 'bacs';

    $bank_account_name = 'Mr Ian lawrence';

    $bank_sort_code = '162627';

    $bank_account_number = '10876481';

    $name_on_cheque = '';

    $paypal_email= '';
*/
$sql=mysqli_query($con,"INSERT INTO sellmyphones(email,first_name,last_name,phone,house_name,house_number,house_name_number,street,city,county,country,postcode,device_id,device_name,device_price,device_grade_id,device_grade,bank_sort_code,bank_account_number,bank_account_name,name_on_cheque,paypal_email,status,label,network,payment_method) VALUES('$email','$first_name','$last_name','$phone','$house_name','$house_number','$house_name_number','$street1','$city','$county','$country','$postcode','$device_id','$device_name','$device_price','$device_grade_id','$device_grade','$bank_sort_code','$bank_account_number','$bank_account_name','$name_on_cheque','$paypal_email','Placed','','$network','$payment_method')");
$chk=mysqli_query($con,"select id from sellmyphones order by id DESC Limit 1");
$row=mysqli_fetch_assoc($chk);
$oid=$row['id'];

  $lbl=mysqli_query($con,"select * from label order by id ASC limit 1");
    $rowlabel=mysqli_fetch_assoc($lbl);
$label=$rowlabel['label'];
$lblid=$rowlabel['id'];
$files=array($label);


mysqli_query($con,"UPDATE sellmyphones SET label='$label' where id ='$oid'");
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
              <td style="border:#009688 2px solid;"><p style="color:#009688; text-align:center; padding:5px 10px; font-weight:600;">Your Order Number: OID:'.$oid.' | Order Value: &#163;'.$device_price.'</p></td>
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
echo $oid;

?>