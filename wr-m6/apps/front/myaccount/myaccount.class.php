<?php 
class MyAccountClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}


function MyAccount(){
?>
<style>
    .act
    {
background-color:#eeeeee;
}</style>
		<div class="account-page-area ptb-30">
                <div class="container">
                   <div class="row">
			<div class="col-sm-12 mt-12">
			<h3 style="text-align: center!important;
    font-size: 46px;"><span style="border-bottom:3px solid #59c422;">Your Account Detail</span></h3>
</div>
		</div>
                    <div class="row">

                        <div style="display:flex!important;margin-top:2%;" class="col-lg-12">
                            
                            	<div class="col-lg-1">
                            	</div>
                            	<div  style="text-align:-webkit-center;cursor: pointer;" class="col-lg-2">
                            	<div class="act" id="b1" style="border:2px solid grey; padding:10%;height:148px;">
									<img style="width:60px;height:60px;margin-bottom:10px;" src="charities/dashboard.webp" >
								</br>
									<a id="b1" style="font-size:15px;font-weight:600;color:grey;" >Dashboard</a>
									</div>
								</div>
								<div style="text-align:-webkit-center;cursor: pointer;" class="col-lg-2">
									<div id="b2" style="border:2px solid grey; padding:10%;height:148px;">
									<img style="width:60px;height:60px;margin-bottom:10px;" src="charities/order.webp" >
									</br>
									<a id="b2" style="font-size:15px;font-weight:600;color:grey;" >Orders Details</a>
									</div>
								</div>
								<div  style="text-align:-webkit-center;cursor: pointer;" class="col-lg-2">
									<div id="b3" style="border:2px solid grey; padding:10%;height:148px;">
									<img style="width:60px;height:60px;margin-bottom:10px;" src="charities/bank.webp" >
									</br>
									<a id="b3" style="font-size:15px;font-weight:600;color:grey;" >Bank Details</a>
									</div>
								</div>
								<div  style="text-align:-webkit-center;cursor: pointer;" class="col-lg-2">
									<div id="b4" style="border:2px solid grey; padding:10%;height:148px;">
									<img style="width:60px;height:60px;margin-bottom:10px;" src="charities/users.webp" >
									</br>
									  <a id="b4"style="font-size:15px;font-weight:600;color:grey;" >Personal Details
                                        </a>
									</div>
								</div>
								<div  style="text-align:-webkit-center;cursor: pointer;" class="col-lg-2">
									<div id="b5" style="border:2px solid grey; padding:10%;height:148px;">
									<img style="width:60px;height:60px;margin-bottom:10px;" src="charities/login.webp" >
									</br>
									<a id="b5" style="font-size:15px;font-weight:600;color:grey;line-height:18px;" >Password Protected</a>
									</div>
								</div>
								<div  style="text-align:-webkit-center;cursor: pointer;" class="col-lg-2">
									<div id="b6" style="border:2px solid grey; padding:10%;height:148px;">
									<img style="width:60px;height:60px;margin-bottom:10px;" src="charities/login.webp" >
									</br>
									<a id="b6" style="font-size:15px;font-weight:600;color:grey;line-height:18px;" >Refrral Email</a>
									</div>
								</div>
                               <div class="col-lg-1">
                            	</div>
                            </ul>
                        </div>
</div>
                        <div style="margin-top:4%;" class="col-lg-12">
                            
                                <div id="one" class=" tab-content myaccount-tab-content tab-pane fade "  role="tabpanel"
                                    aria-labelledby="account-dashboard-tab">
                                    <div class="myaccount-dashboard">
                                        <p>Hello <b><?php echo $_SESSION['username']; ?></b></p>
                                        <p>Check out your latest Order.</p>
										
										<h4 class="small-title">RECENT ORDERS</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>ORDER ID</th>
                                                        <th>DATE</th>
														<th>ORDER STATUS</th>
                                                        
                                                        <th>TOTAL</th>
														<?php /*?><th>SHOPPING</th><?php */?>
														<th>GRAND TOTAL</th>
                                                        <?php /*?><th></th><?php */?>
                                                    </tr>
													<?php 
													$x=1;
													$sql = "select * from ".WR_ORDER." where user_id='".$_SESSION['userid']."' order by timestamp desc limit 0,2";
													$record = $this->db->fetch_query($sql,$this->db->pdo_open());
													foreach ($record as $row)
													{
													?>
                                                    <tr>
                                                        <td><a class="account-order-id" href="#">#<?php echo $row['id']; ?></a></td>
                                                        <td><?php echo date('F d, Y', strtotime($row['timestamp'])); ?></td>
														<td><?php echo $row['order_status']; ?></td>
                                                        
														<td><?php echo $row['total']; ?></td>
														<?php /*?><td><?php echo $row['shipping']; ?></td><?php */?>
														<td><?php echo $row['g_total']; ?></td>
                                                        <?php /*?><td><a href="#" class="ho-button ho-button-sm"><span>View</span></a></td><?php */?>
                                                    </tr>
													<?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
										
                                    </div>
                                </div>
                                <div id="two" class=" tab-content myaccount-tab-content tab-pane fade"  role="tabpanel" aria-labelledby="account-orders-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">MY ORDERS</h4>
                                        <div class="table-responsive">
                                            	<table class="table table-bordered table-hover">
                                            	    <tbody>
                                                <tr>
                                                        <th>ORDER</th>
                                                        <th>DATE</th>
														<th>ORDER STATUS</th>
                                                        	
                                                        
														<?php /*?><th>SHOPPING</th><?php */?>
														<th>GRAND TOTAL</th>
														<th>Invoice</th>
														<th>Products</th>
														<th>Label</th>
														<th>Cancel Order</th>
                                                        <?php /*?><th></th><?php */?>
                                                    </tr>
                                          
													<?php 
													$x=1;
													$sql = "select * from ".WR_ORDER." where user_id='".$_SESSION['userid']."' order by timestamp desc";
													$record = $this->db->fetch_query($sql,$this->db->pdo_open());
													foreach ($record as $row)
													{
													?>
												<tr>
                                                        <td ><a class="account-order-id" href="#">#<?php echo $row['id']; ?></a></td>
                                                        <td ><?php echo date('F d, Y', strtotime($row['timestamp'])); ?></td>
														<td ><?php echo $row['order_status']; ?></td>
                                                        <?php /*?><td><?php echo $row['shipping']; ?></td><?php */?>
														<td ><?php echo $row['g_total']; ?></td>
														  <td ><button style="margin-top:4%; background-color:#ff5722!important;border-color:#ff5722;color:white;"  type="button" class="btn  btn-md" data-toggle="modal" data-target="#inc<?php echo $row['id']; ?>">View Invoice</button></td>
															<td><button style="margin-top:4%; background-color:#8bc34a;border-color:#8bc34a;color:white;"  type="button" class="btn  btn-md" data-toggle="modal" data-target="#prc<?php echo $row['id']; ?>">View Products</button></td>
															<td><button style="margin-top:4%; background-color:#8d51f5;border-color:#8d51f5;color:white;"  type="button" class="btn  btn-md" data-toggle="modal" data-target="#lab<?php echo $row['id']; ?>">View Label</button></td>
														<td><a style="color:white!important;background-color:#2c0048;color:white;" href="" type="button" class="btn btn-info btn-md"  onclick="cnl(<?php echo $row['id']; ?>)" >Cancel Order</a></td>
                                                         </tr>
                                                  <div class="modal fade" id="prc<?php echo $row['id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Products</h4>
        </div>
        <div class="modal-body">
       
       	<?php
       $sql_o = "select * from ".WR_ORDER_DETAIL." where order_id='".$row['id']."' order by id desc";
											$record_o = $this->db->fetch_query($sql_o,$this->db->pdo_open());
											foreach ($record_o as $row_o)
											{
												$sql_pr = "select * from ".WR_PRODUCT." where id='".$row_o['pid']."' ";
												$row_pr = $this->db->row($sql_pr,$this->db->pdo_open());
												?>
												<div class="row">
												<div class="col-lg-4">
       <img src="<?php echo 'wr-m6/uploads/'.$row_pr['pro_img']; ?>" alt="product image" style="max-width:100px;">
       </div>
       <div class="col-lg-4">
       	<h4 class="small-title"><?php echo $row_pr['productname']; ?></h4>
       </div>
   </div>
       <?php }
       
       ?>
      
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>  
   <div class="modal fade" id="lab<?php echo $row['id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Shipping Label</h4>
        </div>
        <div class="modal-body">
       <div class="col-lg-12">
       	<?php
       $sql_t = "select * from ".WR_ORDER." where id='".$row['id']."' order by id desc";
											$record_t= $this->db->fetch_query($sql_t,$this->db->pdo_open());
											foreach ($record_t as $row_t)
											{
											?>
											<embed src="uploads/<?php echo $row_t['label']; ?>" frameborder="0" width="100%" height="400px">
       <?php
        }
       ?>
       	</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  <?php 
													}
													?>
													 </tbody>
                                            </table>
													<?php
													$x=1;
													$sql = "select * from ".WR_ORDER." where user_id='".$_SESSION['userid']."' order by timestamp desc";
													$record = $this->db->fetch_query($sql,$this->db->pdo_open());
													foreach ($record as $row)
													{
													?>       
   <div class="modal fade" id="inc<?php echo $row['id']; ?>" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
           <h4 class="modal-title">Invoice</h4>
        </div>
        <div class="modal-body">
       
        <?php
          
                        $sql_prt = "select *,SUM(total) AS TotalItemsOrdered from ".WR_ORDER_DETAIL." where order_id='".$row['id']."' ";
                        $row_prt = $this->db->row($sql_prt,$this->db->pdo_open());
       $sql_ord= "select * from ".WR_ORDER_DETAIL." where order_id='".$row['id']."' order by id desc";
                      $record_ord = $this->db->fetch_query($sql_ord,$this->db->pdo_open());
                      foreach ($record_ord as $row_ord)
                      {
                        $sql_prd = "select * from ".WR_PRODUCT." where id='".$row_ord['pid']."' ";
                        $row_prd = $this->db->row($sql_prd,$this->db->pdo_open());
                        $sqlin = "select * from ".WR_USER." where id='".$row_ord['user_id']."' ";
                        $rowin = $this->db->row($sqlin,$this->db->pdo_open());
                        $sqlad = "select * from ".WR_ORDER_ADDRESS." where order_id='".$row['id']."' ";
                        $rowad = $this->db->row($sqlad,$this->db->pdo_open());
                       
                       
                        if($rowad['account_no']!='' && $rowad['sort_code']!='')
                        {
                            $pay="Account Number";
                        }
                        if($rowad['paypal_email']!='')
                        {
                            $pay="Paypal";
                        }
                        if($rowad['addr']!='')
                        {
                            $pay="Cheque";
                        }
                        if($rowad['charity_name	']!='')
                        {
                            $pay="Charity";
                        }
                        
                        ?>
                        
   
    <div id="page-wrap">

   <h3 id="header">INVOICE</h3>
    
    <div id="identity">
        <div class="row">
            <div class="col-lg-6">
        <table>
                <tr>
                    <td style="background-color:#eee;" class="meta-head">Name</td>
                    <td><?php echo $rowin['fname'].' '.$rowin['lname']; ?></td>
                </tr>
                <tr>

                    <td  style="background-color:#eee;" class="meta-head">Phone</td>
                    <td><?php echo $rowin['phone']; ?></td>
                </tr>
                <tr>

                    <td  style="background-color:#eee;" class="meta-head">Address</td>
                    <td><?php echo $rowin['address1'].' '.$rowin['address2'].' '.$rowin['postcode']; ?></td>
                </tr>
                

            </table>
            </div>
            <div class="col-lg-4">
                <div id="logo">

              
              <img  src="img/m6-logo-1.png" alt="logo" />
            </div>
		
		
               
            </div>
             </div>
            
            
    
    </div>
    
   
    
    <div>
 <table style="margin-top:4%;" id="meta">
                <tr>
                    <td class="meta-head">Order No#</td>
                    <td><?php echo $row['id'];?></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><?php echo $row['timestamp'];?></td>
                </tr>
            </table>
    
    </div>
    
    <table id="items">
    
      <tr>
          <th>Item</th>
          <th>Product Name</th>
          <th>Unit Cost</th>
          <th>Quantity</th>
          <th>Price</th>
      </tr>
      
      <tr class="item-row">
          <td class="item-name"> <img src="<?php echo 'wr-m6/uploads/'.$row_prd['pro_img']; ?>" alt="product image" style="max-width:100px;"></td>
          <td class="description"><?php echo $row_prd['productname'];?></td>
          <td>£<?php echo $row_ord['price'];?></td>
          <td><?php echo $row_ord['qty'];?></td>
          <td><span class="price">£<?php echo $row_ord['total'];?></span></td>
      </tr>
     
      
      <tr>
          <td colspan="2" class="blank"> </td>
          <td style="background-color:#eee;" colspan="2" class="total-line">Subtotal</td>
          <td class="total-value"><div id="subtotal">£<?php echo $row_prt['TotalItemsOrdered'];?></div></td>
      </tr>
      <tr>

          <td colspan="2" class="blank"> </td>
          <td style="background-color:#eee;" colspan="2" class="total-line">Total</td>
          <td class="total-value"><div id="total">£<?php echo $row_prt['TotalItemsOrdered'];?></div></td>
      </tr>
       <tr>

          <td colspan="2" class="blank"> </td>
          <td style="background-color:#eee;" colspan="2" class="total-line">Payment</td>
          <td class="total-value"><div id="total"><?php echo $pay;?></div></td>
      </tr>
     
    
    </table>
    
    <div id="terms">
      <button class="btn btn-primary hidden-print" onclick="window.print()"><span class="fa fa-print" aria-hidden="true"></span> Print</button>
    </div>
  
  </div>
                        
       <?php }
       ?>
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 
  											<?php
													} 
													?>
													
                                                    
                                              
                                        </div>
                                    </div>
                                </div>
                                 <div id="three" class="tab-content myaccount-tab-content tab-pane fade"  role="tabpanel" aria-labelledby="bank-details-tab">
                                    <div class="myaccount-orders">
                                        <h4 class="small-title">Bank Details</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th>Order Id</th>
                                                        <th>Account Number</th>

														<th>Sort Code</th>
                                                        <th>Paypal</th>
                                                        <th>Cheque</th>
                                                        <th>Charity</th>
                                                        <th>Edit</th>
                                                        
														
														
                                                    </tr>
													<?php 
													$x=1;
													$sql = "select order_id,account_no,paypal_email,addr,charity_name,sort_code from ".WR_ORDER_ADDRESS." where user_id='".$_SESSION['userid']."' ";
													$record = $this->db->fetch_query($sql,$this->db->pdo_open());
													foreach ($record as $row)
													{
													?>
                                                    <tr>
                                                        <td><?php echo $row['order_id']; ?></td>
														<td><?php echo $row['account_no']; ?></td>
                                                        <td><?php echo $row['sort_code']; ?></td>
														<td><?php echo $row['paypal_email']; ?></td>
														<td><?php echo $row['addr']; ?></td>
														<td><?php echo $row['charity_name']; ?></td>
														<td><button style="margin-top:4%;"  type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#bank<?php echo $row['order_id']; ?>">Edit</button></td>
														
														</tr>
														<div class="modal fade" id="bank<?php echo $row['order_id']; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Account Information</h4>
        </div>
        <div class="modal-body">
          <form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				
					<input type="hidden" id="id<?php echo $row['order_id']; ?>" name="id" value="<?php echo $row['order_id']; ?>" required>
						<input type="hidden" id="actalt<?php echo $row['order_id']; ?>" name="actalt" value="<?php echo $row['account_no']; ?>" >
							<input type="hidden" id="srtalt<?php echo $row['order_id']; ?>" name="srtalt" value="<?php echo $row['sort_code']; ?>">
								<input type="hidden" id="pylalt<?php echo $row['order_id']; ?>" name="pylalt" value="<?php echo $row['paypal_email']; ?>" >
								<input type="hidden" id="uname<?php echo $row['order_id']; ?>" name="pylalt" value="<?php echo $rowin['fname'].' '.$rowin['lname']; ?>" >
				
				<div class="single-input ">
					<label for="account-details-firstname">Account Number</label>

					<input type="text" id="acc<?php echo $row['order_id']; ?>" name="acc" value="<?php echo $row['account_no']; ?>" >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Sort Code</label>
					<input type="text" id="srt<?php echo $row['order_id']; ?>" name="srt" value="<?php echo $row['sort_code']; ?>" >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Paypal</label>
					<input type="text" id="ppl<?php echo $row['order_id']; ?>" name="ppl" value="<?php echo $row['paypal_email']; ?>" >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Cheque Address</label>
					<input type="text" id="chq<?php echo $row['order_id']; ?>" name="chq" value="<?php echo $row['addr']; ?>" >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Charity Name</label>
					<input type="text" id="chr<?php echo $row['order_id']; ?>" name="chr" value="<?php echo $row['charity_name']; ?>" >
				</div>
				
				<div class="single-input">
					<a style="color:white!important;" href="" type="button" class="btn btn-info btn-md"  onclick="acc(<?php echo $row['order_id']; ?>)" >Update</a>
				</div>
				</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>   
													<?php } ?>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="four" class="tab-content myaccount-tab-content tab-pane fade"  role="tabpanel" aria-labelledby="account-details-tab">
                                    <div class="myaccount-details">
									 
									<?php 
										extract($_REQUEST);
										if($usrsbt=='saveuserdata')
											$this->updateUserToDB();
										else
											$this->updateUser();
									?>
                                    </div>
                                </div>
								
								<div id="five" class="tab-content myaccount-tab-content tab-pane fade" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
										 <h4 class="small-title">CHANGE PASSWORD</h4>
                                        <?php 
										extract($_REQUEST);
										if($passsbt=='changepassdb')
											$this->updatePassToDB();
										else
											$this->ChangePassword();
										?>
                                        
                                    </div>
                                </div>
                                <div id="six" class="tab-content myaccount-tab-content tab-pane fade" role="tabpanel" aria-labelledby="account-address-tab">
                                    <div class="myaccount-address">
										 <h4 class="small-title">Send Referral Email</h4>
                                        <form action="https://recyclepro.co.uk/wr-m6/refer.php" class="ho-form" method="post">
			<div class="ho-form-inner">
				
								
				
				<div class="single-input ">
					<label for="account-details-firstname">Email One</label>

					<input type="email" id="acc[1]" name="acc[1]"  >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Email Two</label>
				<input type="email" id="acc[2]" name="acc[2]"  >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Email Three</label>
					<input type="email" id="acc[3]" name="acc[3]"  >
				</div>
			
				
				<div class="single-input">
					<button style="color:white!important;" href="" type="submit" class="btn btn-info btn-md"  >Send</a>
				</div>
				</div>
		</form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            
<?php 
}


function updateUser(){
?>
		<?php 
			$sql_usr = "select * from ".WR_USER." where id='".$_SESSION['userid']."' ";
			$row_usr = $this->db->row($sql_usr,$this->db->pdo_open());
		?>
		<form action="" class="ho-form" method="post">
			<div id="refresh">
			<div class="ho-form-inner">

				<div class="single-input">
				<h4 class="small-title">UPDATE PERSONAL INFORMATION</h4>
				</div>
				
				<div class="single-input single-input-half">
					<label for="account-details-firstname">First Name*</label>
					<input type="text" id="firstname" name="firstname" value="<?php echo $row_usr['fname']; ?>" readonly>
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-lastname">Last Name*</label>
					<input type="text" id="lastname" name="lastname" value="<?php echo $row_usr['lname']; ?>" readonly>
				</div>
				<div class="single-input">
					<button  type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Edit</button>
				</div>
			
				<div class="single-input">
			      <h4 class="small-title">UPDATE CONTACT INFORMATION</h4>
				</div>
				<div class="single-input">
					<label for="account-details-email">Email*</label>
					<input type="email" id="email" name="email" value="<?php echo $row_usr['email']; ?>" readonly>
				</div>
				<div class="single-input">
					<label for="account-details-oldpass">Phone Number*</label>
					<input type="text" id="phone" name="phone" value="<?php echo $row_usr['phone']; ?>" readonly>
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-firstname">Country*</label>
					<input type="text" id="country" name="country" value="<?php echo $row_usr['country']; ?>" readonly>
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-lastname">Date of Birth*</label>
					<input type="text" id="db" name="db" value="<?php echo $row_usr['DOB']; ?>" readonly>
				</div>
				<div class="single-input">
					<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal1">Edit</button>
				</div>
				<div class="single-input">
				<h4 class="small-title">UPDATE ADDRESS INFORMATION</h4>
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-firstname">Address 1*</label>
					<input type="text" id="address1" name="address1" value="<?php echo $row_usr['address1']; ?>" readonly>
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-lastname">Address 2*</label>
					<input type="text" id="address2" name="address2" value="<?php echo $row_usr['address2']; ?>" readonly>
				</div>
				<div class="single-input">
					<label for="account-details-lastname">Post Code*</label>
					<input type="text" id="postcode" name="postcode" value="<?php echo $row_usr['postcode']; ?>" readonly>
				</div>
				<div class="single-input">
					<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal2">Edit</button>
				</div>
				
				
				
				 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Personal Information</h4>
        </div>
        <div class="modal-body">
          <form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				
					<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['userid']; ?>" required>
				
				<div class="single-input ">
					<label for="account-details-firstname">First Name*</label>

					<input type="text" id="fname" name="fname" value="<?php echo $row_usr['fname']; ?>" maxlength="32" pattern="[A-Za-z]{1,32}" required>
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Last Name*</label>
					<input type="text" id="lname" name="lname" value="<?php echo $row_usr['lname']; ?>" maxlength="32" pattern="[A-Za-z]{1,32}" required>
				</div>
				<div class="single-input">
					<a style="color:white!important;" href="" type="button" class="btn btn-info btn-md"  onclick="insert()" >Update</a>
				</div>
				</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Contact Information</h4>
        </div>
        <div class="modal-body">
          <form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				
					<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['userid']; ?>" required>
					<div class="single-input">
					<label for="account-details-oldpass">Phone Number*</label>
					<input type="text" id="phn" name="phn" value="<?php echo $row_usr['phone']; ?>" required>
				</div>
				
				<div class="single-input ">
					<label for="account-details-firstname">Country*</label>
					<input type="text" id="cntry" name="cntry" value="<?php echo $row_usr['country']; ?>" required>
				</div>
			<div class="single-input ">
					<label for="account-details-lastname">Date of Birth*</label>
					<input type="date" id="stt" name="stt" value="<?php echo $row_usr['DOB']; ?>" required class="datepicker"  required>
				</div>
				<div class="single-input">
					<a style="color:white!important;" href="" type="button" class="btn btn-info btn-md" onclick="insertcontact()" >Update</a>
				</div>
				</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Address Information</h4>
        </div>
        <div class="modal-body">
          <form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				
					<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['userid']; ?>" required>
				
				<div class="single-input ">
					<label for="account-details-firstname">Address 1*</label>
					<input type="text" id="addr1" name="addr1" value="<?php echo $row_usr['address1']; ?>" required>
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Address 2*</label>
					<input type="text" id="addr2" name="addr2" value="<?php echo $row_usr['address2']; ?>" >
				</div>
				<div class="single-input ">
					<label for="account-details-lastname">Post Code*</label>
					<input type="text" id="pcode" name="pcode" value="<?php echo $row_usr['postcode']; ?>" required>
				</div>
				<div class="single-input">
					<a style="color:white!important;" href="" type="button" class="btn btn-info btn-md" onclick="insertaddresses()">Update</a>
				</div>
				</div>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
			</div>
		</div>
		<div id="refreshh"></div>
		</form>
<?php 
}

function updateUserToDB(){
extract($_REQUEST);
$update_sql_array=array();
$update_sql_array['fname'] = $firstname;
$update_sql_array['lname'] = $lastname;
$update_sql_array['email'] = $email;
$update_sql_array['phone'] = $phone;
$update_sql_array['country'] = $country;
$update_sql_array['state'] = $state;
$update_sql_array['address1'] = $address1;
$update_sql_array['address2'] = $address2;
$update_sql_array['postcode'] = $postcode;
$this->db->pdoupdate(WR_USER,$update_sql_array,'id',$_SESSION['userid']);
?><script>alert('Information Updated Successfully.'); window.location='myaccount.php';</script><?php 
}

function ChangePassword(){
?>

		<form action="" class="ho-form" method="post">
			<div class="ho-form-inner">
				<div class="single-input">
					<label for="account-details-firstname">Current Password</label>
					<input type="password" id="oldpassword" name="oldpassword" required placeholder="Old Password">
				</div>
				<div class="single-input single-input-half">
					<label for="account-details-lastname">New Password*</label>
					
					<input type="password" placeholder="Password" id="password" name="newpassword" required>
        
					
				</div>
				<div class="single-input  single-input-half">
					<label for="account-details-email">Confirm New Password*</label>
					<input type="password" placeholder="Confirm Password" id="confirm_password" name="repassword" required>
				</div>
				
				
				
				<div class="single-input">
					<button class="ho-button ho-button-dark" type="submit" name="passsbt" value="changepassdb"><span>CHANGES</span></button>
				</div>
			</div>
		</form>

<?php 
}

function updatePassToDB(){
	extract($_REQUEST);
	
	$sql_usr = "select * from ".WR_USER." where id='".$_SESSION['userid']."' ";
	$row_usr = $this->db->row($sql_usr,$this->db->pdo_open());
	if($oldpassword!=$row_usr['password']){
		?><script>alert('Wrong Old Password.'); window.location='myaccount.php';</script><?php 
	}
	else{
		$update_sql_array=array();
		$update_sql_array['password'] = $newpassword;
		$this->db->pdoupdate(WR_USER,$update_sql_array,'id',$_SESSION['userid']);
		?><script>alert('Password Updated Successfully.'); window.location='myaccount.php';</script><?php 
	}
}

function footerJS(){
?>
<script>
	var password = document.getElementById("password")
	, confirm_password = document.getElementById("confirm_password");
	
	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("Passwords Don't Match");
		} else {
			confirm_password.setCustomValidity('');
		}
	}
	
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>
<script>
function insert(){
	var id = $('#id').val();
	var fname = $('#fname').val();
	var lname= $('#lname').val();
	var datas="&id="+id+"&fname="+fname+"&lname="+lname;
   $.ajax({
       type: "POST",
       url: "update_personal.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
   window.location.reload();
});
    }
    function acc(id){
	var id = $('#id'+id).val();
	var fname = $('#acc'+id).val();
	var lname= $('#srt'+id).val();
	var ppl= $('#ppl'+id).val();
	var chq= $('#chq'+id).val();
	var chr= $('#chr'+id).val();
	var act= $('#actalt'+id).val();
	var srt= $('#srtalt'+id).val();
	var pyl= $('#pylalt'+id).val();
	var uname= $('#uname'+id).val();
	var datas="&id="+id+"&fname="+fname+"&lname="+lname+"&ppl="+ppl+"&chq="+chq+"&chr="+chr+"&act="+act+"&srt="+srt+"&pyl="+pyl+"&uname="+uname;
	console.log(datas);
   $.ajax({
       type: "POST",
       url: "update_bank.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
   window.location.reload();
});
    }
    
    function cnl(id){
	var id = id;
	var datas="&id="+id;
	console.log(datas);
   $.ajax({
       type: "POST",
       url: "update_status.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
   window.location.reload();
});
    }
    
    function insertcontact(){
	var id = $('#id').val();
	var phn = $('#phn').val();
	var cntry= $('#cntry').val();
	var stt= $('#stt').val();
	var datas="&id="+id+"&phn="+phn+"&cntry="+cntry+"&stt="+stt;
   $.ajax({
       type: "POST",
       url: "update_contacts.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
 window.location.reload();
});
    }
     function insertaddresses(){
	var id = $('#id').val();
	var addr1 = $('#addr1').val();
	var addr2= $('#addr2').val();
	var pcode= $('#pcode').val();
	var datas="&id="+id+"&addr1="+addr1+"&addr2="+addr2+"&pcode="+pcode;
   $.ajax({
       type: "POST",
       url: "update_addresses.php",
       data: datas
    }).done(function( data ) {
      alert("Update Record");
 window.location.reload();
});
    }
</script>
<script>
 	$('#two').hide();
        $('#three').hide();
        $('#four').hide();
        $('#five').hide();
            $('#b1').on('click', function() {
        $('#one').show();
        $('#two').hide();
        $('#three').hide();
        $('#four').hide();
         $('#five').hide();
         $('#b1').addClass('act');
         $('#b2').removeClass('act');
         $('#b3').removeClass('act');
         $('#b4').removeClass('act');
         $('#b5').removeClass('act');
    });
    $('#b2').on('click', function() {
        $('#one').hide();
        $('#two').show();
        $('#three').hide();
        $('#four').hide();
         $('#five').hide();
          $('#b2').addClass('act');
         $('#b1').removeClass('act');
         $('#b3').removeClass('act');
         $('#b4').removeClass('act');
         $('#b5').removeClass('act');
    });
    $('#b3').on('click', function() {
        $('#one').hide();
        $('#two').hide();
        $('#three').show();
        $('#four').hide();
         $('#five').hide();
          $('#b3').addClass('act');
         $('#b2').removeClass('act');
         $('#b1').removeClass('act');
         $('#b4').removeClass('act');
         $('#b5').removeClass('act');
    });
    $('#b4').on('click', function() {
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        $('#four').show();
         $('#five').hide();
          $('#b4').addClass('act');
         $('#b2').removeClass('act');
         $('#b3').removeClass('act');
         $('#b1').removeClass('act');
         $('#b5').removeClass('act');
    });
    $('#b5').on('click', function() {
        $('#one').hide();
        $('#two').hide();
        $('#three').hide();
        $('#four').hide();
         $('#five').show();
          $('#b5').addClass('act');
         $('#b2').removeClass('act');
         $('#b3').removeClass('act');
         $('#b4').removeClass('act');
         $('#b1').removeClass('act');
    });
                </script>
<?php 
}



} // End of Class
?>