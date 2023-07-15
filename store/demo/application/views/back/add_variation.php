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
                    <form method="post" action="insert_variation">
                    <div class="col-md-10 col-sm-10 col-xs-12" id="allprodctdiv">
                        
                   <div class="row" style="background: #e3e3e3; padding: 20px 0px; margin-bottom: 10px;">
                                            <div class="col-md-3">
                                                <strong>Model (Screen Size)</strong>
                                                <br />
                                                <input type="text" name="model[0]" placeholder="Model" value="" class="form-control" />
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <strong>Year</strong>
                                                <br />
                                                <input type="text" name="year[0]" placeholder="Year" value="" class="form-control" />
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Processor</strong>
                                                <br />
                                                <input type="text" name="processor[0]" placeholder="Processor" value="" class="form-control" />
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Ram</strong>
                                                <br />
                                                <input type="text" name="ram[0]" placeholder="Ram" value="" class="form-control" />
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <strong>Good Price</strong>
                                                <br />
                                                <input type="text" name="good[0]" placeholder="Good Price" value="" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Very Good  Price</strong>
                                                <br />
                                                <input type="text" name="vgood[0]" placeholder="Very Good Price" value="" class="form-control" />
                                            </div>
                                            <div class="col-md-4">
                                                <strong>Pristine Price</strong>
                                                <br />
                                                <input type="text" name="prist[0]" placeholder="Prestine Price" value="" class="form-control" />
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                    <div class="col-md-12">
                                        <button name="AddNewButton" id="addMoreProdct" type="button" class="btn btn-primary">Add More</button>
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                 </div>
                             
                             </div>
                             </form>
                                 
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Form Elements -->
            <script type="text/javascript">
        jQuery(document).ready(function () {
            var one = 0;
                var two = 0;
                var three = 0;
                var four = 0;
                var five = 0;
                var six = 0;
                var eight = 0;
            $('#addMoreProdct').click(function(){
                var seconds = new Date().getTime() / 1000; 
                 var code    =   $('#allprodctdiv').html();
                $('#allprodctdiv').append('<div class="row" style="background: #e3e3e3; padding: 20px 0px; margin-bottom: 10px;">'+
                                            '<div class="col-md-3">'+
                                                '<strong>Model</strong>'+
                                                '<br />'+
                                                '<input type="text" name="model['+(++one)+']" placeholder="Processor" value="" class="form-control" />'+
                                            '</div>'+
                                            '<div class="col-md-3">'+
                                                '<strong>Year</strong>'+
                                                '<br />'+
                                                '<input type="text" name="year['+(++two)+']" placeholder="Year" value="" class="form-control" />'+
                                            '</div>'+
                                            '<div class="col-md-3">'+
                                                '<strong>Processor</strong>'+
                                                '<br />'+
                                                '<input type="text" name="processor['+(++three)+']" placeholder="Processor" value="" class="form-control" />'+
                                            '</div>'+
                                            '<div class="col-md-3">'+
                                                '<strong>Ram</strong>'+
                                                '<br />'+
                                                '<input type="text" name="ram['+(++four)+']" placeholder="Ram" value="" class="form-control" />'+
                                            '</div>'+
                                            
                                            '<div class="col-md-4">'+
                                                '<strong>Good Price</strong>'+
                                                '<br />'+
                                                '<input type="text" name="good['+(++five)+']" placeholder="Good Price" value="" class="form-control" />'+
                                            '</div>'+
                                            '<div class="col-md-4">'+
                                                '<strong>Worn Price</strong>'+
                                                '<br />'+
                                                '<input type="text" name="vgood['+(++six)+']" placeholder="Very Good Price" value="" class="form-control" />'+
                                            '</div>'+
                                            '<div class="col-md-4">'+
                                                '<strong>Faulty Price</strong>'+
                                                '<br />'+
                                                '<input type="text" name="prist['+(++eight)+']" placeholder="Prestine Price" value="" class="form-control" />'+
                                            '</div>'+
                                        '</div>');
               
              });
             $('#removemoreprodct').on('click', function () {
                    $("#allprodctdiv").children().last().remove();
                    
                });
        });
    </script>

        </div>
    </div>
</div>

<!-- end page-wrapper -->


