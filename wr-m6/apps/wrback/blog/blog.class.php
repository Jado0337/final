<?php 
// Page Class contains all functions to manage admin page content. 
class BlogClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
	
function ShowAll($smode='',$id=''){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Blog</h2>
				  
				  <?php 
					if($smode=='sub') {
						?>
					<div class="pull-right">
						<a class="btn btn-info" href="manageblog.php?index=subadd&pid=<?php echo $id; ?>">Add Sub Page</a>
						<a class="btn btn-success" href="manageblog.php">Back to all Pages</a>
					</div>
						<?php  
					}
					else{
						?>
					<div class="pull-right"><a class="btn btn-info" href="manageblog.php?index=add">Add New Blog</a></div> 	
						<?php 
					}
				  ?>
				  
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Blog</code> on the website.</p>
			                                 
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Heading</th>
                                          <th class="column-title">Blog Date</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_BLOG." where 1 ";
										if($smode=='sub')
											$sql .= " and parent_id= $id";
										else
											$sql .= " and parent_id= 0";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										
										foreach ($record as $arr)
										{
											
									?>
                                       <tr class="even pointer odd pointer tr_delete">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['heading']; ?></td>
                                          <td class=" "><?php echo date('d/m/Y',strtotime($arr['sorting'])); ?></td>
                                          <td class=" last">
                                          <?php 
											/*if($arr['subpages']=='Yes' && $smode=='') {
												?>
											<a href="manageblog.php?index=sub&pid=<?php echo $arr['id']; ?>">SubPages</a> / 	
												<?php 
											} */
                                          ?>
                                          <a href="manageblog.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a>
                                          / <a class="btn_delete" id="<?php echo $arr['id'];?>"  href="javascript:void;">Delete </a>
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
	
function AddEditData($mode='Add',$id='',$smode='',$pid=''){

		if($mode=='Edit'){
			$sql = "select * from ".WR_BLOG." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());

			$this->parent_id=$record['parent_id'];
			$this->heading=$record['heading'];
			$this->content=$record['content'];
			$this->title=$record['title'];
			$this->keywords=$record['keywords'];
			$this->metadescription=$record['metadescription'];
			//$this->category=$record['category'];
			$this->page_img=$record['page_img'];
			$this->img_alt=$record['img_alt'];
			$this->img_title=$record['img_title'];
			$this->sorting=$record['sorting'];
			$this->subpages =$record['subpages'];
			$this->deloption =$record['deloption'];
			
		}
		else{
			if($_GET[pid]!='')
				$this->parent_id=$_GET[pid];
			else 
				$this->parent_id=0;
			$this->heading=$_POST['heading'];
			$this->content=$_POST['content'];
			$this->title=$_POST['title'];
			$this->keywords=$_POST['keywords'];
			$this->metadescription=$_POST['metadescription'];
			//$this->category=$_POST['category'];
			$this->page_img=$_POST['page_img'];
			$this->img_alt=$_POST['img_alt'];
			$this->img_title=$_POST['img_title'];
			$this->sorting=date('Y-m-d');
			$this->subpages =$_POST['subpages'];
			$this->deloption =$_POST['deloption'];
		}
	
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Page</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageblog.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Blog</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                <input type="hidden" name="parent_id" id="parent_id" value="<?php echo $this->parent_id; ?>" />
                                 <span class="section">Blog Info</span>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Heading <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="heading" name="heading" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->heading; ?>">
                                    </div>
                                 </div>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="page_img">Blog Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                       <input type="file" id="page_img" name="page_img" class="form-control col-md-4 col-xs-12">
                                       
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="img_alt" name="img_alt" class="form-control col-md-4col-xs-12" placeholder="Alt text" value="<?php echo $this->img_alt; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="img_title" name="img_title" class="form-control col-md-4 col-xs-12" placeholder="Image Title" value="<?php echo $this->img_title; ?>">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <?php if($mode=="Edit") { ?>
										<img src="../uploads/<?php echo $this->page_img; ?>" style="max-height: 80px;" />
										<?php } ?>
                                    </div>
                                 </div>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product_type">Content <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                       <textarea id="editor" name="content" rows="10" cols="100"><?php echo $this->content; ?></textarea>
										<script>
											CKEDITOR.replace( 'editor', {
												width: '100%',
												height: 500
											} );
										</script>
                                    </div>
                                 </div>
          
                                 <span class="section">Important SEO Info</span> 
                                  
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Blog Title <span class="required">*</span>
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
                                 
                                 <span class="section">Other Blog Details</span>
								
                                 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category">Page Category <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="category" id="category" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<?php 
										$x=1;
										$sql_cat = "select * from ".WR_CATEGORIES." order by sorting asc";
										$row_cat = $this->db->fetch_query($sql_cat,$this->db->pdo_open());
										foreach ($row_cat as $r_cat)
										{
										?>
                                       	<option value="<?php echo $r_cat['id']; ?>" <?php if($this->category==$r_cat['id']) echo 'selected'; ?>><?php echo $r_cat['category']; ?></option>
                                       	<?php } ?>
                                       </select>
                                    </div>
                                 </div><?php */?>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Blog Date <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="date" id="sorting" name="sorting" required="required" class="form-control col-md-7 col-xs-12"  
									   value="<?php echo date('Y-m-d',strtotime($this->sorting)); ?>">
                                    </div>
                                 </div>
                                 
                                 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Blog Sorting <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <input type="number" id="sorting" name="sorting" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->sorting; ?>">
                                    </div>
                                 </div><?php */?>
                                 
                                 <?php //if($_GET[index]!='subadd') { 
								 ?>
                                 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Sub Pages <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="subpages" id="subpages" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<option value="Yes" <?php if($this->subpages=='Yes') echo 'selected'; ?>>Yes</option>
                                       	<option value="No" <?php if($this->subpages=='No') echo 'selected'; ?>>No</option>
                                       </select>
                                    </div>
                                 </div><?php */?>
                                 <?php //} ?>
                                 <?php /*?><div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status">Hide Delete <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                       <select name="deloption" id="deloption" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<option value="Yes" <?php if($this->deloption=='Yes') echo 'selected'; ?>>Yes</option>
                                       	<option value="No" <?php if($this->deloption=='No') echo 'selected'; ?>>No</option>
                                       </select>
                                    </div>
                                 </div><?php */?>
                                 
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
	
	$tmx=time();
	if ($_FILES["page_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["page_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif' || $ext=='webp')
	{						

	$path= 'blog'.$tmx.".".$ext;

	move_uploaded_file($_FILES["page_img"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}

	
	$insert_sql_array=array();
	//$insert_sql_array['parent_id'] = $parent_id;
	if($heading!='')
	$insert_sql_array['heading'] = $heading;
	if($content!='')
	$insert_sql_array['content'] = $content;
	if($title!='')
	$insert_sql_array['title'] = $title;
	if($keywords!='')
	$insert_sql_array['keywords'] = $keywords;
	if($metadescription!='')
	$insert_sql_array['metadescription'] = $metadescription;
	if($img_alt!='')
	$insert_sql_array['img_alt'] = $img_alt;
	if($img_title!='')
	$insert_sql_array['img_title'] = $img_title;
	if($path!='')
	$insert_sql_array['page_img'] = $path;
	if($sorting!='')
	$insert_sql_array['sorting'] = $sorting;
	//$insert_sql_array['category'] = $category;
	/*if($subpages!='')
	$insert_sql_array['subpages'] = $subpages;*/
	//$insert_sql_array['deloption'] = $deloption;
	
	$id=$this->db->pdoinsert(WR_BLOG,$insert_sql_array);
	
	if($_GET[pid]!=''){
		?>
		<script>window.location='?index=sub&pid=<?php echo $_GET[pid]; ?>';</script>
		<?php
	}
	else{
		?>
		<script>window.location='manageblog.php';</script>
		<?php
	}
	
}
	

function UpdateFormDb($id){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["page_img"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["page_img"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif' || $ext=='webp')
	{						

	$path= 'blog'.$tmx.".".$ext;

	move_uploaded_file($_FILES["page_img"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$update_sql_array=array();
	if($heading!='')
	$update_sql_array['heading'] = $heading;
	if($content!='')
	$update_sql_array['content'] = $content;
	if($title!='')
	$update_sql_array['title'] = $title;
	if($keywords!='')
	$update_sql_array['keywords'] = $keywords;
	if($metadescription!='')
	$update_sql_array['metadescription'] = $metadescription;
	if($img_alt!='')
	$update_sql_array['img_alt'] = $img_alt;
	if($img_title!='')
	$update_sql_array['img_title'] = $img_title;
	if($path!='')
	$update_sql_array['page_img'] = $path;
	if($sorting!='')
	$update_sql_array['sorting'] = $sorting;
	//$update_sql_array['category'] = $category;
	/*if($subpages!='')
	$update_sql_array['subpages'] = $subpages;*/
	//$update_sql_array['deloption'] = $deloption;
	
	$this->db->pdoupdate(WR_BLOG,$update_sql_array,id,$id);
	
	if($_GET[pid]!=''){
		?>
		<script>window.location='?index=sub&pid=<?php echo $_GET[pid]; ?>';</script>
		<?php
	}
	else{
		?>
		<script>window.location='manageblog.php';</script>
		<?php
	}
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
		   url: "ajaxcall.php?index=DeleteBlog",
		   data: info,
		   success: function(){
			   //location.reload();
			   
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
	$this->unlinkfile(WR_BLOG,'page_img',$id,'../uploads/');
	$sql = "delete from ".WR_BLOG." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
	
function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	if($row['page_img']!=''){
		$delpath=$dir.$row['page_img'];
		if(file_exists($delpath)){
		unlink($delpath);
		}
	}
}	
	
} // end of class/

?>