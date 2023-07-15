<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

$config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKey('Authorization', 'e37ca209-f015-4a8c-948e-92cc194e43af');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = RoyalMail\ClickAndDrop\Rest\Api\Configuration::getDefaultConfiguration()->setApiKeyPrefix('Authorization', 'Bearer');
$apiInstance = new RoyalMail\ClickAndDrop\Rest\Api\OrdersApi(
// If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
// This is optional, `GuzzleHttp\Client` will be used as default.
new GuzzleHttp\Client(),
$config
);
$name= "d".' '. "d";
$data = array(
'items' => [[
"orderReference" => 'I phone 12',
'recipient' => [
'address' => [
"fullName" => "sabir saleem",
"companyName" => '-',
"addressLine1" => "170 Slade Road",
"addressLine2" => "-",
"addressLine3" => "-",
"city" => "Birmingham",
"county" => "West Midlands",
"postcode" => "B23 7PX",
"countryCode" => "UK"
],
"emailAddress" => "sabirsaleem70@gmail.com"
],
'sender' => [
"tradingName" => "abc",
],
"billing" => [
"address" => [
"fullName" => "sabir saleem",
"companyName" => "sender address",
"addressLine1" => "170 Slade Road",
"addressLine2" => "-",
"addressLine3" => "-",
"city" => "Birmingham",
"county" => "West Midlands",
"postcode" => "B23 7PX",
"countryCode" => "UK"
],
"phoneNumber" => "000000000000",
"emailAddress" => "sabirsaleem90@yahoo.com"
],
"packages" => [[
"weightInGrams" => 2,
"packageFormatIdentifier" => "parcel"
]],
"orderDate" => "2011-01-01 01:01:01",
"subtotal" => "1400",
"shippingCostCharged" => 0,
"total" => "1400",
"postageDetails" => [
"sendNotificationsTo" => "recipient",
"serviceCode" => "CRL48",




],
"label" => [
"includeLabelInResponse" =>"True",
"includeCN" => "True",
"includeReturnsLabel" => "True",
],


]]
);

$payload = json_encode($data);
$request = new \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest($data); // \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest |
$result = $apiInstance->createOrdersAsync($request);
$json = json_decode($result, true);
$label = $json['createdOrders'][0]['label']."<br/>";
$json = json_decode($result, true);
//print_r($json);
$trackingNumber = $json['createdOrders'][0]['trackingNumber'];
echo $orderIdentifier = $json['createdOrders'][0]['orderIdentifier'];
