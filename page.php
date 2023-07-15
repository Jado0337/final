<?php
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($url=="page.php?p=5&h=game-consoles-repair" || $url=="page.php?p=3&h=mobile-screen-repair" || $url=="page.php?p=4&h=tablet-ipad-repair")
{
  $yourURL="page.php?p=1&h=about-us";
    header("location: $yourURL", true, 301);
}
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/pages/pages.class.php');
$layout_obj = new LayoutClass();
$page_obj = new PagesClass();
extract($_REQUEST);

if($p==1 || $p==5 || $p==8)
$pagename='about';


?>
<!doctype html>
<html class="no-js" lang="en-gb">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $page_obj->getPageData('title',$p); ?></title>
    <meta name="description" content="<?php echo $page_obj->getPageData('metadescription',$p); ?>">
	<meta name="keywords" content="<?php echo $page_obj->getPageData('keywords',$p); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="canonical" href="page.php?p=1&h=about-us">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">

            <link rel="stylesheet" href="home/css/font-awesome.min.css">
            <link rel="stylesheet" href="home/css/bootstrap.css">
            <link rel="stylesheet" href="home/css/magnific-popup.css">
             <link rel="stylesheet" href="home/css/nice-select.css">                         
            <link rel="stylesheet" href="home/css/animate.min.css">
            <link rel="stylesheet" href="home/css/owl.carousel.css">                
            <link rel="stylesheet" href="home/css/main.css">
            <link rel="stylesheet" href="home/css/linearicons.css">
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
                        <li><?php echo $page_obj->getPageData('title',$p); ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Shop Page Area -->
            <div class="blog-area ptb-30">
                <div class="container">
                    <img class="img-fluid" src="images/About_banner.webp" alt="About_banner">
                   <section class="home-about-area section-gap">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-lg-6 col-md-6 home-about-left">
                            <img class="img-fluid" src="images/About_banner2.webp" alt="2">
                        </div>
                        <div class="col-lg-5 col-md-6 home-about-right">
                            <h6 style="font-size:23px;font-weight:600;color:#17a697;">About Us</h6>
                            <h1 class="text-uppercase">Recycle Pro Details</h1>
                            <p style="text-align:justify;">
                               In the ever dynamic and progressive society, the need for a holistic and integrated IT Disposal solution was inevitable. To cater to this need for a comprehensive and fully integrated IT disposal solution in the most environmentally sensitive way, Recycle Pro offers a unified approach to the responsible disposition of redundant IT assets and equipment.
                               Our one of a kind IT management services cover all aspects - from gathering to transfer and reusing, the process is carefully laid out to evacuate and discard IT hardware in the most secure and eco-friendly manner without adversely affecting the environment.  
                            </p>
                            
                        </div>
                        <div class="col-lg-12 pt-60">
                            <p style="text-align:center;">
                               We take the hassle out of having a clear out and make selling your stuff easy. It’s simple: get an instant price for your items, pop all of your stuff into a box and send it for FREE!
                            </p>
                            <p style="text-align:center;">
                               If you choose to get paid by bank transfer or PayPal, we'll pay you with in 24 hours after we have received your items and your cash will be ready to spend the day after or you can donate your money to your favourite charity.                              
                            </p >
                            
                        </div>
                    </div>
                   <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-4">
                            <div class="single-services" >
                                <img style="width:100px!important;height:100px!important;" class="img-fluid" src="images/price.webp"  alt="price icon">
                                <h4  style="font-size:23px;font-weight:600;color:#17a697;">PRICE</h4>
                                <p>
                                    Get an instant price for your stuff
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="single-services">
                                <img style="width:100px!important;height:100px!important;" class="img-fluid" src="images/box.webp" width="100px" height="100px" alt="box icon">
                                <h4  style="font-size:23px;font-weight:600;color:#17a697;">BOX</h4>
                                <p>
                                    Put your stuff in a box (any box will do)
                                </p>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="single-services">
                               <img style="width:100px!important;height:100px!important;" class="img-fluid" src="images/car.webp" width="100px" height="100px" alt="car icon">
                               <h4  style="font-size:23px;font-weight:600;color:#17a697;">SEND</h4>
                                <p>
                                   Send your stuff for FREE
                                </p>
                            </div>  
                        </div>
                    </div>
                </div>
                 <div class="col-md-12">
                            
                <h1 style="font-size:38px;font-weight:600;margin-top:5%;text-align:center;">Be Social With Recycle Pro</h1>
                
                        </div>
                <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-3">
                            <div class="single-services">
                                <img class="img-fluid" src="images/facebook_logo.webp"  alt=facebook logo"" width="100px" height="100px">
                                <h4  style="font-size:23px;font-weight:600;color:#17a697;">Facebook</h4>
                                <p>
                                    Get in touch with Recyclepro through Facebook
                                </p>
                                
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="single-services">
                               <img class="img-fluid" src="images/twitter_logo.webp"  alt="twitter logo" width="100px" height="100px">
                                <h4  style="font-size:23px;font-weight:600;color:#17a697;">Twitter</h4>
                                <p>
                                    Get in touch with Recyclepro through Twitter
                                </p>
                                
                               
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <div class="single-services">
                                <img class="img-fluid" src="images/google_logo.webp"  alt="google logo" width="100px" height="100px">
                               <h4  style="font-size:23px;font-weight:600;color:#17a697;">Google</h4>
                                <p>
                                    Get in touch with Recyclepro through Google
                                </p>
                                
                                
                            </div>  
                        </div>
                        <div class="col-md-3">
                            <div class="single-services">
                               <img class="img-fluid" src="images/insta_logo.webp"  alt="insta logo" width="100px" height="100px">
                                <h4  style="font-size:23px;font-weight:600;color:#17a697;">Instagram</h4>
                                <p>
                                    Get in touch with Recyclepro through Instagram
                                </p>
                                
                                
                            </div>  
                        </div>
                    </div>
                </div>
                </div>  
            </section>
                </div>
            </div>
            <!--// Shop Page Area -->

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
    <script src="home/js/popper.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>         
    <script src="home/js/easing.min.js"></script>           
    <script src="home/js/hoverIntent.js"></script>
    <script src="home/js/superfish.min.js"></script>    
    <script src="home/js/jquery.ajaxchimp.min.js"></script>
    <script src="home/js/jquery.magnific-popup.min.js"></script>    
    <script src="home/js/jquery.tabs.min.js"></script>                      
    <script src="home/js/jquery.nice-select.min.js"></script>   
    <script src="home/js/isotope.pkgd.min.js"></script>         
    <script src="home/js/waypoints.min.js"></script>
    <script src="home/js/jquery.counterup.min.js"></script>
    <script src="home/js/simple-skillbar.js"></script>                          
    <script src="home/js/owl.carousel.min.js"></script>                         
    <script src="home/js/mail-script.js"></script>  
    <script src="home/js/main.js"></script> 
    
	<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>