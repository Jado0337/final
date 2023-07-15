<?php $all_slider = $this->ProductModel->get_slider()?>

<div  style="padding-right:0px!important;padding-left:0px!important;" class="col-sm-12">
	<div id="slider-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
			<li data-target="#slider-carousel" data-slide-to="1"></li>
			<li data-target="#slider-carousel" data-slide-to="2"></li>
			<li data-target="#slider-carousel" data-slide-to="3"></li>
		</ol>
		
		<div class="carousel-inner">

			<?php
				$i=1;
				foreach ($all_slider as $slider) {
					if($i==1){
						echo "<div class='item active'>";
					}else{
						echo "<div class='item'>";
					}
			?>
			
				<div class="col-sm-12">
					<img src="<?php echo base_url().$slider->slider;?>" class="girl img-responsive slide" alt=""  />
					<img src="images/home/pricing.png"  class="pricing" alt=""  />
				</div>
			</div>
			<?php $i++; } ?>

		</div>
		
		<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
			<i class="fa fa-angle-left"></i>
		</a>
		<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
			<i class="fa fa-angle-right"></i>
		</a>
	</div>
	
</div>
