<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/home/homepage.class.php');
$layout_obj = new LayoutClass();
$home_obj = new HomePage(); 
extract($_REQUEST);
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>M6Repairs</title>
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
</head>

<body>
	<!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  	<![endif]-->

	<!-- Add your site or application content here -->

	<!-- Wrapper -->
	<div id="wrapper" class="wrapper">

		<!-- Header -->
		<?php $layout_obj->pageHead(); ?>
		<!--// Header -->

		<!-- Banners Area -->
		<div class="banners-area pb-30 bg-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<!-- Hero Area -->
						<?php $home_obj->HomeSLider(); ?>
						<!--// Hero Area -->
					</div>

					<div class="col-md-3">
						<div class="imgbanner mt-30">
							<a href="#">
								<img src="images/banner/banner-image-1.jpg" alt="banner">
							</a>
						</div>
						<div class="imgbanner mt-30">
							<a href="#">
								<img src="images/banner/banner-image-2.jpg" alt="banner">
							</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="imgbanner mt-30">
							<a href="#">
								<img src="images/banner/banner-image-3.jpg" alt="banner">
							</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="imgbanner mt-30">
							<a href="#">
								<img src="images/banner/banner-image-4.jpg" alt="banner">
							</a>
						</div>
					</div>

					<div class="col-md-4">
						<div class="imgbanner mt-30">
							<a href="#">
								<img src="images/banner/banner-image-5.jpg" alt="banner">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--// Banners Area -->

		<!-- Page Conttent -->
		<main class="page-content">

			<!-- Features Area -->
			<div class="ho-section features-area bg-white ptb-30">
				<div class="container">
					<div class="row">

						<!-- Single Feature -->
						<div class="col-lg-3 col-md-6 col-12">
							<div class="featurebox">
								<i class="flaticon-money-back"></i>
								<h5>Get Your Phone Value</h5>
								<p>we provide best value in market for you.</p>
							</div>
							
						</div>
						<!--// Single Feature -->

						<!-- Single Feature -->
						<div class="col-lg-3 col-md-6 col-12">
							<div class="featurebox">
								<i class="flaticon-shipped"></i>
								<h5>Send your Phone</h5>
								<p>Send your phone to us for approval.</p>
							</div>
							
						</div>
						<!--// Single Feature -->

						<!-- Single Feature -->
						<div class="col-lg-3 col-md-6 col-12">
							<div class="featurebox">
								<i class="flaticon-credit-card"></i>
								<h5>You will be Paid</h5>
								<p>You will be paid in your back account.</p>
							</div>
						</div>
						<!--// Single Feature -->

						<!-- Single Feature -->
						<div class="col-lg-3 col-md-6 col-12">
							<div class="featurebox">
								<i class="flaticon-support-1"></i>
								<h5>Support 24/7</h5>
								<p>Contact us 24 hours a day, 7 days a week</p>
							</div>
						</div>
						<!--// Single Feature -->

					</div>
				</div>
			</div>
			<!--// Features Area -->
			
			<div class="ho-section bg-theme pb-30">
				<div class="container">
					<div class="row">
						<div class="col-md-12 mt-30"><h2>Easy way to get your phone repaired</h2></div>
						<div class="col-md-3">
						 <div class="bg-dark-blue" style="padding:30px 10px 20px 10px;">
						 <h2>BROKEN DEVICE</h2>
						 <p>If your device breaks, don't panic. We offer a huge range of mobile phone & tablet repair services.</p>
						 <h1 style="margin-top: 15px; margin-bottom: 0px; font-size: 60px; color: #0b88ee;">01</h1>
						 </div>
						</div>
						<div class="col-md-3">
						 <div class="bg-dark-blue" style="padding:30px 10px 20px 10px;">
						 <h2>BROKEN DEVICE</h2>
						 <p>If your device breaks, don't panic. We offer a huge range of mobile phone & tablet repair services.</p>
						 <h1 style="margin-top: 15px; margin-bottom: 0px; font-size: 60px; color: #0b88ee;">02</h1>
						 </div>
						</div>
						<div class="col-md-3">
						 <div class="bg-dark-blue" style="padding:30px 10px 20px 10px;">
						 <h2>BROKEN DEVICE</h2>
						 <p>If your device breaks, don't panic. We offer a huge range of mobile phone & tablet repair services.</p>
						 <h1 style="margin-top: 15px; margin-bottom: 0px; font-size: 60px; color: #0b88ee;">03</h1>
						 </div>
						</div>
						<div class="col-md-3">
						 <div class="bg-dark-blue" style="padding:30px 10px 20px 10px;">
						 <h2>BROKEN DEVICE</h2>
						 <p>If your device breaks, don't panic. We offer a huge range of mobile phone & tablet repair services.</p>
						 <h1 style="margin-top: 15px; margin-bottom: 0px; font-size: 60px; color: #0b88ee;">04</h1>
						 </div>
						</div>
					</div>
				</div>
			</div>

			<!-- Trending Our Product Area -->
			<div class=" trending-our-product-area bg-white">
				<div class="container">
					<div class="row">

						<!-- Trending Our Product Left -->
						<div class="col-lg-9 col-md-8">

							<!-- Our Products Area -->
							<?php $home_obj->HomeProductSlider(); ?>
							<!--// Our Products Area -->

							<!-- Banner -->
							<div class="imgbanner imgbanner-2 mt-30">
								<a href="#">
									<img src="images/banner/banner-image-8.jpg" alt="banner">
								</a>
							</div>
							<!--// Banner -->

						</div>
						<!--// Trending Our Product Left -->

						<!-- Trending Our Product Right -->
						<div class="col-lg-3 col-md-4">

							<!-- Categories -->
							<?php $home_obj->ShowBrandsHome(); ?>
							<!--// Categories -->

							<!-- Banner -->
							<div class="imgbanner imgbanner-2 mt-30">
								<a href="#">
									<img src="images/banner/banner-image-9.jpg" alt="image banner">
								</a>
							</div>
							<!--// Banner -->


						</div>
						<!--// Trending Our Product Right -->

					</div>
				</div>
			</div>
			<!--// Trending Our Product Area -->



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
	
</body>
</html>