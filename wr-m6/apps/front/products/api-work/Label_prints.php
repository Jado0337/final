<?php
require_once('vendor/autoload.php');
putenv('TMPDIR=temp');
// Configure API key authorization: Bearer
$config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'e37ca209-f015-4a8c-948e-92cc194e43af');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');
$apiInstance = new RoyalMail\ClickAndDrop\Rest\Api\LabelsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$orderIdentifiers = 1710; // string | Order Identifier or several Order Identifiers separated by semicolon
$documentType = "postageLabel"; // string | Document generation mode. When documentType is set to \"postageLabel\" the additional parameters below must be used. These additional parameters will be ignored when documentType is not set to \"postageLabel\"
$includeReturnsLabel = "True"; // bool | Include returns label. Required when documentType is set to 'postageLabel'
$includeCN = "True"; // bool | Include CN22/CN23 with label. Optional parameter. If this parameter is used the setting will override the default account behaviour specified in the \"Label format\" setting \"Generate customs declarations with orders\"
//print_r($includeReturnsLabel);

try {
    $result = $apiInstance->getOrdersLabelAsync($orderIdentifiers, $documentType, $includeReturnsLabel,$includeCN);
    //echo strval( $result );
    $c=explode(' ',$result->getFilename());
    $filez=$c[0].'.pdf';
   
    rename("temp/$c[0]", "temp/$filez");
     $files="temp/".$filez;
    chmod($files, 0644);
    echo $files;
} catch (Exception $e) {
    echo 'Exception when calling LabelsApi->getOrdersLabelAsync: ', $e->getMessage(), PHP_EOL;
}


?>
