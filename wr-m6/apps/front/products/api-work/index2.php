<?php
require_once('vendor/autoload.php');




$Servername = "localhost";
$username = "recycleproco_sohaib";
$password = "123@Screw@@";

try {
  $pdo = new PDO("mysql:host=$Servername;dbname=recyclepro_co_uk", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}


$stmt = $pdo->prepare("SELECT * FROM comparerecycle  ORDER BY id desc limit 1");
$stmt->execute(); 
$data = $stmt->fetchAll();
// and somewhere later:
foreach ($data as $row) {
    



$order_id =  $row['id'];
$first_name = $row['first_name'];
$last_name= $row['last_name'];
$fullname  = $first_name." ".$last_name;
$email = $row['email'];
$address_line_1 = $row['address_line_1'];
$address_line_2 = $row['address_line_2'];
$address_line_3 = $row['address_line_3'];
$product_name = $row['product_name'];
$address_postcode = $row['address_postcode'];
$address_country = $row['address_country'];
$numbers = $row['numbers'];
$Date_Time = $row['Date_Time'];
$price = $row['quoted_price'];



if($order_id==""){
$order_id2 = "-";
}
else {
$order_id2 =  $row['id'];
}


if($fullname==""){
$fullname2 = "-";
}
else {
$fullname2 =  $first_name." ".$last_name;
}


if($email==""){
$email2 = "-";
}
else {
$email2 =  $row['email'];
}


if($address_line_1==""){
$address_line_1_2 = "-";
}
else {
$address_line_1_2 =  $row['address_line_1'];
}


if($address_line_2==""){
$address_line_2_2 = "-";
}
else {
$address_line_2_2 =  $row['address_line_2'];
}


if($address_line_3==""){
$address_line_3_2 = "-";
}
else {
$address_line_3_2 =  $row['address_line_3'];
}


if($product_name==""){
$product_name2 = "-";
}
else {
$product_name2 =  $row['product_name'];
}


if($address_postcode==""){
$address_postcode2 = "-";
}
else {
$address_postcode2 =  $row['address_postcode'];
}


if($address_country==""){
$address_country2 = "United Kingdom";
}
else {
$address_country2 =  $row['address_country'];
}


if($numbers==""){
$numbers2 = "-";
}
else {
$numbers2 =  $row['numbers'];
}


if($Date_Time==""){
$Date_Time2 = "-";
}
else {
$Date_Time2 =  $row['Date_Time'];
}


if($price==""){
$price2 = "-";
}
else {
$price2 =  $row['quoted_price'];
}

$shop_address1 = "Recyclepro";
$shop_address2 = "170 Slade Road, Erdington, Birmingham, West Midlands,";
$shop_address3 = "B23 7PX";



//echo "$order_id <br/>";
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
$data = array(
'items' => [[
"orderReference" => $product_name2,
'recipient' => [
'address' => [
"fullName" => $fullname2,
"companyName" => '-',
"addressLine1" => $address_line_1_2,
"addressLine2" => $address_line_2_2,
"addressLine3" => $address_line_3_2,
"city" => "-",
"county" => $address_country2,
"postcode" => $address_postcode2,
"countryCode" => "UK"
],
"emailAddress" => "sabirsaleem70@gmail.com"
],
"billing" => [
"address" => [
"fullName" => $fullname2,
"companyName" => "",
"addressLine1" => $shop_address1,
"addressLine2" => $shop_address2,
"addressLine3" => $shop_address3,
"city" => "-",
"county" => $address_couentry2,
"postcode" => $address_postcode2,
"countryCode" => "UK"
],
"phoneNumber" => $numbers2,
"emailAddress" => $email2
],
"packages" => [[
"weightInGrams" => 2,
"packageFormatIdentifier" => "parcel"
]],
"orderDate" => $Date_Time2,
"subtotal" => $price2,
"shippingCostCharged" => 0,
"total" => $price2,
"postageDetails" => [
"sendNotificationsTo" => "recipient",
"serviceCode" => "SD1"
],
"label" => [
"includeLabelInResponse" => true,
"includeCN" => true,
"includeReturnsLabel" => true,
],


]]
);
$payload = json_encode($data);


$request = new \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest($data); // \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest |

try {
$result = $apiInstance->createOrdersAsync($request);
print_r($result);
} catch (Exception $e) {
echo 'Exception when calling OrdersApi->createOrdersAsync: ', $e->getMessage(), PHP_EOL;
}






}



?>
