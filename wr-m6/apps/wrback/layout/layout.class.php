<?php 
// Layout Class contains all functions of page Layouts. 
class LayoutClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function pageTitle($title,$val=''){
	?>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- Meta, title, CSS, favicons, etc. -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
	<?php 
}
function PreLoader(){
	?>
	  <div class="site-preloader">
         <div class="loader-demo-box">
            <div class="flip-square-loader mx-auto"></div>
         </div>
      </div>
	<?php 
}
function LeftNav($page,$subpage=''){
	?>
			<div class="col-md-3 left_col menu_fixed">
               <div class="left_col scroll-view">
                  <div class="clearfix"></div>
                  <div class="profile clearfix">
                     <div class="profile_pic">
                        <img src="assets/images/img.jpg" alt="..." class="img-circle profile_img">
                     </div>
                     <div class="profile_info">
                        <span>Welcome,</span>
                        <h2><?php echo $_SESSION['adminname']; ?></h2>
                     </div>
                  </div>
                  <!-- sidebar menu -->
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                     <div class="menu_section">
                        <h3>General</h3>
                        <?php
                        if($_SESSION['admin_type']=='admin')
                        {
                        ?>
                        <ul class="nav side-menu">
                           <li>
                              <a href="home.php"><i class="fa fa-home"></i> Dashboard</a>
                           </li>
                           <li>
                              <a href="searchengine.php"><i class="fa fa-home"></i>Search Orders</a>
                           </li>
                           <li>
                              <a href="pending_payment.php"><i class="fa fa-home"></i>Pending Orders</a>
                           </li>
						   <li><a href="manageorders.php"><i class="fa fa-user"></i> Manage Orders</a></li>
						   <li><a href="mngorder.php"><i class="fa fa-user"></i> Compare And Recycle Orders</a></li>
						   <li><a href="mngselorder.php"><i class="fa fa-user"></i> Sell My Phones Orders</a></li>
						   <li><a href="manageusers.php"><i class="fa fa-user"></i> Manage User</a></li>
						   <li>
                              <a><i class="fa fa-shopping-cart"></i> Products <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="manageproduct.php">All Products</a></li>
								 <li><a href="managebrand.php">Manage Brands</a></li>
                                 <li><a href="manageproductcategories.php">Product Categories</a></li>
								 <li><a href="managemodel.php">Manage Variant</a></li>
                              </ul>
                           </li>
						   <li><a href="home-featured-items.php"><i class="fa fa-bullhorn"></i> Home Featured Items</a></li>
						   <li><a href="homebanners.php"><i class="fa fa-image"></i> Manage Home Banners</a></li>
						   <li><a href="manageblog.php"><i class="fa fa-file"></i> Manage Blog</a></li>
						   <li><a href="managepages.php?index=sub&pid=10"><i class="fa fa-image"></i> Home 4 Info Box</a></li> 
						   <li><a href="customorder.php"><i class="fa fa-image"></i>Custom Order</a></li> 
                           <li>
                              <a><i class="fa fa-shopping-cart"></i> Pages <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="managepages.php">All Pages</a></li>
                                 <li><a href="managecategories.php">All Categories</a></li>
                              </ul>
                           </li>
						   <li>
                              <a><i class="fa fa-shopping-cart"></i> Networks <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="mobilenetworks.php">All Networks</a></li>
                                 <?php /*?><li><a href="network.php">Network Category</a></li><?php */?>
                              </ul>
                           </li>
                        </ul>
                        <?php
                        }
                        if($_SESSION['admin_type']=='supervisor')
                        {
                        ?>
                        <ul class="nav side-menu">
                           <li>
                              <a href="home.php"><i class="fa fa-home"></i> Dashboard</a>
                           </li>
						   <li><a href="manageorders.php"><i class="fa fa-user"></i> Manage Orders</a></li>
						    <li><a href="mngorder.php"><i class="fa fa-user"></i> Compare And Recycle Orders</a></li>
						    <li><a href="mngselorder.php"><i class="fa fa-user"></i> Sell My Phones Orders</a></li>
						   <li>
                              <a href="wr-m6/label.php"><i class="fa fa-globe"></i>Shipping Label</a>
                           </li>
                            <li>
                              <a href="wr-m6/show_label.php"><i class="fa fa-globe"></i>View Label </a>
                           </li>
						   
                        </ul>
                        <?php
                        }
                        ?>
                     </div>
                     <div class="menu_section">
                       
                        <?php
                        
                        if($_SESSION['admin_type']=='admin')
                        {
                        ?> 
                        <h3>Settings</h3>
                        <ul class="nav side-menu">
						   <li>
                              <a href="basic.php"><i class="fa fa-globe"></i> Website Basics</a>
                           </li>
 							<?php /*?><li>
                              <a><i class="fa fa-user"></i> Manage Users <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="manageusers.php">All Users</a></li>
                                 <li><a href="manageusers.php?index=add">Add New Users</a></li>
                              </ul>
                           </li><?php */?>
						   <li><a href="manageslider.php"><i class="fa fa-clone"></i> Manage Slider</a></li>
						   <li>
                              <a><i class="fa fa-clone"></i> Manage Page <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="managepage.php"><i class="fa fa-clone"></i> Add Page</a></li>
                         <li><a href="show_page.php"><i class="fa fa-clone"></i> Show Pages</a></li>
                                </ul>
                           </li>
                           <li>
                              <a><i class="fa fa-user"></i> Manage Admins <span class="fa fa-chevron-down"></span></a>
                              <ul class="nav child_menu">
                                 <li><a href="manageadmin.php">All Admins</a></li>
                                 <li><a href="manageadmin.php?index=add">Add New Admin</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="wr-m6/label.php"><i class="fa fa-globe"></i>Shipping Label</a>
                           </li>
                            <li>
                              <a href="wr-m6/show_label.php"><i class="fa fa-globe"></i>View Label </a>
                           </li>
                           <li><a href="#"><i class="fa fa-laptop"></i> Go to Website</a></li>
                           <li><a href="followup.php"><i class="fa fa-envelope"></i> Follow-up Emails </a></li>
                           <li><a href="comfollowup.php"><i class="fa fa-envelope"></i>Compare Follow-up Emails </a></li>
                            <li><a href="showhsry.php"><i class="fa fa-file"></i> Revise History </a></li>
                            <li><a href="shownote.php"><i class="fa fa-file"></i> Note History </a></li>
                        </ul>

                    
                  <?php
                        }
                        ?>
                  <!-- /sidebar menu -->
               </div>
            </div>
            </div>
            </div>
	<?php 
}
function topNav(){
	?>
			<div class="top_nav">
               <div class="nav_menu">
                  <nav>
                     <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                     </div>
                     <div class="logo-header">
                        <a href="#">
                        WR Admin
                        </a>
                     </div>
                     <ul class="nav navbar-nav navbar-right">
                        <li class="">
                           <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                           <img src="assets/images/img.jpg" alt=""><?php echo $_SESSION['adminname'];?>
                           <span class=" fa fa-angle-down"></span>
                           </a>
                           <ul class="dropdown-menu dropdown-usermenu pull-right">
                              <li><a href="javascript:;"> Profile</a></li>
                              <li>
                                 <a href="javascript:;">
                                 <span>Settings</span>
                                 </a>
                              </li>
                              <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                           </ul>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
	<?php 
}
function PageHeadings($pgtitle){
	?>
		<div class="page-title">
			<div class="title_left">
				<h3><?php echo $pgtitle; ?></h3>
				<ol class="breadcrumb page-head-nav">
				   <li><a href="home.php">Dashboard</a></li>
				   <li class="active"><?php echo $pgtitle; ?></li>
				</ol>
			</div>
		</div>	
	<?php 
}
} // EOF Layout Class
?>