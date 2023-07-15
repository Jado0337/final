<?php
include('Db.php');
$pid=$_POST['pid'];
$vid=$_POST['one'];
$year=$_POST['year'];
 $sqlyr = "select distinct(processor) from wr_product_price where product_id='".$pid."' AND variant='".$vid."' AND released_year='".$year."' ORDER BY processor ASC";
            $recordyr = mysqli_query($con,$sqlyr);
            ?>
<option value="" >Please Select</option>
                <?php
            while($year=mysqli_fetch_array($recordyr))
            {
            	?>
            	
            	<option  value='<?php echo $year['processor']; ?>'><?php echo $year['processor']; ?></option>

            	<?php
            }
            ?>
           
            
