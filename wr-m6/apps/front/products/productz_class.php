<?php

class FrontProductClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function getBasicVals($option_name,$valtype){
$sql = "select ".$valtype." from ".WR_BASIC." where option_name='".$option_name."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record[$valtype];
}

function getnetVals($valtype){
$sql = "select network_name  from wr_mobile_networks where id='".$valtype."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['network_name'];
}


function getPageTitle(){
?>
<?php
$con = mysqli_connect("localhost", "recycleproco_sohaib", "123@Screw@@", "recycleproco_experiment") or die("Error " . mysqli_error($con));
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sql="select * from url where url='$url' ";
            $record=mysqli_query($con,$sql);
           while($rows=mysqli_fetch_array($record))
            {
            	$title=$rows['title'];
            	$keywords=$rows['keywords'];
            	$description=$rows['description'];
            }
$sqy = "select productname from wr_product where id='".$_GET['pid']."' ";
$rec=mysqli_query($con,$sqy);
$ros=mysqli_fetch_array($rec);
$names=str_replace(' ','-',$ros['productname']);
$urz=$url.'&name='.$names;
$g=str_replace('&name='.$names.''.'&name='.$names,'&name='.$names,$urz);
$uki="product-view?name=".$names."&pid=".$_GET['pid']."&vid=".$_GET['vid']."";

 ?>
 <title><?php echo $title;  ?></title>
<meta name="description" content="<?php echo $description;  ?>">
<meta name="keywords" content="<?php echo $keywords;  ?>">
<link rel="canonical" href="<?php echo $url; ?>">
<meta property="og:type" content="article" />
<meta property="og:locale" content="en-GB" />
<meta property="og:site_name" content="recyclepro" />
<meta property="og:title" content="<?php echo $title;  ?>" />
<meta property="og:url" content="<?php echo $url; ?>" />
<meta property="twitter:partner" content="OG" />
<meta property="twitter:card" content="summary" />
<meta property="twitter:title" content="<?php echo $title;?>" />
<meta property="twitter:description" content="<?php echo $description;?>" />
<meta property="twitter:url" content="<?php echo $url;?>" />
<meta property="profile:first_name" content="Roger" />
<meta property="profile:last_name" content="Smith" />
<meta property="profile:username" content="Roger" />
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="google-site-verification" content="fzo6XWs1WEp5039DYKYZkt0hIpADPMzCfKDOI42xGeY" />

<?php
}
function getProductTitle($pid){
$sql = "select * from ".WR_PRODUCT." where id='".$pid."' ";
$row = $this->db->row($sql,$this->db->pdo_open());
?>
<title><?php echo  $row['title']; ?></title>
<meta name="description" content="<?php echo $row['keywords']; ?>">
<meta name="keywords" content="<?php echo $row['metadescription']; ?>">

<?php
}
function getProductCatName($id){
	$sql = "select category from ".WR_PROCAT." where id='".$id."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	return $record['category'];
}
function ShowAllProducts(){
	if($_REQUEST['pc']){
	$ProCatName = $this->getProductCatName($_REQUEST['pc']);
	}
	else{
	$ProCatName = 'Phone';
	}
?>
<?php
	if($_REQUEST['pc']==3)
	{ ?>

	 <div style="background:#13564f;margin-top:-30px;" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
    <div class="col-md-12">
        <div style="padding: 25px;  margin-top: 40px; ">
        	<h1 class="white centerTextAlign roboto mobih" style="font-size: 2.750em; margin-bottom:5px;color:white;text-align:center;">Sell your <?php echo $_REQUEST['b']; ?> - with Recyclepro</h1>
            <p style="font-size: 15px; margin-bottom:5px;color:white;text-align:center;">Find out  your <?php echo $_REQUEST['b']; ?>   by entering your Laptop Name. </p>


            <div class="row">
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="pdetails-allinfo">



                        <div class="pdetails-description" >




                                <input style="width:80%!important;background:white!important;line-height:0px!important;" type="text" name="mob-search-field" id="mob-search-field" class="wr-search-field typeahead" placeholder="Enter Your Laptop Name" />
                                <button style="width:20%!important;background:#7bcb58!important;color:white!important;line-height:0px!important;" name="mob-search-btn" class="wr-search-btn" type="button">FIND</button>



                        </div>

                    </div>



                </div>
                <div class="col-md-3">
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
			$sql = "select * from ".WR_PRODUCT." where brand='".$_REQUEST['bid']."' and category='".$_REQUEST['pc']."'  and status='".$status."' order by sorting DESC";
			$record = $this->db->fetch_query($sql,$this->db->pdo_open());
			foreach ($record as $arr)
			{
			?>

			<div  class="col-lg-3 col-md-4 col-sm-6 col-12" onclick="document.location='sell_laptop.php?id=<?php echo $arr['id']; ?>&pc=<?php echo $_REQUEST['pc']; ?>&b=<?php echo $_REQUEST['b']; ?>'">
			<article class="hoproduct">

			        <div class="hoproduct-image text-center">
			            <a  href="sell_laptop.php?id=<?php echo $arr['id']; ?>&pc=<?php echo $_REQUEST['pc']; ?>&b=<?php echo $_REQUEST['b']; ?>" >
						<a class="hoproduct-thumb text-center" href="sell_laptop.php?id=<?php echo $arr['id']; ?>&pc=<?php echo $_REQUEST['pc']; ?>&b=<?php echo $_REQUEST['b']; ?>" >
							<img class="hoproduct-frontimage text-center" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt=" Sell <?php echo $arr['productname']; ?>">
</a>
						<a style="background-color:#13564f;" href="sell_laptop.php?id=<?php echo $arr['id']; ?>&pc=<?php echo $_REQUEST['pc']; ?>&b=<?php echo $_REQUEST['b']; ?>"><h2 style="color:#333333; font-size:12px; margin-top:20px;"><?php echo $arr['productname']; ?></h2></a>

						<a style="background-color:#13564f;" href="sell_laptop.php?id=<?php echo $arr['id']; ?>&pc=<?php echo $_REQUEST['pc']; ?>&b=<?php echo $_REQUEST['b']; ?>" class="btn btn-success btn-sm text-white" style="margin-bottom:5px;">Sell Now</a>
						</a>
					</div>

					</article>
			</div></a>

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
		<div style="background:#13564f;margin-top:-30px;" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
    <div class="col-md-12">
        <div style="padding: 25px;  margin-top: 40px; ">
        	<h1 class="white centerTextAlign roboto mobih" style="font-size: 2.750em; margin-bottom:5px;color:white;text-align:center;">Sell your <?php echo $_REQUEST['b']; ?> - <?php echo $ProCatName; ?>'s with Recyclepro</h1>
            <p style="font-size: 13px; margin-bottom:5px;color:white;text-align:center;">Find out  your <?php echo $_REQUEST['b']; ?> - <?php echo $ProCatName; ?>'s  by entering your <?php echo $ProCatName; ?> Name. </p>


            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="pdetails-allinfo">



                        <div class="pdetails-description" >




                                <!--<input style="width:80%!important;background:white!important;line-height:0px!important;" type="text" name="lap-search-field" id="lap-search-field" class="wr-search-field typeahead" placeholder="Enter Your <?php echo $ProCatName; ?> Name" />-->
                                <input style="background-color:white" type="text" name="mob-search-fields" id="mob-search-fields" class="wr-search-field typeahead" placeholder="Enter your item (Eg: Iphone 7)..." />
								<ul class="divcontact dropdown-menu src" role="listbox" style="top: 98px; left: 15px;">

								</ul>
                                <button style="width:20%!important;background:#7bcb58!important;color:white!important;line-height:0px!important;" name="mob-search-btn" class="wr-search-btn" type="button" disabled >FIND</button>



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

	<div id="mine"  class="shop-page-products mt-30">
		<div class="row no-gutters">
			<?php
			$x=1;
			$status="show";
			$sql = "select * from ".WR_PRODUCT." where brand='".$_REQUEST['bid']."' and category='".$_REQUEST['pc']."'  and status='".$status."' order by sorting DESC";
			$record = $this->db->fetch_query($sql,$this->db->pdo_open());
			foreach ($record as $arr)
			{
			?>
			<div class="col-lg-3 col-md-4 col-sm-6 col-12">
				<article class="hoproduct">
					<div class="hoproduct-image text-center">
						<a class="hoproduct-thumb text-center" href="javascript:void(0);" style="cursor:auto;">
							<img class="hoproduct-frontimage text-center" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt=" Sell <?php echo $arr['productname']; ?>">
						</a>

						<h2 style="color:#333333; font-size:12px; margin-top:20px;"><?php echo $arr['productname']; ?></h2>
						<?php
						$sql2 = "select * from ".WR_PRODUCT_PRICE." where product_id='".$arr['id']."' order by id asc";
						$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
						foreach ($record2 as $arr2)
						{
							$i;
						?>
						<a style="background-color:#13564f;"  href="product-view?name=<?php echo str_replace(' ','-',$arr['productname']);?>&pid=<?php echo $arr['id']; ?>&vid=<?php echo $arr2['variant']; ?>" class="btn btn-success btn-sm text-white" style="margin-bottom:5px;"><?php echo $this->getProductVariant($arr2['variant']); ?></a>
						<?php
						}
						?>
					</div>
				</article>
			</div>
			<?php
			}
			?>
		</div>
	</div>
	<div  id="msg" style="display:none;" class="alert alert-warning">
   if you unable to find your product then please<strong><a style="color:blue;"  href="javascript:void(Tawk_API.toggle())">click here</a></strong>to start  live chat
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
}
function getProductVariant($id){
$sql = "select model from ".WR_MODEL." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['model'];
}
function getBrandName($id,$col='brand_name'){
$sql = "select ".$col." from ".WR_BRANDS." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record[$col];
}
function ProductBreadcrums($pid,$vid){
$sql = "select * from ".WR_PRODUCT." where id='".$pid."' ";
$row = $this->db->row($sql,$this->db->pdo_open());
$brandname = $this->getBrandName($row['brand']);
$brandURL = $this->getBrandName($row['brand'],'url');
$variants = $this->getProductVariant($vid);
?>
<div class="breadcrumb-area bg-grey">
	<div class="container">
		<div class="ho-breadcrumb">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php?b=<?php echo $brandURL; ?>&bid=<?php echo $row['brand']; ?>&pc=<?php echo $row['category']; ?>"><?php echo $brandname; ?></a></li>
				<li>Sell Your <?php echo $row['productname'].'-'.$variants; ?></li>
			</ul>
		</div>
	</div>
</div>
<?php
}
function getProductAge($pa){
	if($pa == 1)
	return 'new_age';
	if($pa == 2)
	return 'middle_age';
	if($pa == 3)
	return 'old_age';
	if($pa == 4)
	return 'extinct';
}
function ProductView($pid,$vid){
$sql = "select * from ".WR_PRODUCT." where id='".$pid."' ";
$row = $this->db->row($sql,$this->db->pdo_open());
$notice= $row['notice'];
$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$pid."' and variant='".$vid."' ";
$row_p = $this->db->row($sql_p,$this->db->pdo_open());
$price = $row_p['price'];
$FLprice = $row_p['faulty_price'];
$SCprice = $row_p['scrap_price'];
$varient = $this->getProductVariant($vid);
$brandname = $this->getBrandName($row['brand']);
$product = $row['productname'];
$sql_brand = "select * from ".WR_BRANDS." where id='".$row['brand']."' ";
$row_brand = $this->db->row($sql_brand,$this->db->pdo_open());
$sql_procat = "select * from ".WR_PROCAT." where id='".$row_brand['procat']."' ";
$row_procat = $this->db->row($sql_procat,$this->db->pdo_open());
if($row_procat['category']=='Laptops'){
$network_val = "wifi";
$network_price = 0;
$storage_display = 'none';
$network_display = 'none';
}
if($row_procat['id']=='11' || $row_procat['id']=='12' || $row_brand['id']=='14' || $row_procat['id']=='14' ||$row_brand['id']=='15' ||$row_brand['id']=='16' ||$row_brand['id']=='17' || $row_brand['id']=='18' || $row_brand['id']=='19' || $row_brand['id']=='20' || $row_procat['id']=='13')
{
$network_val = "wifi";
$network_price = 0;
$storage_display = 'none';
$network_display = 'none';
}
?>

  <script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "BreadcrumbList",
"itemListElement": [{
"@type": "ListItem",
"position": "<?php echo $pid; ?>",
"name": "<?php echo $product; ?>",
"item": "http://www.recyclepro.co.uk/product-view.php?pid=<?php echo $pid; ?>&vid=<?php echo $vid; ?>"
}]
}
</script>
<script type="application/ld+json">
{
"@context": "https://schema.org/",
"@type": "Product",
"name": "<?php echo $product; ?>",
"image": "wr-m6/uploads/<?php echo $row['pro_img']; ?>",
"description": "<?php echo $product; ?>",
"sku": "3352119",
"mpn": "3352119",
"brand": {
"@type": "Brand",
"name": "<?php echo $brandname;?>",
"identifier": {
"@type": "PropertyValue",
"propertyID": "Company Number",
"value": "19937714"
}
},
"review": {
"@type": "Review",
"reviewRating": {
"@type": "Rating",
"ratingValue": "4",
"bestRating": "4"
},

"author": {
"@type": "Person",
"name": "Howard Thomas"
}
},
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "5",
"ratingCount": "2220"
},
"offers": {
"@type": "AggregateOffer",
"url": "http://www.recyclepro.co.uk/product-view?name=<?php echo str_replace(' ','-',$product); ?>&pid=<?php echo $pid; ?>&vid=<?php echo $vid; ?>",
"lowPrice": "<?php  echo $price;?>",
"highPrice": "<?php  echo $price;?>",
"priceCurrency": "GBP",
"offerCount": "3938",
"priceValidUntil": "",
"seller": {
"@type": "Organization",
"name": "RecyclePro"
}
}
}


</script>
<div class="container">

	<form name="prosell" id="procell" action="" method="post">
	<div class="pdetails">
		<div class="row">
			<div class="col-lg-12"><h1><span class="text-primary-wr text-uppercase"><?php  echo $brandname; ?></span> : <?php echo $product; ?> - <?php echo $varient; ?></h1></div>
			<!--<div class="col-lg-3">
			</div>-->
			<div class="col-lg-7">
				<div class="row">
				<div class="col-lg-4">
					<div class="pdetails-images">
						<div class="">
							<div class="pdetails-singleimage border-blue-wr">
								<img src="<?php echo BASE_FILRDIR.$row['pro_img']; ?>" alt="Sell <?php echo $product; ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="pdetails-content">
						<div class="pdetails-pricebox">
							<!--<del class="oldprice">$35.90</del>-->
							<span class="price">Offer Price: &pound;<span class="propricediv"><?php echo $price; ?></span></span>
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
									echo	$productAgeCost = $row_netwk2['price'];
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

							<?php
					$x=1;
					$c=$row_procat['category'];
						if($row_procat['category']=='Phones' || $row_procat['category']=='Tablets' || $row_brand['id']=='13'  || $row_procat['Macbook']=='Ipad'){
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
										$productAgeCost = $row_netwk2['price'];
									// echo $price=$price-$productAgeCost;
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
							}
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
												<?php echo $product; ?> <?php echo $varient; ?>
											</td>
											<td class="pro-price"><span>&pound;<span class="propricediv"><?php echo $price;  ?></span></span></td>
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
								<?php

							    if($price=='0')
							    {
							        ?>

								<div style="margin-top:3%;background-color:#eeeeee;" class="alert alert-danger">
    <strong>Alert!</strong> *Unfortunately we will not be able to make an offer on this item any longer due to its age. However we can send you a free shipping label or even get it collected and recycle it responsibly. (for collections you will have to place an order 1st and follow the instructions).
  </div>
			<?php
			}
			?>
			</div>



							<div style="margin-top:3%;" id="theDivg" class="col-lg-12">
							    <?php
							    if($row_procat['category']=='Phones')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/REC-MOB-GOOD-CON.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Tablets')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Tablet-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>"" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Laptop')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Laptop-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Smart Watch')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Smart-Watch-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Airpod')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Airpods-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='iPod')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/iPod-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='Speaker')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Speaker-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='Game console')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Gaming-Console-Good-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							</div>
								<div style="display:none;" id="theDivw" class="col-lg-12">
							 <?php
							    if($row_procat['category']=='Phones')
							    {
							    ?>
						<img  style="margin-top:3%;"  src="https://recyclepro.co.uk/images/REC-MOB-WORN-CON.jpg" alt="<?php echo $row_procat['category']; ?>" />
								<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Tablets')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Tablet-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Laptop')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Laptop-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Smart Watch')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Smart-Watch-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Airpod')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Airpods-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='iPod')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/iPods-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='Speaker')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Speaker-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='Game console')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Gaming-Console-Worn-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							</div>
								<div style="display:none;" id="theDivf" class="col-lg-12">
								 <?php
							    if($row_procat['category']=='Phones')
							    {
							    ?>
					<img   style="margin-top:3%;" src="https://recyclepro.co.uk/images/REC-MOB-FAULTY-CON.jpg" alt="<?php echo $row_procat['category']; ?>" />
									<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Tablets')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Tablet-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Laptop')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Laptop-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Smart Watch')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Smart-Watch-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							     <?php
							    if($row_procat['category']=='Airpod')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Airpods-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='iPod')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/iPods-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='Speaker')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Speaker-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
							    <?php
							    if($row_procat['category']=='Game console')
							    {
							    ?>
							<img style="margin-top:3%;" src="https://recyclepro.co.uk/images/Gaming-Console-Faulty-Condition.jpg" alt="<?php echo $row_procat['category']; ?>" />
							<?php
							    }
							    ?>
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
									<td class="text-right text-blue"> <?php echo $product; ?></td>
								</tr>
								<tr style="display:<?php echo $storage_display; ?>;">
									<th class="text-left">Storage</th>
									<td class="text-right text-blue"><?php echo $varient; ?></td>
								</tr>
								<tr style="display:<?php echo $network_display; ?>;">
									<th class="text-left">Network</th>
									<td class="text-right text-blue"><span id="nettxt">-</span></td>
								</tr>
								<tr>
									<th class="text-left">Condition</th>



	    <td class="text-right text-blue"><span id="product_condition_text">-</span></td>

								</tr>

							</tbody>



							<tfoot>

								<tr class="total-price">
									<th class="text-left">Offer Price</th>
									<td class="text-right">&pound;<span id="totalrez"><?php echo $price; ?></span></td>
								</tr>
							</tfoot>
						</table>
					</div>
<?php
				 if($brandname=="Apple" && $c=="Phones")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='iphone.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1546772237.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Apple Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your iCloud account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Apple" && $c=="Tablets")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='ipad.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1546772237.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Apple Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your iCloud account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Apple" && $c=="iPod")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='ipod.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1546772237.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Apple Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your iCloud account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Apple" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='watch.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1546772237.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Apple Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your iCloud account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>


				<?php
				 if($brandname=="Sony" && $c=="Phones")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='sony.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1546772246.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Sony Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="SONY" && $c=="Tablets")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='sonytablet.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1546772246.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Sony Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
			?>

				<?php
				 if($brandname=="One Plus")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='oneplus.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1546772276.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a One Plus Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>

				<?php
				 if($brandname=="Huawei" && $c=="Phones")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='huawei.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1568875281.png" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Huawei Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="HUAWEI" && $c=="Tablets")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='huaweitablet.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1568875281.png" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Huawei Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Huawei" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='huaweiwatch.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1568875281.png" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Huawei Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
								<?php
				 if($brandname=="Samsung" && $c=="Phones")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='samsung.php'">
						<div  style="margin-right:2%!important;" >
						<img  src="wr-m6/uploads/brand1546772254.jpg" width="90px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Samsung Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
												<?php
				 if($brandname=="SAMSUNG" && $c=="Tablets")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='samsungtablet.php'">
						<div  style="margin-right:2%!important;" >
						<img  src="wr-m6/uploads/brand1546772254.jpg" width="90px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Samsung Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
												<?php
				 if($brandname=="SAMSUNG" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='samsungwatch.php'">
						<div  style="margin-right:2%!important;" >
						<img  src="wr-m6/uploads/brand1546772254.jpg" width="90px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Samsung Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>



				<?php
				 if($brandname=="Google Pixel")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='googlepixel.php'">
						<div style="margin-right:2%!important;">
						<img src="wr-m6/uploads/brand1569411509.png" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling a Google Pixel Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please REMOVE your Google account before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Motorola" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='motorolawatch.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1570099624.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Motorola Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please Reset your Watch  before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="ALCATEL" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='alcatel.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1570100535.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an ALCATEL Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please Reset your Watch  before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Garmin" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='garmin.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1570101901.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Garmin Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please Reset your Watch  before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="Fitbit" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='fitbit.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1570181611.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Fitbit Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please Reset your Watch  before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>
				<?php
				 if($brandname=="LG" && $c=="Smart Watch")
				{
					?>
					<div style="display:flex;cursor:pointer;" class="mt-30" onclick="document.location='lgwatch.php'">
						<div style="margin-right:2%!important;">
						<img  src="wr-m6/uploads/brand1570098718.jpg" width="100px" height="60px" alt="<?php echo "Sell ".$brandname; ?>">
					</div>
					<div>
					<h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Fitbit Device?</h3>
					<p style="line-height:initial;margin-top:0px">Please Reset your Watch  before sending your device to us.</p>
				</div>
					</div>
				<?php
			}
				?>

				<?php
									if(count($_SESSION['products'])==2 OR count($_SESSION['products'])>2 )
									{
									    ?>

				<div style="padding:0%;margin-top:4%;font-size:19px;" class="alert alert-danger">
  <p style="padding-left:2%;"><strong>Alert</strong> * You can only cart 2 items at a time ! </p>
	</div>
					<?php
									}
									else
									{
									?>

										<button  class="ho-button ho-button-fullwidth mt-30 " type="submit" name="submit" value="prosubmit">
						<i class="lnr lnr-cart"></i>
						<span>Proceed to Sell</span>
						</button>
						<?php
									}
									?>

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
	<input type="hidden" value="<?php echo $network_price; ?>" name="network_price" id="network_price" required />

	<?php
	if($price>0)
	{
	    ?>
	    	<input type="hidden" value="" name="product_condition" id="product_condition" required />
	<?php
	}
	else
	{
	    ?>

	<input type="hidden" value="<?php echo 'Good'?>" name="product_condition" id="product_condition" />
	<?php
	}
	?>
	<input type="hidden" value="" name="total" id="total" required />
	</form>
</div>
<?php
//unset($_SESSION['products']);
/*echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';*/
/*$findKey = $this->search_revisions($_SESSION['products'],'15', 'pid');
print_r($findKey);*/
}
function multi_array_search($array, $search){
    // Create the result array
    $result = array();
    // Iterate over each array element
    foreach ($array as $key => $value)
    {
      // Iterate over each search condition
      foreach ($search as $k => $v)
      {
        // If the array element does not meet the search condition then continue to the next element
        if (!isset($value[$k]) || $value[$k] != $v)
        {
          continue 2;
        }
      }
      // Add the array element's key to the result array
      $result[] = $key;
    }
    // Return the result array
    return $result;
}
function AddToCart(){
extract($_REQUEST);

	if($_SESSION['products']!=''){
	$findKey = $this->multi_array_search($_SESSION['products'], array('pid' => $pid, 'vid' => $vid, 'network'=>$network, 'product_condition'=>$product_condition, 'storages'=>$storages));
	$keyval =  $findKey[0];
	}

	if($findKey){
	$xx = $_SESSION['products'][$keyval]['proqty'];
	$totxx = $_SESSION['products'][$keyval]['total'];
	$condiprice = 0;
	if($product_condition=='Faulty')
	$condiprice = $price/2;
	$temp1=($condiprice*$proqty) - $network_price;
	$_SESSION['products'][$keyval]['proqty'] = $xx+$proqty;
	$_SESSION['products'][$keyval]['total'] = $totxx+$temp1;
	}
	else{
	$_SESSION['products'][] = array('pid'=>$pid, 'vid'=>$vid, 'price'=>$price, 'proqty'=>$proqty, 'network'=>$network, 'network_price'=>$network_price, 'product_condition'=>$product_condition, 'total'=>$total, 'storages'=>$storages);
	}
	?>
	<script>window.location='cart.php';</script>
	<?php
}
function ShowCart(){
/*echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';*/
?>
			<div class="cart-page-area ptb-30 bg-white">
                <div class="container">
					<form name="procart" id="procart" action="" method="post">
                    <!-- Cart Products -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover mb-0 dks">
                            <thead>
                                <tr>
                                    <th class="cart-column-image" scope="col">PRODUCT</th>
                                    <th class="cart-column-productname" scope="col">SPECIFICATIONS</th>
                                    <th class="cart-column-price" scope="col">PRICE</th>
                                    <th class="cart-column-quantity" scope="col">QUANTITY</th>
                                    <th class="cart-column-total" scope="col">TOTAL</th>
                                    <th class="cart-column-remove" scope="col">REMOVE</th>
                                </tr>
                            </thead>
                            <tbody>
										<?php
										$x=1;
										$grandtotal=0;
										$bonus=0;
										$_SESSION['bonus']=$bonus;
										$num = count($_SESSION['products']);
										if($num>0){
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
										$net = $this->getnetVals($product['network']);
										$store=$product['storages'];
										?>
										<tr>
											<td>
												<a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-image">
													<img src="wr-m6/uploads/<?php echo $row['pro_img']; ?>" alt="Sell <?php echo $row['productname']; ?>">
												</a>
												<p><a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-title">
												<?php echo $row['productname']; ?><br />
												(<?php echo $varient.' '.$store; ?>)
												</a></p>
											</td>
											<td>
												<?php
												if($product['product_condition']!='Scrap'){
													if($row['category']=='1' || $row['category']=='2' || $row['category']=='7' || $row['category']=='8' || $row['category']=='9') {?>
												Network Fee: <?php echo $net; ?> - &pound;<?php echo $product['network_price']; ?><br />
												<?php
													}
												} ?>
												Product Condition: <?php echo $product['product_condition']; ?>
											</td>
											<td>&pound;<?php echo $product['price']; ?></td>
											<td>
												<?php echo $product['proqty']; ?>
												<input type="hidden" value="<?php echo $product['proqty']; ?>">
												<?php /*?><div class="quantity-select">
													<input type="text" value="<?php echo $product['proqty']; ?>">
													<div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
													<div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
												</div><?php */?>
											</td>
											<td>
												<span class="total-price">&pound; <?php echo $product['total']; ?></span>
											</td>
											<td>
												<button type="button" class="remove-product delcart" data-id="<?php echo $x-1; ?>"><i class="ion ion-ios-close"></i></button>
											</td>
										</tr>
										<?php
										$grandtotal=$grandtotal+$product['total'];

									if($x==2)
									{
									   if($product['price']>=50)
									   {
									      $bonus=5;
									      $_SESSION['bonus']=$bonus;
									   }
									   else
									   {
									     $bonus=0;
									     $_SESSION['bonus']=$bonus;
									   }
									}

										$x++;
									}
									}
								?>
                            </tbody>
                        </table>
                        <table style="width:100%;" class="table table-bordered table-hover mb-0 mlo">


										<?php
										$x=1;
										$grandtotal=0;
										$num = count($_SESSION['products']);
										if($num>0){
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
										$net = $this->getnetVals($product['network']);
										$store=$product['storages'];
										?>
										<tr>
										     <td class="cart-column-image" scope="col">PRODUCT</td>
											<td>
												<a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-image">
													<img src="wr-m6/uploads/<?php echo $row['pro_img']; ?>" alt="Sell <?php echo $row['productname']; ?>">
												</a>
												<p><a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-title">
												<?php echo $row['productname']; ?><br />
												(<?php echo $varient.' '.$store; ?>)
												</a></p>
											</td>
											</tr>
											<tr>
											    <td class="cart-column-image" scope="col">SPECIFICATIONS</td>
											<td>
												<?php
												if($product['product_condition']!='Scrap'){
													if($row['category']=='1' || $row['category']=='2' || $row['category']=='7' || $row['category']=='8' || $row['category']=='9' ) {?>
												Network Fee: <?php echo 'saqib' ?> - &pound;<?php echo $product['network_price']; ?><br />
												<?php
													}
												} ?>
												Product Condition: <?php echo $product['product_condition']; ?>
											</td>
											</tr>
											<tr>
											    <td class="cart-column-image" scope="col">PRICE</td>
											<td>&pound;<?php echo $product['price']; ?></td>
											</tr>
											<tr>
											     <td class="cart-column-image" scope="col">QUANTITY</td>
											<td>

												<?php echo $product['proqty']; ?>
												<input type="hidden" value="<?php echo $product['proqty']; ?>">
												<?php /*?><div class="quantity-select">
													<input type="text" value="<?php echo $product['proqty']; ?>">
													<div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
													<div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
												</div><?php */?>
											</td>
											</tr>
											<tr>
											    <td class="cart-column-image" scope="col">TOTAL</td>
											<td>
												<span class="total-price">&pound; <?php echo $product['total']; ?></span>
											</td>
											</tr>
											<tr>
											    <td class="cart-column-image" scope="col">REMOVE</td>
											<td>
												<button type="button" class="remove-product delcart" data-id="<?php echo $x-1; ?>"><i class="ion ion-ios-close"></i></button>
											</td>
										</tr>
										<?php
										$grandtotal=$grandtotal+$product['total'];
										$x++;
									}
									}
								?>

                        </table>
                    </div>
                    <!--// Cart Products -->
                    <!-- Cart Content -->
                    <div class="cart-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="cart-content-left">
                                    <div class="ho-buttongroup">
										<a href="cart.php?index=clearcart" class="ho-button ho-button-sm" style="margin-bottom:5px;"><span>Clear Cart</span></a>
                                        <?php /*?><a href="#" class="ho-button ho-button-sm">
                                            <span>Update Cart</span>
                                        </a><?php */?>
                                        <a href="/" class="ho-button ho-button-sm">
                                            <span>Continue Selling</span>
                                        </a>
                                    </div>
                                    <?php
									if(count($_SESSION['products'])==1)
									{
									    ?>

			<div style="display:flex;border:4px solid #41acff; padding:4%; margin-top:3%;">
									<img src="images/extra5.svg" width="100px" height="100px" >
									<div style="margin-left:3%;">
									<h4 style="color: #41acff;font-size: 23px;font-weight:800;margin-left:2%;">Get £5 extra!</h4>
								<p style="font-size:19px!important;color:black;font-weight:500;">Add another device over £50 and we'll give you £5 extra!</p>
								<a href="" class="ho-button ho-button-sm" style="margin-bottom:5px;"><span>Add Device</span></a>
								<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModals">Term & Conditions</button>
								</div>
									</div>
										<?php
									}

									?>


  <!-- Modal -->
  <div class="modal fade" id="myModals" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h1  style="text-align:center;"class="modal-title">Terms And Condition</h1>
        </div>
        <div class="modal-body">
          <h4>£5 extra voucher is applicable on an additional phone added to your basket with a value of greater than £50 and subject to us satisfactorily testing your device and you accepting changes if needed.</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

</div>

                                </div>


                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="cart-content-right">
                                    <h2>CART TOTALS</h2>
                                    <table class="cart-pricing-table">
                                        <tbody>
                                            <?php /*?><tr class="cart-subtotal">
                                                <th>SUBTOTAL</th>
                                                <td>$715.00</td>
                                            </tr>
                                            <tr class="cart-shipping">
                                                <th>SHIPPING</th>
                                                <td>$7.00</td>
                                            </tr><?php */?>
                                            <tr class="cart-total">
                                                <th>Total</th>

                                                <td>&pound;<?php echo $grandtotal; ?></td>
                                                </tr>
                                                <?php
									if(count($_SESSION['products'])==2)
									{
									    ?>
									    <tr class="cart-total">
                                                <th>Bonus : </th>
                                                <td>&pound;<?php echo $bonus;?></td>
                                            </tr>
                                            <tr class="cart-total">
                                                <th>Grand total : </th>
                                                <td>&pound;<?php echo $grandtotal+$bonus;?></td>
                                            </tr>
									    <?php
									}
									?>

                                        </tbody>
                                    </table>
									<?php
										if($_SESSION['userid'])
										$linkkx= 'checkout.php';
										else
										$linkkx= 'login.php';
									?>

								<?php
									if(count($_SESSION['products'])>0 )
									{
									    $d='inline-block';
									}
									else
									{
									    $d='none';
									}
									    ?>
									<a style="display:<?php echo $d;?>" href="<?php echo $linkkx; ?>"  class="ho-button">
                                        <span >Proceed to Checkout</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Cart Content -->
					</form>
                </div>
            </div>
<?php
}
function ClearCart(){
	unset($_SESSION['products']);
	?>
	<script>window.location='cart.php';</script>
	<?php
}
function CartJS(){
}
function ProductJS(){
?>
<script>
$( ".mobcondi" ).click(function() {
	var cundi = $(this).attr("data-id");
	var proprice = $(this).attr("data-val");
	$("a.ho-button-green").removeClass("ho-button-green");
   	$(this).addClass("ho-button-green");
	$("#product_condition_text").text(cundi);
	$("#product_condition").val(cundi);
	$("#price").val(proprice);
	coset();
	if(cundi == 'Good'){
		$("#pro-good").show();
		$("#pro-faulty").hide();
		$("#pro-scrap").hide();
	}
	if(cundi == 'worn'){
		$("#pro-good").hide();
		$("#pro-faulty").show();
		$("#pro-scrap").hide();
	}
	if(cundi == 'faulty'){
		$("#pro-good").hide();
		$("#pro-faulty").hide();
		$("#pro-scrap").show();
	}
});
$( ".proqtycall" ).change(function() {
	coset();
});
$( ".proqtycall" ).click(function() {
	coset();
});
$( ".netwrkval" ).click(function() {
	var netidzz = $(this).attr("data-id");
	var netvalzz = $(this).attr("data-pr");
	//var dividval = $(this).find('input').val();
	var dividval = $(this).attr("data-net-name");
	$("a.networkimgactive").removeClass("networkimgactive");
   	$(this).addClass("networkimgactive");
	$("#network").val(netidzz);
	$("#network_price").val(netvalzz);
	$("#nettxt").text(dividval);
	coset();
});
function coset() {
    var prsxx = $("#price").val();
	var newprsxx = parseInt(prsxx);
	var condixx = $("#product_condition").val();
	var proqtyxx = $("#proqty").val();
	var netprzxx = $("#network_price").val();
	if(condixx=='worn'){
		var newprsxx = $("#faultyprz").attr("data-val");
		$(".propricediv").text(newprsxx);
		totalxx = (newprsxx * proqtyxx) - (netprzxx * proqtyxx);
		if(totalxx<0){
			totalxx = 0;
		}
		$(".propricediv").text(totalxx);
		$("#totalrez").val(totalxx);
		$("#total").val(totalxx);
		document.getElementById('totalrez').innerHTML=totalxx;
		$('#theDivg').hide();
		$('#theDivf').hide();
		$('#theDivw').show();
	}
	else if(condixx=='faulty'){
		var newprsxx = $("#scrapprz").attr("data-val");
		totalxx = (newprsxx * proqtyxx);
		if(totalxx<0){
			totalxx = 0;
		}
		$(".propricediv").text(totalxx);
		$("#totalrez").val(totalxx);
		$("#total").val(totalxx);
		document.getElementById('totalrez').innerHTML=totalxx;
		$('#theDivg').hide();
		$('#theDivw').hide();
		$('#theDivf').show();
	}
	else{
		var newprsxx = $("#goodprz").attr("data-val");
		totalxx = (newprsxx * proqtyxx) - (netprzxx * proqtyxx);
		if(totalxx<0){
			totalxx = 0;
		}
		$(".propricediv").text(totalxx);
		$("#totalrez").val(totalxx);
		$("#total").val(totalxx);
		document.getElementById('totalrez').innerHTML=totalxx;
		document.getElementsByClassName("propricediv").innerHTML="s";
		$(".propricediv").html(totalxx);  //number problem solve
		$('#theDivw').hide();
		$('#theDivf').hide();
		$('#theDivg').show();
	}
}
function validationIsTrue(){
	var val1 = $("#network").val();
	var val2 = $("#network_price").val();
	var val3 = $("#product_condition").val();
	if(val1!='' && val2!='' && val3!=''){
		return true;
	}
	else{
		return false;
	}
}
$("form").submit(function() {
  if (validationIsTrue()) {
	return true;
  }
  else {
  	document.getElementById('pgerr').innerHTML='Please complete all steps.';
	return false;
  }
});
$( ".country_account" ).change(function() {
	var country_val = $("#country").val();
	if(country_val == 'GB'){
		$("#country_GB").show();
		$("#country_other").hide();
	}
	else{
		$("#country_GB").hide();
		$("#country_other").show();
	}
});
$( ".delcart" ).click(function() {
	var delpro = $(this).attr("data-id");
	var info = 'id=' + delpro;
	if(confirm("Are you sure you want to delete this item from cart?"))
	{
	$.ajax({
	   type: "POST",
	   url: "wrajax.php?index=RemoveCartItem",
	   data: info,
	   success: function(){
		   location.reload();
	 }
	});
	}
	return false;
});
</script>

<?php
}
function RemoveItemFromCart($id){
	unset($_SESSION['products'][$id]);
	$_SESSION['products'] = array_values($_SESSION['products']);
}
function CheckoutJS(){
?>
<script>
$( ".customer-country" ).change(function() {
	var countryval = $(this).val();
	if(countryval=='UK'){
	}
	else{
	}
});
</script>

<?php
}
function CheckOutAddr(){
?>
<div class="checkout-area bg-white ptb-30">

<div class="container">
		<div class="row">
			<div class="col-sm-12 mt-12">
			<h3 style="text-align: center!important;
    font-size: 30px;">How do you want to get paid?</h3>
</div>
		</div>
		<div class="row">

								<div id="b1" class="col-sm-4 mt-12" >

									<a  id="b1" >
										<div style="display:flex;border:2px solid #7bcb58; padding:10%;">
									<img src="charities/bankTransfer.jpg"  >
									<h4 style="color: #7bcb58;font-size: 15px;font-weight:600;margin-top:8%;margin-left:2%;">Bank Transfer</h4>
									</div>
								</a>


										</div>
										<div id="b2" class="col-sm-4 mt-12" >

											<a  id="b2">
												<div style="display:flex;border:2px solid #41acff; padding:10%;">
									<img src="charities/paypal.png" width="50px" height="50px" >
									<h4 style="color: #41acff;font-size: 15px;font-weight:600;margin-top:8%;margin-left:2%;">PayPal</h4>
									</div>
									</a>
								</div>

										<div id="b4" class="col-sm-4 mt-12"  >
											<a id="b4">
												<div style="display:flex;border:2px solid #da7f8f; padding:10%;">
									<img src="charities/charity.jpg" >
									<h4 style="color:#da7f8f;font-size: 15px;font-weight:600;margin-top:8%;margin-left:2%;">Donate to Charity</h4>
								</div>
									</a>
										</div>

							</div>
							<div id="one">
		<form action="" class="billing-info" method="post" >
			<div class="row">
				<!-- Billing Details -->
			<?php
						$sql_usr	=	"select * from ".WR_USER." where id='".$_SESSION['userid']."'";
		$detail = $this->db->row($sql_usr,$this->db->pdo_open());
?>
				<div class="col-lg-6">
					<h3 class="small-title">How do you want to get paid?</h3>

					<div class="ho-form">
						<div class="ho-form-inner">
							<h3 style="color: #41acff;font-size: 29px;font-weight:600;margin-top:4%;">Bank Transfer</h3>

							<img style="width:300px;height:200px;" src="charities/act.jpg">
								<p style="color: #666;font-weight:400;font-size:13px;text-align:justify;">Choose our super easy Bank Transfer option to receive the money directly into your account.</p>
							<p style="color: #666;font-weight:400;font-size:13px;text-align:justify;"><strong>we pay same day we receive item and your cash clears instantly</strong></p>
							<div class="single-input">
								<label for="country">Country *</label>
								<select name="country" id="country" required class="country_account">
									<option value="GB" selected="selected">United Kingdom (UK)</option>
									<option value="US">United States (US)</option>
									<option value="AU">Australia</option>
									<option value="AT">Austria</option>
									<option value="BD">Bangladesh</option>
									<option value="BE">Belgium</option>
									<option value="CA">Canada</option>
									<option value="DK">Denmark</option>
									<option value="FR">France</option>
									<option value="IT">Italy</option>
								</select>
							</div>
							<div class="single-input">
								<label for="full_name">Full Name *</label>
								<input type="text" name="full_name" id="full_name" value="<?php echo $detail['fname'].' '.$detail['lname']; ?>">
							</div>

							<div class="single-input">
								<label for="account_no">Account Number *</label>
								<input type="text" maxlength="8" minlength="8"
    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="account_no" id="account_no" required>
							</div>
						</div>
					</div>
							<div id="country_GB">
								<div class="row">
									<div class="col-sm-12 mt-10">
										<label for="sort_code">Sort Code *</label>
										<input type="text" maxlength="6" minlength="6"
    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  name="sort_code" id="sort_code" required>
									</div>
								</div>
							</div>
							<div id="country_other" style="display:none;">
								<div class="row">
									<div class="col-sm-12 mt-10">
										<label for="bank_name">Bank Name</label>
										<input type="text" name="bank_name" id="bank_name">
									</div>
									<div class="col-sm-6 mt-10">
										<label for="extra">Account Code Type</label>
										<select name="extra" id="extra" >
											<option value="IBN Number" selected="selected">IBN Number</option>
											<option value="Swift Code">Swift Code</option>
										</select>
									</div>
									<div class="col-sm-6 mt-10">
										<label for="extra_val">&nbsp;</label>
										<input type="text" name="extra_val" id="extra_val">
									</div>
								</div>
							</div>
						</div>


				<!--// Billing Details -->
				<!-- Place Order -->
				<div class="col-lg-6">
					<div class="order-infobox">
						<h3 class="small-title">YOUR ORDER</h3>
						<div class="checkout-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="text-left">PRODUCT</th>
										<th class="text-right">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$grandtotal=0;
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
									?>
									<tr>
										<td class="text-left">
										<?php echo $brandname.' - '.$row['productname']; ?><br />
										<?php echo $varient; ?>
										<span>&times; <?php echo $product['proqty']; ?></span>
										</td>
										<td class="text-right">&pound;<?php echo $product['total']; ?></td>
									</tr>
									<?php
										$grandtotal=$grandtotal+$product['total']+$bonus;
										}
									?>
								</tbody>
								<tfoot>
									<?php /*?><tr>
										<th class="text-left">CART SUBTOTAL</th>
										<td class="text-right">&pound; <?php echo $grandtotal; ?></td>
									</tr>
									<tr>
										<th class="text-left">SHIPPING</th>
										<td class="text-right">Flat Rate: $7.00</td>
									</tr><?php */?>
									<tr class="total-price">
										<th class="text-left">CART TOTAL</th>
										<td class="text-right">&pound;<?php echo $grandtotal+$_SESSION['bonus']; ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<?php /*?><div class="payment-method">
							<div class="check-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-1"
									class="ho-radio" checked="checked">
								<label for="checkout-payment-method-1">Cheque Payment</label>
								<p>Please send your cheque to Store Name, Store Street, Store Town, Store
									State / County, Store Postcode.</p>
							</div>
							<div class="paypal-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-2"
									class="ho-radio">
								<label for="checkout-payment-method-2">Paypal Payment</label>
								<p>Pay via PayPal; you can pay with your credit card if you don�t have a
									PayPal account.</p>
							</div>
						</div><?php */?>
						<input type="hidden" name="carttotal" id="carttotal" value="<?php echo $grandtotal; ?>" />
						<button class="ho-button ho-button-fullwidth mt-30" type="submit" name="proceed1" value="proceedsbt1">
							<span>Proceed</span>
						</button>
					</div>
				</div>
				<!--// Place Order -->
			</div>
		</form>
	</div>
	<div id="two">
		<form action="" class="billing-info" method="post" >
			<div class="row">
				<!-- Billing Details -->
			<?php
						$sql_usr	=	"select * from ".WR_USER." where id='".$_SESSION['userid']."'";
		$detail = $this->db->row($sql_usr,$this->db->pdo_open());
		$fulladdress=$detail['address1'].','.$detail['address2'].','.$detail['postcode'];
			$sql_pyl	=	"select distinct(paypal_email) from wr_order_address where user_id='".$_SESSION['userid']."'";
		$dtl = $this->db->row($sql_pyl,$this->db->pdo_open());
?>
				<div class="col-lg-6">
					<h3 class="small-title">How do you want to get paid?</h3>

					<div class="ho-form">
						<div class="ho-form-inner">
							<h3 style="color: #41acff;font-size: 29px;font-weight:600;margin-top:4%;">Paypal</h3>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;">Get paid quickly and securely via PayPal! Just enter your PayPal ID below and we'll deposit your cash directly to your PayPal account same day we receive your stuff.</p>
<input type="hidden" name="country" id="country" value="GB">
<input type="hidden" name="full_name" id="full_name" value="<?php echo $detail['fname'].' '.$detail['lname']; ?>">
							<div class="single-input">
								<label for="account_no">Enter Paypal Email *</label>
								<input type="text" name="paypal" id="paypal"  value="<?php echo $dtl['paypal_email'];?>" required >
							</div>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;"><strong>Please check your PayPal email address is correct before proceeding.</strong></p>
						</div>
					</div>
				</div>


				<!--// Billing Details -->
				<!-- Place Order -->
				<div class="col-lg-6">
					<div class="order-infobox">
						<h3 class="small-title">YOUR ORDER</h3>
						<div class="checkout-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="text-left">PRODUCT</th>
										<th class="text-right">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$grandtotal=0;
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
									?>
									<tr>
										<td class="text-left">
										<?php echo $brandname.' - '.$row['productname']; ?><br />
										<?php echo $varient; ?>
										<span>&times; <?php echo $product['proqty']; ?></span>
										</td>
										<td class="text-right">&pound;<?php echo $product['total']; ?></td>
									</tr>
									<?php
										$grandtotal=$grandtotal+$product['total']+$bonus;
										}
									?>
								</tbody>
								<tfoot>
									<?php /*?><tr>
										<th class="text-left">CART SUBTOTAL</th>
										<td class="text-right">&pound; <?php echo $grandtotal; ?></td>
									</tr>
									<tr>
										<th class="text-left">SHIPPING</th>
										<td class="text-right">Flat Rate: $7.00</td>
									</tr><?php */?>
									<tr class="total-price">
										<th class="text-left">CART TOTAL</th>
										<td class="text-right">&pound;<?php echo $grandtotal+$_SESSION['bonus']; ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<?php /*?><div class="payment-method">
							<div class="check-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-1"
									class="ho-radio" checked="checked">
								<label for="checkout-payment-method-1">Cheque Payment</label>
								<p>Please send your cheque to Store Name, Store Street, Store Town, Store
									State / County, Store Postcode.</p>
							</div>
							<div class="paypal-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-2"
									class="ho-radio">
								<label for="checkout-payment-method-2">Paypal Payment</label>
								<p>Pay via PayPal; you can pay with your credit card if you don�t have a
									PayPal account.</p>
							</div>
						</div><?php */?>
						<input type="hidden" name="carttotal" id="carttotal" value="<?php echo $grandtotal; ?>" />
						<button class="ho-button ho-button-fullwidth mt-30" type="submit" name="proceed1" value="proceedsbt1">
							<span>Proceed</span>
						</button>
					</div>
				</div>
				<!--// Place Order -->
			</div>
		</form>
	</div>
	<div id="three">
		<form action="" class="billing-info" method="post" >
			<div class="row">
				<!-- Billing Details -->
			<?php
						$sql_usr	=	"select * from ".WR_USER." where id='".$_SESSION['userid']."'";
		$detail = $this->db->row($sql_usr,$this->db->pdo_open());

?>
				<div class="col-lg-6">
					<h3 class="small-title">How do you want to get paid?</h3>
					<input type="hidden" name="country" id="country" value="GB">
<input type="hidden" name="full_name" id="full_name" value="<?php echo $detail['fname'].' '.$detail['lname']; ?>">
<input type="hidden" name="addr" id="addr" value="<?php echo $detail['address1'].','.$detail['address2'].','.$detail['postcode']; ?>">
					<div class="ho-form">
						<div >
							<h3 style="color: #41acff;font-size: 29px;font-weight:600;">Cheque</h3>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;">We'll send a cheque made payable to the name on your account on the day your items arrive.</p>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;"><strong>Please note: if you want to get paid faster, we recommend Bank Transfer or PayPal!</strong></p>
							<h3 style="color: #41acff;font-size: 19px;font-weight:600;">You Detail</h3>

							<p style="color:black;font=size:15px;font-weight:600">NAME ON CHEQUE - <?php echo $detail['fname'].' '.$detail['lname']; ?> <button style="line-height:1px!important;height:23px!important;font-size:13px;"  type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal"> Edit</button></p>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;">Your cheque will be made payable to this name.</p>

							<p style="color:black;font=size:15px;font-weight:600">ADDRESS - <?php echo $detail['address1'].','.$detail['address2'].','.$detail['postcode']; ?> <button style="line-height:1px!important;height:23px!important;font-size:13px;" type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1">Edit</button></p>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;">We'll post your cheque to the address above.</p>
						</div>
					</div>
				</div>

			<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 style="text-align:center;" class="modal-title">Personal Information</h4>
        </div>
        <div class="modal-body">
          <form action="" class="ho-form" method="post">
			<div class="ho-form-inner">

					<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['userid']; ?>" required>

				<div class="single-input ">
					<label for="account-details-firstname">First Name*</label>

					<input type="text" id="fname" name="fname" value="<?php echo $detail['fname']; ?>" required>
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Last Name*</label>
					<input type="text" id="lname" name="lname" value="<?php echo $detail['lname']; ?>" required>
				</div>
				<div class="single-input">
					<a style="color:white!important;" href="" type="button" class="btn btn-info btn-md"  onclick="insert()" >Update</a>
				</div>
				</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 style="text-align:center;" class="modal-title">Address Information</h4>
        </div>
        <div class="modal-body">
          <form action="" class="ho-form" method="post">
			<div class="ho-form-inner">

					<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['userid']; ?>" required>

				<div class="single-input ">
					<label for="account-details-firstname">Address 1*</label>
					<input type="text" id="addr1" name="addr1" value="<?php echo $detail['address1']; ?>" required>
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Address 2*</label>
					<input type="text" id="addr2" name="addr2" value="<?php echo $detail['address2']; ?>" >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Post Code*</label>
					<input type="text" id="pcode" name="pcode" value="<?php echo $detail['postcode']; ?>" required>
				</div>
				<div class="single-input">
					<a style="color:white!important;" href="" type="button" class="btn btn-info btn-md" onclick="insertaddresses()">Update</a>
				</div>
				</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
</div>
				<!--// Billing Details -->
				<!-- Place Order -->
				<div class="col-lg-6">
					<div class="order-infobox">
						<h3 class="small-title">YOUR ORDER</h3>
						<div class="checkout-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="text-left">PRODUCT</th>
										<th class="text-right">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$grandtotal=0;
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
									?>
									<tr>
										<td class="text-left">
										<?php echo $brandname.' - '.$row['productname']; ?><br />
										<?php echo $varient; ?>
										<span>&times; <?php echo $product['proqty']; ?></span>
										</td>
										<td class="text-right">&pound;<?php echo $product['total']; ?></td>
									</tr>
									<?php
										$grandtotal=$grandtotal+$product['total']+$bonus;
										}
									?>
								</tbody>
								<tfoot>
									<?php /*?><tr>
										<th class="text-left">CART SUBTOTAL</th>
										<td class="text-right">&pound; <?php echo $grandtotal; ?></td>
									</tr>
									<tr>
										<th class="text-left">SHIPPING</th>
										<td class="text-right">Flat Rate: $7.00</td>
									</tr><?php */?>
									<tr class="total-price">
										<th class="text-left">CART TOTAL</th>
										<td class="text-right">&pound;<?php echo $grandtotal+$_SESSION['bonus'];?></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<?php /*?><div class="payment-method">
							<div class="check-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-1"
									class="ho-radio" checked="checked">
								<label for="checkout-payment-method-1">Cheque Payment</label>
								<p>Please send your cheque to Store Name, Store Street, Store Town, Store
									State / County, Store Postcode.</p>
							</div>
							<div class="paypal-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-2"
									class="ho-radio">
								<label for="checkout-payment-method-2">Paypal Payment</label>
								<p>Pay via PayPal; you can pay with your credit card if you don�t have a
									PayPal account.</p>
							</div>
						</div><?php */?>
						<input type="hidden" name="carttotal" id="carttotal" value="<?php echo $grandtotal; ?>" />
						<button class="ho-button ho-button-fullwidth mt-30" type="submit" name="proceed1" value="proceedsbt1">
							<span>Proceed</span>
						</button>
					</div>
				</div>
				<!--// Place Order -->
			</div>
		</form>
	</div>
	<div id="four">
		<form action="" class="billing-info" method="post" >
			<div class="row">
				<!-- Billing Details -->
			<?php
						$sql_usr	=	"select * from ".WR_USER." where id='".$_SESSION['userid']."'";
		$detail = $this->db->row($sql_usr,$this->db->pdo_open());
?>
				<div class="col-lg-6">
					<h3 class="small-title">How do you want to get paid?</h3>

					<div class="ho-form">
						<div class="ho-form-inner">
							<?php
						$sql_usr	=	"select * from ".WR_USER." where id='".$_SESSION['userid']."'";
		$detail = $this->db->row($sql_usr,$this->db->pdo_open());
?>
<h3 style="color: #41acff;font-size: 29px;font-weight:600;margin-top:4%;">Donate to Charity</h3>
							<p style="color: #666;font-weight:400;font-size:15px;text-align:justify;">If you’d like your payment in the form of a charitable donation then it’s really simple to do; we work with some great charities who do an amazing job for a diverse range of causes.</p>

							<div class="row">
								<div class="col-sm-3 mt-12">
									<img src="charities/mcs.jpg" alt="mcs">
										</div>
										<div class="col-sm-3 mt-12">
									<img src="charities/bhf.jpg" alt="bhf">
										</div>
										<div class="col-sm-3 mt-12">
									<img src="charities/cru.jpg" alt="cru">
										</div>
										<div class="col-sm-3 mt-12">
									<img src="charities/wwf.jpg" alt="wwf">
										</div>
							</div>
							<div class="row">
								<div class="col-sm-3 mt-12">
									<img src="charities/RSPCA.png" alt="RSPCA">
										</div>
										<div class="col-sm-3 mt-12">
									<img src="charities/oi.jpg" alt="oi">
										</div>
										<div class="col-sm-3 mt-12">
									<img src="charities/goshc.jpg" alt="goshc">
										</div>
										<div class="col-sm-3 mt-12">

										</div>
							</div>
							<p style="color: #666;font-weight:400;font-size:13px;text-align:justify;margin-top:2%;"><strong>Once you’ve made your selection from the dropdown menu, simply click 'Proceed'.</strong></p>
<input type="hidden" name="country" id="country" value="GB">
<input type="hidden" name="full_name" id="full_name" value="<?php echo $detail['fname'].' '.$detail['lname']; ?>">
							<div class="single-input">
								<label for="account_no">Select Your Charity *</label>
								<select type="text" name="charity" id="char" required>
									<option value="">Please Select</option>
									<option value="Macmillan Cancer Support">Macmillan Cancer Support</option>
									<option value="Great Ormand Street">Great Ormand Street</option>
									<option value="British Heart Foundation">British Heart Foundation</option>
									<option value="Cancer Research Uk">Cancer Research Uk</option>
									<option value="WWF">WWF</option>
									<option value="RSPCA">RSPCA</option>
									<option value="OXFAM">OXFAM</option>
									<option value=" ">Other</option>
								</select>

							</div>
							<div id="chr" class="single-input">
								<label for="full_name">Desired Charity *</label>
								<input  type="text" name="charity_name" id="charity_name">
							</div>
						</div>
				</div>
			</div>




				<!--// Billing Details -->
				<!-- Place Order -->
				<div class="col-lg-6">
					<div class="order-infobox">
						<h3 class="small-title">YOUR ORDER</h3>
						<div class="checkout-table table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th class="text-left">PRODUCT</th>
										<th class="text-right">TOTAL</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$grandtotal=0;
										foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
									?>
									<tr>
										<td class="text-left">
										<?php echo $brandname.' - '.$row['productname']; ?><br />
										<?php echo $varient; ?>
										<span>&times; <?php echo $product['proqty']; ?></span>
										</td>
										<td class="text-right">&pound;<?php echo $product['total']; ?></td>
									</tr>
									<?php
										$grandtotal=$grandtotal+$product['total']+$bonus;
										}
									?>
								</tbody>
								<tfoot>
									<?php /*?><tr>
										<th class="text-left">CART SUBTOTAL</th>
										<td class="text-right">&pound; <?php echo $grandtotal; ?></td>
									</tr>
									<tr>
										<th class="text-left">SHIPPING</th>
										<td class="text-right">Flat Rate: $7.00</td>
									</tr><?php */?>
									<tr class="total-price">
										<th class="text-left">CART TOTAL</th>
										<td class="text-right">&pound;<?php echo $grandtotal+$_SESSION['bonus']; ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
						<?php /*?><div class="payment-method">
							<div class="check-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-1"
									class="ho-radio" checked="checked">
								<label for="checkout-payment-method-1">Cheque Payment</label>
								<p>Please send your cheque to Store Name, Store Street, Store Town, Store
									State / County, Store Postcode.</p>
							</div>
							<div class="paypal-payment">
								<input type="radio" name="payment-method" id="checkout-payment-method-2"
									class="ho-radio">
								<label for="checkout-payment-method-2">Paypal Payment</label>
								<p>Pay via PayPal; you can pay with your credit card if you don�t have a
									PayPal account.</p>
							</div>
						</div><?php */?>
						<input type="hidden" name="carttotal" id="carttotal" value="<?php echo $grandtotal; ?>" />
						<button class="ho-button ho-button-fullwidth mt-30" type="submit" name="proceed1" value="proceedsbt1">
							<span>Proceed</span>
						</button>
					</div>
				</div>
				<!--// Place Order -->
			</div>
		</form>
	</div>
	</div>
</div>
<script>
 	$('#two').hide();
        $('#three').hide();
        $('#four').hide();
            $('#b1').on('click', function() {
        $('#one').show();
        $('#two').hide();
        $('#three').hide();
        $('#four').hide();
    });
    $('#b2').on('click', function() {
        $('#one').hide();
        $('#two').show();
        $('#three').hide();
        $('#four').hide();
    });
    $('#b3').on('click', function() {
        $('#one').hide();
        $('#two').hide();
        $('#three').show();
        $('#four').hide();
    });
    $('#b4').on('click', function() {
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        $('#four').show();
    });
                </script>
                 <script>
function insert(){
	var id = $('#id').val();
	var fname = $('#fname').val();
	var lname= $('#lname').val();
	var datas="&id="+id+"&fname="+fname+"&lname="+lname;
   $.ajax({
       type: "POST",
       url: "update_personal.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
  location.reload();
});
    }

     function insertaddresses(){
	var id = $('#id').val();
	var addr1 = $('#addr1').val();
	var addr2= $('#addr2').val();
	var pcode= $('#pcode').val();
	var datas="&id="+id+"&addr1="+addr1+"&addr2="+addr2+"&pcode="+pcode;
   $.ajax({
       type: "POST",
       url: "update_addresses.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
 location.reload();
});
    }
</script>

<script>
$("#chr").hide();
$(document).ready(function(){
	 $('#char').on('change', function() {
      if ( this.value == ' ')
      {
        $("#chr").show();
      }
      else if ( this.value != '')
      {
        $("#chr").hide();
        $("#charity_name").val("");
      }
      else
      {
        $("#chr").hide();
}
    });
});

</script>
<?php
}
function CheckOutAddrSBT(){

	extract($_REQUEST);
	$user_id=$_SESSION['userid'];
	if($country=='GB')
	$shipping=SHIPPING_IN_UK;
	else
	$shipping=SHIPPING_OUTSIDE;
	$g_total=$carttotal+$shipping;
	$shipping_status='Not Done';
	$payment_status='Approval Pending';
	$order_status='Cart';
	$insert_sql_array=array();
	$insert_sql_array['user_id'] = $user_id;
	if($carttotal!='')
	$insert_sql_array['total'] = $carttotal;
	if($shipping!='')
	$insert_sql_array['shipping'] = $shipping;
	if($g_total!='')
	$insert_sql_array['g_total'] = $g_total+$_SESSION['bonus'];
	$insert_sql_array['shipping_status'] = $shipping_status;
	$insert_sql_array['payment_status'] = $payment_status;
	$insert_sql_array['order_status'] = $order_status;
	$insert_sql_array['label'] = "";
	$id=$this->db->pdoinsert(WR_ORDER,$insert_sql_array);
	foreach($_SESSION['products'] AS $product){
		$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
		$row = $this->db->row($sql,$this->db->pdo_open());
		$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
		$row_p = $this->db->row($sql_p,$this->db->pdo_open());
		$varient = $this->getProductVariant($product['vid']);
		$brandname = $this->getBrandName($row['brand']);
		$store=$product['storages'];
		$insert_sql_array2=array();
		$insert_sql_array2['order_id'] = $id;
		$insert_sql_array2['user_id'] = $user_id;
		$insert_sql_array2['pid'] = $product['pid'];
		$insert_sql_array2['vid'] = $product['vid'];
		$insert_sql_array2['p_condition'] = $product['product_condition'];
		$insert_sql_array2['network'] = $product['network'];
		$insert_sql_array2['network_price'] = $product['network_price'];
		$insert_sql_array2['qty'] = $product['proqty'];
		$insert_sql_array2['price'] = $product['price'];
		$insert_sql_array2['total'] = $product['total'];
		$insert_sql_array2['product_name'] = $row['productname'];
		$insert_sql_array2['varient_name'] = $varient.','.$store;
		$id2=$this->db->pdoinsert(WR_ORDER_DETAIL,$insert_sql_array2);
	}
	$insert_sql_array3=array();
	$insert_sql_array3['user_id'] = $user_id;
	$insert_sql_array3['order_id'] = $id;
	/*$insert_sql_array3['f_name'] = $f_name;
	$insert_sql_array3['l_name'] = $l_name;
	$insert_sql_array3['company'] = $company;
	$insert_sql_array3['email'] = $email;
	$insert_sql_array3['phone'] = $phone;
	$insert_sql_array3['address1'] = $address1;
	$insert_sql_array3['address2'] = $address2;
	$insert_sql_array3['state'] = $state;
	$insert_sql_array3['zip'] = $zip;*/
	$insert_sql_array3['country'] = $country;

	if($full_name)
	$insert_sql_array3['full_name'] = $full_name;
	if($account_no)
	$insert_sql_array3['account_no'] = $account_no;
	if($sort_code)
	$insert_sql_array3['sort_code'] = $sort_code;
	if($bank_name)
	$insert_sql_array3['bank_name'] = $bank_name;
	if($extra)
	$insert_sql_array3['extra'] = $extra;
	if($extra_val)
	$insert_sql_array3['extra_val'] = $extra_val;
	if($paypal)
	$insert_sql_array3['paypal_email'] = $paypal;
if($charity)
	$insert_sql_array3['charity_name'] = $charity.' '.$charity_name;;
	if($addr)
	$insert_sql_array3['addr'] = $addr;
	$id3=$this->db->pdoinsert(WR_ORDER_ADDRESS,$insert_sql_array3);
	?>
	<script>window.location='checkout.php?chk=1&oid=<?php echo $id; ?>';</script>
	<?php
}
function CheckOut(){
extract($_REQUEST);
/*echo '<pre>';
print_r($_SESSION['products']);
echo '</pre>';*/
?>
			<div class="cart-page-area ptb-30 bg-white">
                <div class="container">
					<form name="procart" id="procart" action="" method="post">
                    <!-- Cart Products -->
					<h2>Confirm and Place Order</h2>
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th class="cart-column-image" scope="col">PRODUCT</th>
                                    <th class="cart-column-productname" scope="col">SPECIFICATIONS</th>
                                    <th class="cart-column-price" scope="col">PRICE</th>
                                    <th class="cart-column-quantity" scope="col">QUANTITY</th>
                                    <th class="cart-column-total" scope="col">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
								<?php
									$x=1;
									$grandtotal=0;
									$num = count($_SESSION['products']);
									if($num>0){
									foreach($_SESSION['products'] AS $product){
										$sql = "select * from ".WR_PRODUCT." where id='".$product['pid']."' ";
										$row = $this->db->row($sql,$this->db->pdo_open());
										$sql_p = "select * from ".WR_PRODUCT_PRICE." where product_id='".$product['pid']."' and variant='".$product['vid']."' ";
										$row_p = $this->db->row($sql_p,$this->db->pdo_open());
										$varient = $this->getProductVariant($product['vid']);
										$brandname = $this->getBrandName($row['brand']);
										$net = $this->getnetVals($product['network']);
										?>
										<tr>
											<td>
												<a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-image">
													<img src="wr-m6/uploads/<?php echo $row['pro_img']; ?>" alt="Sell <?php echo $row['productname']; ?>">
												</a>
												<p><a href="product-view.php?pid=<?php echo $product['pid']; ?>&vid=<?php echo $product['vid']; ?>" class="product-title">
												<?php echo $row['productname']; ?><br />
												(<?php echo $varient; ?>)
												</a></p>
											</td>
											<td>
												Network: <?php echo $net; ?> (- &pound;<?php echo $product['network_price']; ?>)<br />
												Product Condition: <?php echo $product['product_condition']; ?> <?php if($product['product_condition']=='Good') echo '(No deduction in price)'; else { echo '50% deduction in product price.'; } ?>
											</td>
											<td>&pound;<?php echo $product['price']; ?></td>
											<td>
												<div class="quantity-select">
													<input type="text" value="<?php echo $product['proqty']; ?>">
													<div class="inc qtybutton">+<i class="ion ion-ios-arrow-up"></i></div>
													<div class="dec qtybutton">-<i class="ion ion-ios-arrow-down"></i></div>
												</div>
											</td>
											<td>
												<span class="total-price">&pound;<?php echo $product['total']+$bonus; ?></span>
											</td>
										</tr>
										<?php

						/*$cpn	=	"select * from ".WR_USER." where id='".$_SESSION['userid']."' AND WHERE DATE(timestamp) = '2022-06-01'";
		$counters = $this->db->row($cpn,$this->db->pdo_open());
		if(!empty($counters && $product['price'] > 50))
		{
		  $grandtotal=$grandtotal+$product['total']+5;
		}
		else
		{
		   $grandtotal=$grandtotal+$product['total'];
		}*/
									$grandtotal=$grandtotal+$product['total'];
										$x++;
									}
									}
								?>
                            </tbody>
                        </table>
                    </div>
                    <!--// Cart Products -->
                    <!-- Cart Content -->
                    	<div class="row">
											<div style="margin-top:4%;" class="col-lg-12">
							<div class="alert alert-danger">
    <strong>Alert!</strong> *Please select the condition of your device carefully, if it does not match while being checked by our technicians, your evaluation could be revised and shipping charges will occur in case you decide to cancel the order.
  </div>
  </div>
  </div>
                    <div class="cart-content">
                        <div class="row justify-content-between">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="cart-content-left">
                                    <div class="ho-buttongroup">
										<h3>Payment Detail:</h3>
										<?php
											$sql = "select * from ".WR_ORDER." where id='".$oid."' ";
											$row = $this->db->row($sql,$this->db->pdo_open());
											$sql2 = "select * from ".WR_ORDER_ADDRESS." where order_id='".$oid."' ";
											$record = $this->db->row($sql2,$this->db->pdo_open());
										?>

										<table class="table table-bordered table-hover mb-0">
										<tbody>
											<tr>
												<td><strong>Name:</strong> <?php echo $record['full_name']; ?></td>
												<td><strong>Country:</strong> <?php echo $record['country']; ?></td>
											</tr>
											<tr>
												<td colspan="2"><strong>Account Number:</strong> <?php echo $record['account_no']; ?></td>
											</tr>
											<?php if($record['country']=="GB") {?>
											<tr>
												<td colspan="2"><strong>Sort Code:</strong> <?php echo $record['sort_code']; ?></td>
											</tr>
											<?php
											}
											else{
											?>
											<tr>
												<td><strong>Bank Name:</strong> <?php echo $record['bank_name']; ?></td>
												<td><strong><?php echo $record['extra']; ?>:</strong>  <?php echo $record['extra_val']; ?></td>
											</tr>
											<?php
											}
											?>
											<tr>
												<td colspan="2"><strong>Paypal_Email:</strong> <?php echo $record['paypal_email']; ?></td>
											</tr>
											<tr>
												<td colspan="2"><strong>Charity Name:</strong> <?php echo $record['charity_name']; ?></td>
											</tr>
											<tr>
												<td colspan="2"><strong>Cheque Address:</strong> <?php echo $record['addr']; ?></td>
											</tr>
										</tbody>
										</table>
                                    </div>
                                    <?php /*?><div class="cart-content-coupon">
                                        <h6>COUPON</h6>
                                        <p>Enter your coupon code if you have one.</p>
                                        <form action="#" class="coupon-form">
                                            <input type="text" placeholder="Coupon code">
                                            <button class="ho-button">
                                                <span>Apply Coupon</span>
                                            </button>
                                        </form>
                                    </div><?php */?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="cart-content-right">
                                    <h2>CART TOTALS</h2>
                                    <table class="cart-pricing-table">
                                        <tbody>
                                            <?php /*?><tr class="cart-subtotal">
                                                <th>CART SUBTOTAL</th>
                                                <td>&pound; <?php echo $grandtotal; ?></td>
                                            </tr><?php */?>
                                            <?php /*?><tr class="cart-shipping">
                                                <th>SHIPPING</th>
                                                <td>&pound; <?php echo $row['shipping']; ?></td>
                                            </tr><?php */?>
                                            <tr class="cart-total">
                                                <th>Total</th>
                                                <td>&pound;<?php echo $grandtotal+$row['shipping']+$_SESSION['bonus']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
									<?php
										if($_SESSION['userid'])
										$linkkx= 'checkout.php?chk=2&oid='.$oid;
										else
										$linkkx= 'login.php';
									?>
									<!--<input type="checkbox" id="vehicle1" name="vehicle1" value="agree">
  <label for="vehicle1"> Agree On This Terms And Condition</label><br>-->
									<a href="<?php echo $linkkx; ?>" id="chk" class="ho-button">
                                        <span>Confirm Order</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Cart Content -->
					</form>
                </div>
            </div>
            <?php
            if($brandname=="Apple")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="iphone.php"><img  src="wr-m6/uploads/brand1546772237.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="iphone.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Apple Device?</h3></a>
					<a style="text-decoration:none!important;" href="iphone.php"><p style="line-height:initial;margin-top:9px;color:black;">Please REMOVE your iCloud account before sending your device to us.</p></a>
				</div>
					</div>';
				}


            else if($brandname=="Sony")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="sony.php"><img  src="wr-m6/uploads/brand1546772246.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="sony.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Sony Device?</h3></a>
					<a style="text-decoration:none!important;" href="sony.php"><p style="line-height:initial;margin-top:9px;color:black">Please REMOVE your Google account before sending your device to us.</p></a>
				</div>
					</div>';
				}
            else if($brandname=="One Plus")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="oneplus.php"><img  src="wr-m6/uploads/brand1546772276.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="oneplus.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an One Plus Device?</h3></a>
					<a style="text-decoration:none!important;" href="oneplus.php"><p style="line-height:initial;margin-top:9px;color:black">Please REMOVE your Google account before sending your device to us.</p></a>
				</div>
					</div>';
				}

				else if($brandname=="Huawei")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="huawei.php"><img  src="wr-m6/uploads/brand1568875281.png" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="huawei.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Huawei Device?</h3></a>
					<a style="text-decoration:none!important;" href="huawei.php"><p style="line-height:initial;margin-top:9px;color:black">Please REMOVE your Google account before sending your device to us.</p></a>
				</div>
					</div>';
				}

				else if($brandname=="Samsung")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="samsung.php"><img  src="wr-m6/uploads/brand1546772254.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="samsung.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Samsung Device?</h3></a>
					<a style="text-decoration:none!important;" href="samsung.php"><p style="line-height:initial;margin-top:9px;color:black">Please REMOVE your Google account before sending your device to us.</p></a>
				</div>
					</div>';
				}
				else if($brandname=="Google Pixel")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="googlepixel.php"><img  src="wr-m6/uploads/brand1569411509.png" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="googlepixel.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Google Pixel Device?</h3></a>
					<a style="text-decoration:none!important;"  href="googlepixel.php"><p style="line-height:initial;margin-top:9px;color:black;">Please REMOVE your Google account before sending your device to us.</p></a>
				</div>
					</div>';
				}
				else if($brandname=="Motorola")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="motorolawatch.php"><img  src="wr-m6/uploads/brand1570099624.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="motorolawatch.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Motorola Device?</h3></a>
					<a style="text-decoration:none!important;"  href="motorolawatch.php"><p style="line-height:initial;margin-top:9px;color:black;">Please Reset your Watch  before sending your device to us.</p></a>
				</div>
					</div>';
				}
			else if($brandname=="ALCATEL")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="alcatel.php"><img  src="wr-m6/uploads/brand1570100535.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="alcatel.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an ALCATEL Device?</h3></a>
					<a style="text-decoration:none!important;"  href="alcatel.php"><p style="line-height:initial;margin-top:9px;color:black;">Please Reset your Watch  before sending your device to us.</p></a>
				</div>
					</div>';
				}
				else if($brandname=="Garmin")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="garmin.php"><img  src="wr-m6/uploads/brand1570101901.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="garmin.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Garmin Device?</h3></a>
					<a style="text-decoration:none!important;"  href="garmin.php"><p style="line-height:initial;margin-top:9px;color:black;">Please Reset your Watch  before sending your device to us.</p></a>
				</div>
					</div>';
				}
				else if($brandname=="Fitbit")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="fitbit.php"><img  src="wr-m6/uploads/brand1570181611.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="fitbit.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an Fitbit Device?</h3></a>
					<a style="text-decoration:none!important;"  href="fitbit.php"><p style="line-height:initial;margin-top:9px;color:black;">Please Reset your Watch  before sending your device to us.</p></a>
				</div>
					</div>';
				}
				else if($brandname=="LG")
				{
           $link='<div style="display:flex;cursor:pointer;" class="mt-30" >
						<div style="margin-right:2%!important;">
						<a href="lgwatch.php"><img  src="wr-m6/uploads/brand1570098718.jpg" width="100px" height="80px" alt="Sell '.$brandname.'"></a>
					</div>
					<div>
					<a style="text-decoration:none!important;" href="lgwatch.php"><h3 style="font-size:15px;font-weight:600;color:#13564f;margin-bottom:2px;">Selling an LG Device?</h3></a>
					<a style="text-decoration:none!important;"  href="lgwatch.php"><p style="line-height:initial;margin-top:9px;color:black;">Please Reset your Watch  before sending your device to us.</p></a>
				</div>
					</div>';
				}
				?>
<?php
}
function ConfirmCheckOut(){
	extract($_REQUEST);
	$sql = "select * from ".WR_ORDER." where id='".$oid."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());

	if($row['g_total']<10000)
	{
	$sqlry = "select * from label order by id ASC limit 1 ";
	$rowqy = $this->db->row($sqlry,$this->db->pdo_open());
	$files=$rowqy['label'];
}
	else
	{
	$sqlry = "select * from label order by id ASC limit 1 ";
	$rowqy = $this->db->row($sqlry,$this->db->pdo_open());
	$sqlty = "select * from specials_label order by id ASC limit 1 ";
	$rowty = $this->db->row($sqlty,$this->db->pdo_open());
$files=$rowqy['label'];
}

		if($row['user_id']==$_SESSION['userid']){
		$sql_usr	=	"select * from ".WR_USER." where id='".$row['user_id']."'";
		$row_usr = $this->db->row($sql_usr,$this->db->pdo_open());


		require_once('api-work/vendor/autoload.php');
		
			$parcel = "parcel";

		if($row['g_total']<=100){
		    $service_code = "CRL48";
	}
		else {
		    $service_code = "SD1";
		}


		$config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'e37ca209-f015-4a8c-948e-92cc194e43af');
		// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
		// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
		// $config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');



		$apiInstance = new RoyalMail\ClickAndDrop\Rest\Api\OrdersApi(
		// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
		// This is optional, `GuzzleHttp\Client` will be used as default.
		new GuzzleHttp\Client(),
		$config
		);
	$name=$row_usr['fname'].' '.	$row_usr['lname'];
$addressz=$row_usr['address1'].' '.$row_usr['address2'].' '.$row_usr['state'].' '.$row_usr['postcode'];
		$data = array(
		'items' => [[
		"orderReference" => '-',
		'recipient' => [
		'address' => [
		"fullName" => '-',
		"companyName" => "Recycle Pro",
		"addressLine1" =>"170 Slade Road",
		"addressLine2" =>"-",
		"addressLine3" => "-",
		"city" => "Birmingham",
		"county" => "-",
		"postcode" => "B23 7PX",
		"countryCode" => "UK"
		],
		"emailAddress" => $row_usr['email'],
		],
		'sender' => [
		"tradingName" => "abc",
		],
		"billing" => [
		"address" => [
		"fullName" => '-',
		"companyName" => "Recycle Pro",
		"addressLine1" =>"170 Slade Road",
		"addressLine2" =>"-",
		"addressLine3" => "-",
		"city" => "Birmingham",
		"county" => "-",
		"postcode" => "B23 7PX",
		"countryCode" => "UK"
		],
		"phoneNumber" =>$row_usr['phone'],
		"emailAddress" => $row_usr['email']
		],
		"packages" => [[
		"weightInGrams" => 2,
		"packageFormatIdentifier" => $parcel
		]],
		"orderDate" => $row['timestamp'],
		"subtotal" => $row['g_total'],
		"shippingCostCharged" => 0,
		"total" => $row['g_total'],
		"postageDetails" => [
		"sendNotificationsTo" => "billing",
		"serviceCode" => $service_code
		],
		"label" => [
		"includeLabelInResponse" => true,
		"includeCN" => true,
		"includeReturnsLabel" => true
		],


		]]
		);

		$payload = json_encode($data);

		$request = new \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest($data); // \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest |

		$result = $apiInstance->createOrdersAsync($request);

		$json = json_decode($result, true);
		$label = $json['createdOrders'][0]['label'];
		$msg = "";
		$lab = mb_substr($label, 0, 100);
		$u_email = $row_usr['email'];
	
	 $trackingNumber = $json['createdOrders'][0]['trackingNumber'];
$message = "<h1>Please Find Qr Code for Label Print</h1><br/> <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=Label=2|QRCode=$lab  $trackingNumber    $product_name2|1DBarcode=$trackingNumber|SendersDetails=$addressz|RetDetails=Recyclepro\&ASHLYN \&ST. ALBANS\&AL3 8QE||&choe=UTF-8' />
";
//putenv('TMPDIR=temp');
//echo sys_get_temp_dir();
//exit;
// Configure API key authorization: Bearer
$configs = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'e37ca209-f015-4a8c-948e-92cc194e43af');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new RoyalMail\ClickAndDrop\Rest\Api\LabelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $configs
);
$orderIdentifiers = $json['createdOrders'][0]['orderIdentifier']; // string | Order Identifier or several Order Identifiers separated by semicolon
$documentType = "postageLabel"; // string | Document generation mode. When documentType is set to \"postageLabel\" the additional parameters below must be used. These additional parameters will be ignored when documentType is not set to \"postageLabel\"
$includeReturnsLabel = "True"; // bool | Include returns label. Required when documentType is set to 'postageLabel'
$includeCN = "True"; // bool | Include CN22/CN23 with label. Optional parameter. If this parameter is used the setting will override the default account behaviour specified in the \"Label format\" setting \"Generate customs declarations with orders\"
//print_r($includeReturnsLabel);

    $result = $apiInstance->getOrdersLabelAsync($orderIdentifiers, $documentType, $includeReturnsLabel,$includeCN);
    //echo strval( $result );
    $c=explode(' ',$result->getFilename());
    $filez=$c[0].'.pdf';
   rename("temp/$c[0]", "temp/$filez");
   $files="temp/".$filez;
    chmod($files, 0644);
   $image_link='temp/'.$filez;
    	$update_sql_array=array();
		$update_sql_array['order_status'] = 'Placed';
		$update_sql_array['label'] = $trackingNumber;
		$this->db->pdoupdate(WR_ORDER,$update_sql_array,'id',$oid);
		$contacts = array(
$row_usr['email'],
"noreply@recyclepro.co.uk");
		foreach($contacts as $email) {
		$this->objMail = new PHPMailer();
   $this->objMail->IsHTML(true);
		$this->objMail->From = 'noreply@recyclepro.co.uk';
		$this->objMail->FromName = 'Recycle Pro';
		//$this->objMail->addBCC('recyclepro.co.uk+eeb5f46e46@invite.trustpilot.com');
		$this->objMail->Sender = 'noreply@recyclepro.co.uk';
		$this->objMail->AddAddress($email);
		//$this->objMail->AddAddress("aqeelshaikh18@hotmail.com");
		$this->objMail->AddBCC("aqeelshaikh18@hotmail.com", "Aqeel Naim");
	    $this->objMail->Subject = 'Your RecyclePro Order Is Confirmed (OID:'.$row['id'].'). Check out Send Guide.';
		$this->objMail->Body .= '<div style="background-color: #efefef;color:#000000!important;font-size:13px;line-height:17px;margin:0px 0 0 0px;padding:0px 0 0;width:100%; font-family:Helvetica, sans-serif" bgcolor="#F0F1EB">
					<div style="width:700px !important; margin:0 auto; background:#FFF;">
					<div style="text-align: center;">
						<img src="img/recyclepro.jpg"  style="max-height:200px!important;"  usemap="#image-map">

<map name="image-map">
    <area target="_blank" alt="Call Us Now" title="Call Us Now" href="tel:+441213822532" coords="1129,515,1648,658" shape="rect">
    <area target="_blank" alt="Email Us Now" title="Email Us Now" href="mailto:info@recyclepro.co.uk" coords="2320,664,1709,519" shape="rect">
</map>
					</div>
					<div style="padding:25px 40px; color:#000; background:#fff;">
					<table cellpadding="0" cellspacing="0" style="width:100%;">
						<tr>
							<td style="background:#009688;"><h2 style="color:#fff; text-align:center; padding:5px 10px;">Thanks for selling your stuff,'.$row_usr['fname'].' !</h2></td>
						</tr>
						<tr>
							<td style="border:#009688 2px solid;"><p style="color:#009688; text-align:center; padding:5px 10px; font-weight:600;">Your Order Number: OID:'.$row['id'].' | Order Value: &#163;'.$row['g_total'].'</p></td>
						</tr>
					</table>
					<div style="text-align:center;"><h2 style="color:#009688;font-size:19px;">Hi,'.$row_usr['fname'].' '.$row_usr['lname'].' </h2>
					<p style="font-size:15px;">Your order is placed.</p></div>
					<div style="text-align:center">
					<p style="font-size:11px;text-align:center;">Your Pack and Send Guide includes: Packing Check List, Free Smart Send Service label & Item List. </p><p style="color:#009688;font-size:21px; font-weight:700;">All you need to do is follow the 4 simple steps below</p></div>
					<div style="text-align:center;"><img src="https://recyclepro.co.uk/img/recyclepro1.png" style="max-width:100%;" /></div>
					<hr style="color:#0B88EE; 2px; height: 1px; background: #0B88EE;" />
					<div style="background:white;">
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td ><img src="https://recyclepro.co.uk/img/recyclepro2.png" style="max-width:100%"></td>

							</tr>
						</table>
					</div>
					<div>
					<div style="text-align:center;">'.$message.'</div>
					<div style="text-align:center;"><a href="'.$image_link.'"  class="ho-button">
                                        <span>Click Here To Get Label</span>
                                    </a></div>
					<div style="text-align:center;">

<iframe src="temp/'.$filez.'" frameborder="0" height="400px" width="100%">
</iframe>
</div>
					 <div class="warning">
  <p><strong>Alert</strong> *Please note that if you did not receive your shipping label via email, go to Recyclepro.co.uk, log into your account and download the free shipping label from the order details section of your account.</p>
  <p><strong>Would you like to get it collected ?</strong> </p>
  </br>
  <p>Royal Mail now offer a <a style="color:#00adff;" href="https://send.royalmail.com/collect/youritems">collection service</a> where you can arrange to have your return collected from your home or work.  You will have your prepaid returns label which is sent to you via email, and all you need to do is follow the steps to book a collection from your desired address.</p>
  <p style="margin-top:20px;">When <a style="color:#00adff;" href="https://send.royalmail.com/collect/youritems">booking your collection</a>, tick the second option: that I purchased via Send an item or other similar service, or postage for an item being returned using a Royal Mail Tracked Return service.</p>
  <p style="margin-top:20px;">Then tick the option: Yes, there’s a tracking number (you can find your returns tracking information on your prepaid returns label in your email usually will be in this format: #AB 1111 0001 2GB#). This will allow you to track the progress of your return to us.
When inputting a weight, the weight can be maximum in that catagory depending on the size of the parcel you are sending in. If you are not sure just select the 2kg for watch, phone, laptop and gaming consoles and 5kg for Pc and imacs.</p>
<p>All you then need to do is to provide your address from where you wish Royal Mail to collect your Parcel and choose a collection date that suits you before paying for your collection.</p>


	</div>

	
					<p style="font-size:11px;text-align:center;">Please note: If you are sending multiple orders, please pack them separately and attach the relevant label to each box.
</p>
'.$link.'
<img src="https://recyclepro.co.uk/img/recyclepro3.jpg" style="max-width:100%">
					</div>
				</div>';
					$this->objMail->WordWrap = 50;
		$this->objMail->Send();
	}
/*$to = array(
$row_usr['email'],
"noreply@recyclepro.co.uk");
foreach($to as $eto) {
$names=$row_usr['fname'];
$from = 'noreply@recyclepro.co.uk';
$fromName = 'Recycle Pro';
$subject = 'Shipping Label';
$message='Attach this label to your product';
$from = $fromName." <".$from.">";
$headers = "From: $from";
$filez=$c[0].'.pdf';
 $semi_rand = md5(time());
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
  // Headers for attachment
    $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
  // Multipart boundary
    $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
    "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";
    $file_name = basename($filez);
                $targetDir = "temp/";
                $targetFilePath = $targetDir . $file_name;
                $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                $uploadedFile = $targetFilePath;
                $message .= "--{$mime_boundary}\n";
                $fp =    @fopen($uploadedFile, "rb");
                $data =  @fread($fp,filesize($uploadedFile));
                @fclose($fp);
                $data = chunk_split(base64_encode($data));
                $message .= "Content-Type: application/octet-stream; name=\"".$uploadedFile."\"\n" .
                "Content-Description: ".$uploadedFile."\n" .
                "Content-Disposition: attachment;\n" . " filename=\"".$uploadedFile."\"; size=".$uploadedFile.";\n" .
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";

                $message .= "--{$mime_boundary}--";
    $returnpath = "-f" . $from;

    // Send email

    $mail = @mail($eto, $subject, $message, $headers, $returnpath);
    }*/
   /*if($row_usr['phone']!='123456789')
    {
        $dlt = "delete from label where id='".$rowqy['id']."' ";
	$record = $this->db->fetch_query($dlt,$this->db->pdo_open());
    }
	*/
	$odts = "select * from ".WR_ORDER_DETAIL." where order_id='".$oid."' ";
	$odtz = $this->db->row($odts,$this->db->pdo_open());
	foreach ($odtz as $arrr)
			{
		?>
		<script>
		gtag('event', 'purchase', {
  "transaction_id": "<?php echo $arrr['order_id']; ?>",
  "affiliation": "Recycle Pro",
  "value": "<?php echo $arrr['g_total'];?>",
  "currency": "GBP",
  "tax": 0,
  "shipping": 0,
  "items": [
    {
     "id": "<?php echo $arrr['order_id'];?>",
      "name": "<?php echo $arrr['product_name'];?>",
      "list_name": "Search Results",
      "brand": "<?php echo $brandname;?>",
      "category": "Electronic Item",
      "variant": "<?php echo $arrr['varient_name'];?>",
      "list_position": 1,
      "quantity": "<?php echo $arrr['qty'];?>",
      "price": "<?php echo $arrr['total'];?>"
    },
  ]
});
</script>
		<?php
			}
		unset($_SESSION['products']);
		unset($_SESSION['userid']);
$yourURL="https://recyclepro.co.uk/thankyou.php";
echo ("<script>location.href='$yourURL'</script>");
		?>
		<script> gtag('event', 'conversion', { 'send_to': 'AW-702917808/3toRCL7_s7UBELDZls8C', 'transaction_id': '<?php echo $row['id']; ?>' }); </script>



		<?php

		unset($_SESSION['products']);
		unset($_SESSION['userid']);
	}
	else{
		unset($_SESSION['products']);
		?><script>alert('Something went wrong. Please try again.'); window.location='index.php';</script><?php
	}
}
function getOrderDetail($oid){
	$sql = "select * from ".WR_ORDER." where id='".$oid."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
}
} // End of Class
?>
