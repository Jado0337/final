<?php 
error_reporting(E_ALL); ini_set('display_errors', 1);
require_once("wr-m6/wrbasic/config.inc.php");
require_once("wr-m6/apps/front/class/config.front.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/user/user.class.php');
$layout_obj = new LayoutClass();
$user_obj = new UserClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<head>
     <style>
        body{
margin: 0;
padding: 0;
font-family: 'Raleway', sans-serif;
font-size: 15px;
line-height: 1.5;
}
#container {
width: 535px;
background: #ffffff;
padding: 20px;
margin: 90px auto;
border-radius: 5px;
height: 150px;
border: 2px solid gray;
}
#header {
text-align: center;
background-color: #FEFFED;
border-radius: 5px;
margin: -39px -20px 10px -20px;
}
h2{
padding-top: 10px;
}
#content {
margin-left: 57px;
margin-top: 40px;
}
#register label{
margin-right:5px;
}
#register input {
padding: 5px 14px;
border: 1px solid #d5d9da;
box-shadow: 0 0 9px #0E34F5 inset;
width: 272px;
font-size: 1em;
height: 25px;
}
#register .short{
font-weight:bold;
color:#FF0000;
font-size:larger;
}
#register .weak{
font-weight:bold;
color:orange;
font-size:larger;
}
#register .good{
font-weight:bold;
color:#2D98F3;
font-size:larger;
}
#register .strong
{
font-weight:bold;
color: limegreen;
font-size:larger;
}
.warning {
    background-color: #ffffcc;
    border-left: 6px solid #ffeb3b;
    padding:10px;
}
.register__form-item-note {
    line-height: 1.4;
    text-align: left;
    border-left: .375em solid #41acff;
    font-size: 1em;
    padding: .5em .75em;
    background: #f9f9f9;
}
	
input{
    font-size: 18px;
  padding: 10px 10px 10px 5px;
  display: block;
  width: 300px;
  border: none;
  border-bottom: 1px solid #757575;\
  margin-bottom:2%;
}




input:focus {
  outline: none;
}

label {
  color: #999;
  font-size: 18px;
  font-weight: normal;
  position: absolute;
  pointer-events: none;
  left: 29px;
  top: 0px;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
  background-color:white;
}

input:focus ~ label,
input:valid ~ label {
  top: -20px;
  font-size: 14px;
  color: #4285f4;
}

.bar {
  position: relative;
  display:block;
  width:315px;
}

.bar:before,
.bar:after {
  content: '';
  height: 2px;
  width: 0;
  bottom: 1px;
  position: absolute;
  transition: 0.2s ease all;
  -moz-transition: 0.2s ease all;
  -webkit-transition: 0.2s ease all;
}

.bar:before {
  left: 50%;
}

.bar:after {
  right: 50%;
}

input:focus ~ .bar:before,
input:focus ~ .bar:after {
  width: 50%;
}

.highlight {
  position: absolute;
  height: 60%;
  width: 100px;
  top: 25%;
  left: 0;
  pointer-events: none;
  opacity: 0;
}

input:focus ~ .highlight {
  -webkit-animation: inputHighlighter 0.3s ease;
  -moz-animation: inputHighlighter 0.3s ease;
  animation: inputHighlighter 0.3s ease;
}

/* animations */
@-webkit-keyframes inputHighlighter {
  from { background: #4285f4; }
  to   { width: 0; background: transparent; }
}
@-moz-keyframes inputHighlighter {
  from { background: #4285f4; }
  to   { width: 0; background: transparent; }
}
@keyframes inputHighlighter {
  from { background: #4285f4; }
  to   { width: 0; background: transparent; }
}
button, input[type=email], input[type=date], input[type=number], input[type=password], input[type=text], select {
    overflow: visible;
    margin-bottom: 2%;
    height:auto!important;
}
.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -50px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}
.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #248c81!important;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(0 123 255 / 25%);
}
.nice-select.open, .nice-select:focus {
    border-color:  #248c81!important;
}
.nice-select:active{
     border-color:  #dbdbdb!important;
}
.nice-select span.current {
    display: block;
    position: relative;
    color: #7e7e7e;
    letter-spacing: 0;
    font-size: 18px!important;
    padding: 0;
}
</style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RecyclePro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">
	<link rel="stylesheet" href="css/inlinehelp.css">
    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   
	<script src="js/page.js"></script>
		<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <div class="breadcrumb-area bg-grey">
            <div class="container">
                <div class="ho-breadcrumb">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- My Account Page -->
			<?php 
				if($regbtn=='Register')
				$user_obj->UserRegister('server');
				else 
				$user_obj->UserRegister('local');
			?>
            
            <!--// My Account Page -->

            <!-- Newsletter Area -->
            <?php $layout_obj->NewsLetterArea(); ?>
            <!--// Newsletter Area -->

        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
        <?php $layout_obj->footer(); ?>
        <!--// Footer -->


    </div>
    <!--// Wrapper -->
	<script>
	includeHTML();
	$(document).ready(function() {
$('#password').keyup(function() {
$('#result').html(checkStrength($('#password').val()))
})
function checkStrength(password) {
var strength = 0
if (password.length < 6) {
$('#result').removeClass()
$('#result').addClass('short')
return 'Too short'
}
if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
if (strength < 2) {
$('#result').removeClass()
$('#result').addClass('weak')
return 'Weak'
} else if (strength == 2) {
$('#result').removeClass()
$('#result').addClass('good')
return 'Good'
} else {
$('#result').removeClass()
$('#result').addClass('strong')
return 'Strong'
}
}
});
	</script>
   <script>
        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
    <script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
     $('#password').focus();
  } else {
    input.attr("type", "password");
    $('#password').focus();
  }
});
$(document).ready(function() {
$('#confirm_password').keyup(function() {
if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
    
  } else 
    $('#message').html('Not Matching').css('color', 'red');
    
    
});
});

</script>
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>

</html>