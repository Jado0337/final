<div class="col-sm-3">
	<div class="left-sidebar">
		<h2 style="color:#38a9dc!important;">Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<?php $all_category = $this->CategoryModel->get_all_category();?>
			<?php $all_brands = $this->BrandModel->get_all_brand();?>
			<?php $all_sub_category = $this->CategoryModel->get_all_sub_category();?>
			<?php foreach ($all_category as  $maincat) {?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $maincat->category_name;?>">
							<span class="badge pull-right">
							<?php foreach ($all_sub_category as $plusicon){?>
								<?php if($plusicon->category_sub_id == $maincat->category_id){?>
									<i class="fa fa-plus"></i>
							<?php if($plusicon->category_sub_id == $maincat->category_id) {
								        break;    
								    }?>
								<?php }}?>
							
							</span>
							<a href="<?php echo base_url()?>show_post_by_cat_id/<?php echo $maincat->category_id; ?>"><?php echo $maincat->category_name?></a>		
						</a>
					</h4>
				</div>
				<div id="<?php echo $maincat->category_name;?>" class="panel-collapse collapse">
					<div  class="panel-body">
						<ul>
							<?php foreach ($all_sub_category as  $subcat) {?>
								<?php if($subcat->category_sub_id == $maincat->category_id){?>
										<li style="background-color: #ece9e9;color: #FFFFFF;padding: 10px 20px;margin-bottom:2%;"><a href="<?php echo base_url()?>show-post-by-sub-cat-id/<?php echo $subcat->sub_cat_id?>"><?php echo $subcat->sub_category_name?></a></li>
								<?php }?>
							<?php } ?>						
						</ul>
					</div>
				</div>
			</div>
			<?php }?>
			<!--
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Kids</a></h4>
				</div>
			</div>
		-->
		</div><!--/category-productsr-->

		<!--/brands_products-->
		<!--price-range-->
		<!-- <div class="price-range">
			<h2>Price Range</h2>
			<div class="well">
				<form action="<?php echo base_url()?>show-product-by-price-range" method="post">
				 <input type="text" class="span2" value="" data-slider-min="10" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
				 <b>$ 0</b> <b class="pull-right">$ 600</b>
				 <input type="submit" Value="filter">
				</form>
			</div>
		</div> -->
		<!--/price-range-->

		<!--price-range-->
		<?php
		if($id=="29")
		{
		 ?>
		<div class="">
			<h2 style="color:#0d4561!important;">Price Range</h2>
			<p id="amount" style="text-align:center"></p>
			<div id="slider-range"></div>

			<div class="pricerange">
			  <form method="post" action="<?php echo base_url()?>show-product-by-price-range" >
			    <input type="hidden" id="amount1" name="amount1" value="">
			    <input type="hidden" id="amount2" name="amount2" value="">
			    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
			    <input style="background-color:#2cbdb8!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
<h2 style="color:#0d4561!important;margin-top:4%;margin-bottom:6%!important;">Variation</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="variation">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Variation</option>
                                        <?php
                                         foreach ($variation as $v) {  ?>
                                        <option value="<?php echo $v['variation'];?>"><?php echo $v['variation'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#2cbdb8!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			<h2 style="color:#0d4561!important;margin-top:4%;margin-bottom:6%!important;">Colour</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="colour">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Colour</option>
                                        <?php
                                         foreach ($colour as $c) {  ?>
                                        <option value="<?php echo $c['colour'];?>"><?php echo $c['colour'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#2cbdb8!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			<h2 style="color:#0d4561!important;margin-top:4%;margin-bottom:6%!important;">Ram</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="ram">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Ram</option>
                                        <?php
                                         foreach ($ram as $r) {  ?>
                                        <option value="<?php echo $r['ram'];?>"><?php echo $r['ram'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#2cbdb8!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			<h2 style="color:#0d4561!important;margin-top:4%;margin-bottom:6%!important;">Processor</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="processor">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Processor</option>
                                        <?php
                                         foreach ($processor as $p) {  ?>
                                        <option value="<?php echo $p['processor'];?>"><?php echo $p['processor'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#2cbdb8!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			<h2 style="color:#0d4561!important;margin-top:4%;margin-bottom:6%!important;">Year</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="year">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Year</option>
                                        <?php
                                         foreach ($year as $y) {  ?>
                                        <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#2cbdb8!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
		</div>
		<!--/price-range-->
		<?php
	}
	else
	{
		?>
		<div class="">
			<h2 style="color:#38a9dc!important;">Price Range</h2>
			<p id="amount" style="text-align:center"></p>
			<div id="slider-range"></div>

			<div class="pricerange">
			  <form method="post" action="<?php echo base_url()?>show-product-by-price-range" >
			    <input type="hidden" id="amount1" name="amount1" value="">
			    <input type="hidden" id="amount2" name="amount2" value="">
			    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
			    <input style="background-color:#38a9dc!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
<h2 style="color:#38a9dc!important;margin-top:4%;margin-bottom:6%!important;">Variation</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="variation">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Variation</option>
                                        <?php
                                         foreach ($variation as $v) {  ?>
                                        <option value="<?php echo $v['variation'];?>"><?php echo $v['variation'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#38a9dc!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			<h2 style="color:#38a9dc!important;margin-top:4%;margin-bottom:6%!important;">Colour</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="colour">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Colour</option>
                                        <?php
                                         foreach ($colour as $c) {  ?>
                                        <option value="<?php echo $c['colour'];?>"><?php echo $c['colour'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#38a9dc!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			
		</div>
		<!--/price-range-->

		<?php
	}
	?>










		<div style="background-color:white" class="shipping text-center"><!--shipping-->
			<img src="<?php echo base_url()?>assets/front/images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->
		<div style="background-color:white;margin-bottom:10%;" class="shipping text-center"><!--shipping-->
			<img src="<?php echo base_url()?>assets/front/images/home/shipping1.jpg" alt="" />
		</div><!--/shipping-->
		
	</div>
</div>
<script>
        
 $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1500,
      values: [ 500,1000 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#amount1" ).val(ui.values[ 0 ]);
		$( "#amount2" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>
  
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li class="active">Payment</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<th class="image">Item</th>
							<th class="description">Name</th>
							<th class="price">Price</th>
							<th class="quantity">Quantity</th>
							<th class="total">Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $cart_content = $this->cart->contents();
						
						?>

						<?php foreach ($cart_content as $items){ ?>

						<tr>
							<td>
								<a href=""><img  style="width:150px;height:100px;" src="uploads/<?php echo $items['options']['pro_image']?>" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $items['name']?></a></h4>
							</td>
							<td class="cart_price">
								<p>$<?php echo $items['price']?></p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="<?php echo base_url()?>update-cart-qty-payment" method="post">
										<a href="javascript:" id="minus2" onclick="decrementValue('<?php echo $items['rowid'];?>')"/><strong>-</strong></a>
										<input class="cart_quantity_input" id="qty2<?php echo $items['rowid'];?>" type="text" name="qty" value="<?php echo $items['qty'];?>" autocomplete="off" size="2">
										<a href="javascript:" id="add2" onclick="incrementValue('<?php echo $items['rowid']?>')"/><strong>+</strong></a>
										<input  type="hidden" id="rowid<?php echo $items['rowid'];?>" name="rowid" value="<?php echo $items['rowid'];?>">

										
									<form>
										
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">$<?php echo $items['subtotal']?></p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="<?php echo base_url()?>delete-to-cart-payment/<?php echo $items['rowid']?>"><i class="fa fa-times"></i></a>
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
			
			<div class="row">
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
								if($cart_total>0 && $cart_total<49){
									$shiping = 0;
								}elseif($cart_total>50 && $cart_total<98){
									$shiping = 2;
								}elseif($cart_total>99 && $cart_total<198){
									$shiping = 5;
								}elseif($cart_total>199){
									$shiping = 10;
								}elseif($cart_total==0){
									$shiping = 0;
								}
							?>
							<li>Shipping Cost <span>$<?php echo $shiping?></span></li>
							<?php $g_total = $cart_total+$tax+$shiping;?>
							<li>Total <span>$<?php echo $g_total;?></span></li>
						</ul>
							<form action="<?php echo base_url()?>update-cart-qty-payment" method="post" >	
							
							</form>	
					</div>
				</div>
				<div style="border:1px solid #e2e2e2;" class="col-sm-6">
					
					<form action="<?php echo base_url()?>place-order/<?php echo $g_total; ?>" method="post" >
						<div style="margin-bottom:0px!important;margin-top:0px!important;" class="payment-options">
							<div>
								<h2 style="font-size:23px;font-weight:600;margin-bottom:2%;margin-top:2%;">Choose Your Payment Option</h2>
								<img style="margin-bottom:2%;" src="assets/front/images/home/payments.jpg">
								<div class="row">
									<div class="col-sm-6">
								<div id="b2" style="background-color:#00BCD4;color:white;font-size:23px; font-weight:600;" class="alert alert-warning"><img src="assets/front/images/home/paypal.png" width="200px" height="38px"> Pay With Paypal</div>
							</div>
							<div class="col-sm-6">
								<div id="b1" style="background-color:#FFC107;color:white;font-size:23px; font-weight:600;" class="alert alert-warning"><img src="assets/front/images/home/stripe.png" width="200px" height="38px"> Pay With Stripe</div>
							</div>
						</div>
								<?php echo $this->session->flashdata("flash_msg")?>
								
							</div>	
							
							
						</div>
					</form>
				
				<div id="paypal">
					<form action="<?php echo base_url()?>place-order/<?php echo $g_total; ?>" method="post" >
						
							<input type="hidden" name="payment_gateway" value="paypal">
								<input style="background-color:#38a9dc;width:100%;height:55px;font-size:23px;font-weight:600;margin-bottom:2%;" type="submit" name="btn" class="btn btn-primary" value="Pay With Paypal">
							
					</form>
				</div>
				<div id="stripe">
					<form role="form" action="<?php echo base_url()?>place-order/<?php echo $g_total; ?>" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
     <input type="hidden" name="payment_gateway" value="stripe">
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Name on Card</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Month</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      
                        <div class="row">
                            <div class="col-xs-12">
                                <button style="margin-bottom:2%;" class="btn btn-primary btn-lg btn-block" type="submit">Pay Now ($100)</button>
                            </div>
                        </div>
                             
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
<script>
	 $('#stripe').hide();
	 $('#paypal').hide();
	$('#b1').on('click', function() {
    
        $('#paypal').hide();
        $('#stripe').show();
       });
	$('#b2').on('click', function() {
    
        $('#paypal').show();
        $('#stripe').hide();
       });
 
	</script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
      
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
</html>


	</section><!--/#do_action-->
	

    