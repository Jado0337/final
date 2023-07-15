<?php 
// Front Website Layout Class contains all functions to manage front website layout functions. 
class LayoutClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function getBasicVals($option_name,$valtype){
$sql = "select ".$valtype." from ".WR_BASIC." where option_name='".$option_name."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record[$valtype];
}
function TitleGeneral(){
?>
<?php
$protocol ="";
$urs= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$con = mysqli_connect("localhost", "recycleproco_sohaib", "123@Screw@@", "recycleproco_experiment") or die("Error " . mysqli_error($con));
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sql="select * from url where url='$url' ";
            $record=mysqli_query($con,$sql);
           while($row=mysqli_fetch_array($record))
            {
            	$title=$row['title'];
            	$keywords=$row['keywords'];
            	$description=$row['description'];
            }
 ?>
<title><?php echo $title;  ?></title>

<meta name="description" content="<?php echo $description;  ?>">
<meta name="keywords" content="<?php echo $keywords;  ?>">
<link rel="canonical" href="<?php echo $url;?>"/>
<meta property="og:image" content="img/m6-logo-1.webp" />
<meta property="og:description" content="Recyclepro is a web platform which provides peer-to-peer rubbish collection services on-demand or by subscription. Sell your old gadgets, phones, watches for cash online." />
<meta property="og:type" content="article" />
<meta property="og:locale" content="en-GB" />
<meta property="og:site_name" content="recyclepro" />
<meta property="og:title" content="Recycle pro - Sell old Phone | Cash for old phones| Sell Old Tablets" />
<meta property="og:url" content="" />
<meta property="twitter:partner" content="OG" />
<meta property="twitter:card" content="summary" />
<meta property="twitter:title" content="<?php echo $title;?>" />
<meta property="twitter:description" content="<?php echo $description;?>" />
<meta property="twitter:url" content="" />
<meta property="profile:first_name" content="Roger" />
<meta property="profile:last_name" content="Smith" />
<meta property="profile:username" content="Roger" />
 <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="google-site-verification" content="p_owfaSYTD8SpFiGr8VjMaEUyQnVd3m3latxVLW--Dc" />
    <style>
    @media only screen and (max-width: 690px) {
        footer.footer.bg-white {
    font-size: 18px;
}
}

.socialicons-radial ul li a:hover {
    background: #27a9e0;
    border-color: #2091c1;
    color: #000 !important;
}
    </style>
<?php 
}
function pageHead($pgname=''){
?>
		<header class="header">
			<!-- Header Top Area -->
			<div class="header-top bg-theme-red">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7 col-md-7 col-sm-7 col-12 dsktop">

							<p style="color:white !important;font-weight:600;" class="header-welcomemsg"><i style="color:white !important;font-weight:600;" class="fa fa-tv"></i> Welcome to <span style="color:white !important;">Recycle pro</span> Shopping Store !</p>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-12">
							<?php if($_SESSION['userid']){ ?>
							<div class="header-langcurr">
								<div class="select-currency">
									<i><img style="width: 39px;height: 39px;border-radius: 50%;" src="images/user_image.webp" ></i>
									<a style="color:white !important;" class="select-currency-current text-primary-wr" href="myaccount.php">Hi <?php echo $_SESSION['username']; ?>!</a>
								</div>
								
								<div class="select-language">
									<i style="color:white !important;" class="fa fa-sign-out"></i>
									<a style="color:white !important;" class="select-language-current" href="logout.php">Logout</a>
								</div>
								<div  class="select-language mob zoom">
								<a class="header-carticon" href="cart.php" onclick="window.location='cart.php'"><img src="images/cart.webp" width="55px" height="55px"><span class="count"><?php echo count($_SESSION['products']); ?></span></a>
								</div>
							</div>
							<?php 
						}
						
							else {
							?>
							<div class="header-langcurr">
								<div class="select-currency">
								<i style="color:white !important;" class="fa fa-user"></i>
									<a style="color:white !important;" class="select-currency-current" href="login.php">Login</a>
								</div>
								<div  class="select-language">
								<i style="color:white !important;" class="fa fa-user"></i>
									<a style="color:white !important;" class="select-language-current" href="register.php">Register</a>
								</div>
								<div  class="select-language mob zoom">
								<a class="header-carticon zoom" href="cart.php" onclick="window.location='cart.php'"><i class="lnr fa fa-cart-plus"></i><span class="count"><?php echo ($_SESSION['products']); ?></span></a>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!--// Header Top Area -->
			<!-- Header Middle Area -->
			<div class="header-middle dsktop <?php /*?>bg-theme<?php */?>">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-2">
							<a href="index.php" class="header-logo">
								<img height="100%" width="100%" src="img/m6-logo-1.webp" alt="<?php echo $this->getBasicVals('logo_alt_title','option_value'); ?>" title="<?php echo $this->getBasicVals('logo_alt_title','option_value2'); ?>" >
							</a>
						</div>
						<div class="col-md-3">
							<!-- TrustBox widget - Micro Review Count --> 
							<!-- TrustBox widget - Micro Review Count --> 
							<!-- TrustBox widget - Review Collector -->
							 <!-- <div  class="trustpilot-widget" data-locale="en-GB" data-template-id="5419b6a8b0d04a076446a9ad" data-businessunit-id="5df7a7d748a2590001008d19" data-style-height="30px" data-style-width="100%" data-theme="light"> <a href="https://uk.trustpilot.com/review/recyclepro.co.uk" target="_blank" rel="noopener">Trustpilot</a> </div>  -->
							 <!-- End TrustBox widget --> <!-- End TrustBox widget --> <!-- End TrustBox widget -->
							<?php /*?><form action="#" class="header-searchbox">
								<select class="select-searchcategory">
									<option value="0">All categories</option>
									<option value="1">Mobile</option>
									<option value="2">Laptops</option>
									<option value="3">Tablets</option>
									<option value="4">Ipods</option>
									<option value="5">Game Consoles</option>
								</select>
								<input type="text" placeholder="Enter your model name ...">
								<button type="submit"><i class="lnr lnr-magnifier"></i></button>
							</form><?php */?>
						</div>
						<div class="col-md-2 dsktop">
						<div style="color:#13564f!important;" class="header-contactinfo">
								<i class="fa fa-phone-square"></i>
								<span style="font-weight:600;">Call:</span>
								<b><a href="tel:<?php echo $this->getBasicVals('phone','option_value2'); ?>" style="color:#13564f!important;"><?php echo $this->getBasicVals('phone','option_value'); ?></a></b>
							</div>
						</div>
						<div class="col-md-2 dsktop">
						<div style="color:#13564f!important;" class="header-contactinfo">
								<i class="fa fa-envelope-square"></i>
								<span style="font-weight:600;">Email:</span>
								<b><a href="mailto:info@recyclepro.co.uk" style="color:#13564f!important;">info@recyclepro.co.uk</a></b>
							</div>
						</div>
						<div class="col-md-4 mobile">
						<div style="color:#13564f!important;" class="header-contactinfo">
								<i class="fa fa-phone-square"></i>
								<span style="font-weight:600;">Call :</span>
								<b><a href="#" style="color:#13564f!important;"><?php echo $this->getBasicVals('phone','option_value'); ?></a></b>
							</div>
						
						<div style="color:#13564f!important;" class="header-contactinfo">
								<i class="fa fa-envelope-square"></i>
								<span style="font-weight:600;">Email:</span>
								<b><a href="mailto:info@recyclepro.co.uk" style="color:#13564f!important;">info@recyclepro.co.uk</a></b>
							</div>
						</div>
						<div class="col-md-2">
							<div class="header-icons">
								
								<div class="header-cart zoom">
									<a class="header-carticon" href="cart.php" onclick="window.location='cart.php'"><img src="images/cart.webp" width="55px" height="55px" alt="cart"><span class="count"><?php echo ($_SESSION['products']); ?></span></a>
									<?php /*?><!-- Minicart -->
									<div class="header-minicart minicart">
										<div class="minicart-header">
											<div class="minicart-product">
												<div class="minicart-productimage">
													<a href="#">
														<img src="images/products/s1.jpg" alt="product image">
													</a>
													<span class="minicart-productquantity">S1</span>
												</div>
												<div class="minicart-productcontent">
													<h6><a href="#">Lorem ipsum dolor</a></h6>
													<span class="minicart-productprice">$43.00</span>
												</div>
												<button class="minicart-productclose"><i class="ion ion-ios-close-circle"></i></button>
											</div>
										</div>
										<ul class="minicart-pricing">
											<li>Total <span>$31.12</span></li>
										</ul>
										<div class="minicart-footer">
											<a href="#" class="ho-button ho-button-fullwidth">
												<span>Confirm selling</span>
											</a>
											<!--<a href="checkout.html" class="ho-button ho-button-dark ho-button-fullwidth">
												<span>Checkout</span>
											</a>-->
										</div>
									</div>
									<!--// Minicart --><?php */?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-middle mobile <?php /*?>bg-theme<?php */?>">
				<div class="container">
					<div class="row align-items-center">
					<table>
							<tr>
							    <td style="width:33%;">
							 <a href=""><img src="images\footerlogo.webp" alt="Trulli" width="130" height="130"> </a>  
						</td>
						<td style="width:33%;">
							 <a href="https://uk.trustpilot.com/review/recyclepro.co.uk?utm_medium=trustbox&utm_source=MicroReviewCount"><img  style="margin-top:4%;" src="images\trustpilot-2.webp" width="90" height="60" style="margin-bottom: 35px; margin-left:"> </a>  
						</td>
						
							 <td style="width:33%;">  
							 <a href="tel:<?php echo $this->getBasicVals('phone','option_value2'); ?>"><img  src="images\Phone-icon-1.webp" width="125" height="37"></a></a>
							 <a href="mailto:info@recyclepro.co.uk"><img  src="images\email-icon-1.webp" width="125" height="37"></a>
							 </td>
							    </tr>
						</table>	
						</div>
					</div>
				</div>
			</div>
			<!--// Header Middle Area -->
			<!-- Header Bottom Area -->
			<div class="header-bottom bg-theme bg-theme-red">
				
					<div class="row align-items-center">
						
						<div class="col-lg-12 d-none d-lg-block">
							<!-- Navigation -->
							<nav class="ho-navigation">
								<?php /*?><ul>
									<li class="<?php if($pgname=='home') echo 'active'; ?>">
										<a href="index.php">Home</a>
									</li>
									<li class="dropdown-holder <?php if($pgname=='services') echo 'active'; ?>">
										<a href="brands.php">Product Type</a>
										<ul class="hodropdown">
											<?php 
											$sql = "select * from ".WR_PROCAT." order by sorting asc";
											$record = $this->db->fetch_query($sql,$this->db->pdo_open());
											foreach ($record as $arr)
											{
											?>
											<li><a href="brands.php?p=<?php echo $arr['category']; ?>"><?php echo $arr['category']; ?></a></li>
											<?php
											}
											?>
										</ul>
									</li>
									<li class="dropdown-holder <?php if($pgname=='device') echo 'active'; ?>">
										<a href="brands.php">Sell Your Phone</a>
										<ul class="hodropdown">
											<?php 
											$sql = "select * from ".WR_BRANDS." order by sorting asc";
											$record = $this->db->fetch_query($sql,$this->db->pdo_open());
											foreach ($record as $arr)
											{
											?>
											<li><a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1"><?php echo $arr['brand_name']; ?></a></li>
											<?php
											}
											?>
										</ul>
									</li>
									<li class="<?php if($pgname=='blog') echo 'active'; ?>">
										<a href="blog.php">Blog</a>
									</li>
									<li class="<?php if($pgname=='about') echo 'active'; ?>">
										<a href="page.php?p=1&h=about-us">About Us</a>
									</li>
									<li class="<?php if($pgname=='contact') echo 'active'; ?>">
										<a href="contact.php"> Contact</a>
									</li>
								</ul><?php */?>
								
								
								<ul>
									<?php 
									$sql = "select * from ".WR_PROCAT." order by sorting asc";
									$record = $this->db->fetch_query($sql,$this->db->pdo_open());
									foreach ($record as $arr)
									{
										$sql2 = "select * from ".WR_BRANDS." where status='show' AND procat='".$arr['id']."' order by sorting asc";
										$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
										$subMenu = count($record2);
									?>
										<li class="<?php if($subMenu>0) echo 'dropdown-holder '; ?>">
											<a href="brands.php?p=<?php echo str_replace(" ", " ", $arr['slug']); ?>"><?php echo str_replace(" ", " ", $arr['display_name']); ?></a>
											<?php if($subMenu>0) { ?>
											<ul class="hodropdown">
												<?php 
												
												foreach ($record2 as $arr2)
												{
												?>
												<li><a href="products.php?b=<?php echo str_replace(" ", " ", $arr2['url']);  ?>&bid=<?php echo $arr2['id']; ?>&pc=<?php echo $arr2['procat']; ?>"><?php echo str_replace(" ", " ", $arr2['brand_name']); ?></a></li>
												<?php
												}
												?>
											</ul>
											<?php } ?>
										</li>
									
									
									<?php
									}
									?>
								
									<?php /*?><li class="<?php if($pgname=='home') echo 'active'; ?>">
										<a href="index.php">Home</a>
									</li><?php */?>
									<?php /*?><li class="dropdown-holder <?php if($pgname=='services') echo 'active'; ?>">
										<a href="brands.php">Product Type</a>
										<ul class="hodropdown">
											<?php 
											$sql = "select * from ".WR_PROCAT." order by sorting asc";
											$record = $this->db->fetch_query($sql,$this->db->pdo_open());
											foreach ($record as $arr)
											{
											?>
											<li><a href="brands.php?p=<?php echo $arr['category']; ?>"><?php echo $arr['category']; ?></a></li>
											<?php
											}
											?>
										</ul>
									</li><?php */?>
									<?php /*?><li class="dropdown-holder <?php if($pgname=='device') echo 'active'; ?>">
										<a href="brands.php">Sell Your Phone</a>
										<ul class="hodropdown">
											<?php 
											$sql = "select * from ".WR_BRANDS." order by sorting asc";
											$record = $this->db->fetch_query($sql,$this->db->pdo_open());
											foreach ($record as $arr)
											{
											?>
											<li><a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1"><?php echo $arr['brand_name']; ?></a></li>
											<?php
											}
											?>
										</ul>
									</li><?php */?>
									<li class="<?php if($pgname=='blog') echo 'active'; ?>">
										<a href="blog.php">Blog</a>
									</li>
									
								</ul>
								
							</nav>
							<!--// Navigation -->
						</div>
						
						<div class="col-12 d-block d-lg-none">
							<div class="mobile-menu clearfix mean-container">
							    
							</div>
						</div>
					</div>
				
			</div>
			<!--// Header Bottom Area -->
		</header>
<?php 
}	
function footer(){
?>
		<footer class="footer bg-white">
			<!-- Footer Top Area -->
			<div style="background-color:#191c22;" class="footer-toparea">
				<div class="container">
					<div class="row">
						
						<div class="col-lg-3 col-md-6 col-sm-12">
							<a href="index.php" class="header-logo">
								<img style="width:150px;height:150px;margin-top: 39px;margin-left: 50px;" src="img/footerlogo.webp" alt="<?php echo $this->getBasicVals('logo_alt_title','option_value'); ?>" title="<?php echo $this->getBasicVals('logo_alt_title','option_value2'); ?>" >
							</a>
							
			
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footer-widget widget-links">
								<h5 style="font-size:23px;color:white" class="footer-widget-title">Our Company</h5>
								<ul>
									<li  style="color:#13564f!important;font-size:23px;"><i style="font-size:19px;" class=" fa fa-folder-open"></i><a style="color:white!important;margin-left:2%;" href="page.php?p=1&h=about-us">About us</a></li>
									<li style="color:#13564f!important;margin-top:2%;font-size:23px;"><i style="font-size:19px;" class="fa fa-file-word-o"></i><a style="color:white!important;margin-left:2%;" href="terms.php">Terms and Conditions</a></li>
									<li style="color:#13564f!important;margin-top:2%;font-size:23px;"><i style="font-size:19px;" class="fa fa-key"></i><a style="color:white!important;margin-left:2%;" href="privacy-policy.php">Privacy Policy</a></li>
									<li style="color:#13564f!important;margin-top:2%;font-size:23px;"><i style="font-size:19px;" class="fa fa-phone"></i><a style="color:white!important;margin-left:2%;" href="contact.php">Contact Us</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footer-widget widget-links">
								<h5 style="font-size:23px;color:white" class="footer-widget-title">Your Account</h5>
								<ul>
									<li style="color:#13564f!important;margin-top:2%;font-size:23px;"><i style="font-size:19px;" class="fa fa-user"></i><a style="color:white!important;margin-left:2%;" href="myaccount.php"> My Account</a></li>
									<li style="color:#13564f!important;margin-top:2%;font-size:23px;"><i style="font-size:19px;" class="fa fa-shopping-cart"></i><a style="color:white!important;margin-left:2%;" href="cart.php"> Cart</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-12">
							<div class="footer-widget widget-links">
								<h5 style="font-size:23px;color:white" class="footer-widget-title">Contact Info</h5>
								<ul>
									<li style="color:white;margin-top:2%;font-weight:600;"><i style="font-size:19px;margin-right:2%;color:#13564f;" class="fa fa-envelope-square"></i>Email: <a href="mailto:<?php echo $this->getBasicVals('email','option_value2'); ?>">info@recyclepro.co.uk</a></li>
									<li style="color:white;margin-top:2%;font-weight:600;"><i style="font-size:19px;margin-right:2%;color:#13564f;" class="fa fa-phone-square"></i>Call : <a href="tel:<?php echo $this->getBasicVals('phone','option_value2'); ?>"><?php echo $this->getBasicVals('phone','option_value'); ?></a></li>
									
									<?php /*?><li><i class="ion ion-ios-glode"></i> www.recyclepro.co.uk</li><?php */?>
								</ul>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!--// Footer Top Area -->
			<!-- Footer Bottom -->
			<div style="background-color:#191c22;" class="footer-bottomarea">
				<div class="container">
					<div class="footer-copyright">
						<p style="color:white;text-align:center;" class="copyright"><?php echo $this->getBasicVals('footer_copyright','option_value'); ?></p>
					</div>
				</div>
			</div>
			<!--// Footer Bottom -->
		</footer>
<?php 
}	

function NewsLetterArea(){
?>
<div class="ho-section newsletter-area bg-grey ptb-50">
	<div class="container">
		<div class="newsletter">
			<div class="newsletter-title">
				<h2>Subscribe to our <span>Newsletter!</span></h2>
</div>
			
			<div class="newsletter-content">
				<form id="mn-form" class="newsletter-form">
					<input id="mc-email" type="email" autocomplete="off" placeholder="Your email address...">
					<button id="mc-submit" type="button">Subscribe</button>
				</form>
				<!-- mailchimp-alerts start -->
				<div class="mailchimp-alerts text-centre">
					<div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
					<div class="mailchimp-success"></div><!-- mailchimp-success end -->
					<div class="mailchimp-error"></div><!-- mailchimp-error end -->
				</div><!-- mailchimp-alerts end -->
			</div>
			<div class="newsletter-socialicons socialicons socialicons-radial">
				<ul>
					<li><a aria-label="Recycle Pro Facebook" href="https://www.facebook.com/Recycle-pro-102337717901297/" target="_blank"><i class="ion ion-logo-facebook"></i></a></li>
					<li><a aria-label="Recylce Pro Instagram" href="https://www.instagram.com/recycleprouk/" target="_blank"><i class="ion ion-logo-instagram"></i></a></li>
					
				</ul>
			</div>
		</div>
	</div>
</div>
<?php 
}

	function getCenters(){
	?>
	<div class="section-full content-inner bg-white">
		<div class="container">
			<?php 
				$x=1;
				$sql = "select * from ".WR_CENTERS." where status='Show' order by sorting asc";
				$record = $this->db->fetch_query($sql,$this->db->pdo_open());
				foreach ($record as $arr)
				{
					if($x==1){
					echo '<div class="row m-b50">';
					}
				?>
				<div class="col-md-4">
					<div class="locationdiv">
						<h4 class="centerhead"><span><?php echo $arr['center_name']; ?></span></h4>
						<h6 class="m-b0">Address</h6>
						<?php echo $arr['address']; ?>
						<div class="dottedbottom"><a href="#"><strong><i class="fa fa-map-marker text-blue"></i>&nbsp; Get directions</strong></a></div>
						<div class="dottedbottom"><a href="#"><strong><i class="fa fa-map text-blue"></i> View on map</strong></a></div>
						<div class="showservice">
						<h6 class="service-head">Services Offered</h6>
						<?php echo $arr['services']; ?>
						</div>
					</div>
				</div>
			<?php 
					if($x==3){
					echo '</div>';
					$x=0;
					}
					$x++;
				} ?>
		</div>
	</div>	
	<?php 
	}
}// End of Class ///////////

?>