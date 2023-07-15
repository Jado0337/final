<?php 
require_once("wrbasic/config.inc.php");
require_once('apps/wrback/class/config.back.php');
require_once('apps/wrback/layout/layout.class.php');
$layout_obj = new LayoutClass();
$frntbs_obj = new FrontBase();

extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
      <?php $layout_obj->pageTitle('Login | Wr-Admin'); ?>
      <!-- Bootstrap -->
      <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- Animate.css -->
      <link href="assets/vendors/animate.css/animate.min.css" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="assets/css/custom.min.css" rel="stylesheet">
   </head>
   <body class="login">
      <div>

         <div class="login_wrapper">
            <div class="animate form login_form">
               <section class="login_content">
                  <?php if($loginsbmt=='SubmitLogin') {
				  			$frntbs_obj->frontLoginSubmit($wrusername,$wrpassword);
						} else {
							$frntbs_obj->frontLogin(); 
						}
						?>
               </section>
            </div>
            
         </div>
      </div>
   </body>

</html>

