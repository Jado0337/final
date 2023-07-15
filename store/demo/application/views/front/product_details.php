<style>
	.form-control
	{
		width:50%;
	}
</style>
<div class="product-details"><!--product-details-->
	<div  class="col-sm-6">
		<div class="view-product">
			<img  src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_image; ?>" alt="" />
			
		</div>
		<div style="text-align:center;" id="similar-product" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<a href=""><img style="width:130px; height:100px; border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_image; ?>" alt=""></a>
					<a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_imageone; ?>" alt=""></a>
					<a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_imagetwo; ?>" alt=""></a>
				</div>
				<div class="item">
					<a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_image; ?>" alt=""></a>
          <a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_imageone; ?>" alt=""></a>
          <a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_imagetwo; ?>" alt=""></a>
				</div>
				<div class="item">
					<a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_image; ?>" alt=""></a>
          <a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_imageone; ?>" alt=""></a>
          <a href=""><img style="width:130px; height:100px;border:1px solid #bfbfbf;" src="<?php echo base_url(); ?>uploads/<?php echo $product_info->pro_imagetwo; ?>" alt=""></a>
				</div>

			</div>

			<!-- Controls -->
			
		</div>

	</div>
	<?php 
	if($product_info->pro_cat==72)
	{ ?>
	<div style="background-color:#e8e8e8;" class="col-sm-6">
		<div class="product-information"><!--/product-information-->
			<h2 style="color:#38a9dc!important;font-size:23px;font-weight:600;margin-bottom:4%;"><?php echo $product_info->pro_title.'-'.$product_info->colour;?></h2>
			
			<!-- <img src="<?php echo base_url()?>assets/front/images/product-details/rating.png" alt="" /> -->
			
				<form action="<?php echo base_url()?>add-to-cart"  method="post">
					
					<input type="hidden" value="<?php echo $product_info->pro_id?>" name="pro_id" id="id"/>
					<input type="hidden"  name="prc" id="prc"/>
					<div class="form-group">
                                    <label>Quantity:</label>
                                    <input style="text-align:center;width:13%!important;font-weight:800;" class="form-control" type="text" value="1" name="qty"/>
                                </div>
                                <div id="1"  class="form-group">
                                    <label>Select Variant</label>
                                    <select class="form-control" name="model" id="model">
                                    	 <option  value="">Please Select Variation</option>
                                    	<?php foreach($variant as $v)
                                    	{
                                    		?>
                                        <option value="<?php echo $v->model; ?>"><?php echo $v->model; ?></option>
                                        <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div id="2" class="form-group">
                                    <label>Select Year</label>
                                    <select class="form-control" name="year" id="year">
                                        <option value="">Please Select Year</option>
                                    </select>
                                </div>

                                <div id="3" class="form-group">
                                    <label>Select Processor</label>
                                    <select class="form-control" name="prs" id="prs">
                                        <option value="">Please Select Processor</option>
                                    </select>
                                </div>

                                <div id="4" class="form-group">
                                    <label>Select Ram</label>
                                    <select class="form-control" name="ram" id="ram">
                                        <option value="">Please Select Ram</option>
                                    </select>
                                </div>
                                
                                <div id="5" class="form-group">
                                    <label>Select Condition</label>
                                    <select class="form-control" name="cnd" id="cnd">
                                        <option value="">Please Select Condition</option>
                                        
                                         <option value="pristine">Pristine</option>
                                         <option value="vgood">Very Good</option>
                                         <option value="good">Good</option>
                                        
                                    </select>
                                </div>
                                <div id="6">
                                <div  class="form-group">
                                	<div style="display:flex;">
                               <h2 style="color:#0d4561;font-size:38px;font-weight:600;">Price:<span style="color:#38a9dc!important;font-size:38px;font-weight:600;" id="price" ></span> </h2> </div>
                                </div>
                                <div class="form-group">
                                <p ><b style="font-weight:600;color:#0d4561;">Availability:</b>
				<?php if($product_info->pro_quantity>0)
				{
					echo '<span style="color:white!important;background-color:greenyellow;font-size:13px;font-weight:600;padding:1%;">In Stock</span>';
				}
				elseif($product_info->pro_availability==3)
				{
					echo '<span style="color:white!important;background-color:yellow;font-size:13px;font-weight:600;padding:1%;">Up Coming</span>';
				}
				else
				{
					echo '<span style="color:white!important;background-color:red;font-size:13px;font-weight:600;padding:1%;">Out Of Stock</span>';
				}
				?>
			</p>
			 </div>
<button style="background-color:#38a9dc!important;margin-left:0px!important;" type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
        </div>
					</form>	
			<!-- <p><b>Condition:</b> New</p> -->
			<a href=""><img src="<?php echo base_url()?>assets/front/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
	<?php
}
else
{
	?>
	<div style="background-color:#e8e8e8;" class="col-sm-6">
		<div class="product-information"><!--/product-information-->
			<h2 style="color:#38a9dc!important;font-size:23px;font-weight:600;margin-bottom:4%;"><?php echo $product_info->pro_title.'-'.$product_info->colour;?></h2>
			
			<!-- <img src="<?php echo base_url()?>assets/front/images/product-details/rating.png" alt="" /> -->
			
				<form action="<?php echo base_url()?>add-to-cart"  method="post">
					
					<input type="hidden" value="<?php echo $product_info->pro_id?>" name="pro_id" id="id"/>
					<input type="hidden"  name="prc" id="prc"/>
					<div class="form-group">
                                    <label>Quantity:</label>
                                    <input style="text-align:center;width:13%!important;font-weight:800;" class="form-control" type="text" value="1" name="qty"/>
                                </div>
                                <div id="one" class="form-group">
                                    <label>Select Variant</label>
                                    <select class="form-control" name="variation" id="variation">
                                    	 <option  value="">Please Select Variation</option>
                                    	<?php foreach($variant as $v)
                                    	{
                                    		?>
                                        <option value="<?php echo $v->model; ?>"><?php echo $v->model; ?></option>
                                        <?php
                                    }
                                    ?>
                                        
                                    </select>
                                </div>
                                <div id="two" class="form-group">
                                    <label>Select Network</label>
                                    <select class="form-control" name="sub_cat" id="sub">
                                        <option value="">Please Select Network</option>
                                    </select>
                                </div>
                                <div id="three" class="form-group">
                                    <label>Select Condition</label>
                                    <select class="form-control" name="condition" id="condition">
                                        <option value="">Please Select Condition</option>
                                        
                                         <option value="pristine">Pristine</option>
                                         <option value="vgood">Very Good</option>
                                         <option value="good">Good</option>
                                        
                                    </select>
                                </div>
                                <div id="four">
                                <div class="form-group">
                                	<div style="display:flex;">
                               <h2 style="color:#0d4561;font-size:38px;font-weight:600;">Price:<span style="color:#38a9dc!important;font-size:38px;font-weight:600;" id="price" ></span> </h2> </div>
                                </div>
                                <div class="form-group">
                                <p ><b style="font-weight:600;color:#0d4561;">Availability:</b>
				<?php if($product_info->pro_quantity>0)
				{
					echo '<span style="color:white!important;background-color:greenyellow;font-size:13px;font-weight:600;padding:1%;">In Stock</span>';
				}
				elseif($product_info->pro_availability==3)
				{
					echo '<span style="color:white!important;background-color:yellow;font-size:13px;font-weight:600;padding:1%;">Up Coming</span>';
				}
				else
				{
					echo '<span style="color:white!important;background-color:red;font-size:13px;font-weight:600;padding:1%;">Out Of Stock</span>';
				}
				?>
			</p>
			 </div>



					<button style="background-color:#38a9dc!important;margin-left:0px!important;" type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
					</div>
				</form>	
			
			
			
			<!-- <p><b>Condition:</b> New</p> -->
			
			<a href=""><img src="<?php echo base_url()?>assets/front/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
	<?php
}
?>
</div>
<script>
$(document).ready(function(){
$('#variation').change(function(){
    var variation= $(this).val();
    var id= $('#id').val();
     $.ajax({
        type: "POST",
        url: "<?php echo base_url('Home/fetch_networks'); ?>",
        dataType:'json',
        data:{variation:variation, id:id},
        success: function(response){  
       console.log(variation);
       $.each(response,function(i){
        // Remove options 
          $('#sub').find('option').not(':first').remove();
          var i;
           for(i=0; i<response.length; i++){
             $('#sub').append('<option value="'+response[i]['network']+'">'+response[i]['network']+'</option>');
         }
          });
        }
    });
});
});
</script>
<script>
$(document).ready(function(){
$('#condition').change(function(){
    var condition= $(this).val();
    var sub= $('#sub').val();
    var variation= $('#variation').val();
    var id= $('#id').val();
    console.log(condition+sub+variation+id);
    $.ajax({
        url:"<?php echo base_url('Home/fetch_price'); ?>",
        method: "POST",
        data: {condition:condition,sub:sub,variation:variation,id:id},
        success: function(data){
        	var obj = JSON.parse(data);
        	if(condition=='pristine')
        	{
         $("#price").html(obj.pristine);
         $("#prc").val(obj.pristine);  
        }
        else if(condition=='vgood')
        {
 $("#price").html(obj.vgood);
 $("#prc").val(obj.vgood);
        }
        else if(condition=='good')
        {
 $("#price").html(obj.good);
 $("#prc").val(obj.good);
        }
    }

    });
});
});
</script>
<script>
$(document).ready(function(){
$('#cnd').change(function(){
    var condition= $(this).val();
    var year= $('#year').val();
    var prs= $('#prs').val();
    var ram= $('#ram').val();
    var variation= $('#model').val();
    var id= $('#id').val();
    console.log(condition+year+variation+id);
    $.ajax({
        url:"<?php echo base_url('Home/fetch_laptop_price'); ?>",
        method: "POST",
        data: {condition:condition,year:year,variation:variation,id:id,prs:prs,ram:ram,},
        success: function(data){
        	var obj = JSON.parse(data);
        	if(condition=='pristine')
        	{
         $("#price").html(obj.pristine);
         $("#prc").val(obj.pristine);  
        }
        else if(condition=='vgood')
        {
 $("#price").html(obj.vgood);
 $("#prc").val(obj.vgood);
        }
        else if(condition=='good')
        {
 $("#price").html(obj.good);
 $("#prc").val(obj.good);
        }
    }

    });
});
});
</script>
<script>
$(document).ready(function(){
$('#model').change(function(){
    var variation= $(this).val();
    var id= $('#id').val();
    console.log(variation+id);
     $.ajax({
        type: "POST",
        url: "<?php echo base_url('Home/fetch_model'); ?>",
        dataType:'json',
        data:{variation:variation, id:id},
        success: function(response){  
       console.log(response);
       $.each(response,function(i){
        // Remove options 
          $('#year').find('option').not(':first').remove();
          var i;
           for(i=0; i<response.length; i++){
             $('#year').append('<option value="'+response[i]['year']+'">'+response[i]['year']+'</option>');
         }
          });
        }
    });
});
});
</script>
<script>
$(document).ready(function(){
$('#year').change(function(){
    var year= $(this).val();
    var id= $('#id').val();
    var variation= $('#model').val();
     $.ajax({
        type: "POST",
        url: "<?php echo base_url('Home/fetch_processor'); ?>",
        dataType:'json',
        data:{variation:variation, id:id, year:year},
        success: function(response){  
       console.log(variation);
       $.each(response,function(i){
        // Remove options 
          $('#prs').find('option').not(':first').remove();
          var i;
           for(i=0; i<response.length; i++){
             $('#prs').append('<option value="'+response[i]['processor']+'">'+response[i]['processor']+'</option>');
         }
          });
        }
    });
});
});
</script>
<script>
$(document).ready(function(){
$('#prs').change(function(){
    var prs= $(this).val();
    var id= $('#id').val();
    var variation= $('#model').val();
    var year= $('#year').val();
     $.ajax({
        type: "POST",
        url: "<?php echo base_url('Home/fetch_ram'); ?>",
        dataType:'json',
        data:{variation:variation, id:id, year:year, prs:prs},
        success: function(response){  
       console.log(variation);
       $.each(response,function(i){
        // Remove options 
          $('#ram').find('option').not(':first').remove();
          var i;
           for(i=0; i<response.length; i++){
             $('#ram').append('<option value="'+response[i]['ram']+'">'+response[i]['ram']+'</option>');
         }
          });
        }
    });
});
});
</script>
<script>
$('#1').show();
$('#2').hide();
$('#3').hide();
$('#4').hide();
$('#5').hide();
$('#6').hide();
 $('#model').on('change', function(){
    if($('#model').val()!='')
    {
$('#2').show();
$('#3').hide();
$('#4').hide();
$('#5').hide();
$('#6').hide();
        
    }
    else{
$('#2').hide();
$('#3').hide();
$('#4').hide();
$('#5').hide();
$('#6').hide();
       }
    });
  $('#year').on('change', function(){
    if($('#year').val()!='')
    {
$('#2').show();
$('#3').show();
$('#4').hide();
$('#5').hide();
$('#6').hide();
        
    }
    else{
$('#2').show();
$('#3').hide();
$('#4').hide();
$('#5').hide();
$('#6').hide();
       }
    });
  
             $('#prs').on('change', function(){
    if($('#prs').val()!='')
    {
$('#2').show();
$('#3').show();
$('#4').show();
$('#5').hide();
$('#6').hide();
        
    }
    else{
$('#2').show();
$('#3').show();
$('#4').hide();
$('#5').hide();
$('#6').hide();
       }
        });
        $('#ram').on('change', function(){
    if($('#ram').val()!='')
    {
         $('#2').show();
$('#3').show();
$('#4').show();
$('#5').show();
$('#6').hide();
        
    }
    else{
$('#2').show();
$('#3').show();
$('#4').show();
$('#5').hide();
$('#6').hide();
       }
    });
         $('#cnd').on('change', function(){
    if($('#cnd').val()!='')
    {
$('#2').show();
$('#3').show();
$('#4').show();
$('#5').show();
$('#6').show();
        
    }
    else{
$('#2').show();
$('#3').show();
$('#4').show();
$('#5').show();
$('#6').hide();
       }
    });
           
	</script>
	<script>
	$('#one').show();
$('#two').hide();
$('#three').hide();
$('#four').hide();
 $('#variation').on('change', function(){
    if($('#variation').val()!='')
    {
        $('#two').show();
        $('#three').hide();
        $('#four').hide();
        $('#five').hide();
        
    }
    else{
$('#two').hide();
$('#three').hide();
        $('#four').hide();
        $('#five').hide();
       }
    });
            $('#sub').on('change', function(){
    if($('#sub').val()!='')
    {
         $('#two').show();
        $('#three').show();
        $('#four').hide();
        $('#five').hide();
        
    }
    else{
$('#two').show();
        $('#three').hide();
        $('#four').hide();
        $('#five').hide();
       }
    });
             $('#condition').on('change', function(){
    if($('#condition').val()!='')
    {
         $('#two').show();
        $('#three').show();
        $('#four').show();
        $('#five').hide();
        
    }
    else{
$('#two').show();
        $('#three').show();
        $('#four').hide();
$('#five').hide();
       }
    });
	</script>
  