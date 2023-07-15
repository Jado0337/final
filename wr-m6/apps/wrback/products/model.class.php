<?php 
// Category Class contains all functions to manage categories. 
class ProductModel{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Variants</h2>
				  <div class="pull-right"><a class="btn btn-info" href="managemodel.php?index=add">Add New</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Product Categories Variants</code> which you will provide.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Variant Name</th>
                                          <th class="column-title">Sorting</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_MODEL." order by sorting asc";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer tr_delete">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['model']; ?></td>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
                                          <td class=" last"><a href="managemodel.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / 
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
			$sql = "select * from ".WR_MODEL." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->category=$record['category'];
			$this->model=$record['model'];
			$this->sorting=$record['sorting'];
			$this->status=$record['status'];
		}
		else{
			$this->category=$_POST['category'];
			$this->model=$_POST['model'];
			$this->sorting=$_POST['sorting'];
			$this->status=$record['status'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Variant</h2>
				  <div class="pull-right"><a class="btn btn-info" href="managemodel.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Variant</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm">
                                 <span class="section">Variant Info</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Variant Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="model" name="model" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->model; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="category">Product Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="category" id="category" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<?php 
										$x=1;
										$sql_cat = "select * from ".WR_PROCAT." order by sorting asc";
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
	extract($_REQUEST);
	$insert_sql_array=array();
	$insert_sql_array['category'] = $category;
	$insert_sql_array['model'] = $model;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$id=$this->db->pdoinsert(WR_MODEL,$insert_sql_array);
	?>
	<script>window.location='managemodel.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$update_sql_array1=array();
	$update_sql_array1['category'] = $category;
	$update_sql_array1['model'] = $model;
	$update_sql_array1['sorting'] = $sorting;
	$update_sql_array1['status'] = $status;
	$this->db->pdoupdate(WR_MODEL,$update_sql_array1,id,$id);
	?>
	<script>window.location='managemodel.php';</script>
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
		   url: "ajaxcall.php?index=DeleteModel",
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
	$sql = "delete from ".WR_MODEL." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
} // End of Class.
?>