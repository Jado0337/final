<?php
include('Db.php');
$pid=$_POST['track'];
$sqlyr = "select * from pdflabel where pdf like '%$pid%' OR code LIKE '%$pid%'";
            $recordyr = mysqli_query($con,$sqlyr);
             while($year=mysqli_fetch_array($recordyr))
             {
                 $id=$year['label'];
             }
           
     if(empty($id)){
         $sql = "select * from view_order where ord_id='$pid' ";
     }
     else{
        $sql = "select * from view_order where label='$id' ";
     }
 $recordyrs = mysqli_query($con,$sql);
									 $row=mysqli_fetch_array($recordyrs);
             if($row['ord_id'] > 500000 && $row['ord_id'] < 900000){
             $href='<a href="mngorder.php?index=view&id='. $row['ord_id'].' ">View Order</a>';    
             }
             else if($row['ord_id'] > 900000 ){
             $href='<a href="mngselorder.php?index=view&id='. $row['ord_id'].' ">View Order</a>';    
             }
             else{
             $href='<a href="manageorders.php?index=view&id='. $row['ord_id'].' ">View Order</a>';    
             }
             
									
									 
								
            	$data='<tr>
            	
            	<td>
											<strong>Order Id: </strong> '.$row['ord_id'].'</br>
										<strong>Total Price: </strong>'.$row['amount'].' </br>
											
												
										</td>
                                       
									
										  	<td>
											<strong>User Name: </strong>'. $row['name'].'<br />
										
												</td>

										  
									
										  	<td>'. $row['products'].' </br>
										  	IMEI : '.$row['ime'].'</td>
										  	<td>'. $row['time'].' </td>
										   
                                          <td>
										'.$href.'
										</td>
										<td>
									<a class="btn btn-primary btn-lg" onclick="paid('. $row['ord_id'].')">Paid</a>
										</td>
                                       </tr>
                                   
                                    
                                   ';
                                    
echo $data;
?>