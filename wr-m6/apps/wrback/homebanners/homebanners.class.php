<?php 
class HomeBannersClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function ShowAll($smode='',$id=''){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Home Bannners</h2>
				  
				  <?php /*?><div class="pull-right"><a class="btn btn-info" href="homebanners.php?index=add">Add New</a></div> 	<?php */?>
				  
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Home Bannner Images</code> of the website.</p>
			                                 
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Image</th>
										  <th class="column-title">Link</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_HOMEBANNERS." where 1 ";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
										?>
										<tr class="even pointer odd pointer tr_datawr">
											<td class="a-center "><?php echo $x; ?></td>
											<td class=" "><img src="../uploads/<?php echo $arr['img_path']; ?>" style="max-height: 80px;" /></td>
											<td class=" "><?php echo $arr['page_link']; ?></td>
											<td class=" last">
											<a href="homebanners.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a>
											<?php /*?> / <a class="btn_delete" id="<?php echo $arr[id];?>"  href="javascript:void;">Delete </a><?php */?>
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
			$sql = "select * from ".WR_HOMEBANNERS." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			
			$this->img_path=$record['img_path'];
			$this->img_alt=$record['img_alt'];
			$this->img_title=$record['img_title'];
			$this->page_link=$record['page_link'];
		}
		else{
			$this->img_path=$_POST['img_path'];
			$this->img_alt=$_POST['img_alt'];
			$this->img_title=$_POST['img_title'];
			$this->page_link=$_POST['page_link'];
		}
	
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Home Bannner</h2>
				  <div class="pull-right"><a class="btn btn-info" href="homebanners.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Home Bannner</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                
                                 <span class="section">Home Bannner Info</span>

                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="img_path">Slider Image <span class="required">*</span>
                                    </label>
                                    <div class="col-md-2 col-sm-4 col-xs-12">
                                       <input type="file" id="img_path" name="img_path" class="form-control col-md-4 col-xs-12">
                                       
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="img_alt" name="img_alt" class="form-control col-md-4col-xs-12" placeholder="Alt text" value="<?php echo $this->img_alt; ?>">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-12">
                                       <input type="text" id="img_title" name="img_title" class="form-control col-md-4 col-xs-12" placeholder="Image Title" value="<?php echo $this->img_title; ?>">
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                       <?php if($mode=="Edit") { ?>
										<img src="../uploads/<?php echo $this->img_path; ?>" style="max-height: 80px;" />
										<?php } ?>
                                    </div>
                                 </div>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Link <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="page_link" name="page_link" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->page_link; ?>">
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
	
	$tmx=time();
	if ($_FILES["img_path"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["img_path"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						

	$path= 'HB'.$tmx.".".$ext;

	move_uploaded_file($_FILES["img_path"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}

	$insert_sql_array=array();

	if($path!='') {
		$insert_sql_array['img_path'] = $path;
	}
	
	$insert_sql_array['img_alt'] = $img_alt;
	$insert_sql_array['img_title'] = $img_title;
	$insert_sql_array['page_link'] = $page_link;
	$id=$this->db->pdoinsert(WR_HOMEBANNERS,$insert_sql_array);
	
	?>
	<script>window.location='homebanners.php';</script>
	<?php
	
}
	

function UpdateFormDb($id){
	extract($_REQUEST);
	$tmx=time();
	if ($_FILES["img_path"]["error"] > 0)
	{
		$path='';
	}
	else
	{
	$tmpname=$_FILES["img_path"]["name"];
	$ext = pathinfo($tmpname, PATHINFO_EXTENSION);
	$ext = strtolower($ext);
		if($ext== 'jpeg')
			$ext='jpg';
	if($ext=='jpg' || $ext=='png' || $ext=='gif')
	{						

	$path= 'HB'.$tmx.".".$ext;
	move_uploaded_file($_FILES["img_path"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$update_sql_array=array();
	$update_sql_array['img_alt'] = $img_alt;
	$update_sql_array['img_title'] = $img_title;
	$update_sql_array['page_link'] = $page_link;
	
	if($path!='') {
		$update_sql_array['img_path'] = $path;
	}
	
	$this->db->pdoupdate(WR_HOMEBANNERS,$update_sql_array,'id',$id);
	
	?>
	<script>window.location='homebanners.php';</script>
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
		   url: "homebanners.php?index=Delete",
		   data: info,
		   success: function(){
			   /*location.reload();*/
		 }
		});
		  $(this).parents(".tr_datawr").animate({ backgroundColor: "#003" }, "slow")
		  .animate({ opacity: "hide" }, "slow");
		 }
		return false;
		});
		</script>	
	<?php 
}
	
function DeleteData($id){
	$this->unlinkfile(WR_HOMEBANNERS,'img_path',$id,'../uploads/');
	$sql = "delete from ".WR_HOMEBANNERS." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
	
function unlinkfile($table,$col,$id,$dir=''){
	$sql = "select ".$col." from ".$table." where id='".$id."' ";
	$row = $this->db->row($sql,$this->db->pdo_open());
	$delpath=$dir.$row['img_path'];
	unlink($delpath);
}	
	
} // end of class/
?>