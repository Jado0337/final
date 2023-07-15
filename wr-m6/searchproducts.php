<?php
include('Db.php');
$pid=$_POST['track'];

        $sql = "select * from wr_product where productname like '%$pid%'  AND status='Show' ";
    
 $recordyrs = mysqli_query($con,$sql);
 while($row=mysqli_fetch_array($recordyrs))
            {
									 
             
	
										  	if($row['category']==3){
											
											$href='<a href="manageproduct.php?index=editLaptop&id='.$row["id"].'">Edit</a>'; 
											}
											else{
											    $href='<a href="manageproduct.php?index=edit&id='.$row["id"].'">Edit</a>'; 
										  	} 
										  								
								
            	$data='<tr>
            	
            	
                                       
									
										  	<td>
											<img src="uploads/'.$row['pro_img'].'" style="width:100px;" />
										
										</td>

										 <td>
											<strong>productname: </strong> '.$row['productname'].'</br>
										
												
										</td> 
									
										  
										   
                                          <td>
											'.$href.'
										</td>
                                       </tr>
                                   
                                    
                                   ';
            
                                    
echo $data;
}
            ?>
 