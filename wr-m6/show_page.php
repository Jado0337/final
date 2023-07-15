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
                                          <th>Page Id </th>
                                          <th class="column-title">Page Name</th>
                                          <th class="column-title">Page Url</th>
                                          <th class="column-title">Page Title</th>
                                          <th class="column-title">Page Keywords</th>
                                          <th class="column-title">Page Description</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
                           <?php 
                              $sql = "select * from url ";
                              $record =mysqli_query($con,$sql);
                              while($row=mysqli_fetch_array($record))
                              {
                                 
                           ?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $row['id']; ?></td>
                                          <td class=" "><?php echo $row['page_name']; ?></td>
                                          <td class=" "><?php echo $row['url']; ?></td>
                                          <td class=" "><?php echo $row['title']; ?></td>
                                          <td class=" "><?php echo $row['keywords']; ?></td>
                                          <td class=" "><?php echo $row['description']; ?></td>
                                          <td class=" last"><a href="update_page.php?id=<?php echo $row['id']; ?>">Edit</a>/<a href="delete_page.php?id=<?php echo $row['id']; ?>">Delete</a>  
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
      
      <?php $slider_obj->DeleteJSCall(); ?>
   </body>

</html>

