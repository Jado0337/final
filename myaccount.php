<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/myaccount/myaccount.class.php');
$layout_obj = new LayoutClass();
$myacc_obj = new MyAccountClass();
extract($_REQUEST);
?>
<?php if(!$_SESSION['userid']){ ?>
<script>window.location='login.php';</script>
<?php } ?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Recycle Pro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
     <link rel="stylesheet" href="css/print.css">
      <link rel="stylesheet" href="css/style.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/page.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
	<style>
	    .fade:not(.show) {
    opacity: 1;
}
.modal-lg {
    max-width: 1000px;
}
@media print {
    body * {
        visibility:hidden;
    }
    #page-wrap, #page-wrap * {
        visibility:visible;
    }
    #page-wrap {
        position:absolute;
        left:0;
        top:0;
    }
}
	</style>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>My Account</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->
        <!-- Page Conttent -->
        <main class="page-content">
				<?php $myacc_obj->MyAccount(); ?>
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
     <script src="js/example.js"></script>
<?php $myacc_obj->footerJS(); ?>
<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>