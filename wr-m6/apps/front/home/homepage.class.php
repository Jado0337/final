<?php 
class HomePage{

function __construct(){

	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);

}

function getProductVariant($id){
$sql = "select model from ".WR_MODEL." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['model'];
}

function HomeSLiderBanner(){
$sql = "select * from ".WR_HOMEBANNERS." where id='1' ";
$record = $this->db->row($sql,$this->db->pdo_open());
?>
<div class="imgbanner mt-30">
	<a href="<?php echo $record['page_link']; ?>" target="_blank">
		<img src="<?php echo 'uploads/'.$record['img_path']; ?>" alt="<?php echo $record['img_alt']; ?>" title="<?php echo $record['img_title']; ?>">
	</a>
</div>
<?php 
}

function HomeRightBanner(){
$sql = "select * from ".WR_HOMEBANNERS." where id='2' ";
$record = $this->db->row($sql,$this->db->pdo_open());
$sql2 = "select * from ".WR_HOMEBANNERS." where id='3' ";
$record2 = $this->db->row($sql2,$this->db->pdo_open());
?>
<div class="imgbanner mt-30">
	<a href="<?php echo $record['page_link']; ?>" target="_blank">
		<img src="<?php echo 'uploads/'.$record['img_path']; ?>" alt="<?php echo $record['img_alt']; ?>" title="<?php echo $record['img_title']; ?>">
	</a>
</div>
<div class="imgbanner mt-30">
	<a href="<?php echo $record['page_link']; ?>" target="_blank">
		<img src="<?php echo 'uploads/'.$record2['img_path']; ?>" alt="<?php echo $record2['img_alt']; ?>" title="<?php echo $record2['img_title']; ?>">
	</a>
</div>
<?php 
}


function HomeInfoBox()
{
$sql = "select * from ".WR_PAGE." where id='10' ";
$record = $this->db->row($sql,$this->db->pdo_open());
?>
<div class="ho-section bg-theme pb-30">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-30"><h2 style="margin-bottom:2%;"><?php echo $record['title']; ?></h2></div>
			
			<?php 
				$sql2 = "select * from ".WR_PAGE." where parent_id='10' order by sorting asc";
				$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
				foreach ($record2 as $row)
				{
			?>
			<div class="col-lg-4 col-md-6 col-sm-12 mb-5">
			 <div class="bg-dark-red" style="padding:30px 10px 20px 10px;">
			 <h2 style="font-size:22px;"><?php echo $row['heading']; ?></h2>
			 <p style="font-size:11px!important;margin-top:4%;"><?php echo $row['content']; ?></p>
			 <div style="display:flex;">
			 <h2 style="margin-top: 15px; margin-bottom: 0px; font-size: 60px; color: #13564f;"><?php echo $row['title']; ?></h2>
			 <img height="100%" width="100%" style="text-align:center;padding-left:30%;" src="<?php echo 'uploads/'.$row['keywords']; ?>" alt="<?php echo $row['keywords'];?>">
			 </div>
			 </div>
			</div>
			<?php 
				}
			?>
			
		</div>
	</div>
</div>
<?php 
}
function HomeAllBrands(){
?>

	<div class="row" style="margin-top:50px;">
	<?php 
		$x=1;
		$sql = "select * from ".WR_BRANDS." order by sorting asc";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $arr)
		{
	?>
		<div class="col-lg-3 col-md-4 col-sm-6 col-12">
			<!-- Single Product -->
			<article class="hoproduct">
				<div class="hoproduct-image">
					<a class="hoproduct-thumb" href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1">
						<img class="hoproduct-frontimage" src="<?php echo BASE_FILRDIR.$arr['brand_logo']; ?>" alt="<?php echo $arr['brand_name']; ?>">
						<img class="hoproduct-backimage" src="<?php echo BASE_FILRDIR.$arr['brand_logo']; ?>" alt="<?php echo $arr['brand_name']; ?>">
					</a>
				</div>
				<div class="text-center">
					
					<a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1" class="ho-button ho-button-fullwidth ho-button-sm"><span><?php echo $arr['brand_name']; ?></span></a>
				</div>
			</article>
			<!--// Single Product -->
		</div>
  <?php } ?>
	</div>


<?php 
}

function HomeSLider(){
?>
<div class="herobanner slider-navigation slider-dots mt-30">
	<?php 
		$x=1;
		$sql = "select * from ".WR_SLIDER." where status='Show' order by sorting asc";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $row)
		{
	?>
	<!-- Herobanner Single -->
	<div class="herobanner-single">
		<img src="<?php echo 'uploads/'.$row['img_path']; ?>" alt="<?php echo $row['img_alt']; ?>" title="<?php echo $row['img_title']; ?>">
		<div class="herobanner-content">
			<div class="herobanner-box">
				<h4><?php echo $row['text1']; ?></h4>
			</div>
			<div class="herobanner-box">
				<h2><?php echo $row['text2']; ?><span> <?php echo $row['text3']; ?></span></h2>
			</div>
			<div class="herobanner-box">
				<p><?php echo $row['text4']; ?></p>
			</div>
			<div class="herobanner-box">
				<a href="<?php echo $row['text6']; ?>" class="ho-button">
					<?php /*?><i class="lnr lnr-cart"></i><?php */?>
					<span><?php echo $row['text5']; ?></span>
				</a>
			</div>
		</div>
		<span class="herobanner-progress"></span>
	</div>
	<!--// Herobanner Single -->
	<?php } ?>
</div>
<?php 
}
	
function HomeProductSlider(){
?>
<div class="our-products-area mt-30">
<div class="section-title">
	<h3>Top Brands</h3>
	<ul class="nav" id="bstab2" role="tablist">
		<?php 
			$x=1;
			$sql = "select * from ".WR_BRANDS." order by sorting asc limit 0,5";
			$record = $this->db->fetch_query($sql,$this->db->pdo_open());
			foreach ($record as $arr)
			{
				$sql = "select * from ".WR_PRODUCT." where brand='".$arr['id']."' and category='1' order by sorting asc limit 0,6";
				$record = $this->db->fetch_query($sql,$this->db->pdo_open());
				if(count($record)>0){
				?>
				<li class="nav-item <?php if($x==1) echo 'active'; ?>">
					<a class="nav-link" id="bstab2-area<?php echo $arr['id']; ?>-tab" data-toggle="tab" href="#bstab2-area<?php echo $arr['id']; ?>" role="tab" aria-controls="bstab2-area<?php echo $arr['id']; ?>" aria-selected="false"><?php echo $arr['brand_name']; ?></a>
				</li>
				<?php 
				}
			}
		?>
		
		
	</ul>
</div>

<div class="tab-content" id="bstab2-ontent">
	<?php 
		$x=1;
		$sql = "select * from ".WR_BRANDS." order by sorting asc limit 0,5";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $arr)
		{
		$sql = "select * from ".WR_PRODUCT." where brand='".$arr['id']."' and category='1' order by sorting asc limit 0,6";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		
		if(count($record)>0){
	?>
	<div class="tab-pane fade <?php if($x==1) echo 'show active'; ?>" id="bstab2-area<?php echo $arr['id']; ?>" role="tabpanel" aria-labelledby="bstab2-area<?php echo $arr['id']; ?>-tab">
		<div class="product-slider our-products-slider slider-navigation-2">
			<?php 
			
			foreach ($record as $arr)
			{
			?>
			<div class="product-slider-col">
				<!-- Single Product -->
				<article class="hoproduct">
					<div class="hoproduct-image">
						<a class="hoproduct-thumb" href="javascript:void;">
							<img class="hoproduct-frontimage" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
							<img class="hoproduct-backimage" src="<?php echo BASE_FILRDIR.$arr['pro_img']; ?>" alt="<?php echo $arr['productname']; ?>">
						</a>
						<ul class="hoproduct-flags">
							<li class="flag-pack">Sell</li>
						</ul>
					</div>
					<div class="">
						<h5 class="hoproduct-title"><?php echo $arr['productname']; ?></h5>
						<div class="hoproduct-rattingbox">
							<div class="rattingbox">
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
								<span class="active"><i class="ion ion-ios-star"></i></span>
							</div>
						</div>
						<div class="hoproduct-pricebox">
							<div class="pricebox">
								<?php 
								$sql2 = "select * from ".WR_PRODUCT_PRICE." where product_id='".$arr['id']."' order by id asc";
								$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
								foreach ($record2 as $arr2)
								{
								?>
								<a  href="product-view.php?pid=<?php echo $arr['id']; ?>&vid=<?php echo $arr2['variant']; ?>" class="btn btn-success btn-sm text-white" style="margin-bottom:5px;"><?php echo $this->getProductVariant($arr2['variant']); ?></a>
								<?php 
								}
								?>
							</div>
						</div>
					</div>
				</article>
				<!--// Single Product -->
			</div>
			<?php 
				}
			?>

		</div>
	</div>
	<?php 
		}
		$x++;
		}
	?>
	
</div>
</div>
<?php 
}
	
function ShowBrandsHome(){
?>
<div class="categories-area mt-30">
	<div class="section-title">
		<h3>Mobile Brands</h3>
	</div>
	<div class="categories-slider slider-navigation-2 slider-navigation-2-m0">
	
		
			<?php 
				$x=1;
				$sql = "select * from ".WR_BRANDS." where status='show' order by sorting asc";
				$record = $this->db->fetch_query($sql,$this->db->pdo_open());
				foreach ($record as $arr)
				{
					$sql2 = "select * from ".WR_PRODUCT." where brand='".$arr['id']."' and category='1' order by sorting asc";
					$record2 = $this->db->fetch_query($sql2,$this->db->pdo_open());
					if($x==1)
					echo '<div class="category-wrapper">'; 
			?>
			<!-- Single Category -->
			<div class="category">
				<a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1" class="category-thumb">
					<img src="<?php echo BASE_FILRDIR.$arr['brand_logo']; ?>" alt="<?php echo $arr['brand_name']; ?>" style="border-radius: 50%; border: #ccc solid 2px;">
				</a>
				<div class="category-content">
					<h5 class="category-title">Mobiles</h5>
					<span class="category-productcounter"><?php echo count($record2); ?> Product</span>
					<a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=1" class="category-productlink">Sell Now <i class="ion ion-md-arrow-dropright"></i></a>
				</div>
			</div>
			<!--// Single Category -->
			<?php 
					if($x==2){
					echo '</div>';
					$x=0;
					}
					$x++;
				}
			?>

	</div>
</div>
<?php 
}

function HomeSearch(){
?>
<div class="row">
	<div class="col-md-12">
		<div style="padding: 25px; border: #13564f 3px solid; margin-top: 40px; background: #fff;">
			<h2 style="margin-top:25px;">What do you want to sell?</h2>
			
			
			<div class="row">
				
				<div class="col-md-12">
					<div class="pdetails-allinfo">

						<?php /*?><ul class="nav pdetails-allinfotab" id="product-details" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="product-details-area1-tab" data-toggle="tab" href="#product-details-area1"
									role="tab" aria-controls="product-details-area1" aria-selected="true">Sell Mobile</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="product-details-area2-tab" data-toggle="tab" href="#product-details-area2"
									role="tab" aria-controls="product-details-area2" aria-selected="false">Sell Tablet</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="product-details-area3-tab" data-toggle="tab" href="#product-details-area3"
									role="tab" aria-controls="product-details-area3" aria-selected="false">Sell Laptop</a>
							</li>
						</ul><?php */?>

						<?php /*?><div class="tab-content" id="product-details-ontent">
							
							<div class="tab-pane fade show active" id="product-details-area1" role="tabpanel" aria-labelledby="product-details-area1-tab">
								<div class="pdetails-description">
									<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
									<form name="mob-search" class="wr-search">
										
										<input type="text" name="mob-search-field" id="mob-search-field" class="wr-search-field typeahead" placeholder="Enter your item (Eg: Iphone 7)..." />
										<button name="mob-search-btn" class="wr-search-btn" type="button">Find Mobile</button>
										
									</form>
										
								</div>
							</div>
							<div class="tab-pane fade" id="product-details-area2" role="tabpanel" aria-labelledby="product-details-area2-tab">
								<div class="pdetails-description">
									<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
									<form name="mob-search" class="wr-search">
										<input type="text" name="mob-search-field" class="wr-search-field" placeholder="Enter your item (Eg: Ipad Pro)..." />
										<button name="mob-search-btn" class="wr-search-btn" type="button">Find Tablet</button>
										
									</form>
								</div>
							</div>
							<div class="tab-pane fade" id="product-details-area3" role="tabpanel" aria-labelledby="product-details-area3-tab">
								<div class="pdetails-description">
									<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
									<form name="mob-search" class="wr-search">
										<input type="text" name="mob-search-field" class="wr-search-field" placeholder="Enter your item (Eg: Macbook Air)..." />
										<button name="mob-search-btn" class="wr-search-btn" type="button">Find Laptop</button>
										
									</form>
								</div>
							</div>
						</div><?php */?>
						
						<div class="pdetails-description">
							<h4 style="margin-top:20px; margin-bottom:5px;">To get an instant price, simply search for your item or select brand from options below</h4>
							<form name="mob-search" class="wr-search">
								<?php /*?><input type="text" name="mob-search-field" class="wr-search-field" placeholder="Enter your item (Eg: Iphone 7)..." />
								<?php */?>
								
								<input type="text" name="mob-search-field" id="mob-search-field" class="wr-search-field typeahead" placeholder="Enter your item (Eg: Iphone 7)..." />
								<!--<ul class="divcontact dropdown-menu src" role="listbox" style="top: 141px; left: 15px;overflow-y: hidden;overflow-x: hidden;width:68%;">-->
									<ul class="divcontact dropdown-menu src" role="listbox" style="left: 15px;overflow-y: hidden;overflow-x: hidden;width:68%;">
								</ul>
								<button name="mob-search-btn" class="wr-search-btn" type="button" disabled>Find Device</button>
								
							</form>
								
						</div>

					</div>
					
					
				
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<?php 
}	

function getSearchResult($keyword){
$sql_mod = "select DISTINCT * from ".WR_PRODUCT." where keywords like '%".$keyword."%' AND status='Show' Order By sorting ASC LIMIT 10";
	$record_mod = $this->db->fetch_query($sql_mod,$this->db->pdo_open());
	$countryResult=array();
	if(count($record_mod)>0) {
		foreach ($record_mod as $row){
			//$cat = $this->getProCat($row["category"],'category');
		$variant = $row["variant"];
			$variantArr = explode(',',$variant);
			foreach($variantArr as $Va){
				$varentName = $this->GetVariantName($Va);
					$vid = $this-> GetVariant($Va);
					if($row["category"]==3)
					{
					    $pid=$row["id"];
					    $sql_mo = "select DISTINCT * from  ".WR_PRODUCT_PRICE." where product_id='$pid' ";
	$record_mo= $this->db->fetch_query($sql_mo,$this->db->pdo_open());
		foreach ($record_mo as $ramp){
		    $id=$ramp["id"];
		    $sql_m = "select DISTINCT * from  ".WR_PRODUCT_PRICE." where id='$id' ";
	$record_m= $this->db->fetch_query($sql_m,$this->db->pdo_open());
	foreach ($record_m as $r){
	    $varentName3 = $this->GetVariantName($r["variant"]);
					$vid3 = $this-> GetVariant($r["variant"]);
					$c="'";
					    	$countryResult[] ='<li onClick="checq('.$row["brand"].','.$row["category"].','.$row["id"].','.$vid3.','.$c.''.$r['ram'].''.$c.','.$c.''.$r['processor'].''.$c.','.$c.''.$r['released_year'].''.$c.')"><div style="display:flex;"><img width="30" height="30" src="wr-m6/uploads/'.$row["pro_img"] .'"><a class="dropdown-item" href="laptop_views?&name='.$row["productname"].'&bid='.$row["brand"].'&pc='.$row["category"].'&pid='.$row["id"].'&inch='.$vid3.'&ram='.$r["ram"].'&prc='.$r["processor"].'&year='.$r["released_year"].'" role="option">'.$row["productname"]." - ".$varentName3." - ".$r["ram"]." - ".$r["released_year"]." - ".$r["processor"].'</a></li></div>';
	}
		}
					}
					else
					{
					    $countryResult[] ='<li onClick="check('.$row["id"].','.$vid.')"><div   style="display:flex;white-space: pre;"><img width="30" height="30" src="wr-m6/uploads/'.$row["pro_img"] .'"><a class="dropdown-item" href="product-view?&name='.$row["productname"].'&pid='.$row["id"].'&vid='.$vid.'" role="option">'.$row["productname"]." - ".$varentName.'</a></div></li>';
					}
		
			}
		}
	echo json_encode($countryResult);
	}
}
function GetVariantName($id){
$sql = "select * from ".WR_MODEL." where id='".$id."' LIMIT 10";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['model'];
}
function GetVariantID($model)
{
$sql = "select * from ".WR_MODEL." where model='".$model."' LIMIT 10";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['id'];
}
function GetVariant($id)
{
$sql = "select * from ".WR_MODEL." where id='".$id."' LIMIT 10";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['id'];
}

function GetProductID($productname){
$sql = "select * from ".WR_PRODUCT." where productname='".$productname."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['id'];
}

function SearchRedirectTab($serval){
	$arr = explode(' - ',$serval);
	$pid = $this->GetProductID($arr[0]);
	$vid = $this->GetVariantID($arr[1]);
	echo $pid.','.$vid;
	//echo 'a,b';
}

function HomeFeaturedItems(){
?>

	<div class="row" style="margin-top:50px;">
	<?php 
		$x=1;
		$sql = "select * from ".WR_HOME_FEATURED_ITEMS." order by sorting asc";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $arr)
		{
	?>
		<div class="col-lg-4 col-md-6 col-sm-6 col-12">
			<!-- Single Product -->
			<article class="hoproduct">
				<div class="hoproduct-image">
					<a class="hoproduct-thumb" href="<?php echo $arr['page_link']; ?>">
						<img class="hoproduct-frontimage" src="<?php echo 'uploads/'.$arr['img_path']; ?>" alt="<?php echo $arr['img_alt']; ?>" title="<?php echo $arr['img_title']; ?>">
					</a>
				</div>
				<div class="text-center">
					
					<a href="<?php echo $arr['page_link']; ?>" class="ho-button ho-button-fullwidth ho-button-sm" style="padding: 6px 5px; font-size: 12px;"><span><?php echo $arr['p_name']; ?></span></a>
				</div>
			</article>
			<!--// Single Product -->
		</div>
  <?php } ?>
	</div>


<?php 
}

	

} // End of Class 
?>