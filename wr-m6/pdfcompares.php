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
         $sql = "select * from comparerecycle where ordid='$pid' ";
     }
     else{  
        $sql = "select * from comparerecycle where manufacturer_name='$id' ";
     }
 $recordyrs = mysqli_query($con,$sql);
									 $row=mysqli_fetch_array($recordyrs);
             
										$sql2 = "select * from wr_user where id='".$row['user_id']."' ";
									$recordyrst = mysqli_query($con,$sql2);
									 $row2=mysqli_fetch_array($recordyrst);
									 
								
            	$data='<tr>
            	
            	<td>
											<strong>Order Id: </strong> '.$row['ordid'].'</br>
										<strong>Total Price: </strong>'.$row['quoted_price'].' </br>
										<strong>Revised Price: </strong>'.$row['revs'].' </br>
										
												
										</td>
                                       
									
										  	<td>
											<strong>User Name: </strong>'. $row['first_name'].' '.$row['last_name'].' <br />
										
											<strong>Phone: </strong>'. $row['numbers'].' <br />
											<strong>Email: </strong>'. $row['email'].' <br />
										
										</td>

										  
									
										  	<td>'. $row['status'].' </td>
										   
                                          <td>
											<a href="mngorder.php?index=view&id='. $row['ordid'].' ">View Order</a>
										</td>
                                       </tr>
                                   
                                    
                                   ';
                                    
echo $data;
?>