<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/products/products.class.php');
$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $pro_obj->getPageTitle(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/icon.png">

    <!-- Google font (font-family: 'Roboto', sans-serif;) -->
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">-->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/plugins.css">

    <!-- Style Css -->
    <link rel="stylesheet" href="style.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
                        <li><a href="index.php">Home</a></li>
                        <li>Select Product</li>
                    </ul>
                </div>
            </div>
        </div>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

          <div class="jumbotron text-center">
  <h1 class="display-3">Thank You For Your Response</h1>
 
  <hr>
  
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="" role="button">Continue to homepage</a>
  </p>
</div>
        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
        <?php $layout_obj->footer(); ?>
        <!--// Footer -->


    </div>
    <!--// Wrapper -->
     <script>
$(document).ready(function(){
  $("#mob-search-field").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV div").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<script>
$("#lap-search-field").keyup(function(){
  // Retrieve the input field text and reset the count to zero
  var filter = $(this).val(), count = 0;
  // Loop through the comment list
  $("#mine div").each(function(){
      var pattern = filter.trim().match(/[a-zA-Z]+|[0-9]+/g) || "";  // null coalescing: "" if null
      if(pattern) {
        pattern = pattern.map(function(el) { 
          return '(?=.*' + el + ')';
        });
        //join if there is something in the array
        pattern = pattern.join("");
     }
     //console.log(pattern.join("")); 
     // If the list item does not contain the text phrase fade it out
     if ($(this).text().search(new RegExp(pattern, "i")) < 0) {
          $(this).fadeOut(200);
      // Show the list item if the phrase matches and increase the count by 1
      } else {
          $(this).show();
          count++;
      }
  });

  // Update the count
  var numberItems = count;
  $("#filter-count").text("Number of Comments = "+count);
  });
</script>
	<script>
	includeHTML();
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