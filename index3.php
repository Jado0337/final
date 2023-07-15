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
						<?php /*?><div class="imgbanner mt-30">
							<a href="#">
								<img src="images/banner/banner-image-20.jpg" alt="banner">
							</a>
						</div><?php */?>
						<div class="row">
							<div class="col-md-12">
								<div style="padding: 25px; border: #0b88ee 3px solid; margin-top: 40px; background: #fff;">
									<h1 style="margin-top:25px;">What do you want to sell?</h1>
									
									
									<div class="row">
										
										<div class="col-md-12">
											<div class="pdetails-allinfo">

												<ul class="nav pdetails-allinfotab" id="product-details" role="tablist">
													<li class="nav-item">
														<a class="nav-link active" id="product-details-area1-tab" data-toggle="tab" href="#product-details-area1"
															role="tab" aria-controls="product-details-area1" aria-selected="true">Sell Mobile</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="product-details-area2-tab" data-toggle="tab" href="#product-details-area2"
															role="tab" aria-controls="product-details-area2" aria-selected="false">Sell Tablet</a>
													</li>
													<li class="nav-item">
														<a class="nav-link" id="product-details-area3-tab" data-toggle="tab" href="#product-details-area3"
															role="tab" aria-controls="product-details-area3" aria-selected="false">Sell Laptop</a>
													</li>
												</ul>
						
												<div class="tab-content" id="product-details-ontent">
													
													<div class="tab-pane fade show active" id="product-details-area1" role="tabpanel" aria-labelledby="product-details-area1-tab">
														<div class="pdetails-description">
															<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
															<form name="mob-search" class="wr-search">
																<input type="text" name="mob-search-field" class="wr-search-field" placeholder="Enter your item (Eg: Iphone 7)..." />
																<button name="mob-search-btn" class="wr-search-btn">Find Mobile</button>
																
															</form>
																
														</div>
													</div>
													<div class="tab-pane fade" id="product-details-area2" role="tabpanel" aria-labelledby="product-details-area2-tab">
														<div class="pdetails-description">
															<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
															<form name="mob-search" class="wr-search">
																<input type="text" name="mob-search-field" class="wr-search-field" placeholder="Enter your item (Eg: Ipad Pro)..." />
																<button name="mob-search-btn" class="wr-search-btn">Find Tablet</button>
																
															</form>
														</div>
													</div>
													<div class="tab-pane fade" id="product-details-area3" role="tabpanel" aria-labelledby="product-details-area3-tab">
														<div class="pdetails-description">
															<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
															<form name="mob-search" class="wr-search">
																<input type="text" name="mob-search-field" class="wr-search-field" placeholder="Enter your item (Eg: Macbook Air)..." />
																<button name="mob-search-btn" class="wr-search-btn">Find Laptop</button>
																
															</form>
														</div>
													</div>
												</div>
						
											</div>
											
											
										
										</div>
										
									</div>
									<?php $home_obj->HomeAllBrands(); ?>
								</div>
							</div>
						</div>
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