 <?php
 include('header.php');
 ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customers List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
              <div class="card">
              <div class="card-header">
                <?php echo $this->session->flashdata('flsh_msg'); ?>
               
                    <?php $msg = $this->session->userdata('error_image');
                        echo $msg;
                        $this->session->unset_userdata('error_image');
                     ?>                       
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php


                if($this->session->user_role=='admin')
                {
                  ?>
                
                <table  id="example1" class="table table-bordered table-striped">
                  <?php 
                }
                else
                {
                  ?>
                <table  id="example2" class="table table-bordered table-striped"> 
                <?php  
                }
                 ?>
                  <thead>
                  <tr>
                     <th>ID</th> 
                   <th>Name</th>
                    <th>Company</th>
                    
                     <th>Buyer_Seller</th>
                   <th>Email</th>
                   <th>(Vendor) Priority</th>
                     <th>Created_at</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     foreach($pro as $prd)
                     {
                                ?>
                  <tr>
                    <td><?php echo $prd->cid; ?></td>
                    <td><?php echo $prd->Firstname.' '. $prd->Lastname ?></td>
                    <td><?php echo $prd->Company; ?></td>
                    <td><?php echo $prd->Buyer_Seller; ?></td>
                    <td><?php echo $prd->Email; ?></td>
                     <td><?php echo $prd->Priority; ?></td>
                       <td><?php echo $prd->Created_at; ?></td>
                    <td><a class="btn btn-info" href="<?php echo base_url()?>edit-customer/<?php echo $prd->cid;?>">Edit</a>
                        <a class="btn btn-danger" href="<?php echo base_url()?>delete-customer/<?php echo $prd->cid;?>">Delete</a>
                        <a class="btn btn-info bg-purple" href="<?php echo base_url()?>view-customer/<?php echo $prd->cid;?>">View</a>
                        
                  </tr>
                  <?php
                }
                  ?>
                  </tbody>
                 
                </table>

<script>
$(document).ready(function(){
 
 $('.delete_checkbox').click(function(){
  if($(this).is(':checked'))
  {
   $(this).closest('tr').addClass('removeRow');
  }
  else
  {
   $(this).closest('tr').removeClass('removeRow');
  }
 });

 $('#delete_all').click(function(){
  var checkbox = $('.delete_checkbox:checked');
  if(checkbox.length > 0)
  {
   var checkbox_value = [];
   $(checkbox).each(function(){
    checkbox_value.push($(this).val());
   });
   $.ajax({
    url:"<?php echo base_url(); ?>Admin/delete_all",
    method:"POST",
    data:{checkbox_value:checkbox_value},
    success:function()
    {
     $('.removeRow').fadeOut(1500);
    }
   })
  }
  else
  {
   alert('Select atleast one records');
  }
 });

});
</script>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
 include('footer.php');
 ?>