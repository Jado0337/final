<?php include('Db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Home | E-Shopper</title>

	<link href="<?php echo base_url()?>assets/front/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/prettyPhoto.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/price-range.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/animate.css" rel="stylesheet">
	<!-- <link href="<?php echo base_url()?>assets/front/css/sliderprice.css" rel="stylesheet"> -->
	<link href="<?php echo base_url()?>assets/front/css/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/responsive.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/front/css/main.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="<?php echo base_url()?>assets/front/js/html5shiv.js"></script>
    <script src="<?php echo base_url()?>assets/front/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/front/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/front/images/ico/apple-touch-icon-57-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style1.css" type="text/css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
    	section.home-newsletter {
    padding: 56px 0px;
    background: #38a9dc;
   
}
.single {
    max-width: 650px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 2;
}
.home-newsletter .single h2 {
    font-size: 22px;
    color: white;
    text-transform: uppercase;
    margin-bottom: 40px;
    margin-top: 0;
}

.home-newsletter .single .form-control {
    height: 50px;
    border-color: #333;
    outline: none;
}
.home-newsletter .single .btn {
    min-height: 50px;
    background: #333;
    color: #fff;
    padding-left: 15px;
    padding-right: 15px;
}
    	body{
    		overflow-x: hidden;
    	}
    	.search_box input {
    background: #f5f5f5!important;
    border: 0px solid;
    color: #B2B2B2!important;
    font-family: 'roboto';
    font-size: 15px;
    font-weight: 300;
    height: 32px;
    outline: medium none;
    padding-left: 10px;
    width: 100%!important;
    background-image: none!important;
    background-repeat: no-repeat;
    background-position: 92%;
}
.srcmbl{
	margin-top:3px;

}
.shop-menu ul li a {
	background:none!important;
	color:white!important;
	font-weight:600!important;
}
.shopimage{
	width:30px!important;
	height:30px!important;

	}
	ul.nav.nav-pills {
    margin-top: 1%;
}
.category-products .panel-default .panel-heading {
    background-color: #ece9e9;
    /* border: #9E9E9E; */
    color: #FFFFFF;
    padding: 10px 20px;
}

.item
{
	padding-left:0px!important;
}

.bage {
  position: absolute;
  left: 20px;
  bottom: 10px;
  font-weight: 700;
  font-family: sans-serif;
  font-size: 13px;
  color: #fff;
  background-color: #8BC34A;
  border: 2px solid #fff;
  padding: 0px;
  width: 26px;
  height: 26px;
  text-align: center;
  border-radius:50px;
}
p{
	margin:0px 0px 5px!important;
}
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border: 1px solid #4CAF50;
}
#mobile{
	display:none;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
.nav-logo .nav-logo-right ul li i {
    float: left;
    /* display: inline-block; */
    /* text-align: center; */
    color: #2cbdb8;
    /* font-size: 20px; */
    margin-right: 14px;
    /* position: absolute; */
    left: 0;
    top: 0;
    z-index: 0;
    width: 60px;
    height: 60px;
    border: 2px dashed #2cbdb8;
    font-size: 25px;
    line-height: 56px;
    text-align: center;
    border-radius: 50%;
}
@media (max-width: 690px)
{
	#desktops{
	display:none;
}
#mobile{
	display:block;
}
.srcmbl{
	margin-top:-6%!important;

}
.shop-menu ul li {
    display: inline-block;
    padding-left: 5px!important;
    padding-right: 5px!important;
}
ul.sub-menu {
    position: initial!important;
    top: 30px;
    left: 0;
    background: #0d456194;
    list-style: none;
    padding: 0;
    margin: 0;
    width: 220px;
    -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
    box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
    display: none;
    z-index: 999;
}
.mainmenu ul li:first-child {
    padding-left: 15px!important;
}
.hdgmbl{
	font-size:23px!important;

}
.logmbl
{
	padding:4%;
}
.or
{
	margin-top:13px!important;
}

}
    </style>

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div style="background-color:#0d4561;" class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a style="color:white!important;font-weight:600!important;" href="#"><img src="<?php echo base_url()?>assets/front/images/home/phone.png" alt="" width="30px" height="30px" /> +2 95 01 88 821</a></li>
								<li><a style="color:white!important;font-weight:600!important;" href="#"><img src="<?php echo base_url()?>assets/front/images/home/Email.png" alt="" width="30px" height="30px" /> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								
								
								<?php $customer_id = $this->session->userdata('cus_id');?>
								<?php $shipping_id = $this->session->userdata('shipping_id');?>

									<?php if($this->cart->total_items()!=Null && $customer_id!=NULL && $shipping_id!=NULL){
										?>
								<li>
									<a href="<?php echo base_url()?>payment"><img class="shopimage" src="<?php echo base_url()?>assets/front/images/home/card.png" alt="" width="50px" height="50px"/> Checkout</a>

								</li>
									<?php }elseif($this->cart->total_items()!=Null && $customer_id!=NULL){?>

								<li>
									<a href="<?php echo base_url()?>billing"><img class="shopimage"  src="<?php echo base_url()?>assets/front/images/home/card.png" alt="" width="50px" height="50px"/> Checkout</a>

								</li>

									<?php }else{?>
								<li>
									<a href="<?php echo base_url()?>checkout"><img class="shopimage"  src="<?php echo base_url()?>assets/front/images/home/card.png" alt="" width="50px" height="50px"/> Checkout</a>

								</li>
									<?php } ?>
								<li>
									<?php if($this->cart->total_items()!=Null && $customer_id!=NULL && $shipping_id!=NULL){?>
									<a href="<?php echo base_url()?>payment"><img class="shopimage"  src="<?php echo base_url()?>assets/front/images/home/payments.png" alt="" width="50px" height="50px"/></i>Payment</a>
									<?php } ?>
								</li>
								<li>	
									<a href="<?php echo base_url()?>show-cart"><img class="shopimage"  src="<?php echo base_url()?>assets/front/images/home/cart.png" alt="" width="50px" height="50px"/><span class="bage">
									<?php $cart_items = count($this->cart->contents());
										if($cart_items>0){
									?> 
									 <?php echo $cart_items;?>
									 <?php }else{?>
									  0
									 <?php } ?></span>
									</a>

								</li>
								<?php 
									
								if($customer_id){?>
								<li>
									<a href="<?php echo base_url()?>logout"><img class="shopimage"  src="<?php echo base_url()?>assets/front/images/home/login.png" alt="" width="50px" height="50px"/> Logout</a>
								</li>
								<?php }else{ ?>
								<li>
									<a href="<?php echo base_url()?>checkout"><img class="shopimage"  src="<?php echo base_url()?>assets/front/images/home/login.png" alt="" width="50px" height="50px"/> Login</a>
								</li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
	<?php
$sql = "UPDATE count SET counters = counters+1 WHERE id = 1";
mysqli_query($con,$sql);
$sqli="SELECT counters FROM count WHERE id = 1";
$counter=mysqli_query($con,$sqli);
while($count=mysqli_fetch_array($counter))
{
	$visit=$count['counters'];
}

?>	
		<div id="desktops"  class="header-middle"><!--header-middle-->
			<div  class="nav-logo">
            <div class="container">
                <div style="padding-top:0px!important;padding-bottom:0px!important;" class="row">
                    <div  class="col-lg-2">
                        <div style="padding-top:15px!important;" class="logo">
                            <a href="<?php echo base_url();?>"><img src="<?php echo base_url()?>assets/front/images/home/logo.png" alt="" width="90px" height="85px"/></a>
                        </div>
                    </div>
                    <div style="margin-top:1%;"  class="col-lg-9">
                        <div style="text-align:left!important;padding-top:0px!important" class="nav-logo-right">
                            <ul>
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <div class="info-text">
                                        <span>Phone:</span>
                                        <p>(+12) 345 6789</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-home"></i>
                                    <div class="info-text">
                                        <span>Address:</span>
                                        <p>16 Creek Ave, <span>NY</span></p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <div class="info-text">
                                        <span>Email:</span>
                                        <p>Info.cololib@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
			</div><!--/header-middle-->

		<div style="background-color:#38a9dc;padding-top:11px;padding-bottom:9px;" class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					
					<div style="margin-top:1%;" class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div id="desktops">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<?php $all_category = $this->CategoryModel->get_all_category();?>
								<?php $all_sub_category = $this->CategoryModel->get_all_sub_category();?>
								<?php foreach ($all_category as  $maincat) {?>
								<li  class="dropdown" ><a   style="color:white!important;font-weight:600;"  href="<?php echo base_url()?>show_post_by_cat_id/<?php echo $maincat->category_id; ?>"><?php echo $maincat->category_name; ?><i class="fa fa-angle-down"></i></a>
							<ul role="menu" class="sub-menu">
							<?php foreach ($all_sub_category as $plusicon){?>
								
								<?php if($plusicon->category_sub_id == $maincat->category_id){?>
								
										<li><a href="<?php echo base_url()?>show-post-by-sub-cat-id/<?php echo $plusicon->sub_cat_id?>"><?php echo $plusicon->sub_category_name; ?></a></li>
									
											
											<?php } 
											?>
											
											<?php } 
											?>
											</ul>
			 <?php } ?>
								
								</li>
								
							</ul>
						</div>
					</div>
					<div id="mobile">
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<?php $all_category = $this->CategoryModel->get_all_category();?>
								<?php $all_sub_category = $this->CategoryModel->get_all_sub_category();?>
								<?php foreach ($all_category as  $maincat) {?>
								<li  class="dropdown" ><a  data-toggle="collapse" data-parent="#accordian" style="color:white!important;font-weight:600;"  href="<?php echo base_url()?>show_post_by_cat_id/<?php echo $maincat->category_id; ?>"><?php echo $maincat->category_name; ?><span class="badge pull-right"><i class="fa fa-plus"></i></span></a>
							<ul role="menu" class="sub-menu">
							<?php foreach ($all_sub_category as $plusicon){?>
								
								<?php if($plusicon->category_sub_id == $maincat->category_id){?>
								
										<li><a href="<?php echo base_url()?>show-post-by-sub-cat-id/<?php echo $plusicon->sub_cat_id?>"><?php echo $plusicon->sub_category_name; ?></a></li>
									
											
											<?php } 
											?>
											
											<?php } 
											?>
											</ul>
			 <?php } ?>
								
								</li>
								
							</ul>
						</div>
					</div>
					</div>
					<div class="col-sm-3">
					<div   class="search_box srcmbl ">
							<form action="<?php echo base_url()?>search" method="post">
							<input type="text" name="search" placeholder="search" />							
							</form>						
							
						</div> 
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

<?php if(isset($main_content) && $main_content!=NULL){
	echo $main_content; // Load a single page under header and footer
}else{?>
	<section id="slider"><!--slider-->
		
			<div class="row">
				<div style="padding-right:0px!important;padding-left:0px!important;" class="col-sm-12">
					<?php if(isset($slider)){
						echo $slider;
					}?>
				</div>
			</div>
			
		
	</section>
	<section id="banner"><!--slider-->
		
			
					<?php if(isset($banner)){
						echo $banner;
					}
					?>
				
		
	</section>
	
	
	
	<section>
		<div class="container">
			<?php if($category_brand=="")
			{
				?>
<div class="row">
					
				
				<div class="col-sm-12">
					<?php if(isset($feature)){
						echo $feature;
					}?>
					
					<!-- This is Category Post option -->
					
					<?php if(isset($recommended)){
						echo $recommended;
					}?>
					
				</div>
			</div>
		
		<?php }
		else
		{
			?>
			<div class="row">
					<?php if(isset($category_brand)){
						echo $category_brand;
					}?>
				
				<div class="col-sm-9 padding-right">
					<?php if(isset($feature)){
						echo $feature;
					}?>
					
					<!-- This is Category Post option -->
					
					<?php if(isset($recommended)){
						echo $recommended;
					}?>
					
				</div>
			</div>
			<?php
		}
		?>
		</div>
	</section>
<?php } ?>
<section class="home-newsletter">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="single">
									<form action="" method="post">
					<input type="hidden" name="_csrf" value="f4265e900aeecd8cc75c8d810d0a8575">		
								<h2>Subscribe To Our Newsletter</h2>
					<div class="input-group">
			        	<input type="email" class="form-control" placeholder="Enter Your Email Address" name="email_subscribe">
			         	<span class="input-group-btn">
			         	<button class="btn btn-theme" type="submit" name="form_subscribe">Subscribe</button>
			         	</span>
			        </div>
				</form>
			</div>
				
			</div>
		</div>
	</div>
</section>
	<footer style="background-color:#0d4561!important;" id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<img style="margin-top:-13%!important;" src="<?php echo base_url()?>assets/front/images/home/logo.png" alt="" />
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url()?>assets/front/images/home/bannerone.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url()?>assets/front/images/home/bannertwo.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url()?>assets/front/images/home/bannerthree.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
						
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="<?php echo base_url()?>assets/front/images/home/bannerfour.jpg" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2014</h2>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
							<img src="<?php echo base_url()?>assets/front/images/home/map.png" alt="" />
							<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:white!important;">Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a style="color:white!important;" href="#">Online Help</a></li>
								<li><a style="color:white!important;" href="#">Contact Us</a></li>
								<li><a style="color:white!important;" href="#">Order Status</a></li>
								<li><a style="color:white!important;" href="#">Change Location</a></li>
								<li><a style="color:white!important;" href="#">FAQ’s</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:white!important;">Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a style="color:white!important;" href="#">T-Shirt</a></li>
								<li><a style="color:white!important;" href="#">Mens</a></li>
								<li><a style="color:white!important;" href="#">Womens</a></li>
								<li><a style="color:white!important;" href="#">Gift Cards</a></li>
								<li><a  style="color:white!important;" href="#">Shoes</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:white!important;">Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a style="color:white!important;" href="#">Terms of Use</a></li>
								<li><a style="color:white!important;" href="#">Privecy Policy</a></li>
								<li><a style="color:white!important;" href="#">Refund Policy</a></li>
								<li><a style="color:white!important;" href="#">Billing System</a></li>
								<li><a style="color:white!important;" href="#">Ticket System</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2 style="color:white!important;">About Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a style="color:white!important;" href="#">Company Information</a></li>
								<li><a style="color:white!important;" href="#">Careers</a></li>
								<li><a style="color:white!important;" href="#">Store Location</a></li>
								<li><a style="color:white!important;" href="#">Affillate Program</a></li>
								<li><a style="color:white!important;" href="#">Copyright</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2 style="color:white!important;">About Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p style="color:white!important;">Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div style="background-color:#0d4561;" class="footer-bottom">
			<div class="container">
				<div class="row">
					<p style="color:white!important;" class="pull-left">Copyright © 2017 E-SHOPPER Inc. All rights reserved.</p>
					<p style="color:white!important;" class="pull-right">Develop by <span><a target="_blank" href="http://www.sumon-it.com">Sumon Sarker</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	<script src="<?php echo base_url()?>assets/front/js/jquery.js"></script>
	<script src="<?php echo base_url()?>assets/front/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/front/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url()?>assets/front/js/price-range.js"></script>
	<script src="<?php echo base_url()?>assets/front/js/jquery.prettyPhoto.js"></script>
	<script src="<?php echo base_url()?>assets/front/js/jquery-ui.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="<?php echo base_url()?>assets/front/js/gmaps.js"></script>
	<script src="<?php echo base_url()?>assets/front/js/contact.js"></script>

	<script src="<?php echo base_url()?>assets/front/js/main.js"></script>
	
	<!-- Price Range Script Start-->
	<script type="text/javascript">  
 $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1500,
      values: [ 500,1000 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#amount1" ).val(ui.values[ 0 ]);
		$( "#amount2" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>

	<!-- Price Range Code end -->
</body>
</html>