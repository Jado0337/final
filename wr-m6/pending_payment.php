<?php 
include('Db.php');
require_once("wrbasic/config.inc.php");
require_once('apps/wrback/class/config.back.php');
require_once('apps/wrback/layout/layout.class.php');
require_once('apps/wrback/slider/slider.class.php');
$layout_obj = new LayoutClass();
$frntbs_obj = new FrontBase();
$slider_obj = new SliderClass();

$frntbs_obj->auth->Checklogin();
extract($_REQUEST);

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <?php $layout_obj->pageTitle('Manage Slider | Wr-Admin'); ?>
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
            <?php $layout_obj->LeftNav('slider'); ?>
            <!--  Left sidebar -->
            <!-- top navigation -->
            <?php $layout_obj->topNav(); ?>
             <div class="right_col" role="main">
               <div class="">
          <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
              <h2>All Pages</h2>
              <div class="pull-right"><a class="btn btn-info" href="managepage.php">Add New</a></div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                  <p>Manage all <code>Pages</code> which you will provide.</p>
                                          
                              <div class="table-responsive">
                                  <?php
                                if ($_GET['success'] == true) {
    echo $_GET['message'];
 }  
 else if ($_GET['success'] == false) {
    echo $_GET['message'];
 }  
                        
                        ?>
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th class="column-title">Order ID</th>
                                           <th class="column-title">Name</th>
                                          <th class="column-title">Date</th>
                                          <th class="column-title">Status</th>
                                          <th class="column-title">Action</th>
                                         
                                       </tr>
                                    </thead>
                                    <tbody>
                           <?php 
                              $sql = "select * from view_order where order_status='Pending Payment' Order By time ASC limit 5";
                              $record =mysqli_query($con,$sql);
                              while($row=mysqli_fetch_array($record))
                              {
                                 
                           ?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $row['ord_id']; ?></td>
                                           <td class="a-center "><?php echo $row['name']; ?></td>
                                          <td class=" "><?php echo $row['time']; ?></td>
                                          <td class=" "><?php echo $row['order_status']; ?></td>
                                          <td class=" last"><a class="btn btn-primary btn-lg" onclick="paid('<?php echo $row['ord_id']; ?>')">Paid</a>  
                                          </td>
                                          
                                       </tr>
                                    <?php 
                              } ?>   
                           </tbody>
                                 </table>
                              </div>
              
            </div>
         </div>
      </div>
   </div>
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
      
      <script>
          function paid(id){
    
    var track = id;
    $.ajax({
        url:"paid.php",
        method: "POST",
        data: {track:track},
        success: function(data){
            console.log(data);
      
      $('#img').hide();
       alert('Email Has Been Sent'); }
    });
}
      </script><?php $slider_obj->DeleteJSCall(); ?>
   </body>

</html>

