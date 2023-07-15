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
         $sql = "select * from wr_order where id='$pid' ";
     }
     else{
        $sql = "select * from wr_order where label='$id' ";
     }
 $recordyrs = mysqli_query($con,$sql);
									 $row=mysqli_fetch_array($recordyrs);
             
										$sql2 = "select * from wr_user where id='".$row['user_id']."' ";
									$recordyrst = mysqli_query($con,$sql2);
									 $row2=mysqli_fetch_array($recordyrst);
								
            	$data='<tr>
            	
            	<td>
											<strong>Order Id: </strong> '.$row['id'].'</br>
										<strong>Total Price: </strong>'.$row['total'].' </br>
										<strong>Revised Price: </strong>'.$row['revs'].' </br>
												
										</td>
                                       
									
										  	<td>
											<strong>User Name: </strong>'. $row2['fname'].' '.$row2['lname'].' <br />
										
											<strong>Phone: </strong>'. $row2['phone'].' <br />
											<strong>Email: </strong>'. $row2['email'].' <br />
										
										</td>

										  
									
										  	<td>'. $row['order_status'].' </td>
										   
                                          <td>
											<a href="manageorders.php?index=view&id='. $row['id'].' ">View Order</a>
										</td>
                                       </tr>
                                   
                                    
                                   ';
                                    
echo $data;
            ?>
 