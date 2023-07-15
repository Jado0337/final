<html>
<body>
<form id="myFormvama" method="POST">
<label>Name</label><input type="text" id="name" name="name" value=""><br>
<label>Address</label><input type="text" id="addrs" name="addrs" value=""><br>
<label>Email</label><input type="text" id="email" name="email" value=""><br>
<input type="button" name="submit" value="Send Request" id="submit">
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
$('#msgs').hide();
$('#submit').click(function(){ 	

var dt={"email": "sqb330@gmail.com", "number": "+441622824592", "paypal": "", "network": "unlocked", "order_id": "5f739480-9e08-43ea-aa41-2761ae107a41", "condition": "good", "last_name": "Collins", "first_name": "Sam", "product_id": "670", "address_town": "Test", "product_name": "iPhone SE (2020) 64 GB", "quoted_price": 185.0, "secure_token": "zYLfSIYLa9Wfj9BeXFzzJNb17v0JfopK", "bank_sortcode": "861741", "address_county": "Hampshire", "address_line_1": "32 Test Address", "address_line_2": "", "address_line_3": "", "payment_method": "bank", "requested_pack": 1, "address_country": "United Kingdom", "address_postcode": "GB666BU", "payment_currency": "GBP", "manufacturer_name": "Apple", "bank_account_number": "03480270"};
console.log(dt);

$.ajax({
type :'POST',
url : 'res.php',
cache: false,
dataType:"json",
data: dt,
success: function(response) { 
	alert('good');
document.getElementById('msgs').innerHTML= response;
}
})
jQuery('#msgs').slideToggle('slow')
})
})
</script>
<div id="msgs" style="height:auto;width:auto;"></div>
</html>
</body>