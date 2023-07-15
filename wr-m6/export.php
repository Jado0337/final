<?php 
include('Db.php'); 
$date3=str_replace('/','-',$_POST['date3']);
$d=date_create($date3);
$date5=date_format($d,"Y-m-d");
$date6=str_replace('/','-',$_POST['date5']);
$t=date_create($date6);
$date8=date_format($t,"Y-m-d");
$sql = "select o.id,CONCAT(u.fname, ' ', u.lname) AS name,u.email,u.phone,ord.product_name,ord.varient_name,ord.p_condition,o.g_total,o.order_status,o.update_time,pdf.code from wr_order o left join wr_order_detail ord on o.id= ord.order_id left join wr_user u on o.user_id= u.id left join pdflabel pdf on o.label= pdf.label where date(o.timestamp) BETWEEN '$date5' AND '$date8'";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = ""  ;  
$columnHeader = "id" . "\t". "name." . "\t". "email" . "\t". "phone" . "\t" . "product_name" . "\t" . "varient_name" . "\t". "condition" . "\t". "Total" . "\t". "Status" . "\t". "Date & Time" . "\t". "Code"; 
$setData = '';  
  while ($rec = mysqli_fetch_assoc($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=User_Detail.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n"; 
 ?>