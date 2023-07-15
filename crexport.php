<?php

include('Db.php');
$select = "SELECT *,p.id as pid FROM wr_product p Left Join wr_product_price r on p.id=r.product_id left join wr_model m on r.variant=m.id left join wr_brands b on p.brand=b.id where p.category=1 AND p.status='Show'";
$recordyr = mysqli_query($con,$select);

if($recordyr->num_rows > 0){
    $separator = ",";
    $filename = "CR.csv";
    // Set header content-type to CSV and filename
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    //set CSV column headers
    $fields = array('link','price', 'product_id', 'product', 'network', 'condition');
    fputcsv($output, $fields, $separator);
    
    $i=2;
    
    while($row = $recordyr->fetch_object()){ 
        for($j=0;$j<$i;$j++){
            if($j==1){
                $cond='Working';
            }
            else{
                $cond='New';
            }
         $lineData = array('product-view?name='.str_replace(' ','-',$row->productname).'&pid='.$row->pid.'&vid='.$row->variant, $row->price,$row->pid, $row->productname.' '.$row->model,'Unlocked',$cond);
       
	fputcsv($output, $lineData, $separator);
        }
    }
	
    fclose($output);
    exit();
}
?>