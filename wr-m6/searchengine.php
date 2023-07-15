<?php 
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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
              <h2> Shipping Label</h2>
              <div class="pull-right"><a class="btn btn-info" href="managecategories.php">Back</a></div>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                  <p>Mannualy  <code>Add Label</code>.</p>
            <form class="form-horizontal form-label-left"  method="post" >
                                
                                 
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Search Orders<span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <select type="text" name="opnt" required="required"  class="form-control col-md-7 col-xs-12" >
                                           <option value="Tracking ID">Tracking ID</option>
                                           <option value="Order ID">Order ID</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="track" name="track" required="required"  class="form-control col-md-7 col-xs-12" >
                                        
                                    </div>
                                 </div>
                                 
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       
                                       <input type="button" id="sbtbtn" class="btn btn-primary btn-lg" value="Submit"/>
                                    </div>
                                 </div>
                              </form>
                              <div style="text-align:center;"><img src="updated/loader.gif" id="img" style="display:none;text-align:center;"></div>
                              <table class="table table-striped jambo_table bulk_action"  >
            <thead>
                                       <tr class="headings">
                                          <th class="column-title">Order ID</th>
										  <th class="column-title">User Detail</th>
										  	  <th class="column-title">Product Name</th>
										  	  <th class="column-title">Date</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                          <th class="column-title no-link last"><span class="nobr">Paid</span></th>
                                       </tr>
                                    </thead>
                                    <tbody id="responsecontainers">
                                        
                                    </tbody>
           </table>
                           </div>
         </div>
      </div>
   </div>
</div>
</div>
            <!-- /page content -->
         </div>
      </div>
      <script>
 $(document).ready(function(){
$('#sbtbtn').click(function(){
    $('#img').show();
    var track = $("#track").val(); 
    $.ajax({
        url:"searchorders.php",
        method: "POST",
        data: {track:track},
        success: function(data){
            console.log(data);
      $("#responsecontainers").html(data);
      $('#exampleModal').modal('show');
      $('#img').hide();
        }
    });
});
});
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



</script>
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
      
      <?php $slider_obj->DeleteJSCall(); ?>
   </body>

</html>

