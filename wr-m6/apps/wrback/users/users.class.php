<?php 
// Page Class contains all functions to manage admin page content. 
class UsersClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title"> 
				  <h2>All Users</h2>
				  <?php /*?><div class="pull-right"><a class="btn btn-info" href="manageusers.php?index=add">Add New</a></div><?php */?>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Products</code> of the website.</p>
                              <div class="table-responsive">
                                 <table class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">User ID</th>
										  <th class="column-title">Name</th>
                                          <th class="column-title">Phone</th>
                                          <th class="column-title">Email</th>
										  <th class="column-title">Status</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody>
									<?php 
										$x=1;
										$sql = "select * from ".WR_USER."  order by id desc Limit 1000";
										$record = $this->db->fetch_query($sql,$this->db->pdo_open());
										foreach ($record as $arr)
										{
									?>
                                       <tr class="even pointer odd pointer">
                                          <td class="a-center "><?php echo $x; ?></td>
                                          <td class=" "><?php echo $arr['id']; ?></td>
                                          <td class=" "><?php echo $arr['fname'].' '.$arr['lname']; ?></td>
                                          <td class=" "><?php echo $arr['phone']; ?></td>
										  <td class=" "><?php echo $arr['email']; ?></td>
										  <td class=" "><?php echo $arr['status']; ?></td>
                                          <td class=" last">
                                          <a href="manageusers.php?index=view&id=<?php echo $arr['id']; ?>">View</a> / 
										  <a href="manageusers.php?index=edit&id=<?php echo $arr['id']; ?>">Edit</a> /
										  <a href="delete_user.php?id=<?php echo $arr['id']; ?>">Delete </a>
										  <?php /*?><a class="btn_block" id="<?php echo $arr['id'];?>"  href="javascript:void;">Block </a><?php */?>
										  <?php /*?><a class="btn_delete" id="<?php echo $arr[id];?>"  href="javascript:void;">Delete </a><?php */?>
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

function ViewData($id){
$sql = "select * from ".WR_USER." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());

$this->fname=$record['fname'];
$this->lname=$record['lname'];
$this->phone=$record['phone'];
$this->email=$record['email'];
$this->status=$record['status'];
$this->country=$record['country'];
$this->address1=$record['address1'];
$this->address2=$record['address2'];
$this->postcode=$record['postcode'];
$this->state=$record['state'];
?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>View User Detail</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageusers.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<span class="section">User Info</span>
					<div class="col-md-12">
							<table class="table table-striped jambo_table ">
                            	<tr>
									<th>Name:</th>
									<td><?php echo $this->fname.' '.$this->lname; ?></td>
									<th>User ID:</th>
									<td><?php echo $record['id']; ?></td>
								</tr>
								<tr>
									<th>Phone:</th>
									<td><?php echo $this->phone; ?></td>
									<th>Email:</th>
									<td><?php echo $this->email; ?></td>
								</tr>
								<tr>
									<th>Status:</th>
									<td ><?php echo $this->status; ?></td>
									<th>Country:</th>
									<td ><?php echo $this->country; ?></td>
								</tr>
								<tr>
									<th>Address1:</th>
									<td ><?php echo $this->address1.','.$this->address2.','.$this->postcode; ?></td>
									<th>State:</th>
									<td ><?php echo $this->state; ?></td>
								</tr>
							</table>  		
					</div>
					
					<span class="section">Order Placed</span>
					<table class="table table-striped jambo_table bulk_action">
					<thead>
					   <tr class="headings">
						  <th>#</th>
						  <th class="column-title">Order Detail</th>
						  <th class="column-title">Shipping Status</th>
						  <th class="column-title">Payment Status</th>
						  <th class="column-title">Order Status</th>
						  <th class="column-title no-link last"><span class="nobr">Action</span></th>
					   </tr>
					</thead>
					<tbody>
					<?php 
						$x=1;
						$sql = "select * from ".WR_ORDER." where user_id='".$id."' order by id desc";
						$record = $this->db->fetch_query($sql,$this->db->pdo_open());
						foreach ($record as $row)
						{
						?>
						<tr>
							<td><?php echo $x; ?>
							<td>
								<strong>Order Id: </strong><?php echo $row['id']; ?><br />
								<strong>Total Price: </strong><?php echo $row['total']; ?><br />
								<strong>Shipping Price: </strong><?php echo $row['shipping']; ?><br />
								<strong>Order Total: </strong><?php echo $row['shipping']+$row['total']; ?><br />
							</td>
							<td><?php echo $row['shipping_status']; ?></td>
							<td><?php echo $row['payment_status']; ?></td>
							<td><?php echo $row['order_status']; ?></td>
							<td>
								<a href="#">View Order</a>
							</td>
						</tr>
						<?php 
							$x++;
						}
					?>
			   </div>
			</div>
		</div>
	</div>	
<?php 
}

function EditData($id=''){

			$sql = "select * from ".WR_USER." where id='".$id."' ";
			$record = $this->db->row($sql,$this->db->pdo_open());
			$this->fname=$record['fname'];
			$this->lname=$record['lname'];
			$this->phone=$record['phone'];
			$this->email=$record['email'];
			$this->status=$record['status'];
			$this->country=$record['country'];
			$this->state=$record['state'];
			$this->address1=$record['address1'];
			$this->address2=$record['address2'];
			$this->postcode=$record['postcode'];
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title">
				  <h2>Edit User Detail</h2>
				  <div class="pull-right"><a class="btn btn-info" href="manageusers.php">Back</a></div>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Mannualy Edit <code>User</code>.</p>
			   		<form class="form-horizontal form-label-left" action="" method="post" name="adduserfrm" id="adduserfrm" enctype="multipart/form-data">
                                 <span class="section">User Info</span>
								 
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">First Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="fname" name="fname" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->fname; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Last Name <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="lname" name="lname" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->lname; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Phone <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="phone" name="phone" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->phone; ?>">
                                    </div>
                                 </div>
								 
								 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Email <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="email" name="email" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->email; ?>">
                                    </div>
                                 </div>
                                 
								<div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="status">Status <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <select name="status" id="status" class="form-control col-md-7 col-xs-12" required>
                                       	<option value="">Select</option>
                                       	<option value="unverified" <?php if($this->status=='unverified') echo 'selected'; ?>>Unverified</option>
                                       	<option value="verified" <?php if($this->status=='verified') echo 'selected'; ?>>Verified</option>
										<option value="block" <?php if($this->status=='block') echo 'selected'; ?>>Block</option>
                                       </select>
                                    </div>
                                 </div>
                                  <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Country <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="country" name="country" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->country; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">State <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="state" name="state" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->state; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Address 1 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="address1" name="address1" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->address1; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Address 2 <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="address2" name="address2" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->address2; ?>">
                                    </div>
                                 </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="product">Post Code <span class="required">*</span>
                                    </label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                       <input type="text" id="postcode" name="postcode" required="required" class="form-control col-md-10 col-xs-12" value="<?php echo $this->postcode; ?>">
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

function UpdateFormDb($id){
	extract($_REQUEST);

	
	$update_sql_array=array();
	$update_sql_array['fname'] = $fname;
	$update_sql_array['lname'] = $lname;
	$update_sql_array['phone'] = $phone;
	$update_sql_array['email'] = $email;
	$update_sql_array['status'] = $status;
	$update_sql_array['country'] = $country;
$update_sql_array['state'] = $state;
$update_sql_array['address1'] = $address1;
$update_sql_array['address2'] = $address2;
$update_sql_array['postcode'] = $postcode;
	$this->db->pdoupdate(WR_USER,$update_sql_array,'id',$id);
	
	?>
	<script>window.location='manageusers.php';</script>
	<?php
}




} // End Of CLass
?>