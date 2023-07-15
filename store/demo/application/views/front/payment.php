<style type="text/css">
	div#b2:hover {
    transform: scale(1.1);
}
div#b1:hover {
    transform: scale(1.1);
}
div#b2 {
    top: 0px;
    left: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    transition: transform .5s ease-out;
    position: inherit;
}
div#b1 {
    top: 0px;
    left: 0;
    width: 100%;
    height: 100%;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    transition: transform .5s ease-out;
    position: inherit;
}

</style>
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
							<td class="cart_product">
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