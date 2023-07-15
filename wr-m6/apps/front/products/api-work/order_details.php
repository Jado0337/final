<?php

require_once('vendor/autoload.php');

// Configure API key authorization: Bearer
$config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'e37ca209-f015-4a8c-948e-92cc194e43af');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
 $config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');
// Configure API key authorization: Bearer


$apiInstance = new RoyalMail\ClickAndDrop\Rest\Api\OrdersApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$orderIdentifiers = "1491"; // string | Order Identifier or several Order Identifiers separated by semicolon

try {
    $result = $apiInstance->getOrdersWithDetailsAsync($orderIdentifiers);
   
    foreach($result as $res){
        $trackingNumber =  $res['shippingDetails']['trackingNumber'];
        
    }
} catch (Exception $e) {
    echo 'Exception when calling OrdersApi->getOrdersWithDetailsAsync: ', $e->getMessage(), PHP_EOL;
}
?>