<?php 
class MobileNetworks{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Mobile Networks</h2>
				  <div class="pull-right"><a class="btn btn-info" href="mobilenetworks.php?index=add">Add New</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Mobile Networks</code> which you will provide.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
										  <th class="column-title">Mobile Networks</th>
                                          <?php /*?><th class="column-title">Network Category Name</th><?php */?>
                                          <th class="column-title">Sorting</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_MOBILE_NETWORK." order by sorting asc";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer tr_delete">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['network_name']; ?></td>
										  <?php /*?><td class=" "><?php echo $this->getNetworkCatData($arr['network_cat']); ?></td><?php */?>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
                                          <td class=" last"><a href="mobilenetworks.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / 
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
			$sql = "select * from ".WR_MOBILE_NETWORK." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->network_name=$record['network_name'];
			//$this->network_cat=$record['network_cat'];
			$this->network_img=$record['network_img'];
			$this->sorting=$record['sorting'];
			/*$this->new_age=$record['new_age'];
			$this->middle_age=$record['middle_age'];
			$this->old_age=$record['old_age'];
			$this->extinct=$record['extinct'];*/
			
		}
		else{
			$this->network_name=$_POST['network_name'];
			//$this->network_cat=$_POST['network_cat'];
			$this->network_img=$_POST['network_img'];
			$this->sorting=$_POST['sorting'];
			/*$this->new_age=$_POST['new_age'];
			$this->middle_age=$_POST['middle_age'];
			$this->old_age=$_POST['old_age'];
			$this->extinct=$_POST['extinct'];*/
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Category</h2>
				  <div class="pull-right"><a class="btn btn-info" href="mobilenetworks.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Category</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                 <span class="section">Category Info</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Mobile Network Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="network_name" name="network_name" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->network_name; ?>">
                                    </div>
                                 </div>
								 
								 
								 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="new_age">New Age Product Cost <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="new_age" name="new_age" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->new_age; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="middle_age">Middle Age Product Cost <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="middle_age" name="middle_age" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->middle_age; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="old_age">Old Age Product Cost <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="old_age" name="old_age" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->old_age; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="extinct">Extinct Product Cost <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="extinct" name="extinct" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->extinct; ?>">
                                    </div>
                                 </div>
								 
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">network Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="network_cat" id="network_cat" class="form-control col-md-7 col-xs-12">
									   		<option value="">Select</option>
											<?php 
												$x=1;
												$sql = "select * from ".WR_NETWORK_CAT." order by sorting asc";
												$record = $this->db->fetch_query($sql,$this->db->pdo_open());
												foreach ($record as $arr)
												{
											?>
													<option value="<?php echo $arr['id']; ?>" <?php if($arr['id']==$this->network_cat) echo 'selected="selected"';?>>
													<?php echo $arr['name']; ?></option>
											<?php 
												} 
											?>
									   </select>
                                    </div>
                                 </div><?php */?>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Mobile Network Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
									   <input type="file" name="network_img" id="network_img" class="form-control col-md-7 col-xs-12" />
									   <br />
									   <div class="col-md-12 col-sm-12 col-xs-12">
                                       <?php if($mode=="Edit") { ?>
										<img src="<?php echo '../uploads/'.$this->network_img; ?>" style="max-height: 80px;" />
										<?php } ?>
                                    	</div>
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Sorting <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="sorting" name="sorting" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->sorting; ?>">
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
function getNetworkCatData($id){
$sql = "select * from ".WR_NETWORK_CAT." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['name'];
}
function AddFromToDb(){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["network_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["network_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						
	$path= 'network'.$tmx.".".$ext;
	move_uploaded_file($_FILES["network_img"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$insert_sql_array=array();
	$insert_sql_array['network_name'] = $network_name;
	//$insert_sql_array['network_cat'] = $network_cat;
	if($path!='')
	$insert_sql_array['network_img'] = $path;
	$insert_sql_array['sorting'] = $sorting;
	/*$insert_sql_array['new_age'] = $new_age;
	$insert_sql_array['middle_age'] = $middle_age;
	$insert_sql_array['old_age'] = $old_age;
	$insert_sql_array['extinct'] = $extinct;*/
	$id=$this->db->pdoinsert(WR_MOBILE_NETWORK,$insert_sql_array);
	?>
	<script>window.location='mobilenetworks.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["network_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["network_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						
	$path= 'network'.$tmx.".".$ext;
	move_uploaded_file($_FILES["network_img"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$update_sql_array1=array();
	$update_sql_array1['network_name'] = $network_name;
	//$update_sql_array1['network_cat'] = $network_cat;
	if($path!='')
	$update_sql_array1['network_img'] = $path;
	$update_sql_array1['sorting'] = $sorting;
	/*$update_sql_array1['new_age'] = $new_age;
	$update_sql_array1['middle_age'] = $middle_age;
	$update_sql_array1['old_age'] = $old_age;
	$update_sql_array1['extinct'] = $extinct;*/
	$this->db->pdoupdate(WR_MOBILE_NETWORK,$update_sql_array1,'id',$id);
	?>
	<script>window.location='mobilenetworks.php';</script>
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
		   url: "mobilenetworks.php?index=Delete",
		   data: info,
		   success: function(){
			   /*location.reload();*/
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
	$this->unlinkfile(WR_MOBILE_NETWORK,'network_img',$id,'../uploads/');
	$sql = "delete from ".WR_MOBILE_NETWORK." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	$delpath=$dir.$row[$col];
	unlink($delpath);
}	
} // End of Class.
?>