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
                   <?php
            $id=$_GET['id'];
            $sql="select * from url where id='$id' ";
            $record=mysqli_query($con,$sql);
            
            while($row=mysqli_fetch_array($record))
            {
               $name=$row['page_name'];
               $url=$row['url'];
               $title=$row['title'];
               $keywords=$row['keywords'];
               $description=$row['description'];
                              }
                           

            ?>
           <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
         <div class="x_panel">
            <div class="x_title">
              <h2>Update Pages</h2>
              <div class="pull-right"><a class="btn btn-info" href="managecategories.php">Back</a></div>
              <div class="clearfix"></div>
            </div>
           
            <div class="x_content">
                  <p>Mannualy  <code>Pages</code>.</p>
            <form class="form-horizontal form-label-left" action="update_page_detail.php" method="post" >
                                
                                 <span class="section">Page Info</span>
                                 <input type="hidden"  name="id"  class="form-control col-md-7 col-xs-12" value="<?php echo $id; ?>" >
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Page Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text"  name="name" value="<?php echo $name; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                 </div>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Page Url <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text"  name="url" value="<?php echo $url; ?>" required="required" class="form-control col-md-7 col-xs-12" >
                                    </div>
                                 </div>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text"  name="title" value="<?php echo $title; ?>" required="required" maxlength="5000" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  >
                                    </div>
                                 </div>
                    
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Meta Keywords <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text"  name="keywords" value="<?php echo $keywords; ?>" required="required" maxlength="5000" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  >
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Meta Description <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text"  name="description" value="<?php echo $description; ?>" required="required" maxlength="5000" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  >
                                    </div>
                                 </div>
                                                            
                                 
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       
                                       <input type="submit" name="sbtbtn" class="btn btn-primary btn-lg" value="Update"/>
                                    </div>
                                 </div>
                              </form>
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
      
      <?php $slider_obj->DeleteJSCall(); ?>
   </body>

</html>

