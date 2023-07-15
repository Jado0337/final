<?php 
// Front Website User Class contains all functions to manage front website user functions. 
class UserClass{

function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
	$this->auth=new Authentication();
}


function UserRegister($runat){

	switch($runat){
		case 'local':
	?>
			<div class="my-account-area ptb-30">
                <div class="container">
                    <div class="row">
						<div class="col-lg-3"></div>
                        <!-- Login Form -->
                        <div class="col-lg-6">
							<div class="col-lg-12 login-tabs pl-0 pr-0">
								<div class="login-tabs-inner login-tab-1">
									<a href="login.php">I HAVE AN ACCOUNT</a>
								</div>
								<div class="login-tabs-inner login-tab-2 login-tab-active">
									<a href="javascript: void(0);">I AM NEW HERE &nbsp; &nbsp; &nbsp;</a>
								</div>
							</div>
                            <div class="login-form-wrapper logintab-clearfix">
                                	<form style="border:0px solid!important;" action="" class="ho-form ho-form-boxed" method="post">
										<div class="row">
											<div class="col-sm-12">
											<div class="input-group">
												<input  type="text" name="fname" maxlength="32" pattern="[A-Za-z]{1,32}" id="fname" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label style="left:15px;">First Name *</label>
								</div>	
								</div>
											<div class="col-sm-12">
													<input type="text" name="lname" id="lname" maxlength="32" pattern="[A-Za-z]{1,32}" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Last Name *</label>
											</div>
											<div class="col-sm-12">
													<input type="email" name="email" id="email" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Email Address *</label>
											</div>
											<div class="col-sm-12">
												<input type="text" name="phone" id="phone" minlength="12" maxlength="12" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Phone Number *</label>
											</div>
											
											
											<div style="display:none;" class="col-sm-12">
												<label for="extra">Gender *</label>
												<select name="gender" id="gender" >
													<option value="">Select</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
												
											</div>
											<div  class="col-sm-12">
												<input style="font-size:18px;" type="text" name="dob" id="dob" placeholder="Date of Birth *" class="datepicker">
												</div>
											<div style="margin-top:2%;" class="col-sm-12">
											    	<label for="password">	</label>
											 <div class="register__form-item-note">
Please do not use symbols, punctuation or any other special characters.<br><br>
Your password must contain the following:
<ul>
<li class="check-lowercase">One lower case character</li>
<li class="check-uppercase">One upper case character</li>
<li class="check-numbers">One number</li>
<li class="check-length">Minimum of 8 characters</li>
</ul>
</div>
		</div>
											<div style="margin-top:2%;" class="col-sm-12">
											  
												
												<input type="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
											<span style="font-size:30px;" toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
												
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Password *</label>
  
												<div id="register">
												<span id="result"></span>
													
											</div>
											</div>
												<div class="col-sm-12">
											    
											<input type="password" name="confirm_password" id="confirm_password"  placeholder="Confirm Password" required><span id='message'></span>
										
  
											</div>
											<div class="col-sm-12">
											    
											<select style="font-size:18px;" name="country" id="country" required>
													<option style="font-size:18px;" value="United Kingdom (UK)" selected="selected">United Kingdom (UK)</option>
													<option value="United States (US)">United States (US)</option>
													<option value="Australia">Australia</option>
													<option value="Austria">Austria</option>
													<option value="Bangladesh">Bangladesh</option>
													<option value="Belgium">Belgium</option>
													<option value="Canada">Canada</option>
													<option value="Denmark">Denmark</option>
													<option value="France">France</option>
													<option value="Italy">Italy</option>
												</select>
											
  
											</div>
											
											<div style="margin-top:2%;" class="col-sm-12">
												<input type="text" name="state" id="state" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>County *</label>
											</div>
											<div class="col-sm-6">
													<input type="text" name="address1" id="address1" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Address line 1 *</label>
											</div>
												<div class="col-sm-6">
													<input type="text" name="address2" id="address2" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Address line 2 *</label>
											</div>
											
											<div class="col-sm-12">
													<input type="text" name="postcode" id="postcode" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Postcode *</label>
											</div>
												<div class="col-sm-12">
													<input type="text"  name="vercode" id="vercode" required>
												<span class="highlight"></span>
  <span class="bar"></span>
  <label>Enter Captcha Code *</label>
  </div>
  <div class="col-sm-12">
												
				
		<span class="highlight"></span>
  <span class="bar"></span>
  <label>Captcha Code </label>
  <img style="margin-top:12%;" src="captcha.php" >
											
											</div>
											
											<div class="col-sm-12 mt-20">
												<input type="checkbox" name="newsletter" id="newsletter" value="No"  style="margin-left: -16px;" />
												<label for="newsletter">Subscribe for our Newsletter</label>
											</div>
											
											<div class="col-sm-12 mt-10">
												<button type="submit" name="regbtn" value="Register"  class="ho-button ho-button-dark">
													<span>Create Account</span>
												</button>
												
												<p class="mt-20"><small>By creating an account you agree to our <a href="https://recyclepro.co.uk/terms.php" class="text-red">Terms and conditions</a> & <a href="https://recyclepro.co.uk/privacy-policy.php" class="text-red">Privacy policy</a></small></p>
											</div>
											
										</div>
									</form>
                            </div>
                        </div>
                        <!--// Login Form -->
						<div class="col-lg-3"></div>

                    </div>
                </div>
            </div>
	<?php 
		break;
		case 'server':
				extract($_REQUEST);
				$sql = "select * from ".WR_USER." where email='".$email."' ";
				$record = $this->db->row($sql,$this->db->pdo_open());
				if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
       echo '<div class="alert alert-danger">Incorrect verification cod </div>';
					$user_obj->UserRegister('local');
    } 
				if($record['id']>0){
				
					echo 'Your Email-ID is already registered with us. Please login using your Email-ID';
					$user_obj->UserRegister('local');
				
				}
				elseif($fname=='' || $lname=='' || $phone=='' || $email=='' || $password==''){
					echo 'Please fill all fields in form.';
					$user_obj->UserRegister('local');
				}
				else{
					
					$key_id = md5(microtime().rand());
					
					$insert_sql_array=array();
					$insert_sql_array['fname'] = $fname;
					$insert_sql_array['lname'] = $lname;
					$insert_sql_array['phone'] = $phone;
					$insert_sql_array['email'] = $email;
					$insert_sql_array['password'] = $password;
					$insert_sql_array['key_id'] = $key_id;
					$insert_sql_array['country'] = $country;
					$insert_sql_array['state'] = $state;
					$insert_sql_array['address1'] = $address1;
					$insert_sql_array['address2'] = $address2;
					$insert_sql_array['postcode'] = $postcode;
					$insert_sql_array['DOB'] = $dob;
					$id=$this->db->pdoinsert(WR_WEBUSER,$insert_sql_array);
					
					if($newsletter == 'yes'){
						$insert_sql_array2=array();
						$insert_sql_array2['f_name'] = $fname;
						$insert_sql_array2['l_name'] = $lname;
						$insert_sql_array2['email'] = $email;
						$id2=$this->db->pdoinsert(WR_NEWSLETTER,$insert_sql_array2);
					}
					
					$vlink = 'https://recyclepro.co.uk/verify.php?wrverf='.$key_id;
					
					//echo 'You have successfully registered with us. Now Please login to continue. Thank You!'.$id;
					$this->objMail = new PHPMailer();		
					$this->objMail->IsHTML(true);
					$this->objMail->From = 'noreply@recyclepro.co.uk';
					$this->objMail->FromName = 'Recyclepro';
					$this->objMail->Sender = 'noreply@recyclepro.co.uk';
					$this->objMail->AddAddress($email);
					$this->objMail->Subject = 'Welcome to Recyclepro! Confirm your email address to proceed further!';
			
					$this->objMail->Body .= '
					<div style="background-color: #efefef;color:#000000!important;font-size:13px;line-height:17px;margin:0px 0 0 0px;padding:0px 0 0;width:100%; font-family:Helvetica, sans-serif" bgcolor="#F0F1EB">
					<div style="width:700px !important; margin:0 auto; background:#FFF;">
					<div style="padding:15px 40px; background:#0B88EE;">
					<a href="https://recyclepro.co.uk/">
					<img src="https://recyclepro.co.uk/img/m6-logo-1.png" style="max-height:60px !important;" alt="Recyclepro" />
					</a>
					</div>
					<div style="padding:25px 40px; color:#000; background:#fff;">
					
					<h1 style="color:#0B88EE;">Welcome to Recyclepro! Confirm your email address for added account security!</h1>
					<p>Hi, '.$fname.'</p>
					<p>Welcome to the Recyclepro family!</p>
					<p>By confirming your email address you will be verified and you can access your Recyclepro account. </p>
					<p>Just click the button below. Too easy!</p>
				
					<a href="'.$vlink.'" style="cursor:pointer;">
					<button type="button" class="btn btn-lg" style="color: white; background-color: #0B88EE; border-radius: 0px; cursor: pointer; padding: 10px 20px; border-radius: 10px;">CONFIRM MY EMAIL ADDRESS</button>
					</a>
					<br><br>
					<span style="color:#999999;">Link: <a href="'.$vlink.'">'.$vlink.'</a></span>
					<br><br>
					<hr style="color:#0B88EE; 2px; height: 1px; background: #0B88EE;" />
					Sincerely,<br/>
					Recyclepro (www.recyclepro.co.uk)<br>
					
					</div>
					
					<div style="padding:9px 40px; font-size:12px; color:#fff; background-color: #0B88EE;">
					<p>Copyright 2019 Recyclepro | All rights reserved.</p>
					</div>
					</div>
					</div>';
					$this->objMail->WordWrap = 50;
					$this->objMail->Send();
					
					?>
					
						<div class="my-account-area ptb-30">
							<div class="container">
								<div class="row">
									<div class="col-lg-3"></div>
									<!-- Login Form -->
									<div class="col-lg-6">
										<div class="login-form-wrapper logintab-clearfix">
											<div class="regsuccess">
												<h1>Registration Successful!</h1>
												<p>Thank You for registering with us. Please check your email and verify your email to proceed further. </p>
											</div>	
											
											<h3 class="text-center mt-25"><a href="login.php">Click Here to go to Login Page</a></h3>
										</div>
									</div>
									<!--// Login Form -->
									<div class="col-lg-3"></div>
			
								</div>
							</div>
						</div>
					
					<?php 
				
				}
			
			
			
		break;
		
		default: 
			echo 'Wrong Page!';
			break;
		
	}
}


function VerifyUserEmail($wrverf)
	{
		$sql	=	"select * from ".WR_USER." where key_id='".$wrverf."'";
		$record = $this->db->row($sql,$this->db->pdo_open());
		
		//echo $num	= 	count($record);
		if($record['email']!='')
		{
			//$_SESSION['msg']	=	"Email has been verified successfully. Please login here.";
			$update_sql_array	=	array();
			$update_sql_array['key_id']	=	'';
			$update_sql_array['email_status']	=	'1';
			$update_sql_array['status']	=	'verified';
			$this->db->pdoupdate(WR_USER,$update_sql_array,'key_id',$wrverf);
			
			$this->objMail = new PHPMailer();		
			$this->objMail->IsHTML(true);
			$this->objMail->From = 'noreply@recyclepro.co.uk';
			$this->objMail->FromName = 'Recyclepro';
			$this->objMail->Sender = 'noreply@recyclepro.co.uk';
			$this->objMail->AddAddress($record['email']);
			$this->objMail->Subject = 'Email verification successful!';
	
			$this->objMail->Body .= '
			<div style="background-color: #efefef;color:#000000!important;font-size:13px;line-height:17px;margin:0px 0 0 0px;padding:0px 0 0;width:100%; font-family:Helvetica, sans-serif" bgcolor="#F0F1EB">
					<div style="width:700px !important; margin:0 auto; background:#FFF;">
					<div style="padding:15px 40px; background:#0B88EE;">
					<a href="https://recyclepro.co.uk/">
					<img src="https://recyclepro.co.uk/img/m6-logo-1.png" style="max-height:60px !important;" alt="Recyclepro" />
					</a>
					</div>
					<div style="padding:25px 40px; color:#000; background:#fff;">
					
					<h1 style="color:#0B88EE;">Welcome to Recyclepro!</h1>
					<p>Hi, '.$record['fname'].'</p>
					<p>Welcome to the Recyclepro family!</p>
					<p>Your Email is now verified.</p>
					<p>Thank You.</p>
				
					<br><br>
					<hr style="color:#0B88EE; 2px; height: 1px; background: #0B88EE;" />
					Sincerely,<br/>
					Recyclepro (www.recyclepro.co.uk)<br>
					
					</div>
					
					<div style="padding:9px 40px; font-size:12px; color:#fff; background-color: #0B88EE;">
					<p>Copyright 2019 Recyclepro | All rights reserved.</p>
					</div>
					</div>
					</div>';
			$this->objMail->WordWrap = 50;
			$this->objMail->Send();
			
			echo '';
			?>
			<div class="blog-area ptb-30">
                <div class="container">
					<div class="blog-details">
						<div>
							<p style="background: #b6f5aa; padding: 10px 25px; color: #595959; font-size: 21px; margin-bottom:0px;"><img src="img/green-tick.png" /> Congratulation <?php echo $record['fname']; ?>, Your email has been confirmed.</p>
							<p style="margin-top:25px; font-size:16px;">
								<strong>You can now continue to <a href="login.php" style="color:#0b88ee;">Login</a>.</strong>
							</p>
						</div>
					</div>
                </div>
            </div>
			<?php
		}
		else
		{
			?>
			<div class="blog-area ptb-30">
                <div class="container">
					<div class="blog-details">
						<div>
							<p style="background: rgba(255, 0, 0, 0.63); padding: 10px 25px; color: #fff; font-size: 21px; margin-bottom:0px;"><img src="img/red-cross.png" /> Wrong or Expired link. Please try again.</p>
							<p style="margin-top:25px; font-size:16px;">
								<strong>Don't have an accaunt? You can create new <a href="register.php" style="color:#0b88ee;">Register Now!</a>.</strong>
							</p>
						</div>
					</div>
                </div>
            </div>
			<script>
				//window.location	=	"login.php";
			</script>
			<?php
		}
	}

function LoginUser(){
?>
			<form action="" class="ho-form ho-form-boxed" method="post">
				<div class="ho-form-inner">
					<div class="single-input">
						<label for="login-form-email">Email address *</label>
						<input type="text" name="email" id="login-form-email">
					</div>
					<div class="single-input">
						<label for="login-form-password">Password *</label>
						<input type="password" name="password" id="login-form-password">
					</div>
					<div class="single-input">
						<button type="submit" name="loginsbt" value="loginfrm" class="ho-button ho-button-dark mr-3">
							<span>Login</span>
						</button>
						
					</div>
					<div class="single-input">
						<a href="forget_password.php">Lost your password?</a>
					</div>
				</div>
			</form>
<?php 
}

function LoginSubmit(){
	extract($_REQUEST);
	$sql = "select * from ".WR_USER." where email='".$email."' and password='".$password."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	if($record['id']!=''){
		$this->auth->Create_Session($record['id'],$record['fname'],'','','');
	if(count($_SESSION['products'])==0)
	{ $link='index.php';} else{ $link='cart.php';}
		?><script>window.location='<?php echo $link; ?>';</script><?php 
	}
	else{
		?>
		<div class="loginerr" style="background:#FF0033; padding:20px 20px;">
			<p>Invalid email or password. Please Try Again.</p>
		</div>
		<?php 
		$this->LoginUser();
	}
}

function AddFromToDb(){
	extract($_REQUEST);
	$insert_sql_array=array();
	$insert_sql_array['category'] = $category;
	$insert_sql_array['model'] = $model;
	$insert_sql_array['sorting'] = $sorting;
	$insert_sql_array['status'] = $status;
	$id=$this->db->pdoinsert(WR_USER,$insert_sql_array);
	?>
	<script>window.location='managemodel.php';</script>
	<?php
}
function UpdateFormDb($id){
	extract($_REQUEST);
	$update_sql_array1=array();
	$update_sql_array1['category'] = $category;
	$update_sql_array1['model'] = $model;
	$update_sql_array1['sorting'] = $sorting;
	$update_sql_array1['status'] = $status;
	$this->db->pdoupdate(WR_MODEL,$update_sql_array1,id,$id);
	?>
	<script>window.location='managemodel.php';</script>
	
	<?php 
}



} // End of Class
?>

