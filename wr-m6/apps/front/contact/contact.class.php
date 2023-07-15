<?php 
// Contact Class contains all functions to Show Contact page content on front website. 
class ContactClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}
function ContactPage(){
?>
	<!-- Page Area -->
            <div class="blog-area ptb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="commentbox">
                                <?php 
									extract($_REQUEST);
									if($submit=='conttsub')
									$this->ContactThanks();
									else
									$this->ContactForm();
								?>
                            </div>
                        </div>
                        <div class="col-lg-5 pt-50 pt-lg-0">
                            <h2>CONTACT WITH US</h2>
                            <div class="contact-content">
                                <div class="single-content">
                                    <span class="single-content-icon">
                                        <i class="lnr lnr-map-marker"></i>
                                    </span>
									<b>Address:</b><br>
                                    Birmingham,UK
                                </div>
                                <div class="single-content">
                                    <span class="single-content-icon">
                                        <i class="lnr lnr-phone-handset"></i>
                                    </span>
                                    <b>Call us:</b><br>
                                    <a href="tel:+4401216303773">+4401216303773</a>
                                </div>
                                <div class="single-content">
                                    <span class="single-content-icon">
                                        <i class="lnr lnr-envelope"></i>
                                    </span>
                                    <b>Email us:</b><br>
                                    <a href="mailto:info@recyclepro.co.uk">info@recyclepro.co.uk</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Page Area -->
			<div class="google-map-wrapper">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d77762.85290007963!2d-1.9336708075634568!3d52.47752147712665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4870942d1b417173%3A0xca81fef0aeee7998!2sBirmingham%2C%20UK!5e0!3m2!1sen!2s!4v1579356216431!5m2!1sen!2s" style="width:100%; height:450px; border:0;" frameborder="0" allowfullscreen></iframe>
            </div>
<?php 
}
function ContactForm(){
?>
		<h5>LEAVE US A MESSAGE</h5>
		<form action="" method="post" class="ho-form contact-form">
			<div class="ho-form-inner">
				<div class="single-input single-input-half">
					<label for="new-review-name">Name*</label>
					<input type="text" name="name" id="name" required>
				</div>
				<div class="single-input single-input-half">
					<label for="new-review-email">Email*</label>
					<input type="email" name="email" id="email" required>
				</div>
				<div class="single-input">
					<label for="new-review-subject">Phone*</label>
					<input type="text" name="phone" id="phone" required>
				</div>
				<div class="single-input">
					<label for="new-review-textbox">Your Message</label>
					<textarea id="message" name="message" cols="30" rows="5"></textarea>
				</div>
				<div class="single-input">
					<label for="new-review-textbox">Enter Captcha Code</label>
					<input type="text"  name="vercodes" id="vercode" required>
				</div>
				<div class="single-input">
					<label for="new-review-textbox">Captcha Code</label>
<img src="rescaptcha.php" >
				</div>
				
					<div class="single-input">
					<button class="ho-button ho-button-dark" type="submit" id="submit" name="submit" value="conttsub"><span>Submit</span></button>
				</div>
			</div>
		</form>
<?php 
}
function ContactThanks(){
    	if ($_POST["vercodes"] != $_SESSION["vercodes"] OR $_SESSION["vercodes"]=='')  {
       echo '<div class="alert alert-danger">Incorrect verification cod </div>';
					$user_obj->UserRegister('local');
    } 
	extract($_REQUEST);
	$insert_sql_array=array();
	$insert_sql_array['name'] = $name;
	$insert_sql_array['phone'] = $phone;
	$insert_sql_array['email'] = $email;
	if($message!='')
	$insert_sql_array['message'] = $message;
	$id=$this->db->pdoinsert(WR_CONTACT_FORM,$insert_sql_array);
	?>
	<div id="" class="appointment_succses">
		<div role="alert" class="alert alert-success">
			<strong>Thank You!</strong> for contacting us. Your message has been sent. <br /><strong>We will get back to you soon.</strong>
		</div>
	</div>
	<?php 
}
} // end of AboutClass
?>	