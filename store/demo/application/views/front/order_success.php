<style type="text/css">
	section#cart_items {
	background: white;
    padding: 60px;
    border-radius: 4px;
    box-shadow: 0 2px 19px #C8D0D8;
    display: inline-block;
    margin-top: 43px;
    margin-left: 175px;
    margin-bottom:4%;
}

    .icon {
    position: relative;
    margin: 0 auto;
   
    background: #4caf50;
    height: 100px;
    width: 100px;
    border-radius: 50%;
}
span.glyphicon.glyphicon-ok {
    postion: inherit;
    font-size: 4em;
    color: #fff;
    text-align: center;
    padding-top: 19px;
    margin-left: 20px;
}
h4.aa {
    margin-left: 358px;
    margin-top: 10px;
}
h3.aa {
    margin-left: 489px;
    margin-top: 10px;
}
h6.aa {
   margin-left: 370px;
    margin-top: 10px;
    font-size: 20px;
    font-weight: 500;
}
@media (max-width: 690px){
			.mobile
			{
				background: white!important;
    padding: 60px!important;
    border-radius: 4px!important;
    box-shadow: 0 2px 19px #C8D0D8!important;
    display: block!important;
    margin-top: 43px!important;
   margin-left: -8px!important;
			}
		
		.iccon{

			position: relative;
    margin: 0 auto;
   
    background: #4caf50;
    height: 100px;
    width: 100px;
    border-radius: 50%;
		}

		h3.aaa{
    margin-left: -7px;
    margin-top: 10px;
    text-align: center;

		}

		h4.aaa{
    margin-left: 44px;
    margin-top: 10px;

		}
		h6.aaa{
     margin-left: -13px; 
    margin-top: 10px;
    font-size: 20px;
    font-weight: 500;
    text-align: center;

		}

		h5.aaa{

			text-align: center;
    font-weight: 600;
    margin-top: 18px;
		}
}
</style>

<section id="cart_items" class="mobile">
	
		<div class="container">
			<div class="icon iccon">
				<span class="glyphicon glyphicon-ok"></span>
			</div>
			<h3 class="aa aaa">Dear <?php echo $this->session->userdata("cus_name");?></h3>
<h4 class="aa aaa">Your Order Successfully complete....</h4><hr/>
			
<h6 class="aa aaa">Total payable amount(including vat) : $<?php echo $this->session->userdata("g_total");?></h6>

<h5 class="aaa"style="text-align: center;font-weight: 600;margin-top: 18px;">Thanks for purchase. Recfeive your order successfully. We will contact you ASAP with delivery details. For more details please check your registration mail.</h5>
			
		</div>
	</section> <!--/#cart_items-->