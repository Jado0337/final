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
         $sql = "select * from sellmyphones where id='$pid' ";
     }
     else{  
        $sql = "select * from sellmyphones where label='$id' ";
     }  
         $recordyrs = mysqli_query($con,$sql);
									 $row=mysqli_fetch_array($recordyrs);
             
				$data='<tr>
            	
            	<td>
											<strong>Order Id: </strong> '.$row['id'].'</br>
										<strong>Total Price: </strong>'.$row['device_price'].' </br>
										<strong>Revised Price: </strong>'.$row['revs'].' </br>
										
												
										</td>
                                       
									
										  	<td>
											<strong>User Name: </strong>'. $row['first_name'].' '.$row['last_name'].' <br />
										
											<strong>Phone: </strong>'. $row['phone'].' <br />
											<strong>Email: </strong>'. $row['email'].' <br />
										
										</td>

										  
									
										  	<td>'. $row['status'].' </td>
										   
                                          <td>
											<a href="mngselorder.php?index=view&id='. $row['id'].' ">View Order</a>
										</td>
                                       </tr>
                                   
                                    
                                   ';
                                    
echo $data;
?>