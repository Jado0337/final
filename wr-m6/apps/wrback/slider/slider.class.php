<?php 
// Page Class contains all functions to manage admin page content. 
class SliderClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function ShowAll($smode='',$id=''){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Slider</h2>
				  
				  <div class="pull-right"><a class="btn btn-info" href="manageslider.php?index=add">Add New</a></div> 	
				  
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Slider Images</code> of the website.</p>
			                                 
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Slider Name</th>
                                          <th class="column-title">Image</th>
                                          <th class="column-title">Sorting</th>
										  <th class="column-title">Status</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_SLIDER." where 1 ";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer tr_datawr">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['slider_name']; ?></td>
                                          <td class=" "><img src="../uploads/<?php echo $arr['img_path']; ?>" style="max-height: 80px;" /></td>
                                          <td class=" "><?php echo $arr['sorting']; ?></td>
										  <td class=" "><?php echo $arr['status']; ?></td>
                                          <td class=" last">
                                          <a href="manageslider.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> / 
										  <a class="btn_delete" id="<?php echo $arr[id];?>"  href="javascript:void;">Delete </a>
                                         
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
			$sql = "select * from ".WR_SLIDER." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());

			$this->slider_name=$record['slider_name'];
			$this->text1=$record['text1'];
			$this->text2=$record['text2'];
			$this->text3=$record['text3'];
			$this->text4=$record['text4'];
			$this->text5=$record['text5'];
			$this->text6=$record['text6'];
			$this->img_path=$record['img_path'];
			$this->img_alt=$record['img_alt'];
			$this->img_title=$record['img_title'];
			$this->status=$record['status'];
			$this->sorting=$record['sorting'];
		}
		else{
			$this->slider_name=$_POST['slider_name'];
			$this->text1=$_POST['text1'];
			$this->text2=$_POST['text2'];
			$this->text3=$_POST['text3'];
			$this->text4=$_POST['text4'];
			$this->text5=$_POST['text5'];
			$this->text6=$_POST['text6'];
			$this->img_path=$_POST['img_path'];
			$this->img_alt=$_POST['img_alt'];
			$this->img_title=$_POST['img_title'];
			$this->status=$_POST['status'];
			$this->sorting=$_POST['sorting'];
		}
	
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Slider</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageslider.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy <?php echo $mode; ?> <code>Slider</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                
                                 <span class="section">Slider Info</span>
                                 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Slider Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="slider_name" name="slider_name" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->slider_name; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Small Heading <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="text1" name="text1" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->text1; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Black Heading <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="text2" name="text2" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->text2; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Blue Heading <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="text3" name="text3" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->text3; ?>">
                                    </div>
                                 </div>
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Paragraph <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="text4" name="text4" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->text4; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Button Text <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="text5" name="text5" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->text5; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Button Link <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="text6" name="text6" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->text6; ?>">
                                    </div>
                                 </div>
                                 
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
                                       	<option value="Hide" <?php if($this->status=='Hide') echo 'selected'; ?>>Hide </option>
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

	$path= 'slider'.$tmx.".".$ext;

	move_uploaded_file($_FILES["img_path"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}

	$insert_sql_array=array();
	$insert_sql_array['slider_name'] = $slider_name;
	$insert_sql_array['text1'] = $text1;
	$insert_sql_array['text2'] = $text2;
	$insert_sql_array['text3'] = $text3;
	$insert_sql_array['text4'] = $text4;
	$insert_sql_array['text5'] = $text5;
	$insert_sql_array['text6'] = $text6;
	if($path!='') {
		$insert_sql_array['img_path'] = $path;
	}
	
	$insert_sql_array['img_alt'] = $img_alt;
	$insert_sql_array['img_title'] = $img_title;
	$insert_sql_array['status'] = $status;
	$insert_sql_array['sorting'] = $sorting;
	$id=$this->db->pdoinsert(WR_SLIDER,$insert_sql_array);
	
	?>
	<script>window.location='manageslider.php';</script>
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

	$path= 'product'.$tmx.".".$ext;

	move_uploaded_file($_FILES["img_path"][tmp_name],"../uploads/".$path); 
	}
		else
		{
			echo 'Invalid file';
		}
	}
	$update_sql_array=array();
	$update_sql_array['slider_name'] = $slider_name;
	$update_sql_array['text1'] = $text1;
	$update_sql_array['text2'] = $text2;
	$update_sql_array['text3'] = $text3;
	$update_sql_array['text4'] = $text4;
	$update_sql_array['text5'] = $text5;
	$update_sql_array['text6'] = $text6;
	$update_sql_array['img_alt'] = $img_alt;
	$update_sql_array['img_title'] = $img_title;
	$update_sql_array['status'] = $status;
	$update_sql_array['sorting'] = $sorting;
	
	if($path!='') {
		$update_sql_array['img_path'] = $path;
	}
	
	$this->db->pdoupdate(WR_SLIDER,$update_sql_array,id,$id);
	
	?>
	<script>window.location='manageslider.php';</script>
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
		   url: "manageslider.php?index=DeleteSlider",
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
	$this->unlinkfile(WR_SLIDER,'img_path',$id,'../uploads/');
	$sql = "delete from ".WR_SLIDER." where id='".$id."' ";
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