<div class="features_items"><!--features_items-->
	
		<img style="margin-bottom:4%;" src="assets/front/images/home/mobilebanner.jpg">
	
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<?php $allproduct = $this->HomeModel->get_mobile_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"   />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					
							<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
</div>
				
			<div class="item">	
				<?php $allproduct = $this->HomeModel->get_mobile_six(); ?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  />
					
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
				
		</div>
	</div>
		<a style="display:none;" class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a style="display:none;" class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
					</div><!--/recommended_items-->
					<div class="features_items"><!--features_items-->
	<img style="margin-bottom:4%;" src="assets/front/images/home/laptopbanner.jpg">
	
	<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<?php $allproduct = $this->HomeModel->get_laptop_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
</div>
				
			<div class="item">	
				<?php $allproduct = $this->HomeModel->get_laptop_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  alt="" />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
				
		</div>
	</div>
		<a style="display:none;" class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a style="display:none;" class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
					</div><!--/recommended_items-->
					<div class="features_items"><!--features_items-->
	<img style="margin-bottom:4%;" src="assets/front/images/home/watchbanner.jpg">
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<?php $allproduct = $this->HomeModel->get_watch_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  height="200px" alt="" />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
</div>
				
			<div class="item">	
				<?php $allproduct = $this->HomeModel->get_watch_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  height="200px" alt="" />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
				
		</div>
	</div>
		<a style="display:none;" class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a style="display:none;" class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
					</div><!--/recommended_items-->
					<div class="features_items"><!--features_items-->
	<img style="margin-bottom:4%;" src="assets/front/images/home/tabletbanner.jpg">
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner">
			<div class="item active">	
				<?php $allproduct = $this->HomeModel->get_tablet_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  height="200px" alt="" />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
</div>
				
			<div class="item">	
				<?php $allproduct = $this->HomeModel->get_tablet_six();?>
	<?php foreach ($allproduct as $product) {?>
	<?php if($product->pro_status==2){?>
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<form action="<?php echo base_url()?>add-to-cart"  method="post">
					<img src="<?php echo base_url();?>uploads/<?php echo $product->pro_image; ?>"  height="200px" alt="" />
					<p style="font-weight:600;font-size:12px;"><?php echo $product->pro_title?> - <span style="font-weight:600;"><?php echo $product->colour; ?></span></p>
					<a  style="background-color:#38a9dc!important;color:white;" href="<?php echo base_url()?>product-details/<?php echo $product->pro_id?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>View Item</a>
							</form>
					
				</div>
				
			</div>
			
		</div>
	</div>
<?php } }?>
				
		</div>
	</div>
		<a style="display:none;" class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a style="display:none;" class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>			
	</div>
					</div><!--/recommended_items-->