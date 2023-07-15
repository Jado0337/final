<?php 
// Page Class contains all functions to manage admin page content. 
class ProductClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
	}
function getProductAge($pa){
	if($pa == 1)
	return 'New';
	if($pa == 2)
	return 'Middle Age';
	if($pa == 3)
	return 'Old';
	if($pa == 4)
	return 'Extinct';
}
function getProductCatName($id){
	$sql = "select * from ".WR_PROCAT." where id='".$id."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	return $record['category'];
}
function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title"> 
				  <h2>All Products</h2>
				  <div class="pull-right">
				  <a class="btn btn-info" href="manageproduct.php?index=add">Add New</a>
				  <a class="btn btn-info" href="manageproduct.php?index=addLaptop">Add Laptop</a>
				  </div>
				  <div class="clearfix"></div>
			   </div>
			   <div style="text-align:left;margin-top:-4%;">Product Name Search :<input style="background:white!important;margin-left:11px;padding:5px;" type="text" name="track" id="track" class="wr-search-field typeahead" placeholder="Search Your Order Here" /> <button type="button" id="searchproducts" class="btn btn-default" >search</button>
			   		<div class="modal fade" id="pdfmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table table-striped jambo_table bulk_action"  >
            <thead>
                                       <tr class="headings">
                                          <th class="column-title">Product</th>
                                          <th class="column-title">Product Name</th>
										  <th class="column-title">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody id="responsecontainer">
                                        
                                    </tbody>
           </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
			   <div class="x_content">
			   		<p>Manage all <code>Products</code> of the website.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Product</th>
                                          <th class="column-title">Product Name</th>
										  <th class="column-title">Age</th>
                                          <th class="column-title">Sorting</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_PRODUCT." where 1 order by id desc ";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
									
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <?php
                                          if(file_exists('updated/'.str_replace(' ','-',$arr['productname']).'.webp'))
                                          {
                                          ?>
                                          <td class=" "><img src="updated/<?php echo str_replace(' ','-',$arr['productname']);?>.webp" style="width:100px;" /></td>
                                          <?php
                                          }
                                          else
                                          {
                                          ?>
                                          <td class=" "><img src="updated/notavailable.webp" style="width:100px;" /></td>
                                          <?php } ?>
                                          <td class=" "><?php echo $arr['productname']; //echo $this->db->getTableData("WR_PROCAT","category",'id',$arr['category'],$this->db->pdo_open()); ?></td>
										  <td class=" "><?php echo $this->getProductAge($arr['pro_age']); ?></td>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
                                          <td class=" last">
										  	<?php 
										  	if($arr['category']==3){
											?><a href="manageproduct.php?index=editLaptop&id=<?php echo $arr['id']; ?>">Edit</a> / <?php 
											}
											else{
										  	?><a href="manageproduct.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / <?php 
										  	} 
										  	?>
										  <a class="btn_delete" id="<?php echo $arr['id'];?>"  href="javascript:void;">Delete </a>
                                          </td>
                                       </tr>
                                    <?php 
										$x++;
										} ?>   
									</tbody>
                                 </table>
                              </div>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}
function AddEditData($mode='Add',$id=''){
		if($mode=='Edit'){
			$sql = "select * from ".WR_PRODUCT." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->pro_age=$record['pro_age'];
			$this->productname=$record['productname'];
			$this->pro_img=$record['pro_img'];
			$this->pro_img_alt=$record['pro_img_alt'];
			$this->pro_img_title=$record['pro_img_title'];
			$this->brand=$record['brand'];
			$this->category=$record['category'];
			$this->variant=$record['variant'];
			//$this->network=$record['network'];
			//$this->condition=$record['condition'];
			//$this->icloudlock=$record['icloudlock'];
			//$this->price=$record['price'];
			$this->decrease_percent=$record['decrease_percent'];
			$this->decrease_in_days =$record['decrease_in_days'];
			$this->title=$record['title'];
			$this->keywords =$record['keywords'];
			$this->metadescription =$record['metadescription'];
			$this->sorting=$record['sorting'];
			$this->status=$record['status'];
			$this->notice=$record['notice'];
		}
		else{
			$this->pro_age=$record['pro_age'];
			$this->productname=$record['productname'];
			$this->pro_img=$_POST['pro_img'];
			$this->pro_img_alt=$_POST['pro_img_alt'];
			$this->pro_img_title=$_POST['pro_img_title'];
			$this->brand=$_POST['brand'];
			$this->category=$_POST['category'];
			$this->variant=$_POST['variant'];
			//$this->network=$_POST['network'];
			//$this->condition=$_POST['condition'];
			//$this->icloudlock=$_POST['icloudlock'];
			//$this->price=$_POST['price'];
			$this->decrease_percent=$_POST['decrease_percent'];
			$this->decrease_in_days =$_POST['decrease_in_days'];
			$this->title=$_POST['title'];
			$this->keywords =$_POST['keywords'];
			$this->metadescription =$_POST['metadescription'];
			$this->sorting=$_POST['sorting'];
			$this->status=$_POST['status'];
			$this->notice=$_POST['notice'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Product</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageproduct.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Product</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                 <span class="section">Product Info</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pro_age">Product Age <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="pro_age" id="pro_age" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
										<option value="1" <?php if($this->pro_age=='1') echo 'selected="selected"'; ?>>New</option>
										<option value="2" <?php if($this->pro_age=='2') echo 'selected="selected"'; ?>>Middle Age</option>
										<option value="3" <?php if($this->pro_age=='3') echo 'selected="selected"'; ?>>Old</option>
										<option value="4" <?php if($this->pro_age=='4') echo 'selected="selected"'; ?>>Extinct</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Product Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="productname" name="productname" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->productname; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pro_img">Product Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                       <input type="file" id="pro_img" name="pro_img" class="form-control col-md-4 col-xs-12">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="pro_img_alt" name="pro_img_alt" class="form-control col-md-4col-xs-12" placeholder="Alt text" value="<?php echo $this->pro_img_alt; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="pro_img_title" name="pro_img_title" class="form-control col-md-4 col-xs-12" placeholder="Image Title" value="<?php echo $this->pro_img_title; ?>">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <?php if($mode=="Edit") { ?>
										<img src="updated/<?php echo $this->pro_img; ?>" style="max-height: 80px;" />
										<?php } ?>
                                    </div>
                                 </div>
								 <span class="section">Product Type</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="category" id="category" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<?php 
										$x=1;
										$sql_cat = "select * from ".WR_PROCAT." where id!=3 order by sorting asc";
										$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
										foreach ($row_cat as $r_cat)
										{
										?>
                                       	<option value="<?php echo $r_cat['id']; ?>" <?php if($this->category==$r_cat['id']) echo 'selected'; ?>><?php echo $r_cat['category']; ?></option>
                                       	<?php } ?>
                                       </select>
                                    </div>
                                 </div>
								 <div id="showmodels">
								 <?php 
								 	if($mode=='Edit'){
										$this->getModels($this->category,$this->variant,$id);
									}
								 ?>
								 </div>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Product Variant or Model <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="variant" name="variant" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->variant; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Network <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="network" name="network" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->network; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Condition <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="condition" name="condition" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->condition; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">iCloud Lock <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="icloudlock" name="icloudlock" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->icloudlock; ?>">
                                    </div>
                                 </div><?php */?>
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="price" name="price" required="required" data-validate-minmax="1,1500" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->price; ?>">
                                    </div>
                                 </div><?php */?>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price Decrease Percentage<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="decrease_percent" name="decrease_percent" required="required" data-validate-minmax="1,100" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->decrease_percent; ?>" min="1" max="100">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price Decrease in Days<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="decrease_in_days" name="decrease_in_days" required="required" data-validate-minmax="1,366" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->decrease_in_days; ?>" min="1" max="365">
                                    </div>
                                 </div>
                                 <span class="section">Important SEO Info</span> 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Page Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="title" name="title" required="required" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->title; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Keywords
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="keywords" name="keywords" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->keywords; ?>">
                                    </div>
                                 </div> 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Meta Description
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="metadescription" name="metadescription" class="form-control col-md-10 col-xs-12"><?php echo $this->metadescription; ?></textarea>
                                    </div>
                                 </div>    
                                 <span class="section">Other Options</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Page Sorting <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="sorting" name="sorting" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->sorting; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="status" id="status" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<option value="Show" <?php if($this->status=='Show') echo 'selected'; ?>>Show</option>
                                       	<option value="Hide" <?php if($this->status=='Hide') echo 'selected'; ?>>Hide</option>
                                       </select>
                                    </div>
                                 </div>
								 <span class="section">Other Options</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Notice
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="notice" name="notice" class="form-control col-md-10 col-xs-12"><?php echo $this->notice; ?></textarea>
                                    </div>
                                 </div>
                                 <!-- <div class="ln_solid"></div> -->
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       <input type="hidden" name="sbtfrm" value="sbtval" id="hdn">
                                       <input type="submit" name="sbtbtn" class="btn btn-primary btn-lg" value="Submit"/>
                                    </div>
                                 </div>
                    </form>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}
function AddFromToDb(){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["pro_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["pro_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif' || $ext=='webp')
	{						
	$path= str_replace(' ','-',$productname).".".$ext;
	move_uploaded_file($_FILES["pro_img"]["tmp_name"],"updated/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$variant_2=implode(',',$model);
	$insert_sql_array=array();
	$insert_sql_array['pro_age'] = $pro_age;
	$insert_sql_array['productname'] = $productname;
	if($path!='') {
		$insert_sql_array['pro_img'] = $path;
	}
	$insert_sql_array['pro_img_alt'] = $pro_img_alt;
	$insert_sql_array['pro_img_title'] = $pro_img_title;
	$insert_sql_array['brand'] = $brand;
	$insert_sql_array['category'] = $category;
	$insert_sql_array['variant'] = $variant_2;
	/*$insert_sql_array['network'] = $network;
	$insert_sql_array['condition'] = $condition;
	$insert_sql_array['icloudlock'] = $icloudlock;*/
	/*$insert_sql_array['price'] = $price;*/
	$insert_sql_array['decrease_percent'] = $decrease_percent;
	$insert_sql_array['decrease_in_days'] = $decrease_in_days;
	$insert_sql_array['title'] = $title;
	$insert_sql_array['keywords'] = $keywords;
	$insert_sql_array['metadescription'] = $metadescription;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$insert_sql_array['notice'] = $notice;
	$id=$this->db->pdoinsert(WR_PRODUCT,$insert_sql_array);
	foreach($model as $vr){
		$pricename='modelprice'.$vr;
		$faltyprice='faultyprice'.$vr;
		$scrapprice='scrapprice'.$vr;
		$released_year='released_year'.$vr;
		$processor='processor'.$vr;
		$ram='ram'.$vr;
		$insert_sql_array2=array();
		$insert_sql_array2['product_id'] = $id;
		$insert_sql_array2['variant'] = $vr;
		$insert_sql_array2['price'] = $_REQUEST[$pricename];
		$insert_sql_array2['faulty_price'] = $_REQUEST[$faltyprice];
		$insert_sql_array2['scrap_price'] = $_REQUEST[$scrapprice];
		$this->db->pdoinsert(WR_PRODUCT_PRICE,$insert_sql_array2);
	}
	
	foreach($network_id as $netid){
		//$net_price = $networkprice[$nx];
		$net_price='netwprice'.$netid;
		$nprice = $_REQUEST[$net_price];
		$insert_sql_array3=array();
		$insert_sql_array3['product_id'] = $id;
		$insert_sql_array3['network_id'] = $netid;
		if($nprice!='')
		$insert_sql_array3['price'] = $nprice;
		$this->db->pdoinsert(WR_PRO_NETWORK,$insert_sql_array3);
	}
	?>
	<script>window.location='manageproduct.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["pro_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["pro_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif' || $ext=='webp')
	{						
	$path= str_replace(' ','-',$productname).".".$ext;
	move_uploaded_file($_FILES["pro_img"]["tmp_name"],"updated/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$variant_2=implode(',',$model);
	$update_sql_array=array();
	$update_sql_array['pro_age'] = $pro_age;
	$update_sql_array['productname'] = $productname;
	if($path!='') {
		$update_sql_array['pro_img'] = $path;
	}
	$update_sql_array['pro_img_alt'] = $pro_img_alt;
	$update_sql_array['pro_img_title'] = $pro_img_title;
	$update_sql_array['brand'] = $brand;
	$update_sql_array['category'] = $category;
	$update_sql_array['variant'] = $variant_2;
	/*$update_sql_array['network'] = $network;
	$update_sql_array['condition'] = $condition;
	$update_sql_array['icloudlock'] = $icloudlock;*/
	/*$update_sql_array['price'] = $price;*/
	$update_sql_array['decrease_percent'] = $decrease_percent;
	$update_sql_array['decrease_in_days'] = $decrease_in_days;
	$update_sql_array['title'] = $title;
	$update_sql_array['keywords'] = $keywords;
	$update_sql_array['metadescription'] = $metadescription;
	$update_sql_array['sorting'] = $sorting;
	$update_sql_array['status'] = $status;
	$update_sql_array['notice']=$notice;
	$this->db->pdoupdate(WR_PRODUCT,$update_sql_array,'id',$id);
	$this->DeleteProductPrice($id);
	foreach($model as $vr){
		$pricename='modelprice'.$vr;
		$faltyprice='faultyprice'.$vr;
		$scrapprice='scrapprice'.$vr;
		$released_year='released_year'.$vr;
		$processor='processor'.$vr;
		$ram='ram'.$vr;
		$insert_sql_array2=array();
		$insert_sql_array2['product_id'] = $id;
		$insert_sql_array2['variant'] = $vr;
		$insert_sql_array2['price'] = $_REQUEST[$pricename];
		$insert_sql_array2['faulty_price'] = $_REQUEST[$faltyprice];
		$insert_sql_array2['scrap_price'] = $_REQUEST[$scrapprice];
		$this->db->pdoinsert(WR_PRODUCT_PRICE,$insert_sql_array2);
	}
	$this->DeleteNetworkPrice($id);
	//$nx = 0;
	foreach($network_id as $netid){
		//$net_price = $networkprice[$nx];
		$net_price='netwprice'.$netid;
		$nprice = $_REQUEST[$net_price];
		$insert_sql_array3=array();
		$insert_sql_array3['product_id'] = $id;
		$insert_sql_array3['network_id'] = $netid;
		if($nprice!='')
		$insert_sql_array3['price'] = $nprice;
		$this->db->pdoinsert(WR_PRO_NETWORK,$insert_sql_array3);
	}
	?>
	<script>window.location='manageproduct.php';</script>
	<?php
}
function DeleteJSCall(){
	?>
		<script type="text/javascript">
		$(document).on('click','.btn_delete',function() {
		var element = $(this);
		var del_id = element.attr("id");
		var info = 'id=' + del_id;
		if(confirm("Are you sure you want to delete this record?"))
		{
		 $.ajax({
		   type: "POST",
		   url: "ajaxcall.php?index=DeleteProduct",
		   data: info,
		   success: function(){
			   location.reload();
		 }
		});
		  $(this).parents(".tr_delete").animate({ backgroundColor: "#003" }, "slow")
		  .animate({ opacity: "hide" }, "slow");
		 }
		return false;
		});
		</script>
		<script type="text/javascript">
		$(document).on('change','#category',function() {
		/*var element = $(this);*/
		var val_id = $(this).val();
		var info = 'id=' + val_id;
		 $.ajax({
		   type: "POST",
		   url: "ajaxcall.php?index=getModels",
		   data: info,
		   success: function(data, textStatus) {
				$("#showmodels").html(data);    
			}
		});
		return false;
		});
		</script>
		
		<script type="text/javascript">
		jQuery(document).ready(function () {
			$('#addMoreProdct').click(function(){
				var seconds = new Date().getTime() / 1000;						   	
				var code	=	$('#allprodctdiv').html();
				$('#allprodctdiv').append('<div class="row" style="background: #e3e3e3; padding: 20px 0px; margin-bottom: 10px;">'+
											'<div class="col-md-3">'+
												'<strong>Model</strong>'+
												'<br />'+
												'<select name="model[]" class="form-control">'+
													'<option value="">Select Model</option>'+
													<?php
													$sql_cat = "select * from ".WR_MODEL." where category='3' order by sorting asc";
													$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
													foreach ($row_cat as $r_cat)
													{
													?>
													'<option value="<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></option>'+
													<?php 
													}
													?>
												'</select>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<strong>Year</strong>'+
												'<br />'+
												'<input type="text" name="released_year[]" placeholder="Year" value="" class="form-control" />'+
											'</div>'+
											'<div class="col-md-3">'+
												'<strong>Processor</strong>'+
												'<br />'+
												'<input type="text" name="processor[]" placeholder="Processor" value="" class="form-control" />'+
											'</div>'+
											'<div class="col-md-3">'+
												'<strong>Ram</strong>'+
												'<br />'+
												'<input type="text" name="ram[]" placeholder="Ram" value="" class="form-control" />'+
											'</div>'+
											
											'<div class="col-md-4">'+
												'<strong>Good Price</strong>'+
												'<br />'+
												'<input type="text" name="modelprice[]" placeholder="Good Price" value="" class="form-control" />'+
											'</div>'+
											'<div class="col-md-4">'+
												'<strong>Worn Price</strong>'+
												'<br />'+
												'<input type="text" name="faultyprice[]" placeholder="Worn Price" value="" class="form-control" />'+
											'</div>'+
											'<div class="col-md-4">'+
												'<strong>Faulty Price</strong>'+
												'<br />'+
												'<input type="text" name="scrapprice[]" placeholder="Faulty Price" value="" class="form-control" />'+
											'</div>'+
										'</div>');
					$(".datetacker").datepicker({
							changeMonth: true,
							changeYear: true,
							showButtonPanel: true,
							yearRange: "-100:+0",
							dateFormat:"dd-mm-yy"
					});
			});
		});
	</script>
		<?php /*?><script type="text/javascript">
		jQuery(document).ready(function () {
			$('#addMoreProdct').click(function(){
				var seconds = new Date().getTime() / 1000;						   	
				var code	=	$('#allprodctdiv').html();
				$('#allprodctdiv').append('<div class="row" style="background: #e3e3e3; padding: 20px 0px; margin-bottom: 10px;">'+
											'<div class="col-md-3">'+
												'<strong>Model</strong>'+
												'<br />'+
												'<select name="model[]" class="form-control">'+
													<?php
													$sql_cat = "select * from ".WR_MODEL." where category='3' order by sorting asc";
													$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
													foreach ($row_cat as $r_cat)
													{
													?>
													'<option value="<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></option>'+
													<?php 
													}
													?>
												'</select>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<strong>Select Year</strong>'+
												'<br />'+
												'<select name="released_year[]" class="form-control">'+
													'<option value="">Select Year</option>'+
													<?php 
														$xx=2011;
														while($xx<=date('Y')){
														?>'<option value="<?php echo $xx; ?>"><?php echo $xx; ?></option>'+<?php 
														$xx++;
														}
													?>
												'</select>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<strong>Select Processor</strong>'+
												'<br />'+
												'<select name="processor[]" class="form-control">'+
													'<option value="">Select Processor</option>'+
													<?php 
														$sql_procesr = "select id,processor from ".WR_PROCESSORS." where procat='3' order by processor asc";
														$row_procesr = $this->db->fetch_query($sql_procesr,$this->db->pdo_open());
														foreach ($row_procesr as $r_procesr){
														?>'<option value="<?php echo $r_procesr['id']; ?>"><?php echo $r_procesr['processor']; ?></option>'+<?php 
														$xx++;
														}
													?>
												'</select>'+
											'</div>'+
											'<div class="col-md-3">'+
												'<strong>Select Ram</strong>'+
												'<br />'+
												'<select name="ram[]" class="form-control">'+
													'<option value="">Select Ram</option>'+
													<?php 
														$sql_rams = "select id,ram from ".WR_RAMS." where procat='3' order by ram asc";
														$row_rams = $this->db->fetch_query($sql_rams,$this->db->pdo_open());
														foreach ($row_rams as $r_rams){
														?>'<option value="<?php echo $r_rams['id']; ?>"><?php echo $r_rams['ram']; ?></option>'+<?php 
														$xx++;
														}
													?>
												'</select>'+
											'</div>'+
											
											'<div class="col-md-4">'+
												'<strong>Good Price</strong>'+
												'<br />'+
												'<input type="text" name="modelprice[]" placeholder="Good Price" value="" class="form-control" />'+
											'</div>'+
											'<div class="col-md-4">'+
												'<strong>Faulty Price</strong>'+
												'<br />'+
												'<input type="text" name="faultyprice[]" placeholder="Faulty Price" value="" class="form-control" />'+
											'</div>'+
											'<div class="col-md-4">'+
												'<strong>Scrap Price</strong>'+
												'<br />'+
												'<input type="text" name="scrapprice[]" placeholder="Scrap Price" value="" class="form-control" />'+
											'</div>'+
										'</div>');
					$(".datetacker").datepicker({
							changeMonth: true,
							changeYear: true,
							showButtonPanel: true,
							yearRange: "-100:+0",
							dateFormat:"dd-mm-yy"
					});
			});
		});
	</script><?php */?>
	<?php 
}
function getModels($id,$variant='',$pid=''){
$vari_val=explode(',',$variant);
?>
		<script>
		$(function(){
			var requiredCheckboxes = $('.options :checkbox[required]');
			requiredCheckboxes.change(function(){
				if(requiredCheckboxes.is(':checked')) {
					requiredCheckboxes.removeAttr('required');
				} else {
					requiredCheckboxes.attr('required', 'required');
				}
			});
		});
		</script>
		<div class="item form-group">
			<label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Brand <span class="required">*</span>
			</label>
			<div class="col-md-7 col-sm-7 col-xs-12">
			   <select name="brand" id="brand" class="form-control col-md-7 col-xs-12" required>
				<option value="">Select</option>
				<?php 
				$x=1;
				$sql_cat = "select * from ".WR_BRANDS." where procat='".$id."' order by sorting asc";
				$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
				foreach ($row_cat as $r_cat)
				{
					$ProCatName = $this->getProductCatName($r_cat['procat']);
				?>
				<option value="<?php echo $r_cat['id']; ?>" <?php if($this->brand==$r_cat['id']) echo 'selected'; ?>><?php echo $r_cat['brand_name'].' - '.$ProCatName; ?></option>
				<?php } ?>
			   </select>
			</div>
		 </div>
		<div class="item form-group options">
			<label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Model <span class="required">*</span>
			</label>
			<div class="col-md-10 col-sm-10 col-xs-12">
			   <table class="table table-striped jambo_table bulk_action">
			   	<thead>
			   	<tr class="headings">
					<th>Model</th>
					<th>Good Price</th>
					<th>Worn Price</th>
					<th>Faulty Price</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$x=1;
				$sql_cat = "select * from ".WR_MODEL." where category='".$id."' order by sorting asc";
				$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
				foreach ($row_cat as $r_cat)
				{
					if($pid!='') {
					$sql_pp = "select * from ".WR_PRODUCT_PRICE." where product_id='".$pid."' and variant='".$r_cat['id']."' ";
					$record_pp = $this->db->row($sql_pp,$this->db->pdo_open());
					$mpval=$record_pp['price'];
					$faval=$record_pp['faulty_price'];
					$scval=$record_pp['scrap_price'];
					}
				?>
				<?php /*?><option value="<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></option><?php */?>
				<tr>
					<td>
				<input type="checkbox" name="model[]" id="model<?php echo $r_cat['id']; ?>" value="<?php echo $r_cat['id']; ?>" <?php if (in_array($r_cat['id'], $vari_val)) { echo 'checked="checked"'; } if($pid=='') { echo 'required'; } ?> /> <label for="model<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></label>
					<?php $this->getOtherSpecifications($id,$r_cat['id']); ?>
					</td>
					<td> 				
				<input type="text" name="modelprice<?php echo $r_cat['id']; ?>" id="modelprice<?php echo $r_cat['id']; ?>" placeholder="Good Price" value="<?php echo $mpval;?>" />
					</td>
					<td>
				<input type="text" name="faultyprice<?php echo $r_cat['id']; ?>" id="faultyprice<?php echo $r_cat['id']; ?>" placeholder="Faulty Price" value="<?php echo $faval;?>" />
					</td>
					<td>
				<input type="text" name="scrapprice<?php echo $r_cat['id']; ?>" id="scrapprice<?php echo $r_cat['id']; ?>" placeholder="Scrap Price" value="<?php echo $scval;?>" />
					</td>
				</tr>
				<?php } ?>
				</tbody>
			  </table>
			</div>
		 </div>
		 <?php if($id=='1' || $id=='2' || $id=='7') {?>
		 <div class="item form-group options">
			<label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Mobile Networks <span class="required">*</span>
			</label>
			<div class="col-md-10 col-sm-10 col-xs-12">
			   <table class="table table-striped jambo_table bulk_action">
			   	<thead>
			   	<tr class="headings">
					<th>Network Name</th>
					<th>Network Price</th>
				</tr>
				</thead>
				<tbody>
				<?php 
				$x=1;
				$sql_netwrk = "select * from ".WR_MOBILE_NETWORK." where 1 order by sorting asc";
				$row_netwrk = $this->db->fetch_query($sql_netwrk,$this->db->pdo_open());
				foreach ($row_netwrk as $r_netwrk)
				{
					$networkname = $this->getNetworkName($r_netwrk['id']);
					$netid=$r_netwrk['id'];
					if($pid!='') {
						$sql_pp = "select * from ".WR_PRO_NETWORK." where product_id='".$pid."' and network_id='".$netid."' ";
						$record_pp = $this->db->row($sql_pp,$this->db->pdo_open());
						$netprice=$record_pp['price'];
					}
				?>
				<?php /*?><option value="<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></option><?php */?>
				<tr>
					<td>
						<?php echo $networkname; ?>
					</td>
					<td>
						<input type="hidden" name="network_id[]" id="network_id_<?php echo $netid; ?>" value="<?php echo $netid; ?>" />
						<input type="text" name="netwprice<?php echo $netid; ?>" id="netwprice<?php echo $netid; ?>" placeholder="Enter <?php echo $networkname; ?> Price" value="<?php echo $netprice;?>" />
					</td>
				</tr>
				<?php } ?>
				</tbody>
			  </table>
			</div>
		 </div>
		 <?php 
		 }
		 ?>
<?php 
}

function getOtherSpecifications($procat='',$r_cat=''){
	if($procat==3){
	?>
		<br />
		<select name="released_year<?php echo $r_cat; ?>" id="released_year<?php echo $r_cat; ?>">
			<option value="">Select Year</option>
			<?php 
				$xx=2011;
				while($xx<=date('Y')){
				?><option value="<?php echo $xx; ?>"><?php echo $xx; ?></option><?php 
				$xx++;
				}
			?>
		</select>
		<br />
		<select name="processor<?php echo $r_cat; ?>" id="processor<?php echo $r_cat; ?>">
			<option value="">Select Processor</option>
			<?php 
				$sql_procesr = "select id,processor from ".WR_PROCESSORS." where procat='".$procat."' order by processor asc";
				$row_procesr = $this->db->fetch_query($sql_procesr,$this->db->pdo_open());
				foreach ($row_procesr as $r_procesr){
				?><option value="<?php echo $r_procesr['id']; ?>"><?php echo $r_procesr['processor']; ?></option><?php 
				$xx++;
				}
			?>
		</select>
		<br />
		<select name="ram<?php echo $r_cat; ?>" id="ram<?php echo $r_cat; ?>">
			<option value="">Select Ram</option>
			<?php 
				$sql_rams = "select id,ram from ".WR_RAMS." where procat='".$procat."' order by ram asc";
				$row_rams = $this->db->fetch_query($sql_rams,$this->db->pdo_open());
				foreach ($row_rams as $r_rams){
				?><option value="<?php echo $r_rams['id']; ?>"><?php echo $r_rams['ram']; ?></option><?php 
				$xx++;
				}
			?>
		</select>
	<?php 
	}
}

function AddLaptops($mode='Add',$id=''){
		if($mode=='Edit'){
			$sql = "select * from ".WR_PRODUCT." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->pro_age=$record['pro_age'];
			$this->productname=$record['productname'];
			$this->pro_img=$record['pro_img'];
			$this->pro_img_alt=$record['pro_img_alt'];
			$this->pro_img_title=$record['pro_img_title'];
			$this->brand=$record['brand'];
			$this->category=$record['category'];
			$this->variant=$record['variant'];
			//$this->network=$record['network'];
			//$this->condition=$record['condition'];
			//$this->icloudlock=$record['icloudlock'];
			//$this->price=$record['price'];
			$this->decrease_percent=$record['decrease_percent'];
			$this->decrease_in_days =$record['decrease_in_days'];
			$this->title=$record['title'];
			$this->keywords =$record['keywords'];
			$this->metadescription =$record['metadescription'];
			$this->sorting=$record['sorting'];
			$this->status=$record['status'];
			$this->notice=$record['notice'];
		}
		else{
			$this->pro_age=$record['pro_age'];
			$this->productname=$record['productname'];
			$this->pro_img=$_POST['pro_img'];
			$this->pro_img_alt=$_POST['pro_img_alt'];
			$this->pro_img_title=$_POST['pro_img_title'];
			$this->brand=$_POST['brand'];
			$this->category=$_POST['category'];
			$this->variant=$_POST['variant'];
			//$this->network=$_POST['network'];
			//$this->condition=$_POST['condition'];
			//$this->icloudlock=$_POST['icloudlock'];
			//$this->price=$_POST['price'];
			$this->decrease_percent=$_POST['decrease_percent'];
			$this->decrease_in_days =$_POST['decrease_in_days'];
			$this->title=$_POST['title'];
			$this->keywords =$_POST['keywords'];
			$this->metadescription =$_POST['metadescription'];
			$this->sorting=$_POST['sorting'];
			$this->status=$_POST['status'];
			$this->notice=$_POST['notice'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Laptop</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageproduct.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Laptop</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                 <span class="section">Laptop Info</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pro_age">Product Age <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="pro_age" id="pro_age" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
										<option value="1" <?php if($this->pro_age=='1') echo 'selected="selected"'; ?>>New</option>
										<option value="2" <?php if($this->pro_age=='2') echo 'selected="selected"'; ?>>Middle Age</option>
										<option value="3" <?php if($this->pro_age=='3') echo 'selected="selected"'; ?>>Old</option>
										<option value="4" <?php if($this->pro_age=='4') echo 'selected="selected"'; ?>>Extinct</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Product Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="productname" name="productname" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->productname; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="pro_img">Product Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                       <input type="file" id="pro_img" name="pro_img" class="form-control col-md-4 col-xs-12">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="pro_img_alt" name="pro_img_alt" class="form-control col-md-4col-xs-12" placeholder="Alt text" value="<?php echo $this->pro_img_alt; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="pro_img_title" name="pro_img_title" class="form-control col-md-4 col-xs-12" placeholder="Image Title" value="<?php echo $this->pro_img_title; ?>">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <?php if($mode=="Edit") { ?>
										<img src="updated/<?php echo $this->pro_img; ?>" style="max-height: 80px;" />
										<?php } ?>
                                    </div>
                                 </div>
								 <span class="section">Product Type</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="category" id="category" class="form-control col-md-7 col-xs-12" required>
                                       	<?php 
										$x=1;
										$sql_cat = "select * from ".WR_PROCAT." where id=3 order by sorting asc";
										$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
										foreach ($row_cat as $r_cat)
										{
										?>
                                       	<option value="<?php echo $r_cat['id']; ?>" <?php if($this->category==$r_cat['id']) echo 'selected'; ?>><?php echo $r_cat['category']; ?></option>
                                       	<?php } ?>
                                       </select>
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Brand <span class="required">*</span>
									</label>
									<div class="col-md-7 col-sm-7 col-xs-12">
									   <select name="brand" id="brand" class="form-control col-md-7 col-xs-12" required>
										<option value="">Select</option>
										<?php 
										$x=1;
										$sql_brd = "select * from ".WR_BRANDS." where procat='3' order by sorting asc";
										$row_brd = $this->db->fetch_query($sql_brd,$this->db->pdo_open());
										foreach ($row_brd as $r_brd)
										{
											$ProCatName = $this->getProductCatName($r_brd['procat']);
										?>
										<option value="<?php echo $r_brd['id']; ?>" <?php if($this->brand==$r_brd['id']) echo 'selected'; ?>><?php echo $r_brd['brand_name'].' - '.$ProCatName; ?></option>
										<?php } ?>
									   </select>
									</div>
								 </div>
								 
								 <?php 
								 	$wr = 0;
								 ?>
								 <div class="item form-group options">
									<label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Model <span class="required">*</span>
									</label>
									<div class="col-md-10 col-sm-10 col-xs-12" id="allprodctdiv">
										<?php 
										if($mode=='Edit'){
											$sql_prz = "select * from ".WR_PRODUCT_PRICE." where product_id='".$id."' order by timestamp desc";
											$row_prz = $this->db->fetch_query($sql_prz,$this->db->pdo_open());
											foreach ($row_prz as $r_prz){
										?>
											<div class="row" style="background: #e3e3e3; padding: 20px 0px; margin-bottom: 10px;">
												<div class="col-md-3">
													<strong>Model (Screen Size)</strong>
													<br />
													<select name="model[]" class="form-control">
														<option value="">Select Model</option>
														<?php
														$sql_cat = "select * from ".WR_MODEL." where category='3' order by sorting asc";
														$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
														foreach ($row_cat as $r_cat)
														{
														?>
														<option value="<?php echo $r_cat['id']; ?>" <?php if($r_cat['id']==$r_prz['variant']) { echo 'selected="selected"'; } ?>><?php echo $r_cat['model']; ?></option>
														<?php 
														}
														?>
													</select>
												</div>
												
												<div class="col-md-3">
													<strong>Year</strong>
													<br />
													<input type="text" name="released_year[]" placeholder="Year" value="<?php echo $r_prz['released_year']; ?>" class="form-control" />
												</div>
												<div class="col-md-3">
													<strong>Processor</strong>
													<br />
													<input type="text" name="processor[]" placeholder="Processor" value="<?php echo $r_prz['processor']; ?>" class="form-control" />
												</div>
												<div class="col-md-3">
													<strong>Ram</strong>
													<br />
													<input type="text" name="ram[]" placeholder="Ram" value="<?php echo $r_prz['ram']; ?>" class="form-control" />
												</div>
												
												<div class="col-md-4">
													<strong>Good Price</strong>
													<br />
													<input type="text" name="modelprice[]" placeholder="Good Price" value="<?php echo $r_prz['price']; ?>" class="form-control" />
												</div>
												<div class="col-md-4">
													<strong>Worn Price</strong>
													<br />
													<input type="text" name="faultyprice[]" placeholder="Worn Price" value="<?php echo $r_prz['faulty_price']; ?>" class="form-control" />
												</div>
												<div class="col-md-4">
													<strong>Faulty Price</strong>
													<br />
													<input type="text" name="scrapprice[]" placeholder="Faulty Price" value="<?php echo $r_prz['scrap_price']; ?>" class="form-control" />
												</div>
												
											</div>
										<?php 
											}
										}
										else{
										?>
										<div class="row" style="background: #e3e3e3; padding: 20px 0px; margin-bottom: 10px;">
											<div class="col-md-3">
												<strong>Model (Screen Size)</strong>
												<br />
												<select name="model[]" class="form-control">
													<?php
													$sql_cat = "select * from ".WR_MODEL." where category='3' order by sorting asc";
													$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
													foreach ($row_cat as $r_cat)
													{
													?>
													<option value="<?php echo $r_cat['id']; ?>"><?php echo $r_cat['model']; ?></option>
													<?php 
													}
													?>
												</select>
											</div>
											
											<div class="col-md-3">
												<strong>Year</strong>
												<br />
												<input type="text" name="released_year[]" placeholder="Year" value="" class="form-control" />
											</div>
											<div class="col-md-3">
												<strong>Processor</strong>
												<br />
												<input type="text" name="processor[]" placeholder="Processor" value="" class="form-control" />
											</div>
											<div class="col-md-3">
												<strong>Ram</strong>
												<br />
												<input type="text" name="ram[]" placeholder="Ram" value="" class="form-control" />
											</div>
											
											<div class="col-md-4">
												<strong>Good Price</strong>
												<br />
												<input type="text" name="modelprice[]" placeholder="Good Price" value="<?php echo $mpval;?>" class="form-control" />
											</div>
											<div class="col-md-4">
												<strong>Worn Price</strong>
												<br />
												<input type="text" name="faultyprice[]" placeholder="Worn Price" value="<?php echo $faval;?>" class="form-control" />
											</div>
											<div class="col-md-4">
												<strong>Faulty Price</strong>
												<br />
												<input type="text" name="scrapprice[]" placeholder="Faulty Price" value="<?php echo $scval;?>" class="form-control" />
											</div>
											
										</div>
									   	<?php 
										}
										?>
									</div>
									
									<div class="col-md-12">
										<button name="AddNewButton" id="addMoreProdct" type="button">Add More</button>
									</div>
								 </div>
								 
								
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price Decrease Percentage<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="decrease_percent" name="decrease_percent" required="required" data-validate-minmax="1,100" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->decrease_percent; ?>" min="1" max="100">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Price Decrease in Days<span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="number" id="decrease_in_days" name="decrease_in_days" required="required" data-validate-minmax="1,366" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->decrease_in_days; ?>" min="1" max="365">
                                    </div>
                                 </div>
                                 <span class="section">Important SEO Info</span> 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Page Title <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="title" name="title" required="required" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->title; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Keywords
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="keywords" name="keywords" class="form-control col-md-10 col-xs-12"  value="<?php echo $this->keywords; ?>">
                                    </div>
                                 </div> 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Meta Description
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="metadescription" name="metadescription" class="form-control col-md-10 col-xs-12"><?php echo $this->metadescription; ?></textarea>
                                    </div>
                                 </div>    
                                 <span class="section">Other Options</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Page Sorting <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="sorting" name="sorting" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->sorting; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="status" id="status" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<option value="Show" <?php if($this->status=='Show') echo 'selected'; ?>>Show</option>
                                       	<option value="Hide" <?php if($this->status=='Hide') echo 'selected'; ?>>Hide</option>
                                       </select>
                                    </div>
                                 </div>
								 <span class="section">Other Options</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Notice
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="notice" name="notice" class="form-control col-md-10 col-xs-12"><?php echo $this->notice; ?></textarea>
                                    </div>
                                 </div>
                                 <!-- <div class="ln_solid"></div> -->
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       <input type="hidden" name="sbtfrm" value="sbtval" id="hdn">
                                       <input type="submit" name="sbtbtn" class="btn btn-primary btn-lg" value="Submit"/>
                                    </div>
                                 </div>
                    </form>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}

function AddLaptopToDb(){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["pro_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["pro_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif' || $ext=='webp')
	{						
	$path= str_replace(' ','-',$productname).".".$ext;

	move_uploaded_file($_FILES["pro_img"]["tmp_name"],"updated/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$variant_2=implode(',',$model);
	$insert_sql_array=array();
	$insert_sql_array['pro_age'] = $pro_age;
	$insert_sql_array['productname'] = $productname;
	if($path!='') {
		$insert_sql_array['pro_img'] = $path;
	}
	$insert_sql_array['pro_img_alt'] = $pro_img_alt;
	$insert_sql_array['pro_img_title'] = $pro_img_title;
	$insert_sql_array['brand'] = $brand;
	$insert_sql_array['category'] = $category;
	$insert_sql_array['variant'] = $variant_2;
	/*$insert_sql_array['network'] = $network;
	$insert_sql_array['condition'] = $condition;
	$insert_sql_array['icloudlock'] = $icloudlock;*/
	/*$insert_sql_array['price'] = $price;*/
	$insert_sql_array['decrease_percent'] = $decrease_percent;
	$insert_sql_array['decrease_in_days'] = $decrease_in_days;
	$insert_sql_array['title'] = $title;
	$insert_sql_array['keywords'] = $keywords;
	$insert_sql_array['metadescription'] = $metadescription;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$insert_sql_array['notice'] = $notice;
	$id=$this->db->pdoinsert(WR_PRODUCT,$insert_sql_array);
	$wr=0;
	foreach($model as $vr){
		/*$pricename='modelprice'.$vr;
		$faltyprice='faultyprice'.$vr;
		$scrapprice='scrapprice'.$vr;
		$released_year='released_year'.$vr;
		$processor='processor'.$vr;
		$ram='ram'.$vr;*/
		
		$insert_sql_array2=array();
		$insert_sql_array2['product_id'] = $id;
		$insert_sql_array2['variant'] = $vr;
		$insert_sql_array2['released_year'] = $released_year[$wr];
		$insert_sql_array2['processor'] = $processor[$wr];
		$insert_sql_array2['ram'] = $ram[$wr];
		$insert_sql_array2['price'] = $modelprice[$wr];
		$insert_sql_array2['faulty_price'] = $faultyprice[$wr];
		$insert_sql_array2['scrap_price'] = $scrapprice[$wr];
		$this->db->pdoinsert(WR_PRODUCT_PRICE,$insert_sql_array2);
		
		$wr++;
	}
	$nx = 0;
	/*foreach($network_id as $netid){
		$net_price = $networkprice[$nx];
		$insert_sql_array3=array();
		$insert_sql_array3['product_id'] = $id;
		$insert_sql_array3['network_id'] = $netid;
		$insert_sql_array3['price'] = $net_price;
		$this->db->pdoinsert(WR_PRO_NETWORK,$insert_sql_array3);
	}*/
	?>
	<script>window.location='manageproduct.php';</script>
	<?php
}

function UpdateLaptopToDb($id){
	extract($_REQUEST);
	
	$variant_2=implode(',',$model);
	$update_sql_array=array();
	$update_sql_array['pro_age'] = $pro_age;
	$update_sql_array['productname'] = $productname;
	if($path!='') {
		$update_sql_array['pro_img'] = $path;
	}
	$update_sql_array['pro_img_alt'] = $pro_img_alt;
	$update_sql_array['pro_img_title'] = $pro_img_title;
	$update_sql_array['brand'] = $brand;
	$update_sql_array['category'] = $category;
	
	/*$update_sql_array['network'] = $network;
	$update_sql_array['condition'] = $condition;
	$update_sql_array['icloudlock'] = $icloudlock;*/
	/*$update_sql_array['price'] = $price;*/
	$update_sql_array['decrease_percent'] = $decrease_percent;
	$update_sql_array['decrease_in_days'] = $decrease_in_days;
	$update_sql_array['title'] = $title;
	$update_sql_array['keywords'] = $keywords;
	$update_sql_array['metadescription'] = $metadescription;
	$update_sql_array['sorting'] = $sorting;
	$update_sql_array['status'] = $status;
	$update_sql_array['notice']=$notice;
	$d=$this->db->pdoupdate(WR_PRODUCT,$update_sql_array,'id',$id);

	$this->DeleteProductPrice($id);
	$wr=0;
	foreach($model as $vr){
		
		$insert_sql_array2=array();
		$insert_sql_array2['product_id'] = $id;
		$insert_sql_array2['variant'] = $vr;
		$insert_sql_array2['released_year'] = $released_year[$wr];
		$insert_sql_array2['processor'] = $processor[$wr];
		$insert_sql_array2['ram'] = $ram[$wr];
		$insert_sql_array2['price'] = $modelprice[$wr];
		$insert_sql_array2['faulty_price'] = $faultyprice[$wr];
		$insert_sql_array2['scrap_price'] = $scrapprice[$wr];
		$this->db->pdoinsert(WR_PRODUCT_PRICE,$insert_sql_array2);
	
		$wr++;
	
	}
	?>
	<script>window.location='manageproduct.php';</script>
	<?php

}


function getNetworkName($id){
	$sql = "select network_name from ".WR_MOBILE_NETWORK." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	return $row['network_name'];
}
function DeleteData($id){
	$this->unlinkfile(WR_PRODUCT,'pro_img',$id,'updated/');
	$sql = "delete from ".WR_PRODUCT." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	$delpath=$dir.$row['pro_img'];
	unlink($delpath);
}	
function DeleteProductPrice($id){
	$sql = "delete from ".WR_PRODUCT_PRICE." where product_id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
function DeleteNetworkPrice($id){
	$sql = "delete from ".WR_PRO_NETWORK." where product_id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
} // end of class/
?>