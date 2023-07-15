<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead style="background-color:#38a9dc;">
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php $cart_content = $this->cart->contents();
						
						?>

						<?php foreach ($cart_content as $items){ ?>

						<tr>
							<td>
								<a href=""><img  style="width:100px;height:100px;" src="uploads/<?php echo $items['options']['pro_image']?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $items['name']?></a></h4>
							</td>
							<td class="cart_price">
								<p>$<?php echo $items['price']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="<?php echo base_url()?>update-cart-qty" method="post">
										<a href="javascript:" id="minus2" onclick="decrementValue('<?php echo $items['rowid'];?>')"/><strong>-</strong></a>
										<input class="cart_quantity_input" id="qty2<?php echo $items['rowid'];?>" type="text" name="qty" value="<?php echo $items['qty'];?>" autocomplete="off" size="2">
										<a href="javascript:" id="add2" onclick="incrementValue('<?php echo $items['rowid']?>')"/><strong>+</strong></a>
										<input  type="hidden" id="rowid<?php echo $items['rowid'];?>" name="rowid" value="<?php echo $items['rowid'];?>">

										

									<form>
								</div>
							</td>
							<td class="cart_total">
								<p style="color:#38a9dc;" class="cart_total_price">$<?php echo $items['subtotal']?></p>
							</td>
							<td >
								<a style="background-color:#38a9dc; color:white;padding:30%;" class="cart_quantity_delete" href="<?php echo base_url()?>delete-to-cart/<?php echo $items['rowid']?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div style="padding-left:2%;" class="chose_area">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label style="font-size:11px!important;">Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label style="font-size:11px!important;">Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label style="font-size:11px!important;">Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a style="background-color:#38a9dc;" class="btn btn-default update" href="">Get Quotes</a>
						<a style="background-color:#38a9dc;" class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<?php 
								$cart_total = $this->cart->total();
							?>
							<li>Cart Sub Total <span>$<?php echo $cart_total;?></span></li>
							<?php
								$tax = ($cart_total*2)/100;
							?>
							<li>Eco Tax 2% <span>$<?php echo $tax?></span></li>
							<!-- Shipping Cost Dependend Quantity, price, buyer distance etc -->
							<?php
								$shiping = "0";
								if($cart_total>0 && $cart_total<49){
									$shiping = 0;
								}elseif($cart_total>50 && $cart_total<98){
									$shiping = 2;
								}elseif($cart_total>99 && $cart_total<198){
									$shiping = 5;
								}elseif($cart_total>199){
									$shiping = 10;
								}elseif($cart_total<0){
									$shiping = 0;
								}
							?>
							<li>Shipping Cost <span>$<?php echo $shiping?></span></li>
							<?php $g_total = $cart_total+$tax+$shiping;?>
							<li>Total <span>
								<?php
									$gdata = array();
									$gdata['g_total'] = $g_total;
									$this->session->set_userdata($gdata);
							 		echo "$$g_total";
							 	?>
							 </span></li>
						</ul>
							<form action="<?php echo base_url()?>update-cart-qty" method="post" >	
							<input style="background-color:#38a9dc;" type="submit" class="btn btn-default update"  value="Update"/>
							<?php $customer_id = $this->session->userdata('cus_id');?>
							<?php $shipping_id = $this->session->userdata('shipping_id');?>
							<?php if($this->cart->total_items()!=Null && $customer_id!=NULL && $shipping_id!=NULL){?>
							<a style="background-color:#38a9dc;" class="btn btn-default check_out" href="<?php echo base_url()?>payment">Check Out</a>
							<?php } elseif($customer_id!=NULL && $this->cart->total_items()!=Null){?>
							<a style="background-color:#38a9dc;" class="btn btn-default check_out" href="<?php echo base_url()?>billing">Check Out</a>
							<?php }elseif($this->cart->total_items()!=Null){ ?>
							<a style="background-color:#38a9dc;" class="btn btn-default check_out" href="<?php echo base_url()?>checkout">Check Out</a>
							<?php } ?>
							</form>	
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">

    
    function decrementValue(id){
var qty2 = document.getElementById("qty2"+id);
         if(!isNaN(qty2.value) && qty2.value > 0 ) {

             qty2.value--;
             var qty=$('#qty2'+id).val();
var rowid=$('#rowid'+id).val();
$.ajax({
        type: "POST",
        url: "<?php echo base_url('Cart/update_cart_quantity_payment'); ?>",
        dataType:'json',
        data:{qty:qty, rowid:rowid},
        complete: function(data){  
      window.location.reload();
       }
    });
 }
}

    function incrementValue(id){
var qty2 = document.getElementById("qty2"+id);
         if(!isNaN(qty2.value)) {

             qty2.value++;
 var qty=$('#qty2'+id).val();
var rowid=$('#rowid'+id).val();
$.ajax({
        type: "POST",
        url: "<?php echo base_url('Cart/update_cart_quantity_payment'); ?>",
        dataType:'json',
        data:{qty:qty, rowid:rowid},
        complete: function(data){  
      window.location.reload();
       }
    });
         }

    }

</script>
	</section><!--/#do_action-->