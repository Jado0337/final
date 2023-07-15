<?php
/*********Front Module***************/
// Database tables
define("WR_BASIC",'wr_basic');
define("WR_ADMIN",'wr_admin');
define("WR_USER",'wr_user');
define("WR_WEBUSER",'wr_user');
define("WR_ADDRESS",'wr_address');
define("WR_CATEGORIES","wr_categories");
define("WR_PAGE","wr_page");
define("WR_PROCAT","wr_procat");
define("WR_BRANDS","wr_brands");
define("WR_PRODUCT","wr_product");
define("WR_MODEL","wr_model"); 
define("WR_PRODUCT_PRICE","wr_product_price");
define("WR_NETWORK_CAT","wr_network_cat");
define("WR_MOBILE_NETWORK","wr_mobile_networks");
define("WR_ORDER","wr_order");
define("WR_ORDER_DETAIL","wr_order_detail");
define("WR_ORDER_ADDRESS","wr_order_address");
define("WR_BLOG","wr_blog");
define("WR_CONTACT_FORM","wr_contact_form");
define("WR_SLIDER","wr_slider");
define("WR_HOMEBANNERS","wr_homebanners");
define("WR_HOME_FEATURED_ITEMS","wr_home_featured_items");
define("WR_PRO_NETWORK","wr_product_network");
define("WR_PROCESSORS","wr_processors");
define("WR_RAMS","wr_rams");


define("WR_NEWSLETTER","wr_newsletter");

// Base File Directory ///
define("BASE_FILRDIR","wr-m6/uploads/");
//Have to be turned off
ini_set('display_errors', true);
//error_reporting(E_ALL ^ E_NOTICE);
//View in logs! not on pages!
error_reporting(-1);

//Shipping Cost ////
define("SHIPPING_IN_UK","0");
define("SHIPPING_OUTSIDE","0");
?>