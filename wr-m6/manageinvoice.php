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
      <?php $layout_obj->pageTitle('Invoice'); ?>
      <!-- Bootstrap -->
      <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendors/bootstrap/dist/css/style.css" rel="stylesheet">
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
      <style>
          @media print {
    .nav_menu {
        visibility:hidden;
    }
    .mCustomScrollBox
    {
        visibility:hidden;
    }
    #page-wrap, #page-wrap * {
        visibility:visible;
    }
    #page-wrap {
        position:absolute;
        left:0;
        top:0;
    }
}
      </style>
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
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
                  
                     <header class="clearfix">
     <div id="logo">
        <img src="img/m6-logo-1.png">
      </div>
      <div id="company">
        <h2 class="name">Recycle Pro</h2>
        <div>170 Slade Road Erdington Birmingham West Midlands B23 7PX</div>
        <div>+44 1213822532</div>
        <div><a href="mailto:company@example.com">info@recyclepro.co.uk</a></div>
      </div>
      </div>
    </header>
      <?php 
    $id=$_GET['id'];
    $uid=$_GET['uid'];
                              $sql = "select * from wr_user where id='".$uid."'";
                              $record =mysqli_query($con,$sql);
                              $row=mysqli_fetch_array($record);
                              $sqlor = "select *,DATE_FORMAT(timestamp, '%d/%m/%Y') from wr_order where id='".$id."'";
                              $recordor =mysqli_query($con,$sqlor);
                              $rowor=mysqli_fetch_array($recordor);
                           ?>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">PAYOUT TO</div>
          <h2 class="name"><?php echo $row['fname'].' '.$row['lname'];?></h2>
          <div class="address"><?php echo $row['address1'].' '.$row['address2'].' '.$row['postcode'];?></div>
          <div class="email"><a href="mailto:john@example.com"><?php echo $row['email'];?></a></div>
        </div>
        <div id="invoice">
          <h1>Order#<?php echo $id; ?></h1>
          <div class="date">Date:<?php echo $rowor["DATE_FORMAT(timestamp, '%d/%m/%Y')"]; ?> </div>
          
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Item</th>
            <th class="desc">Product Name</th>
            <th class="unit">Unit Cost</th>
            <th class="qty">Quantity</th>
            <th class="total">Price</th>
          </tr>
        </thead>
        <?php
        $sqlod = "select * from wr_order_detail where order_id='".$id."'";
                              $recordod =mysqli_query($con,$sqlod);
                               while($rowor=mysqli_fetch_array($recordod))
                              {
                                $sqlpr = "select * from wr_product where id='".$rowor['pid']."'";
                              $recordpr =mysqli_query($con,$sqlpr);
                              $rowpr=mysqli_fetch_array($recordpr);
                              $sqlad = "select * from wr_order_address where order_id='".$id."'";
                              $recordad =mysqli_query($con,$sqlad);
                              $rowad=mysqli_fetch_array($recordad);
                              if($rowad['account_no']!='' && $rowad['sort_code']!='')
                        {
                            $pay="Account Number";
                        }
                        if($rowad['paypal_email']!='')
                        {
                            $pay="Paypal";
                        }
                        if($rowad['addr']!='')
                        {
                            $pay="Cheque";
                        }
                        if($rowad['charity_name ']!='')
                        {
                            $pay="Charity";
                        }
                        
                           ?>
        <tbody>
          <tr>
            <td class="no"><img src="<?php echo 'uploads/'.$rowpr['pro_img']; ?>" alt="product image" style="max-width:100px;"></td>
            <td style="color:black;" class="desc"><h3><?php echo $rowpr['productname'];?></h3></td>
            <td class="unit"><?php echo $rowor['price'];?></td>
            <td class="qty"><?php echo $rowor['qty'];?></td>
            <td class="total"><?php echo $rowor['total'];?></td>
          </tr>
         
        </tbody>
         <?php
      }
     
        $sqlay = "select SUM(total) AS TotalItemsOrdered from wr_order_detail where order_id='".$id."'";
                              $recorday =mysqli_query($con,$sqlay);
                              $roway=mysqli_fetch_array($recorday)
                              ?>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td><?php echo $roway['TotalItemsOrdered'];?></td>
          </tr>
         
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td><?php echo $roway['TotalItemsOrdered'];?></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td style="color:#0087C3;" colspan="2">Payment Method</td>
            <td style="#0087C3;"><?php echo $pay;?></td>
          </tr>
        </tfoot>
       
      
      </table>
       <div id="notices">
        
        <div class="notice"> <button class="btn btn-primary hidden-print" onclick="window.print()"><span class="fa fa-print" aria-hidden="true"></span> Print</button></div>
      </div>
      
    </main>
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
<script>
$(document).ready(function(){
  $("#odr").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#ord tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</html>

