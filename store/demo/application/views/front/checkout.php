<style type="text/css">
	.billing_info p{color: red;font-style: bold}
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
<section style="margin-top:5%!important;margin-bottom:5%!important;" id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div style="text-align:center;" class="col-sm-12">
				<h1  class="hdgmbl" style="font-size:38px;font-weight:600;color:#0d4561;text-align:center;margin-bottom:4%;">Login or Create a Free Account!</h1>
				<img style="text-align:center;margin-bottom:4%;" src="<?php echo base_url()?>assets/front/images/home/logo.png" >
			</div>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form logmbl"><!--login form-->
						<h2 style="font-size:23px;font-weight:600;color:#38a9dc;">Login to your account</h2>
						 <h4 style='color:green;margin-bottom:4%;font-size:13px;'>
                   			 <?php 
                             if($this->session->flashdata('flash_msg')!='')
                             {
                                echo '<div class="alert alert-danger">'.$this->session->flashdata('flash_msg').'</div>'; 
                            }
                            ?> 
			               </h4>
						<form action="<?php echo base_url()?>customer-login" method="post">
							<div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
                                        <input class="form-control" type="email" placeholder="Email Address" name="cus_email" required/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
                                        <input class="form-control" type="password" placeholder="Password" name="cus_password" required/>
                                    </div>
                                </div>

							
							<span>
								<input type="checkbox" name="remember" value="on" class="checkbox"> 
								Keep me signed in
							</span>
							<button style="color:white;background-color:#38a9dc;" type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div style="text-align:center;" class="col-sm-1">
					<h2 style="background-color:#0d4561;" class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form logmbl"><!--sign up form-->
						<h2 style="font-size:23px;font-weight:600;color:#38a9dc;">New User Signup!</h2>
						 <h5 style='color:red'> <?php echo validation_errors();?></h5>
                          <h4 style='color:green;margin-bottom:4%;font-size:13px;'>
                             <?php 
                             if($this->session->flashdata('flash_msges')!='')
                             {
                             echo '<div class="alert alert-success">'.$this->session->flashdata('flash_msges'). '</div>' ; 
                         }
                         ?>
                           </h4>
						<form action="<?php echo base_url()?>customer-registration" method="post">
							<div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                        </div>
							<input class="form-control" type="text" placeholder="Name" name="cus_name" value="<?php echo set_value('cus_name'); ?>" required/>
						</div>
					</div>
					<div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                        </div>
							<input class="form-control" type="email" placeholder="Email Address" name="cus_email" value="<?php echo set_value('cus_email'); ?>" required/>
						</div>
					</div><div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
							<input class="form-control" type="password" placeholder="Password" name="cus_password" required/>
						</div>
					</div>
					<div class="form-group">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock text-info"></i></div>
                                        </div>
							<input class="form-control" type="password" name="con_pass" placeholder="Confirm Password" required/>
						</div>
					</div>
							<button style="color:white;background-color:#38a9dc;" type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->