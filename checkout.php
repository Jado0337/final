<?php
require_once("wr-m6/wrbasic/config.inc.php");
require_once("wr-m6/apps/front/class/config.front.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/products/products.class.php');
$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Recycle Pro</title>
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

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="js/page.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
	<Style>
	    .tacbox {
  display:block;
  padding: 1em;
  margin: 2em;
  border: 3px solid #ddd;
  background-color: #eee;
  max-width: 800px;
}


input[type=checkbox], input[type=radio] {
    opacity: 1 !important;
    display: inline-block;
    vertical-align: middle;
    visibility: inherit;
    width:2em!important;
}
	</Style>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
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
                        <li><a href="index.php">Home</a></li>
                        <li>Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->
        <!-- Page Conttent -->
        <main class="page-content">
				<?php
				switch($chk){

				case '1':
				$pro_obj->CheckOut();
				break;

				case '2':
				$pro_obj->ConfirmCheckOut();
				break;

				default:
					if($proceed1=='proceedsbt1')
					$pro_obj->CheckOutAddrSBT();
					else
					$pro_obj->CheckOutAddr();
				break;
				}
				?>
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


    <div id="label_area" class="label_area" style="opacity:0">
    </div>

    <?php

    if(isset($_GET['aspx'])){
    ?>
    <!-- <button type="button" name="button" id="gen1">Generate</button> -->
    <?php
    }
    ?>





    <?php
    if(isset($_GET['type'])){
    $type = $_GET['type'];
    if($type=="selling"){
       ?>
      <script>
         $(".order-infobox").find("button[type='submit']").hide();
         $(".order-infobox table").append("<div class='card card-review'><div class='card-body'><div class='review-heading'><div class='review-title'><div class='review-image-holder'><img src='images/logo-royal-mail.png' alt='Royal Mail' class='review-image-logo' style=' width: 25%; text-align: center; display: block; margin-left: auto; margin-right: auto;'></div><h3 style=' text-align: center;'>Send with: Royal Mail</h3></div></div><div class='review-inner'><div class='review-info'><p>Please note - your items will be fully insured during transit.</p><p>So we can pay you faster, we’ll email your Pack &amp; Send Guide as soon as you complete your order.</p></div></div></div></div><input type='button' class='btn btn-primary complete_sell_order' value='COMPLETE ORDER' style=' background: #13564f;'>");
       </script>
       <?php

    }

    }
    ?>
	<script>
	includeHTML();
	</script>
	<script type="text/javascript">

$(document).ready(function () {


    $("#chk").click(function () {
        // $("#chk").hide();
       return true;
    });
    $(document).ready(function () {
   $(".ans").hide();
$("#checkbox").click(function() {
    if($(this).is(":checked")) {
        $(".ans").show();
    } else {
        $(".ans").hide();
    }
});
});

$(document).on("click","#gen1",function() {
$(".wait_label").html("<img width='90px' src='images/loader.gif'/>");
var href = $(this).attr("href2");
$.ajax({
type: "POST",
url: 'api_script.php',
data: {getLabel: 1},
success: function(response){

$(".label_area").html(response);


  setTimeout(function() {


        html2canvas(document.querySelector("#pf1")).then(canvas => {
          var dataURL= canvas.toDataURL();

        // post the dataUrl to php
        $.ajax({
        type: "POST",
        url: "test/api_script.php",
        data: {LabelOrder: dataURL}
        }).done(function(respond) {
        // you will get back the temp file name
        // or "Unable to save this image."
        window.open(href,'_self');
        });
        });
      }, 1000);

}
});





});



    /*$(document).on("click",".complete_sell_order",function() {
    var fullname = $("#full_name").val();
    var country = $("#country").val();
    $.ajax({
    type: "POST",
    url: 'api/dir/api-work/script.php',
    data: {fullname: fullname,country:country},
    success: function(data){
    alert("Thanks for Selling , check your email for QR Code.");
    console.log(data);
    }
    });
    });*/


});

</script>
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
<?php $pro_obj->ProductJS(); ?>
<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>
