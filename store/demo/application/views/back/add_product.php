<script type="text/javascript" src="<?php echo base_url();?>/assets/back/ckeditor/ckeditor.js"></script>
    <!--  page-wrapper -->
    <div id="page-wrapper">
        <div class="row">
           <!-- page header -->
           <div class="col-lg-12">
            <h1 class="page-header">Forms Element</h1>
        </div>
        <!--end page header -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
              <?php echo $this->session->flashdata('flsh_msg'); ?>
               <h4 class="error">
                    <?php $msg = $this->session->userdata('error_image');
                        echo $msg;
                        $this->session->unset_userdata('error_image');
                     ?>                       
                </h4>
                <div class="panel-heading">
                    Add new Product
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                           <h5 style='color:red'> <?php echo validation_errors();?></h5>
                            <form method="POST" action="add" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Add Product Title</label>
                                    <input type="text" class="form-control"  name="pro_title" required>
                                </div>
                                 <div class="form-group">
                                    <label>Add Product Description</label>
                                    <textarea  id="ck" class="form-control" rows="3" name="pro_desc"></textarea>
                                    <script>CKEDITOR.replace('ck')</script>
                                </div>
                                  <div class="form-group">
                                    <label>Select Category</label>
                                    <select class="form-control" name="pro_cat" id="pro_cat" required>
                                        <option>Select One</option>
                                        <?php
                                         foreach ($all_cat as $category) {  ?>
                                        <option value="<?php echo $category->category_id;?>"><?php echo $category->category_name?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                               <div class="form-group">
                                    <label>Select Brand</label>
                                    <select class="form-control" name="sub_cat" id="sub" required>
                                        <option value="">Please Select Brand</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Type</label>
                                    <select class="form-control" name="ptype" >
                                        <option value="">Please Select Type</option>
                                        <option value="Featured">Featured</option>
                                        <option value="General">General</option>
                                        <option value="Popular">Popular</option>
                                    </select>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label>Add Product Quantity</label>
                                    <input type="number" class="form-control" value="" name="pro_quantity" required>
                                </div>
                                <div class="form-group">
                                    <label>Add Colour</label>
                                    <input type="text" class="form-control"  name="colour" required>
                                </div>
                               <div class="form-group">
                                    <label>Product Availability</label>
                                    <select class="form-control" name="pro_availability" required>
                                        <option>Select One</option>
                                        <option value="1">In Stock</option>
                                        <option value="2">Out Of Stock</option>
                                        <option value="3">Up Comming</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="">Please Select Status</option>
                                        <option value="1">Hide</option>
                                        <option value="2">Show</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upload Product Image</label>
                                    <input type="file" name="pro_image" required>
                                </div>
                                <div class="form-group">
                                    <label>Upload Product Image</label>
                                    <input type="file" name="pro_imageone" required>
                                </div>
                                <div class="form-group">
                                    <label>Upload Product Image</label>
                                    <input type="file" name="pro_imagetwo" required>
                                </div>
                                 <div class="form-group">
                                    <label>Top Product</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="top_product" value="1" required>Select top product
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <script>
        $(document).ready(function(){
$('#pro_cat').change(function(){
    var pro_cat= $(this).val();
     $.ajax({
        type: "POST",
        url: "<?php echo base_url('Product/fetch_sub'); ?>",
        dataType:'json',
        data:{pro_cat:pro_cat},
        success: function(response){  
       console.log(response);
       $.each(response,function(i){
        // Remove options 
          $('#sub').find('option').not(':first').remove();
          var i;
           for(i=0; i<response.length; i++){
             $('#sub').append('<option value="'+response[i]['sub_cat_id']+'">'+response[i]['sub_category_name']+'</option>');
         }
          });
        }
    });
});
});
    </script>
            <!-- End Form Elements -->
        </div>
    </div>
</div>
<!-- end page-wrapper -->


