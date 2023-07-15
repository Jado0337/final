<?php
if(isset($_GET['id']))
{
include('Db.php');
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sqy = "select brand from wr_product where id='".$_GET['id']."' ";
$rec=mysqli_query($con,$sqy);
$ros=mysqli_fetch_array($rec);
$sqz = "select brand_name from wr_brands where id='".$ros['brand']."' ";
$rez=mysqli_query($con,$sqz);
$roz=mysqli_fetch_array($rez);
$names=$roz['brand_name'];
$urz=$url.'&name='.$names;
$g=str_replace('&name='.$names.''.'&name='.$names,'&name='.$names,$urz);
$uki="sell_laptop.php?id=".$_GET['id']."&pc=".$_GET['pc']."";
if($url=="sell_laptop.php?id=".$_GET['id']."&pc=".$_GET['pc']."" || $url=="sell_laptop?id=".$_GET['id']."&pc=".$_GET['pc']."")
{
  $yourURL="sell_laptop.php?id=".$_GET['id']."&pc=".$_GET['pc']."&b=".$names."";
    header("location: $yourURL", true, 301);
}

}

require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/home/homepage.class.php');
require_once('wr-m6/apps/front/products/products.class.php');
$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
$home_obj = new HomePage(); 
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <style>
        select#one {
    display: block!important;
}
 select#tw {
    display: block!important;
}
 select#thr {
    display: block!important;
}
select#for {
    display: block!important;
}
select#mactwo {
    display: block!important;
}
select#macthr{
    display: block!important;
}
select#macfor{
    display: block!important;
}
.nice-select {
    visibility: hidden;
}
    </style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $pro_obj->getPageTitle(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                        <li>Sell Laptop</li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">
           
<?php 
         $id=$_GET['id'];
         $pc=$_GET['pc']; 
         $b=$_GET['b'];
         if($b=='Macbook')
         {
             $type='Year';
         }
         else
         {
             $type='Model';
         }
            $sql = "select * from wr_product where id='".$id."'";
            $record = mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($record))
            {
            ?>
            <div class="container">
            <div class="shop-page-area bg-white ptb-30">
               <div class="shop-page-products mt-30">
        <div class="row no-gutters">
          <div class="col-lg-12 col-md-4 col-sm-6 col-12">
                <article class="hoproduct" style="border:0px !important;">
                    <div class="hoproduct-image text-center">
                        <a class="hoproduct-thumb text-center" href="javascript:void(0);" style="cursor:auto;">
                            <img class="hoproduct-frontimage text-center" src="<?php echo BASE_FILRDIR.$row['pro_img']; ?>" alt="<?php echo $row['productname']; ?>">
                        </a>
                    </div>
                    <div class="text-center">
                        <h2 style="color:#333333; font-size:16px; margin-top:20px;"><?php echo $row['productname']; ?></h2>
                        
                        
                       
                    </div>
                </article>
            </div>
            <div id="laptop" class="col-lg-12 col-md-4 col-sm-6 col-12">
                <article class="hoproduct">
                    <form action="laptop_view.php" method="POST">
                        <input type="hidden" id="pid" name="pid" value="<?php echo $row['id']; ?>">
                        <input type="hidden" id="vid" name="vid" value="<?php echo $vid; ?>">
                        <input type="hidden"  name="pc" value="<?php echo $pc; ?>">
                         
                        <div class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">WHAT SIZE IS YOUR <?php echo $row['productname']; ?> SCREEN? *</label>
                               <select  name="inch" id="one" >
                                <option value="" >Please Select</option>
                                <?php
                                $sqlin = "select distinct(variant) from wr_product_price where product_id='".$row['id']."' order by variant ASC ";
            $recordin = mysqli_query($con,$sqlin);
            while($inch=mysqli_fetch_array($recordin))
            {
            ?>
                                    <option value="<?php echo $inch['variant']; ?>" ><?php $sqlmd = "select model from wr_model where id='".$inch['variant']."' ";
            $recordmd = mysqli_query($con,$sqlmd);
            while($inchs=mysqli_fetch_array($recordmd))
            {
                $model=$inchs['model'];
            }
            echo $model;
            ?></option>
                                    
                                   
                                
                                <?php
                            }
                            ?>
                            </select>
                            </div>
                            <div id="two" class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">WHAT <?php echo $type; ?> WAS YOUR <?php echo $row['productname']; ?> RELEASED?</label>
                               <select name="year" id="tw" class="divyears" >
                                   
                            </select>
                            </div>
                                <div id="three" class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">WHAT PROCESSOR DOES <?php echo $row['productname']; ?> LAPTOP USE? </label>
                              
                                <select name="prc" id="thr" class="divcontact" >
                
                                
                            </select>
                           
                            </div>
                            <div id="four" class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">HOW MUCH RAM DOES <?php echo $row['productname']; ?> LAPTOP HAVE? </label>
                               <select name="ram" id="for" class="divprc">
                                    
                            </select>
                            </div>
                             <div id="five" class="single-input">
                                <div class="col-md-12" style="text-align:center;">
                              <button class="btn btn-success btn-sm text-white" style="margin-bottom:5px;padding: 0% 8%!important;font-size:18px;font-weight:500;background:#17a697;border: 1px solid;" type="submit" name="submit"><i class="fa fa-shopping-cart"></i> Sell Now</button>
                           </div>
                            </div>
                    </form>
                </article>
            </div>
             <div id="mini" class="col-lg-12 col-md-4 col-sm-6 col-12">
                <article class="hoproduct">
                    <form action="laptop_view.php" method="POST">
                        <input type="hidden" id="pid" name="pid" value="<?php echo $row['id']; ?>">
                        <input type="hidden" id="vid" name="inch" value="101">
                       
                        <input type="hidden"  name="pc" value="<?php echo $pc; ?>">
                         
                       
                            <div class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">WHAT YEAR WAS YOUR <?php echo $row['productname']; ?> RELEASED?</label>
                               <select name="year" id="mactwo">
                                    <option value="" >Please Select</option>
                                   <?php
                                $sqlin = "select distinct(released_year) from wr_product_price where product_id='".$row['id']."' Order by released_year ASC";
            $recordin = mysqli_query($con,$sqlin);
            while($inch=mysqli_fetch_array($recordin))
            {
            ?>   
            <option value="<?php echo $inch['released_year']; ?>" ><?php echo $inch['released_year']; ?></option>
            <?php
        }
            ?> 
                            </select>
                            </div>
                                <div id="macthree" class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">WHAT PROCESSOR DOES YOUR <?php echo $row['productname']; ?> USE? </label>
                              
                                <select name="prc" id="macthr" class="macprc" >
                
                                
                            </select>
                           
                            </div>
                            <div id="macfour" class="single-input">
                                <label style="font-size: 15px;color: black;font-weight: 600;text-transform:uppercase;" for="full_name">HOW MUCH RAM DOES YOUR <?php echo $row['productname']; ?> HAVE? </label>
                               <select name="ram" id="macfor" class="macram">
                                    
                            </select>
                            </div>
                             <div id="macfive" class="single-input">
                                <div class="col-md-12" style="text-align:center;">
                              <button class="btn btn-success btn-sm text-white" style="margin-bottom:5px;padding: 0% 8%!important;font-size:18px;font-weight:500;background:#17a697;border: 1px solid;" type="submit" name="submit"><i class="fa fa-shopping-cart"></i> Sell Now</button>
                           </div>
                            </div>
                    </form>
                </article>
            </div>
          </div>
    </div>
</div>
</div>
    <?php }?>

            
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
        if($('#pid').val()==658 || $('#pid').val()==660)
        {
$('#laptop').hide();
$('#mini').show();
$('#mactwo').show();
$('#macthree').hide();
$('#macfour').hide();
$('#macfive').hide();
}
        else{
            $('#laptop').show();
$('#mini').hide();
$('#one').show();
$('#two').hide();
$('#three').hide();
$('#four').hide();
$('#five').hide();
    }
           $('#one').on('change', function(){
    if($('#one').val()!='')
    {
        $('#two').show();
        $('#three').hide();
        $('#four').hide();
        $('#five').hide();
        
    }
    else{
$('#two').hide();
$('#three').hide();
        $('#four').hide();
        $('#five').hide();
       }
    });
            $('#tw').on('change', function(){
    if($('#tw').val()!='')
    {
         $('#two').show();
        $('#three').show();
        $('#four').hide();
        $('#five').hide();
        
    }
    else{
$('#two').show();
        $('#three').hide();
        $('#four').hide();
        $('#five').hide();
       }
    });
             $('#thr').on('change', function(){
    if($('#thr').val()!='')
    {
         $('#two').show();
        $('#three').show();
        $('#four').show();
        $('#five').hide();
        
    }
    else{
$('#two').show();
        $('#three').show();
        $('#four').hide();
$('#five').hide();
       }
    });
              $('#for').on('change', function(){
    if($('#for').val()!='')
    {
         $('#two').show();
        $('#three').show();
        $('#four').show();
        $('#five').show();
        
    }
    else{
$('#two').show();
        $('#three').show();
        $('#four').hide();
$('#five').hide();
       }
    });
              $('#mactwo').on('change', function(){
    if($('#mactwo').val()!='')
    {
        $('#macthree').show();
        $('#macfour').hide();
        $('#macfive').hide();
}
    else{
$('#macthree').hide();
        $('#macfour').hide();
        $('#macfive').hide();
       }
    });
              $('#macthr').on('change', function(){
    if($('#macthr').val()!='')
    {
        $('#macthree').show();
        $('#macfour').show();
        $('#macfive').hide();
}
    else{
$('#macthree').show();
        $('#macfour').hide();
        $('#macfive').hide();
       }
    });
              $('#macfor').on('change', function(){
    if($('#macthr').val()!='')
    {
        $('#macthree').show();
        $('#macfour').show();
        $('#macfive').show();
}
    else{
$('#macthree').show();
        $('#macfour').show();
        $('#macfive').hide();
       }
    });
                </script>
               
    <script>
        $(document).ready(function(){
$('#tw').change(function(){
    var year = $(this).val();
    var pid=$('#pid').val();
    var one=$('#one').val();
    $.ajax({
        url:"fetch_year.php",
        method: "POST",
        data: {year:year,pid:pid,one:one},
        success: function(data){
            $(".divcontact").html(data);
        }
    });
});
});
    </script>
    <script>
        $(document).ready(function(){
$('#thr').change(function(){
    var prc = $(this).val();
    var tw=$('#tw').val();
    var pid=$('#pid').val();
    var one=$('#one').val();
    $.ajax({
        url:"fetch_ram.php",
        method: "POST",
        data: {prc:prc,tw:tw,pid:pid,one:one},
        success: function(data){
            $(".divprc").html(data);
        }
    });
});
});
    </script>
    <script>
        $(document).ready(function(){
$('#one').change(function(){
    var one = $(this).val();
    var pid=$('#pid').val();
  $.ajax({
        url:"fetch_processor.php",
        method: "POST",
        data: {one:one,pid:pid},
        success: function(data){
            $(".divyears").html(data);
        }
    });
});
});
    </script>
    <script>
        $(document).ready(function(){
$('#mactwo').change(function(){
    var one = $(this).val();
    var pid=$('#pid').val();
  $.ajax({
        url:"macprc.php",
        method: "POST",
        data: {one:one,pid:pid},
        success: function(data){
            $(".macprc").html(data);
        }
    });
});
});
    </script>
     <script>
        $(document).ready(function(){
$('#macthr').change(function(){
    var year = $(this).val();
    var pid=$('#pid').val();
    var mactwo=$('#mactwo').val();
    $.ajax({
        url:"macram.php",
        method: "POST",
        data: {year:year,pid:pid,mactwo:mactwo},
        success: function(data){
            $(".macram").html(data);
        }
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