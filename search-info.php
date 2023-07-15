<?php
require_once("wr-m6/wrbasic/config.inc.php");
require_once('wr-m6/apps/front/home/homepage.class.php');
$home_obj = new HomePage(); 
extract($_REQUEST);		
$keyword = strval($_POST['query']);
$home_obj->getSearchResult($keyword);

?>