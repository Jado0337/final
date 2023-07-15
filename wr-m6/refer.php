<?php
if ($_POST["vercodet"] != $_SESSION["vercodet"] OR $_SESSION["vercodet"]=='')  {
        $message = '<div class="alert alert-danger">Incorrect Verification Code</div>';
		header("location:forget_password.php?success=false&message='.$message");				
    } 
$email=$_POST['email'];
$vlink = 'https://recyclepro.co.uk/update_password.php?email='.$email;
$to = $email;
$from='noreply@recyclepro.co.uk';
$name='Recyclepro';
$subject = "Welcome to Recyclepro! Confirm your email address to proceed further!";

$message = '<html><body>';
$message .= '<div id="frame" class="ui-sortable" style="min-height: 250px; transform: scale(1);"><table data-module="header0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/gP40LzYDfeOj9CUqS5XsnF67/account_password_reset_2/thumbnails/header.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs o_pt-lg o_xs-pt-xs" align="center" data-bgcolor="Bg Light" style="background-color: white;padding-left: 8px;padding-right: 8px;padding-top: 32px;">
            <!--[if mso]><table width="432" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block-xs last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 432px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-dark o_px o_py-md o_br-t o_sans o_text" align="center" data-bgcolor="Bg Dark" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;background-color: #242b3d;border-radius: 4px 4px 0px 0px;padding-left: 16px;padding-right: 16px;padding-top: 24px;padding-bottom: 24px;">
                    <p style="margin-top: 0px;margin-bottom: 0px;"><a class="o_text-white" href="https://example.com/" data-color="White" style="text-decoration: none;outline: none;color: #ffffff;"><img src="img/m6-logo-1.png" width="136" height="36" alt="SimpleApp" style="max-width: 136px;-ms-interpolation-mode: bicubic;vertical-align: middle;border: 0;line-height: 100%;height: auto;outline: none;text-decoration: none;"></a></p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"><table data-module="hero-dark-button0" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/gP40LzYDfeOj9CUqS5XsnF67/account_password_reset_2/thumbnails/hero-dark-button.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="currentTable">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs editable" align="center" data-bgcolor="Bg Light" style="background-color: white;padding-left: 8px;padding-right: 8px;" contenteditable="false">
            <!--[if mso]><table width="432" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block-xs last-table" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 432px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-dark o_px-md o_py-xl o_xs-py-md o_sans o_text-md o_text-white editable" align="center" data-bgcolor="Bg Dark" data-color="White" data-size="Text MD" data-min="15" data-max="23" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 19px;line-height: 28px;background-color: #242b3d;color: #ffffff;padding-left: 24px;padding-right: 24px;padding-top: 64px;padding-bottom: 22px;" contenteditable="true">
                    <h2 class="o_heading o_mb-xxs" data-size="Heading 2" data-min="20" data-max="40" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 4px;font-size: 30px;line-height: 39px;">Forgot Your Password?</h2>
                    <p class="o_mb-md editable" style="margin-top: 0px;margin-bottom: 24px;" contenteditable="false">Not to worry, we got you! Let’s get you a new password.</p>
                    <table align="center" cellspacing="0" cellpadding="0" border="0" role="presentation" class="last-table">
                      <tbody>
                        <tr>
                          <td width="300" class="o_btn o_bg-primary o_br o_heading o_text" align="center" data-bgcolor="Bg Primary" data-size="Text Default" data-min="12" data-max="20" style="font-family: Helvetica, Arial, sans-serif;font-weight: bold;margin-top: 0px;margin-bottom: 0px;font-size: 16px;line-height: 24px;mso-padding-alt: 12px 24px;background-color: #126de5;border-radius: 4px;">
                            <a class="o_text-white" href="'.$vlink.'" data-color="White" style="text-decoration: none;outline: none;color: #ffffff;display: block;padding: 12px 24px;mso-text-raise: 3px;">Reset My Password</a>
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
    </table></div><div class="parentOfBg"></div><table data-module="footer" data-visible="false" data-thumb="http://www.stampready.net/dashboard/editor/user_uploads/zip_uploads/2018/11/19/gP40LzYDfeOj9CUqS5XsnF67/account_password_reset_2/thumbnails/footer.png" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" class="">
      <tbody>
        <tr>
          <td class="o_bg-light o_px-xs o_pb-lg o_xs-pb-xs editable" align="center" data-bgcolor="Bg Light" style="background-color: white;padding-left: 8px;padding-right: 8px;padding-bottom: 32px;" contenteditable="false">
            <!--[if mso]><table width="432" cellspacing="0" cellpadding="0" border="0" role="presentation"><tbody><tr><td><![endif]-->
            <table class="o_block-xs" width="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="max-width: 432px;margin: 0 auto;">
              <tbody>
                <tr>
                  <td class="o_bg-dark o_px-md o_py-lg o_br-b o_sans o_text-xs o_text-dark_light editable" align="center" data-bgcolor="Bg Dark" data-color="Dark Light" data-size="Text XS" data-min="10" data-max="18" style="font-family: Helvetica, Arial, sans-serif;margin-top: 0px;margin-bottom: 0px;font-size: 14px;line-height: 21px;background-color: #242b3d;color: #a0a3ab;border-radius: 0px 0px 4px 4px;padding-left: 24px;padding-right: 24px;padding-top: 32px;padding-bottom: 32px;" contenteditable="false">
                    <p class="o_mb" style="margin-top: 0px;margin-bottom: 16px;"><a class="o_text-dark_light" href="https://example.com/" data-color="Dark Light" style="text-decoration: none;outline: none;color: #a0a3ab;"></a></p>
                    <p class="o_mb editable" style="margin-top: 0px;margin-bottom: 16px;" contenteditable="false">Copyright © 2020 RecyclePro Inc. All rights reserved.</p>
                    <p class="o_mb editable" style="margin-top: 0px;margin-bottom: 16px;" contenteditable="false">170 Slade Road, Erdington, Birmingham, B23 7PX, UK.&nbsp;</p>
                    &nbsp;Call us: +44 1213822532&nbsp;<p style="margin-top: 0px;margin-bottom: 0px;" contenteditable="false" class="editable">&nbsp; Email us: info@recyclepro.co.uk&nbsp;</p>
                  </td>
                </tr>
              </tbody>
            </table>
            <!--[if mso]></td></tr></table><![endif]-->
            <div class="o_hide-xs" style="font-size: 64px; line-height: 64px; height: 64px;">&nbsp; </div>
          </td>
        </tr>
      </tbody>
    </table><div class="parentOfBg"></div><div id="edit_link" class="hidden" style="display: none; left: 409.656px; top: 660px;">

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
$message .= '</body></html>';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: '.$name.'<'. $from .'>'. "\n";

if(mail($to, $subject, $message, $headers)){
   $message = '<div class="alert alert-success">Email has been sent successfully </div>';
		header("location:forget_password.php?success=true&message='.$message");
} else{
    
    $message = '<div class="alert alert-danger">Unable to send email. Please try again</div>';
		header("location:forget_password.php?success=false&message='.$message");
}
?>
					