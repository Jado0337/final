<?php 
// Category Class contains all functions to manage categories. 
class ProductCategories{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Categories</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageproductcategories.php?index=add">Add New</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Product Categories</code> which you will provide.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Category</th>
                                          <th class="column-title">Sorting</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_PROCAT." order by sorting asc";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['category']; ?></td>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
                                          <td class=" last"><a href="manageproductcategories.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / 
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
			$sql = "select * from ".WR_PROCAT." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->category=$record['category'];
			$this->display_name=$record['display_name'];
			$this->slug=$record['slug'];
			$this->sorting=$record['sorting'];
			$this->status=$record['status'];
			$this->good_text=$record['good_text'];
			$this->faulty_text=$record['faulty_text'];
			$this->scrap_text=$record['scrap_text'];
		}
		else{
			$this->category=$_POST['category'];
			$this->display_name=$_POST['display_name'];
			$this->slug=$_POST['slug'];
			$this->sorting=$_POST['sorting'];
			$this->status=$_POST['status'];
			$this->good_text=$_POST['good_text'];
			$this->faulty_text=$_POST['faulty_text'];
			$this->scrap_text=$_POST['scrap_text'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Category</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageproductcategories.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Category</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm">
                                 <span class="section">Category Info</span>
                                 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Category Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="category" name="category" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->category; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Menu Display Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="display_name" name="display_name" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->display_name; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Slug (URL value) <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="text" id="slug" name="slug" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->slug; ?>" title="No special characters or space!">
									   <small style="color:#FF0000">Keep it unique for every category. Can not contain any special characters or spaces</small>
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
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_type">Good Condition Text <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="editor1" name="good_text" rows="5" cols="100"><?php echo $this->good_text; ?></textarea>
										<script>
											CKEDITOR.replace( 'editor1', {
												width: '100%',
												height: 200
											} );
										</script>
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_type">Faulty Condition Text <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="editor2" name="faulty_text" rows="5" cols="100"><?php echo $this->faulty_text; ?></textarea>
										<script>
											CKEDITOR.replace( 'editor2', {
												width: '100%',
												height: 200
											} );
										</script>
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_type">Scrap Condition Text <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="editor3" name="scrap_text" rows="5" cols="100"><?php echo $this->scrap_text; ?></textarea>
										<script>
											CKEDITOR.replace( 'editor3', {
												width: '100%',
												height: 200
											} );
										</script>
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
	$insert_sql_array['display_name'] = $display_name;
	$insert_sql_array['slug'] = $slug;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$insert_sql_array['good_text'] = $good_text;
	$insert_sql_array['faulty_text'] = $faulty_text;
	$insert_sql_array['scrap_text'] = $scrap_text;
	$id=$this->db->pdoinsert(WR_PROCAT,$insert_sql_array);
	?>
	<script>window.location='manageproductcategories.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$update_sql_array1=array();
	$update_sql_array1['category'] = $category;
	$update_sql_array1['display_name'] = $display_name;
	$update_sql_array1['slug'] = $slug;
	$update_sql_array1['sorting'] = $sorting;
	$update_sql_array1['status'] = $status;
	$update_sql_array1['good_text'] = $good_text;
	$update_sql_array1['faulty_text'] = $faulty_text;
	$update_sql_array1['scrap_text'] = $scrap_text;
	$this->db->pdoupdate(WR_PROCAT,$update_sql_array1,'id',$id);
	?>
	<script>window.location='manageproductcategories.php';</script>
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
		   url: "ajaxcall.php?index=DeleteProCat",
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
	$sql = "delete from ".WR_PROCAT." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
} // End of Class.
?>