<?php
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/pages/pages.class.php');
$layout_obj = new LayoutClass();
$page_obj = new PagesClass();
extract($_REQUEST);

if($p==1)
$pagename='about';
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<?php
include('Db.php');
$urs= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$con = mysqli_connect("localhost", "recycleproco_sohaib", "123@Screw@@", "recycleproco_experiment") or die("Error " . mysqli_error($con));
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sql="select * from url where url='$url' ";
            $record=mysqli_query($con,$sql);
           while($row=mysqli_fetch_array($record))
            {
            	$title=$row['title'];
            	$keywords=$row['keywords'];
            	$description=$row['description'];
            }
 ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description;  ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.webp">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
<link rel="canonical" href="terms.php"/>
    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="terms.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="js/page.js"></script>
    <?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
  <style>
      th{
          width:50%;
      }

      a {
  color: #003ef7;
}
  </style>

</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead($pagename); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Terms & Condition</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <div class="d-flex justify-content-center mt-20">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">

                            <div class="tab-vertical">
                                <div class="row">
                                <div class="col-sm-2">
                                <ul class="nav nav-tabs" id="myTab3" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Tech Price Promise</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">Fast Same-Day Payment</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact" aria-selected="false">Important Selling Rules</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="conditions-vertical-tab" data-toggle="tab" href="#conditions-vertical" role="tab" aria-controls="conditions" aria-selected="false">Meaning of These Terms and Conditions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="terms-vertical-tab" data-toggle="tab" href="#terms-vertical" role="tab" aria-controls="terms" aria-selected="false">Use of Recycle Pro</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cancellation-vertical-tab" data-toggle="tab" href="#cancellation-vertical" role="tab" aria-controls="cancellation" aria-selected="false">Your Cancellation Rights</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="sending-vertical-tab" data-toggle="tab" href="#sending-vertical" role="tab" aria-controls="sending" aria-selected="false">Sending Your Items to Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="packages-vertical-tab" data-toggle="tab" href="#packages-vertical" role="tab" aria-controls="packages" aria-selected="false">Lost or Stolen Packages</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Return-vertical-tab" data-toggle="tab" href="#Return-vertical" role="tab" aria-controls="Return" aria-selected="false">Return of Tech Items</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Activation-vertical-tab" data-toggle="tab" href="#Activation-vertical" role="tab" aria-controls="Activation" aria-selected="false">Activation Locked Device</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Data-vertical-tab" data-toggle="tab" href="#Data-vertical" role="tab" aria-controls="Data" aria-selected="false">Data Removal</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Paid-vertical-tab" data-toggle="tab" href="#Paid-vertical" role="tab" aria-controls="Paid" aria-selected="false">Getting Paid</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Promotional-vertical-tab" data-toggle="tab" href="#Promotional-vertical" role="tab" aria-controls="Promotional" aria-selected="false">All Promotional Codes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Donate-vertical-tab" data-toggle="tab" href="#Donate-vertical" role="tab" aria-controls="Donate" aria-selected="false">Donate to Charity</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="iCloud-vertical-tab" data-toggle="tab" href="#iCloud-vertical" role="tab" aria-controls="iCloud" aria-selected="false">iCloud Account</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Samsung-vertical-tab" data-toggle="tab" href="#Samsung-vertical" role="tab" aria-controls="Samsung" aria-selected="false">Unlock your Samsung</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Privacy-vertical-tab" data-toggle="tab" href="#Privacy-vertical" role="tab" aria-controls="Privacy" aria-selected="false">Privacy Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="huawei-vertical-tab" data-toggle="tab" href="#huawei-vertical" role="tab" aria-controls="huawei" aria-selected="false">Data Collect</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Utilize-vertical-tab" data-toggle="tab" href="#Utilize-vertical" role="tab" aria-controls="Utilize" aria-selected="false">Utilize Your Data</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="Transfer-vertical-tab" data-toggle="tab" href="#Transfer-vertical" role="tab" aria-controls="Transfer" aria-selected="false">Personal Data</a>
                                    </li>
                                </ul>
                               </div>
                               <div class="col-sm-10">
                                <div class="tab-content" id="myTabContent3">
                                    <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-vertical-tab">
                                        <h3>Tech Price Promise</h3>
                                        <p class="lead">Guaranteed price payment as promised or return of tech for FREE</p><p>Do you worry about price changes while selling your tech? Well, not with us! Buyers often revise prices from the actual quote after receiving the item, which wastes both your time and delivery costs.</p><p>Here at Recycle Pro, we care for you and your time, which is why we offer the Recycle Pro Tech Price Promise.</p><p>Unlike others, the Recycle Pro Tech Price promise guarantees payment of the quoted amount or your tech will be sent back to you free of charge. This means absolutely NO shipping charges!</p>
                                        <h4>How does it work?</h4>
                                        <p>We will offer a guaranteed price based on the provided description of the tech you are selling.</p><p>Our technicians will assess the tech’s quality and if it differs from its provided description, we may have to lower our former offer</p><p>In such a case, you will receive the revised price offer via email, which you may accept or decline in 14 days. If you decline, we will deliver your equipment back to you FREE of charge.</p>
                                        <h4>Unbelievable Isn’t It?</h4>
                                        <p>It may seem unbelievable, but it is as true as it could get. We priorities customer satisfaction, so we try to ease things for the customer as best as we can. If you are unhappy with the revised offer, we promise to deliver your tech back to you WITHOUT a shipping fee.</p><p>Please keep in mind that If no response is received from the customer on the revised price offer within 14 days, we will process the item at the revised price offer.</p>

                                    </div>
                                    <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">
                                        <h3>Fast Same-Day Payment</h3>
                                        <h4>We pay quicker than other sites for your unwanted items</h4><p>Other sites generally take 3-5 business days to transfer payments, but as much as we care for the environment, we care about your time too. Instead of such a long wait, we will pay you within 23 hours we receive your tech. Isn’t that convenient?</p>
                                        <h4>Get fast cash for your Tech</h4>
                                        <p>Our technicians will run a quick quality assessment check right after we receive your device. You will be paid the exact amount quoted to you IN TIME . You don’t have to worry about the price of your tech as our Tech Price Promise quotes you the best price, and if you’re unhappy with it, you can get your device back for FREE</p>
                                        <h4>Faster than BACS transfer</h4>
                                        <p>Selling your tech is easier when you know when you will be paid. Instead of the 3-5 working days that other sites take to transfer payment through BACS, we save your time and pay you the WITHIN 23 HOURS we receive your device.</p>
                                        <h4>Earn money fast!</h4>
                                        <p>Earning quick cash cannot get any easier! If you need money to pamper yourself, go for an outing or do some shopping, Recycle Pro is your number 1 solution. Moreover, selling your tech is FREE with us</p><p>Simply get a quick price for your device, pack it in a box and post it to us for FREE and your money will be in your account even before you know it!</p>
                                        <h5 style="text-align: center;">*Fast 23 hours payment applies to items received before 12 pm. Working days exclude Saturdays, Sundays, and public holidays. Items received after 12pm will be paid for the next working day. In case the customer has received a revised price offer from us, the payment will be processed after the customer has responded to the offer.</h5>
                                    </div>
                                    <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                                        <h3>Important Selling Rules</h3>
                                        <h4>Selling Tech Products</h4>
                                        <p>Our quality control team thoroughly assesses the quality of all the tech products sold to us. If the product(s) sold to us does not meet our quality assessment standards it will be for the reason that it does NOT meet the description provided to us by the customer while entering the product details (providing the required details as prompted by us) of that certain device on our website, due to which the details provided to us by the customer during the selling process do not match the information gathered by our quality control team during the assessment of the Tech device(s) sent to us.</p><p>Every Tech device(s) needs to match, where applicable, and, together with but not limited to the condition, size, make, model and colour that you assign it while you are using our website to sell your Tech device(s) to us. During the quality assessment of the Tech device(s) sold to us, we will use the Condition Specification provided to you on our website when you describe the product’s condition to ensure the Tech device sold to us by you is the same as you described it on our website when calculating the Recycle Pro instant price valuation/offer for the product you wish to sell.</p><p>The tech product(s)’s condition described to us by you, on our website, when selling your tech item(s) directly affects the price offer we make for it. If we identify the condition differs from that which you described, we may revalue and offer a revised price for the product(s). The prices for Tech, offered by us to you are valid for fourteen (14) days from the date that they are offered to you and a valid transaction is completed by you on our website, and after that fourteen (14) day period you understand, accept and agree that should we not process your product(s) within the fourteen (14) day period that the offer price is valid, that your product(s) may be revalued by us. Details of the process carried out when a revised valuation offer is made by us for Tech item(s) are contained within these Terms and Conditions.</p>
                                    </div>
                                    <div class="tab-pane fade" id="conditions-vertical" role="tabpanel" aria-labelledby="conditions-vertical-tab">
                                        <h3>Meaning of These Terms and Conditions</h3>
                                        <h4>Important: Please Read</h4>
                                        <p>Kindly make sure you have thoroughly and carefully read these Terms and Conditions prior to selling your Tech product(s) with Recycle Pro. Please also make certain that you have thoroughly gone through our IMPORTANT SELLING RULES, which will explain when we will pay you a lower price valuation for your product(s).</p><p>When completing your transaction, by clicking on the button marked "Accept Terms and Conditions," you confirm that you have read, accepted, and agree to be bound by these Terms and Conditions. If you do not accept and agree to be bound by these terms and conditions, you will be unable to sell your product(s) with Recycle Pro.</p><p>We also recommend that customers retain a copy of these terms and conditions for their records.</p>
                                        <h4>Definitions:</h4>
                                        <p>In these terms and conditions, the following terms will have the following meanings:</p><p>"Contract" means the contract established between you and us as presented in these Terms and Conditions for the sale, return, or recycling of your device(s), where applicable.</p><p>"Item/product/device" means each tech item that you choose to sell to us by following these terms and conditions.</p><p>"Order Confirmation" means the email sent to you by us confirming that your order has been processed and your item(s) should be sent to us for quality assessment. Please be aware that this is a conditional acceptance, therefore, any commitment we may have for the payment of your item(s), is conditional upon your device(s) clearing our quality assessment process.</p><p>"Package" refers to the package, box, or parcel in which you send your item(s) to us.</p><p>"Quality Assessment" means the inspection of the Tech sent to us, performed by the skilled technicians of our Quality Control team.</p><p>"Recycling" means the transfer of items to a third party for the purpose of waste disposal or recycling at our cost.</p><p>“Red Flag” means the presence of a record of a phone’s IMEI number being blocked. We treat such block results as potential ownership disputes.</p><p>"Substantial Damage" refers to damage or failure that has a negative impact on the features and performance of the product(s) and would typically necessitate a major repair or replacement of the affected component.</p><p>"Tech" means mobile phones, laptops, tablets, gaming consoles, Apple goods, speakers, and smartwatches.</p><p>"Valuation" refers to the price we offer for your item(s), including (where applicable) any revised valuation we issue in relation to these terms and conditions.</p><p>"We/us/our" means Recycle Pro.</p><p>"Website" means <a href="">Visit recyclepro.co.uk</a></p><p>"Working Day" refers to any day excluding Saturday, Sunday, and public holidays in England.</p><p>"You/your" refers to you, the person using the Website and sending us an item to be bought by us or recycled as set out in these Terms and Conditions.</p><p>We may change these Terms and Conditions from time to time to consider changes influencing our business, such as changes in market conditions, changes in relevant laws, changes in technology, changes in payment methods, and changes in the way we do business. Therefore, it is recommended to check them regularly for changes.</p><p>These terms incorporate the Privacy Policy and the Terms of Website Use.</p>
                                    </div>
                                    <div class="tab-pane fade" id="terms-vertical" role="tabpanel" aria-labelledby="terms-vertical-tab">
                                        <h3>Use of Recycle Pro</h3>
                                        <p>The website was created exclusively for use by the general public, not by companies, co-ops, traders, or organizations.</p><p>By placing an order with us, you are verifying the following information with us:</p><p>You are an individual customer who is legally capable of entering into binding contracts;</p>
                                    <ol type="1">
                                        <li>You are the legal owner of the product(s) or have permission from the legal owner to sell the product(s) to us;</li>
                                        <li>You are at least 18 years of age, or have acquired the authorization of your parent or guardian if you are under the age of 18, to sell your item(s) to us as laid out in these Terms and Conditions;</li>
                                        <li>You are located in the UK or Channel Islands; and</li>
                                        <li>You are accessing the website from the UK or Channel Islands.</li>
                                    </ol>
                                        <p>Firms, charities, schools, or other organizations should contact us at <a href="mailto:info@recyclepro.co.uk">info@recyclepro.co.uk</a> for enquiries.</p><p>We, at Recycle Pro, reserve the right at our absolute discretion to reject a transaction containing multiple Tech products (as defined above) of the same model or brand and to reject repeat transactions that consist of the same Tech products that have been sold before by you, from your account with us. By placing an order through the Website, you accept and acknowledge that any such products will not be returned to you or paid for, but will instead be responsibly disposed of by us.</p><p>A customer may only have one account per person. If a customer is found to have more than one account, we will be authorised to promptly terminate all of their accounts and cancel any active orders. They may also be charged a reasonable administration fee on the basis of the costs incurred by us in doing so.</p>
                                        <h4>Valuations</h4>
                                        <p>The quotation for technical product(s) provided by us is valid for fourteen (14) days from the date of order placement, subject to your item(s) passing our quality assessment.</p><p>Any valuation provided to you by us is considered to be our property. You must only use the website’s Tech Valuation service to value products that are in your ownership and that you are considering selling to us.</p><p>By placing an order on the Website, you are confirming to us that you accept, understand, and agree that we will only make payment on price valuations that have been made by us and that any other valuations from any source or method will not be applicable.</p>
                                    </div>
                                    <div class="tab-pane fade" id="cancellation-vertical" role="tabpanel" aria-labelledby="cancellation-vertical-tab">
                                        <h3>Your Cancellation Rights</h3>
                                        <p>The cancellation period consists of fourteen (14) days, starting on the day after your contract has been established with us, which is the Order Confirmation date. You have a legal right to cancel your contract at any time without providing a reason within this cancellation period. Kindly note that you may lose your right to a cancellation of contract after you click on "Confirm Your Order" if we are asked by you to start providing services to you during the cancellation period.</p><p>Where you select to use our Royal Mail courier services, we commence performing services to fulfil the contract obligations at the point at which you click "Confirm Your Order", after which you may lose your right to cancel.</p><p>Where you have selected to use the Royal Mail Send Service, we initiate performing services to fulfil contract obligations at the point where you hand over the item(s) at the Royal Mail Post Office as per the carriers’ records, after which you may lose your right to cancel.</p><p>If you use the Royal Mail courier service and your item(s) have not yet been collected by our courier, you may be able to cancel your contract via your online account on our website. Please contact us at info@recyclepro.co.uk and tell us in writing at your earliest convenience if you wish to cancel your contract. If you let us know that you no longer wish to send the item(s), we will remove the particular order or item from our system so it is in our record that we will not be receiving the item(s) from you. In such a case, you will not be authorized to receive any payment from us.</p><p>In spite of the above conditions, if you inform us you desire to cancel your order after we have commenced providing our services, we will make efforts to make certain that your order is cancelled before we have received and begun to process your item(s). This cannot be guaranteed by us, however, and you must keep in mind that once you click "Confirm your Order," the above conditions will apply.</p>
                                    </div>
                                    <div class="tab-pane fade" id="sending-vertical" role="tabpanel" aria-labelledby="sending-vertical-tab">
                                        <h3>Sending Your Items to Us</h3>
                                        <p>Sending your item(s) to us is completely FREE. Therefore, we offer the following delivery service, through which you can post your items for free:</p><p>Royal Mail Courier Service: This service is offered for a complete order with a £5 minimum value, up to 500 items per order, and does not weigh more than 20 kg.</p><p>This delivery service is only applicable to the items that you have proposed to sell to us by completing an order with respect to the order process set out in these Terms and Conditions.</p><p>Collection services offered by technical item carriers as part of this delivery service do not constitute acceptance of technical data sent to us. A confirmation of technical approval will only be sent after the item has passed quality inspection.</p><p>You acknowledge and agree that we have complete discretion over how and where your shipment is transported.</p>
                                    </div>
                                    <div class="tab-pane fade" id="packages-vertical" role="tabpanel" aria-labelledby="packages-vertical-tab"><h3>Lost or Stolen Packages</h3>
                                        <p>If you suspect your parcel has been lost, damaged, or stolen (conditional on our confirmation that we have not received your parcel), you will need to present a legitimate returns receipt that you received from the appropriate carrier.</p><p>Your responsibility is to acquire and retain a return receipt from the appropriate carrier for insurance and tracking purposes. You may not be able to make a claim for loss or damage if you fail to present a legitimate return receipt for the parcel you wish to make a claim for.</p><p>In order to make a claim, you must notify the Royal Mail Post Office of the damage or loss in writing within 14 days of receiving the parcel (the date indicated on the return slip).</p><p>If you are unable to present a legitimate return receipt within fourteen (14) days from the issuance of the receipt, we will not be responsible for any loss or damage, unless you are able to convince royal mail that it was impossible for you to notify royal mail or make such a claim within the fourteen (14) day period and provided that you then present such a claim or advice within an appropriate time.</p><h5 style="text-align: center;">*We recommend using special delivery or shipping service of your choice which provides insurance up to your device value. Royal mail will only reimburse up to £100 in case of a lost package on shipping label provided by us.</h5>
                                    </div>
                                    <div class="tab-pane fade" id="Return-vertical" role="tabpanel" aria-labelledby="Return-vertical-tab">
                                        <h3>Return of Tech Items</h3>
                                        <p>If you wish to refuse the revised price offer within the fourteen (14) day window, your item(s) will be returned to you for FREE by our choice of courier and will be dispatched the next working day. Also note that in the case of a rejected offer, we might not be able to send back accessories that were sent with your item.</p><p>You are solely responsible for ensuring the validity, correctness, and accuracy of the address details given in your website account. Also note that you agree and accept that we will not be responsible for any kind of loss that you may bear due to item(s) being sent back by us to an incorrect address as an outcome of your failure to present valid, correct, accurate, and recent address information in your Recycle Pro account. Kindly be informed that your item(s) shall be delivered only to the address information you present.</p><p>You will be informed by us via email that your item is expected to be delivered to your provided address on the day it is expected to be delivered.</p><p>We must be informed by you within fourteen (14) days of the agreed delivery period if your item(s) is not delivered to you when anticipated by our courier. If you do not inform us of the non-delivery within these 14 days of the agreed period, we will not be responsible for any damage or loss incurred as an outcome of the non-delivery.</p><p>You will be required to fill out a "Letter of Denial of Receipt" (a copy of which we will give you) within 7 days of receiving notice of non-delivery. We will not be responsible for any loss or damage resulting from non-delivery if you do not refuse delivery within 7 days as directed by us.</p><p>We reserve the right to make inquiries if we deem it necessary to verify the veracity of such claims and will contact the relevant carrier to verify the occurrence of non-delivery.</p><p>If we are directly notified by the courier that a parcel has been "Lost in Transit" (meaning the parcel is not trackable or traceable anymore by the courier for delivery to the customer), you will not have to complete a "Letter of Denial." We will internally investigate on our own, and once we are convinced that the parcel can no longer be tracked and delivered to you, you will be contacted in writing by us for confirmation of the package being "Lost in Transit" and you will be provided with the valuation in line with the condition mentioned below.</p><p>For any value calculations, we will only consider our own valuations for the item(s) you may be claiming for, and we will never assume responsibility for any other damage, loss, or compensation stemming from the use of our delivery services.</p><p>You will be informed by us in writing of the investigation’s outcome, and if your claim is successful, your payment of the valuation will be made through the original method of payment stated in your account on our Website.</p>
                                        <h5 style="text-align: center;">*We will reimburse maximum of £100 incase of such situation occur regardless of the quoted or revised offer.</h5>
                                    </div>
                                    <div class="tab-pane fade" id="Activation-vertical" role="tabpanel" aria-labelledby="Activation-vertical-tab">
                                        <h3>Activation Locked Device</h3>
                                        <p>We do not accept iOS devices that are linked to any additional iOS security features, have Find My iPhone switched on, or have not yet been removed from iCloud. Additionally, we do not accept Samsung phones that have Find My Phone activated.</p><p>Google devices that are still associated with the Google Account or are protected by any Google security features are not accepted by us. Remotely locked Google devices cannot be unlocked by us. We will return your Google device if we receive one that has been locked by Google.</p><p>The "How to Remove Your iCloud Account from Your Device" page on our website provides instructions on how to remotely disable iOS security. You may find instructions for unlocking your Samsung mobile on the "How to Unlock Your Samsung Device" page on our website.</p><p>We will notify you via email if any of the devices sent by you are associated with any of the above-stated security features. You will be informed of the 14-day window you will have to disassociate the device from these features and present us with a written statement that this has been done. We will send you frequent reminders to disassociate your device from the security features and send us a written statement confirming that you have succeeded in doing so during the 14 day time period. If we identify that we have not yet received written confirmation from you 24 hours before the end of the 14-day window, we will do our best to convey a final reminder before this deadline ends. Our rights stated in the following paragraphs will not be affected by this, however.</p><p>If we do obtain confirmation from you within 14 days, your device will be tested again by us to verify the removal of security features.</p><p>If we do not obtain written confirmation from you within 14 days stating the security features have been removed from the device, we will recycle it.</p><p>In the case where you have informed us that the device has been unlocked, and while we are testing the device again, the security features are discovered not to have been removed, you will be contacted and asked to attempt to unlock it again.</p><p>If we retest your tech and it continues to remain locked, we will inform you of the situation, after which you will be required to connect with our customer support team to verify arrangements so we can return your Tech to you without any additional cost. If we do not receive a response from you within seven (7) days of notifying you, your device will be recycled.</p><p>As a result of further testing, if it is discovered that the security features have been disassociated from the device, we will evaluate the tech as per our standard quality assessment procedure.</p><p>You are solely responsible for ensuring that any devices you send to us are not linked to any security features mentioned in the conditions above.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Data-vertical" role="tabpanel" aria-labelledby="Data-vertical-tab">
                                        <h3>Data Removal</h3>
                                        <p>It is recommended to remove all private information (Data) that is or may be saved on your Tech device (inclusive of videos, images, songs, passwords, etc.)</p><p>Please make certain that any media storage, memory cards, SIM cards, or other related devices have been removed from your Tech device before posting it to us.</p><p>If we identify any of the devices stated in the above conditions as being included in your device, we shall not be liable to return them and will properly dispose of them.</p><p>We will not be accountable for any damages, losses, or claims stemming from any information that you fail to remove from your device (whether consciously or unconsciously)</p><p>Please acknowledge that you are entitled to delete all data from your Tech device before dispatching it to us and terminate any contract (e.g., with your phone’s network provider) associated with the device.</p><p>It is recommended to go through free guides online that explain how to remove Data from your Tech devices.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Paid-vertical" role="tabpanel" aria-labelledby="Paid-vertical-tab">
                                        <h3>Getting Paid</h3>
                                        <p>Payment shall be made in accordance with these Terms and Conditions</p><p>The following payment methods are available to you:</p>
                                    <ol type="1">
                                        <li>Bank Transfer</li>
                                        <li>PayPal</li>
                                        <li>Donation to one of our named charities</li>
                                    </ol>
                                        <p>Payment will be transferred through PayPal or Bank Transfer only after the Quality Assessment for all the items in your order has been completed, and it usually clears within 24 hours on working days. This is subject to the completion of the process before 2 p.m. on that business day. However, if the assessment process concludes after 2 p.m. or on any other day instead of a working day (i.e., Saturday or Sunday), the payment will be transferred to you on the next working day, i.e., any day exclusive of Saturday, Sunday, and public holidays.</p><p>If any Tech device in your order:</p>
                                    <ol type="1">
                                        <li>Fails to clear the quality assessment process;</li>
                                        <li>Is linked to any security features mentioned in our Terms and Conditions for "Activation Locked Devices";</li>
                                        <li>If the device has been registered as lost, stolen, or blocked, it is considered a "red flag."</li>
                                    </ol>
                                        <p>Payments will not be processed for these devices until either:</p>
                                    <ol type="1">
                                        <li>You have accepted our revised price offer or the 14-day window has expired.</li>
                                        <li>The device has been disassociated from all security features. or</li>
                                        <li>The red flag has been removed from your device.</li>
                                    </ol>
                                        <h4>Devices with Red Flag</h4>
                                        <p>if device has any red flag. we will have to dispose the device unconditionally or customer has 14 days to remove red flag from the device in order to get paid under no circumstances device with red flag can be returned or get paid.</p>
                                        <p>Once the customer has selected a payment method, it cannot be changed, and the customer is solely responsible for the validity and accuracy of the payment details, including but not limited to the account holder’s name, account number, and sort code.</p>
                                        <p>A customer may make changes in the payment details (not the payment method) in the website's "My Account" section, bearing the responsibility to do so before the issuance of payment.</p>
                                        <P>We are not liable under any circumstance for the legitimacy and validity of the payment details provided by you, and you are solely responsible for ensuring the validity, correctness, and accuracy of the payment details provided by you on the Website.</P>
                                        <P>We will not assume any responsibility for any losses you may incur if you are unable to receive your money if it is transferred to an incorrect account as an outcome of your failure to present accurate, valid, and correct payment details required on the website.</P>
                                        <P>You recognise and acknowledge that some of the payment options provided to you rely on third parties (parties outside of our control, including but not limited to banks and postal services) to process the payments, including but not limited to payments made by bank transfer. We will not be held responsible for payment delays brought on by these third parties' actions or inactions. Payments may be subject to verification and security procedures required by us or a third party.</P>
                                        <P>If you decide to donate the money you have raised through your sale, to one of our chosen charities, the method of payment will not be changeable once you have clicked on "Confirm your Order" after completing your sale and being displayed the confirmation page. The donation will be paid to the selected charity in accordance with our arrangement with that particular charity.</P>
                                        <P>Please be aware that Recycle Pro can only reissue payments to you by bank transfer, and that we will need your account information to do so. The method through which reissue payments are made is entirely up to us. We have the right to impose additional administrative fees in the form of a deduction from your account or a payment from you if you give inaccurate bank account information for a reissue and a payment is rejected by your bank when you apply for another reissue.</P>
                                        <P>All stated payment schedules are subject to change at peak times or in the event of an unforeseen circumstance. If, for any reason, we are unable to make a payment within the timeframes specified, you will not be entitled to compensation from us for any losses you may incur.</P>
                                        <P>To assist you in seeing the entire sum you will receive, all payments include VAT (subject to these terms and conditions)</P>
                                        <P>The applicable terms and conditions of those conditions will apply to any transactions made in line with any of the promotional offers listed in the conditions (inclusive) below.</P>
                                    </div>
                                    <div class="tab-pane fade" id="Promotional-vertical" role="tabpanel" aria-labelledby="Promotional-vertical-tab">
                                        <h3>All Promotional Codes</h3>
                                        <p>Voucher codes will occasionally be distributed by the company as a trade or purchase incentive. These discount codes are only meant to be used once per customer, and the company reserves the right to only honour the first use of the code and to deduct any subsequent uses from any pending or future orders if it determines that the use of the code is being abused beyond the scope of normal business.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Donate-vertical" role="tabpanel" aria-labelledby="Donate-vertical-tab">
                                        <h3>Donate to Charity</h3>
                                        <p class="lead">Supporting a worthwhile cause is EASIER when you use Recycle Pro!</p>
                                        <p>By decluttering and recycling your old items, you can raise money for any of the charities we support. You will immediately be offered the option to donate the money you’ll make to charity after completing your order on Recycle Pro. You can learn more about the charities we support by clicking on any of the logos above, and if you're feeling especially charitable, you can choose which one to support by giving your entire donation to them.</p><p>They do an exceptional job with a diverse span of good causes, which include troops, kids, ex-professionals, and animals, who are all dealing with difficult situations and would really value your help.</p><p>This year, declutter by selling your Tech and donate to a worthwhile cause!</p>
                                    </div>
                                    <div class="tab-pane fade" id="iCloud-vertical" role="tabpanel" aria-labelledby="iCloud-vertical-tab">
                                    <table style="width:100%">
                                        <tr>
                                        <th><h3 style="text-align:left;">How to remove your iCloud Account on Your Device</h3>
                                            <p style="width:75%; font-weight:400; font-size:18px;">You are required to delete your iCloud account from your Tech device prior to selling it to us; otherwise, your payment may be delayed.</p><p style="width:75%; font-weight:400; font-size:18px;">You can remove your iCloud account through your device or the iCloud website. Following are the ways to delete your iCloud account for different devices:</p>
                                        </th>
                                        <th>
                                            <img src="img/ban-01.webp" alt="appleaccount_image" width="500" height="340">
                                        </th>
                                        </tr>
                                    </table>
                                    <table style="width:100%">
                                        <tr>
                                        <th><h3>iPhone</h3>
                                        <h4>Removing iCloud Account using your device</h4>
                                        <p class="lead">For iOS version 10.3 or later:</p>
                                    <ol type="1">
                                        <li>Go to “Settings”</li>
                                        <li>Click on your name</li>
                                        <li>Scroll down and tap “Sign Out”</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Click on “Turn Off”</li>
                                    </ol>
                                        <p class="lead">For iOS version 10.2 or earlier:</p>
                                    <ol type="1">
                                        <li>Go to Settings > iCloud > Sign Out</li>
                                        <li>Click on “Sign Out” again</li>
                                        <li>Select “Delete from [My device]”</li>
                                        <li>Enter you Apple ID password when prompted</li>
                                        <li>Go to Settings > iTunes & App Store > Apple ID > Sign Out</li>
                                    </ol>
                                        <p class="lead">Removing iCloud Account remotely using your PC or Laptop</p>
                                    <ol type="1">
                                        <li>Switch off your iPhone</li>
                                        <li>Log into iCloud website from a laptop or PC using your Apple ID</li>
                                        <li>Tap “Find my iPhone”</li>
                                        <li>Select the “All Devices” drop-down menu and click on your device</li>
                                        <li>Click “Remove Account”</li>
                                        <li>Click “Remove” on the confirmation message</li>
                                    </ol></th>
                                        <th><h3>iPad</h3>
                                        <p class="lead">For iOS version 10.3 or later:</p>
                                    <ol type="1">
                                        <li>Go to “Settings”</li>
                                        <li>Click on your name</li>
                                        <li>Scroll down and tap “Sign Out”</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Go back to “Settings”</li>
                                        <li>Click on “General”</li>
                                        <li>Near the bottom, click on “Reset”</li>
                                        <li>Tap on “Erase all content and settings”</li>
                                        <li>Enter your Apple ID password to confirm the changes</li>
                                    </ol>
                                        <p class="lead">For iOS version 10.2 or earlier:</p>
                                    <ol type="1">
                                        <li>Go to Settings > iCloud > Sign Out</li>
                                        <li>Click on “Sign Out” again</li>
                                        <li>Select “Delete from [My device]”</li>
                                        <li>Enter you Apple ID password when prompted</li>
                                        <li>Go to Settings > iTunes & App Store > Apple ID > Sign Out</li>
                                        <li>Go back to “Settings” and click on General > Reset > Erase all content and settings</li>
                                        <li>Enter your Apple ID password to confirm the changes</li>
                                    </ol>
                                        <p class="lead">Removing iCloud Account remotely using your PC or Laptop</p>
                                    <ol type="1">
                                        <li>Switch off your iPad</li>
                                        <li>Log into iCloud website from a laptop or PC using your Apple ID</li>
                                        <li>Tap “Find my iPhone”</li>
                                        <li>Select the “All Devices” drop-down menu and click on your device</li>
                                        <li>Click “Remove Account”</li>
                                        <li>Click “Remove” on the confirmation message</li>
                                    </ol></th>
                                    </tr>
                                    </table>
                                    <table style="width:100%">
                                        <tr>
                                        <th><h3>Apple Watch</h3>
                                        <p class="lead">Remove the Activation Lock from your Apple Watch</p>
                                        <p>Note: Deleting any data manually while signed in to your iCloud<br>account will result in the removal of content from<br>your iCloud and any other linked devices.</p>
                                    <ol type="1">
                                        <li>Hold your Apple Watch and iPhone close together.</li>
                                        <li>Open the watch app on your iPhone and tap on "My Watch."</li>
                                        <li>Click on "Apple Watch" and tap "Unpair Apple Watch."</li>
                                        <li>Enter your Apple ID password when prompted.</li>
                                        <li>Tap again to confirm the changes.</li>
                                    </ol>
                                        <p>When unpairing your Apple watch, it will make a backup of your<br>watch so you can use the backup and continue where<br>you left off when you get a new watch.</p>
                                        <h4>Removing iCloud Account remotely using your PC or Laptop</h4>
                                    <ol type="1">
                                        <li>Switch off your Apple watch</li>
                                        <li>Log into iCloud website from a laptop or PC using your Apple ID</li>
                                        <li>Tap “Find my Watch”</li>
                                        <li>Select the “All Devices” drop-down menu and select your Apple Watch</li>
                                        <li>Click “Erase Apple Watch”</li>
                                    </ol></th>
                                        <th><h3>MacBook</h3>
                                        <p class="lead">Removing iCloud Account from MacBook and MacBook Pro</p>
                                        <h4>For macOS Catalina or later:</h4>
                                    <ol type="1">
                                        <li>Click “System Preferences”</li>
                                        <li>Click “Apple ID”</li>
                                        <li>Uncheck the box next to “Find my Mac”</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Click on “Sign Out”</li>
                                    </ol>
                                        <h4>For macOS Mojave or earlier:</h4>
                                    <ol type="1">
                                        <li>Click “System Preferences”</li>
                                        <li>Click “iCloud”</li>
                                        <li>Uncheck the box next to “Find my Mac”</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Click on “Sign Out”</li>
                                    </ol>
                                        <h4>Removing iCloud Account remotely using your PC or Laptop</h4>
                                    <ol type="1">
                                        <li>Switch off your MacBook</li>
                                        <li>Log into iCloud website from a laptop or PC using your Apple ID</li>
                                        <li>Tap “Find my iPhone”</li>
                                        <li>Select the “All Devices” drop-down menu and select your device</li>
                                        <li>Click “Remove Account”</li>
                                        <li>Click “Remove” on the confirmation message</li>
                                    </ol></th>
                                    </tr>
                                    </table>
                                    <table style="width:100%">
                                        <tr>
                                        <th><h3>iMac</h3>
                                        <p class="lead">Removing your iCloud Account from iMac or Mac Pro</p>
                                        <h4>For macOS Catalina or later:</h4>
                                    <ol type="1">
                                        <li>Click “System Preferences”</li>
                                        <li>Click “Apple ID”</li>
                                        <li>Uncheck the “Find my Mac” checkbox</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Click on “Sign Out”</li>
                                    </ol>
                                        <h4>For macOS Mojave or earlier:</h4>
                                    <ol type="1">
                                        <li>Click “System Preferences”</li>
                                        <li>Click “iCloud”</li>
                                        <li>Uncheck the “Find my Mac” checkbox</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Click on “Sign Out”</li>
                                    </ol>
                                        <h4>Removing iCloud Account remotely using your PC or Laptop</h4>
                                    <ol type="1">
                                        <li>Switch off your iMac</li>
                                        <li>Log into iCloud website from a laptop or PC using your Apple ID</li>
                                        <li>Tap “Find my iPhone”</li>
                                        <li>Select the “All Devices” drop-down menu and select your device</li>
                                        <li>Click “Remove Account”</li>
                                        <li>Click “Remove” on the confirmation message</li>
                                    </ol></th>
                                        <th><h3>iPod</h3>
                                        <h4>Removing iCloud Account using your iPod</h4>
                                        <p class="lead">For iOS version 10.3 or later:</p>
                                    <ol type="1">
                                        <li>Go to “Settings”</li>
                                        <li>Click on your name</li>
                                        <li>Scroll down and tap “Sign Out”</li>
                                        <li>Enter your Apple ID password when prompted</li>
                                        <li>Click on “Turn Off”</li>
                                    </ol>
                                        <p class="lead">For iOS version 10.2 or earlier:</p>
                                    <ol type="1">
                                        <li>Go to Settings > iCloud > Sign Out</li>
                                        <li>Click on “Sign Out” again</li>
                                        <li>Select “Delete from [My device]”</li>
                                        <li>Enter you Apple ID password when prompted</li>
                                        <li>Go to Settings > iTunes & App Store > Apple ID > Sign Out</li>
                                    </ol>
                                        <p class="lead">Removing iCloud Account remotely using your PC or Laptop</p>
                                    <ol type="1">
                                        <li>Switch off your iPhone</li>
                                        <li>Log into iCloud website from a laptop or PC using your Apple ID</li>
                                        <li>Tap “Find my iPhone”</li>
                                        <li>Select the “All Devices” drop-down menu and click on your device</li>
                                        <li>Click “Remove Account”</li>
                                        <li>Click “Remove” on the confirmation message</li>
                                    </ol></th>
                                    </tr>
                                    </table>
                                    </div>
                                    <div class="tab-pane fade" id="Samsung-vertical" role="tabpanel" aria-labelledby="Samsung-vertical-tab">
                                    <table style="width:100%">
                                        <tr>
                                        <th>
                                        <h3 style="text-align:left;">How to Unlock your Samsung Device</h3>
                                        <p style="width:75%; font-weight:400; font-size:18px;">You are required to delete your Samsung account from your Tech device prior to selling it to us otherwise your payment may be delayed.</p><p style="width:75%; font-weight:400; font-size:18px;">You can remove your Samsung account by following these simple steps:</p>
                                        </th>
                                        <th>
                                            <img src="img/Ban-2.webp" alt="Trulli" width="438" height="462">
                                        </th>
                                        </tr>
                                    </table>
                                        <h4>Removing your Samsung Account Using your Device</h4>
                                    <ol type="1">
                                        <li>Tap the “Apps” icon</li>
                                        <li>Click on “Settings”</li>
                                        <li>Select “Accounts”</li>
                                        <li>Select “Samsung Account”</li>
                                        <li>Select your email address</li>
                                        <li>Tap “more” in the top right corner and select “Remove Account”</li>
                                        <li>Tap “Remove Account”</li>
                                        <li>Enter your password and confirm</li>
                                        <li>Select “Remove Account”</li>
                                        <li>Your Samsung account will now be removed</li>
                                    </ol>
                                        <h4>Removing your Samsung Account Using your PC or Laptop</h4>
                                    <ol type="1">
                                        <li>Go to <a href="https://account.samsung.com">Samsung.com</a></li>
                                        <li>Sign in to your account</li>
                                        <li>Click on “Find my Mobile”</li>
                                        <li>Enter your password and click “Sign In”</li>
                                        <li>Click “Registered Devices” and select your device</li>
                                        <li>Click the trash bin icon and accept the disclaimer</li>
                                        <li>Your phone will be deleted from your account</li>
                                    </ol>
                                    </div>
                                    <div class="tab-pane fade" id="Privacy-vertical" role="tabpanel" aria-labelledby="Privacy-vertical-tab">
                                    <table style="width:100%">
                                        <tr>
                                        <th>
                                        <h3 style="text-align:left;">Privacy Policy</h3>
                                        <h4>Introduction</h4>
                                        <p style="width:75%; font-weight:400; font-size:18px;">Your privacy is highly valued by Recycle Pro, and we are devoted to safeguarding your private data. This privacy policy will give you information about how we handle your personal data, your privacy rights, and how the law safeguards you. It applies to data we gather in connection with:</p>
                                        </th>
                                        <th>
                                        

                                        </th>
                                        </tr>
                                    </table>
                                    <ol>
                                        <li>Visitors to our website;</li>
                                        <li>Clients of our services;</li>
                                        <li>People who contact us through any channel (e.g., through our website,<br>by post, email,telephone, or social media).</li>
                                        <li>Staff members or representatives of organisations who use our<br> services or provide us with goods or services</li>
                                    </ol>
                                        <p>You should carefully read this policy, as well as any additional privacy notices we may post when collecting or processing personal information about you, in order to understand how and why we are doing so.</p>
                                        <p>This privacy policy is layered, so you can click through to the details below.</p>
                                        <h4>Important Information and Who We Are</h4>
                                        <p class="lead">Controller</p>
                                        <p>Recycle Pro is the controller and in charge of your personal data (collectively referred to as “we”, “us”, or “our” in this privacy policy.</p>
                                        <p class="lead">Contact Information:</p>
                                        <p>We highly value your trust in us for which our customer care team has been assigned to bear responsibility for overseeing your questions with respect to this privacy policy. For requests with regards to exercising your rights or questions regarding this privacy policy, kindly connect with our customer care team at the details mentioned below:</p>
                                        <p>Email address: <a href="mailto:info@recyclepro.co.uk">info@recyclepro.co.uk</a></p>
                                        <p>Call: <a href="tel:+4401216303773">+4401216303773</a></p>
                                        <p class="lead">Right to File Complaints</p>
                                        <p>You have the right to file a complaint at any time with the UK's supervisory body for data privacy, the Information Commissioner's Office (ICO) (www.ico.org.uk). However, we would like the opportunity to address any concerns before you approach the ICO, so please get in touch with us first.</p>
                                        <p class="lead">Changes to the Privacy Policy</p>
                                        <p>We are authorized to make changes to this privacy policy at any time.</p>
                                        <p class="lead">Your Responsibility to Notify Us of Changes</p>
                                        <p>The accuracy of your personal data is of high importance. It is also crucial that the personal information we hold about you be up-to-date and correct. We would highly appreciate you informing us if your personal information changes throughout your relationship with us.</p>
                                        <p>Third-party Links</p>
                                        <p>Links to third-party websites, plug-ins, and programs may be found on our website. It is possible for third parties to gather or share information about you if you click on those links or enable those connections. These third-party websites are not under our control, and their privacy policies are not our responsibility. We advise reading the privacy policies of any website you visit after leaving ours.</p>
                                    </div>
                                    <div class="tab-pane fade" id="huawei-vertical" role="tabpanel" aria-labelledby="huawei-vertical-tab">
                                    <table style="width:100%">
                                        <tr>
                                        <th>
                                        <h3 style="text-align:left;">The Data We Collect</h3>
                                        <p style="width:75%; font-weight:400; font-size:18px;">Any information that can be used to identify an individual is referred to as "personal data" or "personal information." It excludes information whose identity has been obscured (anonymous data).</p>
                                        </th>
                                        <th>
                                        <!-- ban-4-->
                                        
                                        </th>
                                        </tr>
                                    </table>
                                        <p>We may gather, use, keep, and transfer the following categories of personal information about you:</p>
                                        <li>Identity Information:</li>
                                        <p>It consists of [first name, maiden name, last name, username, marital status, company name, date of birth, and gender].</p>
                                        <li>Contact Information:</li>
                                        <p>It consists of [delivery address, billing address, email address, and telephone numbers]. Financial data contains [bank account and payment card details].</p>
                                        <li>Profile Information:</li>
                                        <p>It contains [your username and password, purchases or orders made by you, your interests, preferences, and feedback and survey forms].</p>
                                        <li>Transaction Information:</li>
                                        <p>It consists of information about payments to and from you as well as other information about the goods and services (such as the serial number and IMEI of any goods or services you have bought or sold to us).</p>
                                        <li>Marketing and Communications Information:</li>
                                        <p>It contains [your preferences in receiving marketing from us and our third parties, and your communication preferences].</p>
                                        <li>Technical Information:</li>
                                        <p>It contains [internet protocol (IP) address, login information, browser type and version, time zone setting and location, kinds and versions of browser plug-ins, operating system and platform, and other technology on the devices you use to access this website].</p>
                                        <li>Website Usage Information:</li>
                                        <p>It consists of [information about how you use our website, products, and services].</p>
                                        <li>Unknown Information:</li>
                                        <p>It includes information on devices that we receive for erasure and destruction services, where we do not access the information or record it; instead, we erase and destroy the device in line with the service agreement.</p><p>Additionally, for any purpose, we collect, use, and distribute aggregated data, such as demographic or statistical information. Since it does not directly or indirectly expose your identity, aggregate data—which may be derived from your personal data—is not legally regarded as personal information. For instance, we may combine your usage data to determine the proportion of users who visit a particular website feature. But if we combine or link aggregated data with your personal information in a way that makes it possible to identify you directly or indirectly, we recognize the combined information as personal information and will use it in line with this privacy notice.</p><p>No special categories of personal data about you are collected by us (this includes details about your race or ethnicity, religious or philosophical beliefs, sex life, sexual orientation, political opinions, trade union membership, information about your health, and genetic and biometric data). Additionally, we don't gather any data on criminal offences and convictions.</p><p>In cases where we are required by law or by the terms of a contract, we have with you to collect personal data, and you refuse to supply that data when requested, we might not be able to carry out the contract we currently have with you or are attempting to enter into with you (for example, to provide you with goods or services).</p>
                                        <h4>If You Are Unable To Share Personal Data:</h4>
                                        <p>In cases where we are required by law or by the terms of a contract, we have with you to collect personal data, and you refuse to supply that data when requested, we might not be able to carry out the contract we currently have with you or are attempting to enter into with you (for example, to provide you with goods or services).</p>
                                        <h4>How do we Collect your Personal Information?</h4>
                                        <p>We use different data collection methods to gather information from and about you.</p>
                                        <p class="lead">Direct Communication</p>
                                        <p>You may provide us with your identity, contact information, and financial information by filling out forms or contacting us by mail, phone, email, or another method. This includes any personal information you give us when you</p>
                                        <li>Apply for one of our products or services;</li>
                                        <li>Set up an account on our website;</li>
                                        <li>Subscribe to one of our services or publications;</li>
                                        <li>Ask to receive marketing materials;</li>
                                        <li>Participate in a competition, contest, or survey; or</li>
                                        <li>give us feedback.</li>
                                        <h4>Automated Technologies or Communications</h4>
                                        <p>We may automatically gather Technical Data about your device, browsing actions, and habits when you engage with our website. Using cookies and other similar technologies, we gather this personal data. If you visit other websites that use our cookies, we might also learn technical information about you.</p>
                                        <h4>Sources accessible to the general public and third parties:</h4>
                                        <p>Sources accessible to the general public and third parties may present us with your personal information as written below:</p>
                                        <h4>Technical Information from the following parties:</h4>
                                        <li>EU-based search information companies;</li>
                                        <li>Outside the EU-based analytics companies like Google.</li>
                                        <p>`Contact and identity information from sources accessible to the general public located within the EU, for instance, Companies House and the Electoral Register.</p>
                                        <h4>How We Use Your Personal Information</h4>
                                        <p>We will only use your private information where we are allowed by the law most likely in the following situations:</p><p>Where we are required to act in accordance with an authoritative or legal obligation.</p><p>We will use your personal information where we need it in order to fulfil the obligations for a contract we have entered or are about to enter with you.</p><p>We mean in the interest of our business in conducting and managing our business to enable us to deliver you the greatest service/product and the best and most secure experience if it is mandatory for our valid interests (or those of a third party). Prior to using your private information for our valid interests, we make sure we weigh all of the potential effects—both good and bad—on you and your rights. We don't utilize your personal information for things where the impact on you would be greater than our interests (unless we have your consent or are otherwise needed or authorized to by law).</p><p>Except for sending you email or text messages from third parties with direct marketing messages, we generally do not use permission as a legal foundation for processing your private data. You have the option to revoke your marketing permission at any time by:</p>
                                        <li>using the "unsubscribe" link in emails;</li>
                                        <li>modifying your marketing preferences through your Customer Account;</li>
                                        <li>Contacting us using any of the means mentioned in the first paragraph.</li>
                                    </div>
                                     <div class="tab-pane fade" id="Utilize-vertical" role="tabpanel" aria-labelledby="Utilize-vertical-tab">
                                        <h3>Reasons Why We’ll Utilize Your Data</h3>
                                        <p>A list of all the ways we intend to use your personal information, together with the legal justifications for each, is provided below. Where applicable, we have also determined what our really held interests are.</p><p>Please take note that depending on the exact reason we are utilizing your data, we may process it for more than one legal basis. In the event that more than one of the grounds listed below applies to the processing of your personal information, please get in touch with us if you require more information.</p>
                                    <table>
                                        <tr>
                                            <td style="background-color: #18bdd8; color: #fff;">Type of Information</td>
                                            <td style="background-color: #18bdd8; color: #fff;">Reason for Utilization</td>
                                            <td style="background-color: #18bdd8; color: #fff;">Legal Justification</td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li> <li>Identity</li><li>Marketing & Communications</li><li>Transaction</li><li>Financial</li></ol></td>
                                            <td>To fulfil your order and process it including,<ol type="1"><li>Managing payments, fees and costs</li><li>Collect any money owed to us and reclaim it.</li></ol></td>
                                            <td><ol type="1"><li>To fulfil contract obligations</li><li>Important for our valid interests<br>(to reclaim money owed to us)</li></ol></td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contract</li><li>Identity</li><li>Marketing & Communications</li><li>Transaction</li><li>Financial</li><li>Usage</li><li>Profile</li><li>Technical</li></ol></td>
                                            <td>To offer a reuse and trade-in service for<br>mobile phones and other devices.</td>
                                            <td><ol type="1"><li>To fulfil contract obligations</li><li>Important for our valid interests<br>(to provide our services to our customers)</li></ol></td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li><li>Identity</li><li>Marketing & Communications</li><li>Usage</li><li>Profile</li></ol></td>
                                            <td>To make it possible for you to take part in<br>a contest, a prize selection, or a survey.</td>
                                            <td><ol type="1"><li>To fulfil contract obligations with you</li><li>To study how our clients utilize our goods and services,<br>to further work on them and grow our business.</li></ol></td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li><li>Identity</li><li>Profile</li><li>Marketing & Communications</li></ol></td>
                                            <td>To oversee how we interact with you or your company,<br>which will include informing you of modifications<br>to our terms or privacy policy and requesting your<br>feedback or participation in a survey.</td>
                                            <td><ol type="1"><li>To fulfil contract obligations with you</li><li>Important to act in accordance with legal commitment</li><li>To keep our records up to date and understand how our<br>clients utilize our goods and services.</li></ol></td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li><li>Identity</li><li>Usage</li><li>Technical</li></ol></td>
                                            <td>To manage and safeguard our company and this website<br>(including data analysis, system maintenance,<br>information reporting, troubleshooting, support,<br>testing and hosting of data)</td>
                                            <td><ol type="1"><li>Important in connection with a corporate reorganization<br>or group restructuring exercise, for the operation<br>of our business, the provision of administration<br>and IT services, network security, to combat fraud, etc.</li><li>Importance to act in accordance with legal obligation.</li></ol></td>
                                            </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li><li>Identity</li><li>Marketing & Communications</li><li>Usage</li><li>Profile</li><li>Technical</li></ol></td>
                                            <td>To provide you with appropriate website content and<br>commercials, as well as to gauge or better comprehend<br>the efficacy of the information we present to you</td>
                                            <td>To study how our clients utilize our goods and services,<br>to further work on them and expand our business<br>and to present our marketing strategy.</td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Usage</li><li>Technical</li></ol></td>
                                            <td>To utilize data analytics to enhance our website,<br>goods and services, marketing, interactions<br>with customers, and other aspects</td>
                                            <td>To categorize the different sorts of clients for<br>our goods and services, to maintain an up-to-date<br>and useful website, to expand our company, and<br>to guide our marketing approach.</td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li><li>Identity</li></ol></td>
                                            <td>To add you as a new client</td>
                                            <td>To fulfil contract obligations with you.</td>
                                        </tr>
                                        <tr>
                                            <td><ol type="1"><li>Contact</li><li>Identity</li><li>Usage</li><li>Profile</li><li>Technical</li></ol></td>
                                            <td>To provide you with advice and recommendations<br>for products or services that might be of interest to you.</td>
                                            <td>To develop our goods and services and expand our business</td>
                                        </tr>
                                        </table>
                                            <p></p>
                                            <p></p>
                                            <h4>Promotional Deals We Are Offering:</h4>
                                            <p>We may make assumptions about what you might need or want or find interesting based on your Identity, Contact, Technical, Usage, and Profile information. This is how we select the offers, services, and goods that might be of interest to you.</p>
                                            <p>If you have bought our services or requested data from us and, in each case, you have not chosen to opt out of receiving that marketing, you will get marketing messages from us.</p>
                                            <p class="lead">Marketing:</p>
                                            <p>We strive to provide you with choices regarding certain personal data uses, particularly around marketing and advertising. Please see Opting Out below.</p>
                                            <p class="lead">Opting Out:</p>
                                            <p>By logging into My Account and changing your marketing settings, or by clicking the opt-out links on any marketing message or email sent to you at any time, you can request that we or third parties cease sending you marketing messages. If you choose not to receive these marketing messages, we won't use the personal information you give us as a consequence of a service purchase, a product or service experience, or any other transactions.</p>
                                            <p class="lead">Third-party marketing</p>
                                            <p>Before disclosing your personal information to any third-party outside the ECO Renew UK group of companies for marketing reasons, we will first obtain your explicit opt-in consent.</p>
                                            <p class="lead">Change of Purpose for Data Usage:</p>
                                            <p>Unless we reasonably believe that we need to use your personal data for another reason that is compatible with the original purpose, we will only use it for those purposes for which we collected it. Please get in touch with us if you'd like further information about how the processing for the new purpose is consistent with the original purpose.
                                            If we must utilize your personal information for a different reason, we will let you know and explain the legal justification for doing so. Please take note that, when necessary or permitted by law, we may handle your private information without your consent or authorization and in accordance with the aforementioned guidelines.
                                            </p>
                                            <p class="lead">Cookies:</p>
                                            <p>You can configure your browser to inform you when websites access or set cookies, or to reject all or some browser cookies. Please be aware that some portions of our website may become inaccessible or malfunction if you disable or reject cookies.</p>
                                    </div>
                                    <div class="tab-pane fade" id="Transfer-vertical" role="tabpanel" aria-labelledby="Transfer-vertical-tab">
                                        <h3>International Transfer of your Personal Data</h3>
                                        <p class="lead">We do not share your private information internationally.</p>
                                        <h4>Information Security</h4>
                                        <p>We value your trust in us with respect to your personal information. To maintain this trust we have taken adequate actions to safeguard your personal information from being leaked, stolen, lost, or used in an unapproved manner. Additionally, access to your private information is limited to employees, agents and third-parties who can process that information only as per our instruction for a business need.</p><p>Rest assured your information is in safe hands with us and in any case if we identity potential harm or breach of information, we will inform you where we are required to do so by law.</p>
                                        <h4>Information Retention</h4>
                                        <p class="lead">For how long do we retain your data?</p><p>According to the law, we must retain your basic data which is inclusive of your contact, identity, and transaction and financial for six years after you are no longer our customer, for tax purposes. However, in certain conditions you can request the removal of your data: see “right to data removal” for further details. In addition to this, we will only hold your data until it is important for us to be able to perform the purposes it was initially collected for. The quantity, nature, and sensitivity of the data, the risk of harm from unauthorised use or disclosure, the purposes for which we process the data, including whether those purposes can be met without the use of the data, and the applicable legal requirements are all taken into account when determining the appropriate retention period for personal data.</p>
                                        <h4>Your Legal Rights</h4>
                                        <p>Following are the rights you have under data protection law which may be applicable under certain conditions:</p>
                                        <p class="lead">Right to request access:</p><p>You have the right to request access to your own private information which will allow you to obtain a copy of what information we hold about you and how we are utilizing it.</p>
                                        <p class="lead">Right to data removal:</p><p>You have the right to ask us for the removal and deletion of any personal information we hold about you. Additionally, you have the right to request that we remove your personal information in cases where you have exercised your right to object to processing (see below), in which we may have handled your data improperly, or in which we are compelled to do so by local law. However, please be aware that there are some circumstances in which we may</p><p>not always be able to honour your request for removal. If this is the case, we will let you know at the time of your request.</p>
                                        <p class="lead">Right to request rectification:</p><p>You have the right to ask us to make amendments to any incomplete or incorrect private information we hold about you in order to rectify it. However, we may be required to check the validity of the new information we obtain from you.</p>
                                        <p class="lead">Right to object to processing:</p><p>You have the right to object to processing if we are processing your personal data based on our (or a third party's) legitimate interests and there is something about your circumstances that makes you want to object to processing on this ground because you feel it affects your basic rights and freedoms. In cases where we are using your personal data for direct marketing, you also have the right to object. In some circumstances, we may be able to show that our legitimate processing needs outweigh your rights and freedoms.</p>
                                        <p class="lead">Right to revoke consent:</p><p>If your consent is being used by us to process your private information, you have the right to revoke it at any moment. However, the processing that was done before you withdrew your consent will still be legal. We might not be able to offer you some goods or services if you remove your consent. If this is the case, we will let you know when you revoke your consent.</p>
                                        <p class="lead">Right to request restriction of processing:</p><p>You have the right request restriction on how your private information is processed which will enable you to ask us to stop processing your private data in the following circumstances. (a) if you want us to confirm the data's accuracy; (b) if our use of the data is unlawful but you do not want us to delete it; (c) if you need us to keep the data even if we no longer need it because you need it to establish, exercise, or defend legal claims; or (d) if you object to our use of the data but we need to determine whether we have valid reasons to use it.</p>
                                        <p class="lead">Right to request transfer of information:</p><p>You have the right to ask us to transfer your personal information to you or a third-party and we will do so in a frequently used, machine-readable format. However, keep in mind that this privilege only applies to automated information that we utilized with your prior consent or to carry out a contract with you.</p>
                                        <p>In order to exercise these rights, kindly contact us at <a href="mailto:info@recyclepro.co.uk">info@recyclepro.co.uk</a></p>
                                        <p class="lead">Fee Requirement:</p><p>We do not require any fee from you in exchange for access to your personal information or exercising your rights, however, this may not be the case if the access request is frequent, groundless or excessive.</p>
                                        <p class="lead">What We May Require:</p><p>We prioritize the safety of your valuable data and to ensure your information is not shared with someone who does not possess any rights to access it, we may require you to present certain information to verify your identity and your rights to receive this information.</p>
                                        <p class="lead">Request Duration:</p><p>We typically respond to requests within one-month timeframe. However, the time duration may increase as per the complexity of the request for which you will be informed in time.</p>
                                    </div>
                                </div>
                                 </div>
                                 </div>
                            </div>
                        </div>
                        </div>

                        <script>
                            $(document).on("click",".nav-link",function() {

                              $('html, body').animate({
                                    scrollTop: $(".tab-vertical").offset().top
                                }, 1000);



                            });
                        </script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript' src='#'></script>
                                <script type='text/javascript'>#</script>
                                <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
                                myLink.addEventListener('click', function(e) {
                                  e.preventDefault();
                                });</script>

        <!--// Page Conttent -->

        <!-- Footer -->
        <?php $layout_obj->footer(); ?>
        <!--// Footer -->


    </div>
    <!--// Wrapper -->
    <script>
    includeHTML();
    </script>
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>
