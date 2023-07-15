<?php 
include('Db.php');
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/products/products.class.php');

$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $pro_obj->getPageTitle(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/page.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Select Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Shop Page Area -->
            <div class="shop-page-area bg-white ptb-30">
                <?php 
                $bid=$_GET['bid'];
                $pid=$_GET['pid'];
                $vrt=$_GET['vid'];
                $pc=$_GET['pc'];
                ?>
                <?php 
    if($pc==3)
    { ?>
                <div style="background:#17a697;margin-top:-30px;" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
    <div class="col-md-12">
        <div style="padding: 25px;  margin-top: 40px; ">
            <h1 class="white centerTextAlign roboto" style="font-size: 1.750em; margin-bottom:5px;color:white;text-align:center;">Sell your  with Recyclepro</h1>
            <p style="font-size: 13px; margin-bottom:5px;color:white;text-align:center;">Find out how much your is worth by entering your Laptop Name. </p>
            
            
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="pdetails-allinfo">

                       
                        
                        <div class="pdetails-description" >
                            
                            <form name="mob-search" class="wr-search">
                                
                                
                                <input style="width:80%!important;background:white!important;line-height:0px!important;" type="text" name="mob-search-field" id="mob-search-field" class="wr-search-field typeahead" placeholder="Enter Your <?php echo $ProCatName; ?> Name" />
                                <button style="width:20%!important;background:#7bcb58!important;color:white!important;line-height:0px!important;" name="mob-search-btn" class="wr-search-btn" type="button">FIND</button>
                                
                            </form>
                                
                        </div>

                    </div>
                    
                    
                
                </div>
                <div class="col-md-4">
                </div>
            </div>
            
        </div>
    </div>
</div>
                    </div>

                   

                </div>
               
            </div>

 <div class="container">
<div id="myDIV"  class="shop-page-products mt-30">
        <div class="row no-gutters">
            <?php 
            $x=1;
            $status="show";
            $sql = "select * from wr_product where brand='".$bid."' and category='".$pc."' and id='".$pid."' and status='".$status."' order by sorting asc";
            $record=mysqli_query($con,$sql);
            while($arr=mysqli_fetch_array($record))
            {

        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <article class="hoproduct">
                    <div class="hoproduct-image text-center">
                        <a class="hoproduct-thumb text-center" href="javascript:void(0);" style="cursor:auto;">
                            <img class="hoproduct-frontimage text-center" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">

                        </a>
                        <h2 style="color:#333333; font-size:16px; margin-top:20px;"><?php echo $arr['productname']; ?></h2>
                        
                        <a  href="sell_laptop.php?id=<?php echo $arr['id']; ?>&pc=<?php echo $arr['category']; ?>&b=<?php echo $arr['brand']; ?>" class="btn btn-success btn-sm text-white" style="margin-bottom:5px;">Sell Now</a>
                    </div>
                    <div class="text-center">
                        
                        
                    </div>
                </article>
            </div>
            <?php 
            }
            ?>
        </div>
    </div>
    <?php /*?><div class="cr-pagination pt-30">
        <p>Showing 1-12 of 13 item(s)</p>
        <ul>
            <li><a href="#"><i class="ion ion-ios-arrow-back"></i> Previous</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">Next <i class="ion ion-ios-arrow-forward"></i></a></li>
        </ul>
    </div><?php */?>
</div>
<?php 
}
    else
    {
        ?>
                 <div style="background:#17a697;margin-top:-30px;" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
    <div class="col-md-12">
        <div style="padding: 25px;  margin-top: 40px; ">
            <h1 class="white centerTextAlign roboto" style="font-size: 1.750em; margin-bottom:5px;color:white;text-align:center;">Sell your  with Recyclepro</h1>
            <p style="font-size: 13px; margin-bottom:5px;color:white;text-align:center;">Find out how much your is worth by entering your Laptop Name. </p>
            
            
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="pdetails-allinfo">

                       
                        
                        <div class="pdetails-description" >
                            
                            <form name="mob-search" class="wr-search">
                                
                                
                                <input style="width:80%!important;background:white!important;line-height:0px!important;" type="text" name="mob-search-field" id="mob-search-field" class="wr-search-field typeahead" placeholder="Enter Your <?php echo $ProCatName; ?> Name" />
                                <button style="width:20%!important;background:#7bcb58!important;color:white!important;line-height:0px!important;" name="mob-search-btn" class="wr-search-btn" type="button">FIND</button>
                                
                            </form>
                                
                        </div>

                    </div>
                    
                    
                
                </div>
                <div class="col-md-4">
                </div>
            </div>
            
        </div>
    </div>
</div>
                    </div>

                   

                </div>
               
            </div>

 <div class="container">
<div id="myDIV"  class="shop-page-products mt-30">
        <div class="row no-gutters">
            <?php 
            $x=1;
            $status="show";
            $sql = "select * from wr_product where brand='".$bid."' and category='".$pc."' and id='".$pid."' and status='".$status."' order by sorting asc";
            $record=mysqli_query($con,$sql);
            while($arr=mysqli_fetch_array($record))
            {

        ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <article class="hoproduct">
                    <div class="hoproduct-image text-center">
                        <a class="hoproduct-thumb text-center" href="javascript:void(0);" style="cursor:auto;">
                            <img class="hoproduct-frontimage text-center" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
 </a>
                        <h2 style="color:#333333; font-size:16px; margin-top:20px;"><?php echo $arr['productname']; ?></h2>
                        
                <a  href="product-view.php?pid=<?php echo $arr['id']; ?>&vid=<?php echo $vrt; ?>" class="btn btn-success btn-sm text-white" style="margin-bottom:5px;"><?php
                 $sqlmd = "select model from wr_model where id='".$vrt."' ";
            $recordmd = mysqli_query($con,$sqlmd);
            while($inchs=mysqli_fetch_array($recordmd))
            {
                $model=$inchs['model'];
            }
            echo $model;
            ?></a>
                    
                       
                        </div>
                </article>
            </div>
            <?php 
            }
        }
            ?>
        </div>
    </div>
    <?php /*?><div class="cr-pagination pt-30">
        <p>Showing 1-12 of 13 item(s)</p>
        <ul>
            <li><a href="#"><i class="ion ion-ios-arrow-back"></i> Previous</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">Next <i class="ion ion-ios-arrow-forward"></i></a></li>
        </ul>
    </div><?php */?>
</div>
            </div>
            <!--// Shop Page Area -->

            <!-- Newsletter Area -->
            <?php $layout_obj->NewsLetterArea(); ?>
            <!--// Newsletter Area -->

        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
        <?php $layout_obj->footer(); ?>
        <!--// Footer -->


    </div>
    <!--// Wrapper -->
    <script>
$(document).ready(function(){
  $("#mob-search-field").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 <script>
$(document).ready(function(){
  $("#lap-search-field").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mine div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
	<script>
	includeHTML();
	</script>
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
	<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>