<?php 
// This Class contains all functions to manage Brands. 
class BrandsClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
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
				  <h2>All Brands</h2>
				  <div class="pull-right"><a class="btn btn-info" href="managebrand.php?index=add">Add New</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Product Brands</code> which you will provide.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Brand</th>
										  <th class="column-title">Product Type</th>
										  <th class="column-title">Slug (URL)</th>
                                          <th class="column-title">Sorting</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_BRANDS." order by sorting asc";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['brand_name']; ?></td>
										  <td class=" "><?php echo $this->getProductCatName($arr['procat']); ?></td>
										  <td class=" "><?php echo $arr['url']; ?></td>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
                                          <td class=" last"><a href="managebrand.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / 
                                          <a class="btn_delete" id="<?php echo $arr[id];?>" href="javascript:void;">Delete</a>
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
			$sql = "select * from ".WR_BRANDS." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->procat=$record['procat'];
			$this->brand_name=$record['brand_name'];
			$this->url=$record['url'];
			$this->brand_logo=$record['brand_logo'];
			$this->detail=$record['detail'];
			$this->sorting=$record['sorting'];
			$this->status=$record['status'];
		}
		else{
			$this->procat=$_POST['procat'];
			$this->brand_name=$_POST['brand_name'];
			$this->url=$_POST['url'];
			$this->brand_logo=$_POST['brand_logo'];
			$this->detail=$_POST['detail'];
			$this->sorting=$_POST['sorting'];
			$this->status=$_POST['status'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Brand</h2>
				  <div class="pull-right"><a class="btn btn-info" href="managebrand.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Brand</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                 <span class="section">Brand Category</span>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Brand Category Type <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="procat" id="procat" class="form-control col-md-7 col-xs-12" required="required">
                                       	<option value="">Select</option>
										<?php 
											$x=1;
											$sql_procat = "select * from ".WR_PROCAT." order by sorting asc";
											$record_procat = $this->db->fetch_query($sql_procat,$this->db->pdo_open());
											foreach ($record_procat as $row_procat)
											{
										?>
                                       	<option value="<?php echo $row_procat['id']; ?>" <?php if($this->procat==$row_procat['id']) echo 'selected'; ?>><?php echo $row_procat['category']; ?></option>
										<?php 
											}
										?>
                                       </select>
                                    </div>
                                 </div>
								 
								 <span class="section">Brand Info</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Brand Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="brand_name" name="brand_name" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->brand_name; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Slug (URL value) <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="url" name="url" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->url; ?>" title="No special characters or space!">
									   <small style="color:#FF0000">Keep it unique for every brand. Can not contain any special characters or spaces</small>
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Brand Logo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									   <input type="file" id="brand_logo" name="brand_logo" class="form-control col-md-7 col-xs-12"  />
										<small style="color:#FF0000;">Logo Should be Square i.e. width and height of image should be same. </small><br />
									   <img src="<?php echo 'uploads/'.$this->brand_logo; ?>" style="max-width:80px; max-height:80px;" />
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Description
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									   <textarea name="detail" id="detail" class="form-control col-md-7 col-xs-12"><?php echo $this->detail; ?></textarea>
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Sorting <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="sorting" name="sorting" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->sorting; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="status" id="status" class="form-control col-md-7 col-xs-12" required="required">
                                       	<option value="">Select</option>
                                       	<option value="Show" <?php if($this->status=='Show') echo 'selected'; ?>>Show</option>
                                       	<option value="Hide" <?php if($this->status=='Hide') echo 'selected'; ?>>Hide</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
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
	$tmx=time();
	if ($_FILES["brand_logo"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["brand_logo"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						
	$path= 'brand'.$tmx.".".$ext;
	move_uploaded_file($_FILES["brand_logo"][tmp_name],"uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	extract($_REQUEST);
	$insert_sql_array=array();
	$insert_sql_array['procat'] = $procat;
	$insert_sql_array['brand_name'] = $brand_name;
	$insert_sql_array['url'] = $url;
	if($path!='') {
		$insert_sql_array['brand_logo'] = $path;
	}
	$insert_sql_array['detail'] = $detail;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$id=$this->db->pdoinsert(WR_BRANDS,$insert_sql_array);
	?>
	<script>window.location='managebrand.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["brand_logo"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["brand_logo"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						
	$path= 'brand'.$tmx.".".$ext;
	move_uploaded_file($_FILES["brand_logo"][tmp_name],"uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$update_sql_array=array();
	$update_sql_array['procat'] = $procat;
	$update_sql_array['brand_name'] = $brand_name;
	$update_sql_array['url'] = $url;
	if($path!='') {
		$update_sql_array['brand_logo'] = $path;
	}
	$update_sql_array['detail'] = $detail;
	$update_sql_array['sorting'] = $sorting;
	$update_sql_array['status'] = $status;
	$this->db->pdoupdate(WR_BRANDS,$update_sql_array,id,$id);
	?>
	<script>window.location='managebrand.php';</script>
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
		   url: "ajaxcall.php?index=DeleteBrand",
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
	<?php 
}
function DeleteData($id){
	$this->unlinkfile(WR_BRANDS,'brand_logo',$id,'uploads/');
	$sql = "delete from ".WR_BRANDS." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	$delpath=$dir.$row['brand_logo'];
	unlink($delpath);
}	
} // End of Class.
?>