<?php
require_once("wrbasic/config.inc.php");
extract($_REQUEST);
switch($index)
{
	case 'DeleteProCat':
		require_once('apps/wrback/products/productcat.class.php');
		$procat_obj = new ProductCategories();
		$procat_obj->DeleteData($id);
	break;
	case 'DeleteModel':
		require_once('apps/wrback/products/model.class.php');
		$model_obj = new ProductModel();
		$model_obj->DeleteData($id);
	break;
	case 'DeleteBrand':
		require_once('apps/wrback/products/brands.class.php');
		$brand_obj = new BrandsClass();
		$brand_obj->DeleteData($id);
	break;
	case 'DeleteProduct':
		require_once('apps/wrback/products/product.class.php');
		$product_obj = new ProductClass();
		$product_obj->DeleteData($id);
	break;
	case 'DeleteUsers':
		require_once('apps/wrback/adminuser/adminuser.class.php');
		$adminuser_obj = new AdminUser();
		$adminuser_obj->DeleteUser($id);
	break;
	case 'DeleteCategory':
		require_once('apps/wrback/products/categories.class.php');
		$cat_obj = new CategoriesClass();
		$cat_obj->DeleteData($id);
	break;
	case 'DeletePage':
		require_once('apps/wrback/pages/page.class.php');
		$page_obj = new PageClass();
		$page_obj->DeleteData($id);
	break;
	case 'getModels':
		require_once('apps/wrback/products/product.class.php');
		$product_obj = new ProductClass();
		$product_obj->getModels($id);
	break;
	case 'updateStatus':
		require_once('apps/wrback/products/orders.class.php');
		require_once("wrbasic/class.phpmailer.php");
		$ordr_obj = new OrderClass();
		$ordr_obj->UpdateProStatus($order_id,$order_status,$prc,$shipping_status,$payment_status,$rprice,$detail,$dte,$user_id,$rev);
	break;
		case 'updateSta':
		require_once('apps/wrback/products/ord_class.php');
		require_once("wrbasic/class.phpmailer.php");
		$ordr_obj = new OrderClass();
		$ordr_obj->UpdateProStatus($order_id,$order_status,$prc,$shipping_status,$payment_status,$rprice,$detail,$dte,$user_id,$rev);
	break;
	case 'updateStasel':
		require_once('apps/wrback/products/sell_class.php');
		require_once("wrbasic/class.phpmailer.php");
		$ordr_obj = new OrderClass();
		$ordr_obj->UpdateProStatus($order_id,$order_status,$prc,$shipping_status,$payment_status,$rprice,$detail,$dte,$user_id,$rev);
	break;
	default: echo '';
	break;
}
?>