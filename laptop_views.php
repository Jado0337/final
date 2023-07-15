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
<html class="no-js" lang="en-gb">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $pro_obj->getProductTitle($pid); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/page.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(''); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <?php $pro_obj->ProductBreadcrums($pid,$vid); ?>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Product Details Area -->
            <div class="product-details-area bg-white ptb-30">
                <?php 
				if($submit == 'prosubmit'){
					$pro_obj->AddToCart();
				}
				else{
                    ?>
                    <?php
                    $pid=$_GET['pid'];
                    $pc=$_GET['pc'];
                    $vid=$_GET['inch'];
                    $ram=$_GET['ram'];
                    $prc=$_GET['prc'];
                    $year=$_GET['year'];
                    $network_val = 1;
$network_price = 0;
                    $sql="select * from wr_product_price where product_id='$pid' AND variant='$vid' AND processor='$prc' AND released_year='$year' AND ram='$ram'";
                    $record=mysqli_query($con,$sql);
                    while($row_p=mysqli_fetch_array($record)){
                        $price = $row_p['price']; 
$FLprice = $row_p['faulty_price'];
$SCprice = $row_p['scrap_price']; 
 }
 $sqlir="select * from wr_product where id='$pid' ";
 $recordir=mysqli_query($con,$sqlir);
 while($row=mysqli_fetch_array($recordir)){
    $pr_img=$row['pro_img'];
    $prname=$row['productname'];
    $brand=$row['brand'];
 }
 $sqlbr="select * from wr_brands where id='$brand' ";
 $recordbr=mysqli_query($con,$sqlbr);
 while($rowbr=mysqli_fetch_array($recordbr)){
    $brandname=$rowbr['brand_name'];
 }
 $sql_procat ="select * from wr_procat where id='$pc' ";
 $recordprocat=mysqli_query($con,$sql_procat);
 while($row_procat=mysqli_fetch_array($recordprocat)){
    $good=$row_procat['good_text'];
    $faulty=$row_procat['faulty_text'];
    $scrap=$row_procat['scrap_text'];
    $c=$row_procat['category'];
 }
 $sqlmd ="select * from wr_model where id='$vid' ";
 $recordmd=mysqli_query($con,$sqlmd);
 while($rowmd=mysqli_fetch_array($recordmd)){
    $model=$rowmd['model'];
    
 }
?>
                    <div class="container">
    <form name="prosell" id="procell" action="" method="post">
    <div class="pdetails">
        <div class="row">
            <div class="col-lg-12"><h2><span class="text-primary-wr text-uppercase"></span><?php echo $brandname; ?>: <?php echo $prname; ?> </h2></div>
            <!--<div class="col-lg-3">
            </div>-->
            <div class="col-lg-7">
                <div class="row">
                <div class="col-lg-4">
                    <div class="pdetails-images">
                        <div class="">
                            <div class="pdetails-singleimage border-blue-wr">
                                <img src="wr-m6/uploads/<?php echo $pr_img; ?>" >
                                <?php
                                          if(file_exists('wr-m6/updated/'.str_replace(' ','-',$prname).'.webp'))
                                          {
                                          ?>
							<img src="wr-m6/updated/<?php echo str_replace(' ','-',$prname); ?>.webp" alt="Sell <?php echo $prname; ?>">
							<?php
                                          }
                                          else
                                          {
                                          ?>
                                          <img class="hoproduct-frontimage text-center" src="wr-m6/updated/notavailable.webp" alt=" Sell <?php echo $prname; ?>">

                                           <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="pdetails-content">
                        <div class="pdetails-pricebox">
                            <!--<del class="oldprice">$35.90</del>-->
                            <span class="price">Offer Price: &pound; <span class="propricediv"><?php echo $price; ?></span></span>
                        </div>
                        <div>
                            <span >Ram:  <span style="color:#17a697;" ><?php echo $ram; ?></span></span>
                        </div>
                        <div>
                            <span >Processor:  <span style="color:#17a697;" ><?php echo $prc; ?></span></span>
                        </div>
                        <div >
                            <span >Screen Size:  <span style="color:#17a697;"><?php echo $model; ?></span></span>
                        </div>
                        <div >
                            <span >Release Year:  <span style="color:#17a697;"><?php echo $year; ?></span></span>
                            <?php /*?><span class="badge">128 GB</span><?php */?>
                        </div>
                        <?php 
                        /*
                    $x=1;
                        if($row_procat['category']=='Phones' || $row_procat['category']=='Tablets' || $row_procat['category']=='Smart Watch' || $row_procat['Macbook']=='Ipad'){
                            ?>
                            <h5>Select your Network Below.</h5>
                            <div class="col-md-12"> 
                                <div class="row " style="margin-bottom:5px;">
                                <?php
                                    $sql2 = "select * from ".WR_PRO_NETWORK." where product_id='".$pid."' order by id asc";
                                    $record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
                                    foreach ($record2 as $row_netwk2)
                                    {
                                        $network_id = $row_netwk2['network_id'];
                                        $sql_nt = "select id,network_name,network_img from ".WR_MOBILE_NETWORK." where id='".$network_id."' ";
                                        $row2 = $this->db->row($sql_nt,$this->db->pdo_open());
                                        $allnetwork=$row2['network_name'];
                                    echo    $productAgeCost = $row_netwk2['price'];
                                ?>
                                        <a href="javascript:void;" class="netwrkval networkimg" data-id="<?php echo $row2['id']; ?>" data-pr="<?php echo $productAgeCost; ?>" data-net-name="<?php echo $row2['network_name']; ?>">
                                        <img src="<?php echo 'uploads/'.$row2['network_img']; ?>" title="<?php echo $row2['network_name']; ?>" alt="<?php echo $row2['network_name']; ?>" class="">
                                        </a>
                                <?php 
                                    }
                                ?>
                                </div>
                            </div>  
                            <?php 
                            }*/
                            ?>
                           
                    </div>
                </div>
                <div class="col-lg-12">
                        <div class="pdetails-groupproduct">
                            <div class="table-responsive">
                                <table class="table table-bordered ">
                                    <tbody>
                                        <tr>
                                            <td class="product-quantity">
                                                <b>Qty</b>
                                                <div class="quantity-select">
                                                    <input type="text" value="1" name="proqty" id="proqty" class="proqtycall">
                                                    <div class="inc qtybutton" onclick="coset()">+<i class="ion ion-ios-arrow-up"></i></div>
                                                    <div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
                                                </div>
                                            </td>
                                            <td class="pro-title">
                                                <?php echo $prname; ?> 
                                            </td>
                                            <td class="pro-price"><span>&pound; <span class="propricediv"><?php echo $price;  ?></span></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h5 class="mt-30">Please select your condition</h5>
                                <a href="javascript:void;" class="ho-button mobcondi" data-id="Good" data-val="<?php echo $price; ?>" id="goodprz">
                                <span>Good</span>
                                </a>
                                <a href="javascript:void;" class="ho-button mobcondi" data-id="worn" data-val="<?php echo $FLprice; ?>" id="faultyprz">
                                <span>Worn</span>
                                <!-- <span>Faulty</span> -->
                                </a>
                                <a href="javascript:void;" class="ho-button mobcondi" data-id="faulty" data-val="<?php echo $SCprice; ?>" id="scrapprz">
                                <!-- <span>Scrap</span> -->
                                <span>Faulty</span>
                                </a>
                            </div>
                            <div class="col-lg-12">
                                <div class="bg-grey p-20 mt-25">
                                    <div id="pro-good">
                                        <h3>Good Condition</h3>
                                        <?php echo $good; ?>
                                    </div>
                                    <div id="pro-faulty" style="display:none;">
                                        <h3>Worn Condition</h3>
                                        <?php echo $faulty; ?>
                                    </div>
                                    <div id="pro-scrap" style="display:none;">
                                        <h3>Faulty Condition</h3>
                                        <?php echo $scrap; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php /*?><div class="pdetails-categories">
                            <span>Categories :</span>
                            <ul>
                                <li><a href="#">Mobile</a></li>
                            </ul>
                        </div>
                        <div class="pdetails-socialshare">
                            <span>Share :</span>
                            <ul>
                                <li><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
                                <li><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
                                <li><a href="#"><i class="ion ion-logo-googleplus"></i></a></li>
                                <li><a href="#"><i class="ion ion-logo-pinterest"></i></a></li>
                            </ul>
                        </div><?php */?>
                </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="order-infobox">
                    <div class="checkout-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-left"><h3>ITEM SUMMARY</h3></th>
                                    <th class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-left">Device</th>
                                    <td class="text-right text-blue"><?php echo $brandname; ?> - <?php echo $prname; ?></td>
                                </tr>
                                <tr style="display:<?php echo $storage_display; ?>;">
                                    <th class="text-left">Storage</th>
                                    <td class="text-right text-blue"><?php echo $ram; ?></td>
                                </tr>
                                
                                <tr>
                                    <th class="text-left">Condition</th>
                                    <td class="text-right text-blue"><span id="product_condition_text">-</span></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="total-price">
                                    <th class="text-left">Offer Price</th>
                                    <td class="text-right">&pound; <span id="totalrez"><?php echo $price; ?></span></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
<?php
				 if($brandname=="Apple" && $c=="Laptop")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='macbook.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1546772237.jpg" width="100px" height="60px">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#17a697;margin-bottom:2px;">Selling an Apple Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your iCloud account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
			?><button class="ho-button ho-button-fullwidth mt-30 " type="submit" name="submit" value="prosubmit">
                        <i class="lnr lnr-cart"></i>
                        <span>Proceed to Sell</span>
                    </button>
                    
				
                    <div class="mt-30">
                    <span id="pgerr" class="wr-error-text"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" value="<?php echo $pid; ?>" name="pid" id="pid" required />
    <input type="hidden" value="<?php echo $vid; ?>" name="vid" id="vid" required />
    <input type="hidden" value="<?php echo $price; ?>" name="price" id="price" required />
    <input type="hidden" value="<?php echo $network_val; ?>" name="network" id="network" required />
    <input type="hidden" value="<?php echo $ram.','.$prc.','.$year; ?>" name="storages" id="storages" />
    <input type="hidden" value="<?php echo $network_price; ?>" name="network_price" id="network_price" required />
    <input type="hidden" value="" name="product_condition" id="product_condition" required />
    <input type="hidden" value="" name="total" id="total" required />
    </form>
</div>


					
                    
                    <?php
				}
            
				
				?>
            </div>
            <!--// Product Details Area -->


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
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
<?php $pro_obj->ProductJS(); ?>
<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>