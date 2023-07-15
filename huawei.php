<?php 
include('Db.php');
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/home/homepage.class.php');
require_once('wr-m6/apps/front/products/products.class.php');
$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
$home_obj = new HomePage(); 
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">

<head>
    <style>
         </style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $pro_obj->getPageTitle(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/page.js"></script>
    <?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(); ?>
        <!--// Header -->
        <div class="container">
        <div class="row">
            <div class="col-md-5">
                <img src="images/huaweibackground.jpg">
                
            </div>
            <div class="col-md-7">
                <div class="row">
            <div class="col-md-12">
                <h3 style="font-size:23px;font-weight:600!important;color:#17a697!important;margin-top:5%;">How to unlock your Huawei device.</h3>
                <p style="font-size:19px;font-weight:600!important;">Before you send your Huawei phone or tablet to us, you’ll need to remove your Google account. If you don’t, your payment may be delayed.</p>
                <p style="font-size:19px;">Removing your account is quick and easy. Just follow the simple steps below.</p>
            </div>
        </div>
         <div class="row">
                <div class="col-md-3">
                <a href="huawei.php"><img style="border: 2px solid #41acff;"  src="images/huawei-phone-button.jpg" >
                </div></a>
                <div class="col-md-3">
                   <a href="huaweitablet.php"> <img style="border: 2px solid #d2cdcd;"  src="images/huawei-tablet-button.jpg">
                </div></a>
                <div class="col-md-3">
                   <a href="huaweiwatch.php"> <img style="border: 2px solid #d2cdcd;"  src="images/huawei-watch-button.jpg">
                </div></a>
                
                
                
        </div>
         </div>
        </div>
    </div>
    
    <div style="background-color:#f4f4f4;">
     <div class="container">
        <div class="row">
            <div style="background-color:white;margin-top:5%;margin-bottom:5%;" class="col-md-5">
                <h3 style="font-size:23px;font-weight:600!important;color:#17a697!important;margin-top:5%;text-align:center;">
      Removing your Google account using your device</h3>
                <p style="font-size:19px;text-align:center;">1. Start off by going into your Apps.
                </br>
2. Tap Settings.
 </br>
3. Once in Settings, tap the Lock screen and security section.
 </br>
4. Tap on Screen lock type.
 </br>
5. Type in your Pin, pattern or password.
 </br>
6. Tap on Swipe at the top.
</br>
7. Tap Remove Data.
 </br>
8. Tap Remove. Once you've taken off your security, you should be able to remove your Google account.
 </br>
9. Go back to the main Settings screen, and tap Cloud and accounts.
 </br>
10. Tap on Accounts.
</br>
11. Tap your Google account.
</br>
12. Tap the three dots in the top-right corner..
 </br>
13. Tap Remove account.
 </br>
14. Tap Remove account again to confirm it.
 </br>
15. Your Google account will have been removed from your Samsung Galaxy phone.</p>
<img src="images/huaweireset.jpg">

</div>
<div class="col-md-1">
    </div>
<div style="background-color:white;margin-top:5%;margin-bottom:5%;" class="col-md-5">
                <h3 style="font-size:23px;font-weight:600!important;color:#17a697!important;margin-top:5%;text-align:center;">
      Removing your Google account using your PC or laptop's browser</h3>
                <p style="font-size:19px;text-align:center;">1. Go to gmail.com and sign into your account.
                </br>
2. Click on the display picture located at top right corner.
 </br>
3. Click manage your google account.
 </br>
4. Click and select security from the left menu.
 </br>
5. Scroll down to Your devices and click on manage devices.
 </br>
6.Select the device that you want to sign out from.
</br>
7. Click the Sign out button. You’ll receive a warning, asking you to confirm that you do want to remove your account. Click “Sign out” to confirm.
</p>
<img src="images/samsung-google.jpg">
<div style="text-align:center;margin-bottom:8%;">
</br>
<a  style="padding:4%;background-color:#17a697;color:white;font-weight:600!important;border-radius: 9px;" href=""  >Go to huawei.com</a>
</div>
</div>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-3">
    </div>
            <div class="col-md-6">
                 <p style="font-size:15px!important;font-weight:600!important;text-align:center;margin-top:4%;margin-bottom:4%;">When you’ve removed your account, send your device to us for FREE and we’ll pay you the same day it arrives!</br>
*Please note if you are not using iOS 10 then these instructions may vary slightly.</p>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        <!-- Breadcrumb Area -->

 <?php $layout_obj->footer(); ?>
 </div>
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