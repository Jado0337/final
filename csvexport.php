<?php

include('Db.php');
$select = "SELECT *,p.id as pid FROM wr_product p Left Join wr_product_price r on p.id=r.product_id left join wr_model m on r.variant=m.id left join wr_brands b on p.brand=b.id where p.category=1 AND p.status='Show'";
$recordyr = mysqli_query($con,$select);

if($recordyr->num_rows > 0){
    $separator = ",";
    $filename = "sellmyphone.csv";
    // Set header content-type to CSV and filename
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    // create a file pointer connected to the output stream
    $output = fopen('php://output', 'w');

    //set CSV column headers
    $fields = array('ID', 'Make', 'Model', 'Image Url', 'New Price','Faulty Price','Working Unlocked Price','Working EE Price','Working O2 Price','Working Vodafone Price','Working Orange Price','Working T-Mobile Price','Working Three Price','Working Tesco Price','Working Other Network Price');
    fputcsv($output, $fields, $separator);
    
    
    while($row = $recordyr->fetch_object()){ 
         $lineData = array($row->pid, $row->brand_name, $row->productname.' '.$row->model, 'wr-m6/uploads/'.$row->pro_img, $row->price, $row->faulty_price,$row->price,0,0,0,0,0,0,0,0);
	fputcsv($output, $lineData, $separator);
    }
	
    fclose($output);
    exit();
}
?>