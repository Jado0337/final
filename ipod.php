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
                <img src="images/applebackground.jpg">
                
            </div>
            <div class="col-md-7">
                <div class="row">
            <div class="col-md-12">
                <h3 style="font-size:23px;font-weight:600!important;color:#17a697!important;margin-top:5%;">How to remove your iCloud Account</h3>
                <p style="font-size:19px;font-weight:600!important;">If you’re selling an Apple device on iOS7 or higher to us,you’ll need to remove your iCloud account before sending it.If you don’t, your payment may be delayed.</p>
                <p style="font-size:19px;">Removing your iCloud account is quick and easy,and can be completed using your device or via the iCloud website.Just select your device below and follow the simple steps!</p>
            </div>
        </div>
          <div class="row">
            <div class="col-md-2">
                <a href="iphone.php"><img style="border: 2px solid #d2cdcd;"  src="images/iphone-button.jpg" >
                </div></a>
                <div class="col-md-2">
                   <a href="ipad.php"> <img style="border: 2px solid #d2cdcd;"  src="images/ipad-button.jpg">
                </div></a>
                <div class="col-md-2">
                    <a href="ipod.php"> <img style="border: 2px solid #41acff;"  src="images/ipod-button.jpg">
                </div></a>
                <div class="col-md-2">
                    <a href="watch.php"> <img style="border: 2px solid #d2cdcd;"  src="images/watch-button.jpg">
                </div></a>
                <div class="col-md-2">
                    <a href="macbook.php"> <img style="border: 2px solid #d2cdcd;"  src="images/macbook-button.jpg">
                </div></a>
                <div class="col-md-2">
                    <a href="imac.php"> <img style="border: 2px solid #d2cdcd;"  src="images/imac-button.jpg">
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
      Removing your iCloud account using your iPod</h3>
                <p style="font-size:19px;text-align:center;">1. Select ‘Settings’ and tap ‘iCloud’.
                </br>
2. Select ‘Find my iPod’.
 </br>
3. Slide the ‘Find my iPod’ button to off.
 </br>
4. Enter your password and select ‘Turn Off’.
 </br>
5. Go back to ‘Settings’ and select your Apple ID from the top left corner.
 </br>
6. Scroll to the bottom and select ‘Sign Out’.
</br>
7. Enter your Apple ID password and select ‘Sign Out’ to confirm.
</p>
<img src="images/ipodreset.jpg">
</div>
<div class="col-md-1">
    </div>
<div style="background-color:white;margin-top:5%;margin-bottom:5%;" class="col-md-5">
                <h3 style="font-size:23px;font-weight:600!important;color:#17a697!important;margin-top:5%;text-align:center;">
      Removing your iCloud account remotely using your PC or laptop</h3>
                <p style="font-size:19px;text-align:center;">1. Switch off your device.
                </br>
2. Log into iCloud.com using your Apple ID.
 </br>
3. Click ‘Find my iPad’.
 </br>
4. Select your device from the ‘All Devices’ drop-down menu.
 </br>
5. Click ‘Remove from Account’.
 </br>
6. Click ‘Remove’ on the confirmation message.</p>
<img src="images/laptopaccount.jpg">
<div style="text-align:center;margin-bottom:8%;">
<a  style="padding:4%;background-color:#17a697;color:white;font-weight:600!important;border-radius: 9px;" href=""  >Go to Icloud.com</a>
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