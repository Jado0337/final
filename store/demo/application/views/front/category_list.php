<div class="features_items"><!--features_items-->
	<h2 style="font-size:23px!important;color:#38a9dc!important;" class="title text-center">Product Categories</h2>
	<?php foreach ($post_by_cat_id as $value) {?>

	
	<div class="col-sm-3">
		<div class="product-image-wrapper">
			<div class="single-products">
				<div class="productinfo text-center">
					<img style="width:130px!important;height:130px!important;margin-top:4%;" src="<?php echo base_url();?>uploads/<?php echo $value->brand_img; ?>"  alt="" />
					
					</br>
					<a style="background-color:#38a9dc!important;color:white!important;margin-top:4%;" href="<?php echo base_url()?>show-post-by-sub-cat-id/<?php echo $value->sub_cat_id; ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i><?php echo $value->sub_category_name?></a>
				</div>
				
			</div>
			</div>
		</div>
	<?php } ?>
		<?php if($post_by_cat_id!=NUll){?>
			<?php echo $this->pagination->create_links();?>
	<?php }else{?>
	<p>There are no product available......please check other category or brand</p>
	<?php }?>
</div><!--features_items-->