<?php
include('Db.php');
$pid=$_POST['pid'];
$vid=$_POST['one'];
$sqlyr = "select distinct(released_year) from wr_product_price where product_id='".$pid."' AND variant='".$vid."'  ORDER BY released_year ASC ";
            $recordyr = mysqli_query($con,$sqlyr);
            ?>
<option value="" >Please Select</option>
                <?php
            while($year=mysqli_fetch_array($recordyr))
            {
            	?>
            	
            	<option  value='<?php echo $year['released_year']; ?>'><?php echo $year['released_year']; ?></option>

            	<?php
            }
            ?>