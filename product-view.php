<?php

if(isset($_GET['name']) || isset($_GET['pid']))
{
include('Db.php');
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url= $protocol .$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$sqy = "select productname from wr_product where id='".$_GET['pid']."' OR productname='".str_replace('-',' ',$_GET['name'])."'";
$rec=mysqli_query($con,$sqy);
$ros=mysqli_fetch_array($rec);
$names=str_replace(' ','-',$ros['productname']);

$urz=$url.'&name='.$names;
$g=str_replace('&name='.$names.''.'&name='.$names,'&name='.$names,$urz);
$uki="product-view?name=".$names."&pid=".$_GET['pid']."&vid=".$_GET['vid']."";
if($url=="product-view.php?pid=".$_GET['pid']."&vid=".$_GET['vid']."" || $url=="product-view?pid=".$_GET['pid']."&vid=".$_GET['vid']."" || $url=="product-view?pid=".$_GET['pid']."&vid=".$_GET['vid']."&name=".$names.""|| $url=="product-view.php?pid=".$_GET['pid']."&vid=".$_GET['vid']."&name=".$names."" )
{
  $yourURL="product-view?name=".$names."&pid=".$_GET['pid']."&vid=".$_GET['vid']."";
    header("location: $yourURL", true, 301);
}
else if($url=="product-view?name=".$names."")
{
  $yourURL="https://www.recyclepro.co.uk";
    header("location: $yourURL", true, 301);
}
else if(empty($names))
{
 header("HTTP/1.1 410 Gone");
exit;
}


}
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/products/products.class.php');
$layout_obj = new LayoutClass();
$pro_obj = new FrontProductClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">
<head>
    <Style>
        .MultiCarousel {
	float: left;
	overflow: hidden;
	padding: 15px;
	width: 100%;
	position: relative;
}
.MultiCarousel .MultiCarousel-inner {
	transition: 1s ease all;
	float: left;
}
.pdetails-singleimage.border-blue-wr {
    text-align: center;
}
.MultiCarousel .MultiCarousel-inner .item {
	float: left;
}
.MultiCarousel .MultiCarousel-inner .item > div {
	text-align: center;
	padding: 10px;
	margin: 10px;
	color: #666;
}
.MultiCarousel .leftLst,
.MultiCarousel .rightLst {
	position: absolute;
	border-radius: 50%;
	top: calc(50% - 20px);
}
/******* Bnt Full********
.MultiCarousel .leftLst, .MultiCarousel .rightLst {
    position: absolute;
    border-radius: 50%; 
    height: 80%;
    top: 24px;
}**/

.MultiCarousel .leftLst {
	left: 0;
}
.MultiCarousel .rightLst {
	right: 0;
}

.MultiCarousel .leftLst.over,
.MultiCarousel .rightLst.over {
	pointer-events: none;
	background: #ccc;
}
@media only screen and (max-width: 690px) {
.select-language.mob.zoom {
    margin-left: 50%;
}
}
    </Style>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php $pro_obj->getPageTitle(); ?>
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
    	<link rel="stylesheet" href="home/css/owl.carousel.css">				
		
	<link rel="stylesheet" href="css/css-utilities-technovibes.css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		
    <!-- Custom Styles -->
    <link rel="stylesheet" href="css/custom.css">
	<script src="js/page.js"></script>
	<?php echo $layout_obj->getBasicVals('Header_codes','option_value'); ?>
</head>

<body>
    <?php echo $layout_obj->getBasicVals('After_body_tags','option_value'); ?>
    <div id="wrapper" class="wrapper">

        <!-- Header -->
        <?php $layout_obj->pageHead(''); ?>
        <!--// Header -->

        <!-- Breadcrumb Area -->
        <?php $pro_obj->ProductBreadcrums($pid,$vid); ?>
        <!--// Breadcrumb Area -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Product Details Area -->
            <div class="product-details-area bg-white ptb-30">
                <?php 
				if($submit == 'prosubmit'){
					$pro_obj->AddToCart();
				}
				else{
					$pro_obj->ProductView($pid,$vid);
				}
				
				?>
            </div>
            <!--// Product Details Area -->

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
	</script>
	<script>
	$(document).ready(function() {
    var isshow = localStorage.getItem('isshow');
    if (isshow == null) {
        localStorage.setItem('isshow', 1);

        // Show popup here
        $('#myModal').modal('hide');
    }
    else{
    $('#myModal').modal('hide');
  }
});
document.addEventListener('touchmove', function(event) {
        event = event.originalEvent || event;
        if (event.scale !== 1) {
           event.preventDefault();
        }
    }, false);
   $(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();




    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 1200) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 992) {
                incno = itemsSplit[2];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[1];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }


    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});
	</script>
		<script> 
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide(){
    slides[currentSlide].className = 'slide';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing';
}

var playing = true;
var pauseButton = document.getElementById('pause');

function pauseSlideshow(){
    pauseButton.innerHTML = 'Play';
    playing = false;
    clearInterval(slideInterval);
}

function playSlideshow(){
    pauseButton.innerHTML = 'Pause';
    playing = true;
    slideInterval = setInterval(nextSlide,2000);
}

pauseButton.onclick = function(){
    if(playing){ pauseSlideshow(); }
    else{ playSlideshow(); }
};
</script>
    <!-- Js Files -->
    <script src="js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    	<script src="home/js/owl.carousel.min.js"></script>							
		
    <script src="js/main.js"></script>
<?php $pro_obj->ProductJS(); ?>
<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>