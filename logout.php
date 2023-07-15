<?php
session_start();
require_once("wr-m6/wrbasic/config.inc.php");
require_once("wr-m6/apps/front/class/config.front.php");

$auth = new Authentication();
$auth->Destroy_Session();
?>