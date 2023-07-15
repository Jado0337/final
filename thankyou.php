<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once("wr-m6/apps/front/class/config.front.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/home/homepage.class.php');
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($url=="thankyou")
{
  $yourURL="thankyou.php";
    header("location: $yourURL", true, 301);
}
$home_obj = new HomePage(); 
$layout_obj = new LayoutClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="eng">
<head>
    <style>
	ul.divcontact.dropdown-menu.src {
    border-color: black!important;
    width: 60%;
    overflow-y: scroll;
    overflow-x: hidden;
   
}
.pdetails-description ul li {
    list-style: none;
    border: solid 1px #f1f1f1;
}
.hrg{
    height:300px;
}
 ol{
    list-style-type: circle!important;
}
li{
    list-style-type: circle!important;
}

.section-gap {
    padding: 10px 0px!important;
}
.portfolio-area .filters-content {
     margin-top:0px!important;
}
	.search-button {
    background-color: #17a697;
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
    background-image:url(images/Newsletter.jpg);background-size:cover;
}
.mobile
{
    display:none;
}
.dsktop
{
    display:block;
}
@media only screen and (max-width: 690px) {
.search-button {
	width:100%!important;
}
.new
{
    background-image:url(images/Newsletter.jpg);
    background-size: contain!important;
    background-repeat: no-repeat!important;
}
.mobile
{
    display:block;
}
.dsktop
{
    display:none;
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
    white-space: nowrap;
    background-color: transparent;
    border: 0;
    font-size: 11px;
}
ul.divcontact.dropdown-menu.src {
    width: 90%!important;
}

}
@media only screen and (max-width: 1000px) {
    ul.divcontact.dropdown-menu.src {
    margin-top: 21%!important;
}

.tab{
    display:block;
}
.deskc{
    display:none;
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


	</style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Recycle Pro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Global site tag (gtag.js) - Google Ads: 702917808 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-702917808"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-702917808');
</script>
<!-- Event snippet for RecyclePro_Conversion conversion page -->
<script>
  gtag('event', 'conversion', {
      'send_to': 'AW-702917808/3toRCL7_s7UBELDZls8C',
      'transaction_id': ''
  });
</script>
<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"136027522"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script>
<?php $layout_obj->TitleGeneral(); ?>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
	

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
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
	<script src="js/page.js"></script>
	<!--<link rel="stylesheet" href="css/linearicons.css">-->
			<link rel="stylesheet" href="home/css/font-awesome.min.css">
			<link rel="stylesheet" href="home/css/bootstrap.css">
			<!--<link rel="stylesheet" href="home/css/magnific-popup.css">-->
		<link rel="stylesheet" href="home/css/nice-select.css">							
			<link rel="stylesheet" href="home/css/animate.min.css">
			<link rel="stylesheet" href="home/css/owl.carousel.css">				
			<link rel="stylesheet" href="home/css/main.css">
			<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->
        <!-- Page Conttent -->
        <main class="page-content">
			<div class="cart-page-area ptb-30 bg-white">
					<div style="text-align:center;" class="container">	
					<h2 style="color:black;">Thank You</h2>
						<h2 style="color:black;margin-top:3%;">Order Placed Successfully!</h2>
						<p style="color:black;font-size:15px;">All the details regarding how to ship will be emailed to you shortly.</p>
						<p style="color:black;font-size:15px;">After we receive your device we will credit payments to your account.</p>
						<p ><strong style="font-size:26px;color:black;margin-bottom:2%;margin-top:3%;">Would you like to get it collected ?</strong> </p>
						
  <p style="margin-left: 28%;
    margin-right: 28%;color:black;font-size:15px;">Royal Mail now offer a <a style="color:#00adff;" href="https://send.royalmail.com/collect/youritems">collection service</a> where you can arrange to have your return collected from your home or work.  You will have your prepaid returns label which is sent to you via email, and all you need to do is follow the steps to book a collection from your desired address.</p>
  <p style="margin-top:20px;margin-left: 28%;
    margin-right: 28%;color:black;font-size:15px;">When <a style="color:#00adff;" href="https://send.royalmail.com/collect/youritems">booking your collection</a>, tick the second option: that I purchased via Send an item or other similar service, or postage for an item being returned using a Royal Mail Tracked Return service.</p>
  <p style="margin-top:20px;margin-left: 28%;
    margin-right: 28%;color:black;font-size:15px;">Then tick the option: Yes, there is a tracking number (you can find your returns tracking information on your prepaid returns label in your email usually will be in this format: #AB 1111 0001 2GB#). This will allow you to track the progress of your return to us.
When inputting a weight, the weight can be maximum in that catagory depending on the size of the parcel you are sending in. If you are not sure just select the 2kg for watch, phone, laptop and gaming consoles and 5kg for Pc and imacs.  </p>
<p style="margin-top:20px;margin-left: 28%;
    margin-right: 28%;color:black;font-size:15px;">All you then need to do is to provide your address from where you wish Royal Mail to collect your parcel and choose a collection date that suits you.</p>

						
						<?php /* HERE WE SET THE INTEGRATION */ ?>
						<p></p>
					
						
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
	<script type="text/javascript">

$(document).ready(function () {
    $("#chk").click(function () {
        $("#chk").hide();
       return true;
    });
});

</script>
    <!-- Js Files -->
   	<script src="js/vendor/modernizr-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/main.js"></script>
	<script src="js/typeahead.js"></script>
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
<?php $pro_obj->ProductJS(); ?>		
<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>