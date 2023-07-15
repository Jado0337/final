<?php
include('Db.php');
$pid=$_POST['pid'];
$vid=$_POST['mactwo'];
$year=$_POST['year'];
 $sqlyr = "select distinct(ram) from wr_product_price where product_id='".$pid."'  AND released_year='".$vid."' AND processor='".$year."' Order by ram ASC";
            $recordyr = mysqli_query($con,$sqlyr);
            ?>
<option value="" >Please Select</option>
                <?php
            while($year=mysqli_fetch_array($recordyr))
            {
            	?>
            	
            	<option  value='<?php echo $year['ram']; ?>'><?php echo $year['ram']; ?></option>

            	<?php
            }
            ?>