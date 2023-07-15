<?php
putenv('TMPDIR=/home/recycleproco/public_html/temp');

require_once('wr-m6/apps/front/products/api-work/vendor/autoload.php');
$session_id = $_SESSION['userid'];
$Servername = "localhost";
$username = "recycleproco_sohaib";
$password = "123@Screw@@";
try {

  $pdo = new PDO("mysql:host=$Servername;dbname=recycleproco_experiment", $username, $password);
  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}






if(isset($_POST['getLabel'])){

  $stmt = $pdo->prepare("SELECT * FROM wr_user  where id=:id");
  $stmt->execute([
    'id'=>$_SESSION['userid']
  ]);
  $data = $stmt->fetchAll();
  // and somewhere later:
  foreach ($data as $row_1) {
  $fname = $row_1['fname'];
  $lname = $row_1['lname'];
  $address1 = $row_1['address1'];
  $address2 = $row_1['address2'];
  $fullname = $fname." ".$lname;
  $email = $row_1['email'];
  }
  $total = 0;
  foreach($_SESSION['products'] AS $product){
  $total = $product['total'];
  }

  if($total<=100){
    $parcel = "smallParcel";
  }
  else {
    $parcel = "parcel";
  }
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
  "orderReference" => "Iphone 12",
  'recipient' => [
  'address' => [
  "fullName" => $fullname,
  "companyName" => '-',
  "addressLine1" => $address1,
  "addressLine2" => $address2,
  "addressLine3" => "-",
  "city" => "Birmingham",
  "county" => "West Midlands",
  "postcode" => "B23 7PX",
  "countryCode" => "UK"
  ],
  "emailAddress" => $email
  ],
  'sender' => [
  "tradingName" => "abc",
  ],
  "billing" => [
  "address" => [
  "fullName" =>$fullname,
  "companyName" => "sender address",
  "addressLine1" => $address1,
  "addressLine2" => $address2,
  "addressLine3" => "-",
  "city" => "Birmingham",
  "county" => "West Midlands",
  "postcode" => "B23 7PX",
  "countryCode" => "UK"
  ],
  "phoneNumber" => "03132618827",
  "emailAddress" => $email
  ],
  "packages" => [[
  "weightInGrams" => 2,
  "packageFormatIdentifier" => $parcel
  ]],
  "orderDate" => "2022-01-19 03:14:07",
  "subtotal" => "40",
  "shippingCostCharged" => 0,
  "total" => $total,
  "postageDetails" => [
  "sendNotificationsTo" => "billing",
  "serviceCode" => "CRL48"
  ],
  "label" => [
  "includeLabelInResponse" => true,
  "includeReturnsLabel" => true
  ],


  ]]
  );


  $payload = json_encode($data);
  $request = new \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest($data); // \RoyalMail\ClickAndDrop\Rest\Api\Models\CreateOrdersRequest |

  try {
  $result = $apiInstance->createOrdersAsync($request);
  $json = json_decode($result, true);
  $label = $json['createdOrders'][0]['label'];
  $msg = "";
  $lab = mb_substr($label, 0, 100);
  $label_start = mb_substr($label, 0, 12);
  $trackingNumber = $json['createdOrders'][0]['trackingNumber'];


  //print_r($result);
setcookie("trackingNumber", $trackingNumber, time()+30*24*60*60);
setcookie("lab", $lab, time()+30*24*60*60);
setcookie("address1", $address1, time()+30*24*60*60);
setcookie("address2", $address2, time()+30*24*60*60);



  $to = 'sabirsaleem70@gmail.com';

  $subject = 'Qr Code label Print';
  $message = "<h1>Please Find Qr Code for Label Print</h1><br/> <img src='https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=Label=2|QRCode=$lab  $trackingNumber    $product_name2|1DBarcode=$trackingNumber|SendersDetails=Recycle Pro
  $address1
  $address2|RetDetails=Sabir Saleem\&ASHLYN \&ST. ALBANS\&AL3 8QE||&choe=UTF-8' />

  ";
  $headers = 'From: info@recyclepro.co.uk'       . "\r\n" .
  'Reply-To: info@recyclepro.co.uk' . "\r\n" .
  'X-Mailer: PHP/' . phpversion();
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  mail($to, $subject, $message, $headers);

  //echo $message;
  //echo $trackingNumber;

  //echo json_encode(array("trackingNumber" => $trackingNumber,"lab"=>$lab,"label"=>$label));



  } catch (Exception $e) {
  echo 'Exception when calling OrdersApi->createOrdersAsync: ', $e->getMessage(), PHP_EOL;
  }



  ?>
  <!DOCTYPE html>
  <!-- Created by pdf2htmlEX (https://github.com/pdf2htmlEX/pdf2htmlEX) -->
  <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
          <meta charset="utf-8" />
          <meta name="generator" content="pdf2htmlEX" />
          <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
          <style type="text/css">
              /*!
   * Base CSS for pdf2htmlEX
   * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com>
   * https://github.com/pdf2htmlEX/pdf2htmlEX/blob/master/share/LICENSE
   */
              .label_div #sidebar {
                  position: absolute;
                  top: 0;
                  left: 0;
                  bottom: 0;
                  width: 250px;
                  padding: 0;
                  margin: 0;
                  overflow: auto;
              }
              .label_div #page-container {
                  position: absolute;
                  top: 0;
                  left: 0;
                  margin: 0;
                  padding: 0;
                  border: 0;
              }
              @media screen {
                  .label_div #sidebar.opened + #page-container {
                      left: 250px;
                  }
                  .label_div #page-container {
                      bottom: 0;
                      right: 0;
                      overflow: auto;
                  }
                  .label_div .loading-indicator {
                      display: none;
                  }
                  .label_div .loading-indicator.active {
                      display: block;
                      position: absolute;
                      width: 64px;
                      height: 64px;
                      top: 50%;
                      left: 50%;
                      margin-top: -32px;
                      margin-left: -32px;
                  }
                  .label_div .loading-indicator img {
                      position: absolute;
                      top: 0;
                      left: 0;
                      bottom: 0;
                      right: 0;
                  }
              }
              @media print {
                  @page {
                      margin: 0;
                  }

                  .label_div #sidebar {
                      display: none;
                  }
                  .label_div #page-container {
                      width: auto;
                      height: auto;
                      overflow: visible;
                      background-color: transparent;
                  }
                  .label_div .d {
                      display: none;
                  }
              }
              .pf {
                  position: relative;
                  background-color: white;
                  overflow: hidden;
                  margin: 0;
                  border: 0;
              }
              .pc {
                  position: absolute;
                  border: 0;
                  padding: 0;
                  margin: 0;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  overflow: hidden;
                  display: block;
                  transform-origin: 0 0;
                  -ms-transform-origin: 0 0;
                  -webkit-transform-origin: 0 0;
              }
              .pc.opened {
                  display: block;
              }
              .bf {
                  position: absolute;
                  border: 0;
                  margin: 0;
                  top: 0;
                  bottom: 0;
                  width: 100%;
                  height: 100%;
                  -ms-user-select: none;
                  -moz-user-select: none;
                  -webkit-user-select: none;
                  user-select: none;
              }
              .bi {
                  position: absolute;
                  border: 0;
                  margin: 0;
                  -ms-user-select: none;
                  -moz-user-select: none;
                  -webkit-user-select: none;
                  user-select: none;
              }
              @media print {
                  .pf {
                      margin: 0;
                      box-shadow: none;
                      page-break-after: always;
                      page-break-inside: avoid;
                  }
                  @-moz-document url-prefix() {
                      .pf {
                          overflow: visible;
                          border: 1px solid #fff;
                      }
                      .pc {
                          overflow: visible;
                      }
                  }
              }
              .c {
                  position: absolute;
                  border: 0;
                  padding: 0;
                  margin: 0;
                  overflow: hidden;
                  display: block;
              }
              .t {
                  position: absolute;
                  white-space: pre;
                  font-size: 1px;
                  transform-origin: 0 100%;
                  -ms-transform-origin: 0 100%;
                  -webkit-transform-origin: 0 100%;
                  unicode-bidi: bidi-override;
                  -moz-font-feature-settings: "liga" 0;
              }
              .t:after {
                  content: "";
              }
              .t:before {
                  content: "";
                  display: inline-block;
              }
              .t span {
                  position: relative;
                  unicode-bidi: bidi-override;
              }
              ._ {
                  display: inline-block;
                  color: transparent;
                  z-index: -1;
              }
              ::selection {
                  background: rgba(127, 255, 255, 0.4);
              }
              ::-moz-selection {
                  background: rgba(127, 255, 255, 0.4);
              }
              .pi {
                  display: none;
              }
              .d {
                  position: absolute;
                  transform-origin: 0 100%;
                  -ms-transform-origin: 0 100%;
                  -webkit-transform-origin: 0 100%;
              }
              .it {
                  border: 0;
                  background-color: rgba(255, 255, 255, 0);
              }
              .ir:hover {
                  cursor: pointer;
              }
          </style>
          <style type="text/css">
              /*!
   * Fancy styles for pdf2htmlEX
   * Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com>
   * https://github.com/pdf2htmlEX/pdf2htmlEX/blob/master/share/LICENSE
   */
              @keyframes fadein {
                  from {
                      opacity: 0;
                  }
                  to {
                      opacity: 1;
                  }
              }
              @-webkit-keyframes fadein {
                  from {
                      opacity: 0;
                  }
                  to {
                      opacity: 1;
                  }
              }
              @keyframes swing {
                  0 {
                      transform: rotate(0);
                  }
                  10% {
                      transform: rotate(0);
                  }
                  90% {
                      transform: rotate(720deg);
                  }
                  100% {
                      transform: rotate(720deg);
                  }
              }
              @-webkit-keyframes swing {
                  0 {
                      -webkit-transform: rotate(0);
                  }
                  10% {
                      -webkit-transform: rotate(0);
                  }
                  90% {
                      -webkit-transform: rotate(720deg);
                  }
                  100% {
                      -webkit-transform: rotate(720deg);
                  }
              }
              @media screen {
                  #sidebar {
                      background-color: #2f3236;
                      background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjNDAzYzNmIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNCA0Wk00IDBMMCA0WiIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2U9IiMxZTI5MmQiPjwvcGF0aD4KPC9zdmc+");
                  }
                  #outline {
                      font-family: Georgia, Times, "Times New Roman", serif;
                      font-size: 13px;
                      margin: 2em 1em;
                  }
                  #outline ul {
                      padding: 0;
                  }
                  #outline li {
                      list-style-type: none;
                      margin: 1em 0;
                  }
                  #outline li > ul {
                      margin-left: 1em;
                  }
                  #outline a,
                  #outline a:visited,
                  #outline a:hover,
                  #outline a:active {
                      line-height: 1.2;
                      color: #e8e8e8;
                      text-overflow: ellipsis;
                      white-space: nowrap;
                      text-decoration: none;
                      display: block;
                      overflow: hidden;
                      outline: 0;
                  }
                  #outline a:hover {
                      color: #0cf;
                  }
                  #page-container {
                      background-color: #9e9e9e;
                      background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1IiBoZWlnaHQ9IjUiPgo8cmVjdCB3aWR0aD0iNSIgaGVpZ2h0PSI1IiBmaWxsPSIjOWU5ZTllIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDVMNSAwWk02IDRMNCA2Wk0tMSAxTDEgLTFaIiBzdHJva2U9IiM4ODgiIHN0cm9rZS13aWR0aD0iMSI+PC9wYXRoPgo8L3N2Zz4=");
                      -webkit-transition: left 500ms;
                      transition: left 500ms;
                  }
                  .pf {
                      margin: 13px auto;
                      box-shadow: 1px 1px 3px 1px #333;
                      border-collapse: separate;
                  }
                  .pc.opened {
                      -webkit-animation: fadein 100ms;
                      animation: fadein 100ms;
                  }
                  .loading-indicator.active {
                      -webkit-animation: swing 1.5s ease-in-out 0.01s infinite alternate none;
                      animation: swing 1.5s ease-in-out 0.01s infinite alternate none;
                  }
                  .checked {
                      background: no-repeat
                          url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3goQDSYgDiGofgAAAslJREFUOMvtlM9LFGEYx7/vvOPM6ywuuyPFihWFBUsdNnA6KLIh+QPx4KWExULdHQ/9A9EfUodYmATDYg/iRewQzklFWxcEBcGgEplDkDtI6sw4PzrIbrOuedBb9MALD7zv+3m+z4/3Bf7bZS2bzQIAcrmcMDExcTeXy10DAFVVAQDksgFUVZ1ljD3yfd+0LOuFpmnvVVW9GHhkZAQcxwkNDQ2FSCQyRMgJxnVdy7KstKZpn7nwha6urqqfTqfPBAJAuVymlNLXoigOhfd5nmeiKL5TVTV+lmIKwAOA7u5u6Lped2BsbOwjY6yf4zgQQkAIAcedaPR9H67r3uYBQFEUFItFtLe332lpaVkUBOHK3t5eRtf1DwAwODiIubk5DA8PM8bYW1EU+wEgCIJqsCAIQAiB7/u253k2BQDDMJBKpa4mEon5eDx+UxAESJL0uK2t7XosFlvSdf0QAEmlUnlRFJ9Waho2Qghc1/U9z3uWz+eX+Wr+lL6SZfleEAQIggA8z6OpqSknimIvYyybSCReMsZ6TislhCAIAti2Dc/zejVNWwCAavN8339j27YbTg0AGGM3WltbP4WhlRWq6Q/btrs1TVsYHx+vNgqKoqBUKn2NRqPFxsbGJzzP05puUlpt0ukyOI6z7zjOwNTU1OLo6CgmJyf/gA3DgKIoWF1d/cIY24/FYgOU0pp0z/Ityzo8Pj5OTk9PbwHA+vp6zWghDC+VSiuRSOQgGo32UErJ38CO42wdHR09LBQK3zKZDDY2NupmFmF4R0cHVlZWlmRZ/iVJUn9FeWWcCCE4ODjYtG27Z2Zm5juAOmgdGAB2d3cBADs7O8uSJN2SZfl+WKlpmpumaT6Yn58vn/fs6XmbhmHMNjc3tzDGFI7jYJrm5vb29sDa2trPC/9aiqJUy5pOp4f6+vqeJ5PJBAB0dnZe/t8NBajx/z37Df5OGX8d13xzAAAAAElFTkSuQmCC);
                  }
              }
          </style>
          <style type="text/css">
              .ff0 {
                  font-family: sans-serif;
                  visibility: hidden;
              }
              @font-face {
                  font-family: ff1;
                  src: url("data:application/font-woff;base64,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")
                      format("woff");
              }
              .ff1 {
                  font-family: ff1;
                  line-height: 0.927375;
                  font-style: normal;
                  font-weight: normal;
                  visibility: visible;
              }
              @font-face {
                  font-family: ff2;
                  src: url("data:application/font-woff;base64,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")
                      format("woff");
              }
              .ff2 {
                  font-family: ff2;
                  line-height: 0.943029;
                  font-style: normal;
                  font-weight: normal;
                  visibility: visible;
              }
              @font-face {
                  font-family: ff3;
                  src: url("data:application/font-woff;base64,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")
                      format("woff");
              }
              .ff3 {
                  font-family: ff3;
                  line-height: 0.959961;
                  font-style: normal;
                  font-weight: normal;
                  visibility: visible;
              }
              @font-face {
                  font-family: ff4;
                  src: url("data:application/font-woff;base64,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")
                      format("woff");
              }
              .ff4 {
                  font-family: ff4;
                  line-height: 0.912109;
                  font-style: normal;
                  font-weight: normal;
                  visibility: visible;
              }
              .m1 {
                  transform: matrix(0, -0.375, 0.375, 0, 0, 0);
                  -ms-transform: matrix(0, -0.375, 0.375, 0, 0, 0);
                  -webkit-transform: matrix(0, -0.375, 0.375, 0, 0, 0);
              }
              .m0 {
                  transform: matrix(0.375, 0, 0, 0.375, 0, 0);
                  -ms-transform: matrix(0.375, 0, 0, 0.375, 0, 0);
                  -webkit-transform: matrix(0.375, 0, 0, 0.375, 0, 0);
              }
              .v0 {
                  vertical-align: 0px;
              }
              .ls0 {
                  letter-spacing: 0px;
              }
              .sc_ {
                  text-shadow: none;
              }
              .sc0 {
                  text-shadow: -0.015em 0 transparent, 0 0.015em transparent, 0.015em 0 transparent, 0 -0.015em transparent;
              }
              @media screen and (-webkit-min-device-pixel-ratio: 0) {
                  .sc_ {
                      -webkit-text-stroke: 0px transparent;
                  }
                  .sc0 {
                      -webkit-text-stroke: 0.015em transparent;
                      text-shadow: none;
                  }
              }
              .ws0 {
                  word-spacing: 0px;
              }
              ._1 {
                  margin-left: -1.408px;
              }
              ._0 {
                  width: 3.626px;
              }
              .fc0 {
                  color: rgb(0, 0, 0);
              }
              .fs7 {
                  font-size: 24px;
              }
              .fs4 {
                  font-size: 28px;
              }
              .fs3 {
                  font-size: 32px;
              }
              .fs6 {
                  font-size: 36px;
              }
              .fs5 {
                  font-size: 40px;
              }
              .fs2 {
                  font-size: 48px;
              }
              .fs0 {
                  font-size: 60px;
              }
              .fs1 {
                  font-size: 196px;
              }
              .y0 {
                  bottom: -0.75px;
              }
              .y15 {
                  bottom: 649.436496px;
              }
              .y14 {
                  bottom: 724.569291px;
              }
              .y13 {
                  bottom: 737.647416px;
              }
              .y12 {
                  bottom: 792.993337px;
              }
              .y11 {
                  bottom: 795.466216px;
              }
              .y10 {
                  bottom: 812.563872px;
              }
              .yf {
                  bottom: 829.661529px;
              }
              .ye {
                  bottom: 846.759184px;
              }
              .yd {
                  bottom: 863.856841px;
              }
              .yc {
                  bottom: 880.954497px;
              }
              .yb {
                  bottom: 898.052154px;
              }
              .ya {
                  bottom: 915.14981px;
              }
              .y9 {
                  bottom: 943.868203px;
              }
              .y8 {
                  bottom: 1071.427453px;
              }
              .y7 {
                  bottom: 1092.757575px;
              }
              .y6 {
                  bottom: 1114.01745px;
              }
              .y5 {
                  bottom: 1131.721275px;
              }
              .y3 {
                  bottom: 1148.03325px;
              }
              .y2 {
                  bottom: 1151.772075px;
              }
              .y1 {
                  bottom: 1177.797075px;
              }
              .y4 {
                  bottom: 1208.256825px;
              }
              .ha {
                  height: 18px;
              }
              .h5 {
                  height: 20.832px;
              }
              .h6 {
                  height: 23.808px;
              }
              .h7 {
                  height: 24px;
              }
              .h4 {
                  height: 24.32px;
              }
              .h9 {
                  height: 26.701172px;
              }
              .h8 {
                  height: 30px;
              }
              .h2 {
                  height: 44.64px;
              }
              .h3 {
                  height: 145.824px;
              }
              .h0 {
                  height: 1262.836575px;
              }
              .h1 {
                  height: 1263.75px;
              }
              .w0 {
                  width: 892.91475px;
              }
              .w1 {
                  width: 894px;
              }
              .x0 {
                  left: 0px;
              }
              .x9 {
                  left: 38.267775px;
              }
              .x1 {
                  left: 42.51975px;
              }
              .x7 {
                  left: 51.0237px;
              }
              .x2 {
                  left: 225.354675px;
              }
              .x8 {
                  left: 241.680221px;
              }
              .x4 {
                  left: 311.306831px;
              }
              .x3 {
                  left: 340.21082px;
              }
              .xa {
                  left: 372.607317px;
              }
              .x5 {
                  left: 378.602438px;
              }
              .x6 {
                  left: 386.701687px;
              }
              .xb {
                  left: 399.605853px;
              }
              .xc {
                  left: 413.105119px;
              }
              .xd {
                  left: 426.604387px;
              }
              @media print {
                  .v0 {
                      vertical-align: 0pt;
                  }
                  .ls0 {
                      letter-spacing: 0pt;
                  }
                  .ws0 {
                      word-spacing: 0pt;
                  }
                  ._1 {
                      margin-left: -1.251556pt;
                  }
                  ._0 {
                      width: 3.223111pt;
                  }
                  .fs7 {
                      font-size: 21.333333pt;
                  }
                  .fs4 {
                      font-size: 24.888889pt;
                  }
                  .fs3 {
                      font-size: 28.444444pt;
                  }
                  .fs6 {
                      font-size: 32pt;
                  }
                  .fs5 {
                      font-size: 35.555556pt;
                  }
                  .fs2 {
                      font-size: 42.666667pt;
                  }
                  .fs0 {
                      font-size: 53.333333pt;
                  }
                  .fs1 {
                      font-size: 174.222222pt;
                  }
                  .y0 {
                      bottom: -0.666667pt;
                  }
                  .y15 {
                      bottom: 577.276885pt;
                  }
                  .y14 {
                      bottom: 644.061592pt;
                  }
                  .y13 {
                      bottom: 655.686592pt;
                  }
                  .y12 {
                      bottom: 704.882967pt;
                  }
                  .y11 {
                      bottom: 707.081081pt;
                  }
                  .y10 {
                      bottom: 722.278997pt;
                  }
                  .yf {
                      bottom: 737.476915pt;
                  }
                  .ye {
                      bottom: 752.674831pt;
                  }
                  .yd {
                      bottom: 767.872748pt;
                  }
                  .yc {
                      bottom: 783.070664pt;
                  }
                  .yb {
                      bottom: 798.268581pt;
                  }
                  .ya {
                      bottom: 813.466497pt;
                  }
                  .y9 {
                      bottom: 838.993959pt;
                  }
                  .y8 {
                      bottom: 952.379959pt;
                  }
                  .y7 {
                      bottom: 971.340067pt;
                  }
                  .y6 {
                      bottom: 990.237733pt;
                  }
                  .y5 {
                      bottom: 1005.974467pt;
                  }
                  .y3 {
                      bottom: 1020.474pt;
                  }
                  .y2 {
                      bottom: 1023.7974pt;
                  }
                  .y1 {
                      bottom: 1046.930733pt;
                  }
                  .y4 {
                      bottom: 1074.006067pt;
                  }
                  .ha {
                      height: 16pt;
                  }
                  .h5 {
                      height: 18.517333pt;
                  }
                  .h6 {
                      height: 21.162667pt;
                  }
                  .h7 {
                      height: 21.333333pt;
                  }
                  .h4 {
                      height: 21.617778pt;
                  }
                  .h9 {
                      height: 23.734375pt;
                  }
                  .h8 {
                      height: 26.666667pt;
                  }
                  .h2 {
                      height: 39.68pt;
                  }
                  .h3 {
                      height: 129.621333pt;
                  }
                  .h0 {
                      height: 1122.5214pt;
                  }
                  .h1 {
                      height: 1123.333333pt;
                  }
                  .w0 {
                      width: 793.702pt;
                  }
                  .w1 {
                      width: 794.666667pt;
                  }
                  .x0 {
                      left: 0pt;
                  }
                  .x9 {
                      left: 34.0158pt;
                  }
                  .x1 {
                      left: 37.795333pt;
                  }
                  .x7 {
                      left: 45.3544pt;
                  }
                  .x2 {
                      left: 200.315267pt;
                  }
                  .x8 {
                      left: 214.826863pt;
                  }
                  .x4 {
                      left: 276.717183pt;
                  }
                  .x3 {
                      left: 302.409617pt;
                  }
                  .xa {
                      left: 331.206504pt;
                  }
                  .x5 {
                      left: 336.5355pt;
                  }
                  .x6 {
                      left: 343.734833pt;
                  }
                  .xb {
                      left: 355.205203pt;
                  }
                  .xc {
                      left: 367.204551pt;
                  }
                  .xd {
                      left: 379.2039pt;
                  }
              }
          </style>
          <script>
              /*
   Copyright 2012 Mozilla Foundation
   Copyright 2013 Lu Wang <coolwanglu@gmail.com>
   Apachine License Version 2.0
  */
              (function () {
                  function b(a, b, e, f) {
                      var c = (a.className || "").split(/\s+/g);
                      "" === c[0] && c.shift();
                      var d = c.indexOf(b);
                      0 > d && e && c.push(b);
                      0 <= d && f && c.splice(d, 1);
                      a.className = c.join(" ");
                      return 0 <= d;
                  }
                  if (!("classList" in document.createElement("div"))) {
                      var e = {
                          add: function (a) {
                              b(this.element, a, !0, !1);
                          },
                          contains: function (a) {
                              return b(this.element, a, !1, !1);
                          },
                          remove: function (a) {
                              b(this.element, a, !1, !0);
                          },
                          toggle: function (a) {
                              b(this.element, a, !0, !0);
                          },
                      };
                      Object.defineProperty(HTMLElement.prototype, "classList", {
                          get: function () {
                              if (this._classList) return this._classList;
                              var a = Object.create(e, { element: { value: this, writable: !1, enumerable: !0 } });
                              Object.defineProperty(this, "_classList", { value: a, writable: !1, enumerable: !1 });
                              return a;
                          },
                          enumerable: !0,
                      });
                  }
              })();
          </script>
          <script>
              (function () {
                  /*
   pdf2htmlEX.js: Core UI functions for pdf2htmlEX
   Copyright 2012,2013 Lu Wang <coolwanglu@gmail.com> and other contributors
   https://github.com/pdf2htmlEX/pdf2htmlEX/blob/master/share/LICENSE
  */
                  var pdf2htmlEX = (window.pdf2htmlEX = window.pdf2htmlEX || {}),
                      CSS_CLASS_NAMES = { page_frame: "pf", page_content_box: "pc", page_data: "pi", background_image: "bi", link: "l", input_radio: "ir", __dummy__: "no comma" },
                      DEFAULT_CONFIG = {
                          container_id: "page-container",
                          sidebar_id: "sidebar",
                          outline_id: "outline",
                          loading_indicator_cls: "loading-indicator",
                          preload_pages: 3,
                          render_timeout: 100,
                          scale_step: 0.9,
                          key_handler: !0,
                          hashchange_handler: !0,
                          view_history_handler: !0,
                          __dummy__: "no comma",
                      },
                      EPS = 1e-6;
                  function invert(a) {
                      var b = a[0] * a[3] - a[1] * a[2];
                      return [a[3] / b, -a[1] / b, -a[2] / b, a[0] / b, (a[2] * a[5] - a[3] * a[4]) / b, (a[1] * a[4] - a[0] * a[5]) / b];
                  }
                  function transform(a, b) {
                      return [a[0] * b[0] + a[2] * b[1] + a[4], a[1] * b[0] + a[3] * b[1] + a[5]];
                  }
                  function get_page_number(a) {
                      return parseInt(a.getAttribute("data-page-no"), 16);
                  }
                  function disable_dragstart(a) {
                      for (var b = 0, c = a.length; b < c; ++b)
                          a[b].addEventListener(
                              "dragstart",
                              function () {
                                  return !1;
                              },
                              !1
                          );
                  }
                  function clone_and_extend_objs(a) {
                      for (var b = {}, c = 0, e = arguments.length; c < e; ++c) {
                          var h = arguments[c],
                              d;
                          for (d in h) h.hasOwnProperty(d) && (b[d] = h[d]);
                      }
                      return b;
                  }
                  function Page(a) {
                      if (a) {
                          this.shown = this.loaded = !1;
                          this.page = a;
                          this.num = get_page_number(a);
                          this.original_height = a.clientHeight;
                          this.original_width = a.clientWidth;
                          var b = a.getElementsByClassName(CSS_CLASS_NAMES.page_content_box)[0];
                          b &&
                              ((this.content_box = b),
                              (this.original_scale = this.cur_scale = this.original_height / b.clientHeight),
                              (this.page_data = JSON.parse(a.getElementsByClassName(CSS_CLASS_NAMES.page_data)[0].getAttribute("data-data"))),
                              (this.ctm = this.page_data.ctm),
                              (this.ictm = invert(this.ctm)),
                              (this.loaded = !0));
                      }
                  }
                  Page.prototype = {
                      hide: function () {
                          this.loaded && this.shown && (this.content_box.classList.remove("opened"), (this.shown = !1));
                      },
                      show: function () {
                          this.loaded && !this.shown && (this.content_box.classList.add("opened"), (this.shown = !0));
                      },
                      rescale: function (a) {
                          this.cur_scale = 0 === a ? this.original_scale : a;
                          this.loaded && ((a = this.content_box.style), (a.msTransform = a.webkitTransform = a.transform = "scale(" + this.cur_scale.toFixed(3) + ")"));
                          a = this.page.style;
                          a.height = this.original_height * this.cur_scale + "px";
                          a.width = this.original_width * this.cur_scale + "px";
                      },
                      view_position: function () {
                          var a = this.page,
                              b = a.parentNode;
                          return [b.scrollLeft - a.offsetLeft - a.clientLeft, b.scrollTop - a.offsetTop - a.clientTop];
                      },
                      height: function () {
                          return this.page.clientHeight;
                      },
                      width: function () {
                          return this.page.clientWidth;
                      },
                  };
                  function Viewer(a) {
                      this.config = clone_and_extend_objs(DEFAULT_CONFIG, 0 < arguments.length ? a : {});
                      this.pages_loading = [];
                      this.init_before_loading_content();
                      var b = this;
                      document.addEventListener(
                          "DOMContentLoaded",
                          function () {
                              b.init_after_loading_content();
                          },
                          !1
                      );
                  }
                  Viewer.prototype = {
                      scale: 1,
                      cur_page_idx: 0,
                      first_page_idx: 0,
                      init_before_loading_content: function () {
                          this.pre_hide_pages();
                      },
                      initialize_radio_button: function () {
                          for (var a = document.getElementsByClassName(CSS_CLASS_NAMES.input_radio), b = 0; b < a.length; b++)
                              a[b].addEventListener("click", function () {
                                  this.classList.toggle("checked");
                              });
                      },
                      init_after_loading_content: function () {
                          this.sidebar = document.getElementById(this.config.sidebar_id);
                          this.outline = document.getElementById(this.config.outline_id);
                          this.container = document.getElementById(this.config.container_id);
                          this.loading_indicator = document.getElementsByClassName(this.config.loading_indicator_cls)[0];
                          for (var a = !0, b = this.outline.childNodes, c = 0, e = b.length; c < e; ++c)
                              if ("ul" === b[c].nodeName.toLowerCase()) {
                                  a = !1;
                                  break;
                              }
                          a || this.sidebar.classList.add("opened");
                          this.find_pages();
                          if (0 != this.pages.length) {
                              disable_dragstart(document.getElementsByClassName(CSS_CLASS_NAMES.background_image));
                              this.config.key_handler && this.register_key_handler();
                              var h = this;
                              this.config.hashchange_handler &&
                                  window.addEventListener(
                                      "hashchange",
                                      function (a) {
                                          h.navigate_to_dest(document.location.hash.substring(1));
                                      },
                                      !1
                                  );
                              this.config.view_history_handler &&
                                  window.addEventListener(
                                      "popstate",
                                      function (a) {
                                          a.state && h.navigate_to_dest(a.state);
                                      },
                                      !1
                                  );
                              this.container.addEventListener(
                                  "scroll",
                                  function () {
                                      h.update_page_idx();
                                      h.schedule_render(!0);
                                  },
                                  !1
                              );
                              [this.container, this.outline].forEach(function (a) {
                                  a.addEventListener("click", h.link_handler.bind(h), !1);
                              });
                              this.initialize_radio_button();
                              this.render();
                          }
                      },
                      find_pages: function () {
                          for (var a = [], b = {}, c = this.container.childNodes, e = 0, h = c.length; e < h; ++e) {
                              var d = c[e];
                              d.nodeType === Node.ELEMENT_NODE && d.classList.contains(CSS_CLASS_NAMES.page_frame) && ((d = new Page(d)), a.push(d), (b[d.num] = a.length - 1));
                          }
                          this.pages = a;
                          this.page_map = b;
                      },
                      load_page: function (a, b, c) {
                          var e = this.pages;
                          if (!(a >= e.length || ((e = e[a]), e.loaded || this.pages_loading[a]))) {
                              var e = e.page,
                                  h = e.getAttribute("data-page-url");
                              if (h) {
                                  this.pages_loading[a] = !0;
                                  var d = e.getElementsByClassName(this.config.loading_indicator_cls)[0];
                                  "undefined" === typeof d && ((d = this.loading_indicator.cloneNode(!0)), d.classList.add("active"), e.appendChild(d));
                                  var f = this,
                                      g = new XMLHttpRequest();
                                  g.open("GET", h, !0);
                                  g.onload = function () {
                                      if (200 === g.status || 0 === g.status) {
                                          var b = document.createElement("div");
                                          b.innerHTML = g.responseText;
                                          for (var d = null, b = b.childNodes, e = 0, h = b.length; e < h; ++e) {
                                              var p = b[e];
                                              if (p.nodeType === Node.ELEMENT_NODE && p.classList.contains(CSS_CLASS_NAMES.page_frame)) {
                                                  d = p;
                                                  break;
                                              }
                                          }
                                          b = f.pages[a];
                                          f.container.replaceChild(d, b.page);
                                          b = new Page(d);
                                          f.pages[a] = b;
                                          b.hide();
                                          b.rescale(f.scale);
                                          disable_dragstart(d.getElementsByClassName(CSS_CLASS_NAMES.background_image));
                                          f.schedule_render(!1);
                                          c && c(b);
                                      }
                                      delete f.pages_loading[a];
                                  };
                                  g.send(null);
                              }
                              void 0 === b && (b = this.config.preload_pages);
                              0 < --b &&
                                  ((f = this),
                                  setTimeout(function () {
                                      f.load_page(a + 1, b);
                                  }, 0));
                          }
                      },
                      pre_hide_pages: function () {
                          var a = "@media screen{." + CSS_CLASS_NAMES.page_content_box + "{display:none;}}",
                              b = document.createElement("style");
                          b.styleSheet ? (b.styleSheet.cssText = a) : b.appendChild(document.createTextNode(a));
                          document.head.appendChild(b);
                      },
                      render: function () {
                          for (var a = this.container, b = a.scrollTop, c = a.clientHeight, a = b - c, b = b + c + c, c = this.pages, e = 0, h = c.length; e < h; ++e) {
                              var d = c[e],
                                  f = d.page,
                                  g = f.offsetTop + f.clientTop,
                                  f = g + f.clientHeight;
                              g <= b && f >= a ? (d.loaded ? d.show() : this.load_page(e)) : d.hide();
                          }
                      },
                      update_page_idx: function () {
                          var a = this.pages,
                              b = a.length;
                          if (!(2 > b)) {
                              for (var c = this.container, e = c.scrollTop, c = e + c.clientHeight, h = -1, d = b, f = d - h; 1 < f; ) {
                                  var g = h + Math.floor(f / 2),
                                      f = a[g].page;
                                  f.offsetTop + f.clientTop + f.clientHeight >= e ? (d = g) : (h = g);
                                  f = d - h;
                              }
                              this.first_page_idx = d;
                              for (var g = (h = this.cur_page_idx), k = 0; d < b; ++d) {
                                  var f = a[d].page,
                                      l = f.offsetTop + f.clientTop,
                                      f = f.clientHeight;
                                  if (l > c) break;
                                  f = (Math.min(c, l + f) - Math.max(e, l)) / f;
                                  if (d === h && Math.abs(f - 1) <= EPS) {
                                      g = h;
                                      break;
                                  }
                                  f > k && ((k = f), (g = d));
                              }
                              this.cur_page_idx = g;
                          }
                      },
                      schedule_render: function (a) {
                          if (void 0 !== this.render_timer) {
                              if (!a) return;
                              clearTimeout(this.render_timer);
                          }
                          var b = this;
                          this.render_timer = setTimeout(function () {
                              delete b.render_timer;
                              b.render();
                          }, this.config.render_timeout);
                      },
                      register_key_handler: function () {
                          var a = this;
                          window.addEventListener(
                              "DOMMouseScroll",
                              function (b) {
                                  if (b.ctrlKey) {
                                      b.preventDefault();
                                      var c = a.container,
                                          e = c.getBoundingClientRect(),
                                          c = [b.clientX - e.left - c.clientLeft, b.clientY - e.top - c.clientTop];
                                      a.rescale(Math.pow(a.config.scale_step, b.detail), !0, c);
                                  }
                              },
                              !1
                          );
                          window.addEventListener(
                              "keydown",
                              function (b) {
                                  var c = !1,
                                      e = b.ctrlKey || b.metaKey,
                                      h = b.altKey;
                                  switch (b.keyCode) {
                                      case 61:
                                      case 107:
                                      case 187:
                                          e && (a.rescale(1 / a.config.scale_step, !0), (c = !0));
                                          break;
                                      case 173:
                                      case 109:
                                      case 189:
                                          e && (a.rescale(a.config.scale_step, !0), (c = !0));
                                          break;
                                      case 48:
                                          e && (a.rescale(0, !1), (c = !0));
                                          break;
                                      case 33:
                                          h ? a.scroll_to(a.cur_page_idx - 1) : (a.container.scrollTop -= a.container.clientHeight);
                                          c = !0;
                                          break;
                                      case 34:
                                          h ? a.scroll_to(a.cur_page_idx + 1) : (a.container.scrollTop += a.container.clientHeight);
                                          c = !0;
                                          break;
                                      case 35:
                                          a.container.scrollTop = a.container.scrollHeight;
                                          c = !0;
                                          break;
                                      case 36:
                                          (a.container.scrollTop = 0), (c = !0);
                                  }
                                  c && b.preventDefault();
                              },
                              !1
                          );
                      },
                      rescale: function (a, b, c) {
                          var e = this.scale;
                          this.scale = a = 0 === a ? 1 : b ? e * a : a;
                          c || (c = [0, 0]);
                          b = this.container;
                          c[0] += b.scrollLeft;
                          c[1] += b.scrollTop;
                          for (var h = this.pages, d = h.length, f = this.first_page_idx; f < d; ++f) {
                              var g = h[f].page;
                              if (g.offsetTop + g.clientTop >= c[1]) break;
                          }
                          g = f - 1;
                          0 > g && (g = 0);
                          var g = h[g].page,
                              k = g.clientWidth,
                              f = g.clientHeight,
                              l = g.offsetLeft + g.clientLeft,
                              m = c[0] - l;
                          0 > m ? (m = 0) : m > k && (m = k);
                          k = g.offsetTop + g.clientTop;
                          c = c[1] - k;
                          0 > c ? (c = 0) : c > f && (c = f);
                          for (f = 0; f < d; ++f) h[f].rescale(a);
                          b.scrollLeft += (m / e) * a + g.offsetLeft + g.clientLeft - m - l;
                          b.scrollTop += (c / e) * a + g.offsetTop + g.clientTop - c - k;
                          this.schedule_render(!0);
                      },
                      fit_width: function () {
                          var a = this.cur_page_idx;
                          this.rescale(this.container.clientWidth / this.pages[a].width(), !0);
                          this.scroll_to(a);
                      },
                      fit_height: function () {
                          var a = this.cur_page_idx;
                          this.rescale(this.container.clientHeight / this.pages[a].height(), !0);
                          this.scroll_to(a);
                      },
                      get_containing_page: function (a) {
                          for (; a; ) {
                              if (a.nodeType === Node.ELEMENT_NODE && a.classList.contains(CSS_CLASS_NAMES.page_frame)) {
                                  a = get_page_number(a);
                                  var b = this.page_map;
                                  return a in b ? this.pages[b[a]] : null;
                              }
                              a = a.parentNode;
                          }
                          return null;
                      },
                      link_handler: function (a) {
                          var b = a.target,
                              c = b.getAttribute("data-dest-detail");
                          if (c) {
                              if (this.config.view_history_handler)
                                  try {
                                      var e = this.get_current_view_hash();
                                      window.history.replaceState(e, "", "#" + e);
                                      window.history.pushState(c, "", "#" + c);
                                  } catch (h) {}
                              this.navigate_to_dest(c, this.get_containing_page(b));
                              a.preventDefault();
                          }
                      },
                      navigate_to_dest: function (a, b) {
                          try {
                              var c = JSON.parse(a);
                          } catch (e) {
                              return;
                          }
                          if (c instanceof Array) {
                              var h = c[0],
                                  d = this.page_map;
                              if (h in d) {
                                  for (var f = d[h], h = this.pages[f], d = 2, g = c.length; d < g; ++d) {
                                      var k = c[d];
                                      if (null !== k && "number" !== typeof k) return;
                                  }
                                  for (; 6 > c.length; ) c.push(null);
                                  var g = b || this.pages[this.cur_page_idx],
                                      d = g.view_position(),
                                      d = transform(g.ictm, [d[0], g.height() - d[1]]),
                                      g = this.scale,
                                      l = [0, 0],
                                      m = !0,
                                      k = !1,
                                      n = this.scale;
                                  switch (c[1]) {
                                      case "XYZ":
                                          l = [null === c[2] ? d[0] : c[2] * n, null === c[3] ? d[1] : c[3] * n];
                                          g = c[4];
                                          if (null === g || 0 === g) g = this.scale;
                                          k = !0;
                                          break;
                                      case "Fit":
                                      case "FitB":
                                          l = [0, 0];
                                          k = !0;
                                          break;
                                      case "FitH":
                                      case "FitBH":
                                          l = [0, null === c[2] ? d[1] : c[2] * n];
                                          k = !0;
                                          break;
                                      case "FitV":
                                      case "FitBV":
                                          l = [null === c[2] ? d[0] : c[2] * n, 0];
                                          k = !0;
                                          break;
                                      case "FitR":
                                          (l = [c[2] * n, c[5] * n]), (m = !1), (k = !0);
                                  }
                                  if (k) {
                                      this.rescale(g, !1);
                                      var p = this,
                                          c = function (a) {
                                              l = transform(a.ctm, l);
                                              m && (l[1] = a.height() - l[1]);
                                              p.scroll_to(f, l);
                                          };
                                      h.loaded ? c(h) : (this.load_page(f, void 0, c), this.scroll_to(f));
                                  }
                              }
                          }
                      },
                      scroll_to: function (a, b) {
                          var c = this.pages;
                          if (!(0 > a || a >= c.length)) {
                              c = c[a].view_position();
                              void 0 === b && (b = [0, 0]);
                              var e = this.container;
                              e.scrollLeft += b[0] - c[0];
                              e.scrollTop += b[1] - c[1];
                          }
                      },
                      get_current_view_hash: function () {
                          var a = [],
                              b = this.pages[this.cur_page_idx];
                          a.push(b.num);
                          a.push("XYZ");
                          var c = b.view_position(),
                              c = transform(b.ictm, [c[0], b.height() - c[1]]);
                          a.push(c[0] / this.scale);
                          a.push(c[1] / this.scale);
                          a.push(this.scale);
                          return JSON.stringify(a);
                      },
                  };
                  pdf2htmlEX.Viewer = Viewer;
              })();
          </script>
          <script>
              try {
                  pdf2htmlEX.defaultViewer = new pdf2htmlEX.Viewer({});
              } catch (e) {}
          </script>
          <title></title>
      </head>
      <body>
        <div class='label_div'>
          <div id="">
              <div id="outline"></div>
          </div>
          <div id="page-container">
              <div style="width:450px; height:650px" id="pf1" class="pf w0 h0" data-page-no="1">
                  <div class="pc pc1 w0 h0">
                      <img
                          class="bi x0 y0 w1 h1"
                          alt=""
                          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABKgAAAaVCAIAAACQxGAoAAAACXBIWXMAABYlAAAWJQFJUiTwAAAgAElEQVR42uzdeXzU1b0//s9kkgGyIRAQBEEFBSnuWm/dSBfXVrC41FotVK2tW11a2297bUnU3m7Wrtp7r7utoq1bXWu1JaAoAuICsgiyVkDZAtlnkszvj/n1c9MZZjKiNgGez4cPHjBzzuecz4eEPF6e95wTSSaTAQAAADuvAo8AAABA8AMAAEDwAwAAQPADAABA8AMAAEDwAwAAQPADAABA8AMAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAAQ/AAAABD8AAAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAMEPAAAAwQ8AAADBDwAAAMEPAAAAwQ8AAADBDwAAAMEPAABA8AMAAEDwAwAAQPADAABA8AMAAEDwAwAAQPADAABA8AMAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAAEPwAAAAQ/AAAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAMEPAAAAwQ8AAADBDwAAgO6jsEtGjUQiHj0AH4pkMukhAEB3DH5+TgPwofB/EgEgH0o9AQAABD8AAAAEPwAAAAQ/AAAABD8AAAAEPwAAAAQ/AAAABD8AAADBDwAAAMEPAAAAwQ8AAADBDwAAAMEPAAAAwQ8AAADBDwAAQPADAABA8AMAAEDwAwAAoLsp9AgAutbll1722GN/7vJp/OKXv5pw+gR/HQAg+AHw4aut3fyDyZOPOeaYrppAQTT661/+sqGh3t8FAAh+AHwkmpqaBgwYMHLUqC6cw259+rS3t/u7AICdlc/4AQAACH4AAADsyJR6AuzY3n333ffeey8IguHDhxcXF3sgAEAmK34AO7CG+oapf//7WWec8aMf/vCRhx5ev369ZwIACH4AO5WS0pIbrr8hGo3OmTPne9/7brQg6pkAAJmUegLswOrr6y+88MJHH310+PDhffrsFo/HPRMAIJMVP4AdWGlp6bjx4/bcc8999x1x4003DRw00DMBAAQ/gB3PgjcXPP7YY/GWlhkvzGhpaen4VmNj4/evvfbiSy5ubGq64brrm5ubO7677O1ly5cvb25ufurJp7Zs2eJJAsAuS6knQDeVSCR+8qMfj60c+9vf/KampubHP/nJVVdeWV19XUlpyaaNmy7/xjd6Ffdavnz5SSefvM8+wz/72c/Omzdv69atPXv23LRx089++tMzzzrzuurqoljs85///OWXXXbDD39YVFQ0atSoY4491rMFAMEPgG5h2dtv33jjz2bMmHH9DdcPGLB73779vvKV86+46sqPH37EW28tPuTQQ1evXj1q1MhZL8+a9fKsnj17rlu37qCDDnri8ScqKvr97ne3LFny1v/77nenTp261157XXX11edfcMFhhxx6xBGHC34AsAuKJJPJLhg10jXjAnRDZ0yYMHHSpFPHjev44txXXplWM628d3nN1KmbN29+7733Nm7cOHDgwL323ru5ufm8885buWLFb37zm78+++y3vvWtVStX1tfXT5gwoV9FxS033zx12rTbb7ttyZIljY2NS5csravbOnTo0P79BwwdNvToo49e8taSr5z/lUF77NFxuO9fe+2IESMmTpq04/0Y8wMFAPJgxQ+gO7riG9+YN2/epZdeOn369NLS0r59+06YcPqqVatenvlSXV39nNmzx40bX1Vd3b//gFGjRp1yyiklJSW/+uUvH3r4kRXLV9xw3XXPPPPMli1bhg8ffvwJx7cmWqdNq0kkEnV1W1YsX15TUzN4yOAdMeMBAIIfwE7lhh/+cN68eX9+9JHS0tLzvvzlb11zTWFhYTKZfHfdu7NmvVxTUzPzpZfmzXvjd7fc8rExY2o3bx48ZEh9ff2XvnROY0PDbn36XHzxJZWfrNx/9OjevXsHQbB8+fJvXnX1m2/OP/+CC0ePHj22stITBgDBD4Cu9NSTT57zxS+ecMKJdXX1I0eOuvKqqwoLC4MgiEQiAwcNHDd+/Ljx47ds2fL20qUzZ858de7ceFtbW1tbS0vLlVdeeeCBBw0cNLC4uLjjBffee+97fn/PiSecsHzZstdff+2FF16Y/sILnjMACH4AdJkDDjjgM5/5zAknnPCLX9x0+OGH9+zZc+mSpfffP2X+vPnl5WWjP/axV+a8snDhgtWrV/fs2fPMM8+ccPrpjY2Nf3zgga9ddFF5eXm/fv2OOuqoocOGvTJnTs+evT425mNf/vLEvv36Dtlzz759+5x66riCgoiHDACCHwBdqVdx8ZAhQ5qam2KxWBAJ5s+bd8rJJ5eUlPToEWtoaHz22Wd79+5dUFCw9957B0HQ2Nh45x13Dh4yuLS0tLS0NAiCeDz+9NNPNzQ0lJWVRSKRqVP/Pmf2nD/cd2+8paW1ta2+vm7/0aM9ZADYpTjAHaDbeeONN+66667f3/P7srLytWvWTquZVl5e3rt37/b29ksvu+y8877c2toai8VSjWOx2FfO/8oxxxyzYcP68JVoNPrY408cethhpaWlFRUVCxa8uXrV6obGxs2bN99yyy2///3vPWQA2KVY8QPodo466qjbbr+jvb39qaeeXLx40apVK1NLeX379rvoa1/buGHDU0892dbWFo1GgyBobGr6xU03jdh33/Ly3qnu8Xh83PjxBx9y8Pjxp11XXVVcXByLxaqrJm9Yv/4b37hi2F7DTjrpZA8ZAHYpVvwAup2ePXsGQfKir144bOjQ5cuXN7e0tLa2BkHQ1NRcVFS059Ch+++/f3NzcyQSqauri8Vin/vcqfvsM7xPnz4tLS2RSKS+vv6QQw4NgiASCVpaWoIgKCwsfO+99/YZvs9NP//5jT/7WdrWLwCA4AdAF/js5z737e9854orr3rtjTeuuOLK9evXB0FwyaWXPP3UU5s2bjrs8MPvvuee5ubmQw897I3X35j4lUnDRwx/5ZVXhg0bNnTYsLeWLu3TZ7fW1tb6+vpx48YFQVBQUPDYE09Muf+BK6+6sqq6eviI4Z4wAOxSlHoCdEe9evX67ve+F4lEgiCYO/eVo48++u23l55+xhlBMtmruPjcc89bvXpVe3v75Kqq9evf+8rEiaNGjZr76qsPP/zwiuXLV69adcQRHy8sLPzC2Wc3Nzc//vhjI0eOenHGjKOOPnrc+PGeLQDsgqz4AXRTqdS3ccPG40844dbbb4/HE5dfetnVV121/r33rrryyjPPOKOoqKhHjx79+w+oq6srLCzs339AJBKZM2fOAWPGPPLww7W1tV+/6GsP/umPu+3W594pUxYsWNDY2OipAsCuyYofQLe2efPm66ur750yZd999501a2ZjY1NzS8umTRvLyspisdjVV125dOnSV1599b577x0xfJ8jjjgiHo8PHjz42Wf/+thjj73xxus9esROP+PMaTU1P7/xxgmnn+7TfQCwa7LiB9Ctjdh3xB//9OBPfvSjLVu2Hn74EVMeeGD4PsP/33e/+/WLL45Goxs3brzyqqtrampGjhr1xS+eU1dX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9tqriURixL77/vbmm/fbb+TChQsXL14UiUQGDBhw6+23/fnRR3/5i5tisR6FhYXxePxnN/7stttuO/vsL37m058KF/1aWloOP+Lwc889t62t/Wc//ens2bNKS0vb2tp69upVVX39cccdG4v12LRpUzT6L1sxD9trr8SNiVdeeSXPe9lj8B7L3n47CIL6+vqDDzl40cKFRx555Msvv5zKdZFIwbHHHnfr//7vqaeeOn369AEDBrz33nsHH3zwY4/9OdWgra2ttrb2yxMnnnXWWX379Vv/3vqO82lrax8+Yvhfn3nmb397rry893XXX/fXv/71oIMOun/KlEGDBvlCAoCu5TgHgJz/ShYUZK5XtbW1b1i/PhKJtLe39+7du6Ghvn///vfcc09FRf877rh9+PDhRx199CeOOqpnz1533Hb7aad9/uFH/hyPt2RePPO8hLb2ttbW1oKCSBAEtbW1t/zud+eed+6TTz75xBOPr1nzTlNTc/jfwoULlyxZkv+NFBUVDtx9YL9+FRs3bPztr399ymc/u2jhojO/8IWwDnPU/vtv3bqluLh48+bN3/7Wt3brvVttbe2BBx0UXqGubuvd99zz3e99b+7cV+++667a2s3hZLZu3Tp37txn/vKXIAii0YLW1kSqbLWtrS38FQAQ/AC6qfb29szP0A0YMODjRx65ZcuWwsLCRQsXVlT0v/e+Ka+//vpbS96aOHHS008/9d3vfKdq8uRly5ZNnDTpL08/XVpaeuVVV2d+1C0soUzFpI7q6uq+9vWLk+3J22699dRx44499th4PLFmzZo1a9asWLG8vb3tsMMO69mzZ5530dzcNGbMAYVFhT16xN56a/EzzzyzaeOmfhUVI0eOHD16dEtLy8aNG8ePH79s2bIzzzrrb3/724YN66OF0bb29k984hOpURobG7/9nf83atT+90+5f8wBYyZOmrRp0+Y1/9TY2HjQwQcVFRWlPohYWFgUBEFRUcy2LgDQTSj1BOhEMgjKysp69+5dWlra3t5WXFJ6440/f+nFF0tKSlavWvXcc8/97MYbt2ypbWhoOGDMmPHjTk2djxeNRv/0xz/uvvvu9025/4H77//iOec899xzr859pb3DAmJbW1sqGqWdp9fY2PTxI48877xzX3755XO+9KVvXH55zdSpqQCWTCYbGxs/85njfzD5B+15r6S1trYdeNBBa9eu3a1Pn7vvvKu2tvayyy79+U03LVyw4OZbbjlt/PiRI0cdf/wJc+fObWpseuThhxOJ1hXLV2zYsP6II46oqKjYsmXLkCFDTj7llP/+79999asX/eKmnz/66KORSCS1x2kQBPvtt991HT4u2N7+LxMT/wBA8APo1trb24NkMGLEiBkvvRS+OK2mZsYLM7537X+eMWFCIpE48MADH3roobPP/uJll15SX18f7pNZVlb2j3/8Y/bsWWMrK5cte/v888+/eNasgg4LiGEiamn5l0LQtra2yy67bPny5Ycccsh3rvl2zdSpFRUVHRvkv9aXUlAQOe644xrq6/cfPXrJkrd22223GS+8sHLFik2bNh03duwBBx54zTXffvvtpaNH73/zzb/dsmVLUVHhunVro9HCIAh269PnnXfemTDh9KVLlpx//vlTp/793nvvTfvYXqxHjyAIEolE6lN/BQXRIAgSiXjqBpV6AkCXU+oJkDsyFUQKIi88/8Kvf/mr1tbWH/3Xfz380MOxWI/vXfufP/j+91977bU+ffr0q6iIBJFkkJw/f17amX59+/Z9de7cgw85uLW17bDDDy8u7hW+1dr6f1t3pvXq3bv3gQce2NzSUlAQ/fvf/9anT59tTCwaLch7Ja1nz16jR38skUi0NLcsW7YsGo3269fvsT//ediwvWa+NLP6uusOPuTg1atXNzU13z9lSnFxcXFx8cqVK3v3Lg+CYMSIEQ0NDXvvs09t7ZaBgwY9++yz2TZrCUs9Uyt+RUWxVOSz4gcAgh9Adw9+yfZkcUnxD37w/TmzZ5955lnlvct3333AmNGjH3rwwYqKitTn2UpKS5oaG5uamjNDTnNzc2q/luLi4kikoEPw+5fP9fXq2avjoKVlZa2JRH19XX19/TaDU3tbW/6lnqWlpXsM3mPTpk3vvvfu1q1botFoLBZ77rnnDjr4oOnTpg0dOnTpkqUDBw587rlne/ToEY1Gi4tL5s+fH41G161dO3LkqM2bN5eUlLS3t6duJ/P6iXgiFfxSK36plqnDDAMrfgAg+AF0c6nNXSKRyMCBu//spz8dse+ITRs3FhUVHXPssanj6ZqbmxobGzdv2lxWVr733ns3NjZ27N7Y2Dh8xIgN6zckk8GCNxc0Nja+9957sVgsGSSPPvqY2traVLNoNHr2F89evHhxrKiosLCwqalp3bp1RUWxfhUVffv2TSTSN/8c/bHR6959t2lbGWybBv5zjW7d2rXhwesNDQ0vvfjiJ446as7sOU888fjIUaMeeuih8ISJjRs39t5tt/nz5w8aNDAIgk2bNsZiRUEQ9O/fP20z0ng8PmTPIevWrq2t3dJxc5d4PG6tDwAEP4AdI/gFkUgqzMybN+/71157yimnzJ4957//538qKvoHQbB169alS5aMHDVy9epV137/+7W1teGhf0VFRXV1dZ/97Ofuv39KRUW/hx9+qKWlZdGixSeccOLChQtvv/PO/fbbb9GiRYsWLfrWNdfsM3z466+9VlRU1NramkjEn3j88bKy0rVr11562WVbtmztOKWSktKLL7lk8aLF+ceqwXvsEQRBWVn5ypUry8rKUi+WlZU98vDDn/zUJ//23LNjxoz5x+rV69auDbusXfNOn936rFixYuCgQb17954ze3afPn1enDHjc6eeumzZso4XX7Zs2Wmf//yrc+fusceg1Ipfqoo1/IxfUVGRLyQAEPwAuvG/kgUFwT/34ezXr9/tt9364osvFhZG582bd931161du3a33XZ78sknx40f//bbyyo/+ckf/td/NTY2xOPxhob6SCRSVX3dmjVrBgzYvUePHk88/nhFRcX9U+4bse+IluaW6dOn33b7HY8+9tjLs2Z96tOfvvuuu4497rjm5pZUUrrn7rsHDho0f968C7/61YsvuSSRSDQ01Dc3N/Xr1+9Xv/7V4kWLgiAZRrjcams37zdy5KaNm4qLey1ZsiRc0wuCYNasWevWrjt13PhPffrTzz77bM+e//dRw4aGxoJoQRAEAwcO7Nev3+zZs4cPH1FTU7PfvvveceddPXv2bG5uqq3dXFZWdsedd40aObK0rCwIgrTjHFJFnolEwhcSAHQtu3oC5CuZTA4dOuw73/72X/76178997cDDjjggT/+8aKvfvXRRx7p27fvOeec88cH/jh06NCp06Zv3bKlV6/iwsLCV1+du3Xr1pNOOunrX7soGo0WFha+9tprE077/PU/vKG8rOyNN96ora3dUls7aNAeEydNWrxoUSo4FRUV1dZuvvFnP7vmmmvuvvOuTxx11Ne+/vUtW7YUFxfX19XNmTOnubml8pOfbKivz2faLS3xvfba6/nnn993330XL1rU8a36+voLL7jgTw8+uGL58j8+8EBRUSx8Kx6Pr1yxsqgo1tDQ8PEjj6yZOvXmm39bVV394J/+tPvuu//poYfi8Xi0IBqNFsybP3/2nDnHHnfcP1av/udn/BznAACCH8COo6CgIJkMCjpsyhKJRG79n/+99gffv/uuuydOmnjWWV949NFHfvmLX0SCyJVXX7VwwYIp990Xj8djsVg8Hj/55JP79x9wyskn1dXVpRboCgsL16x55+QTT7z6m9+88MILUwtl06dPv+3WW4/8j/8IRykuLnnmL3/5xCc+MfErk1J7iu7WZ7dEPJEMkl/+8sS+/fquXrUqzxLK9vb2oUOHPv/888cee2z4qcJ/jlI8b94bL8186ZGHHm5ubu54wWi0YN26tYMH77Fp48ZRo0Y9P336HbffHiuKfe/a/1y3du19f7i3KFYUj8cjQWTC6afvOXTPefPm/bNOtbWgIFpUVJRIxG3uAgCCH0B3V1tbO/Oll+bPn/fOO+/EYv//algsFnvkkYdHf+xjJSXFv/7lrw4+5OCHHnpw8ODBt976vy/NfOnss7945llnlZSUJJPJTRs3zpnzyq9//fW6urry8vJkMtnW1vbJT31q8aLFn/zkp2679bY777gjdVTDqlWrbvjhfyXi8cGDBzc2NqY+JVhWVnbD9ddPnz59/Pjx519wQVl5WVtr29q1a+67794Fb755wokntbYm1q5d07Nnz7q6rTNnzlyxYkUsFgs/YZjS1tY2ePDgd955Z9PGTQsWvNnQ0JC2/tavX7/f3Xzz6tWr0wpHi4qKXn/99eOOO27p0qUD+g8oLi4uLy+/447b582fd84554z//Gn9KyqihYXr1q2bPXv2T37y42OOOebddeva2tt79eoZBMk5c+aseWdNr169ysvLY7HY/HnzVq1c+dKLL4Zn1gMA/06R5D8/u/JvHTXSNeMCbNN/fPzj23y9tbV16dKl/fv3j8Viablow4b1jY2Nffv2W79+/d577x2+vmbNmrKysoEDB8bj8bVr18TjiT322CN8t66u7vd/+MOmTZv23HPPpqbm8eNOLSsra25uGjPmgEcfe+zRRx457LDDTj7ppI4fwwuCYO3atUVFhUOG7FlfX79+/frS0tKysrJVq1YWFhaVl5enGr/77rslJSVbt24dMmRI6jSFjpYvX15WVlpXV99xqp2qq6urr69PJOJFRbHw7L7W1tba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AAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMLPBAAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBRCEGhwAAC31JREFUAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhJ8JAAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPxMAAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAED4AQAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAgPADAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAg/AAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAEH4AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAABB+AAAACD8AAACEHwAAAMIPAABA+AEAACD8AAAAEH4AAAAIPwAAAIQfAAAAwg8AAADhBwAAIPwAAAAQfgAAAAg/AAAAhB8AAADCDwAAAOEHAACA8AMAABB+JgAAABB+AAAACD8AAACEHwAAAMIPAAAA4QcAAIDwAwAAQPgBAAAIPwAAAIQfAAAAwg8AAADhBwAAgPADAABA+AEAACD8AAAAhB8AAADCDwAAAOEHAACA8AMAAED4AQAAIPwAAAAQfgAAAAg/AAAA4QcAAIDwAwAAQPgBAAAg/AAAAAAAAFips81S1Zxz3lT76qG6r56q2+q5Oq+uqo/qUH1W19V79Vq9VbvqrrqoXqptdVk9fn//P/oCSIVS5GrvA1cAAAAASUVORK5CYII="
                      />
                      <div class="t m0 x1 h2 y1 ff1 fs0 fc0 sc0 ls0 ws0">48</div>
                      <div class="t m0 x1 h2 y2 ff1 fs0 fc0 sc0 ls0 ws0">Guaranteed by</div>
                      <div class="t m0 x2 h3 y3 ff1 fs1 fc0 sc0 ls0 ws0">1<span class="_ _0"></span><span class="fs2">pm</span></div>
                      <div class="t m0 x3 h4 y4 ff2 fs3 fc0 sc0 ls0 ws0">Deliver<span class="_ _1"></span>ed By</div>
                      <div style="top:106px" class="t m0 x4 h4 y5 ff2 fs3 fc0 sc0 ls0 ws0">Pos<span class="_ _1"></span>tage on Acc<span class="_ _1"></span>ount GB</div>
                      <div style="top:130px" class="t m0 x5 h5 y6 ff1 fs4 fc0 sc0 ls0 ws0">Parcel</div>
                      <div style="top:145px"  class="t m0 x6 h6 y7 ff1 fs3 fc0 sc0 ls0 ws0">2g</div>
                      <div class="t m0 x7 h7 y8 ff3 fs3 fc0 sc0 ls0 ws0"><?php echo $label_start ?></div>
                      <div class="t m0 x8 h7 y9 ff3 fs3 fc0 sc0 ls0 ws0"><?php echo $trackingNumber ?></div>
                      <div class="t m0 x9 h8 ya ff3 fs5 fc0 sc0 ls0 ws0"></div>
                      <div class="t m0 x9 h8 yb ff3 fs5 fc0 sc0 ls0 ws0">Recycle Pro</div>
                      <div class="t m0 x9 h8 yc ff3 fs5 fc0 sc0 ls0 ws0">170 Slade Road, Erdington, Birmingham</div>

                      <div class="t m0 x9 h8 y10 ff3 fs5 fc0 sc0 ls0 ws0">UK</div>
                      <div class="t m0 x9 h8 y11 ff3 fs5 fc0 sc0 ls0 ws0">B23 7PX </div>
                      <div style="font-weight: 200 !important;font-family: arial !important;" class="t m1 xa h9 y12 ff4 fs6 fc0 sc0 ls0 ws0"></div>
                      <div style="font-weight: 200 !important;font-family: arial !important;margin-left:-5px;" class="t m1 xb h9 y12 ff4 fs6 fc0 sc0 ls0 ws0">Sender Address</div>
                      <div style="font-weight: 200 !important;font-family: arial !important;" class="t m1 xc h9 y12 ff4 fs6 fc0 sc0 ls0 ws0"><?php echo $address1; ?></div>
                      <div style="font-weight: 200 !important;font-family: arial !important;" class="t m1 xd h9 y12 ff4 fs6 fc0 sc0 ls0 ws0"><?php echo $address2; ?></div>
                      <div class="t m0 x9 h7 y13 ff3 fs3 fc0 sc0 ls0 ws0">Customer Ref:</div>
                      <div class="t m0 x9 h7 y14 ff3 fs3 fc0 sc0 ls0 ws0"><?php echo $order_id ?></div>
                      <div class="t m0 x9 ha y15 ff3 fs7 fc0 sc0 ls0 ws0">Royal Mail: UK&apos;s lowest average parcel carbon footprint 205g CO2e</div>
                  </div>
                  <div class="pi" data-data='{"ctm":[1.500000,0.000000,0.000000,1.500000,0.000000,0.000000]}'></div>
              </div>
          </div>
          <div class="loading-indicator">
              <img
                  alt=""
                  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAMAAACdt4HsAAAABGdBTUEAALGPC/xhBQAAAwBQTFRFAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQAAAwAACAEBDAIDFgQFHwUIKggLMggPOgsQ/w1x/Q5v/w5w9w9ryhBT+xBsWhAbuhFKUhEXUhEXrhJEuxJKwBJN1xJY8hJn/xJsyhNRoxM+shNF8BNkZxMfXBMZ2xRZlxQ34BRb8BRk3hVarBVA7RZh8RZi4RZa/xZqkRcw9Rdjihgsqxg99BhibBkc5hla9xli9BlgaRoapho55xpZ/hpm8xpfchsd+Rtibxsc9htgexwichwdehwh/hxk9Rxedx0fhh4igB4idx4eeR4fhR8kfR8g/h9h9R9bdSAb9iBb7yFX/yJfpCMwgyQf8iVW/iVd+iVZ9iVWoCYsmycjhice/ihb/Sla+ylX/SpYmisl/StYjisfkiwg/ixX7CxN9yxS/S1W/i1W6y1M9y1Q7S5M6S5K+i5S6C9I/i9U+jBQ7jFK/jFStTIo+DJO9zNM7TRH+DRM/jRQ8jVJ/jZO8DhF9DhH9jlH+TlI/jpL8jpE8zpF8jtD9DxE7zw9/z1I9j1A9D5C+D5D4D8ywD8nwD8n90A/8kA8/0BGxEApv0El7kM5+ENA+UNAykMp7kQ1+0RB+EQ+7EQ2/0VCxUUl6kU0zkUp9UY8/kZByUkj1Eoo6Usw9Uw3300p500t3U8p91Ez11Ij4VIo81Mv+FMz+VM0/FM19FQw/lQ19VYv/lU1/1cz7Fgo/1gy8Fkp9lor4loi/1sw8l0o9l4o/l4t6l8i8mAl+WEn8mEk52Id9WMk9GMk/mMp+GUj72Qg8mQh92Uj/mUn+GYi7WYd+GYj6mYc62cb92ch8Gce7mcd6Wcb6mcb+mgi/mgl/Gsg+2sg+Wog/moj/msi/mwh/m0g/m8f/nEd/3Ic/3Mb/3Qb/3Ua/3Ya/3YZ/3cZ/3cY/3gY/0VC/0NE/0JE/w5wl4XsJQAAAPx0Uk5TAAAAAAAAAAAAAAAAAAAAAAABCQsNDxMWGRwhJioyOkBLT1VTUP77/vK99zRpPkVmsbbB7f5nYabkJy5kX8HeXaG/11H+W89Xn8JqTMuQcplC/op1x2GZhV2I/IV+HFRXgVSN+4N7n0T5m5RC+KN/mBaX9/qp+pv7mZr83EX8/N9+5Nip1fyt5f0RQ3rQr/zo/cq3sXr9xrzB6hf+De13DLi8RBT+wLM+7fTIDfh5Hf6yJMx0/bDPOXI1K85xrs5q8fT47f3q/v7L/uhkrP3lYf2ryZ9eit2o/aOUmKf92ILHfXNfYmZ3a9L9ycvG/f38+vr5+vz8/Pv7+ff36M+a+AAAAAFiS0dEQP7ZXNgAAAj0SURBVFjDnZf/W1J5Fsf9D3guiYYwKqglg1hqplKjpdSojYizbD05iz5kTlqjqYwW2tPkt83M1DIm5UuomZmkW3bVrmupiCY1mCNKrpvYM7VlTyjlZuM2Y+7nXsBK0XX28xM8957X53zO55z3OdcGt/zi7Azbhftfy2b5R+IwFms7z/RbGvI15w8DdkVHsVi+EGa/ZZ1bYMDqAIe+TRabNv02OiqK5b8Z/em7zs3NbQO0GoD0+0wB94Ac/DqQEI0SdobIOV98Pg8AfmtWAxBnZWYK0vYfkh7ixsVhhMDdgZs2zc/Pu9HsVwc4DgiCNG5WQoJ/sLeXF8070IeFEdzpJh+l0pUB+YBwRJDttS3cheJKp9MZDMZmD5r7+vl1HiAI0qDtgRG8lQAlBfnH0/Miqa47kvcnccEK2/1NCIdJ96Ctc/fwjfAGwXDbugKgsLggPy+csiOZmyb4LiEOjQMIhH/YFg4TINxMKxxaCmi8eLFaLJVeyi3N2eu8OTctMzM9O2fjtsjIbX5ewf4gIQK/5gR4uGP27i5LAdKyGons7IVzRaVV1Jjc/PzjP4TucHEirbUjEOyITvQNNH+A2MLj0NYDAM1x6RGk5e9raiQSkSzR+XRRcUFOoguJ8NE2kN2XfoEgsUN46DFoDlZi0DA3Bwiyg9TzpaUnE6kk/OL7xgdE+KBOgKSkrbUCuHJ1bu697KDrGZEoL5yMt5YyPN9glo9viu96GtEKQFEO/34tg1omEVVRidBy5bUdJXi7R4SIxWJzPi1cYwMMV1HO10gqnQnLFygPEDxSaPPuYPlEiD8B3IIrqDevvq9ytl1JPjhhrMBdIe7zaHG5oZn5sQf7YirgJqrV/aWHLPnPCQYis2U9RthjawHIFa0NnZcpZbCMTbRmnszN3mz5EwREJmX7JrQ6nU0eyFvbtX2dyi42/yqcQf40fnIsUsfSBIJIixhId7OCA7aA8nR3sTfF4EHn3d5elaoeONBEXXR/hWdzgZvHMrMjXWwtVczxZ3nwdm76fBvJfAvtajUgKPfxO1VHHRY5f6PkJBCBwrQcSor8WFIQFgl5RFQw/RuWjwveDGjr16jVvT3UBmXPYgdw0jPFOyCgEem5fw06BMqTu/+AGMeJjtrA8aGRFhJpqEejvlvl2qeqJC2J3+nSRHwhWlyZXvTkrLSEhAQuRxoW5RXA9aZ/yESUkMrv7IpffIWXbhSW5jkVlhQUpHuxHdbQt0b6ZcWF4vdHB9MjWNs5cgsAatd0szvu9rguSmFxWUVZSUmM9ERocbarPfoQ4nETNtofiIvzDIpCFUJqzgPFYI+rVt3k9MH2ys0bOFw1qG+R6DDelnmuYAcGF38vyHKxE++M28BBu47PbrE5kR62UB6qzSFQyBtvVZfDdVdwF2tO7jsrugCK93Rxoi1mf+QHtgNOyo3bxgsEis9i+a3BAA8GWlwHNRlYmTdqkQ64DobhHwNuzl0mVctKGKhS5jGBfW5mdjgJAs0nbiP9KyCVUSyaAwAoHvSPXGYMDgjRGCq0qgykE64/WAffrP5bPVl6ToJeZFFJDMCkp+/BUjUpwYvORdXWi2IL8uDR2NjIdaYJAOy7UpnlqlqHW3A5v66CgbsoQb3PLT2MB1mR+BkWiqTvACAuOnivEwFn82TixYuxsWYTQN6u7hI6Qg3KWvtLZ6/xy2E+rrqmCHhfiIZCznMyZVqSAAV4u4Dj4GwmpiYBoYXxeKSWgLvfpRaCl6qV4EbK4MMNcKVt9TVZjCWnIcjcgAV+9K+yXLCY2TwyTk1OvrjD0I4027f2DAgdwSaNPZ0xQGFq+SAQDXPvMe/zPBeyRFokiPwyLdRUODZtozpA6GeMj9xxbB24l4Eo5Di5VtUMdajqHYHOwbK5SrAVz/mDUoqzj+wJSfsiwJzKvJhh3aQxdmjsnqdicGCgu097X3G/t7tDq2wiN5bD1zIOL1aZY8fTXZMFAtPwguYBHvl5Soj0j8VDSEb9vQGN5hbS06tUqapIuBuHDzoTCItS/ER+DiUpU5C964Ootk3cZj58cdsOhycz4pvvXGf23W3q7I4HkoMnLOkR0qKCUDo6h2TtWgAoXvYz/jXZH4O1MQIzltiuro0N/8x6fygsLmYHoVOEIItnATyZNg636V8Mm3eDcK2avzMh6/bSM6V5lNwCjLAVMlfjozevB5mjk7qF0aNR1x27TGsoLC3dx88uwOYQIGsY4PmvM2+mnyO6qVGL9sq1GqF1By6dE+VRThQX54RG7qESTUdAfns7M/PGwHs29WrI8t6DO6lWW4z8vES0l1+St5dCsl9j6Uzjs7OzMzP/fnbKYNQjlhcZ1lt0dYWkinJG9JeFtLIAAEGPIHqjoW3F0fpKRU0e9aJI9Cfo4/beNmwwGPTv3hhSnk4bf16JcOXH3yvY/CIJ0LlP5gO8A5nsHDs8PZryy7TRgCxnLq+ug2V7PS+AWeiCvZUx75RhZjzl+bRxYkhuPf4NmH3Z3PsaSQXfCkBhePuf8ZSneuOrfyBLEYrqchXcxPYEkwwg1Cyc4RPA7Oyvo6cQw2ujbhRRLDLXdimVVVQgUjBGqFy7FND2G7iMtwaE90xvnHr18BekUSHHhoe21vY+Za+yZZ9zR13d5crKs7JrslTiUsATFDD79t2zU8xhvRHIlP7xI61W+3CwX6NRd7WkUmK0SuVBMpHo5PnncCcrR3g+a1rTL5+mMJ/f1r1C1XZkZASITEttPCWmoUel6ja1PwiCrATxKfDgXfNR9lH9zMtxJIAZe7QZrOu1wng2hTGk7UHnkI/b39IgDv8kdCXb4aFnoDKmDaNPEITJZDKY/KEObR84BTqH1JNX+mLBOxCxk7W9ezvz5vVr4yvdxMvHj/X94BT11+8BxN3eJvJqPvvAfaKE6fpa3eQkFohaJyJzGJ1D6kmr+m78J7iMGV28oz0ygRHuUG1R6e3TqIXEVQHQ+9Cz0cYFRAYQzMMXLz6Vgl8VoO0lsMeMoPGpqUmdZfiCbPGr/PRF4i0je6PBaBSS/vjHN35hK+QnoTP+//t6Ny+Cw5qVHv8XF+mWyZITVTkAAAAASUVORK5CYII="
              />
          </div>

        </div>
      </body>
  </html>

  <?php

}


if(isset($_POST['LabelOrder'])){

  $baseFromJavascript = $_POST["LabelOrder"];
  $base_to_php = explode(',', $baseFromJavascript);
  // the 2nd item in the base_to_php array contains the content of the image
  $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $baseFromJavascript));
  $trackingNumber = $_COOKIE["trackingNumber"];

  $filepath = "labels/$trackingNumber.png"; // or image.jpg

  // Save the image in a defined path
  file_put_contents($filepath,$data);

  echo "Done";



}


if(isset($_GET['getProducts'])){


$stmt = $pdo->prepare("SELECT * FROM wr_product ");
$stmt->execute();
$data = $stmt->fetchAll();
// and somewhere later:
foreach ($data as $row_1) {
$pro_img = $row_1['pro_img'];
$name = $row_1['title'];
echo "<img style='width:120px' src='/wr-m6/uploads/$pro_img'/><br/>$pro_img<br/>$name";
}

}


if(isset($_GET['labelS'])){


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
$orderIdentifiers = "1842"; // string | Order Identifier or several Order Identifiers separated by semicolon
$documentType = "postageLabel"; // string | Document generation mode. When documentType is set to \"postageLabel\" the additional parameters below must be used. These additional parameters will be ignored when documentType is not set to \"postageLabel\"
$includeReturnsLabel = "True"; // bool | Include returns label. Required when documentType is set to 'postageLabel'
$includeCN = "True"; // bool | Include CN22/CN23 with label. Optional parameter. If this parameter is used the setting will override the default account behaviour specified in the \"Label format\" setting \"Generate customs declarations with orders\"
//print_r($includeReturnsLabel);

try {
    $result = $apiInstance->getOrdersLabelAsync($orderIdentifiers, $documentType, $includeReturnsLabel,$includeCN);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling LabelsApi->getOrdersLabelAsync: ', $e->getMessage(), PHP_EOL;
}
exec ("find /home/recycleproco/public_html/tmp2 -type f -exec chmod 0777 {} +");//for files inside directory

}
?>
