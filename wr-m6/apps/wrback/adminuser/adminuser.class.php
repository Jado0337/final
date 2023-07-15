<?php 
// Front User Class contains all functions of front website users. 
class AdminUser{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function ShowUsers(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>All Admins</h2>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Admins</code> registered with you.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th> #</th>
                                          <th class="column-title">Name </th>
                                          <th class="column-title">Username </th>
                                          <th class="column-title">Phone /Email </th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_ADMIN." ";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['name']; ?></td>
                                          <td class=" "><?php echo $arr['username']; ?></td>
                                          <td class=" "><?php echo $arr['phone']; ?><br><?php echo $arr['email']; ?></td>
                                          <td class=" last"><a href="manageadmin.php?index=edit&uid=<?php echo $arr['id']; ?>">Edit</a> / 
                                          <a class="btn_delete" id="<?php echo $arr[id];?>" href="javascript:void;">Delete</a>
                                          </td>
                                       </tr>
                                    <?php 
										$x++;
										} 
									?>   
									</tbody>
                                 </table>
                              </div>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}
function AddEditUser($mode='Add',$uid=''){
		if($mode=='Edit'){
			$sql = "select * from ".WR_ADMIN." where id='".$uid."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->name=$record['name'];
			$this->username=$record['username'];
			$this->password=$record['password'];
			$this->email=$record['email'];
			$this->phone=$record['phone'];
		}
		else{
			$this->name=$_POST['name'];
			$this->username=$_POST['username'];
			$this->password=$_POST['password'];
			$this->email=$_POST['email'];
			$this->phone=$_POST['phone'];
		}
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2><?php echo $mode; ?> Admins</h2>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
					<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm">
						 <span class="section">Admin Info</span>
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Name <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							   <input id="name" type="text" name="name" data-validate-length-range="5,20" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $this->name; ?>">
							</div>
						 </div>
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Username <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							   <input id="username" type="text" name="username" data-validate-length-range="5,15" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $this->username; ?>">
							</div>
						 </div>
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Password <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							   <input id="password" type="text" name="password" data-validate-length-range="6,20" class="form-control col-md-7 col-xs-12" required="required" value="<?php echo $this->password; ?>">
							</div>
						 </div>
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							   <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->email; ?>">
							</div>
						 </div>
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Phone <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							   <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"  value="<?php echo $this->phone; ?>">
							</div>
						 </div>   
						 <div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Role <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							   <select type="text" id="role" name="role" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12"  >
							       <option value="admin">admin</option>
							        <option value="supervisor">supervisor</option>
							       </select>
							</div>
						 </div>  
						 <div class="ln_solid"></div>
						 <div class="form-group">
							<div class="col-md-6 col-md-offset-3">
							   <input type="hidden" name="adduser" value="sbtuser" id="hdn">
							   <input type="submit" name="userbtn" class="btn btn-primary btn-lg" value="Submit"/>
							</div>
						 </div>
					  </form>
			   </div>
			</div>
		</div>
	</div>
	<?php 
}
function AddUserToDb(){
	extract($_REQUEST);
	$insert_sql_array=array();
	$insert_sql_array['name'] = $name;
	$insert_sql_array['username'] = $username;
	$insert_sql_array['password'] = $password;
	$insert_sql_array['email'] = $email;
	$insert_sql_array['phone'] = $phone;
	$insert_sql_array['role'] = $role;
	$uid=$this->db->pdoinsert(WR_ADMIN,$insert_sql_array);
	?>
	<script>window.location='manageadmin.php';</script>
	<?php
}
function UpdateUserDb($uid){
	extract($_REQUEST);
	$update_sql_array1=array();
	$update_sql_array1['name'] = $name;
	$update_sql_array1['username'] = $username;
	$update_sql_array1['password'] = $password;
	$update_sql_array1['email'] = $email;
	$update_sql_array1['phone'] = $phone;
	$update_sql_array1['role'] = $role;
	$this->db->pdoupdate(WR_ADMIN,$update_sql_array1,id,$uid);
	?>
	<script>window.location='manageadmin.php';</script>
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
		   url: "ajaxcall.php?index=DeleteUsers",
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
function DeleteUser($id){
	$sql = "delete from ".WR_ADMIN." where id='".$id."' ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
}
}
?>