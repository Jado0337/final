<?php 
// Class Start  //
class BrandsClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}


function ShowALlBrands(){
	
	if($_REQUEST['p']){
		$sql_procat = "select * from ".WR_PROCAT." where slug='".$_REQUEST['p']."' ";
		$row_procat = $this->db->row($sql_procat,$this->db->pdo_open());
		$ProCatID = $row_procat['id'];
	}
?>
<div class="shop-page-products mt-30">
	<div class="row no-gutters">
	<?php 
		$x=1;
		$sql = "select * from ".WR_BRANDS." where status='show' ";
		if($ProCatID!=''){
			$sql .= " and procat='".$ProCatID."' ";
		}
		$sql .= " order by sorting asc";
		$record = $this->db->fetch_query($sql,$this->db->pdo_open());
		foreach ($record as $arr)
		{
	?>
	<a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=<?php echo $arr['procat']; ?>"><div style="cursor:pointer;" onclick="location.href='products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=<?php echo $arr['procat']; ?>';" class="col-lg-3 col-md-4 col-sm-6 col-12">
			<!-- Single Product -->
			<article class="hoproduct">
				<div class="hoproduct-image">
					<a class="hoproduct-thumb" href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=<?php echo $arr['procat']; ?>">
						<img class="hoproduct-frontimage" src="<?php echo BASE_FILRDIR.$arr['brand_logo']; ?>" alt="Sell <?php echo $arr['brand_name']; ?>">
					</a>
				</div>
				<div class="hoproduct-content text-center">
					<h5 class="hoproduct-title"><a href="products.php?b=<?php echo $arr['url']; ?>&bid=<?php echo $arr['id']; ?>&pc=<?php echo $arr['procat']; ?>"><?php echo $arr['brand_name']; ?></a></h5>
				</div>
			</article>
			<!--// Single Product -->
		</div></a>
  <?php } ?>
	</div>
</div>

<?php 
// Pgination Code ////////////////////////////////////////////////////////////////////////////////////////////////////
/*?><div class="cr-pagination pt-30">
	<p>Showing 1-12 of 13 item(s)</p>
	<ul>
		<li><a href="shop-rightsidebar.html"><i class="ion ion-ios-arrow-back"></i> Previous</a></li>
		<li class="active"><a href="shop-rightsidebar.html">1</a></li>
		<li><a href="shop-rightsidebar.html">2</a></li>
		<li><a href="shop-rightsidebar.html">Next <i class="ion ion-ios-arrow-forward"></i></a></li>
	</ul>
</div><?php */?>
<?php 
}





} 
/// Class End ////
?>