
<div class="features_items"><!--features_items-->
	<h2 style="font-size:23px!important;color:#38a9dc!important;" class="title text-center">Product Items</h2>
	<div style="display:flex;text-align:center;margin-left:20%;">
	<input style="width:50%!important;background:white!important;line-height:0px!important;" type="text" name="mob-search-field" id="mob-search-field" class="wr-search-field typeahead form-control" placeholder="Enter Your Name" />
                                <button style="width:20%!important;background:#38a9dc!important;color:white!important;line-height:0px!important;" name="mob-search-btn" class="btn btn-default" type="button">FIND</button>
                            </div>
	<?php foreach ($post_by_brand_id as $product) {?>

	<?php if($product->pro_status==2){?>
		<div style="margin-top:4%;" id="myDIV">
	<div class="col-sm-4">
		<div class="product-image-wrapper">
			<div  class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  height="200px" alt="" />
					<p style="font-weight:600;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					
					
							<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<?php } }?>

		
	</div><!--features_items-->
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

