<style type="text/css">
	.shipping_info p{color:red;font-weight: bold;font-size: 12px}
	.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
.input-group {
    position: relative;
    display: flex!important;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: stretch;
    align-items: stretch;
    width: 100%;
}
.input-group-text {
    display: flex!important;;
    -ms-flex-align: center;
    align-items: center;
    padding: .375rem .75rem;
    margin-bottom: 0;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    text-align: center;
    white-space: nowrap;
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    border-radius: .25rem;
}
.input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    width: 1%;
    margin-bottom: 0;
}
.text-info {
    color: #17a2b8!important;
}
.input-group-prepend {
    margin-right: -1px;
}
.input-group-append, .input-group-prepend {
    display: flex;
}
.pt-2, .py-2 {
    padding: 0.5rem!important;
}
.bg-info {
    background-color: #17a2b8!important;
}
.text-white {
    color: #fff!important;
}
.text-center {
    text-align: center!important;
}
</style>
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url();?>">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

			
		
			<div class="shopper-informations">
				<div class="row">
					<div  class="col-sm-6">
						<img style="margin-top:8%;" src="assets/front/images/home/shipment.jpg">
					</div>
					<div class="col-sm-6">
						<div class="row justify-content-center logmbl">
		<div class="col-12 pb-5">
								<form action="<?php echo base_url()?>insert-shipping" method="post" name="shiping_info">
									<div class="card  rounded-0">
                            <div class="card-header p-0">
                                <div style="margin-bottom:2%;" class="bg-info text-white text-center py-2">
                                    <h3 class="hdgmbl"><i style="margin-right:2%;" class="fa fa-home"></i>Shipping Address</h3>
                                </div>
                            </div>
                            <div class="card-body p-3">

                                <!--Body-->
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Name" name="cus_name" required>
                                    </div>
                                </div>
                                
                                        <input class="form-control" type="hidden" name="shipping_id" value="" >
                                   
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input class="form-control"  type="text" placeholder="Email*" name="cus_email" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-phone text-info"></i></div>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Mobile" name="cus_mobile" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-home text-info"></i></div>
                                        </div>
                                        <input class="form-control" type="text" placeholder="Address*" name="cus_address" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marker text-info"></i></div>
                                        </div>
                                        <input class="form-control" type="text" placeholder="City" name="cus_city" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marker text-info"></i></div>
                                        </div>
                                       <select class="form-control" name="cus_country" required>

										<option value="">Select Country </option>
										<option value="United_States" >United States</option>
										<option value="Bangladesh">Bangladesh</option>
										<option value="UK">UK</option>
										<option value="India">India</option>
										<option value="Pakistan">Pakistan</option>
										<option value="Ucrane">Ucrane</option>
										<option value="Canada">Canada</option>
										<option value="Dubai">Dubai</option>
									</select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marker text-info"></i></div>
                                        </div>
                                       <input class="form-control" type="text" placeholder="Zip" name="cus_zip" max-length="5" required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-map-marker text-info"></i></div>
                                        </div>
                                      <input class="form-control" type="text" placeholder="Fax" name="cus_fax" max-length="5" required>

                                    </div>
                                </div>
                        <div class="text-center">
                                    
                                    <input  style="background-color:#38a9dc;margin-bottom:4%;" type="submit" value="Save & Continue" class="btn btn-info btn-block rounded-0 py-2">
                                </div>
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
			
		</div>
	</section> <!--/#cart_items-->
	<script type="text/javascript">
		
		

	</script>