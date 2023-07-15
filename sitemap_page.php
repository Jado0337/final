<?php 
include('Db.php');
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/pages/pages.class.php');
$layout_obj = new LayoutClass();
$page_obj = new PagesClass();
extract($_REQUEST);

if($p==1)
$pagename='about';
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<?php
include('Db.php');
$urs= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$con = mysqli_connect("localhost", "", "", "recyclepro_co_uk") or die("Error " . mysqli_error($con));
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sql="select * from url where url='$url' ";
            $record=mysqli_query($con,$sql);
           while($row=mysqli_fetch_array($record))
            {
            	$title=$row['title'];
            	$keywords=$row['keywords'];
            	$description=$row['description'];
            }
 ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description;  ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
<link rel="canonical" href="privacy-policy.php"/>

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="js/page.js"></script>
    <?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
    <style>
        <style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
   
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead($pagename); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li>Privacy Policy</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Shop Page Area -->
           
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">Phones</h4>
                    <?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=1";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
</div>
<div class="col-md-3">
                            <h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">Tablets</h4>
                    <?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=2";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
</div>
<div class="col-md-3">
                            <h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">Laptops</h4>
                    <?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=3";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
<h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">Gaming Consoles</h4>
<?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=13";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
</div>
<div class="col-md-3">
                            <h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">Smart Watch</h4>
                    <?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=7";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
<h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">Air Pod</h4>
<?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=11";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
<h4 style="color:#13564f!important;font-weight:800;margin-top:3%;margin-bottom:3%;text-align:center;">IPOD</h4>
                    <?php
                    $sql="select p.productname,p.id as pid,r.variant as var,m.model as model from wr_product p left join wr_product_prices r on p.id=r.product_id left join wr_model m on r.variant=m.id  where p.category=12";
$result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_assoc($result)) {
       ?>
   <a href="product-view?name=<?php echo str_replace(' ','-',$row['productname']);?>&pid=<?php echo $row['pid'];?>&vid=<?php echo $row['var'];?>"> <button  style="width:100%;background-color:#13564f!important;color:white;font-weight:600;" class="accordion"><?php echo $row['productname'].'-'.$row['model'];?></button></a>
   <?php
    }

?>
</div>
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
    includeHTML();
    
    </script>
    <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
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