<?php
require_once('vendor/autoload.php');


// Configure API key authorization: Bearer
$config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'e37ca209-f015-4a8c-948e-92cc194e43af');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');

$apiInstance = new RoyalMail\ClickAndDrop\Rest\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);

$orderIdentifiers = "1474;1475;1476;1477;1478;1479;1480;1481;1482;1483;1484;1485;1486;1487;1488;1489;1490;1491;1492;1493;1494;1495;1496;1497;1498;1499;1500"; // string | Order Identifier or several Order Identifiers separated by semicolon



?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<div class="container table-responsive py-5"> 
<table class="table table-bordered table-hover">
<thead class="thead-dark">
     
        
<tr>
<th scope="col">#</th>
<th scope="col">orderIdentifier</th>
<th scope="col">orderReference</th>

</tr>


</thead>
<tbody>

    <?php
    
    try {
    $result = $apiInstance->getOrdersAsync($orderIdentifiers);
    $i=0;
   foreach($result as $res){
       $i++;
      $orderIdentifier =  $res['orderIdentifier']; 
      $orderReference = $res['orderReference'];
      $DateTime  = $res['DateTime '];
      $orderDate = $res['orderDate'];
      $trackingNumber = $res['trackingNumber'];
      $timezone_type = $res['timezone_type'];
      
      
     ?>
    

<tr>
<th scope="row"><?php echo $i ?></th>
<td><?php echo $orderIdentifier ?></td>
<td><?php echo $orderReference ?></td>

</tr>



     <?php 
       
   }
   
   
   
    //print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->getOrdersAsync: ', $e->getMessage(), PHP_EOL;
}

?>
    
 






</tbody>
</table>
</div>



