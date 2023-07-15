<?php
include('header.php');
?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customers Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customers Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Customers Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url();?>addpro" enctype="multipart/form-data">
                <?php echo $this->session->flashdata('flsh_msg'); ?>
               
                    <?php $msg = $this->session->userdata('error_image');
                        echo $msg;
                        $this->session->unset_userdata('error_image');
                     ?>                       
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">LAST contact date </label>
                    <input type="date" class="form-control" name="a1" placeholder="Enter LAST contact date">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">NEXT contact date</label>
                    <input type="date" class="form-control" name="a2" placeholder="Enter NEXT contact date">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Birthday</label>
                    <input type="date" class="form-control" name="a3" placeholder="Birthday">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Facebook friend?</label>
                    <input type="text" class="form-control" name="a4" placeholder="Facebook friend?">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Linkedin Connection</label>
                    <input type="text" class="form-control" name="a5" placeholder="Enter Linkedin Connection">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Source</label>
                    <input type="text" class="form-control" name="a6" placeholder="Enter Source">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Buyer / Seller</label>
                    <select class="form-control" name="a7" placeholder="Enter Name">
                      <option value="">Please Select Status</option>
                      <option value="Buyer">Buyer</option>
                      <option value="Seller">Seller</option>
                    </select>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">First name</label>
                    <input type="text" class="form-control" name="a8" placeholder="Enter Name">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Last name</label>
                    <input type="text" class="form-control" name="a9" placeholder="Enter Last name">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Company</label>
                    <input type="text" class="form-control" name="a10" placeholder="Enter Company">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label>
                    <input type="text" class="form-control" name="a11" placeholder="Enter Phone">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Mobile</label>
                    <input type="text" class="form-control" name="a18" placeholder="Enter Mobile" >
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" name="a12" placeholder="Enter E-mail">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">(Vendor) Priority</label>
                    <input type="text" class="form-control" name="a13" placeholder="Enter Priority">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" name="a14" placeholder="Enter Area of interest">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">(Customer) Interest</label>
                    <input type="text" class="form-control" name="a15" placeholder="Enter Interest">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Comments</label>
                    <input type="text" class="form-control" name="a16" placeholder="Enter Comments">
                  </div>
                  
                 
                   
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           </div>
         </div>
       
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
     <script>
        $(document).ready(function(){
$('#cat').change(function(){
    var cat= $(this).val();
     $.ajax({
        type: "POST",
        url: "<?php echo base_url('Admin/fetch_sub'); ?>",
        dataType:'json',
        data:{cat:cat},
        success: function(response){  
       console.log(response);
       $.each(response,function(i){
        // Remove options 
          $('#sub').find('option').not(':first').remove();
          var i;
           for(i=0; i<response.length; i++){
             $('#sub').append('<option value="'+response[i]['sid']+'">'+response[i]['sname']+'</option>');
         }
          });
        }
    });
});
});
    </script>
    <script>
        $(document).on("change keyup blur", "#dis", function() {
            var main = $('#prc').val();
            var disc = $('#dis').val();
            var dec = (disc / 100).toFixed(2); //its convert 10 into 0.10
            var mult = main * dec; // gives the value for subtract from main value
            var discont = main - mult;
            $('#net').val(discont);
        });
    </script>
  <!-- /.content-wrapper -->
  <?php
  include("footer.php");
  ?>