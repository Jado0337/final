<?php
include('Db.php');
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (strpos($url, "/?")!==false){
   $yourURL="";
   header("location: $yourURL", true, 301);
}
require_once("wr-m6/wrbasic/config.inc.php");
require_once("wr-m6/apps/front/class/config.front.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/home/homepage.class.php');
$layout_obj = new LayoutClass();
$home_obj = new HomePage();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<head>
	<style>
	ul.divcontact.dropdown-menu.src {
    border-color: black!important;
    width: 68%;
    overflow-y: scroll;
    overflow-x: hidden;

}
.pdetails-description ul li {
    list-style: none;
    border: solid 1px #f1f1f1;
}
.header-middle {
    padding: 0px!important;
}
.hrg{
    height:300px;
}
ul.divcontact.dropdown-menu.src.hrg {
    left: 15px;
}
.tawk-icon-right {
    display: none;
}
.tawk-min-container {
    height: 100%!important;
    width: 100%!important;
    background-color: #13564f !important;
    border-radius: 10px !important;
}

 ol{
    list-style-type: circle!important;
}
li{
    list-style-type: none;
}

ul.divcontact.dropdown-menu.src.hrg {
    margin-top: -1%;
}
.section-gap {
    padding: 10px 0px!important;
}
.portfolio-area .filters-content {
     margin-top:0px!important;
}
	.search-button {
    background-color: #13564f;
    border-radius: 3px;
    color: white!important;
    text-shadow: -1px -1px 0 rgba(0,0,0,.15);
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 700;
    cursor: pointer;
    display: inline-block;
    white-space: nowrap;
    font-size: 14px;
    transition: transform;
    transition-duration: .3s;
    transition-timing-function: ease-in-out;
    user-select: none;
    border: none;
    border-bottom: 5px solid #087167;
    font-size: 27px;
    line-height: 45px;
    padding: 5px 4px 5px 2px;
    width: 80%;
    letter-spacing: -.055em;
    vertical-align: top;
    z-index: 450;
    font-family: Open Sans,sans-serif;
    margin: 0;
    /* padding: 3px 2px; */
    text-align: center;
}
.search-button:hover {
    color: rgb(255, 255, 255);
    position: relative;
    top: 2px;
    background-color:#22d3d8!important;
}
.tab{
    display:none;
}
	.fullscreen {
    min-height: 60vh!important;
    width: 100%;
}
.close:not(:disabled):not(.disabled) {
    cursor: pointer;
    background: white;
    border-radius: 50%;
    padding-top: 1%;
}
.modal-header {
	border-bottom:0px!important;
    }
    .containers {
  position: relative;
  width: 100%;
  }

.containers img {
  width: 100%;
  height: auto;
}

.containers .btn {
  position: absolute;
  top: 90%;
  left: 15%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 18px;
  width:15%;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  display: none;
}
.containers .bts {
  position: absolute;
  top: 90%;
  left: 33%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 18px;
  width:15%;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  display: none;
}

.modal-content {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 100%;
    /* pointer-events: auto; */
    background-color: transparent!important;
    background-clip: padding-box;
    border: 0px solid rgba(0, 0, 0, 0.2)!important;
    /* border-radius: 0.3rem; */
    /* outline: 0; */
}
ul.typeahead.dropdown-menu{
    display: none!important;

}

ul.divcontact.dropdown-menu.src {
    border-color: white!important;

}
.dropdown-menu{
    display: block!important;
   }
.slide{

    position:absolute;
    left:0;
    opacity: 0;


    -webkit-transition: opacity 1s;
    -moz-transition: opacity 1s;
    -o-transition: opacity 1s;
    transition: opacity 1s;
}

.showing{
    opacity: 1;

}
.new
{
    background-image:url(images/Newsletter.webp);background-size:cover;
}
@media only screen and (max-width: 690px) {
.search-button {
	width:100%!important;
}
.new
{
    background-image:url(images/Newsletter.webp);
    background-size: contain!important;
    background-repeat: no-repeat!important;
}
.wdth{
    width:300px;
}
.newsheadings
{
    font-size:19px!important;
}
.newsparagraghs
{
   font-size:12px!important;
   width:60%;
}
.ptb-50
{
    padding-top:0px!important;
    margin-top:-9%;
}
.newit
{
    width:65%!important;
    height:36px!important;
}
.newbt
{
    width:65%!important;
    font-size:13px!important;
    height:36px!important;
}
	ul.divcontact.dropdown-menu.src {

    width: 100%;
    overflow-y: scroll;
    overflow-x: hidden;

}
.dropdown-item {
    display: block;
    width: 100%;
    padding: 0.25rem,1.5rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    white-space: pre-line!important;
    background-color: transparent;
    border: 0;
    font-size: 11px;
}
ul.divcontact.dropdown-menu.src {
    width: 90%!important;
}
.containers .btn
{
    width:auto;
    font-size:8px;
    height:26px;
    left:13%;
}
.containers .bts
{
    width:auto;
    font-size:8px;
     height:26px;
     left:44%;
}

}
@media only screen and (max-width: 1000px) {


.tab{
    display:block;
}
.deskc{
    display:none;
}
.containers .btn
{
    width:auto;
    font-size:12px;
    height:26px;
    left:13%;
}
.containers .bts
{
    width:auto;
    font-size:12px;

    height:26px;
}
}
.zoom {

  transition: transform .2s;
  margin: 0 auto;
}

.zoom:hover {
  -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1);
}
a:hover {
    text-decoration: none;
    outline: 0;
    background-color: transparent!important;
}
.MultiCarousel {
	float: left;
	overflow: hidden;
	padding: 15px;
	width: 100%;
	position: relative;
}
.MultiCarousel .MultiCarousel-inner {
	transition: 1s ease all;
	float: left;
}
.MultiCarousel .MultiCarousel-inner .item {
	float: left;
}
.MultiCarousel .MultiCarousel-inner .item > div {
	text-align: center;
	padding: 10px;
	margin: 10px;
	color: #666;
}
.MultiCarousel .leftLst,
.MultiCarousel .rightLst {
	position: absolute;
	border-radius: 50%;
	top: calc(50% - 20px);
}
/******* Bnt Full********
.MultiCarousel .leftLst, .MultiCarousel .rightLst {
    position: absolute;
    border-radius: 50%;
    height: 80%;
    top: 24px;
}**/

.MultiCarousel .leftLst {
	left: 0;
}
.MultiCarousel .rightLst {
	right: 0;
}

.MultiCarousel .leftLst.over,
.MultiCarousel .rightLst.over {
	pointer-events: none;
	background: #ccc;
}

.mean-container .mean-bar {
    float: left;
    background: 0 0;
    padding: 9px;
    min-height: 40px;
    z-index: 99;
}
	</style>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php $layout_obj->TitleGeneral(); ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">


	<!-- Google font (font-family: 'Roboto', sans-serif;) -->

	<!-- Plugins -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<link rel="stylesheet" href="css/plugins.css">

	<!-- Style Css -->
	<link rel="stylesheet" href="style.css">
	<!--<link rel="stylesheet" href="css/css-utilities-technovibes.css">-->
	<!-- Custom Styles -->
	<link rel="stylesheet" href="css/custom.css">
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<script src="js/page.js"></script>
	<!--<link rel="stylesheet" href="css/linearicons.css">-->
			<!-- <link rel="stylesheet" href="home/css/bootstrap.css"> -->
			<!--<link rel="stylesheet" href="home/css/magnific-popup.css">-->
		<!--<link rel="stylesheet" href="home/css/nice-select.css">
			<link rel="stylesheet" href="home/css/animate.min.css">
			<link rel="stylesheet" href="home/css/owl.carousel.css">-->
			<!-- <link rel="stylesheet" href="home/css/main.css"> -->


	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
	
	<!-- jQuery Modal -->

	
</head>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Recycle Pro",
  "url": "",
  "logo": "img/m6-logo-1.webp",
  "sameAs": [
    "https://www.facebook.com/Recycle-pro-102337717901297/"
   ]
}
</script>
<body>
    	<?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
	<div id="wrapper" class="wrapper">

		<!-- Header -->
		<?php $layout_obj->pageHead('home'); ?>
		<!--// Header -->
		<!-- start banner Area -->


					<!-- Image Map Generated by http://www.image-map.net/ -->
<div class="containers">
<img src="images/2-rp.webp" alt="main-cover" height="100%" width="100%">
<button style="background-color:#13564f;" onclick="document.location='#portfolio'" class="btn">Start Selling</button>
<button style="background-color:#17a2b8;" onclick="document.location='https://shoprecyclepro.co.uk/'" class="bts">Start Shopping</button>
</div>

			<!-- End banner Area -->
<!-- Start services Area -->
<?php
$sql = "UPDATE counter SET visit = visit+1 WHERE id = 1";
mysqli_query($con,$sql);
$sqli="SELECT visit FROM counter WHERE id = 1";
$counter=mysqli_query($con,$sqli);
while($count=mysqli_fetch_array($counter))
{
	$visit=$count['visit'];
}

?>
<!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-lg">
      <div style="margin-top:30%;" class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div  class="modal-body new">
          <div style="background-color:transparent!important;" class="ho-section newsletter-area  ptb-50">
	<div class="container">



<div class="row">
			<div class="col-md-6">
			<div class="newsletter-content">
				<form id="mc-form">
					<div>
						<h2 class="newsheadings" style="color:white;font-size:30px;font-weight:800;margin-top:4%;margin-bottom:2%;text-shadow: 1px 2px black;">Join Us Now</h2>
						</div>
						<div>
						<p class="newsparagraghs"  style="color:white;font-size:15px;font-weight:500;margin-bottom:4%;text-shadow: 1px 2px black;">sign up today and be the first to get notified on new updates</p>
					</div>
					<div>
					<input class="newit" style="background: white;" id="mc-email" type="email" autocomplete="off" placeholder="Your email address..." required>
				</div>
					<div style="margin-top:4%;">
					<button class="newbt" style="width:100%;color:white;background-color:#04544d;border-color:#04544d;font-size:19px;" id="mc-submit" type="submit">Subscribe Now</button>
				</div>
				</form>
				<!-- mailchimp-alerts start -->
				<div class="mailchimp-alerts text-centre">
					<div style="color:white;" class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
					<div style="color:white;" class="mailchimp-success"></div><!-- mailchimp-success end -->
					<div style="color:white;" class="mailchimp-error"></div><!-- mailchimp-error end -->
				</div><!-- mailchimp-alerts end -->
			</div>
		</div>

	</div>
</div>
	</div>
</div>

        <!-- Modal footer -->

      </div>
    </div>
    </div>
  <section style="background-color: #f4f4f4;" class="services-area deskc ">
    <img  src="images/shipbanner.webp" alt="" height="100%" width="100%">
    </section


			<section style="background-color: #f4f4f4;" class="services-area tab ">

		            <div class="row d-flex justify-content-center">
		                <div class="menu-content  col-lg-7">
		                    <div class="title text-center">
		                        <h1 style="color:#13564f!important;margin-top:4%;" class="mb-10">Why Sell with Recyclepro?</h1>

		                    </div>
		                </div>
		            </div>
					<div class="row">
						<div class="col-lg-5 col-md-10">
							<div class="single-services">
								<img class="wdth" src="images/check9.webp" alt="check9" height="100%" width="100%">
							</div>
						</div>

						<div class="col-lg-5 col-md-12">
							<div class="row">
							    <div class="col-lg-6 col-md-6">
							<div  class="single-services">
								<span class="lnr  fa fa-thumbs-o-up"></span>
								<h4>Review</h4>
								<p>
									We Aim to be Number One Mobile Recycling Service In Uk.
								</p>
							</div>
						</div>
					<div class="col-lg-6 col-md-6">
							<div  class="single-services">
								<span class="lnr fa fa-user"></span>
								<h4>Customers</h4>
								<p>
									Over £350 Million Paid Out to Over 6 Million Happy Customers on Different Platforms
								</p>
							</div>
						</div>
						</div>
						<div class="row">
						<div class="col-lg-6 col-md-6">
							<div  class="single-services" >
								<span class="lnr fa fa-group"></span>
								<h4>(<?php echo $visit; ?>) Visitors</h4>
								<p>
									Numbers of Visitor On Our Websites
								</p>
							</div>
						</div>


							<div class="col-lg-6 col-md-6">
							<div  class="single-services" >
								<span class="lnr fa fa-money" ></span>
								<h4>Fast Payment with in 24 Hours</h4>
								<p>
									*Subject to the Quality Assessment having been completed with in 24 Hours – Most are!
								</p>
							</div>
						</div>
						</div>

						</div>
					</div>
			</section>
		<!-- Page Conttent -->

		<!-- Banners Area -->


		<!--// Banners Area -->
<!-- Start portfolio-area Area -->
            <section class="portfolio-area section-gap" id="portfolio">
                <div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-12">
		                	<?php $home_obj->HomeSearch(); ?>

		                </div>
		            </div>



                    <div class="filters-content">
                        <div class="title text-center">

		                        <h2 style="color:#13564f!important;margin-bottom:3%;margin-top:3%;" class="mb-10">Our Featured Products</h2>

		                    </div>
                        <div class="row grid">

                            <div class="single-portfolio col-sm-4 all vector">
                            	<div style="cursor:pointer;" class="relative" onclick="document.location='brands.php?p=phones'">
	                            	<div class="thumb">
	                            		<div class=""></div>
	                            		 <img class="image img-fluid" src="uploads/iphone.webp" alt="Phones" height="100%" width="100%">
	                            	</div>
									<a href="brands.php?p=phones" >

								</a>
                            	</div>
								<div class="p-inner">
								    <a href="brands.php?p=phones" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span>Phones</span></a>

								</div>
                            </div>
                            <div class="single-portfolio col-sm-4 all vector">
                            	<div style="cursor:pointer;" class="relative" onclick="document.location='brands.php?p=tablets'">
	                            	<div class="thumb">
	                            		<div class=""></div>
	                            		 <img class="image img-fluid" src="uploads/tabs.webp" alt="Tablets" height="100%" width="100%">
	                            	</div>
									<a href="brands.php?p=tablets" >

								</a>
                            	</div>
								<div class="p-inner">
								    <a href="brands.php?p=tablets" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span>Tablets</span></a>

								</div>
                            </div>
                            <div class="single-portfolio col-sm-4 all vector">
                            	<div style="cursor:pointer;" class="relative" onclick="document.location='brands.php?p=laptops'">
	                            	<div class="thumb">
	                            		<div class=""></div>
	                            		 <img class="image img-fluid" src="uploads/macbook.webp" alt="Laptops & MacBooks" height="100%" width="100%">
	                            	</div>
									<a href="brands.php?p=laptops" >

								</a>
                            	</div>
								<div class="p-inner">
								    <a href="brands.php?p=laptops" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span>Laptops & MacBooks</span></a>

								</div>
                            </div>
                            <div class="single-portfolio col-sm-4 all vector">
                            	<div style="cursor:pointer;" class="relative" onclick="document.location='brands.php?p=Game-console'">
	                            	<div class="thumb">
	                            		<div class=""></div>
	                            		 <img class="image img-fluid" src="uploads/1.webp" alt="Game-console" height="100%" width="100%">
	                            	</div>
									<a href="brands.php?p=Game-console" >

								</a>
                            	</div>
								<div class="p-inner">
								    <a href="brands.php?p=Game-console" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span>Game console</span></a>

								</div>
                            </div>
                            <div class="single-portfolio col-sm-4 all vector">
                            	<div style="cursor:pointer;" class="relative" onclick="document.location='brands.php?p=smart-watches'">
	                            	<div class="thumb">
	                            		<div class=""></div>
	                            		 <img class="image img-fluid" src="uploads/watch.webp" alt="Phones" height="100%" width="100%">
	                            	</div>
									<a href="brands.php?p=smart-watches" >

								</a>
                            	</div>
								<div class="p-inner">
								    <a href="brands.php?p=smart-watches" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span>Smart Watch</span></a>

								</div>
                            </div>
                            <div class="single-portfolio col-sm-4 all vector">
                            	<div style="cursor:pointer;" class="relative" onclick="document.location='products.php?b=Apple&bid=22&pc=11'">
	                            	<div class="thumb">
	                            		<div class=""></div>
	                            		 <img class="image img-fluid" src="uploads/2.webp" alt="Phones" height="100%" width="100%">
	                            	</div>
									<a href="products.php?b=Apple&bid=22&pc=11" >

								</a>
                            	</div>
								<div class="p-inner">
								    <a href="products.php?b=Apple&bid=22&pc=11" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span>Airpodsss</span></a>

								</div>
                            </div>
                          </div>
                          </div>
                </div>
            </section>
            <!-- End portfolio-area Area -->

		<main class="page-content">

			<!-- Features Area -->
			<div class="ho-section features-area bg-white ptb-30">
				<div class="container">
					<div class="row">

						<!-- Single Feature -->
						<div class="col-lg-3 col-md-6 col-12">
							<div class="featurebox">
								<i class="flaticon-money-back"></i>
								<h5>Get your Phone Value</h5>
								<p>We provide best value in market for you.</p>
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
								<p>You will be paid in your bank account.</p>
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

					    <div>
					<h2 style="font-size:23px;text-align:center;font-weight:800;margin-top:3%;">What our Valuable Customers Think About Us!</h2>

					</div>
				<!--	<div class="row">
		<div class="MultiCarousel" data-items="1,2,3,4" data-slide="3" id="MultiCarousel"  data-interval="3000">
            <div class="MultiCarousel-inner">
                <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-1.webp" alt="Recycle-Pro-Review-1">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-2.webp" alt="Recycle-Pro-Review-2">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-3.webp" alt="Recycle-Pro-Review-3">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-4.webp" alt="Recycle-Pro-Review-4">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-5.webp" alt="Recycle-Pro-Review-5">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-6.webp" alt="Recycle-Pro-Review-6">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-7.webp" alt="Recycle-Pro-Review-7">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-8.webp" alt="Recycle-Pro-Review-8">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-9.webp" alt="Recycle-Pro-Review-9">
                    </div>
                </div>

                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-10.webp" alt="Recycle-Pro-Review-10">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-11.webp" alt="Recycle-Pro-Review-11">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-12.webp" alt="Recycle-Pro-Review-12">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-13.webp" alt="Recycle-Pro-Review-13">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-14.webp" alt="Recycle-Pro-Review-14">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-15.webp" alt="Recycle-Pro-Review-15">
                    </div>
                </div>
                 <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-16.webp" alt="Recycle-Pro-Review-16">
                    </div>
                </div>

                <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-17.webp" alt="Recycle-Pro-Review-17">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-18.webp" alt="Recycle-Pro-Review-18">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-19.webp" alt="Recycle-Pro-Review-19">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                       <img src="images/Recycle-Pro-Review-20.webp" alt="Recycle-Pro-Review-20">
                    </div>
                </div>
                </div>
                <button class="btn btn-primary leftLst"><</button>
            <button class="btn btn-primary rightLst">></button>
                </div>
                </div>-->
				</div>
			</div>


			<!--// Features Area -->

			<?php $home_obj->HomeInfoBox(); ?>




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
	<script src="js/typeahead.js"></script>
	
	<script>
		$(document).ready(function () {
			$('#mob-search-field').typeahead({
				source: function (querys, result) {
				  var querys = $('#mob-search-field').val();
				   if(querys == "iphone 13" || querys == "iphone 12" || querys == "iphone 11" || querys == "iphone 13 pro" || querys == "iphone 12 pro" || querys == "iphone 11 pro" || querys == "iphone 13 pro max" || querys == "iphone 12 pro max" || querys == "iphone 11 pro max")
				    {
				         var query = querys.split(' ').join(' ');
				    }
				     if($.trim($('#mob-search-field').val()) == ''){

				         alert();
				    var query = querys.split(' ').join(' ');
				    $('.divcontact').attr("style","display: none !important;");
				    }
				    else
				    {
				    var query = querys.split(' ').join(' ');
				      }
				 console.log(query)
					$.ajax({
						url: "search-info.php",
						data: 'query=' + query,
						dataType: "json",
						type: "POST",
						success: function (data) {
						    $(".divcontact").html(data);
							result($.map(data, function (item) {
								return item;
							}));
						}
					});
				}
			});
		});
		$("#mob-search-field").keyup(function(e){
   if($.trim($('#mob-search-field').val()) == ''){

				        $('.divcontact').attr("style","display: none !important;");
				    }
				    else if($.trim($('#mob-search-field').val()) != ''){

				        $('.divcontact').attr("style","display: block !important;");
				    }
});
	</script>

	<script>
		$(document).on('change','#mob-search-field',function() {
			var serval = $('#mob-search-field').val();
			var info = 'serval=' + serval;
			$.ajax({
			   type: "POST",
			   url: "wrajax.php?index=SearchVal",
			   data: info,
			   success: function(server_response){
				   ser_res = server_response;
				   var strarray = ser_res.split(',');
				   if(strarray[1]!='') {
					   window.location.href = "product-view.php?pid=" + strarray[0] + "&vid=" + strarray[1];
				   }
			 }
			});
			return false;
		});
	</script>
<script>

$('#mob-search-field').keyup(function(){

  if($(this).val()){
    $(this).parent().find('ul').addClass("hrg");
  }else{
    $(this).parent().find('ul').removeClass("hrg");
  }
});

	</script>
	<!--<script>
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide(){
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}

var playing = true;
var pauseButton = document.getElementById('pause');

function pauseSlideshow(){
    pauseButton.innerHTML = 'Play';
    playing = false;
    clearInterval(slideInterval);
}

function playSlideshow(){
    pauseButton.innerHTML = 'Pause';
    playing = true;
    slideInterval = setInterval(nextSlide,2000);
}

pauseButton.onclick = function(){
    if(playing){ pauseSlideshow(); }
    else{ playSlideshow(); }
};
</script>-->
<script>
	$(document).ready(function() {
    var isshow = localStorage.getItem('isshow');
    if (isshow == null) {
        localStorage.setItem('isshow', 1);

        // Show popup here
        $('#myModal').modal('hide');
    }
    else{
    $('#myModal').modal('hide');
  }
});
document.addEventListener('touchmove', function(event) {
        event = event.originalEvent || event;
        if (event.scale !== 1) {
           event.preventDefault();
        }
    }, false);
   $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
	</script>

	<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>
