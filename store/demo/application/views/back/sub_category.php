<?php
include('Db.php');
$pro_cat=$_POST['pro_cat'];
$sqlyr="SELECT * FROM tbl_sub_category WHERE category_sub_id='".$pro_cat."' ";
            $recordyr = mysqli_query($con,$sqlyr);
            ?>
<option value="" >Please Select</option>
                <?php
            while($year=mysqli_fetch_array($recordyr))
            {
            	?>
            	
            	<option  value='<?php echo $year['sub_cat_id']; ?>'><?php echo $year['sub_category_name']; ?></option>

            	<?php
            }
            ?>