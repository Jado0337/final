<?php 
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/layout/layout.class.php');
require_once('wr-m6/apps/front/home/homepage.class.php');
require_once('wr-m6/apps/front/products/products.class.php');

$layout_obj = new LayoutClass();
$home_obj = new HomePage();
$pro_obj = new FrontProductClass();
extract($_REQUEST);
?>
<!doctype html>
<html class="no-js" lang="en-gb">

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
	<style>
	    .warning {
    background-color: #ffffcc;
    border-left: 6px solid #ffeb3b;
    padding:10px;
}
@media only screen and (max-width: 690px) {
.select-language.mob.zoom {
    margin-left: 50%;
}
}

	</style>
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

            <!-- Shop Page Area -->
            <div class="shop-page-area bg-white ptb-30">
                <?php $pro_obj->ShowAllProducts(); ?>
            </div>
            <!--// Shop Page Area -->

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
     <!--<script>
$(document).ready(function(){
  $("#mob-search-field").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var count = 0;
    $("#myDIV div").filter(function() {
         if($(this).text().indexOf(value) > -1) count++;
     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
     
    });
    if(count == 0) 
    {
        console.log('saqib');
    }
  });
});
</script>-->

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
          $('#msg').show();
      // Show the list item if the phrase matches and increase the count by 1
      } else {
          $(this).show();
          $('#msg').hide();
          count++;
      }
  });

  // Update the count
  var numberItems = count;
  $("#filter-count").text("Number of Comments = "+count);
  });
</script>
<script>
		$(document).ready(function () {
			$('#mob-search-fields').typeahead({
				source: function (querys, result) {
				  var querys = $('#mob-search-fields').val();
				   if(querys == "iphone 13" || querys == "iphone 12" || querys == "iphone 11" || querys == "iphone 13 pro" || querys == "iphone 12 pro" || querys == "iphone 11 pro" || querys == "iphone 13 pro max" || querys == "iphone 12 pro max" || querys == "iphone 11 pro max")
				    {
				         var query = querys.split(' ').join(' ');    
				    }
				    else if(querys == "")
				    {
				    var query = querys.split(' ').join(' ');   
				    $('ul.divcontact.dropdown-menu.src').attr("style","display: none !important;");
				    }
				    else
				    {
				    var query = querys.split(' ').join(' '); 
				      }
				 console.log(query)
					$.ajax({
						url: "search-info.php",
						data: 'query=' + query,            
						dataType: "json",
						type: "POST",
						success: function (data) {
						    $(".divcontact").html(data);
							result($.map(data, function (item) {
								return item;
							}));
						}
					});
				}
			});
		});
			$("#mob-search-fields").keyup(function(e){
   if($.trim($('#mob-search-fields').val()) == ''){
				     
				        $('.divcontact').attr("style","display: none !important;");
				        $('.ul.typeahead.dropdown-menu').attr("style","display: none !important;");
				     }
});
	</script>
	
	<script>
		$(document).on('change','#mob-search-fields',function() {
			var serval = $('#mob-search-fields').val();
			var info = 'serval=' + serval;
			$.ajax({
			   type: "POST",
			   url: "wrajax.php?index=SearchVal",
			   data: info,
			   success: function(server_response){
				   ser_res = server_response;
				   var strarray = ser_res.split(',');
				   if(strarray[1]!='') {
					   window.location.href = "product-view.php?pid=" + strarray[0] + "&vid=" + strarray[1];
				   }
			 }
			});
			return false;
		});
	function check(id,vid)
	{
	    window.location.href = "product-view.php?pid=" + id + "&vid=" + vid;
		}
	function checq(a,b,c,d,e,f,g)
	{
	    //alert(a);
	    window.location.href = "laptop_views.php?bid=" + a + "&pc=" + b +"&pid=" + c + "&inch=" + d + "&ram=" + e + "&prc=" + f + "&year=" + g;
	}
	</script>

	<!--<script> 
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
</script>-->
<!--<script>
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

	</script>-->
	
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
   	<script src="js/typeahead.js"></script>
	<?php echo $layout_obj->getBasicVals('Footer_script_code','option_value'); ?>
</body>
</html>