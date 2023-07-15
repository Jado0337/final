<div class="col-sm-3">
	<div class="left-sidebar">
		<h2 style="color:#38a9dc!important;">Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<?php $all_category = $this->CategoryModel->get_all_category();?>
			<?php $all_brands = $this->BrandModel->get_all_brand();?>
			<?php $all_sub_category = $this->CategoryModel->get_all_sub_category();?>
			<?php foreach ($all_category as  $maincat) {?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $maincat->category_name;?>">
							<span class="badge pull-right">
							<?php foreach ($all_sub_category as $plusicon){?>
								<?php if($plusicon->category_sub_id == $maincat->category_id){?>
									<i class="fa fa-plus"></i>
							<?php if($plusicon->category_sub_id == $maincat->category_id) {
								        break;    
								    }?>
								<?php }}?>
							
							</span>
							<a href="<?php echo base_url()?>show_post_by_cat_id/<?php echo $maincat->category_id; ?>"><?php echo $maincat->category_name?></a>		
						</a>
					</h4>
				</div>
				<div id="<?php echo $maincat->category_name;?>" class="panel-collapse collapse">
					<div  class="panel-body">
						<ul>
							<?php foreach ($all_sub_category as  $subcat) {?>
								<?php if($subcat->category_sub_id == $maincat->category_id){?>
										<li style="background-color: #ece9e9;color: #FFFFFF;padding: 10px 20px;margin-bottom:2%;"><a href="<?php echo base_url()?>show-post-by-sub-cat-id/<?php echo $subcat->sub_cat_id?>"><?php echo $subcat->sub_category_name?></a></li>
								<?php }?>
							<?php } ?>						
						</ul>
					</div>
				</div>
			</div>
			<?php }?>
			<!--
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title"><a href="#">Kids</a></h4>
				</div>
			</div>
		-->
		</div><!--/category-productsr-->

		<!--/brands_products-->
		<!--price-range-->
		<!-- <div class="price-range">
			<h2>Price Range</h2>
			<div class="well">
				<form action="<?php echo base_url()?>show-product-by-price-range" method="post">
				 <input type="text" class="span2" value="" data-slider-min="10" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
				 <b>$ 0</b> <b class="pull-right">$ 600</b>
				 <input type="submit" Value="filter">
				</form>
			</div>
		</div> -->
		<!--/price-range-->

		<!--price-range-->
		
		
		
		<div class="">
			

			<h2 style="color:#38a9dc!important;margin-top:4%;margin-bottom:6%!important;">Colour</h2>
			<div class="pricerange">

			  <form method="post" action="<?php echo base_url()?>show_product_by_filter" >
			  	<input class="form-control" type="hidden" id="amount1" name="amount1" value="<?php echo $id; ?>">
			  	<input class="form-control" type="hidden" id="type" name="type" value="colour">
			    <select style="margin-top:4%;" class="form-control" name="pro_cat" id="pro_cat">
			    	<option>Select Colour</option>
                                        <?php
                                         foreach ($colour as $c) {  ?>
                                        <option value="<?php echo $c['colour'];?>"><?php echo $c['colour'];?></option>
                                        <?php } ?>
			    </select>
			    
			    <input style="background-color:#38a9dc!important;" type="submit" name="submit_range" value="FILTER">
			  </form>
			</div>
			
		</div>
		<!--/price-range-->











		<div style="background-color:white" class="shipping text-center"><!--shipping-->
			<img src="<?php echo base_url()?>assets/front/images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->
		<div style="background-color:white;margin-bottom:10%;" class="shipping text-center"><!--shipping-->
			<img src="<?php echo base_url()?>assets/front/images/home/shipping1.jpg" alt="" />
		</div><!--/shipping-->
		
	</div>
</div>
<script>
        
 $(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1500,
      values: [ 500,1000 ],
      slide: function( event, ui ) {
        $( "#amount" ).html( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
		$( "#amount1" ).val(ui.values[ 0 ]);
		$( "#amount2" ).val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).html( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  });
  </script>

    