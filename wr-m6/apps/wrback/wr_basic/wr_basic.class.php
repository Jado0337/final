<?php 
// Page Class contains all functions to manage admin page content. 
class WRBasic{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
	
function ShowAll($smode='',$id=''){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Basic Details</h2>
					<div class="pull-right"><a class="btn btn-info" href="basic.php?index=add">Add New</a></div> 	
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Basic Details</code> of the website.</p>
			                                 
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Option Name</th>
                                          <th class="column-title">Option value 1</th>
                                          <th class="column-title">Option value 2</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_BASIC." where 1 order by id asc";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['option_name']; ?></td>
                                          <td class=" " style="word-wrap: break-word; max-width:100px;"><?php echo $arr['option_value']; ?></td>
										  <td class=" " style="word-wrap: break-word; max-width:100px;"><?php echo $arr['option_value2']; ?></td>
                                          <td class=" last">
                                          <a href="basic.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> 
										  <?php /*?>/ <a class="btn_delete" id="<?php echo $arr[id];?>"  href="javascript:void;">Delete </a><?php */?>
                                          
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
			$sql = "select * from ".WR_BASIC." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->option_name=$record['option_name'];
			$this->option_value=$record['option_value'];
			$this->option_value2=$record['option_value2'];
		}
		else{
			$this->option_name=$_POST['option_name'];
			$this->option_value=$_POST['option_value'];
			$this->option_value2=$_POST['option_value2'];
		}
	
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Basic Details</h2>
				  <div class="pull-right"><a class="btn btn-info" href="basic.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Basic Details</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                
                                 <span class="section">Basic Info</span>
								 	<div class="item form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="control-label" for="product">Option Name <span class="required">*</span></label>
										   <input type="text" id="option_name" name="option_name" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->option_name; ?>" <?php if($mode=='Edit') echo 'readonly="true"'; ?>>
										</div>
									 </div>
									 
								 <div class="row">
                                 <div class="col-md-6">
									 <div class="item form-group">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<label class="control-label" for="product">Option Value <span class="required">*</span></label>
										   <textarea id="option_value" name="option_value" class="form-control col-md-10 col-xs-12" rows="3"><?php echo $this->option_value; ?></textarea>
										</div>
									 </div>
								 </div>
								 <div class="col-md-6">
								 	<div class="item form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
									<label class="control-label" for="product">Option Value (Optional)
                                    </label>
									   <textarea id="option_value2" name="option_value2" class="form-control col-md-10 col-xs-12" rows="3"><?php echo $this->option_value2; ?></textarea>
                                    </div>
                                 </div>
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
	extract($_REQUEST);
	$insert_sql_array=array();
	if($option_name!='')
	$insert_sql_array['option_name'] = $option_name;
	if($option_value!='')
	$insert_sql_array['option_value'] = $option_value;
	if($option_value2!='')
	$insert_sql_array['option_value2'] = $option_value2;
		
	$id=$this->db->pdoinsert(WR_BASIC,$insert_sql_array);
	?>
	<script>window.location='basic.php';</script>
	<?php
}
	

function UpdateFormDb($id){
	extract($_REQUEST);
	$update_sql_array=array();
	if($option_name!='')
	$update_sql_array['option_name'] = $option_name;
	if($option_value!='')
	$update_sql_array['option_value'] = $option_value;
	if($option_value2!='')
	$update_sql_array['option_value2'] = $option_value2;
	
	$this->db->pdoupdate(WR_BASIC,$update_sql_array,'id',$id);
	?>
	<script>window.location='basic.php';</script>
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
		   url: "basic.php?index=Delete",
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
	$sql = "delete from ".WR_BASIC." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
	
/*function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	$delpath=$dir.$row['page_img'];
	unlink($delpath);
}	*/
	
}

?>