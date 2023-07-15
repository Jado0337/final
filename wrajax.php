<?php
require_once("wr-m6/wrbasic/config.inc.php");
extract($_REQUEST);
switch($index)
{

	case 'SearchVal':
		require_once('wr-m6/apps/front/home/homepage.class.php');
		$home_obj = new HomePage(); 
		$home_obj->SearchRedirectTab($serval);
	break;
	
	case 'RemoveCartItem':
		require_once('wr-m6/apps/front/products/products.class.php');
		$pro_obj = new FrontProductClass();
		$pro_obj->RemoveItemFromCart($id);
	break;
	
	default:
		echo 'Something went wrong. Try Again!';
	break;
}
?>