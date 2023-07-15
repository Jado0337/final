<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once("wr-m6/apps/front/class/config.front.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/user/user.class.php');
$layout_obj = new LayoutClass();
$user_obj = new UserClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">
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
        <?php $layout_obj->pageHead(); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- My Account Page -->
            <div class="my-account-area ptb-30">
                <div class="container">
                    <div class="row">
						<div class="col-lg-3"></div>
                        <!-- Login Form -->
                        <div class="col-lg-6">
							<div class="col-lg-12 login-tabs pl-0 pr-0">
								<div class="login-tabs-inner login-tab-1 login-tab-active">
									<a href="javascript: void(0);">I HAVE AN ACCOUNT</a>
								</div>
								<div class="login-tabs-inner login-tab-2">
									<a href="register.php">I AM NEW HERE &nbsp; &nbsp; &nbsp;</a>
								</div>
							</div>
                            <div class="login-form-wrapper logintab-clearfix">
                                <?php 
									if($loginsbt=='loginfrm')
									$user_obj->LoginSubmit();
									else
									$user_obj->LoginUser();
								?>
                            </div>
                        </div>
                        <!--// Login Form -->
						<div class="col-lg-3"></div>

                    </div>
                </div>
            </div>
            <!--// My Account Page -->

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