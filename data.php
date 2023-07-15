<?php
require_once("wr-m6/wrbasic/config.inc.php");
extract($_REQUEST);
switch($wr)
{
	case 'getcenters':
		require_once('wr-m6/apps/front/data/data.class.php');
		$data_obj = new DataClass();
		$data_obj->getCenters();
	break;
	case 'footer':
		require_once('wr-m6/apps/front/data/data.class.php');
		$data_obj = new DataClass();
		$data_obj->footer();
	break;
	case 'head':
		require_once('wr-m6/apps/front/data/data.class.php');
		$data_obj = new DataClass();
		$data_obj->pageHead();

	
	default: echo '';
	break;
}

?>
