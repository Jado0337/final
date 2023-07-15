<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once("wrbasic/config.inc.php");
require_once('apps/wrback/class/config.back.php');
require_once('apps/wrback/layout/layout.class.php');
require_once('apps/wrback/users/users.class.php');
$layout_obj = new LayoutClass();
$frntbs_obj = new FrontBase();
$users_obj = new UsersClass();
$frntbs_obj->auth->Checklogin();
extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
      <?php $layout_obj->pageTitle('Manage Users | Wr-Admin'); ?>
      <!-- Bootstrap -->
      <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- jQuery custom content scroller -->
      <link href="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>
      <!-- Custom Theme Style -->
      <link href="assets/css/custom.min.css" rel="stylesheet">
      <script src="ckeditor/ckeditor.js"></script>
      <link rel="stylesheet" href="ckeditor/toolbarconfigurator/lib/codemirror/neo.css">
   </head>
   <body class="nav-md dark-left-side">
      <?php //$layout_obj->PreLoader(); ?>
      <div class="container body">
         <div class="main_container">
            <!--  Left sidebar -->
            <?php $layout_obj->LeftNav('users'); ?>
            <!--  Left sidebar -->
            <!-- top navigation -->
            <?php $layout_obj->topNav(); ?>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
               <div class="">
                  <?php $layout_obj->PageHeadings('Manage Users'); ?>
                  <div class="clearfix"></div>
                  <?php 
						switch($index){
							case 'view':
									$users_obj->ViewData($id); 
								break; 
							case 'edit':
								if($sbtfrm=='sbtval')
									$users_obj->UpdateFormDb($id);
								else 
									$users_obj->EditData($id);
								break;
							case 'block':
									$users_obj->BlockUser($id,$status);
								break;
							case 'Delete':
									$users_obj->DeleteData($id);
								break;
							default:
									$users_obj->ShowAll();
								break;
						} 
				  ?>
               </div>
            </div>
            <!-- /page content -->
         </div>
      </div>
      <!-- jQuery -->
      <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap -->
      <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="assets/vendors/nprogress/nprogress.js"></script>
      <!-- jQuery custom content scroller -->
      <script src="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
      <!-- Pace js -->
      <script type="text/javascript" src="assets/js/pace.min.js"></script>
      <script src="assets/vendors/validator/validator.js"></script>
      <!-- Custom Theme Scripts -->
      <script src="assets/js/custom.min.js"></script>
      <?php //$users_obj->DeleteJSCall(); ?>
   </body>
</html>