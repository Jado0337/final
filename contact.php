<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/contact/contact.class.php');
$layout_obj = new LayoutClass();
$contact_obj = new ContactClass();
extract($_REQUEST);
$pagename='contact';
?>
<!doctype html>
<html class="no-js" lang="en-gb">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact Us</title>
    <meta name="description" content="Contact Us">
	<meta name="keywords" content="Contact Us">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
<link rel="canonical" href="contact.php"/>
    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/page.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
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
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <?php $contact_obj->ContactPage(); ?>

            <!-- Newsletter Area -->
            <?php $layout_obj->NewsLetterArea(); ?>
            <!--// Newsletter Area -->

        </main>
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