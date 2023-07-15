<?php 
include('Db.php'); 
$date3=str_replace('/','-',$_POST['date3']);
$d=date_create($date3);
$date5=date_format($d,"Y-m-d");
$date6=str_replace('/','-',$_POST['date5']);
$t=date_create($date6);
$date8=date_format($t,"Y-m-d");
$sql = "select id,CONCAT(first_name, ' ',last_name) AS name,email,phone,device_name,device_price,Date_TIme,status,code from sellmyphones s left join pdflabel pdf on s.label= pdf.label where date(Date_TIme) BETWEEN '$date5' AND '$date8'";  
$setRec = mysqli_query($con, $sql);  
$columnHeader = ""  ;  
$columnHeader = "id" . "\t". "name." . "\t". "email" . "\t". "phone"  . "\t" . "product_name" . "\t" . "Total" . "\t". "Date_Time" ."\t". "Status" . "\t".  "Code" . "\t"; 
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