<?php 

require_once("wrbasic/config.inc.php");

require_once('apps/wrback/class/config.back.php');

require_once('apps/wrback/layout/layout.class.php');

$layout_obj = new LayoutClass();

$frntbs_obj = new FrontBase();



$frntbs_obj->auth->Checklogin();

extract($_REQUEST);

?>

<!DOCTYPE html>

<html lang="en">

<head>

      <?php $layout_obj->pageTitle('Dashboard | Wr-Admin'); ?>

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600">

      <!-- Bootstrap -->

      <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- Font Awesome -->

      <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

      <!-- NProgress -->

      <link href="assets/vendors/nprogress/nprogress.css" rel="stylesheet">

      <!-- iCheck -->

      <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

      <!-- bootstrap-progressbar -->

      <link href="assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">

      <!-- JQVMap -->

      <link href="assets/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

      <!-- bootstrap-daterangepicker -->

      <link href="assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

      <!-- jQuery custom content scroller -->

      <link href="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css" rel="stylesheet"/>

      <!-- Custom Theme Style -->

      <link href="assets/css/custom.min.css" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

   </head>

   <body class="nav-md dark-left-side">

      <?php //$layout_obj->PreLoader(); ?>

      <div class="container body">

         <div class="main_container">

            <!--  Left sidebar -->

            <?php $layout_obj->LeftNav('dashboard'); ?>

            <!--  Left sidebar -->

            <!-- top navigation -->

            <?php $layout_obj->topNav(); ?>

            <!-- /top navigation -->

            <!-- page content -->

            <div class="right_col" role="main">

               <!-- top tiles -->

               <div class="page-body">

			   <h2>Welcome to Dashboard</h2>

                  <?php /*?><div class="row">

                     <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">

                        <div class="x_panel bg-c-blue order-card">

                           <div class="card">

                              <div class="card-block">

                                 <h6 class="m-b-20">Orders Received</h6>

                                 <h2 class="text-right"><i class="fa fa-caret-square-o-right"></i><span>486</span></h2>

                                 <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>

                              </div>

                           </div>

                        </div>

                     </div>

                     <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">

                        <div class="x_panel bg-c-green order-card">

                           <div class="card">

                              <div class="card-block">

                                 <h6 class="m-b-20">Total Sales</h6>

                                 <h2 class="text-right"><i class="fa fa-comments-o"></i><span>1641</span></h2>

                                 <p class="m-b-0">This Month<span class="f-right">213</span></p>

                              </div>

                           </div>

                        </div>

                     </div>

                     <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">

                        <div class="x_panel bg-c-yellow order-card">

                           <div class="card">

                              <div class="card-block">

                                 <h6 class="m-b-20">Revenue</h6>

                                 <h2 class="text-right"><i class="fa fa-sort-amount-desc"></i><span>$42,562</span></h2>

                                 <p class="m-b-0">This Month<span class="f-right">$5,032</span></p>

                              </div>

                           </div>

                        </div>

                     </div>

                     <div class="col-md-6 col-lg-3 col-sm-6 col-xs-12">

                        <div class="x_panel bg-c-pink order-card">

                           <div class="card">

                              <div class="card-block">

                                 <h6 class="m-b-20">Total Profit</h6>

                                 <h2 class="text-right"><i class="fa fa-check-square-o"></i><span>$9,562</span></h2>

                                 <p class="m-b-0">This Month<span class="f-right">$542</span></p>

                              </div>

                           </div>

                        </div>

                     </div>

                  </div><?php */?>

               </div>

               <!-- /top tiles -->

               

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

      <!-- Chart.js -->

      <script src="assets/vendors/Chart.js/dist/Chart.min.js"></script>

      <!-- gauge.js -->

      <script src="assets/vendors/gauge.js/dist/gauge.min.js"></script>

      <!-- bootstrap-progressbar -->

      <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

      <!-- iCheck -->

      <script src="assets/vendors/iCheck/icheck.min.js"></script>

      <!-- Skycons -->

      <script src="assets/vendors/skycons/skycons.js"></script>

      <!-- Flot -->

      <script src="assets/vendors/Flot/jquery.flot.js"></script>

      <script src="assets/vendors/Flot/jquery.flot.pie.js"></script>

      <script src="assets/vendors/Flot/jquery.flot.time.js"></script>

      <script src="assets/vendors/Flot/jquery.flot.stack.js"></script>

      <script src="assets/vendors/Flot/jquery.flot.resize.js"></script>

      <!-- Flot plugins -->

      <script src="assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>

      <script src="assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>

      <script src="assets/vendors/flot.curvedlines/curvedLines.js"></script>

      <!-- DateJS -->

      <script src="assets/vendors/DateJS/build/date.js"></script>

      <!-- JQVMap -->

      <script src="assets/vendors/jqvmap/dist/jquery.vmap.js"></script>

      <script src="assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>

      <script src="assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>

      <!-- bootstrap-daterangepicker -->

      <script src="assets/vendors/moment/min/moment.min.js"></script>

      <script src="assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

      <!-- jQuery custom content scroller -->

      <script src="assets/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

      <!-- Pace js -->

    <script type="text/javascript" src="assets/js/pace.min.js"></script>

      <!-- Custom Theme Scripts -->

      <script src="assets/js/custom.min.js"></script>

   </body>

</html>