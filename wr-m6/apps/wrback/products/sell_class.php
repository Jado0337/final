<?php 
class OrderClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function ShowAll(){
	?>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
			   <div class="x_title"> 
				  <h2>All Orders</h2>
				  <?php /*?><div class="pull-right"><a class="btn btn-info" href="manageusers.php?index=add">Add New</a></div><?php */?>
				  <div class="clearfix"></div>
			   </div>
			   <div class="x_content">
			   		<p>Manage all <code>Orders</code> of the website.</p>
			   		 Search :<input style="background:white!important;margin-left:11px;padding:5px;" type="text" name="mob-search-field" id="odr" class="wr-search-field typeahead" placeholder="Search Your Order Here" />
			   		 	<div style="text-align:right;margin-top:-4%;">Tracking Id search :<input style="background:white!important;margin-left:11px;padding:5px;" type="text" name="track4" id="track4" class="wr-search-field typeahead" placeholder="Search Your Order Here" /> <button type="button" id="q_answer4" class="btn btn-default" >search</button>
			   		 	<button style="padding:2px 6px !important;background-color:limegreen;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#export">Export</button>
			   		
			   		</div>
			   		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <table class="table table-striped jambo_table bulk_action"  >
            <thead>
                                       <tr class="headings">
                                          <th class="column-title">Order Detail</th>
										  <th class="column-title">User Detail</th>
										  	  <th class="column-title">Order Status</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    <tbody id="responsecontainer">
                                        
                                    </tbody>
           </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="export" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <form method="POST" action="wr-m6/selexport.php">
              <input style="background:white!important;margin-left:11px;padding:5px;" type="date" name="date3"  class="form-control" placeholder="Enter Date 1" /> 
              </br>
              <input style="background:white!important;margin-left:11px;padding:5px;" type="date" name="date5"  class="form-control" placeholder="Enter Date 2" /> 
              </br>
              <button type="submit" id="" class="btn btn-default" >search</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                              <div class="table-responsive">
                                 <table  style="margin-top:2%;"class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th>#</th>
                                          <th class="column-title">Order Detail</th>
										  <th class="column-title">User Detail</th>
										  <th class="column-title">Product Name</th>
										  <th class="column-title">Label</th>
                                           <th class="column-title">Order Status</th>
                                          <th class="column-title no-link last"><span class="nobr">Action</span></th>
                                       </tr>
                                    </thead>
                                    
                                    <tbody id="ord">
									<?php 
									$x=1;
									$sql = "select *,DATE_FORMAT(Date_TIme, '%e  %M  %Y') as top,DATE_FORMAT(Date_Time,'%H:%i:%s') as TIMEONLY from sellmyphones order by id desc Limit 900";
									$record = $this->db->fetch_query($sql,$this->db->pdo_open());
									foreach ($record as $row)
									{
										
									?>
									
									<tr>
										<td><?php echo $x; ?>
										<td>
											<strong>Order Id: </strong><?php echo $row['id']; ?><br />
										<?php
                                          if ($row['status']!='Compeleted')
{
?>	
											<strong>Total Price: </strong><?php if(!empty($row['revs'])){ echo $row['revs'] ;} else{ echo $row['device_price']; }?><br /><br />
									<?php
                    }
                    ?>							
										</td>
										<td>
											<strong>User Name: </strong><?php echo $row['first_name'].' '.$row['last_name']; ?><br />
												<?php
if ($_SESSION['admin_type']=='admin')
{
    ?>
											<strong>Phone: </strong><?php echo $row['phone']; ?><br />
											<strong>Email: </strong><?php echo $row['email']; ?><br />
											<?php
}
?>
											<strong>Date: </strong><?php echo $row['top']; ?><br />
											<strong>Time: </strong><?php echo $row['TIMEONLY']; ?>
										</td>
										<td>
										
										<?php echo $row['device_name']; ?>
										<?php echo "<br>"; ?>
										<?php if(empty($row['imei'])){?>
									<button style="padding:2px 6px !important;background-color:limegreen;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalz<?php echo $row['id']; ?>">Add Imei Number</button><?php } ?>
									<?php echo "<br>"; ?>
									<strong>IMEI Number: </strong><?php echo $row['imei']; ?>
									<?php echo "<br>"; ?>
									<strong>PO Number: </strong><?php echo $row['ponm']; ?>
									<?php echo "<br>"; ?>
									<div id="myModalz<?php echo $row['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal form-label-left" action="selzsavepoandime.php" method="post" enctype="multipart/form-data" >
 <div class="item form-group">
                                    
                                    <div class="col-md-12">
                                         
                                         <input type="hidden" name="oid" required="required" value="<?php echo $row['id']; ?>"  class="form-control col-md-7 col-xs-12" >
                                         <div class="row">
                                         <div class="col-md-6">
                                           <h3>Imei Number</h3>
                                    </label>
                                    </div>
                                       <div class="col-md-6">
                                           <input type="text" name="ime"   class="form-control col-md-7 col-xs-12" >
                                           </div>
                                           </div>
                                           <div class="row">
                                           <div class="col-md-6">
                                        <h3>Po Number</h3>
                                    </label>
                                       </div>
                                       <div class="col-md-6"><input type="text" name="pos"  class="form-control col-md-7 col-xs-12" >
                                       <div>
                                           
                                       </div>
                                        
                                    </div>
                                    </div>
                                 </div>
                                 </div>
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       
                                       <input type="submit" name="sbtbtn" class="btn btn-primary btn-lg" value="Submit"/>
                                    </div>
                                 </div>
                              </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>	
									
									</td>
									<?php 
							$trk = "select * from pdflabel where label='".$row['label']."' ";
									$trc = $this->db->fetch_query($trk,$this->db->pdo_open());
									foreach ($trc as $tkr)
									{
									}
									    ?>
									<td><?php echo $tkr['code']; ?> </br><button style="padding:2px 6px !important;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>">View Label</button></br><button style="padding:2px 6px !important;background-color:limegreen;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModals<?php echo $row['id']; ?>">Upload Label</button></td>
									<div id="myModal<?php echo $row['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Label</h4>
                    </div>
                    <div class="modal-body">

                        <embed src="uploads/<?php echo $row['label']; ?>" frameborder="0" width="100%" height="400px">

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="myModals<?php echo $row['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Label</h4>
                    </div>
                    <div class="modal-body">

                        <form class="form-horizontal form-label-left" action="updlabels.php" method="post" enctype="multipart/form-data" >
 <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Label One <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                         <input type="hidden" name="oid" required="required" value="<?php echo $row['id']; ?>"  class="form-control col-md-7 col-xs-12" >
                                       <input type="file" name="image" required="required"  class="form-control col-md-7 col-xs-12" >
                                        
                                    </div>
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                       
                                       <input type="submit" name="sbtbtn" class="btn btn-primary btn-lg" value="Submit"/>
                                    </div>
                                 </div>
                              </form>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
										
										<td><?php echo $row['status']; ?></td>
										<td>
											<a href="mngselorder.php?index=view&id=<?php echo $row['id']; ?>">View Order</a>
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

function ViewData($id){
$sql = "select * from sellmyphones where id='".$id."' ";
$row = $this->db->row($sql,$this->db->pdo_open());
$sql5 = "select * from pdflabel where label='".$row['label']."' ";
$row5 = $this->db->row($sql5,$this->db->pdo_open());

?>
	<div class="row">
		<div class="col-md-12">
                        <div class="x_panel">
                           <div class="x_title">
                              <h2>Order Detail</h2>
                              <div class="clearfix"></div>
                               <?php
                                if ($_GET['message'] !="") {
    echo $_GET['message'];
 }  
   
   ?>                        </div>
                           <div class="x_content">
                              <section class="content invoice">
                                 <!-- title row -->
                                 <div class="row">
                                    <div class="col-xs-12 invoice-header">
                                       <h1>
                                          <i class="fa fa-globe"></i> Order
                                          <small class="pull-right">Date: <?php echo $row['Date_TIme']; ?></small>
                                       </h1>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- info row -->
                                 <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                       User Detail
                                       <address>
                                          <strong><?php echo $row['first_name'].' '.$row['last_name']; ?></strong>
                                         	<?php
if ($_SESSION['admin_type']=='admin')
{
    ?> 
    <br>Phone: <?php echo $row['phone']; ?>
                                          <br>Email: <?php echo $row['email']; ?>
                                          <br>Address: <?php echo $row['house_name'].','.$row['house_number'].','.$row['street'].','.$row['postcode']; ?>
                                          <?php if($row['status']!='Compeleted'){?>
                                      <br>Revised Price : <form method="POST" action="selprevs.php"><input type="hidden" name="odi" id="odi" value="<?php echo $row['id']; ?>" /><input type="number" class="" name="revs"><button style="margin-top:2%;" type="submit" class="btn btn-primary"> Revised</button></form>
                        <?php } ?>                   
                   <?php
}
?>
                                       </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                       <h3>Account Details</h3>
                                       	<?php
if ($_SESSION['admin_type']=='admin')
{
    ?>
                                        <address>
                                          <strong>Account Holder Name: <?php echo $row['first_name'].' '.$row['last_name']; ?></strong>
										  <br><strong>Country: <?php echo $row['country']; ?></strong>
										  <br><strong>Account No.: <?php echo $row['bank_account_number']; ?></strong>
										  <br><strong>Sort Code: <?php echo $row['bank_sort_code']; ?></strong>
										  <br><strong>Paypal Email.: <?php echo $row['paypal_email']; ?></strong>
										 <br><strong>Tracking Number: <?php echo $row5['code']; ?></strong>
                                       </address>
                                       <?php
}
?>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                       <b>Order ID: <?php echo $row['id']; ?></b>
                                       <br>
                                       <br>
                                       <b>Order Date:</b> <?php echo $row['Date_TIme']; ?>
                                       </br>
                                       <b>Last Update:</b> <?php echo $row['Date_Time']; ?>
                                       
                                       <br>
                                        <b>Enter Note :</b><form method="POST" action="selordernotes.php"><input type="hidden" name="odi" id="odi" value="<?php echo $row['id']; ?>" /><input type="hidden" name="uname" id="uname" value="<?php echo $row['first_name'].' '.$row['last_name']; ?>"><textarea name="review" rows="4" cols="50"></textarea></br><button style="margin-top:2%;" type="submit" class="btn btn-primary"> ADD</button></form>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                                 <!-- Table row -->
                                 <div class="row">
                                    <div class="col-xs-12 table">
                                       <table class="table table-striped">
                                          <thead>
                                             <tr>
                                                <th>#</th>
                                                <th>PRODUCT</th>
                                                <th>SPECIFICATIONS</th>
                                                <th>PRICE</th>
												
                                                
                                             </tr>
                                          </thead>
                                          <tbody>
											<?php 
											$zx=1;
											$sql_o = "select * from sellmyphones where id='".$row['id']."' order by id desc";
											$record_o = $this->db->fetch_query($sql_o,$this->db->pdo_open());
											foreach ($record_o as $row_o)
											{
												$sql_pr = "select * from ".WR_PRODUCT." where id='".$row_o['product_id']."' ";
												$row_pr = $this->db->row($sql_pr,$this->db->pdo_open());
											?>
                                             <tr>
                                                <td><?php echo $zx; ?></td>
												<td>
													<a href="manageproduct.php?index=edit&id=<?php echo $row_o['id']; ?>" class="product-image" target="_blank">
													<!--<img src="<?php echo 'uploads/'.$row_pr['pro_img']; ?>" alt="product image" style="max-width:100px;">-->
													</a>
													<p>
													<?php echo $row_o['device_name']; ?><br />
													
													</p>
												</td>
												<td>
												    Network Name:<?php echo $row_o['network']; ?><br />
													
													Product Condition: <?php echo $row_o['device_grade']; ?>
												</td>
												<td>&pound; <?php echo $row_o['device_price']; ?>
    </td>
												
                                             </tr>
                                             <?php 
											 	$zx++;
											 } 
											 ?>
                                          </tbody>
                                       </table>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                 <!-- /.row -->
                                 <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-3">
                                       <p class="lead">Order Status:</p>
                                        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px; font-size:18px;">
                                        	  <input type="hidden" name="uzr_id" id="uzr_id" value="<?php echo $row_o['id']; ?>" />	
                                         <input type="hidden" name="order_id" id="order_id" value="<?php echo $row_o['id']; ?>" />
                                          <input type="hidden" name="prc" id="prc" value="<?php echo $row_o['device_price']; ?> " />
										  
										  Order Status:										  
										    <select id="order_status" name="order_status">
										  	<option value="">Select</option>
											<option value="Placed" <?php if($row_o['status']=='Placed') echo 'selected="selected"'; ?>>Placed</option>
											<option value="Received" <?php if($row_o['status']=='Received') echo 'selected="selected"'; ?>>Received</option>
											<option value="Revised"<?php if($row_o['status']=='Revised') echo 'selected="selected"'; ?>>Revised</option>
											<option value="Pending Payment"<?php if($row['order_status']=='Pending Payment') echo 'selected="selected"'; ?>>Pending Payment</option>
											<option value="Canceled" <?php if($row_o['status']=='Canceled') echo 'selected="selected"'; ?>>Canceled</option>
											<option value="Compeleted" <?php if($row_o['status']=='Compeleted') echo 'selected="selected"'; ?>>Compeleted</option>
										  </select>
										  <br />
										 Revise Price:
										  <input style="margin-top:2%;" type="text" name="rprice" id="rprice" placeholder="Enter Your Price" />
										  <br />
										  Revise Reason:
										   <input style="margin-top:2%;" type="text" name="detail" id="detail" placeholder="Enter Your Reason" />
										   <input style="margin-top:2%;" type="hidden" name="dte" id="dte" value="<?php echo date('Y-m-d H:i:s');?>" />
										   
										  <br />
										  
										  <br />
                                          
										  Shipping Status:
										  <select id="shipping_status" name="shipping_status" style="margin-top:10px;">
										  	<option value="">Select</option>
											<option value="Dispatched" >Dispatched</option>
											<option value="Received" >Received</option>
											<option value="Disapproved">Disapproved</option>
										  </select>
										  <br />
										  Payment Status:
										  <select id="payment_status" name="payment_status" style="margin-top:10px;">
										  	<option value="">Select</option>
											<option value="Dispatched" >Dispatched</option>
											<option value="Received" >Received</option>
											<option value="Disapproved">Disapproved</option>
										  </select>
										  
										  
                                       </p>
                                    </div>
                                    <div class="col-xs-3">
                                         <form enctype="multipart/form-data" method="POST" action="wr-m6/attach.php">
										   <p class="lead">Revise Image:</p>
										   <input style="margin-top:2%;" type="file" name="image[0]"   required/>
										   <input style="margin-top:2%;" type="file" name="image[1]"   />
										   <input style="margin-top:2%;" type="file" name="image[2]"   />
										   <input style="margin-top:2%;" type="file" name="image[3]"   />
										   <input style="margin-top:2%;" type="file" name="image[4]"   />
										   
										    <input type="hidden" name="uid" id="uid" value="<?php echo $row_o['id']; ?>" />
										     <input type="hidden" name="oid" id="oid" value="<?php echo $row_o['ordid']; ?>" />
										      <input type="hidden" name="rev" id="rev" />
										   
										    <button style="margin-top:2%;" type="submit" class="btn btn-primary"> Revise Image Send</button>
										   </form>
										   </div>
                                        
                                    <!-- /.col -->
                                    <div class="col-xs-6">
                                       <p class="lead">Summary</p>
                                       <div class="table-responsive">
                                          <table class="table">
                                             <tbody>
                                                <tr>
                                                   <th style="width:50%">Subtotal:</th>
                                                   <td>&pound; <?php echo $row_o['device_price'];
	?></td>

                                                </tr>
                                                <tr>
                                                   <th>Revised Price:</th>
                                                   <td>&pound;<?php 
                                                   if(!empty($row_o['revs']))
                                                   {
                                                     echo $row_o['revs'];  
                                                   }
                                                   else{
                                                       
                                                   
		echo '';
                                                   }
	
		?> </td>
                                                <tr><input type="radio" name="bedStatus" id="allot" checked="checked" value="allot">No Review
<input type="radio" name="bedStatus" id="transfer" value="transfer">Review</tr>
                                             </tbody>
                                          </table>
                                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
<i class="fa fa-credit-card"></i> Update Status </button>


                                          <table  style="margin-top:2%;"class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th class="column-title">Order</th>
										  <th class="column-title">Name</th>
										  <th class="column-title">Note</th>
										  <th class="column-title">Date</th>
										  <th class="column-title">User</th>
										  <th class="column-title">Update Date</th>
                                          
                                       </tr>
                                    </thead>
                                    	<?php
									$sql39 = "select * from ".Note." where oid='".$row['id']."' order by id desc";
									$recnt = $this->db->fetch_query($sql39,$this->db->pdo_open());
									foreach ($recnt as $row39)
									{
									    ?>
                                    <tbody>
                                                <tr>
                                                    	<td>
											<?php echo $row39['oid']; ?>
											
										</td>	<td>
											<?php echo $row39['uname']; ?>
											
										</td>
											<td>
											<?php echo $row39['note']; ?>
											
										</td>
										<td>
											<?php echo $row39['date']; ?>
											
										</td>
										<td>
											<?php echo $row39['User']; ?>
											
										</td>
										<td>
											<?php echo $row39['Date_Time']; ?>
											
										</td>
                                                      </tr>
                                             </tbody>
                                             <?php
									}
									?>
									</table>
										<h2 style="margin-top:2%;">Revise History</h2>
									<table  style="margin-top:2%;"class="table table-striped jambo_table bulk_action">
                                    <thead>
                                       <tr class="headings">
                                          <th class="column-title">Order</th>
										  <th class="column-title">Note</th>
										  <th class="column-title">Price</th>
										  <th class="column-title">Date</th>
                                          
                                       </tr>
                                    </thead>
                                    	<?php
									$sql40 = "select * from ".wr_history." where userid='".$row['id']."' order by id desc";
									$recnt = $this->db->fetch_query($sql40,$this->db->pdo_open());
									foreach ($recnt as $row40)
									{
									    ?>
                                    <tbody>
                                                <tr>
                                                    	<td>
											<?php echo $row40['userid']; ?>
											
										</td>	
											<td>
											<?php echo $row40['note']; ?>
											
										</td>

										<td>
											<?php echo $row40['prc']; ?>
											
										</td>
										
										<td>
											<?php echo $row40['dte']; ?>
											
										</td>
                                                      </tr>
                                             </tbody>
                                             <?php
									}
									?>
                                       </table>
                                       </div>
                                    </div>
                                    <!-- /.col -->
                                 </div>
                                
                                
                                 <!-- /.row -->
                                 <!-- this row will not appear when printing -->
                                 <div class="row no-print">
                                    <div class="col-xs-12">
                                       <?php /*?><button class="btn btn-default" onClick="window.print();"><i class="fa fa-print"></i> Print</button><?php */?>
                                       
                                      <!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
      </div>
      <div class="modal-body">
          
       <div style="text-align:center;" class="alert alert-info">
  <strong style="font-size:30px;text-align:center;">Confirmation Alert</strong> 
</div>
      </div>
      <div style="text-align:center;">
      <h4 style="font-size:26px;font-weight:600;margin-top:2%;margin-bottom:2%;">Are you sure to update</h4>
      <button class="btn btn-success btn_status_upt" data-dismiss="modal"><i class="fa fa-credit-card"></i> Update Status</button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

                                       <?php /*?><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button><?php */?>
                                    </div>
                                    
                                 </div>
                              </section>
                           </div>
                        </div>
                     </div>
	</div>
<?php 
}

function getProductVariant($id){
$sql = "select model from ".WR_MODEL." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record['model'];
}

function getBrandName($id,$col='brand_name'){
$sql = "select ".$col." from ".WR_BRANDS." where id='".$id."' ";
$record = $this->db->row($sql,$this->db->pdo_open());
return $record[$col];
}
function PageJSCall(){
	?>
		<script type="text/javascript">
		$(document).on('click','.btn_status_upt',function() {
	var user_id = $("#uzr_id").val();
		var order_id = $("#order_id").val();
		var order_status = $("#order_status").val();
		var shipping_status = $("#shipping_status").val();
		var payment_status = $("#payment_status").val();
		var rprice = $("#rprice").val();
		var detail = $("#detail").val();
		var prc = $("#prc").val();
		var dte = $("#dte").val();
		var rev = $("#rev").val();
		var del_id = 1;
		var info = 'user_id=' + user_id;
		$.ajax({
		   type: "POST",
		   url: "ajaxcall.php?index=updateStasel&order_id=" + order_id + "&order_status=" + order_status + "&prc=" + prc + "&shipping_status=" + shipping_status + "&payment_status=" + payment_status + "&rprice=" + rprice + "&detail=" + detail + "&dte=" + dte+ "&rev=" + rev,
		   data: info,
		  success: function(){
			  window.location.reload();
			   console.log(order_id);
		}
		});
	return false;
	
		});
		$(document).ready(function() {
    $('input:radio[name=bedStatus]').change(function() {
        if (this.value == 'allot') {
           $("#rev").val(this.value);
        }
        else if (this.value == 'transfer') {
            $("#rev").val(this.value);
        }
    });
});
		</script>
		
	<?php 
}

function UpdateProStatus($order_id,$order_status,$prc,$shipping_status,$payment_status,$rprice,$detail,$dte,$user_id,$rev){
    if($rev=='transfer'){
    $review='<p style="font-size: 38px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 46px; margin: 0;"><span style="font-size: 38px;"><strong>Please leave us a review</strong></span></p>
<div style="text-align:center;"><a href="https://uk.trustpilot.com/evaluate/recyclepro.co.uk?utm_medium=trustbox&utm_source=TrustBoxReviewCollector"><img src="images/trustpilot_logo.png"></a></div>';
}
else{
    $review='';
}
	$sql_usr="select * from sellmyphones where id=$order_id";
	$row_usr = $this->db->row($sql_usr,$this->db->pdo_open());
	if($order_status=="Received")
	{
	$this->objMail = new PHPMailer();		
	$this->objMail->IsHTML(true);
	$this->objMail->From = 'noreply@recyclepro.co.uk';
	//$this->objMail->addBCC('recyclepro.co.uk+eeb5f46e46@invite.trustpilot.com');
	$this->objMail->FromName = 'Recycle Pro';
	$this->objMail->Sender = 'noreply@recyclepro.co.uk';
	//$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->Subject = 'Your RecyclePro Order Status is Updated.';
	$this->objMail->Body .= '<div id="frame" class="ui-sortable" style="min-height: 250px; transform: scale(1);"><div class="parentOfBg"><table data-module="header-button0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/header-button.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="currentTable">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_re o_bg-dark o_px o_pb-md o_br-t editable" align="center" data-bgcolor="Bg Dark" style="font-size: 0;vertical-align: top;background-color: #242b3d;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;" contenteditable="true">
                    <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td width="200" align="left" valign="top" style="padding:0px 8px;"><![endif]-->
                    <div class="o_col o_col-2" style="display: inline-block;vertical-align: top;width: 100%;max-width: 200px;">
                      <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                      <div class="o_px-xs o_sans o_text o_left o_xs-center" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 16px; line-height: 27.2px;  padding-left: 8px; padding-right: 8px;">
                        <p style="margin-top: 0px;margin-bottom: 0px;"><a class="o_text-white" href="https://example.com/" data-color="White" style="text-decoration: none;outline: none;color: #ffffff;"><img src="img/m6-logo-1.png" width="136" height="36" alt="SimpleApp" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false"></a></p>
                      </div>
                    </div>
                    <!--[if mso]></td><td width="400" align="right" valign="top" style="padding:0px 8px;"><![endif]-->
                  
                    <!--[if mso]></td></tr></table><![endif]-->
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table></div><table data-module="hero-icon-outline0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/hero-icon-outline.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs editable" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;" contenteditable="false">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-ultra_light o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-light editable" align="center" data-bgcolor="Bg Ultra Light" data-color="Light" data-size="Text MD" data-min="15" data-max="23" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #ebf5fa;color: #82899a;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;" contenteditable="false">
                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                      <tbody>
                        <tr>
                          <td class="o_sans o_text o_text-secondary o_b-primary o_px o_py o_br-max" align="center" data-color="Secondary" data-border-top-color="Border Primary" data-border-bottom-color="Border Primary" data-border-left-color="Border Primary" data-border-right-color="Border Primary" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 16px; line-height: 27.2px; color: rgb(66, 70, 81); border: 2px solid rgb(18, 109, 229); border-radius: 96px; padding: 16px;">
                            <img src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/images/shopping_cart-48-primary.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false">
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                        </tr>
                      </tbody>
                    </table>
                    <h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif; font-weight: bold; margin-top: 0px; margin-bottom: 4px; line-height: 39px;"><span style="font-size: 19px;"><br></span><font color="#242b3d"><span style="font-size: 30px;" contenteditable="false" class="editable">Hi '.$row_usr['first_name'].' '.$row_usr['last_name'].' your order has arrived!</span></font></h2><h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif; font-weight: bold; margin-top: 0px; margin-bottom: 4px; line-height: 39px; font-size: larger;">Your order '.$order_id.' has arrived at our warehouse and our quality assessment department will check your items soon.</br>
                    As soon as your device is checked you will receive your payment within next 24 hours in your account.</h2>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"></div><table data-module="content-lg" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/content-lg.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs editable" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;" contenteditable="false">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                 
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"></div><table data-module="content" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/content.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_px-md o_py o_sans o_text o_text-secondary" align="center" data-bgcolor="Bg White" data-color="Secondary" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 13px; line-height: 22.1px; background-color: rgb(255, 255, 255); color: rgb(66, 70, 81); padding: 16px 24px;" contenteditable="false"></td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"></div><div class="parentOfBg"></div><table data-module="spacer0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/spacer.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white" style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;" data-bgcolor="Bg White">&nbsp; </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"></div><div class="parentOfBg"></div><div class="parentOfBg"></div><div class="parentOfBg"></div><table data-module="alert-dark" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/alert-dark.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="" style="position: relative; opacity: 1; top: 0px; left: 0px;">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_px-md o_py" align="left" data-bgcolor="Bg White" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
                      <tbody>
                        <tr>
                          <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #242b3d;color: #ffffff;border-radius: 4px 0px 0px 4px;padding-top: 8px;padding-bottom: 8px;" data-color="White" data-bgcolor="Bg Dark" data-size="Text MD" data-min="15" data-max="23">
                            <img src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/images/warning-24-white.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false">
                          </td>
                          <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top;font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #242b3d;color: #ffffff;border-radius: 0px 4px 4px 0px;padding-left: 16px;padding-right: 16px;padding-top: 8px;padding-bottom: 8px;" data-color="White" data-bgcolor="Bg Dark" data-size="Text XS" data-min="10" data-max="18" contenteditable="false">
                            <p style="margin-top: 0px;margin-bottom: 0px;" contenteditable="false" class="editable">Please note: your order value is subject to change based on our quality assessment. If you’ve sent multiple boxes, this email confirms the arrival of the first box only; your other boxes may still be on their way and your payment will only be processed when all of the items in your order arrive.</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><table data-module="spacer00" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/m15tdSnRMIfjqsFzpJZVHi3y/order_confirmation/thumbnails/spacer.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white" style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;" data-bgcolor="Bg White">&nbsp; </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
    <div class="parentOfBg"></div><div id="edit_link" class="hidden" style="display: none; left: 348.359px; top: 1204px;">

						<!-- Close Link -->
						<div class="close_link" style="display: block;"></div>

						<!-- Edit Link Value -->
						<input type="text" id="edit_link_value" class="createlink" placeholder="Your URL" style="display: inline-block;">

						<!-- Change Image Wrapper-->
						<div id="change_image_wrapper" style="display: none;">

							<!-- Change Image Tooltip -->
							<div id="change_image">

								<!-- Change Image Button -->
								<p id="change_image_button">Change &nbsp; <span class="pixel_result">184 x 184</span></p>

							</div>

							<!-- Change Image Link Button -->
							<input type="button" value="" id="change_image_link">

							<!-- Remove Image -->
							<input type="button" value="" id="remove_image">

						</div>

						<!-- Tooltip Bottom Arrow-->
						<div id="tip"></div>

					</div></div>';
	$this->objMail->WordWrap = 50;
	$this->objMail->Send();
}
	elseif($order_status=="Canceled")
	{
	    $payment_status='Canceled';
	    $recepients = array($row_usr['email'],'saad.majid@m6repairs.co.uk','areeb.tariq@m6repairs.co.uk');
	    foreach($recepients as $recepient){
	$this->objMail = new PHPMailer();		
	$this->objMail->IsHTML(true);
	$this->objMail->From = 'noreply@recyclepro.co.uk';
//	$this->objMail->addBCC('recyclepro.co.uk+eeb5f46e46@invite.trustpilot.com');
	$this->objMail->FromName = 'Recycle Pro';
	$this->objMail->Sender = 'noreply@recyclepro.co.uk';
	//$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->AddAddress($recepient);
	
	if($recepient=='saad.majid@m6repairs.co.uk' || $recepient=='areeb.tariq@m6repairs.co.uk'){
	    $this->objMail->Subject = 'Your Order ID : '.$order_id.' is '.$payment_status.'';
	    $this->objMail->Body .= '
	<table>
  <tr>
    <th>Order ID</th>
    <td>'.$order_id.'</td>
    </tr>
  <tr>
    <th>Name</th>
    <td>'.$row_usr['first_name'].' '.$row_usr['last_name'].'</td>
    </tr>
  <tr>
    <th>Email</th>
     <td>'.$row_usr['email'].'</td>
    </tr>
  <tr>
    <th>Device</th>
    <td>'.$row_usr['device_name'].'</td>
    </tr>
  <tr>
    <th>Price</th>
    <td>'.$prc.'</td>
    </tr>
  <tr>
    <th>Payment</th>
     <td>'.$payment_status.'</td>
    </tr>
  <tr>
    <th>Order status</th>
    <td>'.$order_status.'</td>
    </tr>
  <tr>
    <th>Date</th>
    <td>'.$row_usr['Date_TIme'].'</td>
    </tr>
  <tr>
    <th>Last Update</th>
    <td>'.$row_usr['update_date'].'</td>
  </tr>
  <tr>
    <th>Account Number</th>
    <td>'.$row_usr['bank_account_number'].'</td>
  </tr>
  <tr>
    <th>Sort No</th>
    <td>'.$row_usr['bank_sort_code'].'</td>
  </tr>
  <tr>
    <th>Paypal</th>
    <td>'.$row_usr['paypal_email'].'</td>
  </tr>
  
  </table>
  ';
	}
	else{
	  $this->objMail->Subject = 'Your RecyclePro Order Status is Updated.';  
	$this->objMail->Body .= '<div id="frame" class="ui-sortable" style="min-height: 250px; transform: scale(1);"><div class="parentOfBg"></div><table data-module="header" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/pcVNfzKjZ3goPqkxr2hYT0ws/service_canceled/thumbnails/header.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-dark o_px o_py-md o_br-t o_sans o_text" align="center" data-bgcolor="Bg Dark" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 19px; line-height: 27.55px; background-color: rgb(36, 43, 61); border-radius: 4px 4px 0px 0px; padding: 24px 16px;">
                    <p style="margin-top: 0px;margin-bottom: 0px;"><a class="o_text-white" href="https://example.com/" data-color="White" style="text-decoration: none;outline: none;color: #ffffff;"><img src="img/m6-logo-1.png" width="136" height="36" alt="SimpleApp" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false"></a></p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"><table data-module="hero-white-icon-outline0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/pcVNfzKjZ3goPqkxr2hYT0ws/service_canceled/thumbnails/hero-white-icon-outline.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="currentTable">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-light editable" align="center" data-color="Light" data-bgcolor="Bg White" data-size="Text MD" data-min="15" data-max="23" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 19px; line-height: 27.55px; background-color: rgb(255, 255, 255); color: rgb(130, 137, 154); padding: 64px 24px;" contenteditable="true">
                    <table cellspacing="0" cellpadding="0" border="0" role="presentation">
                      <tbody>
                        <tr>
                          <td class="o_sans o_text o_text-secondary o_b-primary o_px o_py o_br-max" align="center" data-color="Secondary" data-border-top-color="Border Primary" data-border-bottom-color="Border Primary" data-border-left-color="Border Primary" data-border-right-color="Border Primary" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;color: #424651;border: 2px solid #126de5;border-radius: 96px;padding-left: 16px;padding-right: 16px;padding-top: 16px;padding-bottom: 16px;">
                            <img src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/pcVNfzKjZ3goPqkxr2hYT0ws/service_canceled/images/cancel-48-primary.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false">
                          </td>
                        </tr>
                        <tr>
                          <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                        </tr>
                      </tbody>
                    </table>
                    <h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;color: rgb(36, 43, 61);font-size: 29px;line-height: 42.05px;">Order Cancelled!</h2>
                    <p style="margin-top: 0px;margin-bottom: 0px;font-size: larger;" contenteditable="false" class="editable">Dear Customer, your Order '.$order_id.' has been cancelled.</p><p style="margin-top: 0px;margin-bottom: 0px;" contenteditable="false" class="editable"></p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table></div><table data-module="alert-dark" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/pcVNfzKjZ3goPqkxr2hYT0ws/service_canceled/thumbnails/alert-dark.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
            <!--[if mso]><table width="632" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 632px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-white o_px-md o_py editable" align="left" data-bgcolor="Bg White" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;" contenteditable="false">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
                      <tbody>
                        <tr>
                          <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top; font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 19px; line-height: 27.55px; background-color: rgb(36, 43, 61); color: rgb(255, 255, 255); border-radius: 4px 0px 0px 4px; padding-top: 8px; padding-bottom: 8px;" data-color="White" data-bgcolor="Bg Dark" data-size="Text MD" data-min="15" data-max="23">
                            <img src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/pcVNfzKjZ3goPqkxr2hYT0ws/service_canceled/images/warning-24-white.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false">
                          </td>
                          <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top; font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 15px; line-height: 25.5px; background-color: rgb(36, 43, 61); color: rgb(255, 255, 255); border-radius: 0px 4px 4px 0px; padding: 8px 16px;" data-color="White" data-bgcolor="Bg Dark" data-size="Text XS" data-min="10" data-max="18" contenteditable="false">
                            <p style="margin-top: 0px;margin-bottom: 0px;" contenteditable="false" class="editable"><strong>Note:</strong> If you did not wish to cancel your order or do not know why you are receiving this email please contact our customer support for assistance.</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table>
   <div class="parentOfBg"></div><div class="parentOfBg"></div><div id="edit_link" class="hidden" style="display: none; left: 450px; top: 611.25px;">

            <!-- Close Link -->
            <div class="close_link" style="display: block;"></div>

            <!-- Edit Link Value -->
            <input type="text" id="edit_link_value" class="createlink" placeholder="Your URL" style="display: inline-block;">

            <!-- Change Image Wrapper-->
            <div id="change_image_wrapper" style="display: none;">

              <!-- Change Image Tooltip -->
              <div id="change_image">

                <!-- Change Image Button -->
                <p id="change_image_button">Change &nbsp; <span class="pixel_result">36 x 36</span></p>

              </div>

              <!-- Change Image Link Button -->
              <input type="button" value="" id="change_image_link">

              <!-- Remove Image -->
              <input type="button" value="" id="remove_image">

            </div>

            <!-- Tooltip Bottom Arrow-->
            <div id="tip"></div>

          </div></div>';
	}
	$this->objMail->WordWrap = 50;
	$this->objMail->Send();
	    }
}
elseif($order_status=="Pending Payment")
	{
	    $payment_status='Approved';
	    $recepients = array('saad.majid@m6repairs.co.uk','areeb.tariq@m6repairs.co.uk');
	    foreach($recepients as $recepient){
	$this->objMail = new PHPMailer();		
	$this->objMail->IsHTML(true);
	$this->objMail->From = 'noreply@recyclepro.co.uk';
//	$this->objMail->addBCC('recyclepro.co.uk+eeb5f46e46@invite.trustpilot.com');
	$this->objMail->FromName = 'Recycle Pro';
	$this->objMail->Sender = 'noreply@recyclepro.co.uk';
	//$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->AddAddress($recepient);
	$this->objMail->Subject = 'Your Order ID : '.$order_id.' is '.$payment_status.'';
	$this->objMail->Body .= '<div><h3>This Order Has Been '.$payment_status.'</h3></div>
	<table>
 <tr>
    <th>Order ID</th>
    <td>'.$order_id.'</td>
    </tr>
  <tr>
    <th>Name</th>
    <td>'.$row_usr['first_name'].' '.$row_usr['last_name'].'</td>
    </tr>
  <tr>
    <th>Email</th>
     <td>'.$row_usr['email'].'</td>
    </tr>
  <tr>
    <th>Device</th>
    <td>'.$row_usr['device_name'].'</td>
    </tr>
  <tr>
    <th>Price</th>
    <td>'.$prc.'</td>
    </tr>
  <tr>
    <th>Payment</th>
     <td>'.$payment_status.'</td>
    </tr>
  <tr>
    <th>Order status</th>
    <td>'.$order_status.'</td>
    </tr>
  <tr>
    <th>Date</th>
    <td>'.$row_usr['Date_TIme'].'</td>
    </tr>
  <tr>
    <th>Last Update</th>
    <td>'.$row_usr['update_date'].'</td>
  </tr>
  <tr>
    <th>Account Number</th>
    <td>'.$row_usr['bank_account_number'].'</td>
  </tr>
  <tr>
    <th>Sort No</th>
    <td>'.$row_usr['bank_sort_code'].'</td>
  </tr>
  <tr>
    <th>Paypal</th>
    <td>'.$row_usr['paypal_email'].'</td>
  </tr>
  </table>
  ';
	$this->objMail->WordWrap = 50;
	$this->objMail->Send();
}
}
elseif($order_status=="Compeleted")
	{
	    $payment_status='Paid';
	    $recepients = array($row_usr['email'],'saad.majid@m6repairs.co.uk','areeb.tariq@m6repairs.co.uk');
	    foreach($recepients as $recepient){
	$this->objMail = new PHPMailer();		
	$this->objMail->IsHTML(true);
	$this->objMail->From = 'noreply@recyclepro.co.uk';
//	$this->objMail->addBCC('recyclepro.co.uk+eeb5f46e46@invite.trustpilot.com');
	$this->objMail->FromName = 'Recycle Pro';
	$this->objMail->Sender = 'noreply@recyclepro.co.uk';
	//$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->AddAddress($recepient);
		if($recepient=='saad.majid@m6repairs.co.uk' || $recepient=='areeb.tariq@m6repairs.co.uk'){
		    $this->objMail->Subject = 'Your Order ID : '.$order_id.' is '.$payment_status.'';
	    $this->objMail->Body .= '<table>
  <tr>
    <th>Order ID</th>
    <td>'.$order_id.'</td>
    </tr>
  <tr>
    <th>Name</th>
    <td>'.$row_usr['first_name'].' '.$row_usr['last_name'].'</td>
    </tr>
  <tr>
    <th>Email</th>
     <td>'.$row_usr['email'].'</td>
    </tr>
  <tr>
    <th>Device</th>
    <td>'.$row_usr['device_name'].'</td>
    </tr>
  <tr>
    <th>Price</th>
    <td>'.$prc.'</td>
    </tr>
  <tr>
    <th>Payment</th>
     <td>'.$payment_status.'</td>
    </tr>
  <tr>
    <th>Order status</th>
    <td>'.$order_status.'</td>
    </tr>
  <tr>
    <th>Date</th>
    <td>'.$row_usr['Date_TIme'].'</td>
    </tr>
  <tr>
    <th>Last Update</th>
    <td>'.$row_usr['update_date'].'</td>
  </tr>
  <tr>
    <th>Account Number</th>
    <td>'.$row_usr['bank_account_number'].'</td>
  </tr>
  <tr>
    <th>Sort No</th>
    <td>'.$row_usr['bank_sort_code'].'</td>
  </tr>
  <tr>
    <th>Paypal</th>
    <td>'.$row_usr['paypal_email'].'</td>
  </tr>
  
  </table>
  ';
	}
	else{
	    $this->objMail->Subject = 'Your RecyclePro Order Status is Updated.';
	$this->objMail->Body .= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
<head>
<!--[if gte mso 9]><xml><o:OfficeDocumentSettings><o:AllowPNG/><o:PixelsPerInch>96</o:PixelsPerInch></o:OfficeDocumentSettings></xml><![endif]-->
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
<meta content="width=device-width" name="viewport"/>
<!--[if !mso]><!-->
<meta content="IE=edge" http-equiv="X-UA-Compatible"/>
<!--<![endif]-->
<title></title>
<!--[if !mso]><!-->
<!--<![endif]-->
<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}

		table,
		td,
		tr {
			vertical-align: top;
			border-collapse: collapse;
		}

		* {
			line-height: inherit;
		}

		a[x-apple-data-detectors=true] {
			color: inherit !important;
			text-decoration: none !important;
		}
	</style>
<style id="media-query" type="text/css">
		@media (max-width: 660px) {

			.block-grid,
			.col {
				min-width: 320px !important;
				max-width: 100% !important;
				display: block !important;
			}

			.block-grid {
				width: 100% !important;
			}

			.col {
				width: 100% !important;
			}

			.col>div {
				margin: 0 auto;
			}

			img.fullwidth,
			img.fullwidthOnMobile {
				max-width: 100% !important;
			}

			.no-stack .col {
				min-width: 0 !important;
				display: table-cell !important;
			}

			.no-stack.two-up .col {
				width: 50% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num8 {
				width: 66% !important;
			}

			.no-stack .col.num4 {
				width: 33% !important;
			}

			.no-stack .col.num3 {
				width: 25% !important;
			}

			.no-stack .col.num6 {
				width: 50% !important;
			}

			.no-stack .col.num9 {
				width: 75% !important;
			}

			.video-block {
				max-width: none !important;
			}

			.mobile_hide {
				min-height: 0px;
				max-height: 0px;
				max-width: 0px;
				display: none;
				overflow: hidden;
				font-size: 0px;
			}

			.desktop_hide {
				display: block !important;
				max-height: none !important;
			}
		}
	</style>
</head>
<body class="clean-body" style="margin: 0; padding: 0; -webkit-text-size-adjust: 100%; background-color: #FFFFFF;">
<!--[if IE]><div class="ie-browser"><![endif]-->
<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top;" valign="top">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td align="center" style="background-color:#FFFFFF"><![endif]-->
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style=";width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:20px; padding-bottom:20px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:20px; padding-bottom:20px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><a href="https://uk.trustpilot.com/evaluate/recyclepro.co.uk?utm_medium=trustbox&utm_source=TrustBoxReviewCollector" style="outline:none" tabindex="-1" target="_blank"> <img align="center" alt="Logo" border="0" class="center autowidth" src="img/recyclepro.jpg" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 640px; display: block;" title="Logo" width="640"/></a>
<!--[if mso]></td></tr></table><![endif]-->
</div>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #47bcec;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#47bcec;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#47bcec"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style=";width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:60px; padding-bottom:60px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:60px; padding-bottom:60px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 30px; padding-bottom: 0px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#ffffff;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:30px;padding-right:10px;padding-bottom:0px;padding-left:10px;">
<div style="font-size: 14px; line-height: 1.2; color: #ffffff; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 38px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 46px; margin: 0;"><span style="font-size: 38px;"><strong>Please leave us a review</strong></span></p>
'.$review.'
<p style="font-size: 38px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 46px; margin: 0;"><span style="font-size: 38px;"><strong>Payment Sent Successfully</strong></span></p>
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;"></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<a href="login.php"><div align="center" class="img-container center autowidth" style="padding-right: 0px;padding-left: 0px;">
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr style="line-height:0px"><td style="padding-right: 0px;padding-left: 0px;" align="center"><![endif]--><img align="center" alt="Image" border="0" class="center autowidth" src="img/1.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 100%; max-width: 640px; display: block;" title="Image" width="640"/>
<!--[if mso]></td></tr></table><![endif]-->
</div></a>
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 30px; padding-bottom: 0px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#ffffff;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:30px;padding-right:10px;padding-bottom:0px;padding-left:10px;">
<div style="font-size: 14px; line-height: 1.2; color: #ffffff; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 34px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 41px; margin: 0;"><span style="font-size: 34px;"><strong>Dear '.$row_usr['first_name'].' '.$row_usr['last_name'].',</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 0px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#ffffff;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:0px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="font-size: 14px; line-height: 1.2; color: #ffffff; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 30px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 36px; margin: 0;"><span style="font-size: 30px;"><strong>Your Payment has been </strong><strong>transferred</strong><strong> through your selected payment</strong></span><span style="background-color: transparent; font-size: 30px;"><strong> method</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: #c9c9c9;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:#c9c9c9;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:#c9c9c9"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style=";width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#dd1010;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="line-height: 1.2; font-size: 12px; color: #dd1010; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 14px;">
<p style="font-size: 14px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 17px; margin: 0;"><strong><span style="font-size: 20px;">Please note that your payment will appear with the name of M6 Repair Ltd.</span></strong></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style=";width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:25px; padding-bottom:15px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:25px; padding-bottom:15px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<table cellpadding="0" cellspacing="0" class="social_icons" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" valign="top" width="100%">
<tbody>
<tr style="vertical-align: top;" valign="top">
<td style="word-break: break-word; vertical-align: top; padding-top: 10px; padding-right: 10px; padding-bottom: 10px; padding-left: 10px;" valign="top">
<table align="center" cellpadding="0" cellspacing="0" class="social_table" role="presentation" style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-tspace: 0; mso-table-rspace: 0; mso-table-bspace: 0; mso-table-lspace: 0;" valign="top">
<tbody>
<tr align="center" style="vertical-align: top; display: inline-block; text-align: center;" valign="top">
<td style="word-break: break-word; vertical-align: top; padding-bottom: 10px; padding-right: 5px; padding-left: 5px;" valign="top"><a href="https://www.facebook.com/Recycle-pro-102337717901297/" target="_blank"><img alt="Facebook" height="32" src="img/facebook2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Facebook" width="32"/></a></td>
<td style="word-break: break-word; vertical-align: top; padding-bottom: 10px; padding-right: 5px; padding-left: 5px;" valign="top"><a href="https://www.instagram.com/recycleprouk/" target="_blank"><img alt="Instagram" height="32" src="img/instagram2x.png" style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; display: block;" title="Instagram" width="32"/></a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<div style="background-color:transparent;">
<div class="block-grid" style="Margin: 0 auto; min-width: 320px; max-width: 640px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; background-color: transparent;">
<div style="border-collapse: collapse;display: table;width: 100%;background-color:transparent;">
<!--[if (mso)|(IE)]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:transparent;"><tr><td align="center"><table cellpadding="0" cellspacing="0" border="0" style="width:640px"><tr class="layout-full-width" style="background-color:transparent"><![endif]-->
<!--[if (mso)|(IE)]><td align="center" width="640" style=";width:640px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" valign="top"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;"><![endif]-->
<div class="col num12" style="min-width: 320px; max-width: 640px; display: table-cell; vertical-align: top; width: 640px;">
<div style="width:100% !important;">
<!--[if (!mso)&(!IE)]><!-->
<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:5px; padding-bottom:5px; padding-right: 0px; padding-left: 0px;">
<!--<![endif]-->
<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td style="padding-right: 10px; padding-left: 10px; padding-top: 10px; padding-bottom: 10px; font-family: Tahoma, Verdana, sans-serif"><![endif]-->
<div style="color:#555555;font-family:Lato, Tahoma, Verdana, Segoe, sans-serif;line-height:1.2;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
<div style="font-size: 14px; line-height: 1.2; color: #555555; font-family: Lato, Tahoma, Verdana, Segoe, sans-serif; mso-line-height-alt: 17px;">
<p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;"><strong>Copyright © Recycle Pro. All Rights Reserved</strong></span></p>
<p style="font-size: 15px; line-height: 1.2; word-break: break-word; text-align: center; mso-line-height-alt: 18px; margin: 0;"><span style="font-size: 15px;"><strong>Email:info@recyclepro.co.uk</strong></span><br/><span style="font-size: 15px;"><strong>Call Us:+44 1213822532</strong></span></p>
</div>
</div>
<!--[if mso]></td></tr></table><![endif]-->
<!--[if (!mso)&(!IE)]><!-->
</div>
<!--<![endif]-->
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
<!--[if (mso)|(IE)]></td></tr></table></td></tr></table><![endif]-->
</div>
</div>
</div>
<!--[if (mso)|(IE)]></td></tr></table><![endif]-->
</td>
</tr>
</tbody>
</table>
<!--[if (IE)]></div><![endif]-->
</body>
</html>';
}
	$this->objMail->WordWrap = 50;
	$this->objMail->Send();
	    }
}
elseif($order_status=="Revised")
	{
	 extract($_REQUEST);
	$insert_array=array();
	$insert_array['userid'] = $order_id;
	$insert_array['prc'] = $rprice;
	$insert_array['rsn'] = $detail;
	$insert_array['dte'] = $dte;
	$this->db->pdoinsert(wr_history,$insert_array);
	$this->objMail = new PHPMailer();		
	$this->objMail->IsHTML(true);
	$this->objMail->From = 'noreply@recyclepro.co.uk';
	//$this->objMail->addBCC('recyclepro.co.uk+eeb5f46e46@invite.trustpilot.com');
	$this->objMail->FromName = 'Recycle Pro';
	$this->objMail->Sender = 'noreply@recyclepro.co.uk';
	//$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->AddAddress($row_usr['email']);
	$this->objMail->Subject = 'Your RecyclePro Order Status is Updated.';
	$this->objMail->Body .= '<div id="frame" class="ui-sortable" style="min-height: 10px; transform: scale(1);"><div class="parentOfBg"></div><table data-module="header" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/thumbnails/header.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
        <tbody>
        <tr>
            <td class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
                <!--[if mso]><table width="800" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                <table class="o_block-lg last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 800px;margin: 0 auto;">
                    <tbody>
                    <tr>
                        <td class="o_bg-dark o_px o_py-md o_br-t o_sans o_text" align="center" data-bgcolor="Bg Dark" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 17px; line-height: 24.65px; background-color: rgb(36, 43, 61); border-radius: 4px 4px 0px 0px; padding: 24px 16px;">
                            <p style="margin-top: 0px;margin-bottom: 0px;"><a class="o_text-white" href="https://example.com/" data-color="White" style="text-decoration: none;outline: none;color: #ffffff;"><img src="img/m6-logo-1.png" width="136" height="36" alt="SimpleApp" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false"></a></p>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--[if mso]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table><div class="parentOfBg"><table data-module="hero-icon0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/thumbnails/hero-icon.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="currentTable">
        <tbody>
        <tr>
            <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                <!--[if mso]><table width="800" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                <table class="o_block-lg last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 800px;margin: 0 auto;">
                    <tbody>
                    <tr>
                        <td class="o_bg-ultra_light o_px-md o_py-xl o_xs-py-md editable" align="center" data-bgcolor="Bg Ultra Light" style="background-color: #ebf5fa;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 64px;" contenteditable="false">
                            <!--[if mso]><table width="584" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td align="center"><![endif]-->
                            <div class="o_col-6s o_center o_sans o_text-md o_text-light" data-color="Light" data-size="Text MD" data-min="15" data-max="23" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; line-height: 27.55px; max-width: 584px; text-align: center; font-size: 19px; color: rgb(130, 137, 154);">
                                <table class="o_center" cellspacing="0" cellpadding="0" border="0" role="presentation" style="text-align: center;margin-left: auto;margin-right: auto;">
                                    <tbody>
                                    <tr>
                                        <td class="o_sans o_text o_text-white o_bg-primary o_px o_py o_br-max" align="center" data-bgcolor="Bg Primary" data-color="White" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 17px; line-height: 24.65px; background-color: rgb(18, 109, 229); color: rgb(255, 255, 255); border-radius: 96px; padding: 16px;">
                                            <a href="" class=""><img src="https://notification-emails.com/wp-content/themes/notification-emails/template_showcase/simpleapp/sa_ficon-09.png" width="48" height="48" alt="" style="max-width: 48px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false" class=""></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;color: #242b3d;font-size: 30px;line-height: 39px;"><font color="#242b3d"><span style="font-size: 30px;">Payment Revise</span></font></h2><h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif; font-weight: bold; margin-top: 0px; margin-bottom: 4px; line-height: 39px;"><span style="font-family: inherit; font-size: 19px; font-style: inherit; font-weight: inherit; color: rgb(130, 137, 154); text-align: center; background-color: rgb(235, 245, 250); display: inline !important; float: none;" class="editable" contenteditable="false">Dear Customer, the price of your order '.$order_id.' has been revised due to '.$detail.' from&nbsp;£'.$prc.' to&nbsp;£'.$rprice.'. <br> <br> <span style="font-size: 25px;color:black;">Contact our customer care for quiries</span></span></h2><div><span style="font-family: inherit; font-size: 19px; font-style: inherit; font-weight: inherit; color: rgb(130, 137, 154); text-align: center; background-color: rgb(235, 245, 250); display: inline !important; float: none;" class="editable" contenteditable="false"></span></div><div><span style="font-family: inherit; font-size: 19px; font-style: inherit; font-weight: inherit; color: rgb(130, 137, 154); text-align: center; background-color: rgb(235, 245, 250); display: inline !important; float: none;" class="editable" contenteditable="false"><br></span></div>
                                <h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 4%;margin-bottom: 4px;color: #242b3d;font-size: 30px;line-height: 39px;"><font color="#242b3d"><span style="font-size: 30px;"></span></font></h2><h2 class="o_heading o_text-dark o_mb-xxs" data-color="Dark" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif; font-weight: bold; margin-top: 0px; margin-bottom: 4px; line-height: 39px;"><span style="font-family: inherit; font-size: 19px; font-style: inherit; font-weight: inherit; color: rgb(130, 137, 154); text-align: center; background-color: rgb(235, 245, 250); display: inline !important; float: none;" class="editable" contenteditable="false"></span></h2><div></div><div><span style="font-family: inherit; font-size: 19px; font-style: inherit; font-weight: inherit; color: rgb(130, 137, 154); text-align: center; background-color: rgb(235, 245, 250); display: inline !important; float: none;" class="editable" contenteditable="false"><br></span></div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--[if mso]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table></div><table data-module="alert-dark" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/thumbnails/alert-dark.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
        <tbody>
        <tr>
            <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                <!--[if mso]><table width="800" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                <table class="o_block-lg last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 800px;margin: 0 auto;">
                    <tbody>
                    <tr>
                        <td class="o_bg-white o_px-md o_py" align="center" data-bgcolor="Bg White" style="background-color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 16px;padding-bottom: 16px;">
                            <!--[if mso]><table width="584" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td align="center"><![endif]-->
                            <div class="o_col-6s o_center" style="max-width: 584px;text-align: center;">
                                <table width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
                                    <tbody>
                                    <tr>
                                        <td width="40" class="o_bg-dark o_br-l o_text-md o_text-white o_sans o_py-xs" align="right" style="vertical-align: top; font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 19px; line-height: 27.55px; background-color: rgb(36, 43, 61); color: rgb(255, 255, 255); border-radius: 4px 0px 0px 4px; padding-top: 8px; padding-bottom: 8px;" data-bgcolor="Bg Dark" data-color="White" data-size="Text MD" data-min="15" data-max="23">
                                            <img src="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/images/warning-24-white.png" width="24" height="24" alt="" style="max-width: 24px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;" data-crop="false">
                                        </td>
                                        <td class="o_bg-dark o_br-r o_text-xs o_text-white o_sans o_px o_py-xs" align="left" style="vertical-align: top; font-family: Helvetica, Arial, sans-serif; margin-top: 0px; margin-bottom: 0px; font-size: 17px; line-height: 24.65px; background-color: rgb(36, 43, 61); color: rgb(255, 255, 255); border-radius: 0px 4px 4px 0px; padding: 8px 16px;" data-bgcolor="Bg Dark" data-color="White" data-size="Text XS" data-min="10" data-max="18" contenteditable="false">
                                            <p style="margin-top: 0px;margin-bottom: 0px;" contenteditable="false" class="editable"><strong>Note.</strong> If you wish to proceed with this revised price, click on Agree to complete your order. If you do not wish to proceed with the revised price, click Disagree to cancel your order, Thanks.
                                            </p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->
                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--[if mso]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table><div class="parentOfBg"></div><div class="parentOfBg"></div><table data-module="buttons" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/thumbnails/buttons.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
        <tbody>
        <tr>
            <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                <!--[if mso]><table width="800" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                <table class="o_block-lg last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 800px;margin: 0 auto;">
                    <tbody>
                    <tr>
                        <td class="o_bg-white o_px o_pb-md editable" align="center" data-bgcolor="Bg White" style="background-color: #ffffff;padding-left: 16px;padding-right: 16px;padding-bottom: 24px;" contenteditable="false">
                            <!--[if mso]><table cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td align="center" valign="top" style="padding:0px 8px;"><![endif]-->
                            <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                                <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
                                        <tbody>
                                        <tr>
                                            <td class="o_btn o_bg-primary o_br o_heading o_text" align="center" data-bgcolor="Bg Primary" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-size: 17px; line-height: 24.65px; border-radius: 4px;" contenteditable="false">
                                                <form action="mail.php" method="post">
                                                <input type="hidden" name="id" value="'.$order_id.'">
                                                <button  type="submit" class="o_text-white editable"  data-color="White" style="	border: 0;
	  width: 160px;
	  padding: 10px;
	  margin: 20px auto;
		-webkit-border-radius: 5px;
		   -moz-border-radius: 5px;
	   			  border-radius: 11px;
	  display: block;
	  text-decoration: none;
	 	text-align: center;
    font-family:Helvetica Neue, Helvetica, Arial, sans-serif;
	  font-size: 1.2em;" contenteditable="false">Agree</button> </form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--[if mso]></td><td align="center" valign="top" style="padding:0px 8px;"><![endif]-->
                            <div class="o_col_i" style="display: inline-block;vertical-align: top;">
                                <div style="font-size: 24px; line-height: 24px; height: 24px;">&nbsp; </div>
                                <div class="o_px-xs" style="padding-left: 8px;padding-right: 8px;">
                                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
                                        <tbody>
                                        <tr>
                                            <td class="o_btn o_bg-dark o_br o_heading o_text" align="center" data-bgcolor="Bg Dark" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif; font-weight: bold; margin-top: 0px; margin-bottom: 0px; font-size: 17px; line-height: 24.65px; border-radius: 4px;" contenteditable="false">
                                                <form action="decline.php" method="post"><input type="hidden" name="id" value="'.$order_id.'"> <button type="submit" class="o_text-white editable"  data-color="White" style="	border: 0;
	  width: 160px;
	  padding: 10px;
	  margin: 20px auto;
		-webkit-border-radius: 5px;
		   -moz-border-radius: 5px;
	   			  border-radius: 15px;
	  display: block;
	  text-decoration: none;
	 	text-align: center;
    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
	  font-size: 1.2em;" contenteditable="false">Disagree</button></form>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--[if mso]></td></tr></table><![endif]-->




                        </td>
                    </tr>
                    </tbody>
                </table>
                <!--[if mso]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table><table data-module="spacer0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/thumbnails/spacer.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
        <tbody>
        <tr>
            <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                <!--[if mso]><table width="800" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                <table class="o_block-lg last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 800px;margin: 0 auto;">
                    <tbody>
                    <tr>
                        <td class="o_bg-white" style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;" data-bgcolor="Bg White">&nbsp; </td>
                    </tr>
                    </tbody>
                </table>
                <!--[if mso]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table><table data-module="spacer00" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/XbzZf3QGdqYrxL4FiR1y6JkV/service_confirmation/thumbnails/spacer.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
        <tbody>
        <tr>
            <td class="o_bg-light o_px-xs" align="center" data-bgcolor="Bg Light" style="background-color: #dbe5ea;padding-left: 8px;padding-right: 8px;">
                <!--[if mso]><table width="800" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
                <table class="o_block-lg last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 800px;margin: 0 auto;">
                    <tbody>
                    <tr>
                        <td class="o_bg-white" style="font-size: 24px;line-height: 24px;height: 24px;background-color: #ffffff;" data-bgcolor="Bg White">&nbsp; </td>
                    </tr>
                    </tbody>
                </table>
                <!--[if mso]></td></tr></table><![endif]-->
            </td>
        </tr>
        </tbody>
    </table>
        <div id="edit_link" class="hidden" style="display: none; left: 505.359px; top: 552.734px;">

            <!-- Close Link -->
            <div class="close_link" style="display: block;"></div>

            <!-- Edit Link Value -->
            <input type="text" id="edit_link_value" class="createlink" placeholder="Your URL" style="display: inline-block;">

            <!-- Change Image Wrapper-->
            <div id="change_image_wrapper" style="display: none;">

                <!-- Change Image Tooltip -->
                <div id="change_image">

                    <!-- Change Image Button -->
                    <p id="change_image_button">Change &nbsp; <span class="pixel_result">48 x 48</span></p>

                </div>

                <!-- Change Image Link Button -->
                <input type="button" value="" id="change_image_link">

                <!-- Remove Image -->
                <input type="button" value="" id="remove_image">

            </div>

            <!-- Tooltip Bottom Arrow-->
            <div id="tip"></div>

        </div></div>';
	$this->objMail->WordWrap = 50;
	$this->objMail->Send();
	
}
	$update_sql_array=array();
	$update_sql_array['status'] = $order_status;
	$update_sql_array['payment_status'] = $payment_status;
	//$update_sql_array['Date_TIme']=$dte;
	$this->db->pdoupdate(sellmyphones,$update_sql_array,'id',$order_id);

	
}

} // Order Class End
?>