<?php
include('Db.php');
$pid=$_POST['pid'];
$vid=$_POST['one'];
$year=$_POST['tw'];
$prc=$_POST['prc'];
 $sqlyr = "select distinct(ram) from wr_product_price where product_id='".$pid."' AND variant='".$vid."' AND released_year='".$year."' AND processor='".$prc."' ORDER BY ram ASC";
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