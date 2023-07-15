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
<html class="no-js" lang="zxx">

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
            <div class="col-md-6">
                <img src="images/genericwatchreset.jpg">
                
            </div>
            <div class="col-md-6">
                
           
                <h3 style="font-size:23px;font-weight:600!important;color:#17a697!important;margin-top:5%;">You can reset using the device options to return to the factory state, you have to follow these simple steps:</h3>
                <p style="font-size:19px;text-align:justify;">1. Access the settings menu of your device.              </br>
2. Go to the system settings, in the Personal section you will see the option "Backup" click on it and then click on "Factory data reset". If you do not see the Personal section look for the section "About the phone" click on "Storage" and then on "Backup and restore" and you will see the option "Factory data reset"
 </br>
3.  Before doing it, it will ask for confirmation and will show a message remembering that all your data will be deleted from this device, the data that you have uploaded to Google, Facebook, Twitter, Instagram or backups that you have in the cloud, such as Google Drive, Dropbox or One Drive will not be deleted.
 </br>
4. If necessary, draw the screen unlock pattern or enter the screen unlock password or PIN to continue.
</br>
5. Your device Alcatel Smart Watch it will restart and take several minutes to start while restoring the device to its factory state and optimizing the applications pre-installed in the system Proprietary OS.
</p>
            </div>
        </div>
        
       
    </div>
  
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