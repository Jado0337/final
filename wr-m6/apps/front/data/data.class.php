<?php 
// Page Class contains all functions to manage admin page content. 
class DataClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function pageHead(){
?>
		<header class="header">
			<!-- Header Top Area -->
			<div class="header-top bg-white">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7 col-md-7 col-sm-7 col-12">
							<p class="header-welcomemsg">Welcome to <span>M6Repairs Online</span> Shopping Store !</p>
						</div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-12">
							<div class="header-langcurr">
								<div class="select-currency">
									<a class="select-currency-current" href="#">Login</a>
								</div>
								<div class="select-language">
									<a class="select-language-current" href="#">Register</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Header Top Area -->
			<!-- Header Middle Area -->
			<div class="header-middle bg-theme">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
							<a href="index.html" class="header-logo">
								<img src="img/m6-logo-1.png" alt="logo">
							</a>
						</div>
						<div class="col-lg-6 col-12 order-3 order-lg-2">
							<form action="#" class="header-searchbox">
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
							</form>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
							<div class="header-icons">
								<div class="header-account">
									<button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> My Account <i class="ion ion-ios-arrow-down"></i></button>
									<ul class="header-accountbox dropdown-list">
										<li>
											<a href="#">My account</a>
										</li>
										<li>
											<a href="#">My Products</a>
										</li>
										<li>
											<a href="#">Checkout</a>
										</li>
										<li>
											<a href="#">Sign in</a>
										</li>
									</ul>
								</div>
								<div class="header-cart">
									<a class="header-carticon" href="#"><i class="lnr lnr-cart"></i><span class="count">2</span></a>
									<!-- Minicart -->
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
									<!--// Minicart -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Header Middle Area -->
			<!-- Header Bottom Area -->
			<div class="header-bottom bg-theme">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-10 d-none d-lg-block">
							<!-- Navigation -->
							<nav class="ho-navigation">
								<ul>
									<li class="active">
										<a href="index.html">Home</a>
									</li>
									<li class="dropdown-holder">
										<a href="sell-mobiles.html">Our Services</a>
										<ul class="hodropdown">
											<li><a href="#">Mac PC & Laptop Repair</a></li>
											<li><a href="#">Mobile/Tablet Screen Repair</a></li>
											<li><a href="#">Tablet/ IPadRepair</a></li>
											<li><a href="#">Game Consoles Repair</a></li>
											<li><a href="#">Phone Network Unlocking</a></li>
											<li><a href="#">Water Damage Repair</a></li>
										</ul>
									</li>
									<li class="dropdown-holder">
										<a href="sell-mobiles.html">Sell Your Device</a>
										<ul class="hodropdown">
											<li><a href="#">Samsung</a></li>
											<li><a href="#">IPhone</a></li>
											<li><a href="#">One Plus</a></li>
											<li><a href="#">Sony</a></li>
											<li><a href="#">LG</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Blogs</a>
									</li>
									<li>
										<a href="#">About Us</a>
									</li>
									<li>
										<a href="#"> Contact</a>
									</li>
								</ul>
							</nav>
							<!--// Navigation -->
						</div>
						<div class="col-lg-2">
							<div class="header-contactinfo">
								<i class="flaticon-support"></i>
								<span>Call Us Now:</span>
								<b>+0123456789</b>
							</div>
						</div>
						<div class="col-12 d-block d-lg-none">
							<div class="mobile-menu clearfix"></div>
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
			<div class="footer-toparea">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-12">
							<div class="footer-widget widget-info">
								<h5 class="footer-widget-title">Contact Info</h5>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dignissim ligula at lectus dignissim sagittis.</p>
								<ul>
									<li><i class="ion ion-ios-pin"></i> 170, Slade Road, Birmingham, B23 7PX. UK</li>
									<li><i class="ion ion-ios-call"></i> Call us: +44 (121) 382-2532</li>
									<li><i class="ion ion-ios-mail"></i> Email us: <a href="mailto:info@m6repairs.co.uk">info@m6repairs.co.uk</a></li>
									<li><i class="ion ion-ios-glode"></i> www.m6repairs.co.uk</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-4">
							<div class="footer-widget widget-links">
								<h5 class="footer-widget-title">Our Services</h5>
								<ul>
									<li><a href="#">Mac PC & Laptop Repair</a></li>
									<li><a href="#">Mobile/Tablet Screen Repair</a></li>
									<li><a href="#">Tablet/ IPadRepair</a></li>
									<li><a href="#">Game Consoles Repair</a></li>
									<li><a href="#">Phone Network Unlocking</a></li>
									<li><a href="#">Water Damage Repair</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-4">
							<div class="footer-widget widget-links">
								<h5 class="footer-widget-title">Our Company</h5>
								<ul>
									<li><a href="#">Delivery</a></li>
									<li><a href="#">Legal Notice</a></li>
									<li><a href="#">About us</a></li>
									<li><a href="#">Secure payment</a></li>
									<li><a href="#">Sitemap</a></li>
									<li><a href="#">Stores</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2 col-md-4">
							<div class="footer-widget widget-links">
								<h5 class="footer-widget-title">Your Account</h5>
								<ul>
									<li><a href="#">Personal info</a></li>
									<li><a href="#">Orders</a></li>
									<li><a href="#">Addresses</a></li>
									<li><a href="#">My wishlists</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-12">
							<div class="footer-widget widget-customerservice">
								<div class="info">
									<h5 class="footer-widget-title">CUSTOMER SERVICE</h5>
									<h5>SEND AN EMAIL</h5>
									<h5>HOTLINE: : <a href="#">+44 (121) 382-2532</a></h5>
									<h6>8:00AM–5.30PM AEST MON–FRI</h6>
								</div>
								<div class="payment">
									<h6>SECURE PAYMENT VIA</h6>
									<img src="images/icons/payment.png" alt="footer payment">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--// Footer Top Area -->
			<!-- Footer Bottom -->
			<div class="footer-bottomarea">
				<div class="container">
					<div class="footer-copyright">
						<p class="copyright">Copyright &copy; <a href="#">M6Repairs</a> . All Rights Reserved</p>
					</div>
				</div>
			</div>
			<!--// Footer Bottom -->
		</footer>
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
} // end of DataClass
?>	